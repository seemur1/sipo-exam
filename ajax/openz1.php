<?php
  ini_set('display_errors',0);
  include("../connect.php");
  	    include("../functions/auth.php");
		checkEnter("users");
  $_POST[id]=str_replace("idpl","",$_POST[id]);
  $q=mysqli_query($db,"SELECT * FROM zv WHERE id='$_POST[id]'");
  $f=mysqli_fetch_array($q);
   $qq=mysqli_query($db,"SELECT * FROM zdata WHERE zid='$_POST[id]' AND spl=$_POST[split]");  
  $ff=mysqli_fetch_array($qq);
//верхняя шапка
echo"<div style= 'width: 780px; height: 100px; background-color: white;  '>";
echo"<div style='margin-left:10px;margin-top:10px;position:absolute'>Менеджер:$f[men]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Компания:$f[cmp]</div>";

echo"<div style='margin-left:10px;margin-top:70px;position:absolute'>Куда:<input onblur=\"endEdit22(this,$f[id])\"  style='width:600px' id='idsadr' value='$f[adr]'> </div>";
echo"</div>";

 
//инструменты
echo"<div style= 'width: 780px; height: 170px; background-color: white; border-radius: 10px;margin-top:-15px'>";
//если неликвидная
$qn=mysqli_query($db,"SELECT * FROM rcancel WHERE zid='$_POST[id]' AND spl='$_POST[split]'");
$nqn=mysqli_num_rows($q);
if($nqn==1)
{
$fn=mysqli_fetch_array($qn);
echo"<br>$fn[data]";	
}
if($role=="РОЗ" && $f[stp]=="согласование РОЗ"   && $_POST["split"]=="undefined")
{
echo"<div style= 'width: 130px; height: 30px; background-color: #b6e820; border-radius: 10px;display:inline-block; top:0px;position:relative;left:10px;margin:5px'><div onclick=\"autoSplit($f[id]) \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'> Автосплит </div> </div>";

echo"<div style= 'width: 130px; height: 30px; background-color: #b6e820; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block;margin:5px '><div onclick=\"manualSplit($f[id]) \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'> Cплит </div></div>";
}
//неликвидная РОЗ
if($role=="РОЗ" && $f[stp]=="согласование РОЗ"   && $_POST["split"]=="undefined")
{
echo"<div style= 'width: 130px; height: 30px; background-color: #b6e820; border-radius: 10px;display:inline-block; top:0px;position:relative;left:10px;margin:5px'><div onclick=\"changeState($f[id],'неликвидная') \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>Неликвидная</div> </div>";	
}
if($role=="Менеджер" && $f[men]==$fio && $ff[accepted]==2)
{
echo"<div style= 'width: 130px; height: 30px; background-color: #b6e820; border-radius: 10px;display:inline-block; top:0px;position:relative;left:10px;margin:5px'><div onclick=\"changeStatePartly3($f[id],'неликвидная','$_POST[split]')\" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>Неликвидная</div> </div>";	
}
if($role=="РОЗ" && $f[stp]=="согласование РОЗ"   && $_POST["split"]!="undefined")
{
echo"<div style= 'width: 130px; height: 30px; background-color: #b6e820; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block;margin:5px '><div onclick=\"joinZ($f[id],$_POST[split]) \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'> Вернуть </div></div>";	
  $qq=mysqli_query($db,"SELECT * FROM users WHERE role='Закупщик'");
  $nn=mysqli_num_rows($qq);
    $qx=mysqli_query($db,"SELECT * FROM zdata WHERE zid='$_POST[id]' AND spl=$_POST[split]"); 
	$fx=mysqli_fetch_array($qx); 
  echo"<div style= 'width: 130px; height: 30px;  border-radius: 10px; top:-15px;position:relative;left:10px;display:inline-block;margin:5px '><select onchange='setMid($_POST[id],$_POST[split])' id='mid'>";
  echo"<option></option>";
  for($ii=0;$ii<$nn;$ii++)
  {
	$ff=mysqli_fetch_array($qq);
if($ff[id]==$fx[mid])
echo"<option value='$ff[id]' selected> $ff[fio]</option>";
else
echo"<option  value='$ff[id]' > $ff[fio]</option>";
	  
  }
  echo"</select></div>";
}
//добавление документов на этапе поиск цен
if($role=="Закупщик"   )
{
 echo"<form action='index.php' method='post' enctype='multipart/form-data' name='doc' target='_self'><img onclick=\"document.getElementsByName('myfile')[0].click()\" width='60' src='supimages/download.png'><input   style='display:none' type='file' onchange=\"document.getElementsByName('doc')[0].submit()\" name='myfile'><input type='hidden' name='split' value='$_POST[split]'><input type='hidden' name='zid' value='$f[id]'><input type='hidden' name='doaddfile' value='1'>";
 //скачать заявку закупщику 
 echo"<div style= 'width: 130px; height: 30px; background-color: #b6e820; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block;margin:5px '><div onclick=\"location.href='index.php?download=z&id=$f[id]&split=$_POST[split]' \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>Скачать заявку</div></div>";
 $dir =dirname(getcwd())."/zdocuments/".$f[id]."-".$_POST[split];
 echo"<table><tr>";
if ($handle = opendir($dir)) {
$count=1;
    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
$entry2=substr($entry,0,15)."..";
            echo "<td><a title='$entry'  href='index.php?downloadz=$count&path=$f[id]-$_POST[split]'><img width='60' src='supimages/pdf.png'></a> <br><span style='font-size:12px'>$entry2</span></td>";
        $count++;
		}
    }

   
}
  closedir($handle);
	echo"</tr></table><br><br>";
	echo"</form>";
}
//подготовка КП
if($role=="Менеджер" && $f[men]==$fio && $ff[accepted]==2)
{

  $q=mysqli_query($db,"SELECT * FROM headkp WHERE zid=$_POST[id] AND split=$_POST[split]");
  $n=mysqli_num_rows($q);
  if($n==0)
  {
  echo"<div style= 'width: 130px; height: 30px; background-color: #b6e820; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block;margin:5px; '>";
echo"<div onclick=\"prepareKp($f[id],$_POST[split]) \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>Подготовка КП</div></div>";	
  }
if($n>0)
echo"<div style= 'width: 130px; height: 30px; background-color: #b6e820; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block;margin:5px '><div onclick=\"location.href='index.php?download=kp&id=$f[id]&split=$_POST[split]' \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>Скачать КП</div></div>";	
}
//формирование документов
if($role=="Менеджер" && $f[men]==$fio && $ff[accepted]==3)
 
