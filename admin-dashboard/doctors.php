<?php
include('config.php');
 session_start();
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
        <div class="toolbar">
            <div class="toolbar-item">
                <label for="filter-status">Status:</label>
                <select id="filter-status">
                    <option value="all">All</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="toolbar-item">
                <label for="filter-employee-type">Employee Type:</label>
                <select id="filter-employee" class="filter-dropdown">
                    <option value="all">All</option>
                    <option value="doctor">Doctors</option>
                    <option value="nurse">Nurse</option>
                </select>
            </div>

            <div class="toolbar-item">
                <p>Selected employees: <span id="counter">0</span></p>
            </div>

            <div class="toolbar-item">
                <label for="search">Search:</label>
                <input type="text" id="search" placeholder="Search...">
            </div>
        </div>
            <div class="head-content">
                
            </div>
            
            <div class="organization-div">
                <div class="organization-wrapper">
                    <?php foreach ($data as $datas):?>
                        <div class="card-wrapper doctor">
                            <div class="card-top">
                                <input type="checkbox" id="organization-selector">
                                <!-- Check the status and apply appropriate CSS class -->
                                <?php 
                                    $statusClass = ($datas['STATUS'] === 'Active') ? 'active-status' : 'inactive-status'; 
                                ?>
                                <p class="<?php echo $statusClass; ?>"><?php echo htmlspecialchars($datas['STATUS']) ?></p>
                                <i class="ri-menu-line organization-menu"></i>
                            </div>
                        <div class="card-middle">
                            <img src="images/picture-1.jpg" alt="doctor1">
                            <p><?php echo htmlspecialchars($datas['first_name']); ?></p>
                            <p><?php echo htmlspecialchars($datas['employee_type']); ?></p>
                        </div>
                        <div class="card-bottom">
                            <p class="info">Date hired:</p>
                            <p class="information"><?php echo htmlspecialchars($datas['date_hired']) ?></p>
                            <div class="contact-bottom">
                                <div class="email-div">
                                    <p class="info">Email</p>
                                    <p cclass="information">Heaven@gmail.com</p>
                                </div>
                                <div class="phone-div">
                                    <p class="info">Phone number</p>
                                    <p class="information">12345678909</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>
                    
                </div>
            </div>

        </div>
    </section>
    <script src="javascript/main.js"></script>
    <script src="javascript/organization.js"></script>
</body>

</html>