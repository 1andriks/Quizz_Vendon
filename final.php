<?php session_start(); ?>
<?php include 'db.php'; ?>
<?php print_r($_SESSION['selected_choices'][0]) ; ?>
<?php print_r($_SESSION['selected_choices'][1]) ; ?>
<?php print_r($_SESSION['selected_choices'][2]) ; ?>

<?php


if($_SESSION['site_number']==1){

		$first_answer = $_SESSION['selected_choices'][0];
		$second_answer = $_SESSION['selected_choices'][1];
		$third_answer = $_SESSION['selected_choices'][2];

		$conn = mysqli_connect('localhost', 'root', '', 'quiz_vendon');
		$first_result = mysqli_query($conn, "SELECT text FROM choices WHERE id ='$first_answer'");
		while ($row = mysqli_fetch_array($first_result)) 
		{
		    $first_text = $row['text'];  
		}

		$second_result = mysqli_query($conn, "SELECT text FROM choices WHERE id ='$second_answer'");
		while ($row = mysqli_fetch_array($second_result)) 
		{
		    $second_text = $row['text'];  
		}

		$third_result = mysqli_query($conn, "SELECT text FROM choices WHERE id ='$third_answer'");
		while ($row = mysqli_fetch_array($third_result)) 
		{
		    $third_text = $row['text'];  
		}
		echo $first_text;
		echo $second_text;
		echo $third_text;
}
else{

		$first_answer = $_SESSION['selected_choices'][0];
		$second_answer = $_SESSION['selected_choices'][1];
		$third_answer = $_SESSION['selected_choices'][2];
		$fourth_answer = $_SESSION['selected_choices'][3];
		$fifth_answer = $_SESSION['selected_choices'][4];


		$conn = mysqli_connect('localhost', 'root', '', 'quiz_vendon');
		$first_result = mysqli_query($conn, "SELECT text FROM choices_math WHERE id ='$first_answer'");
		while ($row = mysqli_fetch_array($first_result)) 
		{
		    $first_text = $row['text'];  
		}

		$second_result = mysqli_query($conn, "SELECT text FROM choices_math WHERE id ='$second_answer'");
		while ($row = mysqli_fetch_array($second_result)) 
		{
		    $second_text = $row['text'];  
		}

		$third_result = mysqli_query($conn, "SELECT text FROM choices_math WHERE id ='$third_answer'");
		while ($row = mysqli_fetch_array($third_result)) 
		{
		    $third_text = $row['text'];  
		}

		$fourth_result = mysqli_query($conn, "SELECT text FROM choices_math WHERE id ='$fourth_answer'");
		while ($row = mysqli_fetch_array($fourth_result)) 
		{
		    $fourth_text = $row['text'];  
		}

		$fifth_result = mysqli_query($conn, "SELECT text FROM choices_math WHERE id ='$fifth_answer'");
		while ($row = mysqli_fetch_array($fifth_result)) 
		{
		    $fifth_text = $row['text'];  
		}

		echo $first_text;
		echo $second_text;
		echo $third_text;
		echo $fourth_text;
		echo $fifth_text;
}

?>

<?php
					$score_ = $_SESSION['score'];
					$con = mysqli_connect('localhost', 'root', '');
					if(!$con){
						//echo 'Not Connected to The Server';
					}
					if(!mysqli_select_db($con, 'quiz_vendon')){
						//echo 'Database Not Selected';
					}
					$name = $_SESSION['username'];
					$site_number=$_SESSION['site_number'];

					if($site_number==1){
								$sql = "INSERT INTO user_results (name, score, quiz_chosen, Question1, Question2, Question3) VALUES ('$name', '$score_', '$site_number', '$first_text','$second_text','$third_text')";
					}
					else{
						$sql = "INSERT INTO user_results (name, score, quiz_chosen, Question1, Question2, Question3, Question4, Question5) VALUES ('$name', '$score_', '$site_number', '$first_text','$second_text','$third_text', '$fourth_text','$fifth_text')";
					}


					if(!mysqli_query($con, $sql)){
						//echo "Name not added to the database";
					}
					else{
						//echo "Name added to the database";
					}
					// header("refresh:0.001; url=$quiz_site");
?>
<?php
//Create connection credentials

//Create mysqli object abd read username for SQL database
$con = mysqli_connect('localhost', 'root', '', 'quiz_vendon');
$sql = mysqli_query($con, "SELECT * FROM user_results ORDER BY user_id DESC LIMIT 1");
$username = mysqli_fetch_row($sql);
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>Quiz</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />

</head>
<body>
	<header>
		<div class="container">
			<h1>Quiz for Vendon</h1>
		</div>	
	</header>
	<main>
		<div class="container">

			<h2>Congratulations, <?php echo $username[1];?>! You have finished the Quiz!</h2>
				<p>Your score is: <?php echo $_SESSION['score']; ?>/<?php  echo $_SESSION['total']; ?> </p>
				<a href="index.php" class="start">Choose another one</a>
		</div>
		<?php session_destroy(); ?>
	</main>

	<footer>
		<div class="container">
			Copyright
		</div>
	</footer>
</body>
</html>