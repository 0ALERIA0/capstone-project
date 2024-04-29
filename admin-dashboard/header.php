<?php


// If user is logged in, retrieve the username
$username = $_SESSION['username'];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles1.css">
    <link rel="stylesheet" href="css/inventory.css">
    <link rel="stylesheet" href="css/doctors.css">
    <link rel="stylesheet" href="css/patient.css">
    <link rel="stylesheet" href="css/schedule2.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <title>Castelo Medical Clinic</title>
</head>

<body>
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>Cast<span>ello</span></h2>
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
                    <img src="images/profile.jpg" alt="profile" class="admin-pic">
                </div>

                <div class="account-name"><?php echo $username; ?></div>
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
                    <a href="pharmacy.php">
                        <span class="icon icon-10"><i class="ri-medicine-bottle-fill"></i></span>
                        <span class="sidebar--item">Pharmacy</span>
                    </a>
                </li>
                <li>
                    <a href="inventory.php">
                        <span class="icon icon-11"><i class="ri-file-list-2-fill"></i></span>
                        <span class="sidebar--item">Inventory</span>
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