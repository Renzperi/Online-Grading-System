<?php
    session_start();

    include("scripts/database.php");
    include("scripts/functions.php");

    if(isset($_POST["logout"])){ //if logout button is pressed
        session_destroy();
        header("Location: AdminLoginPage.php"); //returns to admin login page after logging out
        exit();
    }elseif(isset($_POST["home"])){
        session_destroy();
        header("Location: index.php");
        exit();
    }elseif(isset($_POST["goToArchive"])){
        header("Location: ArchiveMenu.php");
    }

    if(isset($_POST["register"])){
        $userID = validate($_POST["userID"]);
        $accType = $_POST["accType"];
        $userName = validate($_POST["username"]);
        $fullName = validate($_POST["fullName"]);
        $password = validate($_POST["password"]);;
       

        $strand = $_POST["strand"];

        if($accType == "teacher" ||  $strand == "FACULTY"){
            $strand = "FACULTY";
            $accType = "teacher";
        }elseif($accType != "teacher" && $strand != "FACULTY"){
            $strand = $strand;
            $accType = $accType;
        }

        if(!empty($userID) && !empty($userName) && !empty($password) && !empty($strand) && !empty($fullName)){
            try{
                $checkIfUserNameExistInArchive = mysqli_query($connection, "SELECT * FROM archive_user_accounts 
                                                                            WHERE Account_ID = '$userID'
                                                                            OR   user_name = '$userName'");

                if(mysqli_num_rows($checkIfUserNameExistInArchive) === 0){
                    registerAcc($userID, $accType, $userName, $password, $fullName, $strand, $connection);
                    echo "<script>window.alert(\"Account Registered Successfully!\")</script>";
                }else{
                    echo "<script>window.alert(\"Registration Failed: That username or ID already exists\")</script>";
                }
                
            }catch(mysqli_sql_exception){
                echo "<script>window.alert(\"Registration Failed: That username already exists\")</script>";
            }

            $checkIfTableExists = mysqli_query($connection, "SHOW TABLES LIKE '$userID%'");
            if($strand == "STEM" && (mysqli_num_rows($checkIfTableExists) === 0)){
                createReportCardSTEM($userID, $connection);
            }elseif($strand == "ABM" && (mysqli_num_rows($checkIfTableExists) === 0)){
                createReportCardABM($userID, $connection);
            }elseif($strand == "HUMSS" && (mysqli_num_rows($checkIfTableExists) === 0)){
                createReportCardHUMSS($userID, $connection);
            }

            header("Refresh:0");
            exit();
        }else{
            echo "<script>window.alert(\"Registration Failed: Missing field values\")</script>";
        }
    }

    if(isset($_POST["archive"])){
        $userID = $_POST["archive"];
        $tableName = "user_accounts";
        $transferTo = "archive_user_accounts";

        $getDataToArchive = mysqli_query($connection, "SELECT * FROM user_accounts WHERE Account_ID = '$userID'");
        $data = mysqli_fetch_object($getDataToArchive);

        $accType = $data->acc_type;
        $username = $data->user_name;
        $password = $data->password;
        $fullName = $data->full_name;
        $strand = $data->strand;

        transferDataBetweenArchives($transferTo, $userID, $accType, $username, $password, $fullName, $strand, $connection);
        removeFromTable($tableName, $userID, $connection);
    }

    if(isset($_POST["edit"])){
        header("Location: EditAccountRecords.php?id={$_POST["edit"]}");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu</title>
    <link rel="stylesheet" href="css/AdminMenu.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <nav class="NavBar">
            <h2>Admin Menu</h2>
                
            <h2 class="djaphins">DJAPINHS</h2>
            <ul>
                <li>
                    <form action="AdminMenu.php" method="post">
                        <button type="submit" name="logout" class="log">LOGOUT</button> <!--FOR LOGGING OUT-->
                        <button type="submit" name="goToArchive" class="archive">ARCHIVE</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main class="AccTableContainer">
        <table>
            <tr>
                <?php
                    $sql = mysqli_query($connection, "SHOW COLUMNS FROM user_accounts");
                    while($TBLheaders = mysqli_fetch_array($sql)){
                ?>
                    <th><?php echo $TBLheaders[0];?></th>
                <?php
                    }
                ?>
            </tr>
            <?php
                $getRecords = mysqli_query($connection, "SELECT * FROM user_accounts ORDER BY acc_type, strand, full_name");
                while($row = mysqli_fetch_row($getRecords)){
            ?>
                <tr>
                    <?php
                        for($i = 0; $i <= 5; $i++){
                    ?>
                        <td><?php echo $row[$i];?></td>
                    <?php
                        }
                    ?>
                        <td>
                            <form action="AdminMenu.php" method="post">
                                <button type="submit" name="archive" value="<?php echo $row[0]?>">Archive</button>
                                <button type="submit" name="edit" value="<?php echo $row[0]?>">Edit</button>
                            </form>
                            
                        </td>
                </tr>
            <?php
                }
            ?>
        </table>
    </main>

    <section class="RegFormContainer">
         
        <form action="AdminMenu.php" method="post">
            <h2>Register User Account</h2>

            <label class="US">User ID</label>
            <input type="text" name="userID" placeholder="e.g(TR_0001 or ST_0001)" class="ID"> <br>

            <label class="tp">Account Type</label>
            <select name="accType" class="type">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select> <br>

            <label class="NM">Username</label>
            <input type="text" name="username" placeholder="pick a username.." class="use"> <br>

            <label class="Ps">Password</label>
            <input type="text" name="password" placeholder="password" class="pas"> <br>

            <label class="FL">Full Name</label>
            <input type="text" name="fullName" placeholder="e.g(Mark Aldrin B. Acebo)" class="fl"> <br>
            
            <button type="submit" name="register" class="btn">Submit</button>
            <label class="strand">Strand:</label>
            <select name="strand" class="selectstrand">
                <option value="STEM">STEM</option>
                <option value="ABM">ABM</option>
                <option value="HUMSS">HUMSS</option>
                <option value="FACULTY">Teacher Account</option>
            </select> <br>
        </form>
    </section>

    <script src="scripts/eventListener.js"></script>

</body>
</html>

