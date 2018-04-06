<?php
session_start();
$_SESSION['arena']="img/1.jpg";
$json=file_get_contents("https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/all.json");
$parsee=json_decode($json,true);
$publishers = array();
foreach ( $parsee as $publish){
    $publishers[]= $publish['biography']['publisher'];

}
$publishers=array_unique($publishers,SORT_STRING);
sort($publishers,SORT_STRING);

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
  <header>
    <img class="col-md-12" src="img/logo.svg" alt="Logo du site">
  </header>
  <h2 class="alert alert-danger">Get ready to ruuuumble !!!</h2>
  <h3>Select your character...</h3>
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

      <h4 class="col-xs">Universes</h4>
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

      <h4 class="col-xs">Characters</h4>
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
  </form>
  <form action="fighter.php" name="ArenaImage" method="post">

    <div class="row">

      <div class="col-md-4 card">
        <img class="card-img-top" src="<?php echo $_SESSION['fighterOneInfos']['images']['lg'];?>" alt="">
        <div class="card-body">
          <h5 class="card-title"><?php echo $_SESSION['fighterOneInfos']['name']; ?></h5>
          <h6>Intelligence</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo $_SESSION['fighterOneInfos']['powerstats']['intelligence'] ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['fighterOneInfos']['powerstats']['intelligence'] ?></div>
          </div>
          <h6>Strength</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo $_SESSION['fighterOneInfos']['powerstats']['strength'] ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['fighterOneInfos']['powerstats']['strength'] ?></div>
          </div>
          <h6>Speed</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo $_SESSION['fighterOneInfos']['powerstats']['speed'] ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['fighterOneInfos']['powerstats']['speed'] ?></div>
          </div>
          <h6>Durability</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo $_SESSION['fighterOneInfos']['powerstats']['durability'] ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['fighterOneInfos']['powerstats']['durability'] ?></div>
          </div>
          <h6>Power</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo $_SESSION['fighterOneInfos']['powerstats']['power'] ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['fighterOneInfos']['powerstats']['power'] ?></div>
          </div>
          <h6>Accuracy</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo $_SESSION['fighterOneInfos']['powerstats']['combat'] ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['fighterOneInfos']['powerstats']['combat'] ?></div>
          </div>
        </div>
        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalperso1">Details</a>
      </div>
      <div class="modal fade" id="modalperso1" tabindex="-1" role="dialog" aria-labelledby="modalperso1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><?php echo $_SESSION['fighterOneInfos']['name']; ?></h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">Full Name: <?php echo $_SESSION['fighterOneInfos']['biography']['fullName']; ?></li>
                    <li class="list-group-item">Race: <?php echo $_SESSION['fighterOneInfos']['appearance']['race']; ?></li>
                    <li class="list-group-item">Gender: <?php echo$_SESSION['fighterOneInfos']['appearance']['gender']; ?></li>
                    <li class="list-group-item">Ocupation: <?php echo$_SESSION['fighterOneInfos']['work']['occupation']; ?></li>
                    <li class="list-group-item">First Appearance: <?php echo$_SESSION['fighterOneInfos']['biography']['firstAppearance']; ?></li>
                </ul>
              <div class="modal-footer">

              </div>
            </div>
          </div>
        </div>
      </div>
          <div class="col-md-4">

            <h4>Arena</h4>

            <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <img class="img-fluid img-thumbnail arena1" src="img/1tn.jpg"/>
                      <input class="radio" type="radio" name="arena" value="img/1.jpg"/>
                  </div>
                  <div class="col-md-6">
                      <img class="img-fluid img-thumbnail arena2" src="img/2tn.jpg"/>
                      <input class="radio" type="radio" name="arena" value="img/2.jpg"/>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <img class="img-fluid img-thumbnail arena3" src="img/3tn.jpg"/>
                      <input class="radio" type="radio" name="arena" value="img/3.jpg"/>
                  </div>
                  <div class="col-md-6">
                      <img class="img-fluid img-thumbnail arena4" src="img/4tn.jpg"/>
                      <input class="radio" type="radio" name="arena" value="img/4.jpg"/>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <img class="img-fluid img-thumbnail arena5" src="img/5tn.jpg"/>
                      <input class="radio" type="radio" name="arena" value="img/5.jpg"/>
                  </div>
                  <div class="col-md-6">
                      <img class="img-fluid img-thumbnail arena6" src="img/6tn.jpg"/>
                      <input class="radio" type="radio" name="arena" value="img/6.jpg"/>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <img class="img-fluid img-thumbnail arena7" src="img/7tn.jpg"/>
                      <input class="radio" type="radio" name="arena" value="img/7.jpg"/>
                  </div>
                  <div class="col-md-6">
                      <img class="img-fluid img-thumbnail arena8" src="img/8tn.jpg"/>
                      <input class="radio" type="radio" name="arena" value="img/8.jpg"/>
                  </div>
              </div>
            </div>
              <button class="col bouton-fight" type="submit" name=""><img style="width:110px;height:auto;"
                                                                          src="img/button.svg"></button>
  </form>



        </div>
        <div class="col-md-4 card">
        <img class="card-img-top" src="<?php echo $_SESSION['fighterTwoInfos']['images']['lg'];?>" alt="">
        <div class="card-body">
          <h5 class="card-title"><?php echo $_SESSION['fighterTwoInfos']['name']; ?></h5>
          <h6>Intelligence</h6>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar"
                     style="width: <?php echo $_SESSION['fighterTwoInfos']['powerstats']['intelligence'] ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['fighterTwoInfos']['powerstats']['intelligence'] ?></div>
            </div>
            <h6>Strength</h6>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar"
                     style="width: <?php echo $_SESSION['fighterTwoInfos']['powerstats']['strength'] ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['fighterTwoInfos']['powerstats']['strength'] ?></div>
            </div>
            <h6>Speed</h6>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo $_SESSION['fighterTwoInfos']['powerstats']['speed'] ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['fighterTwoInfos']['powerstats']['speed'] ?></div>
            </div>
            <h6>Durability</h6>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo $_SESSION['fighterTwoInfos']['powerstats']['durability'] ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['fighterTwoInfos']['powerstats']['durability'] ?></div>
            </div>
            <h6>Power</h6>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo $_SESSION['fighterTwoInfos']['powerstats']['power'] ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['fighterTwoInfos']['powerstats']['power'] ?></div>
            </div>
            <h6>Accuracy</h6>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo $_SESSION['fighterTwoInfos']['powerstats']['combat'] ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['fighterTwoInfos']['powerstats']['combat'] ?></div>
            </div>
        </div>


          <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalperso2">Details</a>
      </div>
      <div class="modal fade" id="modalperso2" tabindex="-1" role="dialog" aria-labelledby="modalperso2" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?php echo $_SESSION['fighterTwoInfos']['name']; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">Full Name: <?php echo $_SESSION['fighterTwoInfos']['biography']['fullName']; ?></li>
                    <li class="list-group-item">Race: <?php echo $_SESSION['fighterTwoInfos']['appearance']['race']; ?></li>
                    <li class="list-group-item">Gender: <?php echo$_SESSION['fighterTwoInfos']['appearance']['gender']; ?></li>
                    <li class="list-group-item">Ocupation: <?php echo$_SESSION['fighterTwoInfos']['work']['occupation']; ?></li>
                    <li class="list-group-item">F irst Appearance: <?php echo$_SESSION['fighterTwoInfos']['biography']['firstAppearance']; ?></li>
                </ul>
            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>
    </div>

  <audio controls="controls" autoplay="autoplay" preload="auto" hidden="hidden">
      <source src="sounds/Marvel_Super_Heroes_vs_Street_Fighter_Messatsu_Gou-Techno_OC_ReMix.mp3" type="audio/mp3">
  </audio>


  
  <!--Javascipt bootstrapcdn-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
