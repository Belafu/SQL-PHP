<?php
include "pdo.php";
var_dump($_POST);

$title = $_POST["titulo"];
$rating = $_POST["rating"];
$awards = $_POST["awards"];
$release_date = $_POST['year'] ."-". $_POST['month'] ."-". $_POST['day'];
$length = $_POST["duracion"];
$genre_id = $_POST["genre"];

$stmt = $db->prepare("INSERT INTO movies VALUES(default, null, null, '$title', $rating, $awards, '$release_date', $length, $genre_id)"); //Hay que explicitar los campos que son cadena de texto en SQL.
$stmt->execute();

Echo "pelicula guardada.";
