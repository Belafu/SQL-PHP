<?php
include "pdo.php";

$stmt = $db->prepare("SELECT * FROM genres");
$stmt->execute();
$generos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $db->prepare("SELECT genres.name,movies.title from genres left join movies on genres.id=movies.genre_id");
$stmt->execute();
$genero_movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

/*foreach ($genero_movies as $key => $value) {
  if ($key==0) {
    echo $value["name"]."<br>";//cambiar $mi[$key] por $value
    echo "//".$value["title"];//cambiar $mi[$key] por $value
  }else {
    if ($genero_movies[$key - 1]["name"] == $value["name"]) {//cambiar $mi[$key] por $value
      echo "//".$value["title"]."<br>";
    }
    else {
      echo $value["name"]."<br>";
      echo "//".$value["title"]."<br>";
    }
  }
}*/




echo "<hr>";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Géneros</h1>
    <ul>
      <?php foreach ($generos as $genero): ?>
        <li><?= $genero["name"] ?></li>
      <?php endforeach; ?>
    </ul>
<br>


<?php foreach ($genero_movies as $key => $value): ?>
  <?php if ($key==0): ?>
    <u><h3><?= $value["name"] ?></h3></u>
    <li><?= $value["title"] ?></li>
  <?php else: ?>
    <?php if ($genero_movies[$key - 1]["name"] == $value["name"]): ?>
      <li><?= $value["title"] ?></li>
    <?php else: ?>
    <u><h3><?= $value["name"] ?></h3></u>
      <li><?= $value["title"] ?></li>
    <?php endif; ?>
  <?php endif; ?>
<?php endforeach; ?>

  </body>
</html>
