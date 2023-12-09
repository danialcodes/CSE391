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
        <div class="appointments-list">
            <div class="text-banner" id="appointments-list">
                <?php
                    if(isset($_SESSION['appointmentadd'])){
                        echo '<h2>Successfully Added!</h2>';
                        unset($_SESSION['appointmentadd']);
                    }
                    if(isset($_SESSION['appointmentaddfailed'])){
                        echo '<h2>"Something went wrong!</h2>';
                        unset($_SESSION['appointmentaddfailed']);
                    }
                    if(isset($_SESSION['appointmentdelete'])){
                        echo '<h2>Successfully Deleted!</h2>';
                        unset($_SESSION['appointmentdelete']);
                    }
                    if(isset($_SESSION['appointmentdeletefailed'])){
                        echo '<h2>"Something went wrong!</h2>';
                        unset($_SESSION['appointmentdeletefailed']);
                    }
                    if(isset($_SESSION['appointmentupdate'])){
                        echo '<h2>Successfully Updated!</h2>';
                        unset($_SESSION['appointmentupdate']);
                    }
                    if(isset($_SESSION['appointmentupdatefailed'])){
                        echo '<h2>"Something went wrong!</h2>';
                        unset($_SESSION['appointmentupdatefailed']);
                    }
                    // check if no appointment available for the user
                    $query = "SELECT * FROM appointments WHERE user_id = $id";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result) == 0){
                        echo '<h2>No appointments available! <br>Please create one first.</h2>';
                    }
                ?>
            </div>
            <h1>Appointments List for <?php echo $_SESSION['username'];?></h1>
            <table class="appointments-table">
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Mechanic</th>
                    <th>Vehicle</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                    $query = "SELECT * FROM appointments WHERE user_id = $id";
                    $result = mysqli_query($conn, $query);
                    while($appointment = mysqli_fetch_assoc($result)){
                        $query = "SELECT * FROM mechanics WHERE mechanic_id = ".$appointment['mechanic_id'];
                        $result2 = mysqli_query($conn, $query);
                        $mechanic = mysqli_fetch_assoc($result2);
                        $query = "SELECT * FROM cars WHERE id = ".$appointment['car_id'];
                        $result2 = mysqli_query($conn, $query);
                        $car = mysqli_fetch_assoc($result2);
                        $query = "SELECT * FROM users WHERE id = ".$car['user_id'];
                        $result2 = mysqli_query($conn, $query);
                        $customer = mysqli_fetch_assoc($result2);
                        echo '<tr>
                                <td>'.$appointment['date'].'</td>
                                <td>'.$appointment['time'].'</td>
                                <td>'.$mechanic['mechanic_name'].'</td>
                                <td>'.$car['car_model'].'</td>
                                <td><a href="edit-appointments.php?id='.$appointment['id'].'">Edit</a></td>
                                <td><a href="/components/delete-appointment.php?id='.$appointment['id'].'">Delete</a></td>
                            </tr>';
                    }
                ?>
            </table>
        </div>
    </div>
    <?php
        include '../components/footer.php';
    ?>
</body>
</html>

