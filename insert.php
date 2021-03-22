<?php
	include 'config.php';
	$sql = "INSERT INTO events (name, timed) VALUES ('".$_GET['name']."','".$_GET['timed']."')";
	if(mysqli_query($link, $sql))
		header('Location: /project/');
	else echo 'ERR:'.mysqli_error($link);
?>