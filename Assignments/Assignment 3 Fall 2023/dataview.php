<?php
    require_once "header.php";
    require_once('DBconnect.php');

    if(!isset($_SESSION['username'])){
        $_SESSION['error'] = "<b>Please login first!!</b>";
        header("Location: faculty.php");
        return;
    }

    function getStudents($conn, $searchTerm, $sortBy) {
        $query = "SELECT * FROM student";


        if (!empty($searchTerm)) {
            $query .= " WHERE name LIKE '%$searchTerm%' OR sid LIKE '%$searchTerm%' OR slot LIKE '%$searchTerm%'";
        }

    

        $query .= " ORDER BY $sortBy";


        $result = mysqli_query($conn, $query);


        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['sid'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['slot'] . "</td>";
            echo "</tr>";
        }
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $searchTerm = $_POST["searchTerm"];
        $sortBy = $_POST["sortBy"];
    } else {

        $searchTerm = "";
        $sortBy = "name"; 
    }
?>

    <h1 class="text-info-emphasis mb-5">
        CSE 391 Faculty View of Student Slot
    </h1>
    <form class="row g-3" action="" method="post">
    <div class="col-md-6">
        <label for="searchTerm" class="form-label">
            Search
        </label>
        <input type="text" id="searchTerm" class="form-control" name="searchTerm" value="<?php echo $searchTerm; ?>">
    </div>
    <div class="col-md-6">
        <label for="sortBy" class="form-label">
            Sort by
        </label>


        <select id="sortBy" name="sortBy"  class="form-select">
        <option selected disabled value="">Choose...</option>
        <option value="name" <?php echo ($sortBy == "name") ? "selected" : ""; ?>>
            Name
        </option>
        <option value="sid" <?php echo ($sortBy == "sid") ? "selected" : ""; ?>>
            SID
        </option>
        <option value="slot" <?php echo ($sortBy == "slot") ? "selected" : ""; ?>>Slot</option>
            </select>
    </div>
    <div class="col-12">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </div>
</form>
<table class="table mt-5">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">SID</th>
            <th scope="col">Email</th>
            <th scope="col">Slot</th>
        </tr>
    </thead>
    <tbody>
        <?php
        getStudents($conn, $searchTerm, $sortBy);
        ?>
    </tbody>
</table>
<div class="button-box">
    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>
