<?php

include "pdo.php";
$stmt = $db->prepare("SELECT * FROM movies WHERE id = $id_pelicula");







?>
