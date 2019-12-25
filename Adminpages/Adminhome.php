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
  <form action="AdminHomeFilter.php" method="GET">

    <label for="condition"><b>Condition</b></label>
    <input type="text" placeholder="CONDITION VALUE" name="condition">
    
    <label for="Date"><b>Date</b></label>
    <input type="text" placeholder="Date VALUE" name="Date" required>
    
     <label for="Temperature"><b>Temperature</b></label>
    <input type="text" placeholder="Temperature" name="Temperature" required>
       
        
    <button type="submit">Submit</button>
    <br><br>
<table>
<tr>
<th>Id</th>
<th>Username</th>
<th>Password</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "Admin", "Admin1234", "Neuro_project");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM Temp";
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