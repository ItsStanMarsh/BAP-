<?php

// POST ARRAY UITLEZEN
$voornaam = $_POST ['voornaam'];
$tussenvoegsel = $_POST['tussenvoegsel'];
$achternaam = $_POST ['achternaam'];
$mailadres = $_POST ['mailadres'];

// DATA IN DATABASE STOPPEN

// 1. VERBINDING MET DATABASE
$dbc = mysqli_connect( 'localhost', 'root', '', '24988_db') or die('Error connecting.');

// 2. OPDRACHT (QUERY) SCHRIJVEN VOOR DATABASE
$query = "INSERT INTO nieuwsbrief VALUES(0,'$voornaam','$tussenvoegsel','$achternaam','$mailadres')";

// 3. QUERY UITVOEREN
$result = mysqli_query($dbc,$query) or die ('Error querying.');

// 4. VERBINDING VERBREKEN
mysqli_close($dbc);

// BEVESTIGEN VAN DATA IN DATABASE
if ($result) {
    echo 'De volgende gegevens zijn toegevoegd aan de database: <br>';
    echo $voornaam . '<br>';
    echo $tussenvoegsel . '<br>';
    echo $achternaam . '<br>';
    echo $mailadres . '<br>';
} else {
    echo 'sorry er is iets mis gegaan, probeer het opnieuw';
}

