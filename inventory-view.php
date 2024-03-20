<?php 
include 'common.php';
?>
<!DOCTYPE html>
<html>
<head>
<script src="dropdown.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="table1.css">
<link rel="stylesheet" type="text/css" href="nav2.css">
</head>
<body>
	<center>
	<div class="head">
	<h2>INVENTORY LIST</h2>
	</div>
	</center>
	
	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Inventory ID</th>
			<th>Item ID</th>
			<th>Current Stock</th>
			<th>Record Level</th>
			<th>Expiry date</th>
			<th>Action</th>
		</tr>
	
	<?php
	include "config.php";
	
		$sql = "SELECT InventoryID, ItemID,CurrentStock,ReorderLevel,ExpiryDate FROM inventory";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		
		while($row = $result->fetch_assoc()) {

		echo "<tr>";
			echo "<td>" . $row["InventoryID"]. "</td>";
			echo "<td>" . $row["ItemID"] . "</td>";
			echo "<td>" . $row["CurrentStock"]. "</td>";
			echo "<td>" . $row["ReorderLevel"]. "</td>";
			echo "<td>" . $row["ExpiryDate"] . "</td>";
			echo "<td align=center>";
						 
				echo "<a class='button1 edit-btn' href=inventory-update.php?id=".$row['InventoryID'].">Edit</a>";
			
				echo "<a class='button1 del-btn' href=inventory-delete.php?id=".$row['InventoryID'].">Delete</a>";
				
			echo "</td>";
		echo "</tr>";
		}
		echo "</table>";
		} 

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