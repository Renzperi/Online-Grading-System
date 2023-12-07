<?php
    session_start();

    include("scripts/database.php");
    include("scripts/functions.php");

    if(isset($_POST["login"])){  //if login button is pressed

        $username = validate($_POST["username"]);
        $password = validate($_POST["password"]);

        if(empty($username) || empty($password)){
            echo "<script>window.alert(\"Missing User name or Password Input\")</script>";
        }else{
            $sql = "SELECT * FROM admin_accounts WHERE user_name = '$username' AND password = '$password'";  //checks the database for matching user and pass
            $result = mysqli_query($connection, $sql);

            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if($row["user_name"] === $username && $row["password"] === $password){
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;
                    header("Location: AdminMenu.php");
                    exit();
                }
            }else{
                echo "<script>window.alert(\"Incorrect Username or Password\")</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/loginpage.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<header>
<nav class="NavBar">
            <h2>Admin Login Menu</h2>
            <h2 class="djaphins">DJAPINHS</h2>
            <ul>
                <li><a href="loginpage.php">Accounts</a></li>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <main class="AdminLoginContainer">
        <form action="AdminLoginPage.php" method="post">
        <h2>LOGIN</h2>
            <label class="name">Username</label>
            <input type="text" name="username" placeholder="Enter a username" class="user">
            <label class="word">Password</label>
            <input type="password" name="password" id="passwordInput" placeholder="Enter a password" class="pass">
            <input type="checkbox" onclick="showPassword()" class="showpasswordbtn">
            <label></label>
            <input type="submit" name="login" value="Log in" class="btn">
            <a href="AdminRegistration.php" class="reg">Register</a>
        </form>
    </main>
    <footer>
    <p>© Copyright 2023 DJAPIHNS</p>
    </footer>

    <script src="scripts/eventListener.js"></script>
</body>
</html>