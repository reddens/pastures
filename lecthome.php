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
<div>
    <div>
    <table width=100%>
                    <tr><td width=1%><a href="lecthome.php"><img src="res/img/babcock.jpeg" height="20" width="20"></a></td><td>
                    <p align= "left" style="font-size: 19px" style= "font-weight: 70" align="center">Babcock University Internship Lecturer Portal</p>
                    </td><td> </td><td>
                    <div align="right" onmouseout=changeback()>
                    <a class="scroll" onmouseover=changeBrowse()  href=lectmonth.php>View Student Reviews &nbsp;</a>
                        <a class="scroll" onmouseover=changeUpload() href=lectdocs.php>View Student Documents &nbsp;</a>
                        <a class="scroll" onmouseover=changeLog() href=logout.php>Log Out</a>
                    </div></td></tr>
                </table>
    </div>
    <?="<p align='center' class=greet>Welcome, {$_SESSION['title']} {$_SESSION['fname']}</p>";?>
    <p align='center'>You're in charge. View students' uploaded documents and monthly reviews</p>
    <div style="margin: 0px;"class=functions>
    <table style ="padding: 0px;"align="center">
    <tr><td align="center"><img align="center" height="30%" id="pic" src="res/img/prof.jpg"></td></tr>
    </table>
    </div>
</div>
</body>
</html>