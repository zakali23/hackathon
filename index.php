<?php
session_start();

$json=file_get_contents("https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/all.json");
$parsee=json_decode($json,true);
$publishers = array();
foreach ( $parsee as $publish){
    $publishers[]= $publish['biography']['publisher'];

}
$publishers=array_unique($publishers,SORT_STRING);


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="container-fluid">
  <header class="row">
      <h1 class="col">Wild Fighters Arena</h1>
  </header>
  <h2 class="alert alert-danger">Les Wilders sont des sauvages !!! Place au combat !!!</h2>
  <h3>Sélectionne ton univers et ton personnage</h3>
  <form class="container form-group" action="index.php" method="post">
    <div class="row">
      <select class="col form-control" onchange="this.form.submit()" name="publisherOne">
          <option>Select publisher</option>
          <?php
          foreach ($publishers as $publisher){
              if(empty($publisher)) {
                  if ($_POST['publisherOne']=='Autre'){
                      echo "<option value=\"Autre\" selected>Autre</option></br>";
                  }
                  else {
                      echo "<option value=\"Autre\">Autre</option></br>";
                  }
              }
              else {
                  if ($_POST['publisherOne'] == str_replace(" ", "_", $publisher)) {
                      echo "<option value=" . str_replace(" ", "_", $publisher) . " selected>" . $publisher . "</option></br>";
                  }
                  else{
                      echo "<option value=" . str_replace(" ", "_", $publisher) . ">" . $publisher . "</option></br>";
                  }
              }
          }
          ?>
      </select>
      <h4 class="col-xs">Univers</h4>
      <select class="col form-control" onchange="this.form.submit()" name="publisherTwo">
          <option value="">Select publisher</option>
          <?php
          foreach ($publishers as $publisher){
              if(empty($publisher)) {
                  if ($_POST['publisherTwo']=='Autre'){
                      echo "<option value=\"Autre\" selected>Autre</option></br>";
                  }
                  else {
                      echo "<option value=\"Autre\">Autre</option></br>";
                  }
              }
              else {
                  if ($_POST['publisherTwo'] == str_replace(" ", "_", $publisher)) {
                      echo "<option value=" . str_replace(" ", "_", $publisher) . " selected>" . $publisher . "</option></br>";
                  }
                  else{
                      echo "<option value=" . str_replace(" ", "_", $publisher) . ">" . $publisher . "</option></br>";
                  }
              }
          }
          ?>
      </select>
    </div>
    <div class="row">
      <select class="col form-control" onchange="this.form.submit()" name="fighterOne">

          <?php
          if(!empty($_POST['publisherOne'])){
              echo "<option value=\"\">Select your Fighter!</option>";
              foreach ($parsee as $fighterOne){
                  $publisherOne=str_replace(" ","_",$fighterOne['biography']['publisher']);
                  if ($publisherOne==$_POST['publisherOne'])
                  {
                      if ($_POST['fighterOne']==str_replace(" ","_",$fighterOne['name']))
                      {
                          $_SESSION['fighterOneInfos']=$fighterOne;
                          echo "<option value='" . str_replace(" ","_",$fighterOne['name']) ."' selected>" . $fighterOne['name'] . "</option><br>";
                      }
                      else
                      {
                          echo "<option value='" . str_replace(" ","_",$fighterOne['name']) ."'>" . $fighterOne['name'] . "</option><br>";
                      }
                  }
              }
          }
          ?>
      </select>
      <h4 class="col-xs">Personnage</h4>
      <select class="col form-control" onchange="this.form.submit()" name="fighterTwo">
          <?php
          if(!empty($_POST['publisherTwo'])){
              echo "<option>Select your Fighter!</option>";
              foreach ($parsee as $fighterTwo){
                  $publisherTwo=str_replace(" ","_",$fighterTwo['biography']['publisher']);
                  if ($publisherTwo==$_POST['publisherTwo'])
                  {
                      if ($_POST['fighterTwo']==str_replace(" ","_",$fighterTwo['name']))
                      {
                          $_SESSION['fighterTwoInfos']=$fighterTwo;
                          echo "<option value='" . str_replace(" ","_",$fighterTwo['name']) ."' selected>" . $fighterTwo['name'] . "</option><br>";
                      }
                      else
                      {
                          echo "<option value='" . str_replace(" ","_",$fighterTwo['name']) ."'>" . $fighterTwo['name'] . "</option><br>";
                      }
                  }
              }
          }
          ?>
      </select>
    </div>
    
    <div class="row">
      <div class="col-md-4 card">
        <img class="card-img-top" src="img/spiderman.png" alt="">
        <div class="card-body">
          <h5 class="card-title">Spiderman</h5>
          <p class="card-text">Biographie: Machin / Place of Birth</p>
          <a href="#" class="btn btn-info">Caractéristiques</a>
        </div>
      </div>
      <div class="col-md-4">
      <h4>Arène</h4>
        <div class="container">
          <div class="row">
            <img class="col-md-6 img-fluid img-thumbnail" src="img/1tn.jpg" alt="">
            <img class="col-md-6 img-fluid img-thumbnail" src="img/2tn.jpg" alt="">
          </div>
          <div class="row">
            <img class="col-md-6 img-fluid img-thumbnail" src="img/3tn.jpg" alt="">
            <img class="col-md-6 img-fluid img-thumbnail" src="img/4tn.jpg" alt="">
          </div>
          <div class="row">
            <img class="col-md-6 img-fluid img-thumbnail" src="img/5tn.jpg" alt="">
            <img class="col-md-6 img-fluid img-thumbnail" src="img/6tn.jpg" alt="">
          </div>
          <div class="row">
            <img class="col-md-6 img-fluid img-thumbnail" src="img/7tn.jpg" alt="">
            <img class="col-md-6 img-fluid img-thumbnail" src="img/8tn.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="col-md-4 card">
        <img class="card-img-top" src="img/vegeta.jpg" alt="">
        <div class="card-body">
          <h5 class="card-title">Vegeta</h5>
          <p class="card-text">Biographie: Machin / Place of Birth</p>
          <a href="#" class="btn btn-info">Caractéristiques</a>
        </div>
      </div>
    </div>
    

  </form>
  <form method="post" action="fighter.php">
      <button class="col btn btn-danger" type="submit" name="">Fight !!!</button>
  </form>

  <?php
  var_dump($_SESSION['fighterOneInfos']);
  var_dump($_SESSION['fighterTwoInfos']);
  ?>
  
  <!--Javascipt bootstrapcdn-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
