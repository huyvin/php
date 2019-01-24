<?php

  include('functions.php');

  if ($_GET['action'] == 'loginSignup') {

    $error = '';
    //check validité de l'email
    if(!$_POST['email']) {
      $error = "Adresse mail requise";
    } else if (!$_POST['password']) {
      $error = "Mot de passe requis";
    } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false ){
      echo "L'adresse email est considérée comme invalide.";
    }

    // affiche $error si non vide
    if ($error != "") {
      echo $error;
      exit();
    }

    
    if ($_POST['loginActive'] == '0') {
      
      $query = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
      $result = mysqli_query($link, $query); // sert à executer la requete

      if(mysqli_num_rows($result) > 0) {
        $error = 'L\'adresse mail est déjà prise';
      } else {
        //stockage du user dans la BD
        $query = "INSERT INTO users (email, password) VALUES ('". mysqli_real_escape_string($link, $_POST['email'])."', '". mysqli_real_escape_string($link, $_POST['password'])."')";
     
        if(mysqli_query($link, $query)) {
          $_SESSION['id'] = mysqli_insert_id($link);

          //hashage du mdp  
          $query = "UPDATE users SET password = '". md5(md5($_SESSION['id']).$_POST['password']) ."' WHERE id = ".$_SESSION['id']." LIMIT 1";
                    
          mysqli_query($link, $query);
          echo 1;

          
        } else {
          //$error = "couldn't create user";

          $error = mysqli_error($link);
        }
      }

      // affiche $error si non vide
      if ($error != "") {
        echo $error;
        exit();
      }

    } else {

      $query = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
      $result = mysqli_query($link, $query); // sert à executer la requete

      $row = mysqli_fetch_assoc($result);

      if ($row['password'] == md5(md5($row['id']).$_POST['password'])) {
        echo 1;

        $_SESSION['id'] = $row['id'];
      } else {
        $error = " / Mail ou mot de passe invalide";
      }
    }

    if ($error != "") {
      echo $error;
      exit();
    }

  }

  if($_GET['action'] == 'toggleFollow') {
    $query = "SELECT * FROM isFollowing WHERE follower=".mysqli_real_escape_string($link, $_SESSION['id'])." AND isFollowing=".mysqli_real_escape_string($link, $_POST['userId'])." LIMIT 1";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);

      mysqli_query($link, "DELETE FROM isFollowing WHERE id=".mysqli_real_escape_string($link, $row['id'])." LIMIT 1");

      echo "1";
    } else {
      mysqli_query($link, "INSERT INTO isFollowing (follower, isFollowing) VALUES (".mysqli_real_escape_string($link, $_SESSION['id']).", ".mysqli_real_escape_string($link, $_POST['userId']).")");

      echo "2";

    }
  }

?>