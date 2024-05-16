<?php

include('config.php');

session_start();
// Check if user is not logged in
if(!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: doctor-login.php");
    exit(); // Stop further execution
}

// Retrieve the username of the logged-in user
$username = $_SESSION['username'];

// Retrieve the user's first name from the database
$nameQuery = "SELECT `first_name` FROM `my_employee` WHERE `username` = '$username'";
$nameResult = $conn->query($nameQuery);

if ($nameResult && $nameResult->num_rows > 0) {
    $row = $nameResult->fetch_assoc();
    $userName = $row['first_name'];
} else {
    echo 'No name found for the user.';
}

if(!$username) {
    header("Location: doctor-login.php");
}

// Retrieve schedules created by the logged-in user
$sql = "SELECT * FROM employee_schedule WHERE created_by = '$userName'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $schedule = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    header("Location: doctor-login.php");
}

// Retrieve schedules created by the logged-in user
$sqlCon = "SELECT * FROM confirmed_schedule WHERE created_by = '$userName'";
$resultCon = mysqli_query($conn, $sqlCon);

if ($resultCon) {
    $scheduleCon = mysqli_fetch_all($resultCon, MYSQLI_ASSOC);
} else {
    header("Location: doctor-login.php");
}

// Retrieve the user's information from the database
$userInfoQuery = "SELECT * FROM my_employee WHERE username = '$username'";
$userInfoResult = mysqli_query($conn, $userInfoQuery);

if ($userInfoResult && mysqli_num_rows($userInfoResult) > 0) {
    $userInfo = mysqli_fetch_assoc($userInfoResult);
} else {
    echo 'User information not found.';
}

if(isset($_POST['submit'])){

    if(empty($_POST['status-input'])){
        $errors['status-input'] = 'Status is required <br/>';
    }

    if(empty($_POST['date-input'])){
        $errors['date-input'] = 'A date is required <br/>';
    }
    
    $createdBy = $userInfo['first_name']; // Using first name as createdBy
    $middleName = $userInfo['middle_name'];
    $lastName = $userInfo['last_name'];
    $status = mysqli_real_escape_string($conn, $_POST['status-input']);
    $date = mysqli_real_escape_string($conn, $_POST['date-input']);
    $description = mysqli_real_escape_string($conn, $_POST['description-input']);

    // Create SQL to insert schedule event
    $sql = "INSERT INTO employee_schedule (`employee_id`, `created_by`, `middle_name`, `last_name`, `status`, `date`, `description`) VALUES ('{$userInfo['id']}', '$createdBy', '$middleName', '$lastName', '$status', '$date', '$description')";

    // Save the schedule event
    if (mysqli_query($conn, $sql)){
        header('Location: doctor-schedule.php');
    } else {
        // Error handling
        echo 'Query error: ' . mysqli_error($conn);
    }
}


// If user is logged in, retrieve the username
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.php');?>


        <div class="main--content">
