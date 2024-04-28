<?php
session_start();

include('config.php');
// Check if user is not logged in
if(!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: admin-login.php");
    exit(); // Stop further execution
}

$sql = "SELECT * FROM `my_doctors`";

$result = mysqli_query($conn, $sql);

// Check if the query executed successfully
if ($result) {
    // Fetch data as an array
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Handle the error, if any
    echo "Error: " . mysqli_error($conn);
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

                    <div class="card card-1">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Total Doctors</h5>
                            <h1><?php echo count($data); ?></h1>
                        </div>
                    <i class="ri-user-2-line card--icon--lg"></i>
                    </div>
                    </div>

                    <div class="card card-2">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Total Doctors</h5>
                            <h1><?php echo count($data); ?></h1>
                        </div>
                    <i class="ri-user-2-line card--icon--lg"></i>
                    </div>
                    </div>

                    <div class="card card-3">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Total Doctors</h5>
                            <h1><?php echo count($data); ?></h1>
                        </div>
                    <i class="ri-user-2-line card--icon--lg"></i>
                    </div>
                    </div>

                    <div class="card card-4">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Total Doctors</h5>
                            <h1><?php echo count($data); ?></h1>
                        </div>
                    <i class="ri-user-2-line card--icon--lg"></i>
                    </div>
                    </div>

                    <div class="card card-5">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Total Doctors</h5>
                            <h1><?php echo count($data); ?></h1>
                        </div>
                    <i class="ri-user-2-line card--icon--lg"></i>
                    </div>
                    </div>

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
                <div class="doctors--cards items">
                <div class="doctor--card dayoff">
        <div class="img--box--cover">
            <div class="img--box">
                <img src="images/picture-${doctor.image}.jpg" alt="">
            </div>
        </div>
        <p>dayoff</p>
        </div>
                </div>
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