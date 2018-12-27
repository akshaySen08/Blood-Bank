<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hospital Registration page</title>
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
                            <div class="panel-heading"><h2 >Blood Donation <strong>Hospital's</strong> Registration : </h2></div>
                            <div class="panel-body">
                                <div class="rgstr">
                                    <form id="rgstrHosp" method="POST">
                                        <input type="hidden" value="hospital" name="userType">
                                        <div class="form-group">
                                            <label for="hospName">Hospital name : </label>
                                            <input id="hospName" type="text" placeholder=" Hospital's Fullname" class="form-control" name="hospName">
                                        </div>
                                        <div class="form-group">
                                            <label for="hospRegNum">Hospital registration number : </label>
                                            <input id="hospRegNum" type="text" placeholder=" Hospital's registration number" class="form-control"
                                                name="hospRegNum">
                                        </div>
                                        <div class="form-group">
                                            <label for="hospAdress"> Full addres : </label>
                                            <input id="hospAddress" type="text" placeholder="Hospital's address" class="form-control" name="hospAddress">
                                        </div>
                                        <div class="form-group">
                                            <label for="ownerName"> Owner's name : </label>
                                            <input id="ownerName" type="text" placeholder=" Owner's full name" class="form-control" name="ownerName">
                                        </div>
                                        <div class="form-group">
                                            <label for="hospEmail">Email (hospital) : </label>
                                            <input id="hospEmail" type="email" placeholder=" Hospital's mail" class="form-control" name="hospEmail">
                                        </div>
                                        <div class="form-group">
                                            <label for="hospPassword">Password : </label>
                                            <input id="hospPassword" type="text" placeholder="Password must be more than 5 chars" class="form-control"
                                                name="hospPassword">
                                        </div>
                                        <div class="form-group">
                                            <label for="telPhone">Telephone : </label>
                                            <input id="telPhone" type="text" placeholder=" Telephone no. (Hospital)" class="form-control"
                                                name="telPhone">
                                        </div>
                                    </form>
                                    <button id="rgstrBtnHosp" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            <div class="col-md-4">
                <img src="images/donateBloodAndMakeDifference.jpg" alt="Donate Blood And Make DIfference" id="rgstrHospImg">
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
                            <label for="loginEmail">Enter email : </label>
                            <input type="email" placeholder=" Enter email" class="form-control" name="loginEmail"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="loginPwd">Password : </label>
                            <input type="password" placeholder=" password" id="loginPwd" class="form-control" name="loginPwd"
                                required>
                        </div>
                        <div class="checkbox">
                            <label for="checkHospital"><input type="checkbox" id="checkHospital">Login as hospital</label>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="loginBtn">Login</button>
                            <a href="http://localhost/Internshala/blood_bank/register-receiver.php"><div class="btn btn-primary" id="rgstrBtn">Register as
                                    Receiver</div></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>