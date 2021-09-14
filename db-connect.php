<?php   
   $dbhost = 'localhost';
   $dbuser = 'bluefrog';
   $dbpass = 'brokken';
   
   $conn= mysqli_connect("$dbhost","$dbuser","$dbpass") or die ("could not connect to mysql");
   mysqli_select_db($conn, "bluefrog");
?>