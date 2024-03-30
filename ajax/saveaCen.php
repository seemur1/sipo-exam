<?php
  ini_set('display_errors',0);
  include("../connect.php");
 
  $q=mysqli_query($db,"UPDATE zdata SET acen='$_POST[acen]' WHERE id='$_POST[id]'");
 
 
?>