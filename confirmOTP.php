<?php
$formOTP = $_REQUEST["OTP"];
session_start();
$OTP=$_SESSION["otp"];
session_write_close();

if($formOTP==$OTP)
{ echo "True";}
else
{ echo "False";}
?>
