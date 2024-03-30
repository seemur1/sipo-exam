<?php
  ini_set('display_errors',0);
  include("../connect.php");
 $_POST[id]=addslashes($_POST[id]);
 $_POST[id]=str_replace("idpl","",$_POST[id]);
 $_POST[split]=addslashes($_POST[split]);
  $q=mysqli_query($db,"UPDATE zdata SET accepted='2000' WHERE zid='$_POST[id]' AND spl='$_POST[split]' ");
  
 
 ?>