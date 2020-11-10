<?php

require_once('../../DB/connection.php');
require_once('../../DB/dbFunctions.php');

$quizes = read("quiz");




$valid = "0";
$page = "login.php?error=1";
if(isset($_POST['Submit'])){
  //insert new quiz
  if(validateUser($_POST['email'], $_POST['password'])){
    $valid = true;
    $currentUser = getCurrentUser($_POST['email'], $_POST['password']);
  }



}

if($valid){
  if($currentUser[6] == "Lecturer"){
    $page = "../lecturer/lecturer-home.php?id=" . $currentUser[0];
  }elseif ($currentUser[6] == "Student"){
    $page = "../student/student-home.php?id=" . $currentUser[0];

  }elseif ($currentUser[6] == "Advisor"){
    $page = "../advisor/advisor-home.php?id=" . $currentUser[0];

  }

}

?>





<html lang="en">

  <head>

    <!-- DON'T touch, should be in all files -->

    <!-- Custom styles for this page -->
    <link href="../../css/home.css" rel="stylesheet">
    <meta http-equiv="refresh" content="2;url=<?php echo $page ?>">
    <style>


      body{

        background-image: url("../../resources/hola.Gif");



      }


    </style>

  </head>


  <body>


    <div class="container-fluid">

      <div class="row">


        <!-- Start Editing page from here -->

        <!-- End editing page from here -->
      </div>
    </div>

  </body>
</html>
