<?php session_start(); ?>
<?php include 'db.php'; ?>
<!-- this file is responsible for counting points and setting correct answers in the quiz. it is the page in 
between quizz questions, after each question is answered, it is submitted here and score is being counted. 
after last question this page redirects to the final page -->
<?php

	//Check the score and set it to 0 at the beginning
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}
	if ($_POST){
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];
		$_SESSION['selected_choices'][]=$selected_choice;
		$next = $number + 1;

		//---------Get total questions from quiz2
		$query = "SELECT * FROM `questions_math`";
		$results = $mysqli-> query($query) or die ($mysqli->error.__LINE__);
		$total = $results->num_rows;


		//--------Get correct choice from database quiz2
		$query = "SELECT * FROM `choices_math` WHERE question_number = $number AND is_true =1";
		$result = $mysqli-> query($query) or die ($mysqli->error.__LINE__);
		//Get row
		$row = $result->fetch_assoc();
		//Set correct choice from database
		$correct_choice = $row['id'];

		//Compare if choice is correct, then add +1 score if correct
		if($correct_choice == $selected_choice){
			//Answer is correct
			$_SESSION['score']++;
		}
		//Check if the question is last or not and redirect on the next page
		if($number == $total){
			header("Location: final.php");		
			exit();
		}	else{
			header("Location: quizz_math.php?n=".$next);
		}


	}