<?php
  ini_set('display_errors',0);
  include("../connect.php");
  	    include("../functions/auth.php");
		checkEnter("users");
 
  $q=mysqli_query($db,"SELECT * FROM zv WHERE id='$_POST[id]'");
  $f=mysqli_fetch_array($q);
 
 
echo"<br><div align='center' style= 'width: 780px; height: 500px; background-color: white; border-radius: 10px;overflow-x:hidden'>";
 echo"<form id='idzdataForm' action='index.php' method='post' enctype='application/x-www-form-urlencoded' target='_self'>";
 echo"<br><div style='font-size:22px'>Подготовка ТЗ спецификации ВЭД<hr></div>";
 
echo"<br><table border='0' width='700'><tr>";
echo"<td>";
//заказчик
echo"<table border='0'  >";
 echo"<tr><td class='tHeader'>Дата спецификации</td><td class='tText'><input type='text' name='p5'></td></tr>";
echo"<tr><td class='tHeader'>Валюта спецификации:</td><td class='tText'><select     name='p1'  >";

 
 
echo"<option >EUR</option><option  >USD</option><option  >TRY</option></select></td></tr>";
 echo"<tr><td class='tHeader'>Курс EUR\USD</td><td class='tText'><input type='text' name='p2'></td></tr>";
 echo"<tr><td class='tHeader'>Курс EUR\TRY</td><td class='tText'><input type='text' name='p3'></td></tr>"; 
  echo"<tr><td class='tHeader'>Курс USD\TRY</td><td class='tText'><input type='text' name='p4'></td></tr>"; 
echo"</table>";

echo"</td></tr>"; 
echo"</table>";
echo"<input type='hidden' name='doPrepareDstep4' value='1'><input type='hidden' name='zid' value='$f[id]'><br><br><input style='font-size:24px' onclick='sendDstep3()' type='button' value='Сохранить'></form>";
echo"</div>";
?>