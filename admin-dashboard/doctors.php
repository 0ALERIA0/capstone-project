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


<!--Start main content-->
        <div class="main--content">
            <div class="head-content">
                <select id="filter-employee" class="filter-dropdown">
                    <option value="all">All</option>
                    <option value="doctor">Doctors</option>
                    <option value="nurse">Nurse</option>
                </select>
            </div>
            <div class="employee-list">
                <div class="employee-grid">
                    <div class="employee-card doctor">
                        <div class="top-flex-card">
                        <img src="images/picture-1.jpg" class="employee-pic">
                            <div class="top-right-div">
                                <p class="doctor-name">Dr. Emilia 
                                Clark</p>
                                <p class="occupation">Surgeon</p>
                            </div>
                        </div>
                        <div>
                            <p>Contact no: 7894613</p>
                            <p>Email: doctor2@gmail.com</p>
                        </div>
                    </div>
                    <div class="employee-card doctor">
                        <div class="top-flex-card">
                        <img src="images/picture-2.jpg" class="employee-pic">
                            <div class="top-right-div">
                                <p class="doctor-name">Dr. Dylan O'brien</p>
                                <p class="occupation">Pediatrician</p>
                            </div>
                        </div>
                        <div>
                            <p>Contact no: 7894613</p>
                            <p>Email: doctor3@gmail.com</p>
                        </div>
                    </div>
                    <div class="employee-card doctor">
                        <div class="top-flex-card">
                        <img src="images/picture-3.jpg" class="employee-pic">
                            <div class="top-right-div">
                                <p class="doctor-name">Dr. Jon Snow</p>
                                <p class="occupation">Cardiologist</p>
                            </div>
                        </div>
                        <div>
                            <p>Contact no: 7894613</p>
                            <p>Email: doctor4@gmail.com</p>
                        </div>
                    </div>
                    <div class="employee-card doctor">
                        <div class="top-flex-card">
                        <img src="images/picture-4.jpg" class="employee-pic">
                            <div class="top-right-div">
                                <p class="doctor-name">Dr. David Harbour</p>
                                <p class="occupation">Oncologist</p>
                            </div>
                        </div>
                        <div>
                            <p>Contact no: 7894613</p>
                            <p>Email: doctor4@gmail.com</p>
                        </div>
                    </div>
                    <div class="employee-card doctor">
                        <div class="top-flex-card">
                        <img src="images/picture-5.jpg" class="employee-pic">
                            <div class="top-right-div">
                                <p class="doctor-name">Dr. Tom Cruise</p>
                                <p class="occupation">Optalmologist</p>
                            </div>
                        </div>
                        <div>
                            <p>Contact no: 7894613</p>
                            <p>Email: doctor5@gmail.com</p>
                        </div>
                    </div>

                    <div class="employee-card nurse">
                        <div class="top-flex-card">
                        <img src="images/nurse1.jpg" class="employee-pic">
                            <div class="top-right-div">
                                <p class="doctor-name">Chloe Moretz</p>
                                <p class="occupation">Nurse</p>
                            </div>
                        </div>
                        <div>
                            <p>Contact no: 7894613</p>
                            <p>Email: nurse1@gmail.com</p>
                        </div>
                    </div>
                    <div class="employee-card nurse">
                        <div class="top-flex-card">
                        <img src="images/nurse2.jpg" class="employee-pic">
                            <div class="top-right-div">
                                <p class="doctor-name">Emma Watson</p>
                                <p class="occupation">Nurse</p>
                            </div>
                        </div>
                        <div>
                            <p>Contact no: 7894613</p>
                            <p>Email: nurse2@gmail.com</p>
                        </div>
                    </div>
                    <div class="employee-card nurse">
                        <div class="top-flex-card">
                        <img src="images/nurse3.jpg" class="employee-pic">
                            <div class="top-right-div">
                                <p class="doctor-name">Margot Robbie</p>
                                <p class="occupation">Nurse</p>
                            </div>
                        </div>
                        <div>
                            <p>Contact no: 7894613</p>
                            <p>Email: nurse3@gmail.com</p>
                        </div>
                    </div>
                    <div class="employee-card nurse">
                        <div class="top-flex-card">
                        <img src="images/nurse4.jpg" class="employee-pic">
                            <div class="top-right-div">
                                <p class="doctor-name">Jennifer Lawrence</p>
                                <p class="occupation">Nurse</p>
                            </div>
                        </div>
                        <div>
                            <p>Contact no: 7894613</p>
                            <p>Email: nurse4@gmail.com</p>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </section>
    <script src="javascript/main.js"></script>
    <script src="javascript/organization.js"></script>
</body>

</html>