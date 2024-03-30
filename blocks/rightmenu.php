<?php
 echo"<div class='rightmenu'>";
  if($role=="Менеджер" || "РОП" )
 {
 echo"<br><img  title='Импорт заявки'  onclick='fileAudioDialog()' width='55' src='supimages/mnr1.png'>";
 }
 if($role=="BOO1" ||$role=="BOO2" ||$role=="Менеджер")
 {
  echo"<br><br><a href='index.php?admin=1'><img title='Администрирование'  width='51' src='supimages/mnr2.png'></a>";
   }
    if($login!=""  ) 
   echo" <br><br><a href='index.php?analytic=1'><img title='Аналитика'  width='51' src='supimages/an.png'></a>";
      echo" <br><br><a href='index.php?cancel=1'><img title='Отмененные'  width='51' src='supimages/rej.png'></a>";
   echo" <br><br><a href='index.php'><img title='На главную'  width='51' src='supimages/home.png'></a>";
echo" <form id='idXlsForm' action='index.php' method='post' enctype='multipart/form-data' target='upload_target'  >
  <input id='idaud'  onchange='goUploadXls()' style='display:none' name='aud' type='file' />
<input type='hidden' name='doUploadXls' value='1'></form>"; 
 echo"</div> ";

 
?>