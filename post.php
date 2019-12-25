<?php 
	require 'configs/db.php';
	$query = $db->query("SELECT * FROM posts,users WHERE posts.user_id = users.user_id and post_id = $_GET[id]");
	$result = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $result['title']; ?></title>
	<link rel="shortcut icon" href="images/Blogo.png">
	<link rel="stylesheet" href="css/post.css">
</head>
<body>
	<div class="container">
		<h1 id="title"><?php echo $result['title']; ?></h1>
		<?php echo $result['content']; ?>
		<div class="owner">
			<div class="owner-pic">
				<img src="<?php echo $result['admin_img']; ?>" alt="">
			</div>
			<span id="owner-name">written by, <br><?php echo $result['name']; ?>.</span>
			<p id="date"><?php echo $result['date']; ?></p>
		</div>
	</div>
</body>
</html>