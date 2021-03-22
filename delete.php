<?php
	include 'config.php';
	$srno = $_GET['id'];
	$sql = "DELETE FROM events WHERE srno = '".$srno."'";
	if(mysqli_query($link, $sql))
		header('Location: /project/');
	else echo 'ERR:'.mysqli_error($link);
?>