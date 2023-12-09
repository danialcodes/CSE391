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
    <?php
        include 'db/dbConnect.php';
    ?>
    <?php
        include 'components/menu.php';
    ?>
    <div class="text-banner" id="update-profile">
                <?php
                    if(isset($_SESSION['passwordunmatched'])){
                        echo '<h2>Password does not match!</h2>';
                        unset($_SESSION['passwordunmatched']);
                    }
                    if(isset($_SESSION['signupfailed'])){
                        echo '<h2>Signup Failed!</h2>';
                        unset($_SESSION['signupfailed']);
                    }
                    if(isset($_SESSION['emailtaken'])){
                        echo '<h2>The Email Address is already registered! Please try signing in!</h2>';
                        unset($_SESSION['emailtaken']);
                    }
                    if(isset($_SESSION['usernametaken'])){
                        echo '<h2>The username is already registered! Please try signing in or try another username!</h2>';
                        unset($_SESSION['usernametaken']);
                    }
                ?>
    </div>
    <div class="login-form-container">
    <form action="components/signup.php" method="post">
            <div class="login-form-header">
                    <h1>Signup</h1>
            </div>
        <div class="login-form-body">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="confirm-password" id="confirm-password" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="signup-form-submit">
                <input type="submit" name="signup" value="Signup">
            </div>
        </div>
    </form>
    </div>
    <div class="spacing"></div>
    <script src="script.js"></script> 
    <script src="https://kit.fontawesome.com/692c2638c1.js" crossorigin="anonymous"></script>  
    </body>
</html>