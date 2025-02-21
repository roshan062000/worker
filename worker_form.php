<?php
session_start();
include('worker_conn.php');
$roshan = "Girl";
echo $roshan;
$_SESSION["favcolor"] = "green";

?>

<html>
    <title>Workers data</title>
    <body>
        <h4>Workers Detail form</h4>
        <form action="worker_save.php" method="POST" enctype="multipart/form-data">
            <div class="worker_fname">
                <label>First Name</label>
                <input type="text" name="worker_fname" placeholder="Enter your first name" required>
            </div>
            <div class="worker_lname">
                <label>Last Name</label>
                <input type="text" name="worker_lname" placeholder="Enter your last name" required>
            </div>
            <div class="worker_gender">
                <label> Gender </label>
                <input type="radio" name="worker_gender" value="Male">Male
                <input type="radio" name="worker_gender" value="Female">Female

            </div>
            <div class="work_type">
                <label>Select your work type</label>
                <select name="work_type" >
                    <option  type="text" value="WFH">WFH</option>
                    <option type="text" value="WFO">WFO</option>
                </select>
            </div>
            <div class="worker_department">
                <label>Choose your department</label>
                <input type="checkbox" name="worker_department[]" value="Marketing">Marketing
                <input type="checkbox" name="worker_department[]" value="Sales">Sales
                <input type="checkbox" name="worker_department[]" value="Research">Research

            </div>
            <div class="worker_number">
                <label>Contact number</label>
                <input type="number" name="worker_number" placeholder="Enter your contact number" required>

            </div>
            <div class="image_upload">
                <label>Upload your pic</label>
                <input type="file" name="worker_image" accept="image/jpeg">

            </div>
            <div class="password">
                <label>Enter password</label>
                <input type="text" name="user_password" placeholder="Enter password" required>

            </div>
            <div class="button">
            <input type="submit">
            </div>
        </form>
        <h4> Worker detail table</h4>
        
        <form method="POST" action="deletemultiple.php">
        <div class="button">
            <input type="submit" value="Multiple Delete" >

        </div>
        <table>
            <style> table th,td {border:1px, solid black;}</style>
            <th>
                <td>multiple Delete</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Gender</td>
                <td>Work type</td>
                <td>Work Department</td>
                <td>Contact</td>
                <td>Image</td>
                <td>Password</td>
                <td>Action</td>
               
            </th>
            <?php
            $sql_fetchdata="SELECT * FROM `worker_data`";
            $result=mysqli_query($mysqli,$sql_fetchdata);
            while($rows=$result->fetch_assoc())
            {?>
                <tr>
                    <td><input type="checkbox" name="multiple_delete[]" value="<?php echo $rows['id'];?>"></td>
                    <td><?php echo $rows['id'];?></td>
                    <td><?php echo $rows['fname'];?></td>
                    <td><?php echo $rows['lname'];?></td>
                    <td><?php echo $rows['gender'];?></td>
                    <td><?php echo $rows['work_type'];?></td>
                    <td><?php echo $rows['work_department'];?></td>
                    <td><?php echo $rows['contact'];?></td>
                    <td><img src="<?php echo "photofolder/".$rows['worker_photo'];?>" width="50" height="50"></td>
                    <td><?php echo $rows['user_password'];?></td>
                    <td><a href="editdata.php?editid=<?php echo $rows['id'];?>">Edit</a>
                    <a href="deletedata.php?deleteid=<?php echo $rows['id'];?>">Delete</a> </td>
                </tr>

           <?php } ?>
            
        </table>
     </form>
    </body>





 
</html>
