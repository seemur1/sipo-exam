<?php
  ini_set('display_errors',0);
  include("../connect.php");
 
  //если уже есть разбитые заявки не автосплитом
  $q=mysqli_query($db,"UPDATE zdata SET spl=0,mid=0 WHERE zid='$_POST[id]' AND spl='$_POST[split]'  "); 
 
 
 ?>