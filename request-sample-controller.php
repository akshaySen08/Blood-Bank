<?php
    $dbname = 'blood_donation';
    $password = 'root';
    $dbusr = 'root';
    $servername = 'localhost';

    $conn = new mysqli($servername , $dbusr, $password, $dbname);

    if($conn->connect_error){
        die($conn->connect_error);
    }


    if(!empty($_POST)){
        $requesterName = isset($_POST['reqName']) ?  $_POST['reqName'] : "NA";
        $requesterPhone = isset($_POST['reqPhone']) ?  $_POST['reqPhone'] : "NA";
        $requestedBg = isset($_POST['reqBgroup']) ?  $_POST['reqBgroup'] : "NA";
        $hospitalName = isset($_POST['hospName']) ? $_POST['hospName'] : "NA";
        $success = " ";

        $sql = "INSERT INTO `requests`(`name`, `phone`, `request`,`hospital`, `status`) VALUES ('$requesterName', '$requesterPhone','$requestedBg','$hospitalName','1')";
       
        if ($conn->query($sql) === TRUE) {
            $success =  "Blood Sample Requested";
        } else {
            $error = $conn->error;
        }

        if(empty($error)){
            $reponse = array('status'=>'1', 'content'=>$success);
        }else{
            $reponse = array('status'=>'1', 'content'=>$error);
        }

        echo json_encode($reponse);
    }
?>