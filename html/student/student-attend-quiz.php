

<?php

require_once('../../DB/connection.php');
require_once('../../DB/dbFunctions.php');
require_once('../../DB/globaldata.php');

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


    <?php //include 'top-nav.php'?>

    <div class="container-fluid">

      <div class="row">

        <?php// include 'side-nav.php' ?>

        <!-- Start Editing page from here -->
        <main role="main" class="col-md-9 ml-sm-3 col-lg-12 px-4">
          <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Good luck</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <h1 id="quizTimer" style="position: fixed;
                                          top: 100;
                                          right: 0;
                                          width: 150px;
                                          border: 3px solid black;
                                          z-index: 1;
                                          background-color: white;" ></h1>
              </div>
            </div>
          </div>


        <div class="col-md-auto order-md-1">


        </div>


        <div class="col-md-auto order-md-1">


          <!-- student-attend-quiz.php?id=<?php echo $aquiz[0];?>&studentId=<?php echo $_GET['studentId'] ?> -->
          <form  id=form1 method="post" action="redirect-submit-quiz.php?id=<?php echo $mquiz[0]?>&studentId=<?php echo $_GET['studentId'] ?>">

               <!-- <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="font-weight-bold " for="Title" style="font-size: 1.4em;">Title</label>
                  <input type="text" class="form-control" name="Title" placeholder="" value="<?php// echo $mquiz[1] ?>" required="">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="font-weight-bold " for="Description" style="font-size: 1.4em;">Description</label>
                  <textarea class="form-control" name="Description" rows="4" cols="50" placeholder="" value="<?php //echo $mquiz[2] ?>" required=""><?php //echo $mquiz[2] ?></textarea>
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="font-weight-bold " for="Date" style="font-size: 1.4em;">Start date</label>
                  <input type="datetime" class="form-control" name="startDate" placeholder="" value="<?php// echo $mquiz[3] ?>" required="">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="font-weight-bold " for="Date" style="font-size: 1.4em;">End date</label>
                  <input type="datetime" class="form-control" name="endDate" placeholder="" value="<?php //echo $mquiz[4]?>" required="">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div> -->


              <div class="row">
                <div class="col-md-4 mb-3" id="removeTimer">
                  <!-- <label class="font-weight-bold " for="Timer" style="font-size: 1.4em;">Timer was set to: </label> -->
                  <input type="time" class="form-control" name="Timer" id="timerInput" placeholder="" value="<?php  echo $mquiz[5] ?>" required="" disabled>

                  <!-- <svg width="400" height="110">

                    <rect width="300" height="100" style="fill:rgb(255,255,255)" />
                  </svg> -->


                    <!-- <input type="time" class="form-control" name="Timer" id="timerInput" placeholder="" value="<?php // echo $mquiz[5] ?>" required="" disabled> -->


                </div>
              </div>

              <!-- <hr class="mb-4"> -->

                <input type="hidden" id="chosenNumOfQuestions" name="chosenNumOfQuestions" value="<?php echo $mquiz[6] ?>">
                <input type="hidden" id="id" name="id" value="<?php echo $mquiz[0] ?>">
                <div class="col-12 text-center">
                  <h3>Please answer the following questions!</h3>
                </div>

                <hr class="mb-4">
                <?php $i = -1; ?>
                <?php foreach ($modify_questions as $question){ ?>
                  <?php $i = $i+1 ?>
                              <div class="link">
                                    <div class="mx-5 my-2 border-danger  text-center">
                                      <div class="form-row align-items-center">


                                        <div class="col-12">
                                          <?php echo '<input type="text" name="q'.$i.'" class="form-control mb-2" id="inlineFormInput" placeholder="Question '.$i.' statement" value="'.$question[1].'" readonly="readonly">' ; ?>
                                        </div>



                                        <!-- Question mcq div -->
                                        <div class="col-12">

                                          <div class="input-group">

                                            <div class="col-3 input-group-prepend">

                                              <div class="input-group-text">


                                                <?php

                                                  echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'a" aria-label="Radio button for following text input" >';


                                                ?>

                                              </div>

                                              <?php echo '<input type="text" name="q'.$i.'a" class="form-control" aria-label="Text input with radio button" value="'.$question[2].'" readonly="readonly" >'; ?>

                                            </div>

                                            <div class="col-3 input-group-prepend">

                                              <div class="input-group-text">
                                                <?php

                                                  echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'b" aria-label="Radio button for following text input" >';

                                                ?>
                                              </div>
                                              <?php echo '<input type="text" name ="q'.$i.'b" class="form-control" aria-label="Text input with radio button" value="'.$question[3].'" readonly="readonly">'; ?>

                                            </div>
                                            <div class="col-3 input-group-prepend">

                                              <div class="input-group-text">
                                                <?php

                                                  echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'c" aria-label="Radio button for following text input">';

                                                 ?>
                                              </div>
                                              <?php echo '<input type="text" name ="q'.$i.'c" class="form-control" aria-label="Text input with radio button" value="'.$question[4].'" readonly="readonly">'; ?>

                                            </div>
                                            <div class="col-3 input-group-prepend">

                                              <div class="input-group-text">
                                                <?php

                                                  echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'d" aria-label="Radio button for following text input">';


                                                 ?>
                                              </div>
                                              <?php echo '<input type="text" name ="q'.$i.'d" class="form-control" aria-label="Text input with radio button" value="'.$question[5].'" readonly="readonly">'; ?>

                                            </div>


                                          </div>
                                        </div>


                                      </div>
                                  </div>
                              </div>
                              <hr class="mb-4">

                	<?php }?>


              <hr class="mb-4">

              <button class="btn btn-primary btn-lg btn-block" type="submit" name="Submit" id="build" >Submit Quiz</button>
            </form>

        </div>

        <hr class="mb-4">


        </main>

        <!-- End editing page from here -->
      </div>
    </div>

  </body>

  <!-- src https://stackoverflow.com/questions/34614960/why-doesnt-my-web-page-update-the-timer-with-javascript -->
  <script type="text/javascript">
    var left = document.getElementById("timerInput").valueAsDate.getTime()/1000;
    var seconds_left = left;
    document.getElementById("removeTimer").removeChild(document.getElementById("timerInput"));

    var text = document.getElementById("textfield");

    //variables
    var minutes, seconds;

    //get output
    // var clock = document.getElementById("timer");

    var t = setInterval(function()
    {
        //seconds mods
        hours = parseInt(seconds_left / 60 /60);
        minutes = parseInt(seconds_left / 60);
        seconds = seconds_left % 60;
        minutes = minutes % 60;


        if(seconds_left == 0){
          clearInterval(t);
              // document.getElementById("quizTimer").style.backgroundColor="red";
              document.getElementById("form1").submit();
        }





        //output
        document.getElementById("quizTimer").innerHTML = hours + ":" + minutes + ":" + seconds;

        // document.getElementById("quizTimer").innerHTML = hours + ":" + minutes + ":" + seconds;

        seconds_left--;



    }, 1000);

  </script>
</html>
