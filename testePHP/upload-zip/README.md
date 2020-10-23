# Upload zip & resample images

> ## A model is visible [here on heroku](https://training-course.herokuapp.com/upload-zip/)

### Instructions

> You __must__ create a form that will let the possibility to upload a zip containing images that __may__ be resampled

:bulb:

- You __must__ check if there was a file uploaded
- The server __must__ accept only zip archives
- An error __must__ be displayed if the zip was too big
- You __must__ extract only the files and not the ~~folders~~
- You __must__ authorized extracted files to be only image of type [jpeg, png, gif]
- A `json` value __should__ be returned by the `server` containing a single array of images name or the error message(s)
- Finally from the `front-end` side __should__ be displayed a node list of images (or thumbnails) if all went fine or the error message(s)

### The new concepts seen in this exercise

- [$_FILES superglobal](http://php.net/manual/en/reserved.variables.files.php)
- [Constant Upload Errors](http://php.net/manual/fr/features.file-upload.errors.php)
- [move_uploaded_file()](http://php.net/manual/fr/function.move-uploaded-file.php)
- [ZipArchive Class](http://php.net/manual/en/class.ziparchive.php)
- [list()](http://php.net/manual/en/function.list.php) (which is similar to JavaScript destructuration)
- [Proportional image resample in PHP](http://php.net/manual/fr/function.imagecopyresampled.php)

### Bonus

> Resample original images to thumbnails which corresponds to comments from number 16 to 18
