<?php
  ini_set('display_errors',0);
  include("../connect.php");
  $spl=1;
  //если уже есть разбитые заявки не автосплитом
  $q=mysqli_query($db,"SELECT * FROM zdata WHERE zid='$_POST[id]'  ORDER BY spl DESC "); 
 $f=mysqli_fetch_array($q);
 if($f[spl]>0)
 $spl=$f[spl]+1;
  $q=mysqli_query($db,"SELECT DISTINCT  brn FROM zdata WHERE zid='$_POST[id]' AND spl='0'");

  $n=mysqli_num_rows($q);
 
 
  for($i=0;$i<$n;$i++)
  {
$f=mysqli_fetch_array($q);
 	
 
 
 $qq=mysqli_query($db,"SELECT * FROM zdata WHERE zid='$_POST[id]' AND brn='$f[brn]' AND spl='0'");
 
   $nn=mysqli_num_rows($qq);
   for($ii=0;$ii<$nn;$ii++)
  {
$ff=mysqli_fetch_array($qq);
  $qqq=mysqli_query($db," UPDATE zdata SET spl=$spl WHERE id='$ff[id]'   ");
 
  }
  $spl++;
  }
 ?>