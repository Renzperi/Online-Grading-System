<?php
    include("database.php");

    function createGradebookTable($tableName, $strand, $userID, $default, $connection){
        $gradebookName = "{$userID}_{$tableName}";
        $sql = "CREATE TABLE $gradebookName(
                Gradebook_ID int AUTO_INCREMENT,
                strand varchar(10) DEFAULT '$strand',
                subject_ID varchar(5) DEFAULT '$default',
                student_ID varchar(7),
                student_name varchar(100),
                final_grade decimal(5,2) DEFAULT 0.00,
                PRIMARY KEY (Gradebook_ID),
                FOREIGN KEY (subject_ID) REFERENCES subjects_table(Subject_ID),
                FOREIGN KEY (student_ID) REFERENCES user_accounts(Account_ID),
                UNIQUE (student_ID)
                )";

        $sql2 = "INSERT INTO $gradebookName (Gradebook_ID, student_ID, student_name)
                 VALUES (0, 'ST_0000', 'FirstName M.I LastName')";
        mysqli_query($connection, $sql);
        mysqli_query($connection, $sql2);
    }

    function deleteGradebook($tableName, $connection){
        $sql = "DROP TABLE $tableName";

        mysqli_query($connection, $sql);
    }

    function addColumn($tableName, $parameterName, $maxScore, $connection){
        $sql = "ALTER TABLE $tableName
                ADD $parameterName decimal(4, 2) DEFAULT 0.00
                AFTER student_name";

        $sql2 = "UPDATE $tableName
                 SET $parameterName = $maxScore
                 WHERE student_ID = 'ST_0000'"; 
        
        mysqli_query($connection, $sql);
        mysqli_query($connection, $sql2);
    }

    function deleteColumn($tableName, $parameterName, $connection){
        $sql = "ALTER TABLE $tableName
                DROP COLUMN $parameterName";
        mysqli_query($connection, $sql);
    }

    function addRecord($tableName, $studentID, $studentName, $connection){
        $sql = "INSERT INTO $tableName (student_ID, student_name)
                VALUES ('$studentID', '$studentName')";
        mysqli_query($connection, $sql);
    }

    function removeRecord($tableName, $gradebookID, $userID, $subjectID, $connection){
        $reportCardName = "{$userID}_ReportCard";
        $sql = "DELETE FROM $tableName WHERE Gradebook_ID = $gradebookID";

        $sql2 = "UPDATE $reportCardName
                 SET final_grade = 0
                 WHERE Subject_ID = '$subjectID'";
        mysqli_query($connection, $sql);
        mysqli_query($connection, $sql2);
    }

    function registerAcc($userID, $accType, $userName, $password, $fullName, $strand, $connection){
        $sql = "INSERT INTO user_accounts
                VALUES ('$userID', '$accType', '$userName', '$password', '$fullName', '$strand')";
        mysqli_query($connection, $sql);
    }


    function adminRegisterAcc($adminID, $userName, $password, $fullName, $connection){
        $sql = "INSERT INTO admin_accounts
                VALUES ('$adminID', '$userName', '$password', '$fullName')";
        mysqli_query($connection, $sql);
    }

    function terminateAdminAcc($adminID, $name, $connection){
        $sql = "DELETE FROM admin_accounts 
                WHERE Admin_ID = '$adminID' AND Name = '$name'";

        mysqli_query($connection, $sql);
    }

    function changePassword($newpassword, $userID, $userName, $connection){
        $sql = "UPDATE user_accounts
                SET password = '$newpassword'
                WHERE Account_ID = '$userID' AND user_name = '$userName'";

        mysqli_query($connection, $sql);
    }

    function transferDataBetweenArchives($tableName, $account_ID, $accType, $username, $password, $fullName, $strand, $connection){
        $sql = "INSERT INTO $tableName 
                VALUES ('$account_ID', '$accType', '$username', '$password', '$fullName', '$strand')";

        mysqli_query($connection, $sql);
    }

    function removeFromTable($tableName, $userID, $connection){
        $sql = "DELETE FROM $tableName 
                WHERE Account_ID = '$userID'";

        mysqli_query($connection, $sql);
    }
    
    function editTableName($oldTableName, $newTableName, $connection){
        $sql = "ALTER TABLE $oldTableName
                RENAME TO $newTableName";
        mysqli_query($connection, $sql);
    }

    function editAccountData($tableName, $data, $newData, $accountId, $connection){
        $sql = "UPDATE $tableName
                SET $data = '$newData'
                WHERE Account_ID = '$accountId'";
       
        mysqli_query($connection, $sql);
    }

    function editData($tableName, $data, $newData, $id, $connection){
        $sql = "UPDATE $tableName
                SET $data = $newData
                WHERE Gradebook_ID = $id";

        mysqli_query($connection, $sql);
    }

    function pushFinalGrade($tableName, $final_grade, $id, $studentID, $subjectID, $connection){
        $reportCardName = "{$studentID}_ReportCard";
        $sql = "UPDATE $tableName
                SET final_grade = $final_grade
                WHERE Gradebook_ID = $id";

        $sql2 = "UPDATE $reportCardName
                SET final_grade = $final_grade
                WHERE Subject_ID = '$subjectID'";

        mysqli_query($connection, $sql);
        mysqli_query($connection, $sql2);
    }

    function checkIfFailed($final_grade){
        if($final_grade < 75){
            $final_grade = "INC/Failed";
            return $final_grade;
        }else{
            return $final_grade;
        }
    }

    function createReportCardSTEM($userID, $connection){
        $tableName = "{$userID}_ReportCard";
        $sql = "CREATE TABLE $tableName (
                Subject_ID varchar(5),
                subject_name varchar(100),
                final_grade decimal(5,2) DEFAULT 0.00,
                grade_level int(2),
                semester varchar(6),
                PRIMARY KEY (Subject_ID),
                FOREIGN KEY (Subject_ID) REFERENCES subjects_table(Subject_ID)
                )";

        $sql2 = "INSERT INTO $tableName (Subject_ID, subject_name, grade_level, semester)
                 VALUES ('PC_01', 'Pre-Calculus', 11, 'first'),
                        ('OC_01', 'Oral Communication in Context', 11, 'first'),
                        ('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 11, 'first'),
                        ('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 11, 'first'),
                        ('IP_01', 'Introduction the the Philosophy of the Human Person', 11, 'first'),
                        ('GM_01', 'General Mathematics', 11, 'first'),
                        ('PE_01', 'Physical Education and Health 1', 11, 'first'),
                        ('ES_01', 'Earth Science', 11, 'first'),
                        ('BC_02', 'Basic Calculus', 11, 'second'),
                        ('SP_02', 'Statistics and Probability ', 11, 'second'),
                        ('PD_02', 'Personal Development', 11, 'second'),
                        ('GC_01', 'General Chemistry 1', 11, 'second'),
                        ('PE_02', 'Physical Education and Health 2', 11, 'second'),
                        ('RW_02', 'Reading and Writing Skills', 11, 'second'),
                        ('RD_01', 'Research in Daily Life 1', 11, 'second'),
                        ('DR_02', 'Disaster Readiness and Risk Reduction', 11, 'second'),
                        ('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo', 11,'second'),
                        ('PE_03', 'Physical Education and Health 3', 12, 'first'),
                        ('MI_01', 'Media and Information Literacy', 12, 'first'),
                        ('UC_01', 'Understanding Culture, Society and Politics', 12, 'first'),
                        ('GP_01', 'General Physics 1', 12, 'first'),
                        ('GB_01', 'General Biology 1', 12, 'first'),
                        ('CA_01', 'Contemporary Philippine Arts from the Regions', 12, 'first'),
                        ('CL_01', '21st Century Literature from the Philippines and the World', 12, 'first'),
                        ('EA_01', 'English for Academic and Professional Purposes', 12, 'first'),
                        ('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 12, 'first'),
                        ('RC_01', 'Research/Capstone Project', 12, 'second'),
                        ('PE_04', 'Physical Education and Health 4', 12, 'second'),
                        ('GP_02', 'General Physics 2', 12, 'second'),
                        ('GC_02', 'General Chemistry 2', 12, 'second'),
                        ('GB_02', 'General Biology 2', 12, 'second'),
                        ('RD_02', 'Research in Daily Life 2', 12, 'second'),
                        ('RP_01', 'Research Project', 12, 'second'),
                        ('EN_01', 'Entreprenuership', 12, 'second')";

        mysqli_query($connection, $sql);
        mysqli_query($connection, $sql2);
    }

    function createReportCardABM($userID, $connection){
        $tableName = "{$userID}_ReportCard";
        $sql = "CREATE TABLE $tableName (
                Subject_ID varchar(5),
                subject_name varchar(100),
                final_grade decimal(5,2) DEFAULT 0.00,
                grade_level int(2),
                semester varchar(6),
                PRIMARY KEY (Subject_ID),
                FOREIGN KEY (Subject_ID) REFERENCES subjects_table(Subject_ID)
                )";

        $sql2 = "INSERT INTO $tableName (Subject_ID, subject_name, grade_level, semester)
                 VALUES ('OC_01', 'Oral Communication in Context', 11, 'first'),
                        ('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 11, 'first'),
                        ('GM_01', 'General Mathematics', 11, 'first'),
                        ('EL_01', 'Earth and Life Sciences', 11, 'first'),
                        ('PD_02', 'Personal Development', 11, 'first'),
                        ('UC_01', 'Understanding Culture, Society and Politics', 11, 'first'),
                        ('PE_01', 'Physical Education and Health 1', 11, 'first'),
                        ('EA_01', 'English for Academic and Professional Purposes', 11, 'first'),
                        ('RD_01', 'Research in Daily Life 1', 11, 'first'),
                        ('RW_02', 'Reading and Writing Skills', 11, 'second'),
                        ('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo sa Pananaliksik', 11, 'second'),
                        ('SP_02', 'Statistics and Probability', 11, 'second'),
                        ('PS_01', 'Physical Science', 11, 'second'),
                        ('PE_02', 'Physical Education and Health 2', 11, 'second'),
                        ('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 11, 'second'),
                        ('BM_01', 'Business Math', 11, 'second'),
                        ('OM_01', 'Organizational Management', 11, 'second'),
                        ('FA_01', 'Fundamentals of Accounting, Business and Management', 11, 'second'),
                        ('CL_01', '21st Century Literature from the Philippines and the World', 12, 'first'),
                        ('IP_01', 'Introduction the the Philosophy of the Human Person', 12, 'first'),
                        ('CA_01', 'Contemporary Philippine Arts from the Regions', 12, 'first'),
                        ('MI_01', 'Media and Information Literacy', 12, 'first'),
                        ('PE_03', 'Physical Education and Health 3', 12, 'first'),
                        ('RD_02', 'Research in Daily Life 2', 12, 'first'),
                        ('FA_02', 'Fundamentals of Accounting, Business and Management', 12, 'first'),
                        ('BF_01', 'Business Finance', 12, 'first'),
                        ('PE_04', 'Physical Education and Health 4', 12, 'second'),
                        ('EN_01', 'Entreprenuership', 12, 'second'),
                        ('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 12, 'second'),
                        ('AE_01', 'Applied Economics', 12, 'second'),
                        ('BE_01', 'Business Ethics and Social Responsibility', 12, 'second'),
                        ('MR_01', 'Business Marketing', 12, 'second'),
                        ('BS_01', 'Business Enterprise Simulation', 12, 'second')";


        mysqli_query($connection, $sql);
        mysqli_query($connection, $sql2);
    }

    function createReportCardHUMSS($userID, $connection){
        $tableName = "{$userID}_ReportCard";
        $sql = "CREATE TABLE $tableName (
                Subject_ID varchar(5),
                subject_name varchar(100),
                final_grade decimal(5,2) DEFAULT 0.00,
                grade_level int(2),
                semester varchar(6),
                PRIMARY KEY (Subject_ID),
                FOREIGN KEY (Subject_ID) REFERENCES subjects_table(Subject_ID)
                )";

        $sql2 = "INSERT INTO $tableName (Subject_ID, subject_name, grade_level, semester)
                 VALUES ('OC_01', 'Oral Communication in Context', 11, 'first'),
                        ('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 11, 'first'),
                        ('CA_01', 'Contemporary Philippine Arts from the Regions', 11, 'first'),
                        ('GM_01', 'General Mathematics', 11, 'first'),
                        ('EL_01', 'Earth and Life Sciences', 11, 'first'),
                        ('UC_01', 'Understanding Culture, Society and Politics', 11, 'first'),
                        ('PE_01', 'Physical Education and Health 1', 11, 'first'),
                        ('EA_01', 'English for Academic and Professional Purposes', 11, 'first'),
                        ('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 11, 'first'),
                        ('RW_02', 'Reading and Writing Skills', 11, 'second'),
                        ('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo', 11,'second'),
                        ('CL_01', '21st Century Literature from the Philippines and the World', 11, 'second'),
                        ('SP_02', 'Statistics and Probability ', 11, 'second'),
                        ('PD_02', 'Personal Development', 11, 'second'),
                        ('PE_02', 'Physical Education and Health 2', 11, 'second'),
                        ('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 11, 'second'),
                        ('PG_01', 'Philippine Politics and Governance', 11, 'second'),
                        ('DS_01', 'Disciplines and Ideas in the Social Sciences', 11, 'second'),
                        ('MI_01', 'Media and Information Literacy', 12, 'first'),
                        ('IP_01', 'Introduction the the Philosophy of the Human Person', 12, 'first'),
                        ('PS_01', 'Physical Science', 12, 'first'),
                        ('PE_03', 'Physical Education and Health 3', 12, 'first'),
                        ('RD_01', 'Research in Daily Life 1', 12, 'first'),
                        ('RD_02', 'Research in Daily Life 2', 12, 'first'),
                        ('CW_01', 'Creative Writing ', 12, 'first'),
                        ('DS_02', 'Disciplines and Ideas in the Applied Social Sciences ', 12, 'first'),
                        ('PE_04', 'Physical Education and Health 4', 12, 'second'),
                        ('EN_01', 'Entreprenuership', 12, 'second'),
                        ('RP_01', 'Research Project', 12, 'second'),
                        ('CN_01', 'Creative Non-fiction: The Literacy Essay', 12, 'second'),
                        ('WR_01', 'Introduction to World Religions and Belief Systems', 12, 'second'),
                        ('TN_01', 'Trends, Networks and Critical Thinking in the 21st Century Culture', 12, 'second'),
                        ('CE_01', 'Community Engagement, Solidarity and Citizenship', 12, 'second'),
                        ('CU_01', 'Culminating Activity', 12, 'second')";

        mysqli_query($connection, $sql);
        mysqli_query($connection, $sql2);
    }

    
    function validate($data){  
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    
        return $data;
    }

    function removeSpaces($data){  
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    
        if(str_contains($data, " ")){
            $data = str_replace(" ", "_", $data);
            return $data;
        }else{
            return $data;
        }
    }

    function mysqli_field_name($result, $field_offset){
        $properties = mysqli_fetch_field_direct($result, $field_offset);
        return is_object($properties) ? $properties->name : null;
    }


//html manipulation
?>