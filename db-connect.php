<?php   
   $dbhost = 'uyu7j8yohcwo35j3.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
   $dbuser = 'e0umm0lwyh0x1o5k';
   $dbpass = 'dpimmbrn7s5sh8m9';
   
   $conn= mysqli_connect("$dbhost","$dbuser","$dbpass") or die ("could not connect to mysql");
   mysqli_select_db($conn, "tly8vcabxrsjijdk");
?>