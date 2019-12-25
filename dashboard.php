<?php 
	session_start();
	require 'configs/db.php';
	if (isset($_SESSION['id'])){
		$admin_id = $_SESSION['id'];
		$query = $db->query("select * from users where user_id = '$admin_id'");
		$result = $query->fetch_assoc();
	}
	else {
		header('Location: login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to the dashboard</title>
	<link rel="shortcut icon" href="images/Blogo.png">
	<link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
	<div class="container">
		<div class="left-side">
			<div class="admin-picture">
				<img src="<?php echo $result['admin_img']; ?>" alt="">
			</div>
			<h2>
				<?php echo $result['name']; ?> <span>admin</span>
			</h2>
			<nav id="navbar">
				<ul>
					<li class="active">view posts</li>
					<li>add post</li>
					<li>edit post</li>
					<li>delete post</li>
					<li id="logout">log out</li>
				</ul>
			</nav>
		</div>
		<div class="right-side">
			<div class="grid">
				<?php
					$query = $db->query("SELECT * FROM posts");
					while($row = $query->fetch_assoc()){
						echo "<a href='post.php?id=$row[post_id]' target='_blank' class='grid-item $row[type]'>
								<div class='grid-item'>
								<div class='image-placeholder'><img src='$row[img_url]'></div>
								<h1>$row[title]</h1>
								</div>
									</a>";
					}
				?>
			</div>
			<!-- adding posts -->
			<div class="post-managements">
				<h1 id="operation">adding posts</h1>
				<form>
					<div class="post-select">
						<label for="">post title</label>
						<select name="" class="post-title">
							<?php 
								$query = $db->query("SELECT title FROM posts ");
								while($row = $query->fetch_assoc()){
									echo "<option value='$row[title]'>$row[title]</option>";
								}
							 ?>
						</select>
					</div>
					<div id="post-select">
						<label for="">post title</label>
						<input type="text" id="post-title">
					</div>
	<!-- 				<div>
						<label for="">owner</label>
						<select name="" id="">
							<option value=""></option>
						</select>
					</div> -->
					<div>
						<label for="">preview image url</label>
						<select name="" id="img_url">
							<?php 
								$directory = "images/";
								$images = glob($directory . "*.jpg");

								foreach($images as $image)
								{
								  echo "<option value='$image'>$image</option>";
								}
							 ?>
						</select>
					</div>
					<div>
						<label for="">post type</label>
						<select name="" id="type">
							<option value="">web design</option>
							<option value="">programming languages</option>
							<option value="">new technologies</option>
							<option value="">mobile</option>
							<option value="">courses</option>
						</select>
					</div>
					<div>
						<label for="">post date</label>
						<input type="text" id="date">
					</div>
					<div>
						<label for="">content</label>
						<textarea name="" id="content" cols="30" rows="10"></textarea>
					</div>
					<button id="btn-op">add post</button>
					<input type="hidden" id="session" data-value="<?php echo $_SESSION['id']; ?>">
				</form>
			</div>
		</div>
	</div>
	<script src="bower_components/jquery/dist/jquery.min.js"></script>
	<script src="js/dashboard.js"></script>
</body>
</html>