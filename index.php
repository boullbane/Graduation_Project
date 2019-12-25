<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to the blog</title>
	<link rel="shortcut icon" href="images/Blogo.png">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="container">
		<header>
			<h1 class="lg-heading">Welcome to the blog,<br>Enjoy reading.</h1>
			
				<ul class="menu">
					<li class="menu-item">all</li>
					<li class="menu-item">web design</li>
					<li class="menu-item">programming languages</li>
					<li class="menu-item">new technologies</li>
					<li class="menu-item">mobile</li>
					<li class="menu-item">courses</li>
				</ul>
		</header>
		<main>
			<div class="grid">
				<?php
					require 'configs/db.php';
					$query = $db->query("SELECT * FROM posts");
					while($row = $query->fetch_assoc()){
						echo "<a href='post.php?id=$row[post_id]' target='_blank' class='grid-item all ".str_replace(' ', '', $row['type'])."'>
								<div class='grid-item'>
								<div class='image-placeholder'><img src='$row[img_url]'></div>
								<h2>$row[title]</h2>
								</div>
									</a>";
					}
				?>
			</div>
			<!-- <button>load more</button> -->
		</main>
	</div>
	<script src="bower_components/jquery/dist/jquery.min.js"></script>
	<script src="bower_components/isotope-layout/dist/isotope.pkgd.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>