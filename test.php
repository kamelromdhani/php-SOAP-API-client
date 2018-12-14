<?php
if(isset($_POST['action'])){
    $x1=$_POST['id'];$x2=$_POST['dep'];$x3=$_POST['des'];$x4=$_POST['ptr'];
    $x5=$_POST['d'];$x6=$_POST['h'];$x7=$_POST['p'];$x8=$_POST['f'];
    $x9=$_POST['nbp'];$x10=$_POST['idv'];
    $param= new \stdClass();
    $param->id=(string)$x1;$param->dep=(string)$x2;$param->des=(string)$x3;$param->ptr=(string)$x4;
    $param->d=(string)$x5;$param->h=(string)$x6;$param->p=(string)$x7;$param->f=(string)$x8;
    $param->nbp=(string)$x9;$param->idv=(string)$x10;
    ini_set("soap.wsdl_cache_enabled", "0");
    $client=new SoapClient("http://localhost:8585/ServiceCovoiturage?wsdl");
    $client->__soapCall("InsertAnnonce",array($param));
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
              <a class="nav-link text-primary" href="recherche.html"> <i class="fas fa-search ti m-1"></i> Rechercher <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link text-primary" href="trajet.html"><i class="fas fa-plus-circle ti m-1"></i>Proposer un trajet</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link text-primary " href="inscription.html"><i class="fas fa-user-plus ti m-1"></i> Inscription</a>
            </li>
            <li class="nav-item p-2 pl-0">
              <a class="nav-link text-primary" href="connexion.html"><i class="fas fa-sign-in-alt ti m-1"></i>Connexion</a>
            </li>
          </ul>

        </div>
        </nav>
<!-- TRAJET -->

<form method="post" action="trajet.php">
<section>
  <h1 class="display-4 text-center titre1 text-primary">Proposer un trajet</h1>
  <div class="container">
    
<?php
    if(isset($_POST['id'])){
        echo '<div id="abc" class="alert alert-success">';
        echo '<strong>Succès!</strong> Votre annonce ajoutée avec succès';
        echo '</div>';
        echo '<script>$(document.getElementById("abc")).delay(3000).fadeOut();</script>';
    }
?>
    <div class="row">
      <div class="col-lg-3"></div>
        <div class="input-group col-lg-6 my-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="far fa-circle"></i></span>
          </div>
          <input type="text"  class="form-control" placeholder="Départ" id="depart"/>
		      <div hidden id="myMap" style="position:relative;width:600px;height:400px;"></div>
          <div class="input-group-append">
            <button type="button" class="input-group-text bg-primary text-white btn btn-primary" onclick="getLocation()">Localisation auto</button>
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
<script type='text/javascript' 
            src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap' 
            async defer></script>
<script type='text/javascript'>
    var map, searchManager;
	function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(GetMap);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
    function GetMap(position) {
        map = new Microsoft.Maps.Map('#myMap', {
            credentials: 'AnCNUUHbLd6TdAfg5O2gc8c_ko-fY5rS-JQ1LPkVA0NbVdRGx-bGeKBHo-3aNEdW',
            center: new Microsoft.Maps.Location(position.coords.latitude, position.coords.longitude),
            zoom: 11
        });

        //Make a request to reverse geocode the center of the map.
        reverseGeocode();
    }

    function reverseGeocode() {
        //If search manager is not defined, load the search module.
        if (!searchManager) {
            //Create an instance of the search manager and call the reverseGeocode function again.
            Microsoft.Maps.loadModule('Microsoft.Maps.Search', function () {
                searchManager = new Microsoft.Maps.Search.SearchManager(map);
                reverseGeocode();
            });
        } else {
            var searchRequest = {
                location: map.getCenter(),
                callback: function (r) {
                    //Tell the user the name of the result.
					var x = document.getElementById("depart");
					x.value = r.name ;
                    //alert(r.name);
                },
                errorCallback: function (e) {
                    //If there is an error, alert the user about it.
                    alert("Unable to reverse geocode location.");
                }
            };

            //Make the reverse geocode request.
            searchManager.reverseGeocode(searchRequest);
        }
    }
    </script>
</html>