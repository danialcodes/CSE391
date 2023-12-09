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
        <div class="customers-list">
            <div class="text-banner" id="customers-list">
                <?php
                    if(isset($_SESSION['appointmentadd'])){
                        echo '<h2>Successfully Added!</h2>';
                        unset($_SESSION['appointmentadd']);
                    }
                    if(isset($_SESSION['appointmentaddfailed'])){
                        echo '<h2>"Something went wrong!</h2>';
                        unset($_SESSION['appointmentaddfailed']);
                    }
                    if(isset($_SESSION['profiledelete'])){
                        echo '<h2>Successfully Deleted!</h2>';
                        unset($_SESSION['profiledelete']);
                    }
                    if(isset($_SESSION['profiledeletefailed'])){
                        echo '<h2>"Something went wrong!</h2>';
                        unset($_SESSION['profiledeletefailed']);
                    }
                    if(isset($_SESSION['profileupdate'])){
                        echo '<h2>Successfully Updated!</h2>';
                        unset($_SESSION['profileupdate']);
                    }
                    if(isset($_SESSION['profileupdatefailed'])){
                        echo '<h2>"Something went wrong!</h2>';
                        unset($_SESSION['profileupdatefailed']);
                    }
                ?>
            </div>
            <h1>Customers List</h1>
            <table class="appointments-table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Cars</th>
                    <th>Appointments</th>
                    <th>Roles</th>
                    <th>Action</th>
                </tr>
                <?php
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($conn, $query);
                    while($user = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                        echo '<td>'.$user['username'].'</td>';
                        echo '<td>'.$user['email'].'</td>';
                        echo '<td>'.$user['phone'].'</td>';
                        echo '<td>'.$user['address'].'</td>';
                        $query1 = "SELECT * FROM cars WHERE user_id = ".$user['id'];
                        $result1 = mysqli_query($conn, $query1);
                        $cars = mysqli_num_rows($result1);
                        echo '<td>'.$cars.'</td>';
                        $query2 = "SELECT * FROM appointments WHERE user_id = ".$user['id'];
                        $result2 = mysqli_query($conn, $query2);
                        $appointments = mysqli_num_rows($result2);
                        echo '<td>'.$appointments.'</td>';
                        if ($user['role'] == 0){
                            echo '<td>User</td>';
                        }else{
                            echo '<td>Admin</td>';
                        };
                        echo '<td>';
                        echo '<a href="edit-customer.php?id='.$user['id'].'">Edit</a>
                        <a href="../components/delete-customer.php?id='.$user['id'].'">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    // while($row = mysqli_fetch_assoc($result)){
                    //     echo '<tr>
                    //         <td>'.$row['username'].'</td>
                    //         <td>'.$row['email'].'</td>
                    //         <td>'.$row['phone'].'</td>
                    //         <td>'.$row['address'].'</td>';
                    //         $query = "SELECT * FROM cars WHERE user_id = ".$row['id'];
                    //         $result = mysqli_query($conn, $query);
                    //         $cars = mysqli_num_rows($result);
                    //         echo '<td>'.$cars.'</td>';
                    //         $query = "SELECT * FROM appointments WHERE user_id = ".$row['id'];
                    //         $result = mysqli_query($conn, $query);
                    //         $appointments = mysqli_num_rows($result);
                    //         echo '<td>'.$appointments.'</td>';
                    //         $query = "SELECT role FROM users WHERE id = ".$row['id'];
                    //         $result = mysqli_query($conn, $query);
                    //         $role = mysqli_fetch_assoc($result);
                    //         if ($row['role'] == 0){
                    //             echo '<td>User</td>';
                    //         }else{
                    //             echo '<td>Admin</td>';
                    //         };
                    //         echo '<td>
                    //             <a href="edit-customer.php?id='.$row['id'].'">Edit</a>
                    //             <a href="deletecustomer.php?id='.$row['id'].'">Delete</a>
                    //         </td>
                    //     </tr>';
                    // }
    
                ?>
            </table>
        </div>
    </div>
    <?php
        include '../components/footer.php';
    ?>
</body>
</html>
