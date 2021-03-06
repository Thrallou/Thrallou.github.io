<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=neptune','root','');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
  $getid = intval($_GET['id']);
  $requser = $bdd->prepare('SELECT * FROM membre WHERE id = ?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();
}


?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<!-- CSS + Style -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <link rel="stylesheet" href="css/profil.css">

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

<!-- Bouton connexion et Inscription -->
      <nav>
        <ul>
          <li><a href='deco.php'> Deconnexion <a> <br><br><br>
          <li>BIENVENUE <?php echo $userinfo['pseudo']; ?>  </li>
          <br>
          <?php
          if ($userinfo['id'] == $_SESSION['id'])
          {
          ?>
          <li><a href='edition.php'> Editer mon profile <br><br>
            <img src="image/profil.png"style="height: 80px"></a>
            <?php
          }
          ?>
        </ul>
      </nav>

  </header>


<body>
  <main>
<!-- menu réservation -->
      <div class="main">
          <div class="all">

            <h2>Réservations</h2>

        <div class="calendar">
        <form action="" name="dates" id="reservation">
        DATE DE DEBUT :
      	<input type="date" id="entree">
        DATE DE FIN :
      	<input type="date" id="sortie">
        </form>
         </div>

        <div class="rooms">
         <div class="formroom">
        <form action="" name="chambres" id="chambres">
        Chambres
        <select>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
        </form>
        </div>


        <div class="formpeo">
        <form action="" name="personnes" id="personnes">
        Personnes
       <select>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
        <button onclick="test()">Valider</button>
        </form>
        </div>

  </main>

<!-- Gallery  -->
  <section>

    <h2><a href="pagetype.html" id="h2">Gallerie:</a></h2>

    <div class="titre1">
      <img src="image/imageun.jpg" alt="dbz" id="Image1">
    </div>

    <div class="titre1">
        <img src="image/imagedeux.jpg" alt="dbz" id="Image1">
    </div>

    <div class="titre1">
        <img src="image/imagetrois.jpg" alt="dbz" id="Image1">
    </div>

  </section>
</body>

   <!-- footer-->
   <footer>
    <p span id="Copyright">Copyright 2020</p>
  </footer>




</html>
