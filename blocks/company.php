<?php

if($_GET[editcompany]=="1")
{
echo"<form id='uform' action='index.php' method='post' enctype='multipart/form-data' name='frm' target='_self'>";
echo"<div  style= 'width: 1000px;   height:700px;max-height:800px;overflow-y:auto;overflow-x:hidden;  background-color: white; border-radius: 10px;margin:0 auto;top:80px;position:relative'>";
$_GET[selid]=addslashes($_GET[selid]);
$q=mysqli_query($db,"SELECT * FROM comp WHERE id='$_GET[selid]'");
$f=mysqli_fetch_array($q);
 
echo"<div style='position:relative;left:10px;top:10px'>Редактирование компании 
























<hr style='width:95%;left:-30px;position:relative'>
 <br />";
 echo"<table>";
 echo"<tr><td class='usersHeader'>
 Название компании:</td><td>
 
<input name='nme' type='text' style='font-size:18px;width:300px' value=\"$f[nme]
\" ></td></tr>";
 echo"<div id='idErr' style='color:red;font-size:20px;display:none'>Заполните поля</div>";

 echo"<tr><td class='usersHeader'>
 ИНН:</td><td>
<input name='inn' type='text' style='font-size:18px;width:300px' value=\"$f[inn]\" ></td></tr>";
 echo"<tr><td class='usersHeader'>
ОГРН:</td><td>
<input name='ogrn' type='text' style='font-size:18px;width:300px' value=\"$f[ogrn]\" ></td></tr>";
 echo"<tr><td class='usersHeader'>
КПП:</td><td>
<input name='kpp' type='text' style='font-size:18px;width:300px' value=\"$f[kpp]\" ></td></tr>";
 echo"<tr><td class='usersHeader'>
ОКПО:</td><td>
<input name='okpo' type='text' style='font-size:18px;width:300px' value=\"$f[okpo]\" ></td></tr>";
 echo"<tr><td class='usersHeader'>
р/c:</td><td>
<input name='rs' type='text' style='font-size:18px;width:300px'  value=\"$f[rs]\"></td></tr>";
 echo"<tr><td class='usersHeader'>
к/c:</td><td>
<input name='ks' type='text' style='font-size:18px;width:300px' value=\"$f[ks]\" ></td></tr>";
echo"<tr><td class='usersHeader'>
БИК:</td><td>
<input name='bik' type='text' style='font-size:18px;width:300px' value=\"$f[bik]\" ></td></tr>";
echo"<tr><td class='usersHeader'>
Адрес:</td><td>
<input name='adr' type='text' style='font-size:18px;width:300px'value=\"$f[adr]\" ></td></tr>";
 echo"<tr><td class='usersHeader'>
Гендир:</td><td>
<input name='gdir' type='text' style='font-size:18px;width:300px' value=\"$f[gdir]\" ></td></tr>";
echo"</table>"; 
 echo"<div id='idcnt'>";
$tmp=explode(";",$f[cnt]);
if(count($tmp)==1)
{
echo"<div class='usersHeader'>Имя 1 <input name='name1' type='text' style='font-size:18px;width:200px' > Телефон 1 <input  name='t1' type='text' style='font-size:18px;width:150px' ></div> ";
}
else
{
for($i=1;$i<count($tmp);$i++	)
{
$tmp2=explode("-",$tmp[$i-1]);	
echo"<div class='usersHeader'>Имя $i <input name='name$i' type='text' style='font-size:18px;width:200px' value='$tmp2[0]'> Телефон $i <input  name='t$i' type='text' style='font-size:18px;width:150px'  value='$tmp2[1]' ></div> ";	
}
}
echo"</div>";
echo"<img onclick='addCnt()' width='45' src='supimages/add.png'>";
$tmp=explode(";",$f[email]);
echo"<div id='idemail'>";
 for($i=1;$i<count($tmp);$i++	)
{
	$value=$tmp[$i-1];
echo"<div class='usersHeader'>E-mail $i <input name='email1' type='text' style='font-size:18px;width:200px' value='$value' > </div>";
}
echo"</div>

<img onclick='addEmail()' width='45' src='supimages/add.png'>
 <br /><br />
 
 
 <div class='usersHeader'>Комментарий:</div>
 <textarea name='comm' cols=110 rows=5>$f[comm]</textarea>
 <br><br><input onclick='editCompany()' style='font-size:18px' type='button' value='Обновить'> 
";
echo"<input type='hidden' name='selid' value='$_GET[selid]'><input type='hidden' name='doeditcompany' value='1'><br />
<br />
";
echo"</form>";
echo"<input type='hidden' id='idcount' value='1'>";
echo"<input type='hidden' id='idcount2' value='1'>";
}
if($_GET[company]==1)
{
//панель администратора
echo"<div style= 'width: 1000px; height: 760px; background-color: white; border-radius: 10px;margin:0 auto;top:80px;position:relative'>";
 
 
echo"<div style= 'width: 150px; height: 40px; background-color: #b6e820; border-radius: 10px; top:10px;position:absolute;left:10px;'>";
echo"<div onclick=\"location.href='index.php?newcompany=1&admin=1'\" align='center' style='width:100%;margin-top:10px;font-size:15px'><a href='index.php?newcompany=1&admin=1' style='text-decoration:none' href='index.php'>НОВАЯ</a></div>";
echo"<br><br><div style='overflow-y:auto;height:650px;width:800px;padding-left:20px'><table width='700' >";
echo"<tr><td class='tHeader'>Название</td><td class='tHeader'>ИНН</td><td class='tHeader'>Изменить</td><td class='tHeader'>Удалить</td> </tr>";
echo"<tr ><td colspan='5'><hr></td></tr>";
  $qq=mysqli_query($db,"SELECT * FROM comp ");
  $nn=mysqli_num_rows($qq);
  for($i=0;$i<$nn;$i++)
  {
$ff=mysqli_fetch_array($qq);	 
echo"<tr height='30'><td class='tText'>$ff[nme]</td><td class='tText'>$ff[inn]</td><td align='center' class='tText'><a href='index.php?editcompany=1&selid=$ff[id]&admin=1'><img width='40' src='supimages/edit.png'></a></td> <td align='center' class='tText'><a onclick=\"delCompany($ff[id])\"  ><img width='40' src='supimages/delete.png'></a></td> </tr>";
echo"<tr ><td colspan='5'><hr style='border-color:#FFFFFF'></td></tr>"; 
  }
echo"</table>";
echo"</div>";



echo"</div> ";
 
echo"</div>";
}
 
