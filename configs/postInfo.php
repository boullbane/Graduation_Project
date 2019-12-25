<?php 
	require 'db.php';
	$query = $db->query("SELECT * FROM posts WHERE title = '$_POST[title]'");
	$result = $query->fetch_assoc();
	echo json_encode($result);
?>