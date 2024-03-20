<?php 
include 'common.php';
?>
<!DOCTYPE html>
<html>
<head>
<script src="dropdown.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="form4.css">
</head>

<body>
	<center>
	<div class="head">
	<h2> ADD SUPPLIER DETAILS</h2>
	</div>
	</center>

	
	
	<div class="one row">
		
			<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
				<div class="column">
					<p>
						<label for="sid">Supplier ID:</label><br>
						<input type="number" name="sid">
					</p>
					<p>
						<label for="sname">Supplier Company Name:</label><br>
						<input type="text" name="sname">
					</p>
					<p>
						<label for="sadd">Address:</label><br>
						<input type="text" name="sadd">
					</p>
					
					
				</div>
				<div class="column">
					
					<p>
						<label for="smail">Email Address </label><br>
						<input type="text" name="smail">
					</p>
					<label for="sid">Payment terms:</label><br>
						<input type="text" name="pt">
				</div>
				
			
			<input type="submit" name="add" value="Add Supplier">
			</form>
		<br>
		
		
	<?php
			include "config.php";
			 
			if(isset($_POST['add']))
			{
			$id = mysqli_real_escape_string($conn, $_REQUEST['sid']);
			$name = mysqli_real_escape_string($conn, $_REQUEST['sname']);
			$add = mysqli_real_escape_string($conn, $_REQUEST['sadd']);
			$mail = mysqli_real_escape_string($conn, $_REQUEST['smail']);
			$pt = mysqli_real_escape_string($conn, $_REQUEST['pt']);

			 
			$sql = "INSERT INTO supplier VALUES ($id, '$name','$mail','$add','$pt')";
			if(mysqli_query($conn, $sql)){
				echo "<p style='font-size:8;'>Supplier details successfully added!</p>";
			} else{
				echo "<p style='font-size:8; color:red;'>Error! Check details.</p>";
			}
			}
			 
			$conn->close();
	?>
	
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