<?php

//formulieren lezen (data binnenhalen)
$mailadres = $_POST['mailadres'];

//connectie maken met database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = '24988_db';

$dbc = mysqli_connect($host,$username,$password,$dbname) or die ('Error connecting.');

//query voor zoeken naar data
$query = "SELECT * FROM nieuwsbrief WHERE mailadres = '$mailadres'";
//query uitlezen
$result = mysqli_query($dbc,$query) or die ('Error querying select');

$number_of_rows = mysqli_num_rows($result);

//testen voor regels
if ($number_of_rows == 0) {
    echo 'Helaas het mailadres ' . $mailadres . ' staat niet in de database.<br>';
    echo '<a href="uitschrijven.php">klik hier om het nogmaals te proberen</a><br><br>';
    exit();
}
//Query schrijven voor zoeken naar verwijderen van data
$query = "DELETE FROM nieuwsbrief WHERE mailadres = '$mailadres'";

//query uitvoeren
$result = mysqli_query($dbc,$query) or die ('Error deleting');

//connectie verbreken
mysqli_close($dbc);

//verslag van resultaat
echo 'Het mailadres ' . $mailadres . ' is verwijderd uit de database.<br>';
?>
<a href="uitschrijven.php">klik hier om terug te gaan naar de homepage</a><br><br>