{

  $q=mysqli_query($db,"SELECT * FROM dstep1 WHERE zid=$_POST[id]");
  $n=mysqli_num_rows($q);
  if($n==0)
  {
  echo"<div style= 'width: 170px; height: 30px; background-color: #f3f53b; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block; margin:5px '>";
echo"<div onclick=\"prepareDstep1($f[id]) \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>ТЗ для договора</div></div>";	
  }
if($n>0)
echo"<div style= 'width: 170px; height: 30px; background-color: #b6e820; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block; margin:5px '><div onclick=\"location.href='index.php?download=document1&id=$f[id]&split=$_POST[split]' \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>ТЗ для договора</div></div>";	
}
//документ 2 
  $q=mysqli_query($db,"SELECT * FROM dstep2 WHERE zid=$_POST[id]");
  $n=mysqli_num_rows($q);
  if($n==0 && $f[men]==$fio && $ff[accepted]==3)
  {
  echo"<div style= 'width: 170px; height: 30px; background-color: #f3f53b; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block; margin:5px '>";
echo"<div onclick=\"prepareDstep2($f[id]) \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>Договор поставки</div></div>";
  }
  if($n>0  && $f[men]==$fio && $ff[accepted]==3)
{
echo"<div style= 'width: 170px; height: 30px; background-color: #b6e820; border-radius: 10px;margin:5px; top:0px;position:relative;left:10px;display:inline-block; '><div onclick=\"location.href='index.php?download=document2&id=$f[id]&split=$_POST[split]' \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>Договор поставки</div></div>";	
}
//документ 3
  $q=mysqli_query($db,"SELECT * FROM dstep3 WHERE zid=$_POST[id]");
  $n=mysqli_num_rows($q);
  if($n==0  && $f[stp]=="создание документации")
{
  echo"<div style= 'width: 170px; height: 30px; background-color: #f3f53b; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block;margin:5px '>";
echo"<div onclick=\"prepareDstep3($f[id]) \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>ТЗ спецификации</div></div>";	
  }
