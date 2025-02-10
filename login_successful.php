<?php
include("worker_conn.php");


$user_name=$_POST['user_name'];
//echo $user_name;
$user_password=$_POST['user_password'];
//echo $user_password;
$check_data="SELECT * FROM `worker_data` WHERE `contact`='$user_name' AND `user_password`='$user_password'";
//echo $check_data;
$login_check=mysqli_query($mysqli,$check_data);
if($login_check){
    echo 'log in successful';
}
else{
    echo 'not successfull';
}
?>