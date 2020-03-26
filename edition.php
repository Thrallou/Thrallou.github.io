<?php {
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=neptune','root','');

if(isset($_SESSION['id']))
{
  $requser = $bdd->prepare('SELECT * FROM membre WHERE id = ?');
  $requser->execute(array($_SESSION['id']));
  $user = $requser->fetch();


  if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo'])
  {
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $insertpseudo = $bdd->prepare("UPDATE membre SET pseudo = ? WHERE id = ?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
      header('location: profil.php?id=' .$_SESSION['id']);

  }
  if(isset($_POST['newage']) AND !empty($_POST['newage']) AND $_POST['newage'] != $user['age'])
  {
      $newage = htmlspecialchars($_POST['newage']);
      $insertage = $bdd->prepare("UPDATE membre SET age = ? WHERE id = ?");
      $insertage->execute(array($newage, $_SESSION['id']));
      header('location: profil.php?id=' .$_SESSION['id']);

  }
  if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail'])
  {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE membre SET mail = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('location: profil.php?id=' .$_SESSION['id']);

  }

  if(isset($_POST['newmdp']) AND !empty($_POST['newmdp']) AND !empty($_POST['newmdp2']))
  {
      $mdp = ($_POST['newmdp']);
      $mdp2 = ($_POST['newmdp2']);

      if ($mdp == $mdp2)
      {

      $insertmdp = $bdd->prepare("UPDATE membre SET password = ? WHERE id = ?");
      $insertmdp->execute(array($mdp, $_SESSION['id']));
header('location: profil.php?id=' .$_SESSION['id']);
      }
      else
      {
        $msg = "Vos deux mots de passes ne correspondent pas";
      }

  }


}
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<!-- CSS + Style -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <link rel="stylesheet" href="css/edit.css">

  <title>Hotel Neptune</title>

</head>

  <header>
    <!-- Image accueil -->
    <a href="index.php" div class="menu"><img src="image/menus.png" alt="menu" style="height: 120px"></a></div>
    <h2>Menu</h2>
    <h1>Hotel Neptune</h1>
    <input class="star-select__input" id="id_category_1_0" name="category_1" type="radio" value="5" />
    <label class="star-select__star" for="id_category_1_0"></label>

    <input class="star-select__input"  id="id_category_1_1" name="category_1" type="radio" value="4"  />
    <label class="star-select__star" for="id_category_1_1"></label>

    <input class="star-select__input"  id="id_category_1_2" name="category_1" type="radio" value="3" />
    <label class="star-select__star" for="id_category_1_2"></label>


  </header>

<body>
  <div id="container">
  <form method="POST" action="">
    <label>Modifier Votre Pseudo</label>
    <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /> <br>
    <label>Modifier Votre Mail :</label>
    <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /> <br>
    <label>Modifier Votre Mot de passe :</label>
    <input type="password" name="newmdp" placeholder="Mot de passe" /> <br>
    <label>Confirmation de votre mot de passe :</label>
    <input type="password" name="newmdp2" placeholder="Confirmation mot de passe" /> <br>
    <label>Modifier Votre Age</label>
    <input type="text" name="newage" placeholder="Age" value="<?php echo $user['age']; ?>" /> <br>
    <input type="submit" name="" value="mettre à jour le profile">
  </form>

<?php
  if(isset($msg)) {
    echo "$msg";
  }

 ?>
  </div>
  <div class="image">
    <img src="image/edit.png" style="height: 500px">
  </div>
  </div>
  </div>

</body>

<footer>
 <p span id="Copyright">Copyright 2020</p>
</footer>

  </html>
