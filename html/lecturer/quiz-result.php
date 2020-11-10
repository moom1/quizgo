<?php

require_once('../../DB/connection.php');
require_once('../../DB/dbFunctions.php');
require_once('../../DB/globaldata.php');
$manage_quizes = read("quiz");


$users = read("user");
// $quizes = read("quiz");

$students = array();

if(isset($_GET['id'])){

  foreach ($users as $user) {

    array_push($students, $user);
    if($user[0] == $_GET['id']){
      $currentUser = $user;
    }
  }

}

if(isset($_GET['quizId'])){

  foreach ($manage_quizes as $manage_quizes) {

    if($manage_quizes[0] == $_GET['quizId']){
      $currentQuiz = $manage_quizes;

  }

}

}


$answers = getQuizResults($currentQuiz[0]);






?>


<html lang="en">

  <head>

    <!-- DON'T touch, should be in all files -->
    <?php include '../general/bootstrapMagic.php' ?>

    <!-- Custom styles for this page -->
    <link href="../../css/home.css" rel="stylesheet">
  </head>


  <body>

    <?php include 'top-nav.php'?>

    <div class="container-fluid">

      <div class="row">

        <?php include 'side-nav.php' ?>

        <!-- Start Editing page from here -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Results</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">

              </div>
            </div>
          </div>


          <div class="col-6 my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Students</h6>
            <?php // $i = -1; ?>
            <?php //$j = -1; ?>
            <?php foreach ($answers as $answer) {

              for($i = 0; $i < count($students); $i++){

                if($answer[4] == $students[$i][0]){

              ?>

              <div class="media text-muted pt-3">
                <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">

                  <strong class="text-gray-dark"><?php echo $students[$i][1];  ?></strong>
                  <strong class=" text-gray-dark float-right"><?php  echo $answer[1];?>/<?php  echo $answer[2];?></strong>

                  <br>

                </p>
              </div>

            <?php } } }?>



            <small class="d-block text-right mt-3">
              <a href="#">Load more</a>
            </small>
          </div>

        <!-- End editing page from here -->
      </div>
    </div>

  </body>
</html>
