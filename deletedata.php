<?php
include('worker_conn.php');
//to get data by id
$deleteid=$_GET['deleteid'];
//to deleted data

$sqlDelete="DELETE FROM `worker_data` WHERE id=$deleteid";
$deleteData=mysqli_query($mysqli,$sqlDelete);
if($deleteData){
    echo 'deleted';
    header("Location:worker_form.php");
}
else
{
    echo 'not deleted';
}
?>