<?php
include "pdo.php";

$id_pelicula = $_GET["id"];

$stmt = $db->prepare("SELECT * FROM movies WHERE id = $id_pelicula");
$stmt->execute();

$pelicula = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($pelicula);
