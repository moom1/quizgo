<?php

require_once('../../DB/connection.php');
require_once('../../DB/dbFunctions.php');
require_once('../../DB/globaldata.php');


date_default_timezone_set("Asia/Kuala_Lumpur");
$users = read("user");

if(isset($_GET['studentId'])){
  foreach ($users as $user) {
    if($user[0] == $_GET['studentId']){
      $currentUser = $user;
    }
  }

}



$attend_quizes = read("quiz");

$attendMSG = "Expired";

if(isset($_GET['id'])){
  $id = $_GET['id'];
  foreach ($attend_quizes as $attend_quize) {
    if($attend_quize[0] == $_GET['id']){
      $aquiz = $attend_quize;

      if($aquiz[4]>$aquiz[3]){
        $d=strtotime("now");
        $d = date("Y-m-d h:i:sa", $d);
        if($d > $aquiz[3]){
          if($d < $aquiz[4]){
            if(checkQuizSecondAttempt($aquiz[0],$_GET['studentId'])){// Edit user id after doing login
              $canAttend = true;
            }else{
              $attendMSG = "You cant attempt quiz twice!";
            }

          }

        }else{
          $attendMSG = "Quiz is not open yet, check starting date";
        }
      }
    }
  }

}

if(!isset($canAttend)){
  $canAttend = "0";
}



?>


<html lang="en">

  <head>

    <!-- DON'T touch, should be in all files -->
    <?php include '../general/bootstrapMagic.php' ?>

    <!-- Custom styles for this page -->
    <link href="../../css/home.css" rel="stylesheet">
    <script>
      function evaluateQuiz(){
        var canAttend = <?php echo $canAttend ?>;
        var btn = document.getElementById("attendBtn");
        var title = document.getElementById("h2title");
        // alert(canAttend);
        if(canAttend){
          window.location.href = 'student-attend-quiz.php?id=<?php echo $aquiz[0];?>&studentId=<?php echo $_GET['studentId'] ?>';
        }else{
          btn.disabled;
          btn.style.backgroundColor = "grey";
          title.innerHTML = " (<?php echo $attendMSG ?>)";
        }

      }

    </script>

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
            <h1 class="h2" id="h2title">Attend quiz confirmation</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button type="button" class="btn btn-lg btn-danger" id="attendBtn" onclick="evaluateQuiz()">
                  Attend Quiz</button>
              </div>
            </div>
          </div>


          <div class="col-12 my-3 p-3 bg-white rounded shadow-sm inline">
            <h6 class="border-bottom border-gray pb-2 mb-0">Quiz details</h6>

              <div class="row">
               <div class="col-md-6 mb-3">
                 <label class="font-weight-bold " for="Title" style="font-size: 1.4em;">Title</label>
                 <input type="text" class="form-control" name="Title" placeholder="" value="<?php echo $aquiz[1] ?>" required="" disabled>
                 <div class="invalid-feedback">
                 </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-6 mb-3">
                 <label class="font-weight-bold " for="Description" style="font-size: 1.4em;">Description</label>
                 <textarea class="form-control" name="Description" rows="4" cols="50" placeholder="" value="<?php echo $aquiz[2] ?>" required="" disabled><?php echo $aquiz[2] ?></textarea>
                 <div class="invalid-feedback">
                 </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-6 mb-3">
                 <label class="font-weight-bold " for="Date" style="font-size: 1.4em;">Start date</label>
                 <input type="datetime" class="form-control" name="startDate" placeholder="" value="<?php echo $aquiz[3] ?>" required="" disabled>
                 <div class="invalid-feedback">
                 </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-6 mb-3">
                 <label class="font-weight-bold " for="Date" style="font-size: 1.4em;">End date</label>
                 <input type="datetime" class="form-control" name="endDate" placeholder="" value="<?php echo $aquiz[4]?>" required="" disabled>
                 <div class="invalid-feedback">
                 </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-6 mb-3">
                 <label class="font-weight-bold " for="Timer" style="font-size: 1.4em;">Timer</label>
                 <input type="time" class="form-control" name="Timer" placeholder="" value="<?php echo $aquiz[5] ?>" required="" disabled>
                 <div class="invalid-feedback">
                 </div>
               </div>
             </div>

             <div class="row">
               <div class="col-md-6 mb-3">
                 <label class="font-weight-bold " for="Timer" style="font-size: 1.4em;">Number of questions</label>
                 <input type="text" class="form-control" name="Timer" placeholder="" value="<?php echo $aquiz[6] ?>" required="" disabled>
                 <div class="invalid-feedback">
                 </div>
               </div>
             </div>




          </div>



        </main>

        <!-- End editing page from here -->
      </div>
    </div>

  </body>
</html>
