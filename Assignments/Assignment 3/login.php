<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat&family=Montserrat:wght@900&family=Tiro+Tamil&family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>CSE391 Assignment 2</title>
</head>
<body>
    <!-- connect to dbconnection  -->
    <?php
        include 'db/dbConnect.php';
    ?>
    <?php
        include 'components/menu.php';
    ?>
    <div class="text-banner" id="update-profile">
                <?php
                    if(isset($_SESSION['incorrectpassword'])){
                        echo '<h2>Incorrect Password!</h2>';
                        unset($_SESSION['incorrectpassword']);
                    }
                    if(isset($_SESSION['notadmin'])){
                        echo '<h2>You don\'t have sufficient permissions to visit this page!</h2>';
                        unset($_SESSION['notadmin']);
                    }
                    if(isset($_SESSION['notloggedin'])){
                        echo '<h2>Please log in to continue!</h2>';
                        unset($_SESSION['notloggedin']);
                    }
                ?>
    </div>
    <div class="login-form-container">
        <form action="components/login.php" method="post">
            <div class="login-form">
                <div class="login-form-header">
                    <h1>Login</h1>
                </div>
                <div class="login-form-body">
                    <div class="login-form-input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username">
                    </div>
                    <div class="login-form-input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="login-form-submit">
                        <input type="submit" name="login" value="Login">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="spacing"></div>
    <div class="login-form-container" style="text-align: center">
        <button onclick="loginasadmin()">Login as admin</button>
        <button onclick="loginasuser()">Login as user</button>
    </div>

    <div class="spacing"></div>
    <script src="script.js"></script> 
    <script src="https://kit.fontawesome.com/692c2638c1.js" crossorigin="anonymous"></script>  
    </body>
</html>