<?php session_start(); //start the session ?>
<?php include 'db.php'; //include database file ?>

<?php
//Get total number of questions per quiz 1
$query = "SELECT * FROM questions";
$results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
$total = $results->num_rows;
?>

<?php
//Get total number of questions per quiz 2
$query = "SELECT * FROM questions_math";
$results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
$total2 = $results->num_rows;
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
			<form action="" method="POST" required>
				Choose one of the following quizzes:
				<br>
						<select id="quiz_list" name="quiz_list" onchange="this.form.submit();" required="true">
							<option value="false">Select</option>
							<option value="Quiz1">Quiz 1</option>
							<option value="Quiz2">Quiz 2</option>
						</select>
						<!-- <input type="submit" /> -->
			</form>


			<?php //obtain which quiz is going to be chosen
			if(!isset($_POST['quiz_list'])){
				$cards="Select the Quiz from above"; //variable for saving quiz chosen
			}
			else{
				$cards = $_POST['quiz_list'];
			}
			?>
			<?php echo $cards; ?>


			<!-- <a href="quizz.php?n=1" class="start"> Start the Quiz </a> -->
			<?php 
				if($cards == "Quiz1"){ //based on chosen quiz choose where user is going to be redirected
					$quiz_site= "quizz.php?n=1";
				}
				elseif($cards == "Quiz2"){
					$quiz_site= "quizz_math.php?n=1";
				}
				else{
					echo "";
				}
			?>
			<ul>
				<li><strong>Number of questions:</strong>
					<?php
						if($cards == "Quiz1"){
							echo $total;
						}
						elseif($cards == "Quiz2"){
							echo $total2;
						}
						else{
							echo "Choose the quiz first to obtain number of questions";
						}
					?>
				</li>	
			</ul>
			<?php if(!isset($_POST['quiz_list'])){
				echo "Please select the quiz";
			}
				else{
			 $_SESSION['quiz_site'] = $quiz_site;
			 } //save chosen quiz site variable in a session variable ?>




			<?php if(!isset($_POST['quiz_list'])): //cannot go further if quiz is not selected, page reloads ?> 
				<div class="namebar">
					<form action="index.php"  method="post"> <!-- <?php// echo $quiz_site ?> -->
						Enter your name: 
						<br>
						<input type="text" name="username" id="username" required>	
						<br>
						<input type="submit" class="start" name="submit" value="Start the Quiz"> 
					</form>
				</div>
				<?php echo "Please select the quiz!"; ?>
			<?php endif; ?>

			<?php if(isset($_POST['quiz_list'])): ?>
				<div class="namebar">
					<form action="insert.php"  method="post"> <!-- <?php// echo $quiz_site ?> -->
						Enter your name: 
						<br>
						<input type="text" name="username" id="username" required>	
						<br>
						<input type="submit" class="start" name="submit" value="Start the Quiz"> 
					</form>
				</div>
			<?php endif; ?> 

		</div>
	</main>
	<footer>
		<div class="container">
			Andris Erglis 2019
		</div>
	</footer>
</body>
</html>