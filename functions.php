<?php

  session_start();

  $link = mysqli_connect('localhost', 'admin', 'root', 'twitter');

  if (mysqli_connect_errno()) {
      print_r(mysqli_connect_error());
      exit();
  }

  if (isset($_GET['function']) && $_GET['function'] == "logout") {
      session_unset(); 
  }

  function time_since($since) {
    $chunks = array(
      array(60 * 60 * 24 * 365 , 'an'),
      array(60 * 60 * 24 * 30 , 'moi'),
      array(60 * 60 * 24 * 7, 'semaine'),
      array(60 * 60 * 24 , 'jour'),
      array(60 * 60 , 'heure'),
      array(60 , 'min'),
      array(1 , 'sec')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    return $print;
  }

  function displayTweets($type) {

    global $link;

    if ($type == 'public') {
      $whereClause = "";
    }

    $query = "SELECT * FROM tweets ".$whereClause." ORDER BY `datetime` DESC LIMIT 10";
        
    $result = mysqli_query($link, $query);
    
    if (mysqli_num_rows($result) == 0) {
        
        echo "Pas de messages à afficher.";
        
    } else {
      while($row = mysqli_fetch_assoc($result)) {
        $userQuery = "SELECT * FROM users WHERE id = ".mysqli_real_escape_string($link, $row['user_id'])." LIMIT 1";
        $userQueryRes = mysqli_query($link, $userQuery);

        $user = mysqli_fetch_assoc($userQueryRes);

        echo "<div class='tweet'><p><strong>".$user['email']." </strong><span class='time'>Il y a ".time_since(time() - strtotime($row['datetime']))."</span></p>";

        echo "<p class='merriweather-font'>".$row['tweet']."</p>";

        echo "<p><a class='toggleFollow' data-userId='".$row['user_id']."'>Suivre</a></p></div>";

        
      }
    }
  }

  function displaySearch() {
    echo '<div class="form-inline">
            <div class="form-group">
              <label class="sr-only" for="inlineFormInputName2"></label>
              <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="">
              <button type="submit" class="btn btn-primary mb-2">Chercher</button>
            </div>
          </div>';
  }

  function displayTweetBox() {
    if(isset($_SESSION['id'])) {

      echo '<div class="form-group">
              <label for="exampleFormControlTextarea1">Saisissez votre message</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              <button type="submit" class="btn btn-primary">Poster</button>
            </div>';
    }
  }

?>