<?php
include "pdo.php";
$stmt = $db->prepare("SELECT actors.first_name,actors.last_name from actors order by first_name");
$stmt->execute();
$actores = $stmt->fetchAll(PDO::FETCH_ASSOC);
//GUARDA CON EL FETCH Y EL fetchAll
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <ul>
      <?php foreach ($actores as $actor): ?>
        <li><?=$actor["first_name"]  ?>:<?= $actor["last_name"]  ?></li>
      <?php endforeach; ?>
    </ul>
  </body>
</html>
