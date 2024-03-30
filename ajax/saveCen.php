<?php
  ini_set('display_errors',0);
  include("../connect.php");
 
  $q=mysqli_query($db,"UPDATE zdata SET price='$_POST[cen]' WHERE id='$_POST[id]'");
 
 
?>