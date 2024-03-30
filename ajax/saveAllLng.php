<?php
  ini_set('display_errors',0);
  include("../connect.php");
 
  $q=mysqli_query($db,"UPDATE zdata SET lng='$_POST[value]' WHERE zid='$_POST[zid]' AND spl=$_POST[split]");
 echo"UPDATE zdata SET lng='$_POST[value]' WHERE zid='$_POST[zid]' AND spl=$_POST[split]";
 
?>