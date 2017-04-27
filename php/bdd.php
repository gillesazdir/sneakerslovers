<?php
$bdd = new PDO ('mysql:host=localhost;dbname=sneakers;charset=utf8','root','ouali123', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->query('SELECT * FROM article');
while ($article = $req->fetch()) {
  echo $article['titre'];
  echo $article['contenu'];
}
?>
