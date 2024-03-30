<?php
function encrypt_password($password) {
  // Генерируем соль из 22 случайных символов
  $salt = substr(strtr(base64_encode(random_bytes(16)), '+', '.'), 0, 22);
  // Добавляем префикс, указывающий на алгоритм и стоимость хеширования
  $prefix = '$2y$10$';
  // Склеиваем префикс и соль
  $salt = $prefix . $salt;
  // Хешируем пароль с помощью функции password_hash
  $hash = password_hash($password, PASSWORD_BCRYPT, ['salt' => $salt]);
  // Возвращаем хеш
  return $hash;
}


if($_POST[doenter]!="")
{
	checkFirstEnter("users");
}
//добавление причины отмены
if(isset($_POST[addreason]))
{
  $qq=mysqli_query($db,"DELETE FROM rcancel WHERE zid='$_POST[zid]' AND spl='$_POST[split]' LIMIT 1 ");
    $qq=mysqli_query($db,"INSERT INTO  rcancel (data,zid,spl) VALUES('$_POST[data]','$_POST[zid]','$_POST[split]') ");
	
unset($_GET);
unset($_POST);
}
//удаление заявки
 
if($_GET[fdelzv]!="" && $login!="" && ($role=="BOO1"  || $role=="BOO2"))
{
$_GET[id]=addslashes($_GET[id]);

  $qq=mysqli_query($db,"DELETE FROM zv WHERE id='$_GET[id]' LIMIT 1 ");
    $qq=mysqli_query($db,"DELETE FROM zdata WHERE zid='$_GET[id]'   ");
unset($_GET);
unset($_POST);
 
}

//добавление документа закупщиком
if($_POST[doaddfile]=="1")
{
 $folder="zdocuments/".$_POST[zid]."-".$_POST[split];
 if(!file_exists($folder))
 mkdir($folder,0777);
 $original_name = $_FILES["myfile"]["name"];
$original_extension = pathinfo($original_name, PATHINFO_EXTENSION);

// Сформировать новое имя файла с помощью фамилии и имени из формы
$new_name = $original_name;
  // Перемещаем файл из временной папки в целевую папку с новым именем
  move_uploaded_file($_FILES['myfile']['tmp_name'],$folder."/".$new_name );
  
 unset($_GET);
 unset($_POST);
}
//удаление компании
if($_GET[delcompany]!="" && $login!="")
{
  $qq=mysqli_query($db,"DELETE FROM comp  WHERE id='$_GET[selid]' LIMIT 1 ");
  $_GET[company]=1;	
    $_GET[admin]=1;
 
}
//добавление пользователя
if($_POST[doadduser]!="")
{
 foreach ($_POST as $key => $value) {
      if (is_string($value)) {	 
        $_POST[$key] = addslashes($value);
      }	
}
$_POST[pass]=encrypt_password($_POST[pass]);
$t=fullinsert("users");
$_GET[admin]=1;
$_GET[users]=1;
}
if($_POST[doedituser]!="")
{
 foreach ($_POST as $key => $value) {
      if (is_string($value)) {	 
        $_POST[$key] = addslashes($value);
      }	
}
$_POST[pass]=encrypt_password($_POST[pass]);
$t=fullupdate("users");
$_GET[admin]=1;
$_GET[users]=1;
}
//редактирование компании
if($_POST[doeditcompany]!="")
{
 foreach ($_POST as $key => $value) {
      if (is_string($value)) {	 
        $_POST[$key] = addslashes($value);
      }	
}
for($i=1;$i<=10;$i++)
{
if($_POST["t".$i]!="" || $_POST["name".$i]!="" )
{
$_POST[cnt]=$_POST[cnt].$_POST["t".$i]."-".$_POST["name".$i].";";
}
}
for($i=1;$i<=10;$i++)
{
if($_POST["email".$i]!=""   )
{
$_POST[email]=$_POST[email].$_POST["email".$i].";";
}
}
$t=fullupdate("comp");
$_GET[admin]=1;
$_GET[company]=1;
}
//добавление компании
if($_POST[doaddcompany]!="")
{
 foreach ($_POST as $key => $value) {
      if (is_string($value)) {	 
        $_POST[$key] = addslashes($value);
      }	
}
for($i=1;$i<=10;$i++)
{
if($_POST["t".$i]!="" || $_POST["name".$i]!="" )
{
$_POST[cnt]=$_POST[cnt].$_POST["t".$i]."-".$_POST["name".$i].";";
}
}
for($i=1;$i<=10;$i++)
{
if($_POST["email".$i]!=""   )
{
$_POST[email]=$_POST[email].$_POST["email".$i].";";
}
}
$t=fullinsert("comp");
$_GET[admin]=1;
$_GET[company]=1;
}

