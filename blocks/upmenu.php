<?php
 echo"<div class='upmenu'>";
 echo"<div style='color:#FFFFFF;font-size:18px;top:10px;left:10px;position:absolute'>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   $q=mysqli_query($db,"SELECT * FROM users WHERE id='$login' ");
   $f=mysqli_fetch_array($q);
   if($login!="")
   {
echo"$f[fio] ($f[role]) <a style='color:#FFFFFF' href='logout.php'>[Выход]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";	   
   }
 if($login!="")
 echo"<a style='color:#FFFFFF;' href='index.php'>Главная</a>";
 else
  echo"<a  style='color:#FFFFFF;' href='index.php'>Вход</a>";
 echo"</div>";
 echo"</div> ";

 
?>