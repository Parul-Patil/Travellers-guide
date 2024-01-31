<!DOCTYPE html>

<html>
<head>
	<title>Travelers Guide</title>
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
<div class="RegisForm-popup" id="myRegisForm">
		<form id="regForm" action="" method="post" class="form-container" >
    			<div id="idRegister" class="loginStyle" >
					<h1>Register</h1>
			    </div> 
				<div id="otpDiv" style="display:none">
					<div id="dvMsg" style="color:blue"></div><br>
					<label for="OTP"><b>OTP</b><span style="color:red">*</span></label>
    				<input type="text" placeholder="Enter OTP" id="OTP-code" name="OTP-code" >

					<div id="dvHTML" style="color:red"></div><br>

    				<button type="button" class="btn" id='otp-btn' name='otp-btn'>Submit</button>
    				<a id="close-btn" class="cancel" style="display:block; text-align:center" href="login_page.php">Close</a>
				</div>
				<div id="regDiv">	
    				<label for="name"><b>Name</b><span style="color:red">*</span></label>
    				<input type="text" placeholder="Enter Your Name" id="user-name" name="user-name" required>

					<label for="email"><b>Email</b><span style="color:red">*</span></label>
    				<input type="text" placeholder="Enter Email" id="email" name="email" required>

    				<label for="psw"><b>Password</b><span style="color:red">*</span></label>
    				<input type="password" placeholder="Enter Password"  id="user-password"name="user-password" required>
				
					<label for="cpsw"><b>Confirm Password</b><span style="color:red">*</span></label>
    				<input type="password" placeholder="Confirm Password" id="cpsw" name="cpsw" required>

					<div id="divError" style="color:red"></div><br>
    				<button type="button" class="btn" id='register-btn' name='register-btn'>Submit</button>
    				<a id="close-btn" class="cancel" style="display:block; text-align:center" href="login_page.php">Close</a>
				</div>
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
	
	<script>

$("#otp-btn").click(function(event){
    event.preventDefault();
	var v_otp = $("#OTP-code").val();
	
	if (v_otp == "" || v_otp == null)
	{
		document.getElementById("divError").innerHTML = "OTP not filled.";
	}
	else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText=="True"){
				location.href="login_page.php";
			}
			else
			{
				document.getElementById("dvHTML").innerHTML = "Invalid OTP, please try again.";
			}
		}
		};
		xmlhttp.open("GET", "confirmOTP.php?OTP=" + v_otp, true);
		xmlhttp.send();
	}		
  });

  $("#register-btn").click(function(event){
    event.preventDefault();

	if ($("#regForm")[0].checkValidity()){
		var v_email = $("#email").val();
		var v_password = $("#user-password").val();
		var v_name = $("#user-name").val();
		var v_cpsw = $("#cpsw").val();

		if (IsValidEmailId(v_email)==false) {
			document.getElementById("divError").innerHTML ="Not a valid email id";
			return;
		};

		if (v_password!=v_cpsw){
			document.getElementById("divError").innerHTML ="Password & confirm password mismatch";
			return;
		}

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText.indexOf("OTP") != -1){
				document.getElementById("dvMsg").innerHTML = this.responseText;
				$("#regDiv").hide();
				$("#otpDiv").show();
			}
			else { document.getElementById("divError").innerHTML = this.reponseText; }
		}
		};
		xmlhttp.open("GET", "userregistration.php?gEmail="+v_email+"&gPassword="+v_password+"&gName="+v_name, true);
		xmlhttp.send();
	}
	else
	{
		$("#regForm")[0].reportValidity();
		document.getElementById("divError").innerHTML = "Required fields are not filled.";
	}
  });

  function IsValidEmailId(vEmail)
  {
	var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  	if(!regex.test(vEmail)) {
    	return false;
  	}else{
    	return true;
  	}
  }
  
 </script>

</body>


</html>