//создание заявок из xls
if($_POST[doUploadXls]!=""  )
{
 
require_once 'PHPExcel.php';

// Создаем объект PHPexcel
$objPHPExcel = new PHPExcel();

// Открываем файл xlsx с помощью объекта-читателя
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load($_FILES["aud"]["tmp_name"]);

// Считываем значение из ячейки A1

//новая заявка
$time=time();
$time2=$time+259200;
$q=mysqli_query($db,"SELECT * FROM users WHERE id='$login'");
$f=mysqli_fetch_array($q);
$q=mysqli_query($db,"INSERT INTO zv (dl,dt,men,dlt,stp) VALUES($time2,$time,'$f[fio]','0','$zstep[0]')"); 
$zid=mysqli_insert_id($db);
 
//маппинг

for($i=0;$i<=10;$i++)
{
$value = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($i, 1)->getValue();
if($value=="Бренд / Производитель")
$col1=$i;
if($value=="Артикул №")
$col2=$i; 
if($value=="Номенклатура")
$col3=$i; 
 if($value=="Количество")
$col4=$i; 
}

$row=2;
do
{
$value1 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($col1, $row)->getValue();	
$value2 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($col2, $row)->getValue();	
$value3 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($col3, $row)->getValue();	
$value4 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($col4, $row)->getValue();	
$row++;
if($value1!="" || $value2!="" || $value3!="" || $value4!="")
$q=mysqli_query($db,"INSERT INTO zdata (brn,art,nm,cnt,zid,spl) VALUES('$value1','$value2','$value3','$value4',$zid,'0')"); 
 
}
while($value1!="" || $value2!="" || $value3!="" || $value4!="");
unset($_GET);
unset($_POST);
}
//manualSplit
if($_POST[doManualSplit]!="")
{
 
$q=mysqli_query($db,"SELECT * FROM zdata WHERE zid='$_POST[zid]' ORDER BY spl DESC");
$f=mysqli_fetch_array($q);
$spl=$f[spl];
$spl++;
$q=mysqli_query($db,"SELECT * FROM zdata WHERE zid='$_POST[zid]'"); 
$n=mysqli_num_rows($q);
for($i=0;$i<$n;$i++)
{
$f=mysqli_fetch_array($q);	
$nm="split".$f[id];
if($_POST[$nm]=="on")
{
$qq=mysqli_query($db,"UPDATE zdata SET spl=$spl WHERE id=$f[id]"); 	
}
}
 header("Location:index.php");
}

if($_POST[doPrepareKp])
{
	 foreach ($_POST as $key => $value) {
      if (is_string($value)) {	 
        $_POST[$key] = addslashes($value);
      }	
	 }
for($i=1;$i<=16;$i++)
{
$_POST[data]=$_POST[data].$_POST["p".$i].";";	
}
for($i=1;$i<=4;$i++)
{
$_POST[data2]=$_POST[data2].$_POST["pp".$i].";";	
}
$t=fullinsert("headkp");
unset($_POST);
unset($_GET);	
}
if($_POST[doPrepareDstep1])
{
	 foreach ($_POST as $key => $value) {
      if (is_string($value)) {	 
        $_POST[$key] = addslashes($value);
      }	
	 }
for($i=1;$i<=8;$i++)
{
$_POST[data]=$_POST[data].$_POST["p".$i].";";	
}
$t=fullinsert("dstep1");
unset($_POST);
unset($_GET);	
}
if($_POST[doPrepareDstep2])
{
	 foreach ($_POST as $key => $value) {
      if (is_string($value)) {	 
        $_POST[$key] = addslashes($value);
      }	
	 }
	 $i=0;
 do
 {
	 $i++;
$_POST[data]=$_POST[data].$_POST["p".$i].";";	
 }
 while(isset($_POST["p".$i]));
 
$t=fullinsert("dstep2");
unset($_POST);
unset($_GET);	
}

if($_POST[doPrepareDstep3])
{
	 foreach ($_POST as $key => $value) {
      if (is_string($value)) {	 
        $_POST[$key] = addslashes($value);
      }	
	 }
	 $i=0;
 do
 {
	 $i++;
$_POST[data]=$_POST[data].$_POST["p".$i].";";	
 }
 while(isset($_POST["p".$i]));
 
$t=fullinsert("dstep3");
unset($_POST);
unset($_GET);	
}

if($_POST[doPrepareDstep4])
{
	 foreach ($_POST as $key => $value) {
      if (is_string($value)) {	 
        $_POST[$key] = addslashes($value);
      }	
	 }
	 $i=0;
 do
 {
	 $i++;
$_POST[data]=$_POST[data].$_POST["p".$i].";";	
 }
 while(isset($_POST["p".$i]));
 
$t=fullinsert("dstep4");
unset($_POST);
unset($_GET);	
}


if($_POST[doPrepareDstep5])
{
	 foreach ($_POST as $key => $value) {
      if (is_string($value)) {	 
        $_POST[$key] = addslashes($value);
      }	
	 }
	 $i=0;
 do
 {
	 $i++;
$_POST[data]=$_POST[data].$_POST["p".$i].";";	
 }
 while(isset($_POST["p".$i]));
 
$t=fullinsert("dstep5");
unset($_POST);
unset($_GET);	
}

if($_POST[doPrepareDstep6])
{
	 foreach ($_POST as $key => $value) {
      if (is_string($value)) {	 
        $_POST[$key] = addslashes($value);
      }	
	 }
	 $i=0;
 do
 {
	 $i++;
$_POST[data]=$_POST[data].$_POST["p".$i].";";	
 }
 while(isset($_POST["p".$i]));
 
$t=fullinsert("dstep6");
unset($_POST);
unset($_GET);	
}
?>