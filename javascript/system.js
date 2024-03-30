  window.onerror = function (msg, url, line) {
               alert("Message : " + msg );
               alert("url : " + url );
               alert("Line number : " + line );
            }
		
function animate1() {
 
  // Получаем текущее значение right
 var right = parseInt(document.getElementById("rightBar").style.right);
  // Если right меньше нуля, то увеличиваем его на 5 пикселей
  if (right < -20) {
    document.getElementById("rightBar").style.right = (right + 15) + 'px';
  } else {
    // Иначе останавливаем интервал
    clearInterval(intervalId);
  }
}
function animate2() {
 
 
  // Получаем текущее значение right
 var right = parseInt(document.getElementById("rightBar").style.right);
  // Если right меньше нуля, то увеличиваем его на 5 пикселей
  if (right < window.innerWidth/2-420) {
    document.getElementById("rightBar").style.right = (right + 15) + 'px';
  } else {
    // Иначе останавливаем интервал
    clearInterval(intervalId);
  }
}
function doAnimate1()
{

	// Запускаем интервал с функцией анимации каждые 20 миллисекунд
intervalId = setInterval(animate1, 10);
}
function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function doAnimate2()
{

	// Запускаем интервал с функцией анимации каждые 20 миллисекунд
intervalId = setInterval(animate2, 10);
}
function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
 function createXMLHttp() {
        if(typeof XMLHttpRequest != "undefined") { // для браузеров аля Mozilla
         
          return new XMLHttpRequest();
        } else if(window.ActiveXObject) { // для Internet Explorer (all versions)
          var aVersions = ["MSXML2.XMLHttp.5.0", "MSXML2.XMLHttp.4.0",
                   "MSXML2.XMLHttp.3.0", "MSXML2.XMLHttp",
                   "Microsoft.XMLHttp"
                   ];
          for (var i = 0; i < aVersions.length; i++) {
            try { //
              var oXmlHttp = new ActiveXObject(aVersions[i]);
           
              return oXmlHttp;
            } catch (oError) {
              /* поскольку это элемент управления ActiveX, любая ошибка создания объекта будет
                возбуждать исключительную ситуацию, а это означает что попытки создания
                объекта необходимо предпринимать внутри конструкции try...catch.
                
                 В данном случае, если обнаружена ошибка, мы
                 ничего не делаем, создать объект с данной версией компонента не удалось.
               */
            }
          }
          throw new Error("Невозможно создать объект XMLHttp.");
        }
      }
   
     var xmlHttp = createXMLHttp();
	      var xmlHttp2 = createXMLHttp();
	 function closeAll()
	 {
 if(event.target.id!="idmain" && (event.target.id!="allColumnZ" && event.target.parentElement.id!="allColumnZ" && event.target.parentElement.parentElement.id!="allColumnZ")  )
 return;
if(document.getElementById("rightBar")!=null)
{
document.getElementById("rightBar").style.right="-800px";

}
	 }