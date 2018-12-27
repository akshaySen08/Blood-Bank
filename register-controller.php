<?php
    $dbname = 'blood_donation';
    $password = 'root';
    $dbusr = 'root';
    $servername = 'localhost';

    $conn = new mysqli($servername , $dbusr, $password, $dbname);

    if($conn->connect_error){
        die($conn->connect_error);
    }
    
    //for the registration of receiver or hospitals
    if(isset($_POST['userType']) && !empty($_POST['userType']) && $_POST['userType'] == 'receiver'){
        $rcvrName = isset($_POST['rcvrName']) ? $_POST['rcvrName'] : " ";
        $bgroup = isset($_POST['bgroup']) ? $_POST['bgroup'] : " ";
        $rcvrEmail = isset($_POST['rcvrEmail']) ? $_POST['rcvrEmail'] : " ";
        $rcvrPwd = isset($_POST['rcvrPwd']) ? $_POST['rcvrPwd'] : " ";
        $rcvrAddress = isset($_POST['rcvrAddress']) ? $_POST['rcvrAddress'] : " ";
        $phone = isset($_POST['rcvrPhone']) ? $_POST['rcvrPhone'] : " ";
        $type = $_POST['userType'];
        $success;

        if(empty($rcvrName)){
            $error[] = "Enter username";
        }

        if(empty($bgroup)){
            $error[] = "Select Blood group";
        }

        if(empty($rcvrEmail)){
            $error[] = "Enter email";
        }

        if(empty($rcvrPwd)){
            $error[] = "Enter password";
        }

        if(empty($rcvrAddress)){
            $error[] = "Enter rcvrAddress";
        }

        if(empty($phone)){
            $error[] = "Enter phone number";
        }

        if(empty($error)){
            $sql =  "INSERT INTO `users`( `username`, `email`, `password`, `bloodgroup`, `phone`, `address`, `user_type`) VALUES ('$rcvrName', '$rcvrEmail','$rcvrPwd' '$bgroup', '$phone', '$rcvrAddress', '$type')";

            if($conn->query($sql) == TRUE ){
                $success = "You are successfully registerd as Receiver !";
            }else{
                die("Sql not working");
            }
            $response = array('status'=> 1, 'content'=> $success);
        }else{
            $response = array('status'=>0 , 'content'=> $error);
        }

        echo json_encode($response);

    }elseif (isset($_POST['userType']) && !empty($_POST['userType']) && $_POST['userType'] == 'hospital') {
        $hospName = isset($_POST['hospName']) ? $_POST['hospName'] : " ";
        $hospRegNum = isset($_POST['hospRegNum']) ? $_POST['hospRegNum'] : " ";
        $hospAddress = isset($_POST['hospAddress']) ? $_POST['hospAddress'] : " ";
        $ownerName = isset($_POST['ownerName']) ? $_POST['ownerName'] : " ";
        $hospEmail = isset($_POST['hospEmail']) ? $_POST['hospEmail'] : " ";
        $hospPassword = isset($_POST['hospPassword']) ? $_POST['hospPassword'] : " ";
        $telPhone = isset($_POST['telPhone']) ? $_POST['telPhone'] : " ";
        $type = $_POST['userType'];

        if(empty($hospName) || empty($hospRegNum) || empty($hospAddress) || empty($ownerName) || empty($hospEmail) || empty($hospPassword) || empty($telPhone)){
            $error = "Please Fill all the fields";
        }

        if(empty($error)){
            $sql = "INSERT INTO `hospitals`(`hospital_name`, `hospital_reg_num`, `hospital_address`, `hospital_owner`, `hospital_email`, `hospital_password`, `hospital_phone`, `user_type`) VALUES ('$hospName', '$hospRegNum', '$hospAddress', '$ownerName', '$hospEmail', '$hospPassword', '$telPhone', '$type')";

            if($conn->query($sql) == TRUE){
                $success = 'Hospital successfully registered! ';
            }

            $response = array('status'=> 1, 'content'=> $success);
        }else{
            $response = array('status'=> 0, 'content' => $error);
        }

        echo json_encode($response);
    }
    
?>