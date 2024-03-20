<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="form4.css">
<title>
IMS
</title>
</head>

<body>

<div class="sidenav">
			<h2 style="font-family:Arial; color:white; text-align:center;"> HOSPITAL IMS </h2>
			<a href="adminmainpage.php">Dashboard</a>
			<button class="dropdown-btn">Inventory
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="inventory-add.php">Add to Inventory</a>
				<a href="inventory-view.php">Manage Inventory</a>
			</div>
			<button class="dropdown-btn">Suppliers
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="supplier-add.php">Add New Supplier</a>
				<a href="supplier-view.php">Manage Suppliers</a>
			</div>
			<button class="dropdown-btn">Category
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="category-add.php">Add New Category</a>
				<a href="category-view.php">Manage Category</a>
			</div>
			<button class="dropdown-btn">Transaction
			<i class="down"></i>

			</button>
			<div class="dropdown-container">
				<a href="transaction-add.php">Add New Transaction</a>
				<a href="transaction-view.php">Manage Transaction</a>
			</div>
			<button class="dropdown-btn">Items
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="item-add.php">Add New Items</a>
				<a href="item-view.php">Manage Items</a>
			</div>
			<button class="dropdown-btn">Employees
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="employees-add.php">Add New Employee</a>
				<a href="employees-view.php">Manage Employees</a>
			</div>
			<button class="dropdown-btn">Reports
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="r2.php">Inventory - Low Stock</a>
				<a href="expiryreport.php">Inventory - Soon to Expire</a>
				<a href="r1.php">Transactions Reports</a>
			</div>
	</div>

	<div class="topnav">
		<a href="logout.php">Logout</a>
	</div>
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