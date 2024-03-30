<?php
  ini_set('display_errors',0);
  include("../connect.php");
 $_POST[id]=addslashes($_POST[id]);
 
 $_POST[value]=addslashes($_POST[value]);
  $q=mysqli_query($db,"UPDATE zv SET cmp='$_POST[value]' WHERE id='$_POST[id]'");
 ?>