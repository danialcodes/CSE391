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
    <div class="mechanic-title">
        <h1>Book a Mechanic Now!</h1>
    </div>
    <div class="text-banner" id="add-appointment">
                <?php
                    if(isset($_SESSION['appointmentadd'])){
                        echo '<h3>Appointment added successfully!</h3>';
                        unset($_SESSION['appointmentadd']);
                    }
                    if(isset($_SESSION['appointmentaddfailed'])){
                        echo '<h3>"Something went wrong!</h3>';
                        unset($_SESSION['appointmentaddfailed']);
                    }
                    if(isset($_SESSION['appointmentfailed'])){
                        echo '<h3>The mechanic you selected is not available. Please select another day.</h3>';
                        unset($_SESSION['appointmentfailed']);
                    }
                ?>
    </div>
    <div class="section_container">       
        <div class="appointment-form-container">
            <form action="components/add-appointment.php" method="POST">
                <div class="appointment-row">
                    <div class="appointment-form-group">
                        <label for="mechanic">Mechanic</label>
                        <select id="mechanic" name="mechanic" class="form-control">
                            <?php
                                $query = "SELECT * FROM mechanics";
                                $result = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<option value="'.$row['mechanic_id'].'">'.$row['mechanic_name'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="appointment-form-group">
                        <label for="car">Car</label>
                        <select id="car" name="car" class="form-control">
                            <?php
                                session_start();
                                $query = "SELECT * FROM cars WHERE user_id = ".$_SESSION['id'];
                                $result = mysqli_query($conn, $query);
                                // show options if its 0, then show add a car 
                                if(mysqli_num_rows($result) == 0){
                                    echo '<option value="0">You haven\'t added a car yet. </option>';
                                }
                                else{
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<option value="'.$row['id'].'">'.$row['car_model'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="appointment-form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="appointment-form-group">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" name="time">
                    </div>
                </div>
                <button type="submit" name="submit" class="button">Submit</button>
            </form>
        </div>
    </div>
    

    <div class="spacing"></div>
    <script src="https://kit.fontawesome.com/692c2638c1.js" crossorigin="anonymous"></script>  
    </body>
</html>