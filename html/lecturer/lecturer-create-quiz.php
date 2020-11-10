

<?php

require_once('../../DB/connection.php');
require_once('../../DB/dbFunctions.php');

$quizes = read("quiz");

$users = read("user");


if(isset($_GET['id'])){
  foreach ($users as $user) {
    if($user[0] == $_GET['id']){
      $currentUser = $user;
    }
  }

}

// if(isset($_POST['userID'])){
//   foreach ($users as $user) {
//     if($user[0] == $_GET['id']){
//       $currentUser = $user;
//     }
//   }
//
// }


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
            <h1 class="h2">Quiz Builder</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              </div>
            </div>
          </div>


        <div class="col-md-auto order-md-1">


              <!-- numbOfQuestions form -->
              <form class="" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" >
                    <div class="row">
                      <div class="col-md-4 mb-3" id="numbOfQuestions">
                        <label class="font-weight-bold col-12 p-0" for="Title" style="font-size: 1.4em;">Number of questions</label>

                          <script>
                            var myDiv = document.getElementById("numbOfQuestions");

                            //Create and append select list
                            var selectList = document.createElement("select");
                            selectList.setAttribute("name", "mySelect");
                            myDiv.appendChild(selectList);

                            //Create and append the options
                            for (var i = 0; i < 50; i++) {
                                var option = document.createElement("option");
                                option.text = i;
                                selectList.appendChild(option);
                            }

                          </script>

                        <div class="invalid-feedback">
                        </div>
                      </div>
                    </div>
                      <input type="hidden" id="quizid" name="userID" value="<?php echo $currentUser[0] ?>">

                      <button class="btn btn-primary btn-lg btn-block" type="submit" name="addQuestions" id="createQuestions">set number of questions</button>
                  </form>





              <hr class="mb-4">


        </div>


        <div class="col-md-auto order-md-1">


          <form  id=form1 method="post" action="redirect-create-quiz.php">

               <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="font-weight-bold " for="Title" style="font-size: 1.4em;">Title</label>
                  <input type="text" class="form-control" name="Title" placeholder="" value="" required="">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="font-weight-bold " for="Description" style="font-size: 1.4em;">Description</label>
                  <textarea class="form-control" name="Description" rows="4" cols="50" placeholder="" value="-" required=""></textarea>
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="font-weight-bold " for="Date" style="font-size: 1.4em;">Start date</label>
                  <input type="datetime-local" class="form-control" name="startDate" placeholder="" value="" required="">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="font-weight-bold " for="Date" style="font-size: 1.4em;">End date</label>
                  <input type="datetime-local" class="form-control" name="endDate" placeholder="" value="" required="">
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-5 mb-3">
                  <label class="font-weight-bold " for="Timer" style="font-size: 1.4em;">Timer (local system is not 24hr, you can set 00:00 as 12:00am)</label>
                  <input type="time" class="form-control" name="Timer" placeholder="" value="" required="" >
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>

              <hr class="mb-4">


              <?php if (isset($_POST['mySelect'])) {



                // echo $_POST['mySelect']; ?>
                              <input type="hidden" id="chosenNumOfQuestions" name="chosenNumOfQuestions" value="<?php echo $_POST['mySelect'] ?>">
                              <div class="col-12 text-center">
                                <h3>Please answer the question to determine the correct answer</h3>
                              </div>

                              <hr class="mb-4">

                <?php for ($i=0;$i<$_POST['mySelect'];$i++){ ?>
                              <div class="link">
                                    <div class="mx-5 my-2 border-danger  text-center">
                                      <div class="form-row align-items-center">


                                        <div class="col-12">
                                          <?php
                                          $num = $i + 1;
                                           echo '<input type="text" name="q'.$i.'" class="form-control mb-2" id="inlineFormInput" placeholder="Question '.$num.' statement" required>';
                                            ?>
                                        </div>



                                        <!-- Question mcq div -->
                                        <div class="col-12">

                                          <div class="input-group">

                                            <div class="col-3 input-group-prepend">

                                              <div class="input-group-text">

                                                <?php echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'a" aria-label="Radio button for following text input" required>'; ?>

                                              </div>

                                              <?php echo '<input type="text" name="q'.$i.'a" class="form-control" aria-label="Text input with radio button" required>'; ?>

                                            </div>

                                            <div class="col-3 input-group-prepend">

                                              <div class="input-group-text">
                                                <?php echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'b" aria-label="Radio button for following text input" required>'; ?>
                                              </div>
                                              <?php echo '<input type="text" name ="q'.$i.'b" class="form-control" aria-label="Text input with radio button" required>'; ?>

                                            </div>
                                            <div class="col-3 input-group-prepend">

                                              <div class="input-group-text">
                                                <?php echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'c" aria-label="Radio button for following text input" required>'; ?>
                                              </div>
                                              <?php echo '<input type="text" name ="q'.$i.'c" class="form-control" aria-label="Text input with radio button" required>'; ?>

                                            </div>
                                            <div class="col-3 input-group-prepend">

                                              <div class="input-group-text">
                                                <?php echo '<input type="radio" name="a'.$i.'"   value="q'.$i.'d" aria-label="Radio button for following text input" required>'; ?>
                                              </div>
                                              <?php echo '<input type="text" name ="q'.$i.'d" class="form-control" aria-label="Text input with radio button" required>'; ?>

                                            </div>


                                          </div>
                                        </div>


                                      </div>
                                  </div>
                              </div>
                              <hr class="mb-4">

                						<?php

                }

              }

              ?>


              <hr class="mb-4">
              <input type="hidden" id="quizid" name="userID" value="<?php echo $currentUser[0] ?>">

              <button class="btn btn-primary btn-lg btn-block" type="submit" name="Submit" id="build" >Build Quiz</button>
            </form>

        </div>

        <hr class="mb-4">


        </main>

        <!-- End editing page from here -->
      </div>
    </div>

  </body>
</html>

</div>
</div>



</body></html>
