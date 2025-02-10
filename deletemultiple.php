<?php
include("worker_conn.php");
$delete_multiple_id=$_REQUEST['multiple_delete'];
echo count($delete_multiple_id);
for($i=0; $i<count($delete_multiple_id);$i++ ){
   //echo $delete_multiple_id[$i]."<br>";

$multi_delete_sql="DELETE FROM `worker_data` WHERE id=$delete_multiple_id[$i]";
$delete_row=mysqli_query($mysqli,$multi_delete_sql);
if($delete_row){
    echo 'row deleted';
}
else{
    echo'row not deleted';
}
}
header("Location:worker_form.php");



?>