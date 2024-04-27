<?php
session_start();
// Check if user is not logged in
if(!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: admin-login.php");
    exit(); // Stop further execution
}

// If user is logged in, retrieve the username
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

    <?php include('header.php') ?>

        <div class="main--content">
            <div class="overview">
                <div class="title">
                    <h3 class="section--title">Overview</h3>
                    
                </div>
                <div class="cards js-cards">

                </div>
            </div>
            <div class="doctors">
                <div class="title">
                    <h3 class="section--title">Doctors</h3>
                    <div class="doctors--right--btns">
                        <select name="date" id="date" class="dropdown doctor--filter">
                            <option value="all">All</option>
                            <option value="onduty">On Duty</option>
                            <option value="dayoff">Day Off</option>
                        </select>
                    </div>
                </div>
                <div class="doctors--cards items"></div>
            </div>
            <div class="lowerpart-div">

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
                        <h3 class="section--title">Scheduled Patients</h3>            
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
    <script src="javascript/main.js"></script>
    <script src="javascript/index.js" type="module"></script>
</body>

</html>