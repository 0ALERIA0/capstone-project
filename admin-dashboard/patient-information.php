<?php 
include('config.php');

session_start();
// Check if user is not logged in
if(!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: admin-login.php");
    exit(); // Stop further execution
}
$username = $_SESSION['username'];

$name = "SELECT `Name` FROM `users` WHERE `username` = '$username'";
    $nameresult = $conn->query($name);

    if ($nameresult && $nameresult->num_rows > 0) {
        $row = $nameresult->fetch_assoc();
        $userName = $row['Name'];
        
      } else {
        header("Location: doctor-login.php");
      }

$sql = "SELECT image FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageData = $row['image'];
        
      } else {
        echo 'No image uploaded yet.';
      }


if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //make sql
    $sql = "SELECT * FROM patient_records WHERE patient_id = $id";

    //get the query result
    $result = mysqli_query($conn, $sql);

    //fetch result in array format
    $patientInfo = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

}
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/patient.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <title>Castelo Medical Clinic</title>
</head>

<body>
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>Cast<span>elo</span></h2>
        </div>
        <div class="search--notification--profile">
            <div class="search">
                <input type="text" placeholder="Search">
                <button><i class="ri-search-2-line"></i></button>
            </div>
            <div class="notification--profile">
                <div class="picon chat">
                    <i class="ri-wechat-2-line"></i>
                </div>
                <div class="picon bell">
                    <i class="ri-notification-2-line"></i>
                </div>
                
                <div class="picon profile">
                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Uploaded Image" class="admin-pic";">'; ?>
                </div>

                <div class="account-name"><?php echo $userName; ?></div>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="dashboard.php">
                        <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                        <span class="sidebar--item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="schedule.php">
                        <span class="icon icon-2"><i class="ri-calendar-2-line"></i></span>
                        <span class="sidebar--item">Schedule</span>
                    </a>
                
                </li>
                <li>
                    <a href="doctors.php">
                        <span class="icon icon-3"><i class="ri-user-2-line"></i></span>
                        <span class="sidebar--item" style="white-space: nowrap;">Employees</span>
                    </a>
                </li>
                <li>
                    <a href="patient.php">
                        <span class="icon icon-4"><i class="ri-user-line"></i></span>
                        <span class="sidebar--item">Patients</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-5"><i class="ri-line-chart-line"></i></span>
                        <span class="sidebar--item">Activity</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                    <a href="#">
                        <span class="icon icon-7"><i class="ri-settings-3-line"></i></span>
                        <span class="sidebar--item">Settings</span>
                    </a>
                </li>
                <li>
                <form action="logout.php" method="post">
                <button type="submit" value="Logout"  id="logout-button">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                       <span class="sidebar--item">Logout</span>
                    </button>
                </form>
                </li>
            </ul>
        </div>

        <div class="main--content">
            <?php if($patientInfo): ?>
            <div class="record-wrapper">
                <div class="title-div">
                    <div class="hospital-title">
                        <div class="hospital-name">
                            <div>
                                <img src="images/hospital-logo.jpg" alt="">
                            </div>
                            <div class="hname">
                                <p class="hospital">Castelo Medical Clinic</p>
                                <p class="hospital-add">Sta. Maria Dasmarinas Cavite</p>
                            </div>
                        </div>
                         <div class="date-created">
                            <p class="identifier">Date Created:</p>
                            <p class="content"><?php echo htmlspecialchars($patientInfo['created_at']) ?></p>
                        </div>
                    </div>
                    <div class="title">
                        <h2 class="Title">Clinical Abstract</h2>
                    </div>
                </div>
                <div class="second-panel">
                    <div class="hospital-address">
                        <p class="identifier">Hospital/clinic address:</p>
                        <p class="content">Sta. Maria Dasmarinas Cavite</p>
                    </div>
                    <div class="last-modified">
                        <p class="identifier">last modified:</p>
                        <p class="content"><?php echo htmlspecialchars($patientInfo['last_modified']) ?></p>
                    </div>
                    <div class="case-number">
                        <p class="identifier">Patient-id:</p>
                        <p class="content"><?php echo htmlspecialchars($patientInfo['patient_id']) ?></p>
                    </div>
                </div>
                <div class="title">
                    <h2 class="Title">Patient's Clinical Record</h2>
                </div>

                <div class="patient-information">
                    <div class="first-name">
                        <p class="identifier">First name:</p>
                        <p class="content"><?php echo ucwords(htmlspecialchars($patientInfo['firstname'])) ?></p>
                    </div>
                    <div class="last-name">
                        <p class="identifier">Last name:</p>
                        <p class="content"><?php echo ucwords(htmlspecialchars($patientInfo['lastname'])) ?></p>
                    </div>
                    <div class="middle-name">
                        <p class="identifier">Middle Name:</p>
                        <p class="content"><?php echo ucwords(htmlspecialchars($patientInfo['middlename'])) ?></p>
                    </div>
                    <div class="sex">
                        <p class="identifier">Sex:</p>
                        <p class="content"><?php echo ucwords(htmlspecialchars($patientInfo['gender'])) ?></p>
                    </div>
                </div>
                <div class="patient-information">
                    
                    <div class="birthdate">
                        <p class="identifier">Birthday</p>
                        <p class="content"><?php echo htmlspecialchars($patientInfo['birthdate']) ?></p>
                    </div>
                    <div class="age">
                        <p class="identifier">Age:</p>
                        <p class="content"><?php echo htmlspecialchars($patientInfo['age']) ?></p>
                    </div>
                    <div class="marital-status">
                        <p class="identifier">Marital-status</p>
                        <p class="content"><?php echo ucwords(htmlspecialchars($patientInfo['maritalstatus'])) ?></p>
                    </div>
                    <div class="weight">
                        <p class="identifier">Weight(kg):</p>
                        <p class="content"><?php echo htmlspecialchars($patientInfo['weight']) ?></p>
                    </div>
                    <div class="height">
                        <p class="identifier">Height(cm):</p>
                        <p class="content"><?php echo htmlspecialchars($patientInfo['height']) ?></p>
                    </div>
                </div>
                <div class="title">
                    <h2 class="Title">Medical Records</h2>
                </div>
                <div class="patient-medical">
                    <div class="diagnosis">
                        <p class="identifier">Diagnosis:</p>
                        <p class="content"><?php echo htmlspecialchars($patientInfo['diagnosis']) ?></p>
                    </div>
                    <div class="present-diagnosis">
                        <p class="identifier">Present Diagnosis:</p>
                        <p class="content"><?php echo htmlspecialchars($patientInfo['present_diagnosis']) ?></p>
                    </div>
                    <div class="past-diagnosis">
                        <p class="identifier">Past Records:</p>
                        <p class="content"><?php echo htmlspecialchars($patientInfo['past_diagnosis']) ?></p>
                    </div>
                    <div class="record-medicine">
                        <p class="identifier">Medicinal Record:</p>
                        <p class="content"><?php echo htmlspecialchars($patientInfo['medicine-record']) ?></p>
                    </div>
                </div>
            </div>
            <?php endif ?>
        </div>
    </section>


    <script src="javascript/main.js"></script>
</body>

</html>