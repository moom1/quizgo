<?php

require_once('../../DB/connection.php');
require_once('../../DB/dbFunctions.php');

$quizes = read("quiz");



//Creating quiz logic


if(isset($_POST['Submit'])){
  //insert new quiz
  insertQuiz(getQuizValuesArray($_POST['userID']));
  //insert questions related to quiz with correct answers
  for ($i=0; $i < $_POST['chosenNumOfQuestions'] ; $i++) {
      insertQuestion(getQuestionsValuesArray($i));
    }
}


?>





<html lang="en">

  <head>

    <!-- DON'T touch, should be in all files -->

    <!-- Custom styles for this page -->
    <link href="../../css/home.css" rel="stylesheet">
    <meta http-equiv="refresh" content="3;url=lecturer-home.php?id=<?php echo $_POST['userID'] ?>">
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
