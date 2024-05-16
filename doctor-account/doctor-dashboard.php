<?php
session_start();

include('config.php');
// Check if user is not logged in
if(!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: doctor-login.php");
    exit(); // Stop further execution
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.php') ?>
        <div class="main--content">
        <h3 id="dashboard-title">Welcome Doctor!</h3>
        <div class="content">
             <div class="graphs-div">
                <div class="patient-graph">
                    <p class="patient-activites-word">Patient Activities</p>
                    <canvas id="myChart">
                    </canvas>
                </div>
                <div class="patient-donutchart">
                    <canvas id="myDonutChart"></canvas>
                </div>
            </div>
            <div class="table">
                <div class="title">
                    <h3 class="section--title">Scheduled Patients To You:</h3>            
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date Scheduled</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Settings</th>
                        </tr>
                    </thead>
                    <tbody class="js-tables-scheduled-patients">
                        
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </section>
    <script src="doctor-javascript/doctor-acc.js"></script>
    <script type="module" src="doctor-javascript/dashboard.js"></script>
</body>

</html>