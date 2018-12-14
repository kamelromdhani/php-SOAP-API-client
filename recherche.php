<?php
if(isset($_POST['action'])){
    $action = $_POST['action'];
    ini_set("soap.wsdl_cache_enabled", "0");
    $client=new SoapClient("http://localhost:8585/ServiceCovoiturage?wsdl");
    $param=new stdClass();
    $rep=$client->__soapCall("getListAnnonces",array());
    $res=$rep->return;
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
<!-- TRAJET -->

<section>
  <h1 class="display-4 text-center titre1 text-primary">Trouver un trajet</h1>
  <div class="container">
    <div class="row">
      <div class="col-lg-3"></div>
        <div class="input-group col-lg-6 my-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="far fa-circle"></i></span>
          </div>
          <input type="text"  class="form-control" placeholder="Départ" >
          <div class="input-group-append">
            <span class="input-group-text bg-primary text-white btn btn-primary">Localisation auto</span>
          </div>
        </div>

    </div>
      <div class="row">
        <div class="col-lg-3"></div>

        <div class="input-group col-lg-6  my-3">
          <div class="input-group-prepend">
            <span class="input-group-text"  id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
          </div>
          <input type="text"  class="form-control" placeholder="Destination" >
        </div>
      </div>

    <div class="row">
      <div class="col-lg-3"></div>

      <div class="input-group col-lg-6 my-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
        </div>
        <input type="date" class="form-control" placeholder="Date" >
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3"></div>

      <div class="input-group col-lg-6 my-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="far fa-clock"></i></span>
        </div>
        <input type="time" class="form-control" placeholder="Date" >
      </div>
    </div>
    <div class="row">
      <div class="col-lg-5 "></div>
      <div class="col-2 my-3"><a href="rechercher.html" class="btn btn-block btn-primary rad lead"><i class="fas fa-search mr-2"></i>Rechercher</a></div>
  </div>


  <form method="post" action="recherche.php">
    <div class="row">
      <div class="col-lg-5 "></div>
      <div class="col-2 my-3">
        <input class="btn btn-block btn-primary rad lead" type="submit" value="lister les Annonces" name="action">
      </div>
    </div>
  </form>
<?php if(isset($rep)) {?>
  <div class="row">
  <div class="col-lg-5 "></div>
  <table class="table table-hover">
    <thead class="thead-dark">
    <tr><th scope="col">♦</th><th scope="col">point_depart</th><th scope="col">point_arrivee</th><th scope="col">point_rencontre</th><th scope="col">date</th><th scope="col">heure_depart</th><th scope="col">prix</th><th scope="col">fumeur</th><th scope="col">nbr_place</th></tr></thead>
    <?php foreach($rep->return as $annonce) {?>
      <tbody>
      <tr>
            <th scope="row">•</th>
            <td><?php echo($annonce->depart) ?></td>
            <td><?php echo($annonce->destination) ?></td>
            <td><?php echo($annonce->ptRencontre) ?></td>
            <td><?php echo($annonce->date) ?></td>
            <td><?php echo($annonce->heure) ?></td>
            <td><?php echo($annonce->prix) ?></td>
            <td><?php echo($annonce->fumeur) ?></td>
            <td><?php echo($annonce->nbrplaces) ?></td>
      </tr>
      </tbody>
<?php } ?>
  </table>
</div>
<?php } ?>
    
    </div>


</section>


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
