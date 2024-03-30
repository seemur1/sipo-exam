<?php
  ini_set('display_errors',0);
  include("../connect.php");
  	    include("../functions/auth.php");
		checkEnter("users");
 
  $q=mysqli_query($db,"SELECT * FROM zv WHERE id='$_POST[id]'");
  $f=mysqli_fetch_array($q);
 
 
echo"<br><div align='center' style= 'width: 780px; height: 500px; background-color: white; border-radius: 10px;overflow-x:hidden'>";
 echo"<form id='idzdataForm' action='index.php' method='post' enctype='application/x-www-form-urlencoded' target='_self'>";
 echo"<br><div style='font-size:22px'>Подготовка ТЗ для договора<hr></div>";
 
echo"<br><table border='0' width='700'><tr>";
echo"<td>";
//заказчик
echo"<table border='0'  >";
echo"<tr><td class='tHeader'>Поставщик</td><td class='tText'><select name='p1'><option></option><option>ООО 'Мастер бэринг'</option><option>ООО 'ЦМТО1'</option></select></td></tr>";
echo"<tr><td class='tHeader'>Сделка ВЭД</td><td class='tText'><select name='p2'><option></option><option>Да</option><option>Нет</option></select></td></tr>";
echo"<tr><td class='tHeader'>Условия оплаты</td><td class='tText'><input type='text' name='p3'</td></tr>";
//echo"<tr><td class='tHeader'>Соотношение аванса и оплаты</td><td class='tText'><input type='text' name='p4'</td></tr>";
echo"<tr><td class='tHeader'>Требования к сопроводительным документам (перечень)</td><td class='tText'><input type='text' name='p5'</td></tr>";
echo"<tr><td class='tHeader'>Что выносится в спецификацию (приложение)?</td><td class='tText'><input type='text' name='p6'</td></tr>";

echo"<tr><td class='tHeader'>Какие приложения к договору предусматриваются?</td><td class='tText'><input type='text' name='p7'</td></tr>";
echo"<tr> </tr>";


 echo"</table>";
echo"</td>";
 
echo"</table>";

echo"</td></tr>"; 
echo"</table>";
echo"<input type='hidden' name='doPrepareDstep1' value='1'><input type='hidden' name='zid' value='$f[id]'><br><br><input style='font-size:24px' onclick='sendDstep1()' type='button' value='Сохранить'></form>";
echo"</div>";
?>