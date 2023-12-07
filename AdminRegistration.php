<?php

    include("scripts/database.php");
    include("scripts/functions.php");

    if(isset($_POST["register"])){
        $adminID = validate($_POST["adminID"]);
        $userName = validate($_POST["username"]);
        $fullName = validate($_POST["fullName"]);

        $password = validate($_POST["password"]);

        if(!empty($adminID) && !empty($userName) && !empty($password) && !empty($fullName)){
            try{
                adminRegisterAcc($adminID ,$userName, $password, $fullName, $connection);
                echo "<script>window.alert(\"Registered Successfully!\")</script>";
            }catch(mysqli_sql_exception){
                echo "<script>window.alert(\"Registration Failed: That user name already exist\")</script>";
            }
        }else{
            echo "<script>window.alert(\"Registration Failed: Missing field values\")</script>";
        }
    }

    if(isset($_POST["delete"])){
        $adminID = validate($_POST["adminID"]);
        $name = validate($_POST["name"]);
        
        if(!empty($adminID) && !empty($name)){
            try{
                terminateAdminAcc($adminID, $name, $connection);
                echo "<script>window.alert(\"Account Deleted Successfully!\")</script>";
            }catch(mysqli_sql_exception){
                echo "<script>window.alert(\"Account Deletion Failed: That account does not exist\")</script>";
            }
        }else{
            echo "<script>window.alert(\"Account Deletion Failed: Missing field values\")</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu</title>
    <link rel="stylesheet" href="css/AdminRegistration.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <nav class="NavBar">
            <h2>Admin Registration Menu</h2>
            <h2 class="djaphins">DJAPINHS</h2>
            <ul>
                <li><a href="AdminLoginPage.php">Admin Login Menu</a></li>
                <li><a href="index.php">Home Menu</a></li>
            </ul>
        </nav>
    </header>

    <main class="AccTableContainer">
        <table border="1px">
            <tr>
                <?php
                    $sql = mysqli_query($connection, "SHOW COLUMNS FROM admin_accounts");
                    while($TBLheaders = mysqli_fetch_array($sql)){
                ?>
                    <th><?php echo $TBLheaders[0];?></th>
                <?php
                    }
                ?>
            </tr>
            <?php
                $getRecords = mysqli_query($connection, "SELECT * FROM admin_accounts ORDER BY Name");
                while($row = mysqli_fetch_row($getRecords)){
            ?>
                <tr>
                    <?php
                        for($i = 0; $i <= 3; $i++){
                    ?>
                        <td><?php echo $row[$i];?></td>
                    <?php
                        }
                    ?>
                </tr>
            <?php
                }
            ?>
        </table>
    </main>

    <section class="AdminFormContainer">
        <form action="AdminRegistration.php" method="post">
        <h2>Register User Account</h2>

           <label class="US">Admin ID</label>
           <input type="text" name="adminID" placeholder="0000" class="ID"> <br>

           <label class="NM">Username</label>
            <input type="text" name="username" placeholder="pick a username.." class="use"> <br>

            <label class="Ps">Password</label>
            <input type="text" name="password" placeholder="password" class="pas"> <br>

            <label class="FL">Full Name</label>
            <input type="text" name="fullName" placeholder="e.g(Mark Aldrin B. Acebo)" class="fl"> <br>
            
            <button type="submit" name="register" class="btn">SUBMIT</button>
        </form>
    </section>

    <section class="DeleteAccFormContainer">
        <form action="AdminRegistration.php" method="post">
            <h2>Terminate Account</h2>
            <label class="enter">Enter Admin ID</label>
            <input type="text" name="adminID" placeholder="Enter ID" class="id"  style="color: black;"> <br>

            <label class="LN">Enter Name</label>
            <input type="text" name="name"  placeholder="Enter Admin name" class="ln"  style="color: black;"> <br>

            <button type="submit" name="delete" class="btn"
                    onclick="return confirm('Are you sure you want to delete this account?');">
                DELETE
            </button>
        </form>
    </section>

    
</body>
</html>

