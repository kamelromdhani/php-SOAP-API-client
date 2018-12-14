<?php
if(isset($_POST['action'])){
    $x1=$_POST['nom'];$x2=$_POST['prenom'];$x3=$_POST['fonction'];$x4=$_POST['date'];
    $x5=$_POST['tel'];$x6=$_POST['sexe'];$x7=$_POST['login'];$x8=$_POST['mdp'];
    //$nom= new \stdClass();$prenom= new \stdClass();$fonction= new \stdClass();$date= new \stdClass();
    //$tel= new \stdClass();$sexe= new \stdClass();$login= new \stdClass();$mdp= new \stdClass();
    $param= new \stdClass();
    //$nom->nom=(string)$x1;$prenom->prenom=(string)$x2;$fonction->fonction=(string)$x3;$date->date=(string)$x4;
    //$tel->tel=(string)$x5;$sexe->sexe=(string)$x6;$login->login=(string)$x7;$mdp->mdp=(string)$x8;
    $param->nom=(string)$x1;$param->prenom=(string)$x2;$param->fonction=(string)$x3;$param->date=(string)$x4;
    $param->tel=(string)$x5;$param->sexe=(string)$x6;$param->login=(string)$x7;$param->mdp=(string)$x8;
    ini_set("soap.wsdl_cache_enabled", "0");
    $client=new SoapClient("http://localhost:8585/ServiceCovoiturage?wsdl");
    $client->__soapCall("InsertInternaute",array($param));
}
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>covoiturage</title>
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
</head>
<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-1 titre">
          <a href="index.html" class="mm"><span class="tit"><img src="./img/logo.png" id="logo" height="70px"  alt="LOGO"> <span class="text-primary">CO</span>VOITURAGE</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item active p-2">
              <a class="nav-link text-primary" href="recherche.php"> <i class="fas fa-search ti m-1"></i> Rechercher <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link text-primary" href="trajet.php"><i class="fas fa-plus-circle ti m-1"></i>Proposer un trajet</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link text-primary " href="inscription.php"><i class="fas fa-user-plus ti m-1"></i> Inscription</a>
            </li>
            <li class="nav-item p-2 pl-0">
              <a class="nav-link text-primary" href="connexion.php"><i class="fas fa-sign-in-alt ti m-1"></i>Connexion</a>
            </li>
          </ul>

        </div>
        </nav>
<!-- Inscription -->
<form method="post" action="inscription.php">
<section>
  <h1 class="display-4 text-center titre1 text-primary"> Inscription </h1>
<?php
    if(isset($_POST['nom'])){
        echo '<div id="abc" class="alert alert-success">';
        echo '<strong>Succès!</strong> '. $x1 .' '. $x2 .' inscrit avec succès';
        echo '</div>';
        echo '<script>$(document.getElementById("abc")).delay(3000).fadeOut();</script>';
    }
?>
    
<div class="container">
    <div class="row">
      <div class="col-lg-3"></div>
        <div class="input-group col-lg-6 my-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
          </div>
          <input type="text" name="nom" class="form-control" placeholder="Nom" >
        <!--  <div class="input-group-append">
            <span class="input-group-text bg-primary text-white btn btn-primary">Localisation auto</span>
          </div>
          -->
        </div>

    </div>
      <div class="row">
        <div class="col-lg-3"></div>

        <div class="input-group col-lg-6  my-3">
          <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1"><i class="fas fa-user"></i></span>
          </div>
          <input type="text" name="prenom" class="form-control" placeholder="Prénom" >
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3"></div>

        <div class="input-group col-lg-6  my-3">
          <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1"><i class="fas fa-briefcase"></i></span>
          </div>
          <input type="text" name="fonction" class="form-control" placeholder="Fonction" >
        </div>
      </div>



      <div class="row">
        <div class="col-lg-3"></div>

        <div class="input-group col-lg-6 my-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
          </div>
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Date ne naissance</span>
          </div>
          <input type="date" name="date" class="form-control" placeholder="Date" >
        </div>
      </div>

    <div class="row">
      <div class="col-lg-3"></div>
      <div class="input-group col-lg-6 my-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
        </div>
        <input type="tel" name="tel" class="form-control" placeholder="N° tel" >
      </div>
    </div>

    <div class="row">
          <div class="col-lg-3"></div>

          <div class="input-group col-lg-6 w-100 my-3">
            <div class="input-group-prepend">
              <span class="input-group-text"  id="basic-addon1"><i class="fas fa-mars mr-1"></i> <i class="fas fa-venus"></i></span>
            </div>
            <div class="border">
              <div class="container">
                <div class="row ">
                  <div class="form-check col-3 m-2">
                    <input class="form-check-input" type="radio" name="sexe" id="exampleRadios1" value="homme">
                    <label class="form-check-label" for="exampleRadios1">
                      Homme
                    </label>
                  </div>
                  <div class="col-3 w-100"></div>
                    <div class="form-check col-3 m-2  ">
                      <input class="form-check-input" type="radio" name="sexe" id="exampleRadios2" value="femme">
                      <label class="form-check-label" for="exampleRadios2">
                        Femme
                      </label>
                      </div>
                  </div>
                </div>
              </div>

            </div>


          </div>
      
      <div class="row">
        <div class="col-lg-3"></div>

        <div class="input-group col-lg-6  my-3">
          <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1"><i class="fas fa-sign-in-alt"></i></span>
          </div>
          <input type="text" name="login"  class="form-control" placeholder="login" >
        </div>
      </div>
      
    <div class="row">
      <div class="col-lg-3"></div>

      <div class="input-group col-lg-6 my-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
        </div>
        <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" >
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3"></div>

      <div class="input-group col-lg-6 my-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
        </div>
        <input type="password" class="form-control" placeholder="Vérifier mot de passe" >
      </div>
    </div>


    <div class="row">
      <div class="col-lg-4 "></div>
      <div class="col-2 my-3"> <input type="submit" name="action" class="btn btn-block btn-primary rad lead" placeholder="s'inscrire"></div>
      <div class="col-2 my-3"> <input type="reset" class="btn btn-block btn-primary rad lead" placeholder="reset"></div>

  </div>

    </div>


</section>
</form>

</body>

<footer class=" foot text-center text-white">
  <p class="mt-4">
    &#9400; copyright reserved 2018 <br />
    Projet SOA
  </p>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
