<?php
include ('worker_conn.php');
print_r($_POST);
//to store value in dbms
$worker_fname=$_POST['worker_fname'];
$worker_lname=$_POST['worker_lname'];
$worker_gender=$_POST['worker_gender'];
$work_type=$_POST['work_type'];
$worker_department=implode(",",$_POST['worker_department']);
$worker_number=$_POST['worker_number'];
//sql query to insert data
$sql="INSERT INTO `worker_data`( `fname`, `lname`, `gender`, `work_type`, `work_department`, `contact`) VALUES ('$worker_fname','$worker_lname','$worker_gender','$work_type','$worker_department','$worker_number')";
echo $sql;
$insertData=mysqli_query($mysqli,$sql);
if($insertData){
    echo 'inserted successfully';
}
else
{
    echo 'not inserted';
}
header("Location:worker_form.php");

?>