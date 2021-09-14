<?php session_start()?>
<html>
    <head>
    <title>Review</title>
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
    </style>
    </head>
    <body>
    <?php 
        include("db-connect.php");
    ?>
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
    <p align='center' class=greet>Monthly Review</p>
    <form method='GET' id="review" align='center'>
        <table align='center'>
        <tr><td><p>Review for: </p></td>
        <td><input class=date type=text name=date placeholder="Select Date(YYYY-MM-DD)" onfocus="(this.type='date')" onblur="(this.type='text')" value=<?=date('Y-m-d')?>></td>
        <td><input type="submit" name=save value="Save" /></td>
        <td><input type="submit" name=view value="View" /></td></tr>
        </table>
        <br>
        <textarea style="border:solid 4px green; font-size:20px; font-family:Lora;" name="comment" form="review" cols="100" placeholder="Enter text here"  rows="13">
        <?php
    if (isset($_GET["view"])){
        $sql = "SELECT namefile FROM reviews WHERE dat = '{$_GET["date"]}' AND user = '{$_SESSION["username"]}'";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $myfile = fopen("reviews/{$row["namefile"]}", "r") or die ("Could not read file");
        echo fread($myfile, filesize("reviews/{$row["namefile"]}"));
        fclose($myfile);
            }
        }
    ?>
    </textarea><br />
    <?php
    $data = '';
    if(isset($_GET["save"]) && isset($_GET["date"]) && isset($_GET["comment"])){
        $sql = "INSERT INTO reviews VALUES ('{$_SESSION["username"]}','{$_SESSION["username"]}{$_GET["date"]}.txt','{$_GET["date"]}')";
        $data = $_GET['comment'] ."\r\n";
        $ret = file_put_contents("reviews/{$_SESSION["username"]}{$_GET["date"]}.txt", $data, FILE_TEXT | LOCK_EX);
        if($ret === false) {
            die('There was an error saving');
        }
        else {
            echo "$ret bytes written to file";
            mysqli_query($conn, $sql);
            echo "<p style='color:green'>Review saved for {$_GET["date"]}</p>";
        }
    }
    ?>
    </form>
    </body>
</html>