<?php 

include('config.php');


session_start();
// Check if user is not logged in
if(!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: ../employee-login.php");
    exit(); // Stop further execution
}

if(isset($_POST['submit'])){


    // Sanitize input data
    $firstName = mysqli_real_escape_string($conn, $_POST['first-name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last-name']);
    $middleName = mysqli_real_escape_string($conn, $_POST['middle-name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $maritalStatus = mysqli_real_escape_string($conn, $_POST['maritalstatus']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $barangay = mysqli_real_escape_string($conn, $_POST['barangay']);
    $municipality = mysqli_real_escape_string($conn, $_POST['municipality']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $zipCode = mysqli_real_escape_string($conn, $_POST['zipcode']);

    // Construct SQL query
    $sql = "INSERT INTO patient_records (firstname, lastname, middlename, gender, phonenumber, birthdate, age, maritalstatus, streetaddress, barangay, municipality, city, country, zipcode) 
            VALUES ('$firstName', '$lastName', '$middleName', '$gender', '$phoneNumber', '$birthday', '$age', '$maritalStatus', '$street', '$barangay', '$municipality', '$city', '$country', '$zipCode')";

            // Execute query
    if(mysqli_query($conn, $sql)){
        header('Location: patient.php');
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}


$sqlRecords = "SELECT * FROM patient_records";
$resultRecords = mysqli_query($conn, $sqlRecords);

if($resultRecords) {
    $patientRecords = mysqli_fetch_all($resultRecords, MYSQLI_ASSOC);

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
            <h2 class="list-title">Patient Records</h2>
            <button id="add-record">Register Patient</button>
            <div id="modal-wrapper">
        
                <div class="modal-content">
        <form action="patient.php" method="POST">
                <div class="modal-header">
                    <img src="images/hospital-logo.jpg" class="regform-logo">
                    <p class="close">&times;</p>
                    <h2 class="modal-title">Patient Registration Form</h2><br>
                    
                    <h3 class="modal-title">Castelo Medical Clinic</h3>
                    
                </div>

                    <label for="name">Patients Name:</label>
                    <div class="input-div">
                    <input type="text" id="first-name" placeholder="first name" class="input-design" name="first-name" required>
                    <input type="text" id="last-name" placeholder="last name" class="input-design" name="last-name" required>
                    <input type="text" id="middle-name" placeholder="middle name" class="input-design" name="middle-name" required><br>
                    </div>

                    
                    
                    <div class="input-div">
                    <label for="Gender">Gender:</label>
                    <select name="gender" id="gender" class="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <label for="number">Phone Number:</label>
                    <input type="number" id="input-number" placeholder="Phone Number" class="input-design" name="phonenumber" required><br>
                
                </div>

                    
                    <div class="input-div">
                    <label for="date">Date of Birthday:</label>
                    <input type="date" id="input-birthday" class="birthday" name="birthday" required>
                    <label for="age">Age:</label>
                    <input type="number" name="age" id="age" class="input-design" required>
                    <label for="marital">Marital Status:</label>
                    <select name="maritalstatus" id="marital-status" class="input-design" required>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widow">Widow</option>
                    </select>
                    <br>
                    </div>

                    
                    
                    

                    
                        <label for="address">Patient Address:</label>
                        <div class="add-div">
                        <input type="text" id="street-add" placeholder="Street Address" class="input-design" name="street" required>
                        <input type="text" id="barangay" placeholder="Barangay" class="input-design" name="barangay" required>
                        <input type="text" id="municipality" placeholder="Municipality" class="input-design" name="municipality" required><br>
                        <input type="text" id="city" placeholder="City" class="input-design" name="city" required>
                        <input type="text" id="country" placeholder="Country" class="input-design" name="country" required>
                        <input type="number" id="zip-code" placeholder="Zip Code" class="input-design" name="zipcode" required>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="add-button" name="submit">Confirm</button>
                        <button id="cancel-button">Cancel</button>
                    </div>
        </form>
                </div>
            </div>
            <input type="search" name="" id="searchbar-record" class="input-design">
            <div class="patient-records-container">
               
                <table class="records-container" id="patient-table">
                    <thead class="header-grid">
                    <tr>
                        <th class="name-header">Name</th>
                        <th class="sex-header">Sex</th>
                        <th class="last-modified-header">Last Modified</th>
                        <th class="edit-header">Manage</th>
                    </tr>
                    </thead>
                    <tbody class="content-grid">
                <?php foreach($patientRecords as $patientRecord): ?>
                    <tr class="content-line" data-id="<?php echo $patientRecord['patient_id']; ?>" >
                        <td class="name-record"><?php echo ucwords(htmlspecialchars($patientRecord['lastname'] . ' , ' . $patientRecord['firstname'] . ' ' . $patientRecord['middlename'])); ?></td>
                        <td class="sex-record"><?php echo ucwords(htmlspecialchars($patientRecord['gender'])) ?></td>
                        <td class="lastModified-record"><?php echo $patientRecord['last_modified'] ?></td>
                        <td class="edit-delete"><a class="cards-link" href="patient-information.php?id=<?php echo $patientRecord['patient_id']; ?>"><button id="open-modal" class="ri-eye-fill modal-click"></button></a><button class="ri-edit-box-fill edit"></button><button class="ri-delete-bin-4-fill delete delete-patient-record"></button></td>
                    </tr>
                <?php endforeach ?>
                    </tbody>
                </table>
                
        </div>
            </div>


            <div class="modal-patient-records" id="modal-record">
                <div class="patient-modal-record">
                <div class="modal-header-records">
                    <p id="record-title">Patient Records</p>
                    <span id="close-record-modal">&times;</span>
                </div>

            </div>
            </div>

        </div>  
    </section>
    <script src="javascript/main.js"></script>
    <script src="javascript/patient.js"></script>
</body>

</html>