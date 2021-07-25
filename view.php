<?php session_start()?>
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
            color: rgb(2,1,103);
            font-size: 13px;
            text-decoration: none;
        }
        .greet{
            font-size: 35px;
            font-weight: 50;
            color: rgb(2,1,103);
        }
        .browse {
            border-collapse: collapse;
            width: 87%;
            text-align: center;
            vertical-align: middle;
            background-color: lightblue;
            /*color: #353631;*/
            color: black;
            border-color: white;
        }
        th{
            color: white;
            background-color: rgb(2,1,103);
        }
          </style>
    </head>
    <body>
    <table width=100%>
                    <tr><td width=1%><a href="home.php"><img src="res/img/babcock.jpeg" height="20" width="20"></a></td><td>
                    <p align= "left" style="font-size: 19px" style= "font-weight: 70" align="center">Babcock University Internship Portal</p>
                    </td><td> </td><td>
                    <div align="right" onmouseout=changeback()>
                    <a class="scroll" onmouseover=changeBrowse()  href=browser.php>Browse Companies &nbsp;</a>
                        <a class="scroll" onmouseover=changeUpload() href=upload.php>Upload Documents &nbsp;</a>
                        <a class="scroll" onmouseover=changeView()  href=view.php> View Documents &nbsp;</a>  
                        <a class="scroll" onmouseover=changeRev()  href=review.php>Monthly Reviews &nbsp;</a>
                        <a class="scroll" onmouseover=changeLog() href=logout.php>Log Out</a>
                    </div></td></tr>
                </table>
      <p align='center' class=greet>Documents</p>
    <?php
      include("db-connect.php");
      $value = '';  
      $sql = "SELECT * FROM submissions WHERE username = '{$_SESSION["username"]}'";
      if ($result = mysqli_query($conn, $sql)) {
       ?>
       <br>
       <?php
       if ($result->num_rows > 0) {
        echo "<table class=browse align='center' border=1><tr><th>File Name</th><th>View File</th></tr>";
         while($row = $result->fetch_assoc()){
          echo "<tr><td>".$row["filenam"]."</td><td><a href='applications/{$row["username"]}{$row["filenam"]}.pdf'>Download</a></td></tr>";
          }
         } else {
          echo "<p align=center>You haven't uploaded a document yet.</p><center><a href=upload.php>Upload your documents</a></center>";
         }
       // Free result set
       mysqli_free_result($result);
        }else {
          echo "<p align=center>You haven't uploaded a document yet.</p><center><a href=upload.php>Upload your documents</a></center>";
        }
       ?>
    </body>
</html>