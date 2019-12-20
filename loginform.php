<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'S_user');
define('DB_PASSWORD', 'suser1234');
define('DB_DATABASE', 'Neuro_project');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['uname']);
      $mypassword = mysqli_real_escape_string($db,$_POST['psw']); 
     // echo $myusername;
     // echo $mypassword;
      $sql = "SELECT u_name FROM Neuro_project.User_detail WHERE u_name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {        
         header("location: Home.php");
      }else {
          echo "login failed";
        // header("location: index.html");
      }
   }
?>