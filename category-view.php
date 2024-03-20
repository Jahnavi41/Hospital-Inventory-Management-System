<?php 
include 'common.php'
?>
<!DOCTYPE html>
<html>

<head>
<script src="dropdown.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="table1.css">
</head>

<body>
	<center>
	<div class="head">
	<h2> CATEGORY LIST</h2>
	</div>
	</center>
	
	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Category ID</th>
			<th>Category Name</th>
			<th>Supplier ID</th>
			<th>Status</th>
			<th>Date</th>
			<th>Action</th>
		</tr>
		
	<?php

	include "config.php";
	$sql = "SELECT CategoryID,CategoryName,SupplierID,status,created_date FROM category";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	
		while($row = $result->fetch_assoc()) {
	
		echo "<tr>";
			echo "<td>" . $row["CategoryID"]. "</td>";
			echo "<td>" . $row["CategoryName"] . "</td>";
			echo "<td>" . $row["SupplierID"] . "</td>";
			echo "<td>" . $row["status"] . "</td>";
			echo "<td>" . $row["created_date"] . "</td>";
			echo "<td align=center>";
			echo "<a class='button1 edit-btn' href=category-update.php?id=".$row['CategoryID'].">Edit</a>";
			echo "<a class='button1 del-btn' href=category-delete.php?id=".$row['CategoryID'].">Delete</a>";
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