<?php
    session_start();
    if(!isset($_SESSION['user_type']) && $_SESSION['user_type'] !== 'hospital' ){
        echo"<script>alert('You are not allowed to view this page')</script>";
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
    <title>Hospital Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
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
                    <li><a class="" href="http://localhost/Internshala/blood_bank/hospital-home.php">My Bank</a></li>
                    <li><a href="http://localhost/Internshala/blood_bank/add-blood-info.php">Add Blood Info</a></li>
                    <li><a href="http://localhost/Internshala/blood_bank/new-requests.php">New Requests<sup id="newReq"><?php echo !empty($reqCount) ? $reqCount : "0"; ?></sup></a></li>
                    <li><a href="#">Logout</a></li>
                    <li><a href="#"><?php echo isset($_SESSION['hospital_name']) ? $_SESSION['hospital_name'] : "NA"?></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <hr>
    <?php
        $sql = "SELECT * FROM `requests` WHERE `hospital`= '$hospName'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo"<div class='container'><h2 id='heading'>All requests : </h2><table class='table' id='allRequestsHosp'>
                <thead>
                    <tr>
                        <th>Requester Name</th>
                        <th>Requester Phone</th>
                        <th>Request</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
            ";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row['name']."</td>
                    <td>".$row['phone']."</td>
                    <td>".$row['request']."</td>
                    <td>".$row['status']."</td>
                    <td><i class='fa fa-check reqCompleted'></i></td>
                </tr>";                
            }
            echo "</tbody>
            </table></div>";
        }
    ?>
</body>
</html>