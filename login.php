<html>

<head>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Student Login</title>
</head>

<body>
<?php
  include("db-connect.php");
   ?>
  <div class="lain">
    <p class="sign" align="center">Student Login</p>
    <form class="form1" method="POST">
      <input class="un " type="text" name="email" align="center" placeholder="Username">
      <input class="pass" type="password" name="password" align="center" placeholder="Password">
      <?php
     if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $myusername = mysqli_real_escape_string($conn,$_POST['email']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
        
        $sql = "SELECT * FROM users WHERE username = '{$myusername}' and pass = '{$mypassword}'";
        $result = mysqli_query($conn,$sql);
        if (!empty($result) && $result->num_rows > 0) { 
          while($row = $result->fetch_assoc()) {
            $count = mysqli_num_rows($result);
        
        // If result matched $myusername and $mypassword, table row must be 1 row
      
        if($count) {
          session_start();
          $_SESSION['username'] = $myusername;
          $_SESSION['fname'] = $row['fname'];
           
           header("location: home.php");
        }else {
           $error = "Your Login Name or Password is invalid";
           echo "<p class='boss'>{$error}</p>";
        }
     }
    }else {
      echo "<p align=center style='color: red'>Invalid Username or Password</p>";
   }
  }
  ?>
      <input class="submit" type="submit" align="center" value="Log in">
      <p class="forgot" align="center"><a href="#">Forgot Password?</p>
      <p class="signup" align ="center"><a href="signup.php">Don't have an account? Sign up</p>
    </div>
</body>

</html>