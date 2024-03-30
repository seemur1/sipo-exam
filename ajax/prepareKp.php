<?php
  ini_set('display_errors',0);
  include("../connect.php");
  	    include("../functions/auth.php");
		checkEnter("users");
 
  $q=mysqli_query($db,"SELECT * FROM zv WHERE id='$_POST[id]'");
  $f=mysqli_fetch_array($q);
 $qc=mysqli_query($db,"SELECT * FROM comp WHERE nme='$f[cmp]'");
  $fc=mysqli_fetch_array($qc);
 
echo"<br><div align='center' style= 'width: 780px; height: 550px; background-color: white; border-radius: 10px;overflow-x:hidden'>";
 echo"<form id='idzdataForm' action='index.php' method='post' enctype='application/x-www-form-urlencoded' target='_self'>";
 echo"<br><div style='font-size:22px'> Подготовка КП<hr></div>";
 
echo"<br><table border='0' width='700'><tr>";
echo"<td>";
//заказчик
echo"<table border='0'  >";
echo"<tr><td class='tHeader'>Заказчик</td><td class='tText'><input type='text' name='p1' value='$fc[nme]'></tr>";
$cnt=explode(";",$fc[cnt]);
$cnt2=explode("-",$cnt[0]); 
$em=explode(";",$fc[email]);
echo"<tr><td class='tHeader'>Контакт:</td><td class='tText'><input type='text' name='p2' value='$cnt2[1]'></tr>";
echo"<tr><td class='tHeader'>Тел.:</td><td class='tText'><input type='text' value=\"$cnt2[0]\" name='p3'></tr>";
echo"<tr><td class='tHeader'>Почта:</td><td class='tText'><input type='text' name='p4' value=\"$em[0]\"></tr>";
echo"<tr height='20'><td class='tHeader'> </td><td class='tText'> </tr>";
//поставщик
echo"<tr><td class='tHeader'>Поставщик:</td><td class='tText'><input type='text' name='p5'></tr>";
echo"<tr><td class='tHeader'>Контакт:</td><td class='tText'><input type='text' name='p6'></tr>";
echo"<tr><td class='tHeader'>Тел.:</td><td class='tText'><input type='text' name='p7'></tr>";
echo"<tr><td class='tHeader'>Почта:</td><td class='tText'><input type='text' name='p8'></tr>";
echo"</table>";
echo"</td>";
//шапка справа

echo"<td>";
echo"<table border='0'  >";
echo"<tr><td class='tHeader'>Дата:</td><td class='tText'> <input type='date' name='p9' value='". date('Y-m-d')."'></tr>";
echo"<tr><td class='tHeader'>цены действительны до:</td><td class='tText'><input type='date' name='p10'></tr>";
echo"<tr><td class='tHeader'>Группа товаров:</td><td class='tText'><input type='text' name='p11'></tr>";
echo"<tr><td class='tHeader'>Город поставки:</td><td class='tText'><input type='text' name='p12' value='$fc[adr]'></tr>";
 echo"<tr><td class='tHeader'>Условия поставки:</td><td class='tText'><select name='p13'><option></option><option>DAP</option><option>DDP</option></tr>";
 echo"<tr><td class='tHeader'>Условия оплаты:</td><td class='tText'><input type='text' name='p14'></tr>";
 echo"<tr><td class='tHeader'>Цена включает:</td><td class='tText'><input type='text' name='p15'></tr>";
 echo"<tr><td class='tHeader'>Фасовка:</td><td class='tText'><input type='text' name='p16'></tr>"; 
echo"</table>";

echo"</td></tr>"; 
echo"</table>";
echo"<table border='0'  >";
 echo"<br><div style='font-size:18px'>Накладные расходы<hr></div>";
 echo"<tr><td class='tHeader'>Логистика:</td><td class='tText'><input type='text' name='pp1'></tr>";
echo"<tr><td class='tHeader'>Акциз:</td><td class='tText'><input type='text' name='pp2'></tr>";
echo"<tr><td class='tHeader'>Расходы на таможенное оформление:</td><td class='tText'><input type='text' name='pp3'></tr>";
echo"<tr><td class='tHeader'>Расходы на разрешительные документы:</td><td class='tText'><input type='text' name='pp4'></tr>";
echo"</table>";





echo"<input type='hidden' name='doPrepareKp' value='1'><input type='hidden' name='zid' value='$f[id]'><input type='hidden' name='split' value='$_POST[split]'><br> <input style='font-size:24px' onclick='sendPrepareKp()' type='button' value='Сохранить'></form>";
echo"</div>";
?>