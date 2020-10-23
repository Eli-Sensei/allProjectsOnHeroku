<?php
const UPLOAD_ERROR_MSG = ['ok', 'UPLOAD_ERR_INI_SIZE', 'UPLOAD_ERR_FORM_SIZE', 'UPLOAD_ERR_PARTIAL', 'No file was uploaded', 'UPLOAD_ERR_NO_TMP_DIR', 'UPLOAD_ERR_CANT_WRITE', 'UPLOAD_ERR_EXTENSION'];
const DS = DIRECTORY_SEPARATOR;

const ZIP_ERROR_MSG = ["ZIP_ER_OK","ZIP_ER_MULTIDISK","ZIP_ER_RENAME","ZIP_ER_CLOSE","ZIP_ER_SEEK","ZIP_ER_READ","ZIP_ER_WRITE","ZIP_ER_CRC","ZIP_ER_ZIPCLOSED","ZIP_ER_NOENT","ZIP_ER_EXISTS","ZIP_ER_OPEN","ZIP_ER_TMPOPEN","ZIP_ER_ZLIB","ZIP_ER_MEMORY","ZIP_ER_CHANGED","ZIP_ER_COMPNOTSUPP","ZIP_ER_EOF","ZIP_ER_INVAL","ZIP_ER_NOZIP","ZIP_ER_INTERNAL","ZIP_ER_INCONS","ZIP_ER_REMOVE","ZIP_ER_DELETED"];

if($_FILES['the_file']['error'] == UPLOAD_ERR_OK) {
 // no upload error
	if (strpos($_FILES['the_file']['type'], "zip") !== false) {
        $zipTempName = 
        microtime(true).'.zip';
		if (move_uploaded_file($_FILES['the_file']['tmp_name'], $zipTempName)) {

			$zip = new ZipArchive;
			$res = $zip->open($zipTempName);
			if ($res === TRUE) {
			    $zip->extractTo('thumbnails'.DS.$zipTempName);
			    $zip->close();
			} else $error = ZIP_ERROR_MSG[$res];

			// supprimer le zip uploadé
			if (!unlink($zipTempName)) $error .= '<br>cannot remove zip';
			
		} else $error = 'Cannot move temp file!';

	} else $error = 'You must upload a zip archive!';
    
}else $error = UPLOAD_ERROR_MSG[$_FILES['the_file']['error']];

header('Content-Type: application/json;charset=utf-8');
echo json_encode($_FILES);



/*
//////////////////////////// CORECTION ////////////////////////////////////////


<?php
const UPLOAD_ERROR_MSG = ['ok', 'UPLOAD_ERR_INI_SIZE', 'UPLOAD_ERR_FORM_SIZE', 'UPLOAD_ERR_PARTIAL', 'No file was uploaded', 'UPLOAD_ERR_NO_TMP_DIR', 'UPLOAD_ERR_CANT_WRITE', 'UPLOAD_ERR_EXTENSION'];
const DS = DIRECTORY_SEPARATOR;

const ZIP_ERROR_MSG = ['No error',
    'Multi-disk zip archives not supported',
    'Renaming temporary file failed',
    'Closing zip archive failed',
    'Seek error',
    'Read error',
    'Write error',
    'CRC error',
    'Containing zip archive was closed',
    'No such file',
    'File already exists',
    "Can't open file",
    'Failure to create temporary file',
    'Zlib error',
    'Malloc failure',
    'Entry has been changed',
    'Compression method not supported',
    'Premature EOF',
    'Invalid argument',
    'Not a zip archive',
    'Internal error',
    'Zip archive inconsistent',
    "Can't remove file",
    'Entry has been deleted'];

$images = [];

if($_FILES['the_file']['error'] === UPLOAD_ERR_OK) {
 // no upload error
	if (stripos($_FILES['the_file']['type'], 'zip') !== false) {

		$zipTempName = microtime(true).'.zip';
		if (move_uploaded_file($_FILES['the_file']['tmp_name'], $zipTempName)) {

			$zip = new ZipArchive;
			$res = $zip->open($zipTempName);
			if ($res === TRUE) {
			    //$zip->extractTo('thumbnails'.DS.$zipTempName);
			    for($i = -1; ++$i < $zip->numFiles;) {
			        $filename = $zip->getNameIndex($i);
			        $fileinfo = pathinfo($filename);
			        if ($fileinfo['extension']) {
			        	if (stripos(mime_content_type("zip://".$zipTempName."#".$filename), 'image') !== false) {
			        		$images [] = $fileinfo['basename'];
			        		copy("zip://".$zipTempName."#".$filename, "thumbnails".DS.$fileinfo['basename']);
			        	}		        
			        }
			    }      
			    $zip->close();

			    if (count($images) === 0) $error = 'There were no images !';

			} else $error = ZIP_ERROR_MSG[$res];

			// supprimer le zip uploadé
			if (!unlink($zipTempName)) $error .= '<br>cannot remove zip';
			
		} else $error = 'Cannot move temp file!';

	} else $error = 'You must upload a zip archive!';
    
}else $error = UPLOAD_ERROR_MSG[$_FILES['the_file']['error']];

header('Content-Type: application/json;charset=utf-8');
echo json_encode($error ?? $images);

*/