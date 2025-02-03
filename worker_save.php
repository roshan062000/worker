<?php
include ('worker_conn.php');
print_r($_POST);
print_r($_FILES);

//file upload
//to fetch image name
$time=time();
$image_name=$time.$_FILES['worker_image']['name'];
$imagepath="photofolder/".$image_name;
//function helps to upload file in folder
move_uploaded_file($_FILES["worker_image"]["tmp_name"],$imagepath);
//
//to store value in dbms
$worker_fname=$_POST['worker_fname'];
$worker_lname=$_POST['worker_lname'];
$worker_gender=$_POST['worker_gender'];
$work_type=$_POST['work_type'];
$worker_department=implode(",",$_POST['worker_department']);
$worker_number=$_POST['worker_number'];


//sql to check if phonenum exist

$sql_data_ex = "SELECT * FROM `worker_data` WHERE `contact` = '$worker_number'";
echo $sql_data_ex;
$dataExData=mysqli_query($mysqli,$sql_data_ex);
$numrows  = mysqli_num_rows($dataExData);
echo $numrows;
//die();

//sql to check if phonenum exist
if($numrows == 0){

    //sql query to insert data
$sql="INSERT INTO `worker_data`( `fname`, `lname`, `gender`, `work_type`, `work_department`, `contact`,`worker_photo`) VALUES ('$worker_fname','$worker_lname','$worker_gender','$work_type','$worker_department','$worker_number','$image_name')";
echo $sql;
$insertData=mysqli_query($mysqli,$sql);
if($insertData){
    echo 'inserted successfully';
}
else
{
    echo 'not inserted';
}

}

header("Location:worker_form.php");

?>