<?php
  ini_set('display_errors',0);
  include("../connect.php");
 $_POST[id]=addslashes($_POST[id]);
  $_POST[mid]=addslashes($_POST[mid]);
 $_POST[split]=addslashes($_POST[split]);
  $q=mysqli_query($db,"UPDATE zdata SET mid='$_POST[mid]' WHERE zid='$_POST[id]' AND spl='$_POST[split]'");
echo"!!!UPDATE zdata SET mid='$_POST[mid]' WHERE zid='$_POST[id]' AND split='$_POST[split]'";

 ?>