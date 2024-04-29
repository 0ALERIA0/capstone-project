<?php
include('config.php');

session_start();


// Check if user is not logged in
if(!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: admin-login.php");
    exit(); // Stop further execution
}

$sql = "SELECT * FROM `inventory`";

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



<?php include('header.php') ?>



<!--Start main content-->
        <div class="main--content">
            <div class="inventory-div">
                <h2 id="inventory-title">Inventory</h2>
                <input type="search" placeholder="Seach Item Name" id="search-bar">
                <button class="register-item-button" id="register-item">Register Item</button>

                        <div class="modal-reg-item" id="register-modal">
                            <div class="modal-item-content">
                                <h3 id="item-title">Item Registration</h3>
                                <input type="text" id="item-name-input" placeholder="Item Name">
                                <select name="category-selector" id="input-select-category">
                                    <option value="">Choose Category</option>
                                    <option value="Medicine">Medicine</option>
                                    <option value="Equipment">Equipment</option>
                                </select>
                                <input type="number" id="input-item-quantity" placeholder="Quantity">
                                <button id="cancel-button-item">Cancel</button>
                                <button id="confirm-button-item">Confirm</button>
                                <div class="invalid-input">

                                </div>
                                
                        </div>
                        </div>
                
                <div class="item-table-div">
                    <table class="item-table" id="table-item">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Item Name</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="inventory-content-items">
                        <?php foreach($data as $datas): ?>
                        <tr>
                    <td><?php echo htmlspecialchars($datas['id']); ?></td>
                    <td><?php echo htmlspecialchars($datas['item_name']); ?></td>
                    <td><?php echo htmlspecialchars($datas['category']); ?></td>
                    <td><?php echo htmlspecialchars($datas['quantity']); ?></td>
                    <td>
                    <button id="see-item">See details</button>
                    <button id="edit-item">edit</button>
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
            </div>
        </div>
    </section>
    <script src="javascript/main.js"></script>
    <script src="javascript/inventory.js" type="module"></script>
</body>

</html>