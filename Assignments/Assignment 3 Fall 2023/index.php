<?php
            require_once "header.php";
            require_once "students.php";

?>

    
    <div class="mt-2 d-flex justify-content-center ">
            <?php
                if(isset($_SESSION['error'])){
                    echo'<div class="bg-success text-white mx-5 h-50 p-2 text-center" >'.$_SESSION['error'].'</div>';
                    unset($_SESSION['error']);
                }
                if(isset($_SESSION['success'])){
                    echo'<div class="bg-danger text-white mx-5   h-50 p-2 text-center text-justify " >'.$_SESSION['success'].'</div>';
                    unset($_SESSION['success']);
                }
            ?>
    </div>
  </div>







  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>