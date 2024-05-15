<?php 
    include('config.php');

    session_start();
// Check if user is not logged in
if(!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: admin-login.php");
    exit(); // Stop further execution
}

if(isset($_POST['decline'])){

    $id_to_decline = mysqli_real_escape_string($conn, $_POST['id_to_decline']);

    $sql = "DELETE FROM employee_schedule WHERE schedule_id = $id_to_decline";

    if(mysqli_query($conn, $sql)) {
        //success
        header('Location: schedule.php');
    } {
        echo 'query error: ' . mysqli_error($conn);
    }

}



if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //make sql
    $sql = "SELECT * FROM employee_schedule WHERE schedule_id = $id";

    //get the query result
    $result = mysqli_query($conn, $sql);

    //fetch result in array format
    $dataSchedule = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

}

if(isset($_POST['approve'])){
    // Handle approve action
    $id_to_approve = mysqli_real_escape_string($conn, $_POST['id_to_approve']);

    // Retrieve data for the specified schedule ID
    $sql = "SELECT * FROM employee_schedule WHERE schedule_id = $id_to_approve";
    $result = mysqli_query($conn, $sql);
    $dataSchedule = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    // Insert data from $dataSchedule into confirmed_schedule table
    $sql_insert = "INSERT INTO confirmed_schedule (schedule_id, employee_id, created_by, middle_name, Last_name, status, date, description) 
            VALUES ('{$dataSchedule['schedule_id']}', '{$dataSchedule['employee_id']}', '{$dataSchedule['created_by']}', '{$dataSchedule['middle_name']}', '{$dataSchedule['Last_name']}', '{$dataSchedule['status']}', '{$dataSchedule['date']}', '{$dataSchedule['description']}')";

    if(mysqli_query($conn, $sql_insert)) {
        // If insertion is successful, delete the approved schedule from employee_schedule table
        $sql_delete = "DELETE FROM employee_schedule WHERE schedule_id = $id_to_approve";
        if(mysqli_query($conn, $sql_delete)) {
            // If deletion is successful, redirect to schedule.php
            header('Location: schedule.php');
            exit();
        } else {
            // If there's an error in deletion, display the error message
            echo 'Deletion error: ' . mysqli_error($conn);
        }
    } else {
        // If there's an error in insertion, display the error message
        echo 'Insertion error: ' . mysqli_error($conn);
    }
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<?php

include('header.php');

?>


        <div class="main--content">
            <div class="request-wrapper">
                <p class="request-title">Employee No.</p>
                <p class="employee-number"><?php echo htmlspecialchars($dataSchedule['employee_id']) ?></p>
                <p class="request-title">Name:</p>
                <p class="employee-name"><?php echo ucwords(htmlspecialchars($dataSchedule['created_by'] . ' ' . $dataSchedule['middle_name'] . ' ' . $dataSchedule['Last_name'])); ?></p>
                <p class="request-title">Date:</p>
                <p class="date-request"><?php echo htmlspecialchars($dataSchedule['date'])?></p>
                <p class="request-title">Request for:</p>
                <p class="status-request"><?php echo ucwords(htmlspecialchars($dataSchedule['status'])) ?></p>
                <p class="request-title">Description:</p>
                <p class="description-request"><?php echo htmlspecialchars($dataSchedule['description']) ?></p>
                <button class="decline-request decline-button" id="decline-button-js">Decline</button>
                <button class="approve-request approve-button" id="approve-button-js">Approve</button>
            </div>

<!-- decline modal -->

            <div class="decline-modal" id="decline-modal">
                 <div class="decline-modal-content">
                     <form action="schedule-request.php" method="POST">
                        <div class="close-container">
                            <p class="close-modal" id="close-modal">&times;</p>
                        </div>
                        <input type="hidden" name="id_to_decline" value="<?php echo $dataSchedule['schedule_id']; ?>">
                        <p class="confirmation">Are you sure you want to decline?</p>
                        <button class="decline-request" type="submit" name="decline">Confirm</button>
                    </form>
                 </div>
            </div>

<!-- approve modal -->
            <div class="approve-modal" id="approve-modal">
                 <div class="approve-modal-content">
                     <form action="schedule-request.php" method="POST">
                        <div class="close-container-approve">
                            <p class="close-approve-modal" id="close-approve-modal">&times;</p>
                        </div>
                        <input type="hidden" name="id_to_approve" value="<?php echo $dataSchedule['schedule_id']; ?>">
                        <p class="confirmation">Are you sure you want to approve?</p>
                        <button class="approve-request" type="submit" name="approve">Confirm</button>
                    </form>
                 </div>
            </div>
        </div>
    <script src="javascript/main.js"></script>
    <script src="javascript/schedule2.js"></script>
</body>

</html>