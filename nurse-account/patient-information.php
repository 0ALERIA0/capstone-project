<?php 
include('config.php');

session_start();
// Check if user is not logged in
if(!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: admin-login.php");
    exit(); // Stop further execution
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

    <?php include('header.php') ?>

        <div class="main--content">
        
            <div class="patient-info-wrapper">
            <div class="first-grid">
            <h3>Basic Information</h3>
            </div>

            <div class="second-grid">
                <p class="identifier">Last modified:</p>
               <p><?php echo $patientInfo['last_modified'] ?></p>
            </div>
            
                <div class="first-grid">
                <p class="identifier">Name:</p>
                    <h4><?php echo ucwords(htmlspecialchars($patientInfo['lastname'] . ' , ' . $patientInfo['firstname'] . ' ' . $patientInfo['middlename']));  ?></h4>
                <p class="identifier">Patient Number:</p>
                <p> <?php echo $patientInfo['patient_id'] ?></p>
                </div>
                
                <div class="second-grid">
                <p class="identifier">Birthdate:</p>
                <p><?php echo $patientInfo['birthdate'] ?></p>
                <p class="identifier">Age:</p>
                <p><?php echo $patientInfo['age'] ?></p>
                </div>

                <div class="first-grid">
                <p class="identifier">Gender:</p>
                <p><?php echo $patientInfo['gender'] ?></p>
                <p class="identifier">Phonenumber:</p>
                <p><?php echo $patientInfo['phonenumber'] ?></p>
                <p class="identifier">Marital Status:</p>
                <p><?php echo $patientInfo['maritalstatus'] ?></p>
                </div>

                <div class="second-grid">
                <p class="identifier">Address:</p>
                <p><?php echo ucwords(htmlspecialchars($patientInfo['streetaddress'] . ' st. ' . $patientInfo['barangay'] . ' ' . $patientInfo['municipality'] . ' , ' . $patientInfo['city'] . ' ' . $patientInfo['country'])) ?></p>
                <p class="identifier">Zipcode:</p>
                <p><?php echo htmlspecialchars($patientInfo['zipcode']) ?></p>
                </div>
            </div>
            <div class="medical-records">
                <h3>Medical Records</h3>

                <div class="medical-information">
                    <p class="identifier">
                        Medical History:
                    </p>

                    
                </div>

            </div>
        </div>
    </section>


    <script src="javascript/main.js"></script>
</body>

</html>