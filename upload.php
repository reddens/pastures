<?php session_start()?>
<html>
<head>
        <title>Upload</title>
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
        table {
            border-collapse: collapse;
        }
        </style>
    </head>
    <body>
        <div>
            <div>
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
            </div>
        <p align=center class=greet>Upload Files</p>
        <div align=center>
        <form align=center method='post' action='' enctype='multipart/form-data'>
        <p>Templates</p>
        <table>
        <tr>
            <img height="350" width="300" src="res/img/file1.jpg">
            <img height="350" width="300" src="res/img/file1.jpg">
            <img height="350" width="300" src="res/img/file1.jpg">
        </tr>
        </table>
        <br>
        <input type="file" name="file[]" id="file" multiple>
        <input type=submit name=submit value=Upload>
        </form>
        </div>
        <?php 
        include ("db-connect.php");
    if(isset($_POST['submit'])){
        $files = $_FILES['file']['name'];
        $allowed = array("pdf");
        foreach($files as $names) {
        $pathinfo = pathinfo($names);  /* split path in its components */
        $extension = strtolower($pathinfo['extension']);  /* extract the extension and normalize to lowercase */
        if(!in_array($extension, $allowed)) {
        $error_message = 'Only pdf files are allowed.';
        $error = 'yes';
        echo "<p style='color:red'>{$error_message}</p>";
        }else{
            // Count total files
            $countfiles = count($_FILES['file']['name']);
            
            // Looping all files
            for($i=0;$i<$countfiles;$i++){
            $j = $i + 1;
            $filename = $_FILES['file']['name'][$i];
            $newname = "{$_SESSION['username']}File{$j}.pdf"; 
            $target = 'applications/'.$newname;
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'][$i], $target);
            $sql = "INSERT INTO submissions (username, filenam, namefile) VALUES ('{$_SESSION["username"]}', 'File{$j}', '{$newname}')";
            mysqli_query($conn, $sql);
            }
            echo "<p align=center style='color:green'>Application Submitted Successfully</p>";
            echo "<p align=center>Redirecting...</p>";
            header("refresh:5;url=home.php");
        }
        }
    }
?>
    </body>
</html>