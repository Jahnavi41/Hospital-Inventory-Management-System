<?php 
include 'common.php';
?>
<!DOCTYPE html>
<html>

<head>
<script src="dropdown.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="table1.css">
<link rel="stylesheet" type="text/css" href="form3.css">
<style>
body {font-family:Arial;}
</style>
</head>

<body>
    <center>
    <div class="head">
    <h2> TRANSACTION REPORTS</h2>
    </div>
    
    <br><br><br><br><br><br><br><br><br>
    
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <p>
                        <label for="start">Start Date:</label>
                        <input type="date" name="start" value="<?php echo isset($_POST['start']) ? $_POST['start'] : ''; ?>">
                    </p>
                    <p>
                        <label for="end">End Date:</label>
                        <input type="date" name="end" value="<?php echo isset($_POST['end']) ? $_POST['end'] : ''; ?>">
                    </p>
                
            <input type="submit" name="submit" value="View Records">
            </form> 
    </center>
    
    <?php
    include "config.php";
        if(isset($_POST['submit'])) {
            
            $start=$_POST['start'];
            $end=$_POST['end'];
    ?>
            
        <table align="right" id="table1" style="margin-right:100px;">
            <tr>
                <th>Transaction ID</th>
                <th>Transaction Type</th>
                <th>Item Name</th>
                
                <th>Quantity</th>
                <th>Transaction Date</th>
                <th>Cost</th>
                <th>Employee Name</th>
            </tr>
    <?php
     $sql = "SELECT transaction.Transaction_id, transaction.Transaction_type, item.ItemName, transaction.quantity, transaction.Transaction_date, transaction.quantity * item.CostPerUnit AS total_cost, employee.E_USERNAME 
     FROM transaction 
     JOIN item ON transaction.ItemID = item.ItemID 
     JOIN employee ON transaction.E_ID = employee.E_ID
     WHERE transaction.Transaction_date BETWEEN '$start' AND '$end'";
     $total = 0;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            
        echo "<tr>";
            echo "<td>" . $row["Transaction_id"]. "</td>";
            echo "<td>" . $row["Transaction_type"]. "</td>";
            echo "<td>" . $row["ItemName"]. "</td>";
            echo "<td>" . $row["quantity"]. "</td>";
            echo "<td>" . $row["Transaction_date"]. "</td>";
            echo "<td>" . $row["total_cost"]. "</td>";
            echo "<td>" . $row["E_USERNAME"]. "</td>";
            $total += $row["total_cost"];
        echo "</tr>";
        }
    }
    
    echo "<tr>";
    echo "<td colspan='5'>Total</td>";
    echo "<td>Rs." . number_format($total, 2) . "</td>"; 
    echo "<td></td>"; 
    echo "</tr>";
    
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
