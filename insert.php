<?php
/*necessary to save chosen quiz site in a session variable and for that we need to save
an input from a name of a user, which we can do with POST variable,and here I needed to load it into a new page.
Then it redirects to one of the quizzes page depending what user did choose. */
	session_start();


	$site = $_SESSION['quiz_site'];

	if($site=="quizz.php?n=1"){
		$_SESSION['site_number']=1;
	}
	else{
		$_SESSION['site_number']=2;
	}

	$_SESSION['username']= $_POST['username']; //save input username for final page to add to the database in a session variable

	//header("refresh:2; url=$site");
	header("Location: $site"); //redirect to chosen quiz site

				 
				 
				 
?>

