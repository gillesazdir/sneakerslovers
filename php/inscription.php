<!DOCTYPE html>

<html lang="fr"><head>
<title>Inscription</title>
<link href="../css/creative.css" rel="stylesheet">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sneakers Lovers</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="../css/creative.css" rel="stylesheet">
</head>
<body id="page-top">
  <?php
  // on teste si le visiteur a soumis le formulaire
  if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
    // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
    if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
    // on teste les deux mots de passe
    if ($_POST['pass'] != $_POST['pass_confirm']) {
      $erreur = 'Les 2 mots de passe sont différents.';
    }
    else {
      $base = mysql_connect ('serveur', 'login', 'password');
      mysql_select_db ('sneakers', $base);

      // on recherche si ce login est déjà utilisé par un autre membre
      $sql = 'SELECT count(*) FROM membre WHERE login="'.mysql_escape_string($_POST['login']).'"';
      $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
      $data = mysql_fetch_array($req);

      if ($data[0] == 0) {
      $sql = 'INSERT INTO membre VALUES("", "'.mysql_escape_string($_POST['login']).'", "'.mysql_escape_string(md5($_POST['pass'])).'")';
      mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

      session_start();
      $_SESSION['login'] = $_POST['login'];
      header('Location: membre.php');
      exit();
      }
      else {
      $erreur = 'Un membre possède déjà ce login.';
      }
    }
    }
    else {
    $erreur = 'Au moins un des champs est vide.';
    }
  }
  ?>
Inscription à l'espace membre :<br />
<form action="inscription.php" method="post">
Login : <input type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
Mot de passe : <input type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
Confirmation du mot de passe : <input type="password" name="pass_confirm" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>"><br />
<input type="submit" name="inscription" value="Inscription">
</form>
<?php
if (isset($erreur)) echo '<br />',$erreur;
?>
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#../page-top">Accueil</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#../portfolio">Nouveautés</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#../contact">Contactez-nous</a>
                    </li>
                    <li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Sneakers Lovers</h1>
                <hr>
                <p></p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">More</a>
            </div>
        </div>
    </header>


    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/fullsize/1.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">

                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/fullsize/2.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">

                                </div>
                                <div class="project-name">
                                   Air Max 95 Satin Lemon Lime
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/fullsize/3.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">

                                </div>
                                <div class="project-name">
                                    Diadora x Afew V7000 “Highly Addictive”
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/fullsize/4.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">

                                </div>
                                <div class="project-name">
                                    asics Gel Lyte V Volcano
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/fullsize/5.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">

                                </div>
                                <div class="project-name">
                                    HUF x Nike Air Max 1 Hufquake
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/fullsize/6.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">

                                </div>
                                <div class="project-name">
                                    Pharrell Williams x adidas NMD Human Race
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
