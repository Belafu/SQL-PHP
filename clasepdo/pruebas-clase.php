<?php
include "pdo.php";

//$data = $db->prepare("DELETE FROM usuarios");
// Statements
//$stmt = $db->prepare("INSERT INTO movies VALUES(default, null, null,'Avengers Infinity War', 10, 0,'2018-04-26',180,4)");
//$stmt = $db->prepare("DELETE FROM movies WHERE title='Avengers Infinity War'");

$id_pelicula = $_GET["id"];
$stmt = $db->prepare("SELECT * FROM movies WHERE id = $id_pelicula");

$stmt->execute();

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Solo para las consultas SELECT

//$resultados = $stmt->fetch(PDO::FETCH_ASSOC); // Solo para las consultas SELECT trae un solo resultado.

var_dump($resultados);

// $query = $data->fetch(PDO::FETCH_ASSOC);
// var_dump($query);

echo "Ejecutamos la consulta."

?>
