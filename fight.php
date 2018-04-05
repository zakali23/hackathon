<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

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

while ($fighterOneStats['durability']>0&&$fighterTwoStats['durability']>0) {
    $i++;
    while ($fighterOneStamina < 100 && $fighterTwoStamina < 100) {
        $fighterOneStamina += $fighterOneStats['speed'];
        $fighterTwoStamina += $fighterTwoStats['speed'];
    }
    echo "<br><br>Round" . $i . "<br><br><br>";

    if ($fighterOneStamina >= 100) {
        echo $fighterOneName . " attacks " . $fighterTwoName;
        if (rand(1, 100) <= $fighterOneStats['combat']) {
            $damages = $fighterOneStats['strength'];
            if (rand(1, 100) <= $fighterOneStats['intelligence']) {
                echo ", it's a critical hit";
                $damages += $fighterOneStats['power'];
            }

            echo " dealing " . $damages . " damages!<br>";
            $fighterTwoStats['durability'] += -$damages;
        } else {
            echo " but misses...<br>";

        }
        $fighterOneStamina += -100;
    }
    if ($fighterTwoStamina >= 100) {
        echo $fighterTwoName . " attacks " . $fighterOneName;
        if (rand(1, 100) <= $fighterTwoStats['combat']) {
            $damages = $fighterTwoStats['strength'];
            if (rand(1, 100) <= $fighterTwoStats['intelligence']) {
                echo ", it's a critical hit ";
                $damages += $fighterTwoStats['power'];
            }

            echo " dealing " . $damages . " damages!<br>";
            $fighterOneStats['durability'] += -$damages;
        } else {
            echo " but misses...<br>";
        }
        $fighterTwoStamina += -100;
    }
    echo "<br>";
    if ($fighterOneStats['durability']>0){
        echo $fighterOneName." is still fighting with ".$fighterOneStats['durability']." HP.<br>";
    }
    else {
        echo $fighterOneName." is K.O.!!!<br>";
    }
    if ($fighterTwoStats['durability']>0){
        echo $fighterTwoName." is still fighting with ".$fighterTwoStats['durability']." HP.<br>";
    }
    else {
        echo $fighterTwoName." is K.O.!!!<br>";
    }
}


?>
    <!--Javascipt bootstrapcdn-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>


