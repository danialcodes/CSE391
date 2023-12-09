<nav class="wrapper">
    <div class="logo">
        <a href="/index.php">
            <img src="../img/logo.png" alt="logo">
        </a>
    </div>
    <div class="navbar">
        <ul>
        <li><a href="/index.php">Home</a></li>
        <?php
            session_start();
            if(!isset($_SESSION['username'])){
                echo '<li><a href="/login.php">Login</a></li>
                <li><a href="/signup.php">Signup</a></li>';
            }
            else{
                $username = $_SESSION['username'];
                $sql = "SELECT * FROM users WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo '<li><a href="/booking.php">Book</a></li>
                <li class="dropdown" id="dropdown" style="background-color:#1a5027;">
                <a href="#" class="dropdown-toggle" id="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION['username'].'<span class="caret"></span></a>
                <ul class="dropdown-menu">';
                if($row['role'] == 1){
                    echo '<li><a href="/admin"><b>Admin</b></a></li>';
                }
                echo '<li><a href="/user/cars.php">Cars List</a></li>
                    <li><a href="/user/appointments.php">Bookings</a></li>
                    <li><a href="/user/user_update.php">Update Profile</a></li>
                    <li><a href="/logout.php">Logout</a></li>
                </ul>
                </li>';
            }
        ?>
        </ul>
    </div>
</nav>