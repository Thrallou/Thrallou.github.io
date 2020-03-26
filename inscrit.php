<?php {

$bdd = new PDO('mysql:host=localhost;dbname=neptune','root','');

if(isset($_POST['inscrit']))
{
  if(!empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['age']) AND !empty($_POST['mail']))
  {
  $pseudo = htmlspecialchars($_POST['username']);
  $mail = htmlspecialchars($_POST['mail']);
  $age = ($_POST['age']);
  $mdp = $_POST['password'];
  $mdp2 = $_POST['confirmer'];


  if($mdp == $mdp2)
  {
    $insertclient = $bdd->prepare('INSERT INTO membre(pseudo, password, mail, age) VALUES(?,?,?,?)');
    $insertclient->execute(array($pseudo, $mdp, $mail ,$age));
    $erreur = "votre compte à bien été créer, Merci de vous connecter";
    header("Refresh:3, login.php");


}else
  {
    $erreur = "Merci de saisir deux fois le même mot de passe";
  }
}
else
{
  $erreur = "Merci de remplir tous les champs";
}
}
}

?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
      <link rel="stylesheet" href="css/inscrits.css" media="screen" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title></title>

  </head>

  <header>
      <a href="index.php" div class="menu"><img src="image/menus.png" alt="menu" style="height: 120px"></a></div>
  </header>
  <body>

    <div id="container">
      <form action="" method="POST">
          <h1>Inscription</h1>

      <form class="inscrit"  method="post">
        <label for="">Pseudo</label>
        <input type="text" name="username" value="" placeholder="Entrez un Pseudo" required>
        <label for="">Mot de passe</label>
        <input type="password" name="password" value="" placeholder="Entrez un mot de passe"required>
        <label for="">Confirmation mot de passe</label>
        <input type="password" name="confirmer" value="" placeholder="Confirmer votre mot de passe"required>
        <label for="">Age</label>
        <input type="number" name="age" value="" placeholder="Entrez votre Age"required>
        <label for="">Email</label>
        <input type="email" name="mail" value="" placeholder="Entrez un Email"required>
        <div class="button">
        <input type="submit" name="inscrit" id='submit' value='Inscription' >
      </form>

      <div id="erreur">
      <?php
      if(isset($erreur))
      {
        echo $erreur;
      }
      ?>
    </div>
    </div>
    </div>

  </body>
</html>
