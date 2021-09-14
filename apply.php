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
            color: green;
            font-size: 13px;
            text-decoration: none;
        }
        .greet{
            font-size: 35px;
            font-weight: 50;
            color: green;
        }
        table {
            border-collapse: collapse;
        }
        </style>
</head>
<body>
    <table width=100%>
                    <tr><td width=1%><a href="home.php"><img src="res/img/logo.png" height="20" width="20"></a></td><td>
                    <p align= "left" style="font-size: 19px" style= "font-weight: 70" align="center">Pastures Internship Portal</p>
                    </td><td> </td><td>
                    <div align="right" onmouseout=changeback()>
                    <a class="scroll" onmouseover=changeBrowse()  href=browser.php>Browse Companies &nbsp;</a>
                        <a class="scroll" onmouseover=changeUpload() href=upload.php>Upload Documents &nbsp;</a>
                        <a class="scroll" onmouseover=changeView()  href=view.php> View Documents &nbsp;</a>  
                        <a class="scroll" onmouseover=changeRev()  href=review.php>Monthly Reviews &nbsp;</a>
                        <a class="scroll" onmouseover=changeLog() href=logout.php>Log Out</a>
                    </div></td></tr>
                </table>
<?php
    include("db-connect.php");
    $comp = $_POST["compname"];
    $id = $_POST["appid"];
    $hiring = $_POST["hiring"];
    
    echo "<p align='center' class=greet>Apply for an internship at {$comp}</p>";
?>
<form align='center' method='POST' enctype="multipart/form-data">
    <?php echo "<input type=hidden name=compname value={$comp}>";
        echo "<input type=hidden name=appid value={$id}>";
        echo "<input type=hidden name=hiring value={$hiring}>";
    ?>
    <input type=file name=application id=application>
    <input type=submit name=submit value="Upload">
</form>
<?php 
    if(isset($_POST['submit'])){
        $inform = pathinfo($_FILES['application']['name']);
        $extension = $inform['extension']; //returns the mimetype
        $allowed = array("pdf", "doc", "docx");
        if(!in_array($extension, $allowed)) {
        $error_message = 'Only word documents and pdf files are allowed.';
        $error = 'yes';
        echo "<p style='color:red'>{$error_message}</p>";
        }else{
            $info = pathinfo($_FILES['application']['name']);
            $ext = $info['extension']; // get the extension of the file
            $newname = "{$_SESSION['username']}{$_POST['compname']}.".$ext; 

            $target = 'applications/'.$newname;
            move_uploaded_file( $_FILES['application']['tmp_name'], $target);
            $sql = "INSERT INTO submissions (username, company, namefile, stat) VALUES ('{$_SESSION["username"]}', '{$_POST["compname"]}', '{$newname}', 'PENDING')";
            mysqli_query($conn, $sql);
            echo "<p style='color:green'>Application Submitted Successfully</p>";
            echo "Redirecting...";
            header("refresh:5;url=home.php");
            }
    }
?>
</body>
</html>