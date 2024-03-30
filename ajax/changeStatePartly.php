<?php
  ini_set('display_errors',0);
  include("../connect.php");
 $_POST[id]=addslashes($_POST[id]);
 $_POST[id]=str_replace("idpl","",$_POST[id]);
 $_POST[split]=addslashes($_POST[split]);
 
 //если менеджер не присвоен - не переводим
  $q=mysqli_query($db,"SELECT * FROM zdata   WHERE zid='$_POST[id]' AND spl='$_POST[split]' "); 
  $f=mysqli_fetch_array($q);
  if($f[mid]!=0)
  $q=mysqli_query($db,"UPDATE zdata SET accepted='1' WHERE zid='$_POST[id]' AND spl='$_POST[split]' ");
  
 
 ?>