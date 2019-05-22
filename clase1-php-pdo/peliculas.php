<?php
include "pdo.php";
//Armar un archivo peliculas.php que arme un listado con todas las películas de
// nuestra base de datos.
//a. Además que tenga el género de cada una de ellas usando joins.

$stmt = $db->prepare("SELECT movies.id, movies.title, genres.name FROM movies LEFT JOIN genres ON movies.genre_id = genres.id");
$stmt->execute();

$peliculas = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($peliculas);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Películas</h1>
    <ul>
      <?php foreach ($peliculas as $pelicula): ?>
        <li>
          <a href="pelicula.php?id=<?=$pelicula['id']?>">
            <?= $pelicula["title"]?>: <?=$pelicula["name"]?>
          </a>
        </li>

      <?php endforeach; ?>
    </ul>
  </body>
</html>
