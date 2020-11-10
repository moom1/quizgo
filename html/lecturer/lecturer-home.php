<?php

require_once('../../DB/connection.php');
require_once('../../DB/dbFunctions.php');
require_once('../../DB/globaldata.php');

// $manage_quizes = read("quiz");
$manage_quizes = readDesOrder("quiz");
$comments = read("comment");
$users = read("user");


if(isset($_GET['id'])){
  foreach ($users as $user) {
    if($user[0] == $_GET['id']){
      $currentUser = $user;
    }
  }

}

$tempComments = array();
foreach ($comments as $comment) {
  array_push($tempComments, $comment);
}

// $tempUsers = array();
// foreach ($users as $user) {
//   array_push($tempUsers, $user);
// }
// $tempUsers = array();


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
            <h1 class="h2">Timeline</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.location.href = 'lecturer-create-quiz.php?id=<?php echo $currentUser[0] ?>';">
                  Create Quiz</button>
              </div>
            </div>
          </div>


          <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>



            <?php foreach ($manage_quizes as $quiz) {

              if($currentUser[0]==$quiz[7]){?>

                <div class="media text-muted pt-3">
                  <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <a href="lecturer-modify-quiz.php?id=<?php echo $quiz[0] ?>&userId=<?php echo $currentUser[0]  ?>" ><strong class="text-gray-dark"><?php echo $quiz[1]; ?></strong></a>
                    <a href="quiz-result.php?id=<?php echo $currentUser[0];?>&quizId=<?php echo $quiz[0] ?>"><strong class=" text-gray-dark float-right">Results</strong></a>
                    <br>
                    <?php echo $quiz[2]; ?>
                  </p>
                </div>

                <div class="mx-5 mt-1 p-3 bg-light rounded ">
                  <h6 class="border-bottom border-gray pb-2 mb-0">Comments</h6>



                    <?php


                  for($i = 0; $i< count($tempComments); $i++) {
                    if($tempComments[$i][2] == $quiz[0]){

                      ?>


                            <div class="media text-muted pt-3">
                              <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                              <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">

                                <strong class="d-block text-gray-dark"><?php echo getUserName($tempComments[$i][3]);  ?></strong>

                                <?php echo $tempComments[$i][1]; ?>
                              </p>
                            </div>



                  <?php } //}}


                } ?>





                  <small class="d-block text-right mt-3">
                    <a href="#">Load more</a>
                  </small>
                </div>


                <div class="link">
                      <form class="mx-5 my-2 border-danger  text-center" method="post" action="redirect-comment.php">
                        <div class="form-row align-items-center">
                          <div class="col-11">
                            <!-- <label class="sr-only" for="inlineFormInput">Name</label> -->
                            <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Comment" name="Comment">
                            <input type="hidden" id="quizid" name="quizID" value="<?php echo $quiz[0] ?>">

                          <input type="hidden" id="quizid" name="userID" value="<?php echo $currentUser[0] ?>">
                          </div>
                          <div class="col-1">
                            <button type="submit" class="btn btn-primary mb-2" name="Submit">Post</button>
                          </div>
                        </div>
                    </form>
                </div>



                <hr class="mb-4">




      <?php   }

      }
      ?>

                <small class="d-block text-right mt-3">
                  <a href="#">Load more</a>
                </small>
          </div>


        </main>

        <!-- End editing page from here -->
      </div>
    </div>

  </body>
</html>
