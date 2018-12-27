<?php
    session_start();
    if($_SESSION['user_type'] !== 'hospital'){
        echo"<script>alert('Please login first');</script>";
        header("location:index.php");
    }

    $dbname = 'blood_donation';
    $password = 'root';
    $dbusr = 'root';
    $servername = 'localhost';
    $hid = isset($_SESSION["id"]) ? $_SESSION["id"] : " ";
    $hospName = isset($_SESSION['hospital_name']) ? $_SESSION['hospital_name'] : "NA";
    $conn = new mysqli($servername , $dbusr, $password, $dbname);

    if($conn->connect_error){
        die($conn->connect_error);
    }

    $reqCountSql = "SELECT COUNT(`id`) FROM `requests` WHERE `hospital`='$hospName';";
    $reqCountResult = $conn->query($reqCountSql);
    $row = $reqCountResult->fetch_assoc();
    $reqCount = $row['COUNT(`id`)'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add blood</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <header class="cf">
        <div class="logo">
            <a href="#" class="nav-brand">
                <img src="images/logo.png" alt="" srcset="" width="200px">
            </a>
        </div>
        <div class="nav">
            <nav class="navbar">
                <ul>
                    <li><a class="" href="http://localhost/Internshala/blood_bank/index.php">Home</a></li>
                    <li><a class="" href="http://localhost/Internshala/blood_bank/hospital-home.php">My bank</a></li>
                    <li><a href="http://localhost/Internshala/blood_bank/add-blood-info.php">Add Blood Info</a></li>
                    <li><a href="http://localhost/Internshala/blood_bank/new-requests.php">New Requests<sup id="newReq"><?php echo !empty($reqCount) ? $reqCount : "0"; ?></sup></a></li>
                    <li id="logout"><a href="#">Logout</a></li>
                    <li><a href="#"><?php echo isset($_SESSION['hospital_name']) ? $_SESSION['hospital_name'] : "NA"?></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <hr>
    <div class="container">
        <div class="col-md-8">
            <div id="messageBox"></div>
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h1>Add new blood record : </h1></div>
                    <div class="panel-body">
                        <form  id="addBloodForm" method="POST">
                            <div class="form-group">
                            <label for="bgroup">Select Blood Group :</label>
                                <select name="bgroup" class="form-control" id="bgroup">
                                    <option> </option>
                                    <option value="a+">A+</option>
                                    <option value="a-">A-</option>
                                    <option value="b+">B+</option>
                                    <option value="b-">B-</option>
                                    <option value="o+">O+</option>
                                    <option value="o-">O-</option>
                                    <option value="ab+">AB+</option>
                                    <option value="ab-">AB-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="donor">Donor Name :</label>
                                <input type="text" class="form-control" id="donor" name="donor" placeholder="Enter donor's name" >
                            </div>
                            <div class="form-group">
                                <label for="date">Date : </label>
                                <input type="date" class="form-control" id="date" name="date" >
                            </div>
                            <div class="form-group">
                                <label for="qty">Quantity : </label>
                                <input type="number" class="form-control" id="qty" name="qty" placeholder="Enter quantity donated" >
                            </div>
                        </form>
                        <button class="btn btn-primary" id="addNewBlood">Submit</button>  
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            
            <img src="images/bloodreg.png" alt="Any pic" width="100%" id="adBldRimg">
        </div>
    </div>
</body>
</html>