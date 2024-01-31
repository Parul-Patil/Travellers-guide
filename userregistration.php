<?php
$email = $_REQUEST["gEmail"];
$password = $_GET["gPassword"];
$name = $_GET["gName"];

include 'connection.php';

$con = mysqli_connect('localhost','root','','mysql');
$checkquery = "SELECT * FROM logindata WHERE Email='$email'";
$check = mysqli_query($con,$checkquery);
if (mysqli_num_rows($check)>0){
    echo "Email already exist!";  
}
else 
{
    $insertQuery = "INSERT INTO logindata VALUES ('$email','$password','$name')";
    $insCheck = mysqli_query($con,$insertQuery);
	echo "Email test!";
    if ($insCheck==TRUE){
        $subject = "msg : OTP for registration to Traveller's Guide";
        $genrateotp = rand(1000,9999);
        $headers = "From: parul.k.patil@gmail.com";

        if(mail($email, $subject, $genrateotp, $headers))
        {
            session_start();
            $_SESSION["otp"]=$genrateotp;
            session_write_close();
			echo "genrateotp display";

        }
        else
        {
              echo "Email sending failed";
        }
        }
    else
    {
    echo "Invalid inputs, Error while storing data!";
    }
} 


?>