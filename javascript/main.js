window.addEventListener("load", onLoad);
document.addEventListener("DOMContentLoaded", () => {
  // вставляем элемент div в конец body
 onLoad();
});
function onLoad() {
 
var queryString = window.location.search;

// Удаляем знак вопроса в начале строки
queryString = queryString.substring(1);

// Разбиваем строку по амперсандам, чтобы получить массив параметров
var params = queryString.split("&");
 
// Получаем длину массива, то есть количество параметров
var count = params.length;
if(queryString.length==0)
count=0;
 
 
 if(getCookie("login")==undefined   )
 {
 openRegPanel();	 
 }
 
if( document.getElementById("idPOSTLength").value==0 &&count== 0 && getCookie("login")!=undefined  )
openZv();
}
function fileAudioDialog()
{
 
document.getElementById("idaud").click();	
}
function goUploadXls()
{
 
document.getElementById("idXlsForm").submit();
 
}
function beginEdit1($el)
{
	 event.stopPropagation();
if($el.innerHTML=="Имя компании?")
{
$el.style.backgroundColor = "white";
$el.innerHTML="";
}
}
function fieldCompanyClick($el) {
 
 event.stopPropagation();
  }
function z1KeyDown($el) {
	 
  // Если нажата клавиша Enter
  if (event.keyCode === 13) {
    // Отменяем действие по умолчанию
    event.preventDefault();
	endEdit1($el)
    // Возвращаем false, чтобы не продолжать обработку события
    return false;
  }
}
function endEdit2($el)
{
	 
 
if($el.innerHTML=="Комментарий?" || $el.innerHTML=="")
{
	$el.innerHTML="Комментарий?";
$el.style.background= "rgba(200, 10, 28, 0.15)";
 
}
else
{
$el.style.background= "rgba(0, 0, 0, 0)";
 
saveComm($el);
}
	 event.stopPropagation();
}
function endEdit22($el,$id)
{
	 
 
 
 
saveAdrName($el,$id);
 
	 event.stopPropagation();
}
function endEdit1($el)
{
	 
 
if($el.innerHTML=="Имя компании?" || $el.innerHTML=="")
{
	$el.innerHTML="Имя компании?";
$el.style.background= "rgba(200, 10, 28, 0.15)";
 
}
else
{
$el.style.background= "rgba(0, 0, 0, 0)";
saveCompanyName($el);
}
	 event.stopPropagation();
}

function beginEdit2($el)
{
	 event.stopPropagation();
if($el.innerHTML=="Адрес?")
{
$el.style.backgroundColor = "white";
$el.innerHTML="";
}
}
function z2KeyDown($el) {
	 
  // Если нажата клавиша Enter
  if (event.keyCode === 13) {
    // Отменяем действие по умолчанию
    event.preventDefault();
	endEdit1($el)
    // Возвращаем false, чтобы не продолжать обработку события
    return false;
  }
}
function senduForm()
{
	document.getElementById("uform").submit();
}
function checkEmptyFields($fields)
{
$flagOk=true;
for($i=0;$i<$fields.length;$i++)
{
$value=$fields[$i];
 
if(document.getElementsByName($value)[0].value=="")
$flagOk=false
}

return $flagOk
}
function addCompany()
{
 var flagOk=true;
var fields= ["nme", "inn", "ogrn", "kpp", "okpo", "rs", "ks", "bik", "adr", "gdir"];
$ret=checkEmptyFields(fields);
if($ret==false)
document.getElementById("idErr").style.display="block";
else 
{
//проверим на наличие такого же inn
$t=Math.random();
var url = "ajax/checkInn.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 
 var params = "inn="+document.getElementsByName("inn")[0].value;
  xmlHttp.onreadystatechange=gcheckInn;
 
 xmlHttp.send(params);	
}

}
function  gcheckInn()
{
if (xmlHttp.readyState == 4) {

 
	var response = xmlHttp.responseText;

 if(response.length>2)
 {
	  
document.getElementById("idErr2").innerHTML="Такой ИНН уже есть у компании " + response;	 
 }
 else
 document.getElementById("uform").submit();
	}

}
function addUser()
{
 var flagOk=true;
var fields= ["fio", "email", "tel", "role", "pass" ];
$ret=checkEmptyFields(fields);
if($ret==false)
document.getElementById("idErr").style.display="block";
else 
document.getElementById("uform").submit();
}
function editUser()
{
 var flagOk=true;
var fields= ["fio", "email", "tel", "role"  ];
$ret=checkEmptyFields(fields);
if($ret==false)
document.getElementById("idErr").style.display="block";
else 
document.getElementById("uform").submit();
}
 function editCompany()
{
 var flagOk=true;
var fields= ["nme", "inn", "ogrn", "kpp", "okpo", "rs", "ks", "bik", "adr", "gdir"];
$ret=checkEmptyFields(fields);
if($ret==false)
document.getElementById("idErr").style.display="block";
else 
document.getElementById("uform").submit();
}
function addCnt()
{
$count=document.getElementById("idcount").value;
 
$count++;
 
 if($count>9)
return;
 document.getElementById("idcnt").insertAdjacentHTML("beforeend", "<br><div class='usersHeader'>Имя "+$count+" <input name='name"+$count+"' type='text' style='font-size:18px;width:200px' > Телефон "+$count+" <input name='t"+$count+"' type='text' style='font-size:18px;width:150px' ></div> ");
 
}

function addEmail()
{
$count=document.getElementById("idcount2").value;
 
$count++;
 
if($count>5)
return;
 document.getElementById("idemail").insertAdjacentHTML("beforeend","<br><div class='usersHeader'>E-mail "+$count+" <input name='email"+$count+"' type='text' style='font-size:18px;width:200px' >  </div> ");
}

function sendEnter()
{
document.getElementById("ident").submit();
}
 
function sendPrepareKp()
{
 
document.getElementById("idzdataForm").submit();
}
function sendDstep1()
{
 
document.getElementById("idzdataForm").submit();
}
function sendDstep3()
{
 
document.getElementById("idzdataForm").submit();
}

function delCompany($id)
{
if (confirm("Удаление компании. Вы уверены, что хотите продолжить?")) {
location.href='index.php?delcompany=1&selid='+$id;
} else {
 
}


}
function deleteUser($id)
{
if (confirm("Удаление пользователя. Вы уверены, что хотите продолжить?")) {
location.href='index.php?delusers=1&id='+$id+'&users=1&admin=1';
} else {
 
}


}
function setMid($id,$split)
{
 
 
$t=Math.random();
 
var url = "ajax/setMid.php";
 xmlHttp.open("POST", url, true);
 xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 
 var params = "id="+$id+"&mid="+document.getElementById("mid").value+"&split="+$split;
  xmlHttp.onreadystatechange=gsetMid;
 xmlHttp.send(params);
 
}	
function  gsetMid()
{
if (xmlHttp.readyState == 4) {

	var response = xmlHttp.responseText;
 
 
	}

}