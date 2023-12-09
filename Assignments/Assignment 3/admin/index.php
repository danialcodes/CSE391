<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat&family=Montserrat:wght@900&family=Tiro+Tamil&family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>CSE391 Assignment 2</title>
</head>
<body>
    <!-- connect to dbconnection  -->
    <?php
        include '../db/dbConnect.php';
        include '../components/check-admin.php';
        include '../components/menu.php';
    ?>
    <!-- create a grid with 3 parts to view list of mechanics, list of appointments and list of customers with icon -->
    <!-- header -->
    <div class="sectiontitle">
        <h1>Admin Portal</h1>
    </div>
    <div class="admin-functions">
        <div class="admin1"> 
            <a href="appointments.php">
                <div class="card 1">
                    <div class="card_icon"> 
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <div class="card_title">
                    <p>Appointments</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="admin2">
            <a href="customers.php">
                <div class="card 2">
                        <div class="card_icon"> 
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                        <div class="card_title">
                        <p>Customers</p>
                        </div>
                </div>
            </a>
        </div>
        <div class="admin3">
            <a href="mechanics.php">
                <div class="card 3">
                        <div class="card_icon"> 
                            <i class="fa-solid fa-user-cog"></i>
                        </div>
                        <div class="card_title">
                        <p>Mechanics</p>
                        </div>
                </div>
            </a>
    </div>
    <div class="spacing"></div>
    <script src="https://kit.fontawesome.com/692c2638c1.js" crossorigin="anonymous"></script>  
    </body>
</html>