<?php session_start(); ?>
<?php include 'db.php'; ?>

<?php 

	//set question number
	$number = (int)$_GET['n'];

	/*--------Get question-----*/
	$query = "SELECT * FROM `questions_math` WHERE question_number = $number";
	//Get question
	$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);
	$question = $result->fetch_assoc();

	/*------*/
	$query = "SELECT * FROM `questions_math`";
	//Get total nr of questions
	$results = $mysqli-> query($query) or die ($mysqli->error.__LINE__);
	$total = $results->num_rows;
	$_SESSION['total'] = $total;

	/*---- Get choices----*/
	$query = "SELECT * FROM `choices_math` WHERE question_number = $number";
	$choices = $mysqli->query($query) or die ($mysqli->error.__LINE__);

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
			<div class="current">
				Question <?php echo $question['question_number']; ?> of <?php echo $total; ?> 
			</div>

			<div id="progressBar"> 
				<div id="progressBarfull"></div>
			</div>

			<script> //progress bar dynamic refresh per quiz question
				var elem = document.getElementById("progressBarfull");
				var question_nr = <?php echo $question['question_number'] ?>;
				var total_question = <?php echo $total ?>;
				elem.style.width =  `${(question_nr/total_question)*100}% `;
			</script>

			<p class="question">
				<?php echo $question['text']; //read the question from database ?>
			</p>
			<form method="post" action="process_math.php">	
				<ul class="choices">
					<?php while ($row = $choices->fetch_assoc()): ?>
						<!-- <li> -->
							<input class="radiobtn" name="choice" type="radio" value="<?php echo $row['id']; ?>" required/> <?php echo $row['text'];//choices of the questions read from the database ?>
						<!-- </li> -->
					<?php endwhile; ?>	
				</ul>
				<input id="submit" type="submit" name="Submit" />
				<input type="hidden" name="number" value="<?php echo $number; ?>" />
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			Andris Erglis 2019
		</div>
	</footer>
</body></html>
