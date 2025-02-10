<?php
include('worker_conn.php');
$editid=$_GET['editid'];
$sqlEdit="SELECT * FROM `worker_data` WHERE id=$editid";
$editData=mysqli_query($mysqli,$sqlEdit);
//if($editData){
    //echo'edit successfull';
    //header("Location:worker_form.php");
//}
//else{
    //echo 'edit not successfull';
//}



//fetching single value of workers
$worker_value=$editData->fetch_assoc();
print_r($worker_value);
?>
<html>
    <body>
    <form action="update.php" method="POST" enctype="multipart/form-data" >
            <div class="worker_fname">
                <label>First Name</label>
                <input type="hidden" name="update_worker_id" value="<?php echo $worker_value['id'];?>">
                <input type="text" name="worker_fname" placeholder="Enter your first name" value="<?php echo $worker_value['fname'];?>"required>
            </div>
            <div class="worker_lname">
                <label>Last Name</label>
                <input type="text" name="worker_lname" placeholder="Enter your last name" value="<?php echo $worker_value['lname'];?>" required>
            </div>
            <div class="worker_gender">
                <label> Gender </label>
                <input type="radio" name="worker_gender" value="Male" <?php if($worker_value['gender']=="Male") { echo "checked";}?>>Male
                <input type="radio" name="worker_gender" value="Female" <?php if($worker_value['gender']=="Female") { echo "checked";}?>>Female

            </div>
            <div class="work_type">
                <label>Select your work type</label>
                <select name="work_type" >
                    <option  type="text" value="WFH" <?php if($worker_value['work_type']=="WFH") { echo "selected";}?>>WFH</option>
                    <option type="text" value="WFO"> <?php if($worker_value['work_type']=="WFO") { echo "selected";}?>WFO</option>
                </select>
            </div>
            <div class="worker_department">
                <?php echo $worker_value['work_department'];
                $department_array=(explode(",",$worker_value['work_department']));?>
                <label>Choose your department</label>
                <input type="checkbox" name="worker_department[]" value="Marketing" <?php if(in_array("Marketing",$department_array)){echo "checked";}?>>Marketing
                <input type="checkbox" name="worker_department[]" value="Sales" <?php if(in_array("Sales",$department_array)){echo "checked";}?>>Sales
                <input type="checkbox" name="worker_department[]" value="Research" <?php if(in_array("Research",$department_array)){echo "checked";}?>>Research

            </div>
            <div class="worker_number">
                <label>Contact number</label>
                <input type="number" name="worker_number" placeholder="Enter your contact number" value="<?php echo $worker_value['contact'];?>" required>

            </div>
            <div class="earlier_image">
               <img src="<?php echo "photofolder/".$worker_value['worker_photo']?>" width="50" height="50"> 
            </div>
            <div class="file_upload">
                <input type="hidden" value="<?php echo $worker_value['worker_photo']?>" name="earlier_picture">
                <label>Upload your pic</label>
                <input type="file" name="worker_image" accept="image/jpeg">

            </div>
            <div class="password">
                <label>Enter password</label>
                <input type="text" name="user_password" placeholder="Enter password" value="<?php echo $worker_value['user_password'];?>" required>

            </div>
            <div class="button">
            <input type="submit">
            </div>
        </form>
</body>
</html>