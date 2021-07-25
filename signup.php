<html>

<head>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Student Signup</title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Student Signup</p>
    <form method='POST' class="form1">
         <input class= "un" type="text" placeholder="Username" name="user" required>
         <input class = "un" type="text" placeholder="First Name" name= "fname" required>
         <input class = "un" type="text" placeholder ="Last Name" name ="lname" required>
         <input class ="un" type="text" placeholder="Email Address" name="email" required>
         <input class="pass" type="password" placeholder="Enter Password" name="psw" required>
         <input class = "pass" type="password" placeholder="Repeat Password" name="psw-repeat" required>
         <input class="submit" type="submit" name="submit" align="center" value="Sign Up">
         <p class="signup" align ="center"><a href="login.php">Already have an account? Log in</p>
    </div>
     <?php
      include("db-connect.php");
      if(isset($_POST['submit'])){
        $sql = "INSERT INTO users VALUES('','{$_POST["user"]}','{$_POST["psw"]}','{$_POST["fname"]}','{$_POST["lname"]}','{$_POST["lname"]}')";
        mysqli_query($conn, $sql);
        header("Location: register.php");
      }
     ?>
</body>

</html>