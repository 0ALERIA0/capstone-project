<?php
session_start();

include('config.php');
// Check if user is not logged in
if(!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: admin-login.php");
    exit(); // Stop further execution
}

$sql = "SELECT * FROM `my_employee`";

$result = mysqli_query($conn, $sql);

// Check if the query executed successfully
if ($result) {
    // Fetch data as an array
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Handle the error, if any
    echo "Error: " . mysqli_error($conn);
}

$doctorCount = 0;
foreach ($data as $row) {
    if ($row['employee_type'] === 'Doctor') {
        $doctorCount++;
    }
}

$nurseCount = 0;
foreach ($data as $row) {
    if ($row['employee_type'] === 'Nurse') {
        $nurseCount++;
    }
}

$doctors = "SELECT * FROM my_employee WHERE employee_type = 'Doctor'";

$resultdoctor = mysqli_query($conn, $doctors);

// Check if the query executed successfully
if ($resultdoctor) {
    // Fetch data as an array
    $doctorData = mysqli_fetch_all($resultdoctor, MYSQLI_ASSOC);
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
                            <h1><?php echo $doctorCount; ?></h1>
                        </div>
                    <i class="ri-user-2-line card--icon--lg"></i>
                    </div>
                    </div>

                    <div class="card card-2">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Total Nurse</h5>
                            <h1><?php echo $nurseCount; ?></h1>
                        </div>
                    <i class="ri-user-heart-fill card--icon--lg"></i>
                    </div>
                    </div>

                    <div class="card card-3">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Patients</h5>
                            <h1><?php echo count($data); ?></h1>
                        </div>
                    <i class="ri-user-2-line card--icon--lg"></i>
                    </div>
                    </div>

                    <div class="card card-4">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Scheduled</h5>
                            <h1>7</h1>
                        </div>
                    <i class="ri-calendar-2-line card--icon--lg"></i>
                    </div>
                    </div>

                    <div class="card card-5">
                    <div class="card--data">
                        <div class="card--content">
                            <h5 class="card--title">Staff</h5>
                            <h1><?php echo count($data); ?></h1>
                        </div>
                    <i class="ri-user-6-line card--icon--lg"></i>
                    </div>
                    </div>

                </div>
            </div>
            <div class="doctors">
                <div class="title">
                    <h3 class="section--title">Doctors</h3>
                    <div class="doctors--right--btns">
                        <select name="date" id="doctors-status" class="dropdown doctor--filter">
                            <option value="all">All</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                
                <div class="doctors--cards items">
                <?php foreach($doctorData as $datas): ?>
                <div class="doctor--card <?php echo $datas['STATUS'] ?>"  data-status="<?php echo strtolower($datas['STATUS']); ?>">
                <div class="img--box--cover">
                    <div class="img--box">
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($datas['image']) . '" alt="Image";">'; ?>
                    </div>
                </div>
                <p><?php echo $datas['first_name'] ?></p>
                <p><?php echo $datas['STATUS'] ?></p>
                </div>
                <?php endforeach ?>
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
    <script src="javascript/index.js"></script>
</body>

</html>