if($n>0  && $f[stp]=="создание документации")
{
echo"<div style= 'width: 170px; height: 30px; background-color: #b6e820; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block;margin:5px '><div onclick=\"location.href='index.php?download=document3&id=$f[id]' \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>ТЗ спецификации</div></div>";	
}
//документ 4
  $q=mysqli_query($db,"SELECT * FROM dstep4 WHERE zid=$_POST[id]");
  $n=mysqli_num_rows($q);
  if($n==0  && $f[stp]=="создание документации")
{
  echo"<div style= 'width: 180px; height: 30px; background-color: #f3f53b; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block;margin:5px  '>";
echo"<div onclick=\"prepareDstep4($f[id]) \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>ТЗ спецификации ВЭД</div></div>";	
  }
if($n>0  && $f[stp]=="создание документации")
{
echo"<div style= 'width: 180px; height: 30px; background-color: #b6e820; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block;margin:5px '><div onclick=\"location.href='index.php?download=document4&id=$f[id]' \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>ТЗ спецификации ВЭД</div></div>";	
}
//документ 5
  $q=mysqli_query($db,"SELECT * FROM dstep5 WHERE zid=$_POST[id]");
  $n=mysqli_num_rows($q);
  if($n==0  && $f[stp]=="создание документации")
{
  echo"<div style= 'width: 170px; height: 30px; background-color: #f3f53b; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block;margin:5px  '>";
echo"<div onclick=\"prepareDstep5($f[id]) \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>РФ Спецификация</div></div>";	
  }
if($n>0  && $f[stp]=="создание документации")
{
echo"<div style= 'width: 170px; height: 30px; background-color: #b6e820; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block;margin:5px'><div onclick=\"location.href='index.php?download=document5&id=$f[id]' \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>РФ Спецификация </div></div>";	
}
//документ 6
  $q=mysqli_query($db,"SELECT * FROM dstep6 WHERE zid=$_POST[id]");
  $n=mysqli_num_rows($q);
  if($n==0  && $f[stp]=="создание документации")
{
  echo"<div style= 'width: 170px; height: 30px; background-color: #f3f53b; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block;margin:5px  '>";
echo"<div onclick=\"prepareDstep6($f[id]) \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>ВЭД Спецификация</div></div>";	
  }
if($n>0  && $f[stp]=="создание документации")
{
echo"<div style= 'width: 170px; height: 30px; background-color: #b6e820; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block;margin:5px'><div onclick=\"location.href='index.php?download=document6&id=$f[id]' \" align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>ВЭД Спецификация </div></div>";	
}
 if($role=="BOO1"  || $role=="BOO2")
 {
echo"<div onclick=\"location.href='index.php?fdelzv=1&id=$f[id]'\"  style= 'width: 170px; height: 30px; background-color: #e45757; border-radius: 10px; top:0px;position:relative;left:10px;display:inline-block;margin:5px '><div align='center' style='width:100%;margin-top:5px;font-size:15px;position:absolute;cursor:pointer'>Удалить полностью</div></div>";
 }
echo"</div>";


//содержимое
echo"<br><div align='center' style= 'width: 780px; height: 100%; background-color: white; border-radius: 10px;overflow-x:hidden;margin-top:-30px'>";
 echo"<form id='idzdataForm' action='index.php' method='post' enctype='application/x-www-form-urlencoded' target='_self'>";
