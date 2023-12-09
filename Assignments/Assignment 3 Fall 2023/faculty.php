<?php
            require_once "header.php";
            if(isset($_SESSION['username'])){
                header("Location: dataview.php");
                return;
            }
?>
    <h1 class="text-info-emphasis mb-5">CSE 391 Faculty Login</h1>
    
    
<form class="row g-3" action="signin.php" method="post">
    <div class="col-md-6">
        <label for="validationDefault01" class="form-label">
            Email
        </label>
        <input type="email" name="email" class="form-control" id="validationDefault01" required>
    </div>
    <div class="col-md-6">
        <label for="validationDefault02" class="form-label">
            Password
        </label>
        <input type="password" name="password" class="form-control" id="validationDefault02" required>
    </div>
    <div class="col-12">
        <button class="btn btn-outline-success" type="submit">Login</button>
    </div>
</form>


<div class="mt-2 d-flex justify-content-center ">
            <?php
                if(isset($_SESSION['error'])){
                    echo'<div class="bg-danger text-white mx-5 h-50 p-2 text-center" >'.$_SESSION['error'].'</div>';
                    unset($_SESSION['error']);
                }
                if(isset($_SESSION['success'])){
                    echo'<div class="bg-success text-white mx-5   h-50 p-2 text-center text-justify " >'.$_SESSION['success'].'</div>';
                    unset($_SESSION['success']);
                }
                
            ?>
    </div>
</div>
