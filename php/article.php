<?php
$bdd = new PDO ('mysql:host=localhost;dbname=sneakers;charset=utf8','root','ouali123', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->query('SELECT * FROM article');
while ($article = $req->fetch()) {
  echo $article['titre'];
  echo $article['contenu'];
}
?>








<h4>Poster un commentaire :</h4>
<form method="post" action="fichetechsub.php?id=<?php echo $id; ?>">
<label for="nom" >Votre nom : </label><br/>
<input type="text" name="nom" required><br/>
<label for="mail" >Votre mail : </label><br/>
<input type="mail" name="mail" required><br/>
<label style="vertical-align: top;">Votre commentaire : </label><br/>
<textarea rows="10" cols="50" name="message"></textarea><br/>

<input type="submit" value="Envoyer">
</form>
</div>
