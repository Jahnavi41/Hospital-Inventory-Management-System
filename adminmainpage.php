<?php 
include 'common.php';
?>
<!DOCTYPE html>
<html>
<head>
<script src="dropdown.js"></script>
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="table1.css">
</head>
<body>
<center>
    <div class="head">
        <h2>VIEW</h2>
    </div>
</center>
<br><br>
<table align="right" id="table1" style="margin-right:100px;">
    <thead>
        <tr>
            <th>Inventory ID</th>
            <th>Item Name</th>
            <th>Current Stock</th>
            <th>Cost Per Unit</th>
            <th>Expiry Date</th>
            <th>Supplier Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "config.php";
        $sql = "SELECT * FROM combined_view";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["InventoryID"] . "</td>";
                echo "<td>" . $row["ItemName"] . "</td>";
                echo "<td>" . $row["CurrentStock"] . "</td>";
                echo "<td>" . $row["CostPerUnit"] . "</td>";
                echo "<td>" . $row["ExpiryDate"] . "</td>";
                echo "<td>" . $row["SupplierName"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No inventory found.</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>

	<br><br>
	<center>
	<div class="head">
	<h2> TRIGGERS </h2>
	</div>
	</center>
	<b><br>
	<br><br>
	<?php
include "config.php";
$sql = "SHOW TRIGGERS";
$result = $conn->query($sql);
echo '<table align="right" id="table1" style="margin-right:100px;">
        <tr>
            <th>Trigger Name</th>
            <th>Event</th>
            <th>Table</th>
            <th>Statement</th>
            <th>Timing</th>
            <th>Created</th>
            <th>Definer</th>
        </tr>';
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Trigger"] . "</td>";
        echo "<td>" . $row["Event"] . "</td>";
        echo "<td>" . $row["Table"] . "</td>";
        echo "<td>" . $row["Statement"] . "</td>";
        echo "<td>" . $row["Timing"] . "</td>";
        echo "<td>" . $row["Created"] . "</td>";
        echo "<td>" . $row["Definer"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No triggers found.</td></tr>";
}
echo "</table>";
$conn->close();
?>
</body>
</html>
<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
for (var i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>