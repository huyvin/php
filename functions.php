<?php


  $link = mysqli_connect('localhost', 'admin', 'root', 'twitter');

  if (!$link) {
    die('Erreur de connexion : ' . mysqli_connect_error());
}
?>