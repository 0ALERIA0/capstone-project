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
<!-- Main wrapper for the calendar application -->
<section>
    <div class="top-wrapper">
    <div class="wrapper">
        <div class="calendar-container">
            
                <div id="right">
                    <h3 class="calendar-title">Employee Schedule</h3>
                    <h3 id="monthAndYear"></h3>
                    <div class="button-container-calendar">
                        <button id="previous"
                                onclick="previous()">
                              ‹
                          </button>
                        <button id="next"
                                onclick="next()">
                              ›
                          </button>
                    </div>
                <table class="table-calendar" id="calendar" data-lang="en">
                    <thead id="thead-month">
                        <!--Header for calendar month-->
                    </thead>
                    <tbody id="calendar-body">
                        <!--tbody for body of calendar-->
                    </tbody>
                </table>
                <div class="footer-container-calendar">
                    <label for="month">Jump To: </label>
                    <!-- Dropdowns to select a specific month and year -->
                    <select id="month" onchange="jump()">
                        <option value=0>Jan</option>
                        <option value=1>Feb</option>
                        <option value=2>Mar</option>
                        <option value=3>Apr</option>
                        <option value=4>May</option>
                        <option value=5>Jun</option>
                        <option value=6>Jul</option>
                        <option value=7>Aug</option>
                        <option value=8>Sep</option>
                        <option value=9>Oct</option>
                        <option value=10>Nov</option>
                        <option value=11>Dec</option>
                    </select>
                    <!-- Dropdown to select a specific year -->
                    <select id="year" onchange="jump()"></select>
                </div>
                
            </div>
        </div>
    </div>
                    <div class="scheduled-list">
                        <h3 class="schedule-title">Schedule List</h3>
                        <div class="schedule-cards-wrapper">
                            
                        </div>
                        
                    </div>
    </div>
    <div class="bottom-wrapper">
        <div class="input-form">
            <div class="list-title-header">
            <h4 id="list-title">Add Schedule</h4>
            </div>
            <label for="name">Name:</label>
            <input type="text" id="name-input" placeholder="Name">
            <select id="status-input">
                <option value="other">Other</option>
                <option value="dayoff">Day off</option>
                <option value="leave">Leave</option>
            </select>
            <label for="date">Date:</label>
            <input type="date" id="date-input">
            <input type="text" id="description-input" placeholder="Description">
            <button class="add-event-button" onclick="addEvent()">Add Event</button>
        </div>
        <div class="schedule-counter-wrapper">
            <div class="dayoff-div">
                <h4 class="schedule-counter">Day Off</h4>
                <p>0</p>
            </div>
            <div class="leave-div">
                <h4 class="schedule-counter">Leave</h4>
                <p>0</p>
            </div>
            <div class="other-div">
                <h4 class="schedule-counter">Other</h4>
                <p>0</p>
            </div>
        
    </div>
</section>
          

</section>
    <script src="javascript/main.js"></script>
    <script src="javascript/schedule2.js"></script>

</body>

</html>