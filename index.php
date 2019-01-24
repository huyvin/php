<?php
  // error_reporting(0 || E_ALL ^ E_WARNING);
  include('functions.php');



  include('views/header.php');

  if (isset($_GET['page']) && $_GET['page'] == 'timeline') {
    include('views/timeline.php');
  } else {
    include('views/home.php');

  }


  
  
  include('views/footer.php');



  

?>