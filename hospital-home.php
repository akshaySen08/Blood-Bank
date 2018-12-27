<?php
    session_start();
    if($_SESSION['user_type'] !== 'hospital'){
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
                    <?php
                        if(isset($_SESSION) && !empty($_SESSION)){
                            echo '<li id="logout"><a href="#">Logout</a></li>';
                        }else {
                            echo '<li><a href="#about" data-toggle="modal" data-target="#showLogin">Login/Register</a></li>';
                        }
                    ?>
                    <li><a href="#"><?php echo isset($_SESSION['hospital_name']) ? $_SESSION['hospital_name'] : "NA"?></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <hr>

    <?php

        $sql = "SELECT * FROM `available-blood` WHERE `hid`='$hid'";

        $result = $conn->query($sql);
        echo"";
        if ($result->num_rows > 0) {
            echo"<div class='container'><h2 id='heading'>Your Blood Bank Summary : </h2><table class='table' id='availBloodHosp'>
                <thead>
                    <tr>
                        <th>Blood Group</th>
                        <th>Donor</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
            ";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row['blood_group']."</td>
                    <td>".$row['donor']."</td>
                    <td>".$row['qty']."</td>
                    <td>".$row['date']."</td>
                    <td id='removeBlood'><i class='fa fa-trash'></i></td>
                </tr>";                
            }
            echo "</tbody>
            </table><a href='http://localhost/Internshala/blood_bank/add-blood-info.php'><div class='btn btn-success' id='addNew'>Add Blood Info</div></a></div>";
        }
    ?>

    <!-- Modal for showing login form -->
    <div id="showLogin" class="modal fade" role="dialog">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Login</h3>
                    <div class="alert alert-warning" id="messageBox"></div>
                </div>
                <div class="modal-body">
                    <form action="#" id="loginForm" method="POST">
                        <input type="hidden" value="receiver" id="userType" name="userType">
                        <div class="form-group">
                            <label for="loginEmail">Enter email : </label>
                            <input type="email" placeholder="Enter email" class="form-control" name="loginEmail"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="loginPwd">Password : </label>
                            <input type="password" placeholder="Enter password" id="loginPwd" class="form-control" name="loginPwd"
                                required>
                        </div>
                        <div class="checkbox">
                            <label for="checkHospital"><input type="checkbox" id="checkHospital" name="checkHospital">Login as hospital</label>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="loginBtn">Login</button>
                            <a href="http://localhost/Internshala/blood_bank/register-receiver.php"><div class="btn btn-primary" id="rgstrBtnRcvr">Register as
                                    Receiver</div></a>
                            <a href="http://localhost/Internshala/blood_bank/register-hospital.php"><div class="btn btn-primary" id="rgstrBtnHosp">Register a
                                    Hospital</div></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

