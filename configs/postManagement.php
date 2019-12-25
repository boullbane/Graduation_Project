<?php
	require 'db.php';
	$operation = $_POST['operation'];
	if($operation == "add post"){
		$title = $_POST['title'];
		$type = $_POST['type'];
		$content = $_POST['content'];
		$img_url = $_POST['img_url'];
		$date = $_POST['date'];
		$user_id = $_POST['user_id'];
		$query = $db->query("INSERT INTO posts values('','$title','$type','$content','$img_url','$date','$user_id')");
		echo "post added successfully";
	}
	else if ($operation == "edit post"){
		$title = $_POST['title'];
		$type = $_POST['type'];
		$content = $_POST['content'];
		$img_url = $_POST['img_url'];
		$date = $_POST['date'];
		$user_id = $_POST['user_id'];
		$query = $db->query("UPDATE posts SET type = '$type',content = '$content',img_url = '$img_url',date = '$date' WHERE title = '$title'");
		echo "post edited successfully";
	}
	else if ($operation == "delete post"){
		$title = $_POST['title'];
		$query = $db->query("DELETE FROM `posts` WHERE `title` = '$title'");
		echo "post deleted successfully";
	}
?>