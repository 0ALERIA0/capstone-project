<?php

include('config.php');

session_start();
// Check if user is not logged in
if(!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: admin-login.php");
    exit(); // Stop further execution
}

$sql = "SELECT * FROM `employee_schedule`";

$result = mysqli_query($conn, $sql);

if ($result) {
    $schedule = mysqli_fetch_all($result,MYSQLI_ASSOC);
} else {
    echo "Error: " . mysqli_error($conn);
}


// If user is logged in, retrieve the username
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<?php

include('header.php');

?>


<div class="main--content">
<!-- Main wrapper for the calendar application -->
    <div class="top-wrapper">
    <?php include('calendar.php'); ?>
                    <div class="scheduled-list">
                        <h3 class="schedule-title">Schedule Request</h3>
                        <div class="schedule-cards-wrapper">
                            <?php foreach($schedule as $schedules): ?>
                            <a class="cards-link" href="schedule-request.php?id=<?php echo $schedules['schedule_id']; ?>">
                                <div class="schedule-cards">
                                <p class="schedule-bullet"><?php echo htmlspecialchars($schedules['created_by']); ?></p>
                                <p class="schedule-bullet"><?php echo htmlspecialchars($schedules['status']) ?></p>
                                <p class="schedule-date"><?php echo htmlspecialchars($schedules['date']); ?></p>
                                </div>
                            </a>
                            </div>
                            <?php endforeach ?>
                        </div>

    </div>
    </div>
    


</div>

    <script src="javascript/main.js"></script>
    <script src="javascript/schedule2.js"></script>
</body>

</html>