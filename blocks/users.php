<?php



if($_GET[delusers]!="")
{
  $qq=mysqli_query($db,"DELETE FROM users  WHERE id='$_GET[id]' LIMIT 1 ");
  $_GET[users]=1;	
    $_GET[admin]=1;
 
}
if($_GET[users]==1)
{
//панель администратора
echo"<div style= 'width: 1000px; height: 760px; background-color: white; border-radius: 10px;margin:0 auto;top:80px;position:relative'>";
 
 
echo"<div style= 'width: 150px; height: 40px; background-color: #b6e820; border-radius: 10px; top:10px;position:absolute;left:10px;'>";
echo"<div onclick=\"location.href='index.php?newuser=1&admin=1'\" align='center' style='width:100%;margin-top:10px;font-size:15px'><a href='index.php?newuser=1&admin=1' style='text-decoration:none' href='index.php'>НОВЫЙ</a></div>";
echo"<br><br><div style='overflow-y:auto;height:650px;width:800px;padding-left:20px'><table width='700' >";
echo"<tr><td class='tHeader'>ФИО</td><td class='tHeader'>e-mail</td><td class='tHeader'>Телефон</td><td class='tHeader'>Выход</td><td class='tHeader'>Изменить</td><td class='tHeader'>Удалить</td></tr>";
echo"<tr ><td colspan='6'><hr></td></tr>";
  $qq=mysqli_query($db,"SELECT * FROM users WHERE email!='admin' AND email!='admin2'  ");
  $nn=mysqli_num_rows($qq);
  for($i=0;$i<$nn;$i++)
  {
$ff=mysqli_fetch_array($qq);	 
echo"<tr height='30'><td class='tText'>$ff[fio]</td><td class='tText'>$ff[email]</td><td class='tText'>$ff[tel]</td><td class='tText'>$ff[dt]</td><td align='center'><a href='index.php?editusers=1&selid=$ff[id]&admin=1'><img width='30' src='supimages/edit.png'></a></td><td align='center'><a onclick=\"deleteUser($ff[id])\"><img width='30' src='supimages/delete.png'></a></td></tr>";
echo"<tr ><td colspan='6'><hr style='border-color:#FFFFFF'></td></tr>"; 
  }
echo"</table>";
echo"</div>";



echo"</div> ";
 
echo"</div>";
}
 
if($_GET[editusers]==1)
{
$_GET[selid]=addslashes($_GET[selid]);
$q=mysqli_query($db,"SELECT * FROM users WHERE id='$_GET[selid]'");
$f=mysqli_fetch_array($q);
	echo"<form id='uform' action='index.php' method='post' enctype='multipart/form-data' name='frm' target='_self'>";
echo"<div  style= 'width: 1000px; height: auto; background-color: white; border-radius: 10px;margin:0 auto;top:120px;position:relative'>";
echo"<div style='position:absolute;right:70px;top:170px'><img width='150' src='supimages/auser.png'></div>";
echo"<div style='position:relative;left:10px;top:10px'>Редактирование пользователя
<hr style='width:95%;left:-30px;position:relative'>
 <br />";
 echo"<div id='idErr' style='color:red;font-size:20px;display:none'>Заполните поля</div>";
echo"<div class='usersHeader'>ФИО</div> 
<input name='fio' type='text' style='font-size:18px;width:300px' value='$f[fio]' >
<br /><br />
<div class='usersHeader'>e-mail</div> 
<input name='email' type='text' style='font-size:18px;width:300px' value='$f[email]' >
<br /><br />
<div class='usersHeader'>Телефон</div> 
<input name='tel' type='text' style='font-size:18px;width:300px' value='$f[tel]' >
<br />
<br /> 
<div class='usersHeader'>Выход на работу</div> 
<input name='dt' type='date' style='font-size:18px;width:300px'  value='$f[date]'>
<br />
<br /> 
<div class='usersHeader'>Роль в системе</div> ";

 
echo"<select  style='font-size:18px;' name='role'> ";

for($i=0;$i<count($urole);$i++)
{
	if($urole[$i]!="Бухгалтер" &&  $urole[$i]!="Юрист" )
	{
if($f[role]==$urole[$i])
echo"<option selected>$urole[$i]</option>";	
else
echo"<option  >$urole[$i]</option>";	
	}
}
echo"</select>
<br /><br />";
echo"<div class='usersHeader'>Пароль</div> 
<input name='pass' type='text' style='font-size:18px;width:300px' >";
echo"<br /><br />
 <input onclick='editUser()' style='font-size:18px' type='button' value='Обновить'> 
</div>";
echo"<input type='hidden' name='selid' value='$_GET[selid]'><input type='hidden' name='doedituser' value='1'><br />
<br />
";
echo"</form>";
 	
}
//новый пользователь
if($_GET[newuser]==1)
{
	echo"<form id='uform' action='index.php' method='post' enctype='multipart/form-data' name='frm' target='_self'>";
echo"<div  style= 'width: 1000px; height: auto; background-color: white; border-radius: 10px;margin:0 auto;top:120px;position:relative'>";
echo"<div style='position:absolute;right:70px;top:170px'><img width='150' src='supimages/auser.png'></div>";
echo"<div style='position:relative;left:10px;top:10px'>Новый пользователь
<hr style='width:95%;left:-30px;position:relative'>
 <br />
";
 echo"<div id='idErr' style='color:red;font-size:20px;display:none'>Заполните поля</div>";
echo"<div class='usersHeader'>ФИО</div> 
<input name='fio' type='text' style='font-size:18px;width:300px' >
<br /><br />
<div class='usersHeader'>e-mail</div> 
<input name='email' type='text' style='font-size:18px;width:300px' >
<br /><br />
<div class='usersHeader'>Телефон</div> 
<input name='tel' type='text' style='font-size:18px;width:300px' >
<br />
<br /> 
<div class='usersHeader'>Выход на работу</div> 
<input name='dt' type='date' style='font-size:18px;width:300px' >
<br />
<br /> 
<div class='usersHeader'>Роль в системе</div> ";

 
echo"<select  style='font-size:18px;' name='role'> ";

for($i=0;$i<count($urole);$i++)
{
	if($urole[$i]!="Бухгалтер" &&  $urole[$i]!="Юрист" )
echo"<option>$urole[$i]</option>";	
}
echo"</select>
<br /><br />";
echo"<div class='usersHeader'>Пароль</div> 
<input name='pass' type='text' style='font-size:18px;width:300px' >";
echo"<br /><br />
 <input onclick='addUser()' style='font-size:18px' type='button' value='Добавить'> 
</div>";
echo"<input type='hidden' name='doadduser' value='1'><br />
<br />
";
echo"</form>";
 	
}
?>