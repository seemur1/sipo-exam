<?php
  ini_set('display_errors',0);
  include("../connect.php");
 $_POST[id]=addslashes($_POST[id]);
 $_POST[id]=str_replace("idpl","",$_POST[id]);
 $_POST[nme]=addslashes($_POST[nme]);
 if($_POST[value]!="неликвидная")
 {
	 //если компания не присвоена - не переносим
	   $q=mysqli_query($db,"SELECT * FROM zv   WHERE id='$_POST[id]'");
	   $f=mysqli_fetch_array($q);
	   if($f[cmp]!=null)
  $q=mysqli_query($db,"UPDATE zv SET stp='$_POST[value]' WHERE id='$_POST[id]'");
 }
  if($_POST[value]=="неликвидная")
 {
	   $q=mysqli_query($db,"UPDATE zv SET stp='неликвидная' WHERE id='$_POST[id]'");
$q=mysqli_query($db,"UPDATE zdata SET accepted='1000' WHERE zid='$_POST[id]' AND spl='$_POST[split]' ");
 }
 ?>