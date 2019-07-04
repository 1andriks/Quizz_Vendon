<?php session_start(); ?>
<?php include 'db.php'; ?>

<?php

	//Check the score
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}
	if ($_POST){
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];
		$_SESSION['selected_choices'][]=$selected_choice;
		$next = $number + 1;

		//Get total questions

		$query = "SELECT * FROM `questions_math`";
		//Get result
		$results = $mysqli-> query($query) or die ($mysqli->error.__LINE__);
		$total = $results->num_rows;


		//Get correct choice

		$query = "SELECT * FROM `choices_math` WHERE question_number = $number AND is_true =1";

		//Get result
		$result = $mysqli-> query($query) or die ($mysqli->error.__LINE__);

		//Get row
		$row = $result->fetch_assoc();

		//Set correct choice

		$correct_choice = $row['id'];

		//Compare
		if($correct_choice == $selected_choice){
			//Answer is correct
			$_SESSION['score']++;
		}
		//Check if the question is last or not
		if($number == $total){

			header("Location: final.php");
					
			exit();
		}	else{
			header("Location: quizz_math.php?n=".$next);
		}


	}