<?php 
    session_start();

    if(isset($_SESSION['user_type']) && !empty($_SESSION['user_type']) && $_SESSION['user_type'] === 'hospital'){
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
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
                    <li><a  href="http://localhost/Internshala/blood_bank/index.php">Home</a></li>
                    <li><a href="http://localhost/Internshala/blood_bank/available-blood-to-all.php">All Blood</a></li>
                    <?php
                        if(isset($_SESSION['user_type']) && !empty($_SESSION['user_type']) && $_SESSION['user_type'] === 'hospital'){
                            echo'<li><a class="" href="http://localhost/Internshala/blood_bank/hospital-home.php">My Bank</a></li>
                            <li><a href="http://localhost/Internshala/blood_bank/add-blood-info.php">Add Blood Info</a></li>
                            <li><a href="http://localhost/Internshala/blood_bank/new-requests.php">New Requests<sup id="newReq">'.$reqCount.'</sup></a></li>
                            <li><a href="" id="logout">Logout</a></li>
                            <li><a href="#"><?php echo isset($_SESSION["hospital_name"]) ? $_SESSION["hospital_name"] : "NA"?></a></li>';
                        }else {
                            echo '<li><a href="" data-toggle="modal" data-target="#showLogin">Login/Register</a></li>';
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </header>


    <div class="row">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/slider1.jpg" alt="">
                </div>

                <div class="item">
                    <img src="images/slider2.jpg" alt="">
                </div>

                <div class="item">
                    <img src="images/slider3.png" alt="">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

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