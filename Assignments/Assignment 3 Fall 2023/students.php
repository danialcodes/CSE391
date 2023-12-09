<h1 class="text-info-emphasis mb-5">CSE 391 Students Slot Registration</h1>


<form class="row g-3" action="register.php" method="post">
    <div class="col-md-5">
    <label for="validationDefault01" class="form-label">
        Full Name
    </label>
    <input type="text" name="name" class="form-control" id="validationDefault01" required>
    </div>
    <div class="col-md-4">
    <label for="validationDefault02" class="form-label">
        Email
    </label>
    <input type="email" name="email" class="form-control" id="validationDefault02" required>
    </div>
    <div class="col-md-3">
    <label for="validationDefaultUsername"    class="form-label">
        SID
    </label>
    <input type="text" name="sid" class="form-control" id="validationDefaultUsername"
        aria-describedby="inputGroupPrepend2" required>

    </div>
    <div class="col-md ">
    <label for="slot" class="form-label">Select the slot</label>
    <select class="form-select" id="slot" name="slot" required>



        <option selected disabled value="">Choose...</option>
        <?php
            require_once('DBconnect.php');
            session_start();

            function getRemainingSeats($conn, $slot) {
                // Query to get the count of students for the specified timeslot
                $slotQuery = "SELECT COUNT(*) as student_count FROM student WHERE slot = '$slot'";
                $slotResult = mysqli_query($conn, $slotQuery);
                $slotRow = mysqli_fetch_assoc($slotResult);

                $studentCount = $slotRow['student_count'];
                $remainingSeats = 8 - $studentCount;

                return $remainingSeats;
            }

            $slots = array(
                "Slot-1",
                "Slot-2",
                "Slot-3",
                "Slot-4"
            );

            foreach ($slots as $slot) {
                $remainingSeats = getRemainingSeats($conn, $slot);
                echo "<option value=\"$slot\">$slot           ----- ($remainingSeats seats remaining)</option>";
            }
            ?>
    </select>
    </div>
    <div class="col-12">
    <button class="btn btn-outline-success" type="submit">Submit</button>
    <button class="btn btn-outline-danger" type="reset">Reset</button>
    </div>
</form>