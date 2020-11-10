<html lang="en">
  <head>
    <?php include '../general/bootstrapMagic.php' ?>

    <!-- Custom styles for this template -->

    <link href="../../css/registration.css" rel="stylesheet">
  </head>


  <a href="login.php" style="position: absolute; top:0; left:0"> <img class="mb-4" src="../../resources/Zone4-GO1.png" alt="" width="250" height="125"></a>

  <body class="text-center">
    <form class="form-signin" method="post" action="redirect-registration.php">
    <!-- <form class="form-signin" method="post" action="http://www.randyconnolly.com/tests/process.php"> -->

      <input type="text" class="form-control mb-2" id="validationCustom01" name="first" placeholder="First name" value="" required>

      <input type="text" class="form-control mb-2" id="validationCustom02" name="last" placeholder="Last name" value="" required>

      <input type="email" id="inputEmail" class="form-control mb-2" name="email" placeholder="MMU Email address" required="" autofocus=""  title="Email must be an MMU email id@mmu.edu.my" >
      <!--  pattern=" [0-9]+@[a-z.]+\.[a-z]{2,4}$" -->


      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="">

      <input type="password" id="inputRePassword" class="form-control" name="repassword" placeholder="Re-enter Password" required="">
      <label for="exampleFormControlSelect1">Select user type</label>
      <select class="form-control" id="exampleFormControlSelect1" name="type">
        <option>Lecturer</option>
        <option>Student</option>
        <option>Advisor</option>
      </select>

      <button class="btn btn-primary btn-lg btn-block" type="submit" name="Submit" id="register" >Register</button>

</form>

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
