<?php
    require_once '../db/dbConnect.php';
    if(isset($_POST['submit'])){
        session_start();
        $user_id = $_SESSION['id'];
        $mechanic_id = $_POST['mechanic'];
        $car_id = $_POST['car'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        // check if a mechanic has already 4 appointments on the same day
        $query1 = "SELECT * FROM appointments WHERE mechanic_id = $mechanic_id AND date = '$date'";
        $result1 = mysqli_query($conn, $query1);
        if(mysqli_num_rows($result1) >= 4){
            $_SESSION['appointmentfailed'] = '1';
            header('Location: ../booking.php');
        }
        else{
            $query = "INSERT INTO appointments (mechanic_id, car_id, user_id, date, time) VALUES ($mechanic_id, $car_id, $user_id, '$date', '$time')";
            $result = mysqli_query($conn, $query);
            if($result){
                $_SESSION['appointmentadd'] = '1';
                header('Location: ../booking.php');
            }
            else{
                $_SESSION['appointmentaddfailed'] = '1';
                header('Location: ../booking.php');
            }
        }
    }
?>
