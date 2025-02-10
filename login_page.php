<?php
include('worker_conn.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login_successful.php" method="POST">
        <div class="user_name">
            <label>Enter user name</label>
            <input type="number" name="user_name" placeholder="Enter user name" required>
        </div>
        <div class="user_password">
            <label>Enter password</label>
            <input type="text" name="user_password" placeholder="Enter user password" required>
        </div>
        <div class="button">
            <input type="submit">
        </div>
    </form>
</body>
</html>