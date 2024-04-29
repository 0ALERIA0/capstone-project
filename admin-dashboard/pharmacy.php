
<?php
include('config.php');
session_start();
// Check if user is not logged in
if(!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: admin-login.php");
    exit(); // Stop further execution
}

$sql = "SELECT * FROM `inventory` WHERE category = 'Medicine'";

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
<html>
<?php include('header.php'); ?>

<!--Start main content-->

<div class="main--content">
<h3 class="section--title">Pharmacy</h3>

<div class="item-table-div">
                    <table class="item-table" id="table-item">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="inventory-content-items">
                            <?php foreach($data as $datas): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($datas['id']); ?></th>
                                    <td><?php echo htmlspecialchars($datas['item_name']); ?></th>
                                    <td><?php echo htmlspecialchars($datas['quantity']); ?></th>
                                    <td>
                                        <button id="see-item">See details</button>
                                        <button id="add-item">+</button>
                                        <button id="minus-item">-</button>
                                        <button class="delete-items" id="delete-item">delete</button>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="pagination-section">
                        <button class="navigation" id="previous-page">&laquo; Previous</button>
                        <div id="pagination">
                            <button class="pagination-buttons">Previous</button>
                            <button class="pagination-buttons">Next</button>
                        </div>
                        <button class="navigation" id="next-page">Next &raquo;</button>
                    </div>
                </div>
    </section>
    <script src="javascript/main.js"></script>
    <script src="javascript/pharmacy.js" type="module"></script>
</body>

</html>