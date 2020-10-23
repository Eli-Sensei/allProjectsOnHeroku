<?php session_start();
if(count($_SESSION) === 0){
	header('Location: index2.php');
	exit();
}
if (isset($_GET['do']) && $_GET['do'] === 'logout' ) {
	echo 'click logout';
	foreach ($_SESSION as $key => $value) {
		unset($_SESSION[$key]);
	}
	header('Location: index2.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
if (count($_SESSION) > 0) {
	echo '<marquee><h1>vous êtes logué</h1></marquee>';
	echo '<br><a href="success2.php?do=logout">logout('.$_SESSION['email'].')</a>';
}

?>
</body>
</html>