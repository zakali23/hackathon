<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <form class="" action="select.php" method="post">
      <select onchange="this.form.submit()" name="publishers" class="custom-select" id="inputGroupSelect01">
          <option selected>Choisissez l'univers</option>
  <?php
  $json=file_get_contents("https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/all.json");
  $parsee=json_decode($json,true);
  $publishers = array();
  foreach ( $parsee as $publish){
      $publishers[]= $publish['biography']['publisher'];

  }
  $publishers=array_unique($publishers,SORT_STRING);

  foreach ($publishers as $publisher){
      if(empty($publisher)) {
          if ($_POST['publishers']=='autre'){
              echo "<option value=\"autre\" selected>autre</option></br>";
          }
          else{
              echo "<option value=\"autre\">autre</option></br>";
          }
      }else {
          if ($_POST['publishers'] == str_replace(" ", "_", $publisher)) {
              echo "<option value=" . str_replace(" ", "_", $publisher) . " selected>" . $publisher . "</option></br>";
          }
          else{
              echo "<option value=" . str_replace(" ", "_", $publisher) . ">" . $publisher . "</option></br>";
          }
      }
  }
  ?>
  </select></br>
    <select onchange="this.form.submit()" name="fighter" class="custom-select" id="inputGroupSelect01">
            <option selected>Choisissez le hero</option>
<?php
var_dump($_POST['fighter']);
if(isset($_POST['publishers'])){
    foreach ($parsee as $fighter){
        $publisher=str_replace(" ","_",$fighter['biography']['publisher']);
        if ($publisher==$_POST['publishers'])
        {
            if ($_POST['fighter']==str_replace(" ","_",$fighter['name']))
            {
                $_SESSION['fighterOneInfos']=$fighter;
                echo "<option value='" . str_replace(" ","_",$fighter['name']) ."' selected>" . $fighter['name'] . "</option><br>";
            }
            else
            {
                echo "<option value='" . str_replace(" ","_",$fighter['name']) ."'>" . $fighter['name'] . "</option><br>";
            }
        }
    }
}
var_dump($_SESSION['fighterOneInfos']);
?>
        </select></br>
</form>

  <script>

  </script>
    <!--Javascipt bootstrapcdn-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
