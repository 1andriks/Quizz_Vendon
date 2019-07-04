
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="css/style.css" />

</head>
<body>

	<main>
		<div class="container">
			Quiz loading, please wait...

		</div>
	</main>


</body>
</html>

<?php
session_start();

	// $con = mysqli_connect('localhost', 'root', '');

	// if(!$con){
	// 	echo 'Not Connected to The Server';
	// }
	// if(!mysqli_select_db($con, 'quiz_vendon')){
	// 	echo 'Database Not Selected';
	// }

	// $name = $_POST['username'];

	// $sql = "INSERT INTO user_information (name) VALUES ('$name')";

	// if(!mysqli_query($con, $sql))
	// {
	// 	echo "Name not added to the database";
	// }
	// else{
	// 	echo "Name added to the database";
	// }
	// include 'index.php';

	// header("refresh:0.001; url=$quiz_site");
				$site = $_SESSION['quiz_site'];

				if($site=="quizz.php?n=1"){
					$_SESSION['site_number']=1;
				}
				else{
					$_SESSION['site_number']=2;
				}

				$_SESSION['username']= $_POST['username'];

				//header("refresh:2; url=$site");
				header("Location: $site");

				 
				 
				 
?>

 <?php

// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'quiz_vendon';

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 

// $name = $_POST['username'];
// $sql = "INSERT INTO user_information (name) VALUES ('$name')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
?> 