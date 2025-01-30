<?php
include('worker_conn.php');
$editid=$_GET['editid'];
$sqlEdit="SELECT * FROM `worker_data` WHERE id=$editid";
$editData=mysqli_query($mysqli,$sqlEdit);
if($editData){
    echo'edit successfull';
    header("Location:worker_form.php");
}
//fetching single value of workers
$worker_value=$editData->fetch_assoc();
?>