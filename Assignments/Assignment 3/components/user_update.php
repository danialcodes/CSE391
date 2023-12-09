<?php
    require_once '../db/dbConnect.php';
    // User clicked submit in the form to update the data
    
    if(isset($_POST['update'])){
        session_start();
        $id = $_SESSION['id'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $query = "UPDATE users SET phone = '$phone', address = '$address' WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if($result){
            session_start();
            $_SESSION['profileupdate']="1";
            header("Location: ../user/user_update.php");         
        }else{
            echo '<script>alert("Profile not updated!");</script>';
        }
}