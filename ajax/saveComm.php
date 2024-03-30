<?php
  ini_set('display_errors',0);
  include("../connect.php");
 $_POST[id]=addslashes($_POST[id]);
 $_POST[id]=str_replace("idpl","",$_POST[id]);
 $_POST[nme]=addslashes($_POST[nme]);
  $q=mysqli_query($db,"UPDATE zv SET comm='$_POST[nme]' WHERE id='$_POST[id]'");
 ?>