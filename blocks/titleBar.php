<?php
if($_GET[admin]==1)
{
//панель администратора
echo"<div style= 'width: 1000px; height: 60px; background-color: white; border-radius: 10px;margin:0 auto;top:50px;position:relative'>";
echo"<div style='position:absolute;left:10px;top:17px' class='hadminText'>";
if($role=="BOO1" || $role=="BOO2")
echo"<a class='hadminText' href='index.php?admin=1&users=1'>Пользователи</a>";
echo"&nbsp;&nbsp;&nbsp;<a class='hadminText' href='index.php?admin=1&company=1'>Компании</a></div>";
echo"</div>";
}
 //отмененные заявки
 if($_GET[cancel]==1)
{
	
echo"<div align='center' id='allColumnZ' onclick='closeAll()' style='position:relative;display:flex;top:50px;height:700px;justify-content: center;width:80%'>";
 
   echo"  <div align='center'  style= 'width:420px; height: 40px;  top:40px; position:relative;display:inline-block;margin:30px;  '><div  style= 'width:420px; height: 40px; background: rgba(255,0,254,0.4); border-radius: 10px; top:70px;'>";
 echo"<div align='center' style='color:#FFFFFF;top:9px;position:absolute;width:100%'>Не согласовано РОЗ</div>";
echo"</div>";
 
 
include("functions/renderFace.php");
//неразобранные для менеджера	
include("functions/face/cancel.php");
echo"</div>";
 
 
   echo"  <div align='center'  style= 'width:420px; height: 40px;  top:40px; position:relative;display:inline-block; margin:30px; '><div  style= 'width:420px; height: 40px; background: rgba(255,0,254,0.4); border-radius: 10px; top:70px;'>";
 echo"<div align='center' style='color:#FFFFFF;top:9px;position:absolute;width:100%'>Не согласовано клиентом</div>";
echo"</div>";
 
 
 
//неразобранные для менеджера	
 include("functions/face/cancel2.php");
echo"</div>";


echo"</div>";
}
if($_GET[analytic]==1)
{
//панель администратора
echo"<div style= 'width: 1500px; height: 560px; background-color: white; border-radius: 10px;margin:0 auto;top:50px;position:relative'>";
 echo"<br><div style='font-size:18px' align='center'>Базовая аналитика</div>";
 echo"<hr>";
 echo"&nbsp;&nbsp;&nbsp;&nbsp;Менеджер:";
 $q=mysqli_query($db,"SELECT * FROM users WHERE role='Менеджер'");
 $n=mysqli_num_rows($q);

 echo"<select name='userid'>";
  echo"<option></option>";	 
 for($i=0;$i<$n;$i++)
 {
$f=mysqli_fetch_array($q);
echo"<option>$f[fio]</option>";	 
 }
 echo"</select>";
 
  echo"&nbsp;&nbsp;&nbsp;&nbsp;Клиент:";
 $q=mysqli_query($db,"SELECT * FROM comp  ");
 $n=mysqli_num_rows($q);
 echo"<select name='cmpid'>";
  echo"<option></option>";	 
 for($i=0;$i<$n;$i++)
 {
$f=mysqli_fetch_array($q);
echo"<option>$f[nme]</option>";	 
 }
 echo"</select>";
   echo"&nbsp;&nbsp;&nbsp;&nbsp;Этап:";
 
 echo"<select name='cmpid'>";
   echo"<option></option>";	 
 for($i=0;$i<count($zstep);$i++)
 {
$f=mysqli_fetch_array($q);
echo"<option>$zstep[$i]</option>";	 
 }
 echo"</select>";
   echo"&nbsp;&nbsp;&nbsp;&nbsp;Срез, создание:";
   echo"<input type='date'><input type='date'>";
      echo"&nbsp;&nbsp;&nbsp;&nbsp;Срез, подпись:";
   echo"<input type='date'><input type='date'>";
 echo"<br><br><table align='center' border='0' width=90%  >";
echo"<tr><td class='tHeader'>Заявка №</td><td class='tHeader'>Мнеджер</td><td class='tHeader'>Клиент</td><td class='tHeader'>Стоимость поставки</td><td class='tHeader'>Выручка</td><td class='tHeader'>Выручка %</td><td class='tHeader'>Дата создания заявки</td><td class='tHeader'>Дата подписания</td><td class='tHeader'>Этап</td><td class='tHeader'>Несогласование</td>";
echo"</tr>";
echo"</table>";
echo"</div>";
}
 ?>