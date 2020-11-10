

<?php

require_once('../../DB/connection.php');
require_once('../../DB/dbFunctions.php');
require_once('../../DB/globaldata.php');
date_default_timezone_set("Asia/Kuala_Lumpur");


$modify_quizes = read("quiz");
$timer = "1000";

  $id = 14;
  foreach ($modify_quizes as $modify_quize) {
    if($modify_quize[0] == $id){
      $mquiz = $modify_quize;
      $timer = strval($mquiz[5]);
      echo(strtotime($timer) . "<br>");
    }
  }

  $modify_questions = readQuizQuestions($mquiz[0]);




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
            <h1 class="h2">Good luck</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              </div>
            </div>
          </div>


        <div class="col-md-auto order-md-1">


        </div>


        <div class="col-md-auto order-md-1">

          <input id="timerInput2" type="time" name="" value="<?php echo $mquiz[5] ?>">
          <h1 id="textfield">fdbdfgdfgdfgfdg</h1>
          <output id="timer" name="timer">00:00:00</output>


          <script>
          // Update the count down every 1 second
          // var t = document.getElementById("timerInput2");
          // var countDownDate = new Date(t.value).getTime();
          //
          // var x = setInterval(function() {
          //
          //   // Get today's date and time
          //   var now = new Date().getTime();
          //
          //   // Find the distance between now and the count down date
          //   var distance = countDownDate;
          //   alert(distance);
          //   // Time calculations for days, hours, minutes and seconds
          //   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          //   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          //   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          //   var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          //
          //   // Output the result in an element with id="demo"
          //   document.getElementById("timer").innerHTML = days + "d " + hours + "h "
          //   + minutes + "m " + seconds + "s ";
          //
          //   // If the count down is over, write some text
          //   if (distance < 0) {
          //     clearInterval(x);
          //     document.getElementById("timer").innerHTML = "EXPIRED";
          //   }
          // }, 1000);

          //inputs
          var seconds_left = document.getElementById("timerInput2").valueAsDate.getTime()/1000;
          alert(seconds_left);
          var text = document.getElementById("textfield");

          //variables
          var minutes, seconds;

          //get output
          var clock = document.getElementById("timer");

          var t = setInterval(function()
          {
              //seconds mods
              hours = parseInt(seconds_left / 60 /60);
              minutes = parseInt(seconds_left / 60);
              seconds = seconds_left % 60;
              minutes = minutes % 60;


              if(seconds_left == 0){
                clearInterval(t);
                    document.getElementById("textfield").style.backgroundColor="red";

              }





              //output
              document.getElementById("textfield").innerHTML = hours + ":" + minutes + ":" + seconds;
              document.getElementById("textfield").innerHTML = hours + ":" + minutes + ":" + seconds;


              seconds_left--;



          }, 1000);


        </script>
        </div>

        <hr class="mb-4">


        </main>

        <!-- End editing page from here -->
      </div>
    </div>

  </body>
</html>
