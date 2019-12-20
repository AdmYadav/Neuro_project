<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
  
  
  <br><br>
  <form action="HomeFilter.php" method="GET">

    <label for="condition"><b>Condition Filter</b></label>
    <input type="text" placeholder="ENTER CONDITION FILTER" name="condition">
    
    <label for="Date"><b>Date Filter</b></label>
    <input type="text" placeholder="Date Filter" name="Date" required>
       
        
    <button type="submit">Submit</button>
    <br><br>
   
</form>  
<table>
<tr>
<th>DATE</th>
<th>CONDITION</th>
<th>TEMPERATURE</th>
</tr>
<?php

$conn = mysqli_connect("localhost", "S_user", "suser1234", "Neuro_project");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "GET") {
    
      $Condition = mysqli_real_escape_string($conn,$_GET['condition']); 
  	  $Date = mysqli_real_escape_string($conn,$_GET['Date']); 
      $sql = "SELECT * FROM Neuro_project.Temp WHERE Temp.Cdtn ='$Condition' and Temp.DAY='$Date'";
} 

$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["DAY"]. "</td><td>" . $row["Cdtn"] . "</td><td>"
. $row["temp"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>