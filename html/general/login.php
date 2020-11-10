<?php

$ERROR = "0";
if(isset($_GET['error'])){
  $ERROR = TRUE;
}

 ?>



<!DOCTYPE html>
<html lang ="en">
<head lang="en">
   <meta charset="utf-8">
   <?php include '../general/bootstrapMagic.php' ?>

   <title>Login</title>
   <link rel="stylesheet" href="../../css/login.css">


</head>
<body>

  <header>

      <p id="title">
       <a href="login.html"> <img src="../../resources/Zone4-GO1.png"></a>

      </p>


    <nav>
      <ul style="font-weight: bold;">
        <li><a href = "about.html">About</a></li>
        <li><a href = "help.html">Help</a></li>
      </ul>
    </nav>
  </header>


	<main class="login-box">
    <h1>Login</h1>

    <form class="form-signin" method="POST" action="redirect-login.php">
      <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="email" name="email" id="email" required>
      </div>

      <div class="textbox">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password" name="password" id="password" required>
      </div>



      <button class="btn btn-primary btn-lg btn-block" type="submit" name="Submit" id="register" >Login</button>
      <input type="button" class="btn" value="Register" onclick="window.location.href = 'registration.php';">
    </form>


    <a href = "forgot-password.php">Forgot password?</a>

  </main>

  <script type="text/javascript">
    var email = document.getElementById('email');
    var password= document.getElementById('password');
    if(<?php echo $ERROR ?>){
      email.style.backgroundColor = "red";
      password.style.backgroundColor = "red";
    }
  </script>
</body>
</html>
