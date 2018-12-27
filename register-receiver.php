<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration page</title>
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
            <a href="index.php" class="nav-brand">
                <img src="images/logo.png" alt="" srcset="" width="200px">
            </a>
        </div>
        <div class="nav">
            <nav class="navbar">
                <ul>
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href="#news">News</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#about" data-toggle="modal" data-target="#showLogin">Login/Register</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <hr>

    <div class="wrapper">
        <div class="container">
            <div class="col-md-8">
            <div class="messageBox"></div>
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h2 >Blood Donation <strong>Receiver's</strong> Registration : </h2></div>
                        <div class="panel-body">
                            <div class="rgstr">
                                <form id="rgstrRcvr" method="POST">
                                    <input type="hidden" value="receiver" name="userType">
                                    <div class="form-group">
                                        <label for="rcvrName">Full name : </label>
                                        <input id="rcvrName" type="text" placeholder="Enter Fullname" class="form-control" name="rcvrName">
                                    </div>
                                    <div class="form-group">
                                        <label for="bgroup">Select blood group :</label>
                                        <select name="bgroup" class="form-control" id="bgroup">
                                            <option value=" ">Select Blood Group</option>
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
                                        <label for="rcvrEmail">Email : </label>
                                        <input id="rcvrEmail" type="email" placeholder="Enter Email" class="form-control" name="rcvrEmail">
                                    </div>
                                    <div class="form-group">
                                        <label for="rcvrPwd">Password : </label>
                                        <input id="rcvrPwd" type="text" placeholder="Enter password" class="form-control" name="rcvrPwd">
                                    </div>
                                    <div class="form-group">
                                        <label for="rcvrAddress">Enter Full Addres : </label>
                                        <input id="rcvrAddress" type="text" placeholder="Enter current address" class="form-control"
                                            name="rcvrAddress">
                                    </div>
                                    <div class="form-group">
                                        <label for="rcvrPhone">Phone : </label>
                                        <input id="rcvrPhone" type="text" placeholder="Enter ten digit mobile no." class="form-control"
                                            name="rcvrPhone">
                                    </div>
                                </form>
                                <button id="rgstrBtnRcvr" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <img src="images/loveBloodDonors.jpeg" alt="Love Blood Donors" id='rgstrRcvrImg'>
            </div>
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
                            <label for="loginEmail">Email : </label>
                            <input type="email" placeholder="Enter Email" class="form-control" name="loginEmail"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="loginPwd">Password : </label>
                            <input type="password" placeholder="Enter password" id="loginPwd" class="form-control" name="loginPwd"
                                required>
                        </div>
                        <div class="checkbox">
                            <label for="checkHospital"><input type="checkbox" id="checkHospital">Login as hospital</label>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="loginBtn">Login</button>
                            <a href="http://localhost/Internshala/blood_bank/register-hospital.php"><div class="btn btn-primary" id="rgstrBtn">Register a
                                    Hospital</div></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>