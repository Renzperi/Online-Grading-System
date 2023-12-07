<?php
    session_start();

    include("scripts/database.php");
    include("scripts/functions.php");

    $_SESSION["siteID"] = $_GET["id"];

    $ID = $_GET["id"];
    $table = $_SESSION["table"];

    $TBIdentifier = $_SESSION["accountID"];
    $getCurrentTable = mysqli_query($connection, "SHOW TABLES LIKE '$table%'");
    $currentTable = mysqli_fetch_row($getCurrentTable);

    if(isset($_POST["logout"])){ //if logout button is pressed
        session_destroy();
        header("Location: loginpage.php"); //returns to login page after logging out
        exit();
    }elseif(isset($_POST["home"])){
        session_destroy();
        header("Location: index.php");
        exit();
    }elseif(isset($_POST["teachersmenu"])){
        header("Location: TeachersMenu.php?id={$_SESSION["accountID"]}");
        exit();
    }

    if(isset($_POST["confirm"])){
        $studentID = $_POST["studentID"];
        $subjectID = $_POST["subjectID"];

        $data = $_POST["confirm"];
        $newData = $_POST["newData"];
        //check if score entered is greater than the max possible score
        $getValueToCompare = mysqli_query($connection, "SELECT $data FROM $currentTable[0] WHERE student_ID = 'ST_0000'");
        $ValueToCompare = mysqli_fetch_row($getValueToCompare);

        if(is_numeric($newData)){
            if($newData >= $ValueToCompare[0]){
                $newData = $ValueToCompare[0];
                editData($currentTable[0], $data, $newData, $ID, $connection);
            }else{
                editData($currentTable[0], $data, $newData, $ID, $connection);
            }
            
            $MaxPossibleTotalScore = null;
            $IndividualTotalScore = null;
    
            $GetTotalMax = mysqli_query($connection, "SELECT * FROM {$currentTable[0]} WHERE student_ID = 'ST_0000'");
            $MaxScores = mysqli_fetch_row($GetTotalMax);
            for($i = 5; $i <= (mysqli_num_fields($GetTotalMax)-2); $i++){
                $MaxPossibleTotalScore += $MaxScores[$i];
            }
    
            $getIndividualTotalScore = mysqli_query($connection, "SELECT * FROM {$currentTable[0]} WHERE Gradebook_ID = $ID");
            $IndividualScores = mysqli_fetch_row($getIndividualTotalScore);
    
            for($i = 5; $i <= (mysqli_num_fields($getIndividualTotalScore)-2); $i++){
                $IndividualTotalScore += $IndividualScores[$i];
            }
    
            $final_grade = ($IndividualTotalScore / $MaxPossibleTotalScore) * 100;
            pushFinalGrade($currentTable[0], $final_grade, $ID, $studentID, $subjectID, $connection);
    
            header("Refresh:0");
            exit();
        }else{
            echo "<script>window.alert(\"Task Failed: Input was not a number\")</script>";
        }
        
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Menu</title>
    <link rel="stylesheet" href="css/EditRecords.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <nav class="NavBar">
            <h2>Edit Record</h2>
         <h2 class="djaphins">DJAPINHS</h2>
            <ul>
                <li>
                    <form action="EditRecords.php?id=<?php echo $_SESSION["siteID"];?>" method="post">
                        <button type="submit" name="logout" class="log">LOGOUT</button> <!--FOR LOGGING OUT-->
                        <button type="submit" name="teachersmenu" class="menu">RETURN</button>
                    </form>
                <li>
            </ul>
        </nav>
    </header>

    <main class="RecordEditFormContainer">
        <?php
            if(isset($table)){
                $getDataSQL = mysqli_query($connection, "SELECT * FROM {$currentTable[0]} WHERE Gradebook_ID = $ID");
                $data = mysqli_fetch_row($getDataSQL);
                $getParametersSQL = mysqli_query($connection, "SELECT * FROM {$currentTable[0]}");
                $maxVal = mysqli_fetch_row(mysqli_query($connection, "SELECT * FROM {$currentTable[0]} WHERE student_ID = 'ST_0000'"));

                for($i = 5; $i <= (mysqli_num_fields($getParametersSQL)-2); $i++){
        ?>
            <form action="EditRecords.php?id=<?php echo $ID?>" method="post">
                <label class="parameter"><?php echo mysqli_field_name($getParametersSQL, $i);?></label>
                <input type="text" name="newData" placeholder="Max Value: <?php echo $maxVal[$i];?>" class="inputval" autocomplete="off">
                <input type="text" name="studentID" value="<?php echo $data[3];?>" style="display: none;">
                <input type="text" name="subjectID" value="<?php echo $data[2];?>" style="display: none;">
                <button type="submit" name="confirm" value="<?php echo mysqli_field_name($getParametersSQL, $i);?>" class="cn">Confirm</button> <br>
            </form>
        <?php        
                }
        ?>
    </main>

    <section class="individualGradesCont">
        <table border="1px">
            <tr>
                <?php
                    $getHeadersSQL = mysqli_query($connection, "SHOW COLUMNS FROM {$currentTable[0]}");
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

