<?php
    session_start();

    include("scripts/database.php");
    include("scripts/functions.php");

    $currentTable = null;
    $currentTableStrand = null;

    if(isset($_POST["logout"])){ //if logout button is pressed
        session_destroy();
        header("Location: loginpage.php"); //returns to login page after logging out
        exit();
    }elseif(isset($_POST["home"])){
        session_destroy();
        header("Location: index.php");
        exit();
    }

    if(isset($_POST["createGB"])){
        $tableName = removeSpaces(validate($_POST["gradebookName"]));
        $userID = validate($_POST["userID"]);
        $defaultSubject = $_POST["subjectID"];
        $strand = $_POST["strand"];

        try{
            createGradebookTable($tableName, $strand, $userID, $defaultSubject, $connection);
        }catch(mysqli_sql_exception){
            echo "<script>window.alert(\"Failed to Create Gradebook: That gradebook name already exists!\")</script>";
        }
    }

    if(isset($_POST["addColumnBtn"])){
        $tableName = $_POST["tableName"];
        $parameterName = removeSpaces(validate($_POST["parameter"]));
        $maxScore = validate($_POST["maxscore"]);

        if(!empty($tableName) && !empty($maxScore)){
            if(is_numeric($maxScore)){
                try{
                    addColumn($tableName, $parameterName, $maxScore, $connection);
                    echo "<script>window.alert(\"Parameter Added Successfully!\")</script>";
                }catch(mysqli_sql_exception){
                    echo "<script>window.alert(\"Parameter Name Already Exists!\")</script>";
                }
            }else{
                echo "<script>window.alert(\"Failed to add parameter: Max Score input was not a number!\")</script>";
            }
        }else{
            echo "<script>window.alert(\"Task Failed: Missing Inputs\")</script>";
        }      
    }

    if(isset($_POST["removeColumnBtn"])){
        $tableName = $_POST["tableName"];
        $parameterName = $_POST["columnName"];

        deleteColumn($tableName, $parameterName, $connection);
        echo "<script>window.alert(\"Parameter: $parameterName, was deleted successfully!\")</script>";
    }

    if(isset($_POST["addRecordBtn"])){
        $tableName = $_POST["tableName"];
        $studentID = validate($_POST["studentID"]);

        $studentNameSQL = mysqli_query($connection, "SELECT full_name FROM user_accounts WHERE Account_ID = '$studentID'");
        $nameResult = mysqli_fetch_object($studentNameSQL);

        $studentName = $nameResult->full_name;

        try{
            addRecord($tableName, $studentID, $studentName, $connection);
            echo "<script>window.alert(\"Student Added Successfully!\")</script>";
        }catch(mysqli_sql_exception){
            echo "<script>window.alert(\"Failed to Add Record: That student is already added!\")</script>";
        }
    }

    if(isset($_POST["removeRecordBtn"])){
        $tableName = $_POST["tableName"];
        $gradebookID = $_POST["removeRecordBtn"];

        $subjectID = $_POST["subjectID"];
        $studentID = $_POST["studentID"];

        removeRecord($tableName, $gradebookID, $studentID, $subjectID, $connection);
        header("Refresh:0");
        exit();
    }

    if(isset($_POST["editRecordBtn"])){
        header("Location: EditRecords.php?id={$_POST["editRecordBtn"]}");
    }

    if(isset($_POST["deleteGradebook"])){
        $tableName = $_POST["deleteGradebook"];
        $finalName = substr($tableName, 8);

        try{
            $checkIfTblHasRecords = mysqli_query($connection, "SELECT * FROM $tableName WHERE student_ID != 'ST_0000'");
            if(mysqli_num_rows($checkIfTblHasRecords) > 0){
                echo "<script>window.alert(\"Deletion failed: $finalName Contains Records. Please Delete them first\")</script>";
            }else{
                deleteGradebook($tableName, $connection);
                echo "<script>window.alert(\"Deletion Successful: $finalName Deleted\")</script>";
            }
        }catch(mysqli_sql_exception){
            echo "<script>window.alert(\"Deletion Failed: No Gradebook Selected\")</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers Menu</title>
    <link rel="stylesheet" href="css/TeachersMenu.css">
    <link rel="stylesheet" href="css/index.css">

</head>
<body>
    <header>
    <nav class="NavBar">
            <h2>Teachers Menu</h2>
            <h2 class="djaphins">DJAPINHS</h2>
            <ul>
                <li>
                    <form action="TeachersMenu.php?id=<?php echo $_SESSION["accountID"];?>" method="post">
                        <button type="submit" name="logout" class="log">LOGOUT</button> <!--FOR LOGGING OUT-->
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <aside class="sideBar">
        <form action="TeachersMenu.php?id=<?php echo $_SESSION["accountID"];?>" method="post">
            <?php
                $TBidentifier = $_SESSION["accountID"];
                $getTableSQL = "SHOW TABLES LIKE '$TBidentifier%'";
                $TBresult = mysqli_query($connection, $getTableSQL);

                while($tables = mysqli_fetch_array($TBresult)){
            ?>
                <button type="submit" name="gradebookSelect" value="<?php echo $tables[0];?>"; class="grade">
                    <?php 
                        $tempName = $tables[0];
                        $finalName = substr($tempName, 8);
                        echo $finalName;
                    ?>
                </button>
            <?php
                }
            ?>
        </form>

        
    </aside>

    <main class="dashContainer">
        <section id="gradeBookTableCont">
            <?php
                if(isset($_POST["gradebookSelect"])){
                    $currentTable = $_POST["gradebookSelect"];
                    $sqlGetTblHeaders = "SHOW COLUMNS FROM {$_POST["gradebookSelect"]}";
                    $Tblresult = mysqli_query($connection, $sqlGetTblHeaders);

                    $_SESSION["table"] = $currentTable;

                    $getGradebookSubjectID = mysqli_query($connection, "SELECT subject_ID FROM $currentTable");
                    $subjectID = mysqli_fetch_row($getGradebookSubjectID);
                    $getFullSubjectName = mysqli_query($connection, "SELECT subject_name FROM subjects_table WHERE Subject_ID = '$subjectID[0]'");
                    $subjectName = mysqli_fetch_row($getFullSubjectName);

                    $getGradebookStrand = mysqli_query($connection, "SELECT strand FROM $currentTable");
                    $strand = mysqli_fetch_row($getGradebookStrand);
                    $currentTableStrand = $strand[0];
            ?>
            <label class="subjtitle">Gradebook Subject: <?php echo $subjectName[0];?></label> <br>
            <label class="subjtitle">STRAND: <?php echo $currentTableStrand?></label> <br>
            <table border="1px">
                <tr>
                    <?php
                            while($headers = mysqli_fetch_row($Tblresult)){
                    ?>
                            <th><?php echo $headers[0];?></th>
                    <?php
                            }
                    ?>
                </tr>
                    <?php
                            $sql = "SELECT * FROM {$_POST["gradebookSelect"]} WHERE student_ID != 'ST_0000' ORDER BY student_name";
                            $result = mysqli_query($connection, $sql);
                            while($row = mysqli_fetch_row($result)){
                    ?>
                                <tr>
                                    <?php
                                        for($i = 0; $i <= (mysqli_num_fields($result) - 1); $i++){
                                    ?>
                                        <td><?php echo $row[$i]; ?></td>
                                    <?php
                                        }
                                    ?>
                                        <td>
                                            <form action="TeachersMenu.php?id=<?php echo $_SESSION["accountID"];?>" method="post">
                                                <input type="text" name="tableName" value="<?php echo $currentTable;?>" style="display: none;">
                                                <input type="text" name="subjectID" value="<?php echo $row[2];?>" style="display: none;">
                                                <input type="text" name="studentID" value="<?php echo $row[3];?>" style="display: none;">
                                                <button type="submit" 
                                                        name="removeRecordBtn" 
                                                        value="<?php echo $row[0];?>" 
                                                        class="rm"
                                                        onclick="return confirm('Are you sure you want to delete this record?');">

                                                        DELETE
                                                </button>
                                                <button type="submit" name="editRecordBtn" value="<?php echo $row[0];?>" class="rm">EDIT</button>
                                            </form>
                                        </td>
                                </tr>
                    <?php
                            }
                        }
                    ?>
            </table>
        </section>

        <section class="buttonscontainer">
            <hr>
            <button type="submit" name="create" id="create">CREATE GRADEBOOK</button>
            <button type="sumbit" name="addRecord" id="addRecord">ADD RECORD</button>
            <button type="sumbit" name="addColumn" id="addColumn">ADD COLUMN</button>
            <button type="sumbit" name="removeColumn" id="removeColumn">REMOVE COLUMN</button>
            <form action="TeachersMenu.php?id=<?php echo $_SESSION["accountID"];?>" method="post">
                <button type="submit" 
                        name="deleteGradebook" 
                        value="<?php echo $currentTable;?>" 
                        id="deleteColumn"
                        onclick="return confirm('Are you sure you want to delete this Gradebook?');">

                        DELETE GRADEBOOK
                </button>
            </form>
            <hr>
        </section>
    </main>

    <section class="popUpCreate" style="display: none;">
        <form action="TeachersMenu.php?id=<?php echo $_SESSION["accountID"];?>" method="post">
            <label class="grade">Enter Gradebook Name:</label>
            <input type="text" name="gradebookName" class="bookname"> <br>

            <label class="strand">Strand:</label>
            <select name="strand" class="strandselect">
                <option value="STEM">STEM</option>
                <option value="ABM">ABM</option>
                <option value="HUMSS">HUMSS</option>
            </select> <br>

            <label class="subject">Subject:</label>
            <select name="subjectID" class="selectsubj">
                <?php
                    $getSubjectNames = mysqli_query($connection, "SELECT Subject_ID, subject_name FROM subjects_table");

                    while($subjectNames = mysqli_fetch_object($getSubjectNames)){
                ?>
                        <option value="<?php echo $subjectNames->Subject_ID;?>">
                            <?php echo $subjectNames->subject_name;?>
                        </option>
                <?php
                    }
                ?>
            </select> <br>

            <input type="text" name="userID" value="<?php echo $_SESSION["accountID"];?>" style="display: none;"> <br>
            <button type="submit" name="createGB" id="createGB">CREATE</button>
            <button type="button" id="closeBtn">X</button>
        </form>
    </section>

    <section class="popUpAddColumn" style="display: none;">
        <form action="TeachersMenu.php?id=<?php echo $_SESSION["accountID"];?>" method="post">
            <label class="entergrade">Enter Grading Parameter:</label>
            <input type="text" name="parameter" class="entergrade"> <br>
            <label class="entermax">Max Possible Score:</label>
            <input type="text" name="maxscore" class="entermax" placeholder="enter a number..">
            <input type="text" name="tableName" value="<?php echo $currentTable;?>" style="display: none;"> <br>
            <button type="submit" name="addColumnBtn" class="confirm">Confirm</button>
            <button type="button" id="XBtn4AddColumn">X</button>
        </form>
    </section>

    <section class="popUpRemoveColumn" style="display: none;">
        <form action="TeachersMenu.php?id=<?php echo $_SESSION["accountID"];?>" method="post">
            <label class="deletecolumn">Delete Column:</label>
            <select name="columnName" class="deletecolumn">
                <?php
                    if(isset($currentTable)){
                        $getColumnNames = mysqli_query($connection, "SELECT * FROM {$currentTable}");
                        for($i = 5; $i <= (mysqli_num_fields($getColumnNames)-3); $i++){
                ?>
                        <option value="<?php echo mysqli_field_name($getColumnNames, $i)?>">
                            <?php echo mysqli_field_name($getColumnNames, $i);?>
                        </option>
                <?php
                        }
                    }
                ?>
            </select> <br>       
            <input type="text" name="tableName" value="<?php echo $currentTable;?>" style="display: none;">
            <button type="submit" 
                    name="removeColumnBtn" 
                    class="confirm"
                    onclick="return confirm('Are you sure you want to delete this Column?');">
                Confirm
            </button>
            <button type="button" id="XBtn4RemoveColumn">X</button>
        </form>
    </section>

    <section class="popUpAddRecord" style="display: none;">
        <form action="" method="post">
            <label class="studID">Student ID:</label>
            <select name="studentID" class="selectstud">
                <?php

                    if($currentTableStrand == "STEM"){
                        $getStudentNames = mysqli_query($connection, "SELECT Account_ID, full_name FROM user_accounts
                                                                      WHERE acc_type = 'student' AND Account_ID != 'ST_0000' AND strand = 'STEM'
                                                                      ORDER BY full_name");
                        while($studentNames = mysqli_fetch_object($getStudentNames)){
                ?>
                        <option value="<?php echo $studentNames->Account_ID;?>">
                            <?php 
                                echo "{$studentNames->Account_ID} - {$studentNames->full_name}";
                            ?>
                        </option>
                <?php
                        }
                    }elseif($currentTableStrand == "ABM"){
                        $getStudentNames = mysqli_query($connection, "SELECT Account_ID, full_name FROM user_accounts
                                                                      WHERE acc_type = 'student' AND Account_ID != 'ST_0000' AND strand = 'ABM'
                                                                      ORDER BY full_name");
                        while($studentNames = mysqli_fetch_object($getStudentNames)){
                ?>
                        <option value="<?php echo $studentNames->Account_ID;?>">
                            <?php 
                                echo "{$studentNames->Account_ID} - {$studentNames->full_name}";
                            ?>
                        </option>
                <?php
                        }
                    }elseif($currentTableStrand == "HUMSS"){
                        $getStudentNames = mysqli_query($connection, "SELECT Account_ID, full_name FROM user_accounts
                                                                      WHERE acc_type = 'student' AND Account_ID != 'ST_0000' AND strand = 'HUMSS'
                                                                      ORDER BY full_name");
                        while($studentNames = mysqli_fetch_object($getStudentNames)){
                ?>
                        <option value="<?php echo $studentNames->Account_ID;?>">
                            <?php 
                                echo "{$studentNames->Account_ID} - {$studentNames->full_name}";
                            ?>
                        </option>
                <?php
                        }
                    }
                ?>
            </select> <br>
            <input type="text" name="tableName" value="<?php echo $currentTable;?>" style="display: none;">
            <button type="submit" name="addRecordBtn" class="addrec">Confirm</button>
            <button type="button" id="XBtn4AddRecord">X</button>
        </form>
    </section>



    <script src="scripts/eventListener.js"></script>
</body>
</html>

<?php
    //$_SESSION["table"] = $currentTable;
?>