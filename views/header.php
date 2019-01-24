<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <link rel="stylesheet" href="./styles.css">          

    <title>Hello, world!</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #152f59;">
      <a class="navbar-brand" href="/">TwitClone</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="?page=timeline">Votre fil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=messages">Vos messages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=profile">Profil</a>
          </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
          <?php if(isset($_SESSION['id'])) {  ?>
            <a class="btn btn-outline-info" href="?function=logout">Se déconnecter</a>
          <?php } else { ?>
            <button class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">Connexion / S'enregistrer</button>
          <?php } ?>

        
          
        </div>
      </div>
    </nav>