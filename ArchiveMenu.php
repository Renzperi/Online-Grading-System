<?php
    session_start();

    include("scripts/database.php");
    include("scripts/functions.php");

    if(isset($_POST["logout"])){ //if logout button is pressed
        session_destroy();
        header("Location: loginpage.php"); //returns to login page after logging out
        exit();
    }elseif(isset($_POST["home"])){
        session_destroy();
        header("Location: index.php");
        exit();
    }elseif(isset($_POST["return"])){
        header("Location: AdminMenu.php");
    }

    if(isset($_POST["restore"])){
        $userID = $_POST["restore"];
        $tableName = "archive_user_accounts";
        $transferTo = "user_accounts";

        $getDataToArchive = mysqli_query($connection, "SELECT * FROM archive_user_accounts WHERE Account_ID = '$userID'");
        $data = mysqli_fetch_object($getDataToArchive);

        $accType = $data->acc_type;
        $username = $data->user_name;
        $password = $data->password;
        $fullName = $data->full_name;
        $strand = $data->strand;

        transferDataBetweenArchives($transferTo, $userID, $accType, $username, $password, $fullName, $strand, $connection);
        removeFromTable($tableName, $userID, $connection);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Menu</title>
    <link rel="stylesheet" href="css/ArchiveMenu.css">
    <link rel="stylesheet" href="css/index.css">
    
</head>
<body>
    <header>
        <nav class="NavBar">
            <h2>Archive Menu</h2>
            <ul>
                <li>
                    <form action="ArchiveMenu.php" method="post">
                        <button type="submit" name="logout" class="log">LOGOUT</button> <!--FOR LOGGING OUT-->
                        <button type="submit" name="return" class="return">RETURN</button>
                    </form>
                <li>
            </ul>
        </nav>
    </header>

    <main class="reportCardsContainer">
        <section class="reportCardTableCont">
            <table>
                <tr>
                    <?php
                        $getHeaders = mysqli_query($connection, "SHOW COLUMNS FROM archive_user_accounts");
                        while($headers = mysqli_fetch_row($getHeaders)){
                    ?>
                        <th><?php echo $headers[0]?></th>
                    <?php
                        }
                    ?>
                </tr>
                <?php   
                    $getData = mysqli_query($connection, "SELECT * FROM archive_user_accounts");
                    while($data = mysqli_fetch_row($getData)){
                ?>
                    <tr>
                        <?php
                        for($i = 0; $i <= (mysqli_num_fields($getData)-1); $i++){
                        ?>
                            <td><?php echo $data[$i];?></td>
                        <?php
                        }
                        ?>
                        <td>
                            <form action="ArchiveMenu.php" method="post">
                                <button type="submit" name="restore" value="<?php echo $data[0];?>">Restore</button>
                            </form>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </section>
    </main>
</body>
</html>