if($_GET[newcompany]==1)
{
	echo"<form id='uform' action='index.php' method='post' enctype='multipart/form-data' name='frm' target='_self'>";
echo"<div  style= 'width: 1000px;   height:700px;max-height:800px;overflow-y:auto;overflow-x:hidden;  background-color: white; border-radius: 10px;margin:0 auto;top:80px;position:relative'>";
 
echo"<div style='position:relative;left:10px;top:10px'>Новая компания
<hr style='width:95%;left:-30px;position:relative'>
 <br />";
 echo"<div id='idErr' style='color:red;font-size:20px;display:none'>Заполните поля</div>";
   echo"<div id='idErr2' style='color:red;font-size:20px; '> </div>";
 echo"<table>";
 echo"<tr><td class='usersHeader'>
 Название компании:</td><td>
<input name='nme' type='text' style='font-size:18px;width:300px' ></td></tr>";
 echo"<tr><td class='usersHeader'>
 ИНН:</td><td>
<input name='inn' type='text' style='font-size:18px;width:300px' ></td></tr>";
 echo"<tr><td class='usersHeader'>
ОГРН:</td><td>
<input name='ogrn' type='text' style='font-size:18px;width:300px' ></td></tr>";
 echo"<tr><td class='usersHeader'>
КПП:</td><td>
<input name='kpp' type='text' style='font-size:18px;width:300px' ></td></tr>";
 echo"<tr><td class='usersHeader'>
ОКПО:</td><td>
<input name='okpo' type='text' style='font-size:18px;width:300px' ></td></tr>";
 echo"<tr><td class='usersHeader'>
р/c:</td><td>
<input name='rs' type='text' style='font-size:18px;width:300px' ></td></tr>";
 echo"<tr><td class='usersHeader'>
к/c:</td><td>
<input name='ks' type='text' style='font-size:18px;width:300px' ></td></tr>";
echo"<tr><td class='usersHeader'>
БИК:</td><td>
<input name='bik' type='text' style='font-size:18px;width:300px' ></td></tr>";
echo"<tr><td class='usersHeader'>
Адрес:</td><td>
<input name='adr' type='text' style='font-size:18px;width:300px' ></td></tr>";
 echo"<tr><td class='usersHeader'>
Гендир:</td><td>
<input name='gdir' type='text' style='font-size:18px;width:300px' ></td></tr>";
echo"</table>"; 
 
 
echo"<div id='idcnt'><div class='usersHeader'>Имя 1 <input name='name1' type='text' style='font-size:18px;width:200px' > Телефон 1 <input  name='t1' type='text' style='font-size:18px;width:150px' ></div> 
</div>
<img onclick='addCnt()' width='45' src='supimages/add.png'>
 
<div id='idemail'><div class='usersHeader'>E-mail 1 <input name='email1' type='text' style='font-size:18px;width:200px' > 
</div></div>
<img onclick='addEmail()' width='45' src='supimages/add.png'>
 <br /><br />
 
 
 <div class='usersHeader'>Комментарий:</div>
 <textarea name='comm' cols=110 rows=5></textarea>
 <br><br><input onclick='addCompany()' style='font-size:18px' type='button' value='Добавить'> 
";
echo"<input type='hidden' name='doaddcompany' value='1'><br />
<br />
";
echo"</form>";
 	
}
?>