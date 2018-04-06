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
  <h2 class="alert alert-danger">Get ready to ruuuumble !!!</h2>
  <h3>Select your character...</h3>
  <form class="container form-group" action="index.html" method="post">
    <div class="row">
      <select class="col form-control" name="univers1">
        <option value="1"></option>
        <option value="2"></option>
      </select>
      <h4 class="col-xs">Universe</h4>
      <select class="col form-control" name="univers2">
        <option value="1"></option>
        <option value="2"></option>
      </select>
    </div>
    <div class="row">
      <select class="col form-control" name="perso1">
        <option value="1"></option>
        <option value="2"></option>
      </select>
      <h4 class="col-xs">Character</h4>
      <select class="col form-control" name="perso2">
        <option value="1"></option>
        <option value="2"></option>
      </select>
    </div>
    
    <div class="row">
      <div class="col-md-4 card">
        <img class="card-img-top" src="img/spiderman.png" alt="">
        <div class="card-body">
          <h5 class="card-title">Spiderman</h5>
          <h6>INT</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">valeur</div>
          </div>
          <h6>STR</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">valeur</div>
          </div>
          <h6>SPD</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">valeur</div>
          </div>
          <h6>DUR</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">valeur</div>
          </div>
          <h6>POW</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">valeur</div>
          </div>
          <h6>ACC</h6>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">valeur</div>
          </div>
        </div>
          <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalperso1">Details</a>
        </div>
        <div class="modal fade" id="modalperso1" tabindex="-1" role="dialog" aria-labelledby="modalperso1" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                CONTENU
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <h4>Arena</h4>
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
          <p class="card-text">ICI LA BIOGRAPHIE</p>
          <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalperso2">Details</a>
        </div>
      </div>
      <div class="modal fade" id="modalperso2" tabindex="-1" role="dialog" aria-labelledby="modalperso2" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">valeur</div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">valeur</div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">valeur</div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">valeur</div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">valeur</div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">valeur</div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <button class="col btn btn-danger" type="submit" name="">Fight !!!</button>
  </form>
  
  
  <!--Javascipt bootstrapcdn-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
