# Quizz_Vendon
Quizz in php for Vendon


Information for files:

index.php - is the first page where user chooses test and writes input name;
insert.php - is where user's name is saved for later use and from here it redirects to the quizz;
quizz.php and quizz_math.php - are files where quiz questions are obtained from database sql file. quizz.php is the 1st quiz 
              and quiz_math is the 2nd quizz;
process.php and process_math.php - are files where score is calculated, user does not see this page;
final.php - here everything is saved in database - username, what quiz was chosen, what is the score, chosen answers for the quiz and 
            in this page final score and user's name is printed out;
db.php - file for creating a communication with a database;
style.css - is for stylizing html appearance;

database credentials:

$db_host = 'localhost';
$db_user = 'root';
$db_password = ''; (none)
$db_name = 'quiz_vendon';
