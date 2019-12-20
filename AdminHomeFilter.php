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
  
  <a href="Adminhome.php" class="button" style="background-color: #4CAF50; font-size: 20px; text-decoration: none; ">Main page</a>

  <br><br>
  <form action="AdminHomeFilter.php" method="GET">

    <label for="condition"><b>Condition</b></label>
    <input type="text" placeholder="CONDITION VALUE" name="condition">
    
    <label for="Date"><b>Date</b></label>
    <input type="text" placeholder="Date VALUE" name="Date" required>
    
     <label for="Temperature"><b>Temperature</b></label>
    <input type="text" placeholder="Temperature" name="Temperature" required>
       
        
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

$conn = mysqli_connect("localhost", "Admin", "Admin1234", "Neuro_project");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "GET") {
    
      $Condition = mysqli_real_escape_string($conn,$_GET['condition']); 
  	  $Date = mysqli_real_escape_string($conn,$_GET['Date']); 
  	$TEMP = mysqli_real_escape_string($conn,$_GET['Temperature']);
      $sql = "Insert into Neuro_project.Temp (DAY,Cdtn,temp) Values ('$Date','$Condition','$TEMP')";
  if (mysqli_query($conn, $sql)) {
               echo "New record created successfully";
            } else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
    
            }
  
} 
$sql1 = "Select * from Neuro_project.Temp where DAY='$Date' and Cdtn ='$Condition' and temp = '$TEMP'";
$result = $conn->query($sql1);
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