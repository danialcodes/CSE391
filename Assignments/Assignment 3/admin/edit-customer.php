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
    <!-- update profile info -->
    <!-- get user info from database -->

    <?php
        $id = $_GET['id'];
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
    ?>
    <div class="wrapper">
        <div class="update-profile">
            <div class="text-banner" id="update-profile">
                <?php
                    if(isset($_SESSION['profileupdate'])){
                        echo '<h2>Successfully Updated!</h2>';
                        unset($_SESSION['profileupdate']);
                    }
                ?>
            </div>
            <h1>Update Profile</h1>
            <form action="../components/edit-customer.php" method="post">
                <div class="update-profile-info">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <label for="name">Username</label>
                    <input type="text" name="username" value="<?php echo $user['username'] ?>">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?php echo $user['email'] ?>">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="<?php echo $user['phone'] ?>">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="<?php echo $user['address'] ?>">
                    <label for="role">Role</label>
                    <select name="role">
                        <option value="0" <?php if($user['role'] == '0'){echo 'selected';} ?>>Customer</option>
                        <option value="1" <?php if($user['role'] == '1'){echo 'selected';} ?>>Admin</option>
                    </select>
                </div>
                <div class="update-profile-submit">
                    <input type="submit" value="Update" name="update" class="button">
                </div>
            </form>
        </div>
    </div>
    <?php
        include '../components/footer.php';
    ?>
    <div class="spacing"></div>
    <script src="https://kit.fontawesome.com/692c2638c1.js" crossorigin="anonymous"></script>  
    </body>
</html>