<?php
  ini_set('display_errors',0);
  include("../connect.php");
 
     include ("../functions/auth.php");
	 
	 checkEnter("users");
	   include ("../functions/zstep.php");
     include ("../functions/renderFace.php");

echo"<div id='allColumnZ' onclick='closeAll()' style='position:relative;display:flex;top:50px;height:700px'>";
//на согласование
   echo" <div align='center'  style= 'width:280px; height: 40px;  top:40px;margin-left:20px;position:relative;display:inline-block'><div  style= 'width:280px; height: 40px; background: rgba(255,0,254,0.4); border-radius: 10px; top:70px;'>";
 echo"<div align='center' style='color:#FFFFFF;top:9px;position:absolute;width:100%'>НЕРАЗОБРАННЫЕ</div>";
echo"</div>";
 
if($role=="Менеджер" || $role=="РОП")
{

//неразобранные для менеджера	
include("../functions/face/plm.php");
}

echo"</div>";
//согласование
   echo" <div align='center'  style= 'width:280px; height: 40px;  top:40px;margin-left:10px;position:relative;display:inline-block'><div  style= 'width:280px; height: 40px; background: rgba(4,255,255,0.4); border-radius: 10px; top:70px;'>";
 echo"<div align='center' style='color:#FFFFFF;top:9px;position:absolute;width:100%'>СОГЛАСОВАНИЕ</div>";
echo"</div>";

//if($role=="РОЗ")
//{
 
//согласование РОЗ для менеджера	
include("../functions/face/plm2.php");
//}

echo"</div>";
//по брендам

 echo" <div align='center'  style= 'width:280px; height: 40px;  top:40px;margin-left:10px;position:relative;display:inline-block;'><div  style= 'width:280px; height: 40px; background: rgba(4,255,255,0.4); border-radius: 10px; top:70px;'>";
 echo"<div align='center' style='color:#FFFFFF;top:9px;position:absolute;width:100%'>ПО  БРЕНДАМ</div>";
echo"</div>";
 echo"<div style='height:750px;overflow-x:hidden;overflow-y:auto'>";
if($role=="РОЗ")
{
//согласование РОЗ для менеджера	
include("../functions/face/bybrend.php");
}
 echo"</div>";

echo"</div>";	

// колонка поиск цен
echo" <div align='center'  style= 'width:280px; height: 40px;  top:40px;margin-left:10px;position:relative;display:inline-block;'><div  style= 'width:280px; height: 40px; background: rgba(4,255,255,0.4); border-radius: 10px; top:70px;'>";
 echo"<div align='center' style='color:#FFFFFF;top:9px;position:absolute;width:100%'>ПОИСК ЦЕН</div>";
echo"</div>";
 echo"<div style='height:750px;overflow-x:hidden;overflow-y:auto'>";
// if($role=="Закупщик")
//{
include("../functions/face/search.php");
//}
 echo"</div>";



echo"</div>";
//колонка создандие КП
echo" <div align='center'  style= 'width:280px; height: 40px;  top:40px;margin-left:10px;position:relative;display:inline-block;'><div  style= 'width:280px; height: 40px; background: rgba(4,255,255,0.4); border-radius: 10px; top:70px;'>";
 echo"<div align='center' style='color:#FFFFFF;top:9px;position:absolute;width:100%'>СОЗДАНИЕ КП</div>";
echo"</div>";
 echo"<div style='height:750px;overflow-x:hidden;overflow-y:auto'>";
 
include("../functions/face/createkp.php");
 echo"</div>";
echo"</div>";
//формирование документации
echo" <div align='center'  style= 'width:300px; height: 40px;  top:40px;margin-left:10px;position:relative;display:inline-block;'><div  style= 'width:300px; height: 40px; background: rgba(4,255,255,0.4); border-radius: 10px; top:70px;'>";
 echo"<div align='center' style='color:#FFFFFF;top:9px;position:absolute;width:100%'>ФОРМИРОВАНИЕ ДОКУМЕНТАЦИИ</div>";
echo"</div>";
 echo"<div style='height:750px;overflow-x:hidden;overflow-y:auto'>";
 
include("../functions/face/formd.php");
 echo"</div>";
echo"</div>";

 
?>