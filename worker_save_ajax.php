<?php 
//used for including the connection in the page
include ('worker_conn.php');


print_r($_REQUEST); 
//to store value in dbms
$worker_fname=$_POST['worker_fname'];
$worker_lname=$_POST['worker_lname'];
$worker_number=$_POST['worker_number'];
$user_password=$_POST['user_password'];
$user_gender=$_POST['user_gender'];
$user_department=implode(",",$_POST['store_worker_department']);


$sql="INSERT INTO `worker_data`( `fname`, `lname`,  `contact`,`user_password`,`gender`,`work_department`) VALUES ('$worker_fname','$worker_lname','$worker_number','$user_password','$user_gender','$user_department')";

//echo $sql; die();

//insert data to db
$insertData=mysqli_query($mysqli,$sql);


if($insertData){
    echo 'inserted successfully';
}
else
{
    echo 'not inserted';
}


?>