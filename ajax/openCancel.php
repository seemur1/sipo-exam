<?php
  ini_set('display_errors',0);
  include("../connect.php");
  	    include("../functions/auth.php");
		checkEnter("users");
  $_POST[id]=str_replace("idpl","",$_POST[id]);
 echo"<div align='center' style= 'width: 780px; height: 400px; background-color: white; border-radius: 10px;'>";
 echo"<br><br>Причина отказа<br><br>";
echo" <form action='index.php' method='post' enctype='application/x-www-form-urlencoded' name='slf' target='_self'><input type='hidden' name='split' value='$_POST[split]'><input type='hidden' name='zid' value='$_POST[id]'><input type='hidden' name='addreason' value='1'><textarea name='data' cols=70 rows=10></textarea><br><br><input type='submit' value='Сохранить' style='font-size:24px'></form>";
 
 echo"</div>";
 
  ?>