<?php
    session_start();

    include("scripts/database.php");
    include("scripts/functions.php");

    if(isset($_POST["confirm"])){
        $userName = validate($_POST["user_name"]);
        $userID = validate($_POST["accountID"]);

        $newpassword = null;
        $initpass = validate($_POST["initpass"]);
        $confpass = validate($_POST["confpass"]);

        if($initpass == $confpass){
            $newpassword = $confpass;

            if(!empty($userName) && !empty($userID) && !empty($newpassword)){
                changePassword($newpassword, $userID, $userName, $connection);
                echo "<script>window.alert(\"Password changed successfully\")</script>";
            }else{
                echo "<script>window.alert(\"Password does not match\")</script>";
            }
            
        }else{
            echo "<script>window.alert(\"Password change failed: Missing field values!\")</script>";
        }

        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu</title>
    <link rel="stylesheet" href="css/changepassword.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <nav class="NavBar">
            <h2>Password Change Menu</h2>
         <h2 class="djaphins">DJAPINHS</h2>
            <ul>
                <li><a href="loginpage.php">Login Menu</a></li>
                <li><a href="index.php">Home Menu</a></li>
            </ul>
        </nav>
    </header>

    <main class="changePasswordFormCont">
        <form action="changePasswordPage.php" method="post" class="changepasswordform">
            <label>Enter Username</label>
            <input type="text" name="user_name" class="use_name"> <br>

            <label>Enter Account ID</label>
            <input type="text" name="accountID" class="accID"> <br>

            <label>New Password</label>
            <input type="text" name="initpass" class="newpass"> <br>

            <label>Confirm Password</label>
            <input type="text" name="confpass" class="conpass"> <br>

            <button type="submit" name="confirm" class="btn">CONFIRM</button>
        </form>
    </main>

    <footer>
    <p>© Copyright 2023 DJAPIHNS</p>
    </footer>
</body>
</html>

