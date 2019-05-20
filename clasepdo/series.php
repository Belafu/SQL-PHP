<?php
/*Crear el archivo series.php que con un statement consulte a la BD de todas la series
y los muestre como un listado (div, li).
a. Adicionar que tenga un link que vaya a serie.php.*/
include "pdo.php";
$stmt = $db->prepare("SELECT * FROM series");
$stmt->execute();

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);


//var_dump($resultados);


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Series</h2>
    <ul>
      <?php foreach ($resultados as $value): ?>
        <li><?= $value["title"] ?></li>
      <?php endforeach; ?>
    </ul>

  </body>
</html>
