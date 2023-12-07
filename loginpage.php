<?php
    session_start();

    include("scripts/database.php");
    include("scripts/functions.php");

    if(isset($_POST["login"])){   //if the login button is pressed

        $_SESSION["username"] = validate($_POST["username"]);
        $_SESSION["password"] = validate($_POST["password"]);

        $username = validate($_POST["username"]);
        $password = validate($_POST["password"]);

        if(empty($username) || empty($password)){      
            echo "<script>window.alert(\"Missing User name or Password Input\")</script>";                                      //will check if username or password is empty
        }else{                 //will execute the login process
            $sql = "SELECT * FROM user_accounts WHERE user_name = '$username' AND password = '$password'";  //checks if the username and password exists
            $result = mysqli_query($connection, $sql);                                                      //in the database.   

            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if($row["user_name"] === $username && $row["password"] === $password){
                    if($row["acc_type"] == "teacher" || $_SESSION["accountType"] == "teacher"){
                        $_SESSION["username"] = $username;
                        $_SESSION["password"] = $password;
                        $_SESSION["accountID"] = $row["Account_ID"];
                        header("Location: TeachersMenu.php?id={$_SESSION["accountID"]}");
                    }else{
                        $_SESSION["username"] = $username;
                        $_SESSION["password"] = $password;
                        $_SESSION["accountID"] = $row["Account_ID"];
                        header("Location: StudentsMenu.php?id={$_SESSION["accountID"]}");
                    }
                }
            }else{                                 //will return to login page if no account is found
                echo "<script>window.alert(\"Incorrect User name or Password\")</script>"; 
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts Page</title>
    <link rel="stylesheet" href="css/loginpage.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
    <nav class="NavBar">
            <h2>Accounts</h2>
            <h2 class="djaphins">DJAPINHS</h2>
            <ul>
                <li><a href="AdminLoginPage.php">Admin Menu</a></li>
                <li><a href="index.php">Home Menu</a></li>
                
            </ul>
        </nav>
    </header>

    <main class="LoginFormContainer">
        <form action="loginpage.php" method="post" autocomplete="off">
            <h2>LOGIN</h2>
            <label class="name">Username</label>
            <input type="text" name="username" placeholder="Enter a username" class="user">
            <label class="word">Password</label>
            <input type="password" name="password" id="passwordInput" placeholder="Enter a password" class="pass"> <br>
            <label class="showpassword"></label>
            <input type="checkbox" onclick="showPassword()" class="showwpasswordbtn">
            <input type="submit" name="login" value="Log in" class="btn">
            <a href="changePasswordPage.php" class="change">Change Password</a>
        </form>
    </main>

    <footer>
    <p>© Copyright 2023 DJAPIHNS</p>
    </footer>

    <script src="scripts/eventListener.js"></script>
</body>
</html>
