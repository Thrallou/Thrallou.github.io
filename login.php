<?php {
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=neptune','root','');

if(isset($_POST['Connexion']))
{
  $pseudo = htmlspecialchars($_POST['connect']);
  $mdpconnect = ($_POST['pass']);
  if(!empty($pseudo) AND !empty($mdpconnect))
  {
    $requser = $bdd->prepare("SELECT * FROM membre WHERE pseudo = ? AND password = ?");
    $requser->execute(array($pseudo, $mdpconnect));
    $userexist = $requser->rowCount();
    if($userexist == 1)
    {
      $userinfo = $requser->fetch();
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['pseudo'] = $userinfo['pseudo'];
      $_SESSION['age'] = $userinfo['age'];
      header("Location: profil.php?id=".$_SESSION['id']);

    }
    else
    {
      $erreur = "Mauvais Pseudo ou mot de passe";
    }
  }
  else
  {
    $erreur = " Merci de rentrer tous les champs";
  }
  }
}
?>
<html>
    <head>
       <meta charset="utf-8">

        <link rel="stylesheet" href="css/logins.css" media="screen" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">

    </head>
    <header>
        <a href="index.php" div class="menu"><img src="image/menus.png" alt="menu" style="height: 120px"></a></div>
    </header>
    <body>
        <div id="container">


            <form action="" method="POST">
                <h1>Connexion</h1>

                <label>Nom d'utilisateur</label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="connect" >

                <label>Mot de passe</label>
                <input type="text" placeholder="Entrer le mot de passe" name="pass" >

                <input type="submit" name='Connexion' id='submit' value='Connexion' >

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
    </body>
</html>
