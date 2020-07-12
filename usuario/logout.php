<?php include("../config/auth.php")?>
<?php
  session_start();

  session_destroy();

  header("location: ../");
  exit();
?>
