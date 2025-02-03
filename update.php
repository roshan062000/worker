<?php
include('worker_conn.php');
print_r($_POST);
//for image
print_r($_FILES);
echo $_POST['earlier_teacher_picture'];

$worker_fname=$_POST['worker_fname'];
$worker_lname=$_POST['worker_lname'];
$worker_gender=$_POST['worker_gender'];
$work_type=$_POST['work_type'];
$worker_department=implode(",",$_POST['worker_department']);
$worker_number=$_POST['worker_number'];
//for id update
$update_worker_id=$_POST['update_worker_id'];

// for image upload
if($_FILES['error'] == 0){
    //removing earlier image from folder
    $image_unlink="photofolder/".$_POST['earlier_teacher_picture'];
    unlink($image_unlink);
    //updating the new image
    $time=time();
    $image_name=$time.$_FILES['worker_photo']['name'];
    $imagepath="photofolder/".$image_name;
    //function help to upload file in folder
    move_uploaded_file($_FILES["worker_photo"]["tmp_name"],$imagepath);
}
else{
    //if the user is not updating the image
    $image_name=$_POST['earlier_teacher_picture'];
}
//sql insertion of data
$sql="UPDATE `worker_data` SET `fname`='$worker_fname',`lname`='$worker_lname',`gender`='$worker_gender',`work_type`='$work_type',`work_department`='$worker_department',`contact`='$worker_number',`worker_photo`='$image_name' WHERE id=$update_worker_id";
echo $sql;
$updateData=mysqli_query($mysqli,$sql);
if($updateData){
    echo 'data updated';
    header("Location:worker_form.php");
}
else{
    echo 'data not updated';
}


?>