<?php
session_start();
include('worker_conn.php');
$roshan = "Girl";
echo $roshan;
$_SESSION["favcolor"] = "green";

?>

<html>
    <title>Worker Data Submit  BY AJAX  </title>
    <body>
        <h4>Workers Detail form</h4>
            <div class="worker_fname">
                <label>First Name</label>
                <input type="text" name="worker_fname" id="worker_fname" placeholder="Enter your first name" >
            </div>
            <div class="worker_lname">
                <label>Last Name</label>
                <input type="text" name="worker_lname" id="worker_lname" placeholder="Enter your last name" >
            </div>
            <div class="worker_gender">
                <label> Gender </label>
                <input type="radio" name="worker_gender" id="worker_gender" value="Male">Male
                <input type="radio" name="worker_gender" id="worker_gender" value="Female">Female

            </div>
            <div class="work_type">
                <label>Select your work type</label>
                <select name="work_type" id="work_type"  >
                    <option  type="text" value="WFH">WFH</option>
                    <option type="text" value="WFO">WFO</option>
                </select>
            </div>
            <div class="worker_department">
                <label>Choose your department</label>
                <input type="checkbox" name="worker_department" id="work_type" value="Marketing">Marketing
                <input type="checkbox" name="worker_department" id="work_type" value="Sales">Sales
                <input type="checkbox" name="worker_department" id="work_type" value="Research">Research

            </div>
            <div class="worker_number">
                <label>Contact number</label>
                <input type="number" name="worker_number" id="worker_number" placeholder="Enter your contact number" >

            </div>
            <div class="image_upload">
                <label>Upload your pic</label>
                <input type="file" name="worker_image" id="worker_image" accept="image/jpeg">

            </div>
            <div class="password">
                <label>Enter password</label>
                <input type="text" name="user_password" id="user_password" placeholder="Enter password" >

            </div>
            <span id="error_message"></span>
            <div class="button">
            <button onclick="submitdata()">Submit </button>
            </div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function submitdata(){
            var worker_fname = $("#worker_fname").val();
            var worker_lname = $("#worker_lname").val();
            var worker_number = $("#worker_number").val();
            var user_password = $("#user_password").val();

            //for radio button
            var user_gender = $('input[name="worker_gender"]:checked').val();

           

            //console.log($('input[name="worker_department"]:checked').serialize());
            var store_worker_department = new Array();
            $('input[name="worker_department"]:checked').each(function() {
            //console.log(this.value);
            store_worker_department.push(this.value)
            });

            console.log(store_worker_department);

            if(worker_fname === ""){
                $("#error_message").html("Hey please Enter Your first name").css('color',"red");
                //alert("Hey please Enter Your first name");
                 setTimeout(function () {
                     $('#error_message').html('');
                 }, 2000);
                return false;
            }

            if(user_gender === "" || user_gender === undefined){
                $("#error_message").html("Hey please Enter Your Gender").css('color',"red");
            //alert("Hey please Enter Your first name");
                setTimeout(function () {
                    $('#error_message').html('');
                }, 2000);
            return false;
            }

                    $.ajax({
                    type: 'POST', // method
                    url: "worker_save_ajax.php", // url 
                    data: {worker_fname:worker_fname,worker_lname:worker_lname,worker_number:worker_number,user_password:user_password,user_gender:user_gender,store_worker_department:store_worker_department},
                    success: function() { alert("Save Complete") }
                     });
                    //saveData.error(function() { alert("Something went wrong"); });

         
        }

    </script>
    </body>





 
</html>
