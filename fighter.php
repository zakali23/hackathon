<?php

$jsonselect = file_get_contents('https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/all.json');
$allfighters = json_decode($jsonselect, true);
//var_dump($allfighters);
$n=rand(0,562);
$fighterOneId = $allfighters[$n]['id'];
$fighterOneName = $allfighters[$n]['name'];
$n=rand(0,562);
$fighterTwoId = $allfighters[$n]['id'];
$fighterTwoName = $allfighters[$n]['name'];

$jsonselect = 'https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/powerstats/'.$fighterOneId.".json";
$fighterOneStats = json_decode(file_get_contents($jsonselect),true);
//var_dump($fighterOneStats);
$jsonselect = 'https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/powerstats/'.$fighterTwoId.".json";
$fighterTwoStats = json_decode(file_get_contents($jsonselect),true);
//var_dump($fighterTwoStats);
$fighterOneStats['durability']*=10;
$fighterTwoStats['durability']*=10;
$fighterOneStamina=0;
$fighterTwoStamina=0;
$i=0;

//déroulement du COMBAT

$combatLog = "";

while ($fighterOneStats['durability']>0&&$fighterTwoStats['durability']>0) {
$i++;
while ($fighterOneStamina < 100 && $fighterTwoStamina < 100) {
$fighterOneStamina += $fighterOneStats['speed'];
$fighterTwoStamina += $fighterTwoStats['speed'];
}
$combatLog.= "<br><br><h3>Round " . $i . "</h3><p><br><br><br>";

if ($fighterOneStamina >= 100) {
$combatLog.= $fighterOneName . " attacks " . $fighterTwoName;
    if (rand(1, 100) <= $fighterOneStats['combat']) {
    $damages = $fighterOneStats['strength'];
    if (rand(1, 100) <= $fighterOneStats['intelligence']) {
    $combatLog.= ", it's a critical hit";
    $damages += $fighterOneStats['power'];
    }

    $combatLog.= " dealing <span style='dmg'>" . $damages . " damages!</span><br>";
    $fighterTwoStats['durability'] += -$damages;
    } else {
    $combatLog.= " but misses...<br>";

    }
    $fighterOneStamina += -100;
    }
    if ($fighterTwoStamina >= 100) {
    $combatLog.= $fighterTwoName . " attacks " . $fighterOneName;
    if (rand(1, 100) <= $fighterTwoStats['combat']) {
    $damages = $fighterTwoStats['strength'];
    if (rand(1, 100) <= $fighterTwoStats['intelligence']) {
    $combatLog.= ", it's a critical hit ";
    $damages += $fighterTwoStats['power'];
    }

    $combatLog.= " dealing <span style='dmg'>" . $damages . " damages!</span><br>";
    $fighterOneStats['durability'] += -$damages;
    } else {
    $combatLog.= " but misses...<br>";
    }
    $fighterTwoStamina += -100;
    }
    $combatLog.= "<br>";
    if ($fighterOneStats['durability']>0){
    $combatLog.= $fighterOneName." is still fighting with <span style='life'>".$fighterOneStats['durability']."</span> HP.<br>";
    }
    else {
    $combatLog.= $fighterOneName." is <span style='ko'>K.O.!!!</span><br>";
    }
    if ($fighterTwoStats['durability']>0){
    $combatLog.= $fighterTwoName." is still fighting with <span style='life'>".$fighterTwoStats['durability']."</span> HP.<br></p>";
    }
    else {
    $combatLog.= $fighterTwoName." is <span style='ko'>K.O.!!!</span><br></p>";
}
}

// Renvoi du vainqueur

if ($fighterOneStats['durability']<=0&&$fighterTwoStats['durability']>0){

$title = "<h1>".$fighterTwoName." WINS!!!</h1>";
}
elseif ($fighterTwoStats['durability']<=0&&$fighterOneStats['durability']>0){

$title = "<h1>".$fighterOneName." WINS!!!</h1>";
}
else{
$title = "<h1>DRAW!!!!</h1>";
}
//echo $title;
//echo $combatLog;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylebacklog.css">
</head>
<body>
<!-- Annonce -->
<?php echo $title; ?>

<!-- Box Winner -->

<section class="container-fluid" id="winBox">
    <div class="row justify-content-around">
        <figure class="col-4 playerBox">
            <img class="img-fluid" src="https://vignette.wikia.nocookie.net/vsbattles/images/5/5b/Wolverine_Portrait_Art.png/revision/latest?cb=20151204133058">
        </figure>
        <figure class="col-2" id="versus">
            <img class="img-fluid" src="https://opengameart.org/sites/default/files/VERSUS%20Graphic.png" id="versusImg">
        </figure>
        <figure class="col-4 playerBox">
            <img class="img-fluid" src="https://vignette.wikia.nocookie.net/king-harkinian/images/4/47/Spongebob.png/revision/latest?cb=20170518185222">
        </figure>
    </div>
    <div class="row justify-content-around">
        <h3 id="namePlayerOne"><?php echo $fighterOneName ?></h3>
        <h3 id="namePlayerTwo"><?php echo $fighterTwoName ?></h3>
    </div>
</section>

<!-- Backlog Box -->

<section class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-10 backlog">
            <?php echo $combatLog; ?>
        </div>

    </div>
</section>

<div class="row justify-content-center">
    <div col-2>
        <form action="" method="POST">
            <button type="submit" class="btn btn-primary">Rematch</button>
        </form>
    </div>
    <div col-2>
        <form action="index.php" method="POST">
            <button type="submit" class="btn btn-primary">New Match</button>
        </form>
    </div>
</div>


</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>