<!DOCTYPE html>
<html lang ="en">
<head lang="en">
   <meta charset="utf-8">
   <title>Login</title>
   <?php include '../general/bootstrapMagic.php' ?>

   <link rel="stylesheet" href="../../css/login.css">

</head>
<body>

  <header>

    <p id="title">
     <a href="login.php"> <img src="../../resources/Zone4-GO1.png"></a>

    </p>


    <nav>
      <ul style="font-weight: bold;">
        <li><a href = "about.html">About</a></li>
        <li><a href = "help.html">Help</a></li>
      </ul>
    </nav>
  </header>


	<main class="login-box">
    <h1>Retrieve Password</h1>

    <form class="form-signin" method="post" action="redirect-forget-password.php">
    <!-- <form class="form-signin" method="post" action="http://www.randyconnolly.com/tests/process.php"> -->


      <input type="email" id="inputEmail" class="form-control mb-2" name="email" placeholder="Email address" required="" autofocus=""  title="Email must be an MMU email id@mmu.edu.my" >


      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="">

      <input type="password" id="inputRePassword" class="form-control" name="repassword" placeholder="Re-enter Password" required="">


      <button class="btn btn-primary btn-lg btn-block" type="submit" name="Submit" id="register" >Change password</button>


  </main>

  <script type="text/javascript">
    var password = document.getElementById("inputPassword");
    var confirm_password = document.getElementById("inputRePassword");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
  </script>
</body>
</html>
