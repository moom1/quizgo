<?php


 ?>

<html lang="en">

<head>

  <!-- DON'T touch, should be in all files -->
  <?php include '../general/bootstrapMagic.php' ?>

  <!-- Custom styles for this page -->
  <link href="../../css/home.css" rel="stylesheet">
</head>

    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="advisor-home.php?id=<?php echo $currentUser[0] ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
              Home <span class="sr-only">(current)</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="advisor-results.php?id=<?php echo $currentUser[0]?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
              Results
            </a>
          </li>

        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Recent Quizzes</span>

        </h6>
        <ul class="nav flex-column mb-2">
          <?php foreach ($quizes as $quiz) { ?>

              <li class="nav-item">
                <!-- href should have a way to be dynamic -->
                <a class="nav-link" href="advisor-student-result.php?id=<?php echo $currentUser[0];?>&quizId=<?php echo $quiz[0] ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                  <?php echo $quiz[1]; ?>
                </a>
              </li>

          <?php } ?>



        </ul>
      </div>
    </nav>





</html>
