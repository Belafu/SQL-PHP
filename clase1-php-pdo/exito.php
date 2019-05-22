<?php
include "pdo.php";
var_dump($_POST);

$title = $_POST["titulo"];
$rating = $_POST["rating"];
$awards = $_POST["awards"];
$release_date = $_POST['year'] ."-". $_POST['month'] ."-". $_POST['day'];
$length = $_POST["duracion"];
$genre_id = $_POST["genre"];

$hayIgual = $db->prepare("SELECT * FROM movies where title = '$title' ");
$hayIgual -> execute();
$hayIgual = $hayIgual->fetch(PDO::FETCH_ASSOC);
var_dump($hayIgual);


if ($hayIgual) {
$id = $hayIgual["id"];
$stmt = $db->prepare("UPDATE movies SET title = '$title',rating = '$rating',awards = '$awards', release_date = '$release_date',length = '$length' ,genre_id = '$genre_id'  WHERE id =  '$id' ");

$stmt -> execute();
}
else{
  $stmt = $db->prepare("INSERT INTO movies VALUES(default, null, null, :title, :rating, :awards, :release_date, $length, $genre_id)");
  $stmt -> bindValue(':title',$title);
  $stmt -> bindValue(':rating',$rating);
  $stmt -> bindValue(':awards',$awards);
  $stmt -> bindValue(':release_date',$release_date);

  $stmt->execute();
// Recordar vindear los formularios para evitar inyecciones de SQL
// BINDEAR nos soluciona ek problema de poner las "" en los valores
 //Hay que explicitar los campos que son cadena de texto en SQL.

Echo "pelicula guardada.";

}
