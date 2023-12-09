<?php
session_start();
?>
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
    <?php
        include '../db/dbConnect.php';
    ?>
    <?php
        include '../components/menu.php';
    ?>
    <?php
        $id = $_SESSION['id'];
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
    ?>
    <div class="wrapper">
        <div class="add-car">
            <div class="text-banner" id="add-car">
                <?php
                    if(isset($_SESSION['caradd'])){
                        echo '<h2>Successfully Added!</h2>';
                        unset($_SESSION['caradd']);
                    }
                    if(isset($_SESSION['caraddfailed'])){
                        echo '<h2>"Something went wrong!</h2>';
                        unset($_SESSION['caraddfailed']);
                    }
                    if(isset($_SESSION['cardelete'])){
                        echo '<h2>Successfully Deleted!</h2>';
                        unset($_SESSION['cardelete']);
                    }
                    if(isset($_SESSION['cardeletefailed'])){
                        echo '<h2>"Something went wrong!</h2>';
                        unset($_SESSION['cardeletefailed']);
                    }
                ?>
            </div>
            <h1>Add Car</h1>
            <form action="../components/cars-add.php" method="post">
                <div class="add-car-info">
                    <label for="car_license">Car License Number</label>
                    <input type="text" name="car_license" value="">
                    <label for="car_registration">Car Registration Number</label>
                    <input type="number" name="car_registration" value="">
                    <label for="car_model">Car Model</label>
                    <input type="text" name="car_model" value="">
                </div>
                <div class="add-car-submit">
                    <input type="submit" value="Add" name="add" class="button">
                </div>
            </form>
            <!-- Display the list of cars added already from Database -->
            <div class="car-list">
                <h2>Cars Added</h2>
                <?php
                    $query = "SELECT * FROM cars WHERE user_id = $id";
                    $result = mysqli_query($conn, $query);
                    while($car = mysqli_fetch_assoc($result)){
                        echo '<div class="car-item">
                                <div class="car-info">
                                <div class="car-delete">
                                <a href="../components/cars-delete.php?id='.$car['id'].'">
                                <i class="fas fa-times"></i>
                                </a>
                            </div>
                                    <p>Car License Number: '.$car['car_license'].'</p>
                                    <p>Car Registration Number: '.$car['car_registration'].'</p>
                                    <p>Car Model: '.$car['car_model'].'</p>
                                    
                                </div>
                            </div>';
                    }
                ?>
    </div>
    <?php
        include '../components/footer.php';
    ?>
    <div class="spacing"></div>
    <script src="https://kit.fontawesome.com/692c2638c1.js" crossorigin="anonymous"></script>  
    </body>
</html>