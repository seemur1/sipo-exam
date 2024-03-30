<?php
  ini_set('display_errors',0);
  include("../connect.php");
 $_POST[inn]=addslashes($_POST[inn]);
 
 
  $q=mysqli_query($db,"SELECT * FROM comp WHERE inn='$_POST[inn]' ");
  $n=mysqli_num_rows($q);
  $f=mysqli_fetch_array($q);
  if($n>0)
 echo "$f[nme]";
 ?>