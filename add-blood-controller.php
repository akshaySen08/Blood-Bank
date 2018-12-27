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


    $bgroup = isset($_POST['bgroup']) ? $_POST['bgroup'] : " ";
    $donorName = isset($_POST['donor']) ? $_POST['donor'] : " ";
    $date = isset($_POST['date']) ? $_POST['date'] : " ";
    $quantity = isset($_POST['qty']) ? $_POST['qty'] : " ";
    $hospitalID = isset($_SESSION['id']) ? $_SESSION['id'] : " ";
    $success =" ";

    if(empty($hospitalID)){
        echo"<script>alert('Please login first');</script>";
        header("location:index.php");
    }
    
    if(empty($bgroup)){
        $error[] = ' Blood group required';
    }

    if(empty($donorName)){
        $error[] = ' Donor\'s name is required';
    }

    if (empty($date)) {
        $error[] = ' Date required';
    }

    if (empty($quantity)) {
        $error[] = ' Quantity required';
    }

    if(empty($error)){
        $sql = "INSERT INTO `available-blood`(`blood_group`, `donor`, `qty`, `date`, `hid`) VALUES ('$bgroup','$donorName','$quantity','$date','$hospitalID')";

        if ($conn->query($sql) === TRUE) {
            $success =  "New record created successfully";
        }else{
            $error[] = $conn->error;
        }
        $response = array('status'=>1, 'content'=>$success);
    }else{  
        $response = array('status'=>0, 'content'=>$error);
    }

    echo json_encode($response);
    die();
?>