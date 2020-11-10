

<?php

require_once('../../DB/connection.php');
require_once('../../DB/dbFunctions.php');
require_once('../../DB/globaldata.php');



$users = read("user");

if(isset($_GET['userId'])){
  foreach ($users as $user) {
    if($user[0] == $_GET['userId']){
      $currentUser = $user;
    }
  }

}

$modify_quizes = read("quiz");
if(isset($_GET['id'])){
  $id = $_GET['id'];
  foreach ($modify_quizes as $modify_quize) {
    if($modify_quize[0] == $_GET['id']){
      $mquiz = $modify_quize;
    }
  }

  $modify_questions = readQuizQuestions($mquiz[0]);

}

echo "<br>";


echo "<br>";


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
            <h1 class="h2">Modify Quiz</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              </div>
            </div>
          </div>


        <div class="col-md-auto order-md-1">


        </div>


        <div class="col-md-auto order-md-1">


          <!-- <form  id=form1 method="post" action="lecturer-modify-quiz.php?id=<?php //echo $mquiz[0]; ?>"> -->
          <form  id=form1 method="post" action="redirect-update-quiz.php?id=<?php echo $mquiz[0] ?>&userId=<?php echo $currentUser[0]  ?>">

               <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="font-weight-bold " for="Title" style="font-size: 1.4em;">Title</label>
                  <input type="text" class="form-control" name="Title" placeholder="" value="<?php echo $mquiz[1] ?>" required="">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="font-weight-bold " for="Description" style="font-size: 1.4em;">Description</label>
                  <textarea class="form-control" name="Description" rows="4" cols="50" placeholder="" value="<?php echo $mquiz[2] ?>" required=""><?php echo $mquiz[2] ?></textarea>
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="font-weight-bold " for="Date" style="font-size: 1.4em;">Start date</label>
                  <input type="datetime" class="form-control" name="startDate" placeholder="" value="<?php echo $mquiz[3] ?>" required="">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="font-weight-bold " for="Date" style="font-size: 1.4em;">End date</label>
                  <input type="datetime" class="form-control" name="endDate" placeholder="" value="<?php echo $mquiz[4]?>" required="">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="font-weight-bold " for="Timer" style="font-size: 1.4em;">Timer</label>
                  <input type="time" class="form-control" name="Timer" placeholder="" value="<?php echo $mquiz[5] ?>" required="">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <hr class="mb-4">

                <input type="hidden" id="chosenNumOfQuestions" name="chosenNumOfQuestions" value="<?php echo $mquiz[6] ?>">
                <input type="hidden" id="id" name="id" value="<?php echo $mquiz[0] ?>">
                <div class="col-12 text-center">
                  <h3>Please answer the question to determine the correct answer</h3>
                </div>

                <hr class="mb-4">
                <?php $i = -1; ?>
                <?php foreach ($modify_questions as $question){ ?>
                  <?php $i = $i+1 ?>
                              <div class="link">
                                    <div class="mx-5 my-2 border-danger  text-center">
                                      <div class="form-row align-items-center">


                                        <div class="col-12">
                                          <?php echo '<input type="text" name="q'.$i.'" class="form-control mb-2" id="inlineFormInput" placeholder="Question '.$i.' statement" value="'.$question[1].'">' ; ?>
                                        </div>



                                        <!-- Question mcq div -->
                                        <div class="col-12">

                                          <div class="input-group">

                                            <div class="col-3 input-group-prepend">

                                              <div class="input-group-text">


                                                <?php
                                                if($question[6] == $question[2]){
                                                  echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'a" aria-label="Radio button for following text input" checked >';
                                                }else{
                                                  echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'a" aria-label="Radio button for following text input" >';
                                                }

                                                ?>

                                              </div>

                                              <?php echo '<input type="text" name="q'.$i.'a" class="form-control" aria-label="Text input with radio button" value="'.$question[2].'">'; ?>

                                            </div>

                                            <div class="col-3 input-group-prepend">

                                              <div class="input-group-text">
                                                <?php
                                                if($question[6] == $question[3]){
                                                  echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'b" aria-label="Radio button for following text input" checked>';
                                                }else{
                                                  echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'b" aria-label="Radio button for following text input" >';
                                                }
                                                ?>
                                              </div>
                                              <?php echo '<input type="text" name ="q'.$i.'b" class="form-control" aria-label="Text input with radio button" value="'.$question[3].'">'; ?>

                                            </div>
                                            <div class="col-3 input-group-prepend">

                                              <div class="input-group-text">
                                                <?php
                                                if($question[6] == $question[4]){
                                                  echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'c" aria-label="Radio button for following text input" checked>';
                                                }else{
                                                  echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'c" aria-label="Radio button for following text input">';
                                                }
                                                 ?>
                                              </div>
                                              <?php echo '<input type="text" name ="q'.$i.'c" class="form-control" aria-label="Text input with radio button" value="'.$question[4].'">'; ?>

                                            </div>
                                            <div class="col-3 input-group-prepend">

                                              <div class="input-group-text">
                                                <?php
                                                if($question[6] == $question[5]){
                                                  echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'d" aria-label="Radio button for following text input" checked>';
                                                }else{
                                                  echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'d" aria-label="Radio button for following text input">';
                                                }

                                                 ?>
                                              </div>
                                              <?php echo '<input type="text" name ="q'.$i.'d" class="form-control" aria-label="Text input with radio button" value="'.$question[5].'">'; ?>

                                            </div>


                                          </div>
                                        </div>


                                      </div>
                                  </div>
                              </div>
                              <hr class="mb-4">

                	<?php }?>


              <hr class="mb-4">

              <button class="btn btn-primary btn-lg btn-block" type="submit" name="Submit" id="build" >Update Quiz</button>
            </form>

        </div>

        <hr class="mb-4">


        </main>

        <!-- End editing page from here -->
      </div>
    </div>

  </body>
</html>
