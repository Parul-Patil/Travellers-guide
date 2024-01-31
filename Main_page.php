<!DOCTYPE html>
<html>
<head>
	<title>Traveller's Guide</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="Main_page_style.css">
	<script src="jquery-3.3.1.js" type="text/javascript"></script>
</head>
<script>
	if(window.history.replaceState)
	{
		window.history.replaceState(null,null,window.location.href);
	}
</script>
<body id="idMainBody">
	<?php
		session_start();
		if (isset($_SESSION["username"])) {
			$username = $_SESSION["username"];
			//session_write_close();
		}
	?>
	<div class="header">
		<h1>Travelers Guide</h1>
		<ul class="headerul-nav">
		  <?php if (!empty($username)) : ?>
			
			<li class="headerli-nav" id="userNM"><a href="#"><?= $username; ?></a></li>
			<li class="headerli-nav" id="logout"><a id="btnLogout" style= "cursor : pointer">Logout</a></li>
			<li class="headerli-nav" id="about"><a href="#about">About</a></li>
			<li class="headerli-nav" id="home"><a href="Main_page.php">Home</a></li>
		  	

		  <?php else : ?>
			<li class="headerli-nav" id="login"><a id="myBtn" href="login_page.php" style= "cursor : pointer">Login</a></li>
		  	<li class="headerli-nav" id="about"><a href="#about">About</a></li>
		  	<li class="headerli-nav" id="home"><a href="Main_page.php">Home</a></li>
		  	
			<?php endif; ?>
		</ul>	
		<div>
		<ul class="ul-nav">
		</ul>
	</div>
	</div>
	<!-- <div>
		<ul class="ul-nav">
		  <li class="li-nav"><a href="#restraunts">Restraunts</a></li>
		  <li class="li-nav"><a href="#forts">Forts</a></li>
		  <li class="li-nav"><a href="#parks">Parks</a></li>
		</ul>
	</div> -->
	<div id="image-container">
		<div class="img-container">
			<h1>Go where your heart takes you!</h1>
		</div>
	</div>
	<div id="container">
		<div class = "container">
			<a href="karnataka/karanataka.php"><img src="images/kolkata.jpg" class = "images" alt="Karnataka">
			<div class="title">
				<h2>Karnataka</h2>
			</div></a>
		</div>
		<div class = "container">
			<a href="Maharashtra/Maharashtra.php"><img src="images/Maharashtra.jpg" class = "images" alt="Dagdusheth">
			<div class="title">
				<h2>MAHARASHTRA</h2>
			</div></a>
		</div>
		<!-- <div class = "container">
			<img src="images/kashmir.jpg" class = "images">
			<div class="title">
				<h2>JAMMMU & KASHMIR</h2>
			</div>
		</div>	 -->
		<!-- <div class = "container">
			<img src="images/punjab.jpg" class = "images">
			<div class="title">
				<h2>PUNJAB</h2>
			</div>
		</div> -->
		<!-- <div class = "container">
			<img src="images/madhya pradesh.jpg" class = "images">
			<div class="title">
				<h2>MADHYA PRADESH</h2>
			</div>
		</div> -->
		<div class = "container">
			<a href="Gujrat/Gujrat.php"><img src="images/rajasthan.jpg" class = "images">
			<div class="title">
				<h2>GUJRAT</h2>
			</div></a>
		</div>
	</div>
	<div id="footer">
		
	</div>
	<script>
		$("#btnLogout").click(function(event){
			event.preventDefault();
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				location.href="Main_page.php";
				}
			};

			xmlhttp.open("GET", "logout.php", true);
			xmlhttp.send();
		});	
  	</script>	
</body>
</html>