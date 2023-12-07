<?php
    session_start();

    include("scripts/database.php");
    include("scripts/functions.php");

    $ID = $_GET["id"];

    if(isset($_POST["logout"])){ //if logout button is pressed
        session_destroy();
        header("Location: loginpage.php"); //returns to login page after logging out
        exit();
    }elseif(isset($_POST["home"])){
        session_destroy();
        header("Location: index.php");
        exit();
    }elseif(isset($_POST["adminmenu"])){
        header("Location: AdminMenu.php");
        exit();
    }

    if(isset($_POST["confirm"])){
        $tableName = "user_accounts";
        $accountID = $_POST["accountID"];

        $data = $_POST["confirm"];
        $newData = validate($_POST["newData"]);

    
        if(!empty($newData)){
            editAccountData($tableName, $data, $newData, $accountID, $connection);
        }else{
            echo "<script>window.alert(\"Failed to change record: Missing input\")</script>";
        }
        
    }

    if(isset($_POST["changeID"])){
        $tableName = "user_accounts";
        $accountID = $_POST["accountID"];
        $data = $_POST["changeID"];
        $newData = validate($_POST["newData"]);

        if(!empty($newData)){
            $checkUserType = mysqli_fetch_object(mysqli_query($connection, "SELECT * FROM user_accounts WHERE Account_ID = '$accountID'"));
            $oldTableName = mysqli_query($connection, "SHOW TABLES LIKE '$accountID%'");
            $table = mysqli_fetch_row($oldTableName);
            $newTableName = null;

            if($checkUserType->acc_type == "student"){
                $newTableName = "{$newData}_ReportCard";
                editTableName($table[0], $newTableName, $connection);
                editAccountData($tableName, $data, $newData, $accountID, $connection);
                header("Location: EditAccountRecords.php?id={$newData}");
            }elseif(($checkUserType->acc_type == "teacher") && (mysqli_num_rows($oldTableName) != 0)){
                echo "<script>window.alert(\"Cannot Change ID: This account have existing gradebook/s, please delete it first\")</script>";
            }else{
                editAccountData($tableName, $data, $newData, $accountID, $connection);
                header("Location: EditAccountRecords.php?id={$newData}");
            }
        }else{
            echo "<script>window.alert(\"Failed to change record: Missing input\")</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Menu</title>
    <link rel="stylesheet" href="css/Editaccount.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <nav class="NavBar">
            <h2>Edit Record</h2>
         <h2 class="djaphins">DJAPINHS</h2>
            <ul>
                <li>
                    <form action="EditAccountRecords.php?id=<?php echo $ID;?>" method="post">
                        <button type="submit" name="logout" class="log">LOGOUT</button> <!--FOR LOGGING OUT-->
                        <button type="submit" name="adminmenu" class="menu">RETURN</button>
                    </form>
                <li>
            </ul>
        </nav>
    </header>

    <main class="RecordEditFormContainer">
        <?php
                $getDataSQL = mysqli_query($connection, "SELECT * FROM user_accounts WHERE Account_ID = '$ID'");
                $data = mysqli_fetch_row($getDataSQL);
        ?>
            <form action="EditAccountRecords.php?id=<?php echo $ID;?>" method="post" autocomplete="off">
                <label class="parameter">Account ID:</label>
                <input type="text" name="newData" placeholder="e.g(TR_0001 or ST_0001)" class="inputval">
                <input type="text" name="accountID" value="<?php echo $data[0];?>" style="display: none;">
                <button type="submit" name="changeID" value="Account_ID" class="cn">Confirm</button> <br>
            </form>

            <form action="EditAccountRecords.php?id=<?php echo $ID;?>" method="post">
                <label class="parameter">acc_type:</label>
                <input list="accountType" name="newData" class="inputval" autocomplete="off">
                <datalist id="accountType">
                    <option value="student">student</option>
                    <option value="teacher">teacher</option>
                </datalist>
                <input type="text" name="accountID" value="<?php echo $data[0];?>" style="display: none;">
                <button type="submit" name="confirm" value="acc_type" class="cn">Confirm</button> <br>
            </form>

            <form action="EditAccountRecords.php?id=<?php echo $ID;?>" method="post" autocomplete="username">
                <label class="parameter">Username:</label>
                <input type="text" name="newData" placeholder="enter new user name.." class="inputval">
                <input type="text" name="accountID" value="<?php echo $data[0];?>" style="display: none;">
                <button type="submit" name="confirm" value="user_name" class="cn">Confirm</button> <br>
            </form>

            <form action="EditAccountRecords.php?id=<?php echo $ID;?>" method="post" autocomplete="new-password">
                <label class="parameter">Password:</label>
                <input type="text" name="newData" placeholder="enter new password.." class="inputval">
                <input type="text" name="accountID" value="<?php echo $data[0];?>" style="display: none;">
                <button type="submit" name="confirm" value="password" class="cn">Confirm</button> <br>
            </form>

            <form action="EditAccountRecords.php?id=<?php echo $ID;?>" method="post" autocomplete="off">
                <label class="parameter">Full Name:</label>
                <input type="text" name="newData" placeholder="e.g(Mark Aldrin B. Acebo)" class="inputval">
                <input type="text" name="accountID" value="<?php echo $data[0];?>" style="display: none;">
                <button type="submit" name="confirm" value="full_name" class="cn">Confirm</button> <br>
            </form>

            <form action="EditAccountRecords.php?id=<?php echo $ID;?>" method="post" autocomplete="off">
                <label class="parameter">Strand:</label>
                <input list="STRAND" name="newData" class="inputval">
                <datalist id="STRAND">
                    <option value="STEM">STEM</option>
                    <option value="ABM">ABM</option>
                    <option value="HUMSS">HUMSS</option>
                    <option value="FACULTY">FACULTY</option>
                </datalist>
                <input type="text" name="accountID" value="<?php echo $data[0];?>" style="display: none;">
                <button type="submit" name="confirm" value="strand" class="cn">Confirm</button> <br>
            </form>
    </main>

    <section class="individualGradesCont">
        <table border="1px">
            <tr>
                <?php
                    $getHeadersSQL = mysqli_query($connection, "SHOW COLUMNS FROM user_accounts");
                    while($header = mysqli_fetch_row($getHeadersSQL)){
                ?>
                    <th><?php echo $header[0];?></th>
                <?php
                    }
                ?>
            </tr>
            <tr>
                <?php
                    for($i = 0; $i <= (mysqli_num_fields($getDataSQL)-1); $i++){
                ?>
                    <td><?php echo $data[$i];?></td>
                <?php
                    }
                ?>
            </tr>
        </table>
    </section>

    <footer>
    <p>© Copyright 2023 DJAPIHNS</p>
    </footer>
</body>
</html>

