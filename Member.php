<?php
include 'connection.php';
class Member
{

    /**
     * To login a user
     *
     * @return string
     */
    public function loginMember()
    {
        $email=$_POST["email"];
        $password=$_POST["login-password"];
        $con = mysqli_connect('localhost','root','','mysql');
        $checkquery = "SELECT * FROM logindata WHERE Email='$email' AND password='$password'";
        $check = mysqli_query($con,$checkquery);
        if (mysqli_num_rows($check)>0){
            // login sucess so store the member's username in
            // the session
            $recSet=$check->fetch_row();
            session_start();
            $_SESSION["username"] = $recSet[2];
            //session_write_close();
            return $recSet;
        } else {
            $loginStatus = "";  //Invalid username or password.";
            return $loginStatus;
        }
    }

    
}