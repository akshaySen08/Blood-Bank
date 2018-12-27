<?php
    session_start();
    $dbname = 'blood_donation';
    $password = 'root';
    $dbusr = 'root';
    $servername = 'localhost';

    $conn = new mysqli($servername , $dbusr, $password, $dbname);

    if($conn->connect_error){
        die($conn->connect_error);
    }

    $loginEmail = isset($_POST['loginEmail']) ? $_POST['loginEmail'] : " ";
    $loginPassword = isset($_POST['loginPwd']) ? $_POST['loginPwd'] : " ";

    if(empty($loginEmail)){
        $error[] = 'Email required';
    }

    if(empty($loginPassword)){
        $error[] = 'Password required';
    }

    //for login of receiver or hospitals
    if($_POST['userType'] === 'receiver'){

        if(empty($error)){
            $sql = "SELECT * FROM `receivers` WHERE `email` = '$loginEmail' AND `password` = '$loginPassword'";        
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION = $row;
                }
             
                $response = array('status' => 1, 'content'=> $_SESSION , 'userType'=> $_POST['userType']);
            } else {
                $response = array('status' => 0, 'content'=> 'Not Found');
            }
        }else{
            $response = array('status' => 0, 'content'=> $error);
        }

    }else{

        if(empty($error)){
            $sql = "SELECT * FROM `hospitals` WHERE `hospital_email` = '$loginEmail' AND `hospital_password` = '$loginPassword'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION = $row;
                }

                $response = array('status'=> 1 , 'content'=>$_SESSION, 'userType'=> $_POST['userType']);
            } else {
                $response = array('satus' => 0, 'content'=> 'Not Found');
            }
        }else{
            $response = array('satus' => 0, 'content'=> $error);
        }
    }

    echo json_encode($response);
?>