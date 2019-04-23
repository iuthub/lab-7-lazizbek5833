<?php
include('connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>My Personal Page</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		      
		<!-- Show this part after user signed in successfully -->
		<div class="logout_panel"><a href="register.php">My Profile</a>&nbsp;|&nbsp;<a href="index.php?logout=1">Log Out</a></div>
		<h2>New Post</h2>
		<?php include('errors.php') ?>
		<form action="index.php" method="post">
			<ul class="form">

				<li>
					<label for="title">Title</label>
					<input type="text" name="title" id="title" />
				</li>
				<li>
					<label for="body">Body</label>
					<textarea name="body" id="body" cols="30" rows="10"></textarea>
				</li>
				<li>
					<input type="submit" value="Post"  name="post_blog" />
				</li>
			</ul>
		</form>


		<!-- <div class="onecol">
			<div class="card">
				<h2>TITLE HEADING</h2>
				<h5>Author, Sep 2, 2017</h5>
				<p>Some text..</p>
				<p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
			</div>
		</div> -->
		
		<?php if($get_post->num_rows>0) { ?>
			<?php while($row = $get_post->fetch_assoc()){ ?>
		<div class="onecol">
			<div class="card">
				<h2><?= $row["title"]; ?></h2>
				<h5><?= date("M d , Y", strtotime($row["publish_date"])); ?></h5>
				<p>Some text..</p>
				<p><?= $row["body"] ;?></p>
			</div>
		</div>
	<?php } ?>
   <?php } ?>

	</body>
</html>