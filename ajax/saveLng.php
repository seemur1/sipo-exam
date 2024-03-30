<?php
  ini_set('display_errors',0);
  include("../connect.php");
 
  $q=mysqli_query($db,"UPDATE zdata SET lng='$_POST[lng]' WHERE id='$_POST[id]'");
 
 
?>