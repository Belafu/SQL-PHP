<?php
include "pdo.php";
echo "<hr>";
//$data = $db->prepare("DELETE FROM usuarios");
// Statements
//$stmt = $db->prepare("INSERT INTO movies VALUES(default, null, null,'Avengers Infinity War', 10, 0,'2018-04-26',180,4)");
//$stmt = $db->prepare("DELETE FROM movies WHERE title='Avengers Infinity War'");
$id = $_GET["id"];
$tabla = '';

$cantMovies = $db->prepare("SELECT * ,count(*) as cantidad from movies");
$cantMovies->execute();
$cantMovies = $cantMovies->fetch(PDO::FETCH_ASSOC);
$cantMovies = $cantMovies["cantidad"];

$cantSeries = $db->prepare("SELECT * ,count(*) as cantidad from series");
$cantSeries->execute();
$cantSeries = $cantSeries->fetch(PDO::FETCH_ASSOC);
$cantSeries = $cantSeries["cantidad"];

if (!isset($_GET["tabla"])) {
  echo "Error no se selecciono si es pelicula o serie";
  exit;
}
if ($_GET["tabla"]=="movies"){
    if ($id <= $cantMovies) {
      $tabla = "movies";
    }else {
      echo "Solo hay peliculas hasta id=$cantMovies";
      exit;
    }
}
if ($_GET["tabla"]=="series"){
    if ($id <= $cantSeries) {
      $tabla = "series";
    }else {
      echo "Solo hay series hasta id=$cantSeries Aunque se actualixa constantemente";
      exit;
      // si le saco el exit salta un error de SQL POR QUE ABAJO BUSCA UN ID QUE NO EXISTE
    }
}


$stmt = $db->prepare("SELECT * FROM $tabla WHERE id = $id");
$stmt->execute();

//$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // Solo para las consultas SELECT
$resultados = $stmt->fetch(PDO::FETCH_ASSOC); // Solo para las consultas SELECT trae un solo resultado.

var_dump($resultados);

// $query = $data->fetch(PDO::FETCH_ASSOC);
// var_dump($query);

echo "Ejecutamos la consulta."

?>
