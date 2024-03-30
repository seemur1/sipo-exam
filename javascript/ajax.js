//сохранить имя компании
function saveCompanyName($id,$value)
{ 
 
 
$t=Math.random();
 
var url = "ajax/saveCompanyName.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 
 var params = "id="+$id+"&value="+$value;
 xmlHttp.onreadystatechange=gsaveCompanyName;
 xmlHttp.send(params);
 
}	
function  gsaveCompanyName()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 
	}

}  



function saveComm($el)
{ 
 
 
$t=Math.random();
 
var url = "ajax/saveComm.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 
 var params = "id="+$el.parentElement.id+"&nme="+$el.innerHTML;
  xmlHttp.onreadystatechange=gsaveComm;
 xmlHttp.send(params);
 
}	
function  gsaveComm()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 
	}

}
//сохранить адрес
function saveAdrName($el,$id)
{ 
 
 
$t=Math.random();
 
var url = "ajax/saveAdrName.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 
 var params = "id="+$id+"&nme="+$el.value;
  xmlHttp.onreadystatechange=gsaveAdrName;
 
 xmlHttp.send(params);
 
}	
function  gsaveAdrName()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 
	}

}
//изменяем состояние заявки
function changeState($id,$value)
{ 
 
 
$t=Math.random();
 
var url = "ajax/changeState.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 
 var params = "id="+$id+"&value="+$value;
 xmlHttp.onreadystatechange=gchangeState;
  xmlHttp.send(params);
 if($value=="неликвидная")
 {
 openCancel($id,0);
 }
}	
function  gchangeState()
{
if (xmlHttp.readyState == 4) {
	var response = xmlHttp.responseText;
 
 openZv();
	}

}

function changeStatePartly($id,$value,$split)
{ 
 
 
$t=Math.random();
 
var url = "ajax/changeStatePartly.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 
 var params = "id="+$id+"&value="+$value+"&split="+$split;
 xmlHttp.onreadystatechange=gchangeStatePartly;
 xmlHttp.send(params);
 
}	
function  gchangeStatePartly()
{
if (xmlHttp.readyState == 4) {
	var response = xmlHttp.responseText;
 
 openZv();
	}

}
function changeStatePartly2($id,$value,$split)
{ 
 
 
$t=Math.random();
 
var url = "ajax/changeStatePartly2.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 
 var params = "id="+$id+"&value="+$value+"&split="+$split;
 xmlHttp.onreadystatechange=gchangeStatePartly2;
 xmlHttp.send(params);
 
}	
function  gchangeStatePartly2()
{
if (xmlHttp.readyState == 4) {
	var response = xmlHttp.responseText;
 
 openZv();
	}

}
function changeStatePartly3($id,$value,$split)
{ 
 
 if($value!="неликвидная")
 {
$t=Math.random();
 
var url = "ajax/changeStatePartly3.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 
 var params = "id="+$id+"&value="+$value+"&split="+$split;
 xmlHttp.onreadystatechange=gchangeStatePartly3;
 xmlHttp.send(params);
 }
 if($value=="неликвидная")
 {
 var url = "ajax/goCancel.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 
 var params = "id="+$id+"&value="+$value+"&split="+$split;
 xmlHttp.onreadystatechange=ggoCancel;
 xmlHttp.send(params);
 openCancel($id,$split);
 }
 
}	
function  gchangeStatePartly3()
{
if (xmlHttp.readyState == 4) {
	var response = xmlHttp.responseText;
 
 openZv();
	}

}
function  ggoCancel()
{
if (xmlHttp.readyState == 4) {
	var response = xmlHttp.responseText;
 
  openZv();
	}

}
//причина отказа
function openCancel($el,$split)
{ 
 
$t=Math.random();
 
var url = "ajax/openCancel.php";
 xmlHttp2.open("POST", url, true);
 xmlHttp2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$el+"&split="+$split;
 xmlHttp2.onreadystatechange=gopenCancel;
 xmlHttp2.send(params);
  
}
function  gopenCancel()
{
if (xmlHttp2.readyState == 4) {

 
	var response = xmlHttp2.responseText;
 document.getElementById("rightBar").innerHTML=response;
 doAnimate1();
	}

} 
//открыть заявку шаг 1
function openz1($el,$split)
{ 
 
$t=Math.random();
 
var url = "ajax/openz1.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$el+"&split="+$split;
 xmlHttp.onreadystatechange=gopenz1;
 xmlHttp.send(params);
 
}	
function plDblClick($el,$split)
{
 
if(event.target.id.substr(0,4)=="idpl")
{
 
openz1($el.id,$split);
doAnimate1()
}
	
}
function  gopenz1()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 document.getElementById("rightBar").innerHTML=response;
	}

}  
//вернуть сплит
function joinZ($id,$spl)
{ 
 
$t=Math.random();
 
var url = "ajax/joinZ.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$id+"&split="+$spl;
 xmlHttp.onreadystatechange=gjoinZ;
 xmlHttp.send(params);
 
}
function  gjoinZ()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 openZv();
	}

}
//автосплит
function autoSplit($id)
{ 
 
$t=Math.random();
 
var url = "ajax/autoSplit.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$id+"&message=";
 xmlHttp.onreadystatechange=gautoSplit;
 xmlHttp.send(params);
 
}	
function manualSplit($id)
{ 
 document.getElementById("idzdataForm").submit();
 
}
function  gautoSplit()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 openZv();
	}

}  
//открыть панель регистрации
 
