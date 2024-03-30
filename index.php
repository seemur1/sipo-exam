<?php
; 
ini_set('display_errors',0);
include("connect.php");
include("functions/auth.php");

		 checkEnter("users");
		   include ("functions/fullupdate.php");
		  include ("functions/fullinsert.php");	
$urole[0]="BOO1";
$urole[1]="BOO2";
$urole[2]="Бухгалтер";
$urole[3]="Закупщик";
$urole[4]="Менеджер";
$urole[5]="Проверяющий КП";
$urole[6]="РОЗ";
$urole[7]="РОП";
$urole[8]="Юрист";

$zstep[0]="формирование заявки";
$zstep[1]="согласование РОЗ";
$zstep[2]="поиск цен"; 
$zstep[3]="создание КП"; 
$zstep[4]="создание документации"; 
  
		   include("functions/handlers.php");
		    
		  	 
	

   include("functions/downloads.php");
	
		



 $lengthPOST = count ($_POST);
 $lengthGET=count ($_GET);
echo"<input type='hidden' id='idPOSTLength' value='$lengthPOST'>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRM</title>
</head>

  <?php
 
  echo"<style>";

  include("styles/style.css");
 echo"</style>";
 $t=rand(1,221111113);
echo" <script src='javascript/main.js?t=$t'></script>";
 $t=rand(1,221111113);
echo" <script src='javascript/system.js?t=$t'></script>";
 $t=rand(1,211111213);
echo" <script src='javascript/ajax.js?t=$t'></script>";
  ?>
   
<body style="margin:0;overflow-y:hidden;overflow-x:hidden;font-family:Verdana, Geneva, sans-serif">
<?php

if($lengthPOST==0 && $lengthGET==0)
$flex="display:flex";
else
$flex="";
 echo"<div id='idmain' onclick='closeAll()' style='$flex' class='mainfone'> ";
 include ("blocks/upmenu.php");
  include ("blocks/rightmenu.php");

     include ("blocks/titleBar.php");
 
 
   include ("blocks/users.php");
      include ("blocks/company.php");
	 
   include ("blocks/rightPanel.php");

 
 
?>
</body>
</html>
