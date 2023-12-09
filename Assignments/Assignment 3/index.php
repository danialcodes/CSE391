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
    <div class="spacing"></div>
    <div class="mechanic-title">
        <h1>Hire a Mechanic for your car!</h1>
    </div>
    <div class="admin-functions">
        <div class="admin1"> 
                <div class="card 1" style="width: 500px;height: 350px;">
                    <div class="card_image"> 
                        <img src="img/svg/signin.svg" alt="">
                    </div>
                    <div class="card_title">
                        <p>Create an account</p>
                    </div>
                </div>
        </div>
        <div class="admin2">
                <div class="card 2" style="width: 500px;height: 350px;">
                    <div class="card_image"> 
                        <img src="img/svg/booking.svg" alt="">
                    </div>
                    <div class="card_title">
                        <p>Book an appointment</p>
                    </div>
                </div>
        </div>
        <div class="admin3">
                <div class="card 3" style="width: 500px;height: 350px;">
                    <div class="card_image"> 
                        <img src="img/svg/car.svg" alt="">
                    </div>
                    <div class="card_title">
                        <p>Go to mechanic</p>
                    </div>
                </div>
    </div>
    <script src="script.js"></script> 
    <script src="https://kit.fontawesome.com/692c2638c1.js" crossorigin="anonymous"></script>  
    </body>
</html>