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

<?php

include('header.php');


?>


        <div class="main--content">
            <h2 class="list-title">Patient Records</h2>
            <button id="add-record">Register Patient</button>
            <div id="modal-wrapper">
                <div class="modal-content">
                <div class="modal-header">
                    <img src="images/hospital-logo.jpg" class="regform-logo">
                    <p class="close">&times;</p>
                    <h2 class="modal-title">Patient Registration Form</h2><br>
                    
                    <h3 class="modal-title">Castelo Medical Clinic</h3>
                    
                </div>

                    <label for="name">Patients Name:</label>
                    <div class="input-div">
                    <input type="text" id="first-name" placeholder="first name" class="input-design">
                    <input type="text" id="last-name" placeholder="last name" class="input-design">
                    <input type="text" id="middle-name" placeholder="middle name" class="input-design"><br>
                    </div>

                    
                    <label for="Gender">Gender:</label>
                    <div class="input-div">
                    <select name="" id="gender" class="input-design">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="input-div">
                    <label for="number">Phone Number:</label>
                    <input type="number" id="input-number" placeholder="Phone Number" class="input-design"><br>
                </div>

                    
                    <label for="date">Date of Birthday:</label>
                    <div class="input-div">
                    <input type="date" id="input-birthday" class="input-design">
                    <label for="age">Age:</label>
                    <input type="number" name="" id="age" class="input-design">
                    </div>

                    
                    <label for="marital">Marital Status:</label>
                    <div class="input-div">
                    <select name="" id="marital-status" class="input-design">
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widow">Widow</option>
                    </select>
                    <br>
                    </div> 

                    
                        <label for="address">Patient Address:</label>
                        <div class="add-div">
                        <input type="text" id="street-add" placeholder="Street Address" class="input-design">
                        <input type="text" id="barangay" placeholder="Barangay" class="input-design">
                        <input type="text" id="municipality" placeholder="Municipality" class="input-design"><br>
                        <input type="text" id="city" placeholder="City" class="input-design">
                        <input type="text" id="country" placeholder="Country" class="input-design">
                        <input type="number" id="zip-code" placeholder="Zip Code" class="input-design">
                    </div>

                    <div class="modal-footer">
                        <button id="add-button">Confirm</button>
                        <button id="cancel-button">Cancel</button>
                    </div>
                </div>
            </div>
            <div class="patient-records-container">
                <input type="search" name="" id="searchbar-record" class="input-design">
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
                        
                    </tbody>
                </table>
                <div class="pagination-section">
                    <button onclick="prevPage()" class="navigation">&laquo; Previous</button>
                    <div id="pagination">
                        <button onclick="prevPage()" class="pagination-buttons">Previous</button>
                        <button onclick="nextPage()" class="pagination-buttons">Next</button>
                    </div>
                    <button onclick="nextPage()" class="navigation">Next &raquo;</button>
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