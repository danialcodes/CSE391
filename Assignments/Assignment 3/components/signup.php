<?php
    require_once '../db/dbConnect.php';
    if(isset($_POST['signup'])){
        $username = strtolower($_POST['username']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];
        $email = $_POST['email'];
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            session_start();
            $_SESSION['usernametaken']="1";
            header('location: ../signup.php');
        }
        else{
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                session_start();
                $_SESSION['emailtaken']="1";
                header('location: ../signup.php');
            }
            else{
                    if($password == $confirm_password){
                        $password = md5($password);
                        $sql = "INSERT INTO users (username, password, email, role) VALUES ('$username', '$password', '$email', '0')";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            header('location: ../index.php');
                        }else{
                            session_start();
                            $_SESSION['signupfailed']="1";
                            header('location: ../signup.php');
                        }
                    }
                    else{
                        session_start();
                        $_SESSION['passwordunmatched']="1";
                        header('location: ../signup.php');
                    }              
                }
            }
    }
    else{
        session_start();
        $_SESSION['signupfailed']="1";
        header('location: ../signup.php');
    }
?>
