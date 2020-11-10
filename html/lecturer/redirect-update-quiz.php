<?php

require_once('../../DB/connection.php');
require_once('../../DB/dbFunctions.php');
require_once('../../DB/globaldata.php');

// $modifying_quizes = read("quiz");

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



if(isset($_POST['Submit'])){
  // update quiz
  updateQuiz(getQuizValuesArray($_GET['userId']), $mquiz[0]);
  // update questions related to quiz with correct answers
  $i = -1;
  foreach ($modify_questions as $question) {
    $i = $i+1;
    updateQuestion(getQuestionsValuesArray($i),$question[0]);
  }

}

 ?>


 <html lang="en">

   <head>

     <!-- DON'T touch, should be in all files -->

     <!-- Custom styles for this page -->
     <link href="../../css/home.css" rel="stylesheet">
     <meta http-equiv="refresh" content="3;url=lecturer-modify-quiz.php?id=<?php echo $mquiz[0]?>&userId=<?php echo $_GET['userId'] ?>">
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
