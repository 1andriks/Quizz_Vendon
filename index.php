<?php session_start();?>
<?php include 'db.php'; ?>

<?php
//Get total number of questions per quiz
$query = "SELECT * FROM questions";
$results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
$total = $results->num_rows
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
			<h2>Test your knowledge</h2>
			<p>This is a multiple choice quizz.</p>


			<form action="" method="POST">
				Choose one of the following quizzes:
						<select name="quiz_list" onchange="this.form.submit();" required>
							<option value="-1">Select</option>
							<option value="Quiz1">Quiz 1</option>
							<option value="Quiz2">Quiz 2</option>
						</select>
						<!-- <input type="submit" /> -->
			</form>
			<ul>
				<li><strong>Number of questions:</strong><?php echo $total; ?></li>
				<li><strong>Type:</strong>Multiple Choice</li>
			</ul>

			<?php 
			if(!isset($_POST['quiz_list'])){
				$cards="Select the Quiz from above";
			}
			else{
				$cards = $_POST['quiz_list'];
			}
			 ?>
			<?php echo $cards; ?>


			<!-- <a href="quizz.php?n=1" class="start"> Start the Quiz </a> -->
			<?php if($cards == "Quiz1"){
				$quiz_site= "quizz.php?n=1";
			}
				else{
					$quiz_site= "quizz_math.php?n=1";
				}
			?>
			<?php $_SESSION['quiz_site'] = $quiz_site; ?>
			<div class="namebar">
				<form action="insert.php"  method="post"> <!-- <?php// echo $quiz_site ?> -->
					Enter your name: <input type="text" name="username" id="username" required>	
					<input type="submit" class="start" name="submit" value="Start the Quiz"> 

<!-- 					<a href='<?php //echo $quiz_site ?>' onclick='this.parentNode.submit(); return false;' class="start">Start the Quiz</a> -->

				</form>
			</div>


			
		</div>
	</main>

	<footer>
		<div class="container">
			Copyright
		</div>
	</footer>
</body>
</html>