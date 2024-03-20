<?php 
include 'common.php';
?>
<!DOCTYPE html>
<html>

<head>
<script src="dropdown.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="table2.css">
<style>
</style>
</head>

<body>
	<center>
	<div class="head">
	<h2>Transaction</h2>
	</div>
	</center>
	
	<table align="right" id="table1" style="margin-right:20px;">
		<tr>
			<th>Transaction ID</th>
			<th>Item ID</th>
			<th>Transaction Type</th>
			<th>Quantity</th>
			<th>Transaction Date</th>
			<th>Employee ID</th>
			<th>Total Price</th>
			<th>Action</th>
		</tr>
		
		<?php
	include "config.php";
	$sql = "SELECT Transaction_id,itemID,Transaction_type,quantity,Transaction_date,E_ID,TotalPrice FROM transaction";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

	echo "<tr>";
		echo "<td>" . $row["Transaction_id"]. "</td>";
		echo "<td>" . $row["itemID"] . "</td>";
		echo "<td>" . $row["Transaction_type"]. "</td>";
		echo "<td>" . $row["quantity"]. "</td>";
		echo "<td>" . $row["Transaction_date"]. "</td>";
		echo "<td>" . $row["E_ID"]. "</td>";
		echo "<td>" . $row["TotalPrice"]. "</td>";
		echo "<td align=center>";
		echo "<a class='button1 edit-btn' href=transaction-update.php?id=".$row['Transaction_id'].">Edit</a>";
		echo "<a class='button1 del-btn' href=transaction-delete.php?id=".$row['Transaction_id'].">Delete</a>";
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