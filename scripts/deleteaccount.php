<?php
    include("database.php");

    if(isset($_POST["ID"]) && isset($_POST["firstName"]) && isset($_POST["lastName"])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $ID = validate($_POST["ID"]);
        $firstName = validate($_POST["firstName"]);
        $lastName = validate($_POST["lastName"]);

        if(empty($ID) || empty($firstName) || empty($lastName)){
            header("Location: ../AdminMenu.php?error=Misssing Data Field");
            exit();
        }else{
            $sql = "DELETE FROM user_accounts 
                    WHERE ID = '$ID' AND FN = '$firstName' AND LN = '$lastName'";
            mysqli_query($connection, $sql);
            header("Location: ../AdminMenu.php?account deleted successfully");
            exit();
        }
    }else{
        header("Location: ../AdminMenu.php");
        exit();
    }
?>