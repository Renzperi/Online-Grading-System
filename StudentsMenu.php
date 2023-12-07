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
    }

    $getStudentName = mysqli_query($connection, "SELECT full_name FROM user_accounts WHERE Account_ID = '$_SESSION[accountID]'");
    $studentNAme = mysqli_fetch_row($getStudentName);

    $checkIfTableExists = mysqli_query($connection, "SHOW TABLES LIKE '$_SESSION[accountID]%'");
    $getTableName = mysqli_fetch_array($checkIfTableExists);

    $checkStudentStrand = mysqli_query($connection, "SELECT * FROM user_accounts WHERE Account_ID = '$_SESSION[accountID]'");
    $strand = mysqli_fetch_object($checkStudentStrand);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Menu</title>
    <link rel="stylesheet" href="css/StudentsMenu.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <nav class="NavBar">
            <h2>Students Menu</h2>
            <h3 class="studentname"><?php echo $studentNAme[0];?></h3>
            <ul>
                <li>
                    <form action="StudentsMenu.php" method="post">
                        <button type="submit" name="logout" class="log">LOGOUT</button> <!--FOR LOGGING OUT-->
                    </form>
                <li>
            </ul>
        </nav>
    </header>

    <main class="reportCardsContainer">
        <section class="reportCardTableCont">
            <form action="StudentsMenu.php?id=<?php echo $_SESSION["accountID"];?>" method="post" class="view">
                <select name="grade_level" class="gradeselect">
                    <option value="11">Grade 11</option>
                    <option value="12">Grade 12</option>
                </select>
                <button type="submit" name="view" class="viewbtn">View Grade</button>
            </form>

        <?php
        if(isset($_POST["view"])){
            $gradeLvlFilter = $_POST["grade_level"];
            if($gradeLvlFilter == 11){
        ?>
            <table>
                <tr>
                <?php
                    $getHeaders = mysqli_query($connection, "SHOW COLUMNS FROM $getTableName[0]");
                    while($headers = mysqli_fetch_row($getHeaders)){
                ?>
                    <th><?php echo $headers[0]?></th>
                <?php
                    }
                ?>
                </tr>
                <?php   
                    $getData = mysqli_query($connection, "SELECT * FROM $getTableName[0] WHERE grade_level = 11 AND semester = 'first' ORDER BY subject_name");
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
                    </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="2">Average:</td>
                    <td colspan="3">
                        <?php
                        $getAverage = mysqli_query($connection, "SELECT ROUND(AVG(final_grade),2) FROM $getTableName[0] WHERE grade_level = 11 AND semester = 'first' AND final_grade > 0");
                        $average = mysqli_fetch_row($getAverage);
                        echo checkIfFailed($average[0]);
                        ?>
                    </td>
                </tr>
            </table> <br>

            <table border="1px">
                <tr>
                <?php
                    $getHeaders = mysqli_query($connection, "SHOW COLUMNS FROM $getTableName[0]");
                    while($headers = mysqli_fetch_row($getHeaders)){
                ?>
                    <th><?php echo $headers[0]?></th>
                <?php
                    }
                ?>
                </tr>
                <?php   
                    $getData = mysqli_query($connection, "SELECT * FROM $getTableName[0] WHERE grade_level = 11 AND semester = 'second' ORDER BY subject_name");
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
                    </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="2">Average:</td>
                    <td colspan="3">
                        <?php
                        $getAverage = mysqli_query($connection, "SELECT ROUND(AVG(final_grade),2) FROM $getTableName[0] WHERE grade_level = 11 AND semester = 'second' AND final_grade > 0");
                        $average = mysqli_fetch_row($getAverage);
                        echo checkIfFailed($average[0]);
                        ?>
                    </td>
                </tr>
            </table> <br>
        <?php
            }elseif($gradeLvlFilter == 12){
        ?>
<!--asdsa-->
            <table border="1px">
                <tr>
                <?php
                    $getHeaders = mysqli_query($connection, "SHOW COLUMNS FROM $getTableName[0]");
                    while($headers = mysqli_fetch_row($getHeaders)){
                ?>
                    <th><?php echo $headers[0]?></th>
                <?php
                    }
                ?>
                </tr>
                <?php   
                    $getData = mysqli_query($connection, "SELECT * FROM $getTableName[0] WHERE grade_level = 12 AND semester = 'first' ORDER BY subject_name");
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
                    </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="2">Average:</td>
                    <td colspan="3">
                        <?php
                        $getAverage = mysqli_query($connection, "SELECT ROUND(AVG(final_grade),2) FROM $getTableName[0] WHERE grade_level = 12 AND semester = 'first' AND final_grade > 0");
                        $average = mysqli_fetch_row($getAverage);
                        echo checkIfFailed($average[0]);
                        ?>
                    </td>
                </tr>
            </table> <br>

            <table border="1px">
                <tr>
                <?php
                    $getHeaders = mysqli_query($connection, "SHOW COLUMNS FROM $getTableName[0]");
                    while($headers = mysqli_fetch_row($getHeaders)){
                ?>
                    <th><?php echo $headers[0]?></th>
                <?php
                    }
                ?>
                </tr>
                <?php   
                    $getData = mysqli_query($connection, "SELECT * FROM $getTableName[0] WHERE grade_level = 12 AND semester = 'second' ORDER BY subject_name");
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
                    </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="2">Average:</td>
                    <td colspan="3">
                        <?php
                        $getAverage = mysqli_query($connection, "SELECT ROUND(AVG(final_grade),2) FROM $getTableName[0] WHERE grade_level = 12 AND semester = 'second' AND final_grade > 0");
                        $average = mysqli_fetch_row($getAverage);
                        echo checkIfFailed($average[0]);
                        ?>
                    </td>
                </tr>
            </table> <br>
        <?php
            }
        }
        ?>
        </section>
    </main>

  
</body>
</html>

