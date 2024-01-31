<?php
include 'connection.php';
include 'Member.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	//echo "<script>alert('login pressed') </script>";	
    
    $member = new Member();
    $loginResult = $member->loginMember();
}
?>
<HTML>
<HEAD>
<TITLE>Login</TITLE>

<link rel="stylesheet" href="Main_page_style.css">
<script src="jquery-3.3.1.js" type="text/javascript"></script>
</HEAD>
<BODY>
		<div class="form-popup" id="myForm">
  			<form action="" method="post" class="form-container" >
				<?php 
				if(!empty($loginResult))
				{
					$url = "Main_page.php";  
					header("Location: $url");
				}
				?>		

    			<div id="idLogin" class="loginStyle" >
					<h1>Login</h1>
				</div> 

    				<label for="email-info"><b>Email</b></label>
    				<input type="text" placeholder="Enter Email" id="email" name="email" required>

    				<label for="login-password-info"><b>Password</b></label>
    				<input type="password" placeholder="Enter Password" id="login-password" name="login-password" required>

    				<button type="submit" id="login-btn" name="login-btn" class="btn">Login</button>
    				<a id="close-btn" class="cancel" style="display:block; text-align:center" href="Main_page.php">Close</a>
					
				<p>Don't have an account? <a id="myRBtn" class= "regisLinkStyle" href="registration.php">REGISTER NOW!!</a></p>

  			</form>
		</div>

	<div class="header">
		<h1>Travelers Guide</h1>
		<ul class="headerul-nav">
			<li class="headerli-nav" id="login"><a id="myBtn" href="login_page.php" style= "cursor : pointer">Login</a></li>
		  	<li class="headerli-nav" id="about"><a href="#about">About</a></li>
		  	<li class="headerli-nav" id="home"><a href="#Home">Home</a></li>
		</ul>	
	</div>
			
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
		
		<div class = "container">
			<a href="Gujrat/Gujrat.php"><img src="images/rajasthan.jpg" class = "images">
			<div class="title">
				<h2>GUJRAT</h2>
			</div></a>
		</div>
	</div>
	<div id="footer">
		
	</div>	

</BODY>
</HTML>