function openRegPanel()
{ 
 
$t=Math.random();
 
var url = "ajax/openRegPanel.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id=";
 xmlHttp.onreadystatechange=gopenRegPanel;
 xmlHttp.send(params);
 
}	
function  gopenRegPanel()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
	 document.getElementById("rightBar").innerHTML=response;
 
 doAnimate2();
	}

}  
//перегурзить панель заявок
function openZv()
{
	 
var url = "ajax/wall.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id=";
 xmlHttp.onreadystatechange=gopenZv;
 xmlHttp.send(params);
}
function  gopenZv()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
	if(document.getElementById("allColumnZ")!=null)
	document.getElementById("allColumnZ").remove();
	 document.getElementById("idmain").innerHTML=	 document.getElementById("idmain").innerHTML+response;
 
	}

}
//запомнить цену
function saveCen($id,$value)
{
var url = "ajax/saveCen.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$id+"&cen="+$value;
 xmlHttp.onreadystatechange= gsaveCen;
 
 xmlHttp.send(params);
}
function  gsaveCen()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
	  
	}

}
//запомнить сроки
function saveLng($id,$value)
{
var url = "ajax/saveLng.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$id+"&lng="+$value;
 xmlHttp.onreadystatechange= gsaveLng;
 
 xmlHttp.send(params);
}
function  gsaveLng()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 
	}

}
function setMoneyAll($zid,$split,$value)
{
 
 for($i=0;$i<=1000;$i++)
 {
	
if(document.getElementById("idMoney"+$i)==null)
break;

document.getElementById("idMoney"+$i).value=$value;	 
 }
var url = "ajax/saveAllUnit.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "zid="+$zid+"&split="+$split+"&value="+$value;
 xmlHttp.onreadystatechange= gsetMoneyAll;
 
 xmlHttp.send(params);
 
}
function  gsetMoneyAll()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 
	}

}

function setSAll($zid,$split,$value)
{
 
 for($i=0;$i<=1000;$i++)
 {
	
if(document.getElementById("idS"+$i)==null)
break;

document.getElementById("idS"+$i).value=$value;	 
 }
var url = "ajax/saveAllLng.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "zid="+$zid+"&split="+$split+"&value="+$value;
 xmlHttp.onreadystatechange= gsetSAll;
 
 xmlHttp.send(params);
 
}
function  gsetSAll()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 
	}

}
//запомнить валюту
function saveUnit($id,$value)
{
var url = "ajax/saveUnit.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$id+"&unit="+$value;
 xmlHttp.onreadystatechange= gsaveUnit;
 
 xmlHttp.send(params);
}
function  gsaveUnit()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 
	}

}
//запомнить наценку
function saveaCen($id,$value)
{
var url = "ajax/saveaCen.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$id+"&acen="+$value;
 xmlHttp.onreadystatechange= gsaveaCen;
 
 xmlHttp.send(params);
}
function  gsaveaCen()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
	  
	}

}
//подготовка КП
function prepareKp($id,$split)
{ 
 
$t=Math.random();
 
var url = "ajax/prepareKp.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$id+"&split="+$split;
 xmlHttp.onreadystatechange=gprepareKp;
 xmlHttp.send(params);
 
}	
function  gprepareKp()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 document.getElementById("rightBar").innerHTML=response;
 doAnimate1();
	}

}  
 //Dstep1
 function prepareDstep1($id)
{ 
 
$t=Math.random();
 
var url = "ajax/prepareDstep1.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$id;
 xmlHttp.onreadystatechange=gprepareDstep1;
 xmlHttp.send(params);
 
}	
function  gprepareDstep1()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 document.getElementById("rightBar").innerHTML=response;
 doAnimate1();
	}

}  
 
 
  //Dstep2
 function prepareDstep2($id)
{ 
 
$t=Math.random();
 
var url = "ajax/prepareDstep2.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$id;
 xmlHttp.onreadystatechange=gprepareDstep2;
 xmlHttp.send(params);
 
}	
function  gprepareDstep2()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 document.getElementById("rightBar").innerHTML=response;
 doAnimate1();
	}

}  

 
 function prepareDstep3($id)
{ 
 
$t=Math.random();
 
var url = "ajax/prepareDstep3.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$id;
 xmlHttp.onreadystatechange=gprepareDstep3;
 xmlHttp.send(params);
 
}	
function  gprepareDstep3()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 document.getElementById("rightBar").innerHTML=response;
 doAnimate1();
	}

} 

 function prepareDstep4($id)
{ 
 
$t=Math.random();
 
var url = "ajax/prepareDstep4.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$id;
 xmlHttp.onreadystatechange=gprepareDstep4;
 xmlHttp.send(params);
 
}	
function  gprepareDstep4()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 document.getElementById("rightBar").innerHTML=response;
 doAnimate1();
	}

} 


 function prepareDstep5($id)
{ 
 
$t=Math.random();
 
var url = "ajax/prepareDstep5.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$id;
 xmlHttp.onreadystatechange=gprepareDstep5;
 xmlHttp.send(params);
 
}	
function  gprepareDstep5()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 document.getElementById("rightBar").innerHTML=response;
 doAnimate1();
	}

} 

 function prepareDstep6($id)
{ 
 
$t=Math.random();
 
var url = "ajax/prepareDstep6.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 var params = "id="+$id;
 xmlHttp.onreadystatechange=gprepareDstep6;
 xmlHttp.send(params);
 
}	
function  gprepareDstep6()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;
 document.getElementById("rightBar").innerHTML=response;
 doAnimate1();
	}

} 