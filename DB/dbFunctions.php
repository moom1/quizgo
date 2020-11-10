<?php
require('connection.php');

//sets connections
function setConnectionInfo($values=array()){
	try {
	$connString = $values[0];
	$user = $values[1];
	$password = $values[2];
	$pdo = new PDO($connString,$user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	return $pdo;
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
}

//General Read function from any table
function read($table){
	$pdo = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
	$sql = "SELECT * FROM $table" ;
	try {
	$statement = $pdo->prepare($sql);
	$statement->execute();
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	$pdo = null;
	return $statement;
}

function readDesOrder($table){
	$pdo = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
	$sql = "SELECT * FROM $table order by id desc" ;
	try {
	$statement = $pdo->prepare($sql);
	$statement->execute();
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	$pdo = null;
	return $statement;
}


function readQuizQuestions($id){
	$pdo = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
	$sql = "SELECT * FROM question where quizID = $id" ;
	try {
	$statement = $pdo->prepare($sql);
	$statement->execute();
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	$pdo = null;
	return $statement;
}

//get the last id of any table by passing the name of the table
function getLastID($table){
	$pdo = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
	$sql = "SELECT ID FROM $table";
	try {
	$statement = $pdo->prepare($sql);
	$statement->execute();
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	$pdo = null;
	$quizes = $statement;
	foreach ($quizes as $quiz) {
	    $lastID = $quiz[0];
	}
	return $lastID;

}




//Reads the dynamic values of one quiz and returns an array with those values
function getQuizValuesArray($userID){

	$attr = array();
	if(isset($_POST['Title'])){
	  array_push($attr, $_POST['Title']);
	}
	if(isset($_POST['Description'])){
	  array_push($attr, $_POST['Description']);
	}
	if(isset($_POST['startDate'])){
	  array_push($attr, $_POST['startDate']);
	}
	if(isset($_POST['endDate'])){
	  array_push($attr, $_POST['endDate']);
	}

	if(isset($_POST['Timer'])){
	  array_push($attr, $_POST['Timer']);
	}

	if(isset($_POST['chosenNumOfQuestions'])){
	  array_push($attr, $_POST['chosenNumOfQuestions']);
	}

	array_push($attr, $userID);

	return $attr;

}


//Insert new quiz
function insertQuiz($attr){

	$pdo = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
	$sql = 'INSERT INTO quiz(title,description,startDate, endDate,timer,numOfQ, userID) VALUES(:title,:description,:startDate,:endDate,:timer,:numberOfQ,:userID)';
	try {
	$statement = $pdo->prepare($sql);
	$statement->execute(['title' => $attr[0] ,'description' => $attr[1] ,'startDate' => $attr[2] ,'endDate' => $attr[3], 'timer' => $attr[4], 'numberOfQ' => $attr[5] , 'userID' => $attr[6]]);
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	$pdo = null;
	return $statement;
}

//update quiz
function updateQuiz($attr, $id){

	$pdo = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));

	$sql = "UPDATE quiz SET title=?, description=?, startDate=?, endDate=?, timer=?, numOfQ=?, userID=? WHERE id=$id";

	try {
	$statement= $pdo->prepare($sql);
	$statement->execute([$attr[0], $attr[1], $attr[2], $attr[3], $attr[4], $attr[5], $attr[6]]);
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	$pdo = null;

}


//Reads the dynamic values of one question and returns an array with those values
function getQuestionsValuesArray($QuestionNum){

	$attr = array();
	$flag = 0;
  $QuestionStatement = "q".$QuestionNum;
  $Qa = "q".$QuestionNum."a";
  $Qb = "q".$QuestionNum."b";
  $Qc = "q".$QuestionNum."c";
  $Qd = "q".$QuestionNum."d";
	$answer = "a".$QuestionNum;

	if(isset($_POST[$QuestionStatement])){
	  array_push($attr, $_POST[$QuestionStatement]);
	}else{
		array_push($attr, "---");
	}
	if(isset($_POST[$Qa])){
	  array_push($attr, $_POST[$Qa]);
		$flag = $flag+1;
	}else{
		array_push($attr, "---");
	}

	if(isset($_POST[$Qb])){
	  array_push($attr, $_POST[$Qb]);
		$flag = $flag+1;

	}else{
		array_push($attr, "---");
	}

	if(isset($_POST[$Qc])){
	  array_push($attr, $_POST[$Qc]);
		$flag = $flag+1;

	}else{
		array_push($attr, "---");
	}

	if(isset($_POST[$Qd])){
	  array_push($attr, $_POST[$Qd]);
		$flag = $flag+1;

	}else{
		array_push($attr, "---");
	}


	if($flag == 4){
		if(isset($_POST[$_POST[$answer]])){
		  array_push($attr, $_POST[$_POST[$answer]]);
		}else{
			array_push($attr, "XX-XX-XX-X");
		}
	}




	array_push($attr, getLastID("quiz"));

	return $attr;

}

//insert new question
function insertQuestion($attr){

	$pdo = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
	$sql = 'INSERT INTO question(statement,a,b, c,d, correctAnswer,quizID) VALUES(:statement,:a,:b,:c,:d,:correctAnswer,:quizID)';
	try {
	$statement = $pdo->prepare($sql);
	$statement->execute(['statement' => $attr[0] ,'a' => $attr[1] ,'b' => $attr[2] ,'c' => $attr[3], 'd' => $attr[4] , 'correctAnswer' => $attr[5], 'quizID' => $attr[6]]);
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	$pdo = null;
	return $statement;
}

//update question
function updateQuestion($attr, $id){

	$pdo = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));

	$sql = "UPDATE question SET statement=?, a=?, b=?, c=?, d=?, correctAnswer=?, quizID=? WHERE id=$id";

	try {
	$statement= $pdo->prepare($sql);
	$statement->execute([$attr[0], $attr[1], $attr[2], $attr[3], $attr[4], $attr[5], $attr[6]]);
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	$pdo = null;
	// return $statement;
}


function getCommentValuesArray($quizID, $userID){

	$attr = array();
	if(isset($_POST['Comment'])){
	  array_push($attr, $_POST['Comment']);

	}

	// echo $quizID;
	// echo "<br>";
	// echo $userID;
	array_push($attr, $quizID);
	array_push($attr, $userID);


	return $attr;

}


//Insert new quiz
function insertComment($attr){

	$pdo = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
	$sql = 'INSERT INTO comment(content,quizID,userID) VALUES(:content,:quizID,:userID)';
	try {
	$statement = $pdo->prepare($sql);
	$statement->execute(['content' => $attr[0] ,'quizID' => $attr[1] ,'userID' => $attr[2]]);
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	$pdo = null;
	return $statement;
}




function getUserName($id){
	$pdo = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
	$sql = "SELECT firstName FROM user where id = $id";
	try {
	$statement = $pdo->prepare($sql);
	$statement->execute();
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	$pdo = null;
	$users = $statement;
	foreach ($users as $user) {
	    $firstName = $user[0];
	}
	return $firstName;

}


//insert new answer
function insertAnswer($mark, $numOfQuestions, $quizID, $userID){

	$pdo = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
	$sql = 'INSERT INTO answer(mark,fullMark,quizID,userID) VALUES(:mark,:fullMark,:quizID,:userID)';
	try {
	$statement = $pdo->prepare($sql);
	$statement->execute(['mark' => $mark ,'fullMark' => $numOfQuestions ,'quizID' => $quizID,'userID' => $userID]);
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	$pdo = null;
	return $statement;
}

function getAnswerValue($QuestionNum){


	$answer = "a".$QuestionNum;

	if(isset($_POST[$answer])){
		if(isset($_POST[$_POST[$answer]])){
			return $_POST[$_POST[$answer]];
		}else{
			return "-";
		}

	}else{
		return "-";
	}
}


function evaluateAnswers($studentAnswers,$quizID){
	$pdo = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
	$sql = "SELECT correctAnswer FROM question where quizID = $quizID";
	try {
	$statement = $pdo->prepare($sql);
	$statement->execute();
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	$pdo = null;
	$answers = $statement;
	$answerArray = array();
	foreach ($answers as $answer) {
	    array_push($answerArray,$answer[0]);
	}

	$totalMark = 0;
	for($i = 0; $i < count($answerArray); $i++){
		if($answerArray[$i] == $studentAnswers[$i]){
			$totalMark = $totalMark + 1;
		}
	}
	return $totalMark;

}


function checkQuizSecondAttempt($quizID, $userID){
	$answers = read("answer");


	foreach($answers as $answer){
		if($answer[3] == $quizID && $answer[4] == $userID){
			return false;
		}
	}
	return true;

}


function insertUser($attr){

	$pdo = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
	$sql = 'INSERT INTO user(firstName,lastName,email, password,repassword, type) VALUES(:firstName,:lasatName,:email, :password,:repassword, :type)';
	try {
	$statement = $pdo->prepare($sql);
	$statement->execute(['firstName' => $attr[0] ,'lasatName' => $attr[1] ,'email' => $attr[2] ,'password' => $attr[3], 'repassword' => $attr[4] , 'type' => $attr[5]]);
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	$pdo = null;
	return $statement;
}


function getUserValuesArray(){

	$attr = array();
	if(isset($_POST['first'])){
	  array_push($attr, $_POST['first']);
	}
	if(isset($_POST['last'])){
	  array_push($attr, $_POST['last']);
	}
	if(isset($_POST['email'])){
	  array_push($attr, $_POST['email']);
	}
	if(isset($_POST['password'])){
	  array_push($attr, $_POST['password']);
	}

	if(isset($_POST['repassword'])){
	  array_push($attr, $_POST['repassword']);
	}

	if(isset($_POST['type'])){
	  array_push($attr, $_POST['type']);
	}


	return $attr;

}

function validateUser($email, $password){

	$users = read("user");
	foreach ($users as $user) {
		if($user[3] = $email){
			if($user[4] == $password){
					return true;
			}

		}
	}
	return false;
}

function getCurrentUser($email, $password){
	$users = read("user");
	foreach ($users as $user) {
		if($user[3] == $email && $user[4] == $password){
			return $user;
		}
	}
}


function getQuizResults($quizID){
	$results = array();
	$answers = read("answer");

	foreach ($answers as $answer) {

		if($answer[3] == $quizID){
			array_push($results,$answer);

		}


	}

	return $results;

}

function changePassword($email, $password, $repassword){

	$pdo = setConnectionInfo(array(DBCONNECTION,DBUSER,DBPASS));
	$sql = "UPDATE user SET password=?, repassword=? WHERE email='$email'";
	try {
	$statement= $pdo->prepare($sql);
	$statement->execute([$password, $repassword]);
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	$pdo = null;


}


?>
