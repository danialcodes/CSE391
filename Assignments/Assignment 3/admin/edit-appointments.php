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
        <div class="update-profile">
            <h1>Update Appointment</h1>
            <?php 
            // get appointment info from database by GET id
            session_start();
            $userid = $_GET['id'];
            $query = "SELECT * FROM appointments WHERE id = $userid";
            $result = mysqli_query($conn, $query);
            $appointment = mysqli_fetch_assoc($result);
            ?>
            <form action="../components/edit-appointment.php" method="post">
                <div class="form-group">
                    <label for="mechanic">Mechanic</label>
                    <select id="mechanic" name="mechanic" class="form-control">
                        <?php
                            $query = "SELECT * FROM mechanics";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($result)){
                                // if mechanic id is the same as the mechanic id in the appointment, select it
                                if($row['mechanic_id'] == $appointment['mechanic_id']){
                                    echo "<option value='".$row['mechanic_id']."' selected>".$row['mechanic_name']."</option>";
                                }else{
                                    echo "<option value='".$row['mechanic_id']."'>".$row['mechanic_name']."</option>";
                                }  
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" class="form-control" value="<?php echo $appointment['date']; ?>">
                </div>
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" id="time" name="time" class="form-control" value="<?php echo $appointment['time']; ?>">
                </div>
                <input type="hidden" name="appointment-id" id="appointment-id" value="<?php echo $appointment['id']; ?>">
                <input type="submit" value="Update" name="update" class="button">      
            </form>
        </div>
    </div>
</body>
</html>