echo"<br><table border='0' width='700'>";
echo"<tr><td class='tHeader'>Брэнд</td><td class='tHeader'>Артикул</td><td class='tHeader'>Номенклатура</td><td class='tHeader'>Кол-во</td>";
if($role=="РОЗ" && $f[stp]=="согласование РОЗ" && $_POST["split"]=="undefined")
echo"<td class='tHeader'>Сплит</td>";
//заголовок таблицы для поиска цен
if($role=="Закупщик" && $f[stp]=="согласование РОЗ" && $_POST["split"]!="undefined"  )
{
echo"<td class='tHeader'>Цена</td><td class='tHeader'>Срок<br><input style='width:60px' type='text' onkeyup=\"setSAll($f[id],$_POST[split],this.value)\" ></td><td class='tHeader'>Валюта<br>";
echo"<select onchange=\"setMoneyAll($f[id],$_POST[split],this.value)\"  style='width:60px'     >";

echo"<option></option>";
 
echo"<option  >EUR</option><option  >USD</option><option  >TRY</option>";
 
echo"</select>";
echo"</td>";

}
//заголовок таблицы для формирование КП
if($role=="Менеджер" && $f[men]==$fio && $ff[accepted]==2)
{
echo"<td class='tHeader'>Цена</td><td class='tHeader'>Срок </td><td class='tHeader'>Валюта</td><td class='tHeader'>Сумма</td>";
 
	
}
echo"</tr>";
$colCount=4;
if($role=="РОЗ" && $f[stp]=="согласование РОЗ")
$colCount=5;
if($role=="Закупщик"  )
$colCount=5;
echo"<tr ><td colspan='$colCount'><hr></td></tr>";
 
if($_POST['split']=="undefined")
  $qq=mysqli_query($db,"SELECT * FROM zdata WHERE zid='$_POST[id]' AND spl=0");
  else
  $qq=mysqli_query($db,"SELECT * FROM zdata WHERE zid='$_POST[id]' AND spl=$_POST[split]");  
  $nn=mysqli_num_rows($qq);
  for($i=0;$i<$nn;$i++)
  {
$ff=mysqli_fetch_array($qq);

 	 
echo"<tr height='30'><td class='tText'>$ff[brn]</td><td class='tText'>$ff[art]</td><td class='tText'>$ff[nm]</td><td class='tText'>$ff[cnt]</td>";
//ручной сплит
if($role=="РОЗ" && $f[stp]=="согласование РОЗ" && $_POST["split"]=="undefined")
echo" <td class='tText'><input type='checkbox'  name='split$ff[id]'>  </td> ";
//установка цен валюты и сроков
if($role=="Закупщик" )
{
echo" <td class='tText'><input onchange='saveCen($ff[id],this.value)' type='text' style='width:60px'  name='cen$ff[id]' value='$ff[price]'>
</td><td class='tText'><input onchange='saveLng($ff[id],this.value)' type='text' id='idS$i' style='width:60px'  name='lng$ff[id]' value='$ff[lng]'>
</td><td class='tText'><select onchange='saveUnit($ff[id],this.value)' id='idMoney$i'  style='width:60px'  name='unit$ff[id]'  >";

echo"<option></option>";
if(strlen($ff[unit]) <3)
echo"<option >EUR</option><option  >USD</option><option  >TRY</option>";
if(strlen($ff[unit])>=3)
{
if($ff[unit]=="EUR")
echo"<option value='EUR' selected>EUR</option><option value='USD'  >USD</option><option  value='TRY'  >TRY</option>";
if($ff[unit]=="USD")
echo"<option value='EUR' >EUR</option><option selected  value='USD'>USD</option><option value='TRY'  >TRY</option> ";
if($ff[unit]=="TRY")
echo"<option value='EUR' >EUR</option><option   value='USD' >USD</option><option selected value='TRY' >TRY</option>";
}
echo"</select>";
echo"</td>";
}
//отображение валюты сроков и сумм в табличке для формирования КП
if($role=="Менеджер" && $f[men]==$fio && $ff[accepted]==2)
{
	echo" <td class='tText'> $ff[price]  
</td><td class='tText'> $ff[lng]  
</td><td class='tText'>$ff[unit]</td>";
$sum=$ff[price]*$ff[cnt];
$sum=round($sum,1);
echo"<td class='tText'>$sum</td>";
}
//наценка менеджер
if($role=="Менеджер" && $f[stp]=="создание КП" )
echo" <td class='tText'><input   type='text' style='width:50px'  name='cen$ff[id]' value='$ff[price]'><input onblur='saveaCen($ff[id],this.value)' type='text' style='width:50px'  name='acen$ff[id]' value='$ff[acen]'>%
</td> ";
echo"</tr>";
 
echo"<tr ><td colspan='$colCount'><hr style='border-color:#FFFFFF'></td></tr>"; 
 
  }
echo"</table>";
echo"<input type='hidden' name='doManualSplit' value='1'><input type='hidden' name='zid' value='$f[id]'></form>";
echo"</div>";
?>