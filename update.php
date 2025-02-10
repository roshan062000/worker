<?php
include('worker_conn.php');

//for image


$worker_fname=$_POST['worker_fname'];
$worker_lname=$_POST['worker_lname'];
$worker_gender=$_POST['worker_gender'];
$work_type=$_POST['work_type'];
$worker_department=implode(",",$_POST['worker_department']);
$worker_number=$_POST['worker_number'];
$user_password=$_POST['user_password'];
//for id update
$update_worker_id=$_POST['update_worker_id'];

// for image upload
if($_FILES['worker_image']['error'] == 0){
    //removing earlier image from folder
    $image_unlink="photofolder/".$_POST['earlier_picture'];
    unlink($image_unlink);
    //updating the new image
    $time=time();
    $image_name=$time.$_FILES['worker_image']['name'];
    $imagepath="photofolder/".$image_name;
    //function help to upload file in folder
    move_uploaded_file($_FILES["worker_image"]["tmp_name"],$imagepath);
}
else{
    //if the user is not updating the image
    $image_name=$_POST['earlier_picture'];
}

//for updating number
$update_number="SELECT * FROM `worker_data` WHERE `contact`='$worker_number'";
$updateNumber=mysqli_query($mysqli,$update_number);
$numrows = mysqli_num_rows($updateNumber);
//echo $numrows; die();
if($numrows==0){
        $sql="UPDATE `worker_data` SET `fname`='$worker_fname',`lname`='$worker_lname',`gender`='$worker_gender',`work_type`='$work_type',`work_department`='$worker_department',`contact`='$worker_number',`worker_photo`='$image_name',`user_password`='$user_password' WHERE id=$update_worker_id";

    $updateData=mysqli_query($mysqli,$sql);
    header("Location:worker_form.php");


} else if ($numrows==1) {

         $sql="UPDATE `worker_data` SET `fname`='$worker_fname',`lname`='$worker_lname',`gender`='$worker_gender',`work_type`='$work_type',`work_department`='$worker_department',`contact`='$worker_number',`worker_photo`='$image_name',`user_password`='$user_password' WHERE id=$update_worker_id";

          $updateData=mysqli_query($mysqli,$sql);
          header("Location:worker_form.php");

}

//sql insertion of data



?>