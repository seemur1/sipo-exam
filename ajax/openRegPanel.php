<?php
echo"<div style= 'width: 780px; height: 700px; background-color: white; border-radius: 10px;top:100px;position:absolute'>";
echo"<br><div align='center' style='font-size:24px'>Вход в систему</div><hr>";
echo"<br><br><form  id='ident' align='center' style='font-size:22px' action='index.php' method='post' enctype='application/x-www-form-urlencoded' name='ent' target='self'>";
echo"<table border='0' align='center'>";
echo"<tr><td>E-mail:</td><td> <input  style='font-size:22px'  type='text' name='login'></td></tr>";
echo"<tr height='20'><td></td><td></td></tr>";
echo"<tr><td>Пароль:</td><td><input  style='font-size:22px'  type='pass' name='pass'></td></tr>";
echo"</table>";
echo"<br><input onclick='sendEnter()' style='font-size:24px'  type='button' value='Вход' name='ent'><input type='hidden' name='doenter' value='1'>";
echo"</form>";
echo"</div>";
?>