<!-- Main wrapper for the calendar application -->
<section>
    <div class="top-wrapper">
    <div class="wrapper">
                <?php
            // Function to generate the calendar HTML
            function generateCalendar($month, $year) {
                $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
                $totalDaysOfMonth = date('t', $firstDayOfMonth);
                $dateComponents = getdate($firstDayOfMonth);
                $monthName = $dateComponents['month'];
                $dayOfWeek = $dateComponents['wday'];
        
                // Get current date
                $currentDay = date('j');
                $currentMonth = date('n');
                $currentYear = date('Y');
        
                // Create an array of day names
                $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        
                // Start table and create table header
                $calendar = "<table class='table-calendar'>";
                $calendar .= "<thead><tr>";
                foreach ($daysOfWeek as $day) {
                    $calendar .= "<th>$day</th>";
                }
                $calendar .= "</tr></thead>";
                $calendar .= "<tbody><tr>";
        
                // Fill in blank cells for the first week
                for ($i = 0; $i < $dayOfWeek; $i++) {
                    $calendar .= "<td></td>";
                }
        
                $dayCounter = 1;
                $month = str_pad($month, 2, "0", STR_PAD_LEFT); // Add leading zeros if needed
                while ($dayCounter <= $totalDaysOfMonth) {
                    if ($dayOfWeek == 7) { // Start a new row if it's Sunday
                        $dayOfWeek = 0;
                        $calendar .= "</tr><tr>";
                    }
                    $dayRel = str_pad($dayCounter, 2, "0", STR_PAD_LEFT); // Add leading zeros if needed
                    $date = "$year-$month-$dayRel";
        
                    // Check if it's the current day
                    $isToday = ($dayCounter == $currentDay && $month == $currentMonth && $year == $currentYear);
        
                    // Add class for today
                    $class = $isToday ? "class='today'" : "";
        
                    $calendar .= "<td data-date='$dayCounter' data-month='$month' data-year='$year' $class>$dayCounter</td>";
                    $dayCounter++;
                    $dayOfWeek++;
                }
        
                // Fill in blank cells for the last week
                if ($dayOfWeek != 7) {
                    $remainingDays = 7 - $dayOfWeek;
                    for ($i = 0; $i < $remainingDays; $i++) {
                        $calendar .= "<td></td>";
                    }
                }
        
                $calendar .= "</tr></tbody>";
                $calendar .= "</table>";
        
                return $calendar;
            }
        
            // Get current month and year
            $currentMonth = date('n');
            $currentYear = date('Y');
        
            // Handle navigation
            if (isset($_GET['month']) && isset($_GET['year'])) {
                $currentMonth = $_GET['month'];
                $currentYear = $_GET['year'];
            }
        
            // Generate calendar HTML
            $calendarHTML = generateCalendar($currentMonth, $currentYear);
        
            // Display calendar
            echo '<h2 id="monthAndYear">' . date('F Y', mktime(0, 0, 0, $currentMonth, 1, $currentYear)) . "</h2>";
            echo "<a href='?month=" . ($currentMonth - 1) . "&year=$currentYear'><button id='next'>&raquo;</button></a>";
            echo "<a href='?month=" . ($currentMonth + 1) . "&year=$currentYear'><button id='previous'>&laquo;</button></a>";
        
            echo "<br><br>";
            echo $calendarHTML;
        
            // Jump to specific month and year
            echo "<form method='GET'>";
            echo "<button class='jump-button' type='submit' value='Jump'>Jump to: </button>";
            echo "<select class='select-date' name='month'>";
            for ($i = 1; $i <= 12; $i++) {
                echo "<option value='$i'" . ($i == $currentMonth ? ' selected' : '') . ">" . date('F', mktime(0, 0, 0, $i, 1, 2000)) . "</option>";
            }
            echo "</select>";
            echo "<select class='select-date' name='year'>";
            for ($i = date('Y') - 10; $i <= date('Y') + 10; $i++) {
                echo "<option value='$i'" . ($i == $currentYear ? ' selected' : '') . ">$i</option>";
            }
            echo "</select>";
        
            echo "</form>";
        
            // Back to current date button
            echo "<a href='?month=" . date('n') . "&year=" . date('Y') . "'><button id='back-to-current-date'>Back to Current Date</button></a>";
            ?>



    </div>
                    <div class="scheduled-list">
                        <h3 class="schedule-title">Confirmed Requests</h3>
                        <div class="schedule-cards-wrapper">
                            <?php foreach($scheduleCon as $schedulescon): ?>
                            <div class="schedule-cards">
                                <p class="schedule-bullet"><?php echo htmlspecialchars($schedulescon['status']) ?></p>
                                <p class="schedule-date"><?php echo htmlspecialchars($schedulescon['date']) ?></p>
                            </div>
                            <?php endforeach ?>
                        </div>
                        
                    </div>
    </div>
    <div class="bottom-wrapper">
    <div class="input-form">
                <div class="list-title-header">
                    <h4 id="list-title">Add Schedule</h4>
                </div>
                <form method="POST" action="doctor-schedule.php">
                    <label for="status-input">Status:</label>
                    <select name="status-input" id="status-input">
                        <option value="other">Other</option>
                        <option value="dayoff">Day off</option>
                        <option value="leave">Leave</option>
                    </select>
                    <label for="date">Date:</label>
                    <input type="date" name="date-input" id="date-input">
                    <input type="text" name="description-input" id="description-input" placeholder="Description">
                    <button type="submit" name="submit" class="add-event-button">Add Event</button>
                </form>
            </div>

            <div class="confirmed-list">
                        <h3 class="schedule-title">Pending Requests</h3>
                        <div class="schedule-cards-wrapper">
                            <?php foreach($schedule as $schedules): ?>
                            <div class="schedule-cards">
                                <p class="schedule-bullet"><?php echo htmlspecialchars($schedules['created_by']) ?></p>
                                <p class="schedule-bullet"><?php echo htmlspecialchars($schedules['status']) ?></p>
                                <p class="schedule-date"><?php echo htmlspecialchars($schedules['date']) ?></p>
                            </div>
                            <?php endforeach ?>
                        </div>
                        
                    </div>
    </div>
</section>
          

</section>
    <script src="doctor-javascript/doctor-acc.js"></script>

</body>

</html>