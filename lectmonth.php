<?php session_start();
if(!$_SESSION['fname']){
    header('Location: index.php');
}
?>
<html>
    <head>
    <link rel="stylesheet"
              href= "https://fonts.googleapis.com/css?family=Lora">
      <style>
        body {
            font-family: 'Lora';
            height: 100%
            }
        .scroll{
            color: green;
            font-size: 13px;
            text-decoration: none;
        }
        .greet{
            font-size: 35px;
            font-weight: 50;
            color: green;
        }
        .browse {
            border-collapse: collapse;
            width: 87%;
            text-align: center;
            vertical-align: middle;
            background-color: lightgreen;
            /*color: #353631;*/
            color: black;
            border-color: white;
        }
        th{
            color: white;
            background-color: greenyellow;
        }
          </style>
    </head>
    <body>
    <table width=100%>
                    <tr><td width=1%><a href="lecthome.php"><img src="res/img/logo.png" height="20" width="20"></a></td><td>
                    <p align= "left" style="font-size: 19px" style= "font-weight: 70" align="center">Pastures Internship Lecturer Portal</p>
                    </td><td> </td><td>
                    <div align="right" onmouseout=changeback()>
                    <a class="scroll" onmouseover=changeBrowse()  href=lectmonth.php>View Student Reviews &nbsp;</a>
                        <a class="scroll" onmouseover=changeUpload() href=lectdocs.php>View Student Documents &nbsp;</a>
                        <a class="scroll" onmouseover=changeLog() href=logout.php>Log Out</a>
                    </div></td></tr>
                </table>
      <p align='center' class=greet>Student Reviews</p>
    <?php
      include("db-connect.php");
      $value = '';  
      $sql = "SELECT * FROM reviews";
      if ($result = mysqli_query($conn, $sql)) {
       ?>
       <br>
       <?php
       if ($result->num_rows > 0) {
        echo "<table class=browse align='center' border=1><tr><th>Username</th><th>File Name</th><th>Date</th><th>View File</th></tr>";
         while($row = $result->fetch_assoc()){
          echo "<tr><td>".$row["user"]."</td><td>".$row["namefile"]."</td><td>".$row["dat"]."</td><td><a href='reviews/{$row["user"]}{$row["dat"]}.txt'>View</a></td></tr>";
          }
         } else {
          echo "<p align=center>You haven't uploaded a document yet.</p><center><a href=upload.php>Upload your documents</a></center>";
         }
       // Free result set
       mysqli_free_result($result);
        }else {
          echo "<p align=center>No student has uploaded a document yet.</p>";
        }
       ?>
    </body>
</html>