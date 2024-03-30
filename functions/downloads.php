<?php
$cnt["adress1"] = "109428, Москва г, вн.тер.г. 
муниципальный округ Рязанский, пр-кт Рязанский, д. 22, к. 2, помещ. 1/1/";
$cnt["inn1"] = "0242013464";
$cnt["kpp1"] = "772101001";
$cnt["ogrn1"] = "1210200033130";
$cnt["okpo1"] = "49243352";
$cnt["rs1"] = "440702810600000053872
в ГАЗПРОМБАНК (АО) (Россия)
";
$cnt["ename1"]="MASTER BEARING, LIMITED LIABILITY COMPANY";
$cnt["ks1"] = "30101810200000000823";
$cnt["bik1"] = "044525823";
$cnt["dir1"]="Григорьев С.В.";
$cnt["dirp1"]="Григорьева Сергея Витальевича";
$cnt["edir1"]="Grigoryev S.V.";

$cnt["adress2"] = "09428, г. Москва, вн.тер.г. муниципальный округ Рязанский, проспект. Рязанский, д. 22, к. 2, помещ. 1/1";
$cnt["inn2"] = "7704439774";
$cnt["kpp2"] = "772101001";
$cnt["ogrn2"] = "1177746821141";
$cnt["okpo2"] = "19032304";
$cnt["rs2"] = "40702840380310807994
ПАО 'АК БАРС' БАНК
";
$cnt["ks2"] = "30101810000000000805 ";
$cnt["bik2"] = "049205805";
$cnt["dir2"]="Григорьев Сергей Витальевич";
$cnt["dirp2"]="Григорьева Сергея Витальевича";

$firmnew["pname1"]="EURO ASIA SUPPORT İÇ VE DIŞ TİCARET ANONİM ŞİRKETİ";
$firmnew["dir1"]="Гекхан Улуышик";
$firmnew["tdir1"]="Gökhan Uluyşik";
if($_GET["downloadz"]!="")
{
	 $dir =getcwd()."/zdocuments/".$_GET[path];
 
 
if ($handle = opendir($dir)) {
$count=1;
    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
if($count==$_GET[downloadz])
{
 
 
 downloadFile("zdocuments/".$_GET[path]."/".$entry,$entry);		
}
 
        $count++;
		}
    }

    closedir($handle);
	echo"</form>";
}

}
if($_GET['download']=="document1")
{
if (!is_dir("documents/".$login)) {
  mkdir("documents/".$login);
}
unlink("documents/".$login."/tmp.docx");
createDstep1($_GET[id],"documents/".$login); 
 downloadFile("documents/".$login."/tmp.docx","tmp.docx");
}
if($_GET['download']=="document2")
{
if (!is_dir("documents/".$login)) {
  mkdir("documents/".$login);
}
unlink("documents/".$login."/tmp.docx");
createDstep2($_GET[id],"documents/".$login); 
 downloadFile("documents/".$login."/tmp.docx","tmp.docx");
}
if($_GET['download']=="document3")
{
if (!is_dir("documents/".$login)) {
  mkdir("documents/".$login);
}
unlink("documents/".$login."/tmp.xlsx");
createDstep3($_GET[id],"documents/".$login); 
 downloadFile("documents/".$login."/tmp.xlsx","tmp.xlsx");
}
if($_GET['download']=="document4")
{
if (!is_dir("documents/".$login)) {
  mkdir("documents/".$login);
}
unlink("documents/".$login."/tmp.xlsx");
createDstep4($_GET[id],"documents/".$login); 
 downloadFile("documents/".$login."/tmp.xlsx","tmp.xlsx");
}
if($_GET['download']=="document5")
{
if (!is_dir("documents/".$login)) {
  mkdir("documents/".$login);
}
unlink("documents/".$login."/tmp.docx");
createDstep5($_GET[id],"documents/".$login); 
 downloadFile("documents/".$login."/tmp.docx","tmp.docx");
}
if($_GET['download']=="document6")
{
if (!is_dir("documents/".$login)) {
  mkdir("documents/".$login);
}
unlink("documents/".$login."/tmp.docx");
createDstep6($_GET[id],"documents/".$login); 
 downloadFile("documents/".$login."/tmp.docx","tmp.docx");
}
if($_GET[download]=="kp")
{
 
// Проверяем, существует ли папка
if (!is_dir("documents/".$login)) {
  // Если папки нет, пытаемся создать ее
  mkdir("documents/".$login);
}
unlink("documents/".$login."/tmp.docx");
createKp($_GET[id],"documents/".$login,$_GET[split]);
//sleep(3);
 downloadFile("documents/".$login."/tmp.docx","tmp.docx");
}
if($_GET[download]=="z")
{
if (!is_dir("documents/".$login)) {
  mkdir("documents/".$login);
}
unlink("documents/".$login."/tmp.xlsx");
createZ($_GET[id],"documents/".$login,$_GET[split]); 
 downloadFile("documents/".$login."/tmp.xlsx","tmp.xlsx");;
}
//Dstep6-----------------------------------------------
function createDstep6($id,$patch)
{
global $db,$cnt,$firmnew;
	require_once 'PHPWord-master/vendor/autoload.php';
 // Создаем объект класса PhpWord
$phpWord = new \PhpOffice\PhpWord\PhpWord();
 
// Создаем новую секцию в документе
$section = $phpWord->addSection();
// Открываем существующий документ с меткой ${table}
$document = new \PhpOffice\PhpWord\TemplateProcessor("documents/templates/dstep6.docx");

 
$q=mysqli_query($db,"SELECT *  FROM dstep6 WHERE zid=$id ");
$f=mysqli_fetch_array($q);
$tmp=explode(";",$f[data]);
//номер договора из второго документа
 $q=mysqli_query($db,"SELECT *  FROM dstep2 WHERE zid=$id ");
$f=mysqli_fetch_array($q);
$tmp2=explode(";",$f[data]);
 $document->setValue("from2",$tmp2[0]); 
//дата из второго документа
  $document->setValue("date2",$tmp2[1]); 
// фирма2
  $document->setValue("firm2",$tmp2[2]); 
//firmnew
 $q=mysqli_query($db,"SELECT *  FROM dstep6 WHERE zid=$id ");
$f=mysqli_fetch_array($q);
$tmp6=explode(";",$f[data]);
 
if($tmp6[0]=="EURO ASIA SUPPORT DOMESTIC AND FOREIGN TRADE INCORPORATED COMPANY")
{
$d=1;
}
  $document->setValue("firmnew",$firmnew["pname".$d]); 
$document->setValue("efirmnew",$firmnew["epname".$d]);
 //директор 2
	 if($tmp2[2]=="ООО 'Мастер бэринг'")
{

$os="kp";
$d="1";	
}
if($tmp2[2]=="ООО 'ЦМТО1'")
{
$os="kp";
$d="2";	
}
  $document->setValue("efirm2",$cnt["ename".$d]);  
    $document->setValue("dir",$cnt["dir".$d]); 
	   $document->setValue("edir",$cnt["edir".$d]); 
//турецкий директор
    $document->setValue("newdir",$firmnew["dir".$d]); 
	    $document->setValue("enewdir",$firmnew["tdir".$d]); 
		
//таблица
// таблица
	$tableStyle = array(
    'borderColor' => '000000', // Цвет границы - черный
    'borderSize'  => 6, // Толщина границы - 6 пунктов
	'align' => 'center',
);
	// Добавляем таблицу в секцию с заданным стилем
$table = $section->addTable($tableStyle);

// Добавляем первую строку в таблицу
$row = $table->addRow(300);

// Добавляем первую ячейку в строку с текстом "Hello"
$cell = $row->addCell();
$cell->addText("Наименование");
$cell = $row->addCell();
$cell->addText("Производитель");
$cell = $row->addCell();
$cell->addText("кол-во, щт");
$cell = $row->addCell();
$cell->addText("Цена за ед,");
$cell = $row->addCell();
$cell->addText("Стоимость,");
 
$cell = $row->addCell();
$cell->addText("Валюта,"); 
 

//загрузим данные
$q=mysqli_query($db,"SELECT *  FROM zdata WHERE zid=$_GET[id] ");
$n=mysqli_num_rows($q);

$fullprice=0;
$fullcnt=0;

//получим валюту из 4
 $q4=mysqli_query($db,"SELECT *  FROM dstep4 WHERE zid=$id ");
$f4=mysqli_fetch_array($q4);
$tmp4=explode(";",$f4[data]);
	    $document->setValue("val4",$tmp4[0]); 
for($i=0;$i<$n;$i++)
{
$f=mysqli_fetch_array($q);
 $row = $table->addRow(300);

 
$cell = $row->addCell(4000,['valign' => 'center']);
$cell->addText($f[nm], ['size' => 9]);
 
$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText($f[brn], ['size' => 9]);
 
$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText($f[cnt], ['size' => 9]);

$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText($f[price], ['size' => 9]);

$cell = $row->addCell(2000,['valign' => 'center']);
$full=$f[price]*$f[cnt];

$fullprice=$fullprice+floatval($full);
$fullcnt=$fullcnt+intval($f[cnt]);
$cell->addText($full, ['size' => 9]);
 
 $cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText($tmp4[0], ['size' => 9]); 	
}
 
 $row = $table->addRow(300);
$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText("ИТОГО", ['size' => 9, 'bold' => true]); 

$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText("", ['size' => 9]); 

$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText($fullcnt, ['size' => 9]); 

$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText("------", ['size' => 9]); 

$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText($fullprice, ['size' => 9]); 


 

 
 
// Создаем объект Writer для преобразования документа в XML-код
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

// Получаем весь XML-код документа
$fullxml = $objWriter->getWriterPart('Document')->write();

// Получаем только XML-код таблицы
$tablexml = preg_replace('/^[\s\S]*(<w:tbl\b.*<\/w:tbl>).*/', '$1', $fullxml);

 

 
//общая цена
$document->setValue("sum",$fullprice." EUR");	
$document->setValue('table', $tablexml);		
		
// Сохраняем документ  
$document->saveAs($patch."/tmp.docx");	
}
//Dstep5-----------------------------------------------
function createDstep5($id,$patch)
{
global $db,$cnt;
	require_once 'PHPWord-master/vendor/autoload.php';
 // Создаем объект класса PhpWord
$phpWord = new \PhpOffice\PhpWord\PhpWord();
 
// Создаем новую секцию в документе
$section = $phpWord->addSection();
// Открываем существующий документ с меткой ${table}
$document = new \PhpOffice\PhpWord\TemplateProcessor("documents/templates/dstep5.docx");

 
$q=mysqli_query($db,"SELECT *  FROM dstep5 WHERE zid=$id ");
$f=mysqli_fetch_array($q);
$tmp=explode(";",$f[data]);
//номер договора
 $document->setValue("thisnumber",$tmp[4]);
 //договор поставки
 $q=mysqli_query($db,"SELECT *  FROM dstep2 WHERE zid=$id ");
$f=mysqli_fetch_array($q);
$tmp2=explode(";",$f[data]);

 $document->setValue("number",$tmp2[0]); 
 //дата
  $document->setValue("date",$tmp2[1]); 
  //грузополучатель
 $q=mysqli_query($db,"SELECT *  FROM zv WHERE id=$id "); 
 $f=mysqli_fetch_array($q);
$q=mysqli_query($db,"SELECT *  FROM comp WHERE nme=\"$f[cmp]\" "); 
 
 
 $fc=mysqli_fetch_array($q); 
   $document->setValue("comp",$fc[nme]); 
   //адрес грузополучателя
      $document->setValue("compadr",$fc[adr]); 
	  //генеральный директор
	     $document->setValue("dircom",$fc[gdir]);
	  //фирма2
    $document->setValue("firm2",$tmp2[2]); 	  
	//директор 2
	 if($tmp[2]=="ООО 'Мастер бэринг'")
{
$os="kp";
$d="1";	
}
if($tmp[2]=="ООО 'ЦМТО1'")
{
$os="kp";
$d="2";	
}

    $document->setValue("dirfirm2",$cnt["dir".$d]); 
	// таблица
	$tableStyle = array(
    'borderColor' => '000000', // Цвет границы - черный
    'borderSize'  => 6, // Толщина границы - 6 пунктов
	'align' => 'center',
);
	// Добавляем таблицу в секцию с заданным стилем
$table = $section->addTable($tableStyle);

// Добавляем первую строку в таблицу
$row = $table->addRow(300);

// Добавляем первую ячейку в строку с текстом "Hello"
$cell = $row->addCell();
$cell->addText("Наименование");
$cell = $row->addCell();
$cell->addText("Производитель");
$cell = $row->addCell();
$cell->addText("кол-во, щт");
$cell = $row->addCell();
$cell->addText("Цена за ед,");
$cell = $row->addCell();
$cell->addText("Стоимость,");
 
 
 

//загрузим данные
$q=mysqli_query($db,"SELECT *  FROM zdata WHERE zid=$_GET[id] ");
$n=mysqli_num_rows($q);

$fullprice=0;
$fullcnt=0;
for($i=0;$i<$n;$i++)
{
$f=mysqli_fetch_array($q);
 $row = $table->addRow(300);

 
$cell = $row->addCell(4000,['valign' => 'center']);
$cell->addText($f[nm], ['size' => 9]);
 
$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText($f[brn], ['size' => 9]);
 
$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText($f[cnt], ['size' => 9]);

$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText($f[price], ['size' => 9]);

$cell = $row->addCell(2000,['valign' => 'center']);
$full=$f[price]*$f[cnt];

$fullprice=$fullprice+floatval($full);
$fullcnt=$fullcnt+intval($f[cnt]);
$cell->addText($full, ['size' => 9]);
 
 	
}
 
 $row = $table->addRow(300);
$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText("ИТОГО", ['size' => 9, 'bold' => true]); 

$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText("", ['size' => 9]); 

$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText($fullcnt, ['size' => 9]); 

$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText("------", ['size' => 9]); 

$cell = $row->addCell(2000,['valign' => 'center']);
$cell->addText($fullprice, ['size' => 9]); 

 

 
 
// Создаем объект Writer для преобразования документа в XML-код
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

// Получаем весь XML-код документа
$fullxml = $objWriter->getWriterPart('Document')->write();

// Получаем только XML-код таблицы
$tablexml = preg_replace('/^[\s\S]*(<w:tbl\b.*<\/w:tbl>).*/', '$1', $fullxml);

 

 
//общая цена
$document->setValue("sum",$fullprice." EUR");	
$document->setValue('table', $tablexml);
//количество продукции
$document->setValue("fcount", $fullcnt);
$document->setValue("fcountword", number_to_words($fullcnt));
//стоимость
$document->setValue("fprice", $fullprice);
$document->setValue("priceword", number_to_words($fullprice));	
//валюта
if($tmp[0]=="EUR")
$unit="Евро";
if($tmp[0]=="USD")
$unit="USD";
$document->setValue("unit", $unit);
//НДС
$nds=$fullprice/5;
$nds=round($nds);
$document->setValue("nds", $nds);	
// Сохраняем документ  
$document->saveAs($patch."/tmp.docx");	
}
 
//Dstep4-----------------------------------------------
function createDstep4($id,$patch)
{
	global $db,$cnt;
require_once 'PHPExcel.php';

// Открываем файл xlsx для чтения и записи
$reader = PHPExcel_IOFactory::createReader('Excel2007');
$excel = $reader->load("documents/templates/dstep4.xlsx");
$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN,
      'color' => array('rgb' => '000000')
    )
  )
); 
// Выбираем активный лист
$sheet = $excel->getActiveSheet();

 
//для клиента
$q=mysqli_query($db,"SELECT *  FROM headkp WHERE zid=$id ");
$f=mysqli_fetch_array($q);
$tmpx=explode(";",$f[data]);
 $sheet->setCellValueByColumnAndRow(3, 5, $tmpx[0]);
$sheet->getStyleByColumnAndRow(3, 5)->applyFromArray($styleArray);


$q=mysqli_query($db,"SELECT *  FROM dstep2 WHERE zid=$id ");
$f=mysqli_fetch_array($q);
$tmp=explode(";",$f[data]);

//поставщик
$sheet->setCellValueByColumnAndRow(3, 6, $tmp[2]);
$sheet->getStyleByColumnAndRow(3, 6)->applyFromArray($styleArray);
//покупатель
$qq=mysqli_query($db,"SELECT *  FROM zv WHERE id=$id ");
$ff=mysqli_fetch_array($qq);
$sheet->setCellValueByColumnAndRow(3, 7, $ff[cmp]);
$sheet->getStyleByColumnAndRow(3, 7)->applyFromArray($styleArray);
//номер договора
$sheet->setCellValueByColumnAndRow(3, 8, "ДОГОВОР № "+$tmp[0]);
//дата спецификации
$qqq=mysqli_query($db,"SELECT *  FROM dstep3 WHERE zid=$id ");
$fff=mysqli_fetch_array($qqq);
$tmp2=explode(";",$fff[data]);
 $sheet->setCellValueByColumnAndRow(3, 9, $tmp2[4]);
//условия оплаты
$qx=mysqli_query($db,"SELECT *  FROM  headkp WHERE zid=$id ");
$fx=mysqli_fetch_array($qx);
 $tmp3=explode(";",$fx[data]);
 $sheet->setCellValueByColumnAndRow(3, 10, $tmp3[13]);
 //сроки поставки
  $sheet->setCellValueByColumnAndRow(3, 11, $tmp3[12]);
  //адрес поставки
 if($tmp[2]=="ООО 'Мастер бэринг'")
{
$os="kp";
$d="1";	
}
if($tmp[2]=="ООО 'ЦМТО1'")
{
$os="kp";
$d="2";	
}
  $sheet->setCellValueByColumnAndRow(3, 12, $cnt["adress".$d]); 
 //таблица
$q=mysqli_query($db,"SELECT *  FROM zdata WHERE zid=$id "); 
$n=mysqli_num_rows($q);
for($i-0;$i<$n;$i++)
{
$f=mysqli_fetch_array($q);
//наименование
 $sheet->setCellValueByColumnAndRow(2, $i+15, $f[nm]);
 $sheet->getStyleByColumnAndRow(2, $i+15)->applyFromArray($styleArray);	
  //артикул
  $sheet->setCellValueByColumnAndRow(3, $i+15, $f[art]);
 $sheet->getStyleByColumnAndRow(3, $i+15)->applyFromArray($styleArray);	
 //производитель
  $sheet->setCellValueByColumnAndRow(4, $i+15, $f[brn]);
 $sheet->getStyleByColumnAndRow(4, $i+15)->applyFromArray($styleArray);	
//кол-во
  $sheet->setCellValueByColumnAndRow(5, $i+15, $f[cnt]);
 $sheet->getStyleByColumnAndRow(5, $i+15)->applyFromArray($styleArray);	
$rPrice="";
 //если валюта USD переводим все в доллары
 if($tmp2[0]=="USD")
 {
//из евро
if($f[unit]=="EUR")
$rPrice=floatval($f[price])/floatval($tmp2[1]);
//из лиры
if($f[unit]=="TRY")
$rPrice=floatval($f[price])/floatval($tmp2[2]);	 
 }

 $rPrice=$rPrice*1.1;
  //цена\ед
   $sheet->setCellValueByColumnAndRow(7, $i+15, round($rPrice,2));
 $sheet->getStyleByColumnAndRow(7, $i+15)->applyFromArray($styleArray);	

 $full=floatval($f[cnt])*floatval($rPrice);
    $sheet->setCellValueByColumnAndRow(8, $i+15, round($full,2));
 $sheet->getStyleByColumnAndRow(8, $i+15)->applyFromArray($styleArray);
 //валюта
     $sheet->setCellValueByColumnAndRow(9, $i+15, $tmp2[0]);
 $sheet->getStyleByColumnAndRow(9, $i+15)->applyFromArray($styleArray);
}


// Сохраняем изменения в файле
$writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
 
$writer->save($patch."/tmp.xlsx");	
 
 
}
//Dstep3-----------------------------------------------
function createDstep3($id,$patch)
{
	global $db,$cnt;
require_once 'PHPExcel.php';

// Открываем файл xlsx для чтения и записи
$reader = PHPExcel_IOFactory::createReader('Excel2007');
$excel = $reader->load("documents/templates/dstep3.xlsx");
$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN,
      'color' => array('rgb' => '000000')
    )
  )
); 
// Выбираем активный лист
$sheet = $excel->getActiveSheet();

 
 
$q=mysqli_query($db,"SELECT *  FROM dstep2 WHERE zid=$id ");
$f=mysqli_fetch_array($q);
$tmp=explode(";",$f[data]);
//поставщик
$sheet->setCellValueByColumnAndRow(3, 6, $tmp[2]);
$sheet->getStyleByColumnAndRow(3, 6)->applyFromArray($styleArray);
//покупатель
$qq=mysqli_query($db,"SELECT *  FROM zv WHERE id=$id ");
$ff=mysqli_fetch_array($qq);
$sheet->setCellValueByColumnAndRow(3, 7, $ff[cmp]);
$sheet->getStyleByColumnAndRow(3, 7)->applyFromArray($styleArray);
//номер договора
$sheet->setCellValueByColumnAndRow(3, 8, "ДОГОВОР № "+$tmp[0]);
//дата спецификации
$qqq=mysqli_query($db,"SELECT *  FROM dstep3 WHERE zid=$id ");
$fff=mysqli_fetch_array($qqq);
$tmp2=explode(";",$fff[data]);
 $sheet->setCellValueByColumnAndRow(3, 9, $tmp2[4]);
//условия оплаты
$qx=mysqli_query($db,"SELECT *  FROM  headkp WHERE zid=$id ");
$fx=mysqli_fetch_array($qx);
 $tmp3=explode(";",$fx[data]);
 $sheet->setCellValueByColumnAndRow(3, 10, $tmp3[13]);
 //сроки поставки
  $sheet->setCellValueByColumnAndRow(3, 11, $tmp3[12]);
  //адрес поставки
 if($tmp[2]=="ООО 'Мастер бэринг'")
{
$os="kp";
$d="1";	
}
if($tmp[2]=="ООО 'ЦМТО1'")
{
$os="kp";
$d="2";	
}
  $sheet->setCellValueByColumnAndRow(3, 12, $cnt["adress".$d]); 
 //таблица
$q=mysqli_query($db,"SELECT *  FROM zdata WHERE zid=$id "); 
$n=mysqli_num_rows($q);
for($i-0;$i<$n;$i++)
{
$f=mysqli_fetch_array($q);
//наименование
 $sheet->setCellValueByColumnAndRow(2, $i+15, $f[nm]);
 $sheet->getStyleByColumnAndRow(2, $i+15)->applyFromArray($styleArray);	
  //артикул
  $sheet->setCellValueByColumnAndRow(3, $i+15, $f[art]);
 $sheet->getStyleByColumnAndRow(3, $i+15)->applyFromArray($styleArray);	
 //производитель
  $sheet->setCellValueByColumnAndRow(4, $i+15, $f[brn]);
 $sheet->getStyleByColumnAndRow(4, $i+15)->applyFromArray($styleArray);	
//кол-во
  $sheet->setCellValueByColumnAndRow(5, $i+15, $f[cnt]);
 $sheet->getStyleByColumnAndRow(5, $i+15)->applyFromArray($styleArray);	
$rPrice="";
 //если валюта USD переводим все в доллары
 if($tmp2[0]=="USD")
 {
//из евро
if($f[unit]=="EUR")
$rPrice=floatval($f[price])/floatval($tmp2[1]);
//из лиры
if($f[unit]=="TRY")
$rPrice=floatval($f[price])/floatval($tmp2[2]);	 
 }
  //цена\ед
   $sheet->setCellValueByColumnAndRow(7, $i+15, round($rPrice,2));
 $sheet->getStyleByColumnAndRow(7, $i+15)->applyFromArray($styleArray);	
 //стоимость
 $full=floatval($f[cnt])*floatval($rPrice);
    $sheet->setCellValueByColumnAndRow(8, $i+15, round($full,2));
 $sheet->getStyleByColumnAndRow(8, $i+15)->applyFromArray($styleArray);
 //валюта
     $sheet->setCellValueByColumnAndRow(9, $i+15, $tmp2[0]);
 $sheet->getStyleByColumnAndRow(9, $i+15)->applyFromArray($styleArray);
}

// Сохраняем изменения в файле
$writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
 
$writer->save($patch."/tmp.xlsx");	
 
 
}
//Dstep2-----------------------------------------------
function createDstep2($id,$patch)
{
global $db,$cnt;
	require_once 'PHPWord-master/vendor/autoload.php';
 // Создаем объект класса PhpWord
$phpWord = new \PhpOffice\PhpWord\PhpWord();
 
// Создаем новую секцию в документе
$section = $phpWord->addSection();
// Открываем существующий документ с меткой ${table}
$document = new \PhpOffice\PhpWord\TemplateProcessor("documents/templates/dstep2.docx");
 
$q=mysqli_query($db,"SELECT *  FROM dstep2 WHERE zid=$id  ");
$f=mysqli_fetch_array($q);
$tmp=explode(";",$f[data]);

// КОНТАКТЫ
if($tmp[2]=="ООО 'Мастер бэринг'")
{
 
$os="kp";
$d="1";	
}
if($tmp[2]=="ООО 'ЦМТО1'")
{
$os="kp";
$d="2";	
}
$document->setValue($os."0",$tmp[2]);
$document->setValue($os."1",$cnt["adress".$d]);	
$document->setValue($os."2",$cnt["inn".$d]);
$document->setValue($os."3",$cnt["kpp".$d])	;
$document->setValue($os."4",$cnt["ogrn".$d]);
$document->setValue($os."5",$cnt["okpo".$d]);
$document->setValue($os."6",$cnt["rs".$d]);		
$document->setValue($os."7",$cnt["ks".$d]);	
$document->setValue($os."8",$cnt["bik".$d]);	
//поставщик и его сокращенное наименование (без ооо)
$document->setValue("f1",$tmp[2]);	
$document->setValue("fm1",get_phrase($tmp[2]));
//генеральный директор двух
$document->setValue("f2",$cnt[dirp]);
//генеральный директор
$document->setValue("p3",$tmp[4]);
//номер договора
$document->setValue("p1",$tmp[0]);
//дата договора
$document->setValue("p2",$tmp[1]);
//компания и ее сокращенный вариант
$qq=mysqli_query($db,"SELECT *  FROM zv WHERE id='$id' ");
$ff=mysqli_fetch_array($qq);
$qqq=mysqli_query($db,"SELECT *  FROM comp WHERE nme=\"$ff[cmp]\" ");
$fff=mysqli_fetch_array($qqq);
 
$document->setValue("a1",$fff[nme]);	
$document->setValue("am1",get_phrase($fff[nme]));
//директоры в подписи
$document->setValue("dir",$cnt[dir].$d);	
$document->setValue("adir",$tmp[3]);

// компания 2
$document->setValue("kpp0",$fff[nme]);
$document->setValue("kpp1",$fff[adr]);
$document->setValue("kpp2",$fff[inn]);
$document->setValue("kpp3",$fff[kpp]);
$document->setValue("kpp4",$fff[ogrn]);
$document->setValue("kpp5",$fff[okpo]);
$document->setValue("kpp6",$fff[rs]);
$document->setValue("kpp7",$fff[ks]);
$document->setValue("kpp8",$fff[bik]);
// Сохраняем документ  
$document->saveAs($patch."/tmp.docx");	
}
//Dstep1
function createDstep1($id,$patch)
{
global $db;
	require_once 'PHPWord-master/vendor/autoload.php';
 // Создаем объект класса PhpWord
$phpWord = new \PhpOffice\PhpWord\PhpWord();
 
// Создаем новую секцию в документе
$section = $phpWord->addSection();
// Открываем существующий документ с меткой ${table}
$document = new \PhpOffice\PhpWord\TemplateProcessor("documents/templates/dstep1.docx");
//заполняем поля
$q=mysqli_query($db,"SELECT *  FROM dstep1 WHERE zid=$id ");
$f=mysqli_fetch_array($q);
$tmp=explode(";",$f[data]);
for($i=1;$i<count($tmp);$i++)
{
$pr=$i-1;
$document->setValue("p".$i,$tmp[$pr]);	
}
$q=mysqli_query($db,"SELECT *  FROM zv WHERE id=$id ");
$f=mysqli_fetch_array($q);
$date=date("m.d.y",$f[dl]);
//покупатель
$document->setValue("f1",$f[cmp]);
$q=mysqli_query($db,"SELECT *  FROM headkp WHERE zid=$id ");
$f=mysqli_fetch_array($q);
$tmp=explode(";",$f[data]);
//грузополучатель
$document->setValue("p8",$tmp[11]);
 
//базис поставки
$document->setValue("f4",$tmp[11]);
//условия права собственности 
$document->setValue("f5",$tmp[12]);
//условия приемо передачи
$document->setValue("f6",$tmp[13]);
//адрес грузоотправителя
$document->setValue("f7",$f[adr]);
//срок постввки
$document->setValue("f3",$date);
//5 наименований товара
$q=mysqli_query($db,"SELECT DISTINCT nm FROM zdata WHERE zid=$id AND spl='$_GET[split]' LIMIT 8");	
$tovs="";
for($i=1;$i<=8;$i++)
{
$f=mysqli_fetch_array($q);
if($i!=8)
$tovs=$tovs.$f[nm].",";
else
$tovs=$tovs.$f[nm];
}
$document->setValue("f2",$tovs);
// Сохраняем документ  
$document->saveAs($patch."/tmp.docx");	
}
// ДОКУМЕНТ Кп
function createKp($id,$patch,$split)
{
	global $db;
	require_once 'PHPWord-master/vendor/autoload.php';
 // Создаем объект класса PhpWord
$phpWord = new \PhpOffice\PhpWord\PhpWord();
 
// Создаем новую секцию в документе
$section = $phpWord->addSection();

// Создаем стиль для таблицы
$tableStyle = array(
    'borderColor' => '000000', // Цвет границы - черный
    'borderSize'  => 6, // Толщина границы - 6 пунктов
	'align' => 'center',
);

// Добавляем таблицу в секцию с заданным стилем
$table = $section->addTable($tableStyle);

// Добавляем первую строку в таблицу
$row = $table->addRow();

// Добавляем первую ячейку в строку с текстом "Hello"
$cell = $row->addCell();
$cell->addText("№");
$cell = $row->addCell();
$cell->addText("Бренд");
$cell = $row->addCell();
$cell->addText("Артикуль");
$cell = $row->addCell();
$cell->addText("Фасовка");
$cell = $row->addCell();
$cell->addText("Кол-во");
$cell = $row->addCell();
$cell->addText("Цена/шт");
$cell = $row->addCell();
$cell->addText("Общая Стоимость");
$cell = $row->addCell();
 $cell->addText("Валюта");
 
 

//загрузим данные
$q=mysqli_query($db,"SELECT *  FROM zdata WHERE zid=$_GET[id] AND spl='$split' ");
$n=mysqli_num_rows($q);

$fullprice=0;
for($i=0;$i<$n;$i++)
{
$f=mysqli_fetch_array($q);
 $row = $table->addRow();
 
$cell = $row->addCell();
$cell->addText($i+1, ['size' => 9]);
$cell = $row->addCell();
$cell->addText($f[brn], ['size' => 9]);
$cell = $row->addCell();
$cell->addText($f[art], ['size' => 9]);
$cell = $row->addCell();
$cell->addText("Фасовка", ['size' => 9]);
$cell = $row->addCell();
$cell->addText($f[cnt], ['size' => 9]);
$cell = $row->addCell();
$cell->addText($f[price], ['size' => 9]);
$cell = $row->addCell();
$full=$f[price]*$f[cnt];
$fullprice=$fullprice+$full;
$cell->addText($full, ['size' => 9]);
$cell = $row->addCell();
$cell->addText("EUR", ['size' => 9]);

 	
}
 

 

// Добавляем последнюю строку в таблицу
 $row = $table->addRow();
 $cell = $row->addCell(null, array('gridSpan' => 8));
 $paragraphStyle = array(
    'align' => 'right', // Выравнивание по правому краю
 );
 //заполняем поля
$q=mysqli_query($db,"SELECT *  FROM headkp WHERE zid=$id ");
$f=mysqli_fetch_array($q);
$tmp=explode(";",$f[data]);
$tmpa=explode(";",$f[data2]);
//дополнительные наценки
 //добавляем логистику
 $newprice=$fullprice+floatval($tmpa[0]);
// echo"логистика и цена - $newprice<br>";
 //пошлина (стоимость+логистика)*0,065
$newprice=$newprice+(floatval($tmpa[0])+$fullprice)*0.065;
$pchl=(floatval($tmpa[0])+$fullprice)*0.065;
// echo"+ пошлина -  " .(floatval($tmpa[0])+$fullprice)*0.065;
//+акциз
$newprice=$newprice+floatval($tmpa[1]);
// echo"+ акциз - $tmpa[1]<br>";
//ндс =(стоимость+пошлина)*0,2
$newprice=$newprice+($fullprice+$pchl)*0.2;
// echo"+ ндс -   ".($fullprice+$pchl)*0.2."<br>";;
 //+таможенное и разрешительное
 $newprice=$newprice+ floatval($tmpa[2]) +floatval($tmpa[3]);
//  echo"+ таможенное и разрешительное- $newprice<br>";
 


// Добавляем текст в ячейку с заданным стилем параграфа
 $cell->addText($newprice." EUR", null, $paragraphStyle);
 
// Создаем объект Writer для преобразования документа в XML-код
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

// Получаем весь XML-код документа
$fullxml = $objWriter->getWriterPart('Document')->write();

// Получаем только XML-код таблицы
$tablexml = preg_replace('/^[\s\S]*(<w:tbl\b.*<\/w:tbl>).*/', '$1', $fullxml);

// Открываем существующий документ с меткой ${table}
$document = new \PhpOffice\PhpWord\TemplateProcessor("documents/templates/kp.docx");

// Заменяем метку на XML-код таблицы


for($i=1;$i<count($tmp);$i++)
{
$pr=$i-1;
$document->setValue("p".$i,$tmp[$pr]);	
}
	
 //общая цена
$document->setValue("sum",$newprice." EUR");
$document->setValue('table', $tablexml);
// Сохраняем документ с добавленной таблицей
$document->saveAs($patch."/tmp.docx");
}
  
function downloadFile($path, $name) {
  // Проверяем, существует ли файл по указанному пути
  if (file_exists($path)) {
    // Если файл существует, устанавливаем заголовки для скачивания
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$name.'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length:'.filesize($path));
    
    // Читаем и выводим содержимое файла
    readfile($path);
    
    // Завершаем скрипт
    exit;
  } else {
    // Если файла нет, выводим сообщение об ошибке
    echo "Файл $path не найден";
  }
}
function get_phrase($string) {
  // Ищем первое вхождение одиночной кавычки в строке
  $start = strpos($string, "'");
  // Если не нашли, возвращаем пустую строку
  if ($start === false) {
    return "";
  }
  // Ищем следующее вхождение одиночной кавычки после первого
  $end = strpos($string, "'", $start + 1);
  // Если не нашли, возвращаем пустую строку
  if ($end === false) {
    return "";
  }
  // Вырезаем подстроку между двумя кавычками
  $phrase = substr($string, $start + 1, $end - $start - 1);
  // Возвращаем фразу
  return $phrase;
}


function number_to_words($number) {
  // Массивы с названиями чисел
  $units = array("", "один", "два", "три", "четыре", "пять", "шесть", "семь", "восемь", "девять");
  $teens = array("", "одиннадцать", "двенадцать", "тринадцать", "четырнадцать", "пятнадцать", "шестнадцать", "семнадцать", "восемнадцать", "девятнадцать");
  $tens = array("", "", "двадцать", "тридцать", "сорок", "пятьдесят", "шестьдесят", "семьдесят", "восемьдесят", "девяносто");
  $hundreds = array("", "сто", "двести", "триста", "четыреста", "пятьсот", "шестьсот", "семьсот", "восемьсот", "девятьсот");
  $thousands = array("", "тысяча", "тысячи", "тысяч");

  // Проверка на корректность входных данных
  if (!is_numeric($number)) {
    return "Некорректный ввод";
  }

  // Обработка нуля
  if ($number == 0) {
    return "ноль";
  }

  // Обработка отрицательных чисел
  if ($number < 0) {
    return "минус ".number_to_words(-$number);
  }

  // Преобразование числа в строку
  $number = strval($number);

  // Добавление нулей в начало строки, чтобы длина была кратна трем
  while (strlen($number) % 3 != 0) {
    $number = '0'.$number;
  }

  // Разбиение строки на группы по три цифры
  $groups = str_split($number, 3);

  // Массив для хранения текстового представления каждой группы
  $words = array();

  // Цикл по группам, начиная с самой левой
  for ($i = 0; $i < count($groups); $i++) {
    // Получение текущей группы
    $group = $groups[$i];

    // Пропуск группы, если она равна нулю
    if ($group == '000') {
      continue;
    }

    // Получение цифр из группы
    $a = intval($group[0]); // сотни
    $b = intval($group[1]); // десятки
    $c = intval($group[2]); // единицы

    // Массив для хранения текстового представления текущей группы
    $group_words = array();

    // Добавление сотен, если они есть
    if ($a > 0) {
      $group_words[] = $hundreds[$a];
    }

    // Добавление десятков и единиц, если они есть
    if ($b > 0) {
      if ($b == 1 && $c > 0) {
        // Особый случай для чисел от 11 до 19
        $group_words[] = $teens[$c];
      } else {
        // Обычный случай для остальных чисел
        $group_words[] = $tens[$b];
        if ($c > 0) {
          $group_words[] = $units[$c];
        }
      }
    } else {
      // Добавление единиц, если они есть и нет десятков
      if ($c > 0) {
        $group_words[] = $units[$c];
      }
    }

    // Добавление названия разряда, если он есть
    if ($i < count($groups) - 1) {
      // Получение индекса для названия разряда
      $index = count($groups) - $i - 2;

      // Особый случай для тысяч
      if ($index == 0) {
        // Склонение слова "тысяча" в зависимости от последней цифры
        if ($c == 1 && $b != 1) {
          $group_words[] = $thousands[1];
        } elseif ($c > 1 && $c < 5 && $b != 1) {
          $group_words[] = $thousands[2];
        } else {
          $group_words[] = $thousands[3];
        }
      } else {
        // Обычный случай для остальных разрядов
        $group_words[] = pow(10, $index * 3);
      }
    }

    // Соединение слов в группе с пробелами
    $group_text = implode(" ", $group_words);

    // Добавление группы в общий массив
    $words[] = $group_text;
  }

  // Соединение групп с пробелами
  $text = implode(" ", $words);

  // Возвращение текстового представления числа
  return $text;
} 
//скачать заявку
function createZ($id,$patch,$split)
{
	global $db,$cnt;
require_once 'PHPExcel.php';

// Открываем файл xlsx для чтения и записи
$reader = PHPExcel_IOFactory::createReader('Excel2007');
$excel = $reader->load("documents/templates/z.xlsx");
$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN,
      'color' => array('rgb' => '000000')
    )
  )
); 
// Выбираем активный лист
$sheet = $excel->getActiveSheet();

 
 
 
 
$q=mysqli_query($db,"SELECT *  FROM zdata WHERE zid=$id "); 
$n=mysqli_num_rows($q);
for($i-0;$i<$n;$i++)
{
$f=mysqli_fetch_array($q);
//наименование
 $sheet->setCellValueByColumnAndRow(2, $i+7, $f[nm]);
 $sheet->getStyleByColumnAndRow(2, $i+7)->applyFromArray($styleArray);	
  //артикул
  $sheet->setCellValueByColumnAndRow(3, $i+7, $f[art]);
 $sheet->getStyleByColumnAndRow(3, $i+7)->applyFromArray($styleArray);	
 //производитель
  $sheet->setCellValueByColumnAndRow(4, $i+7, $f[brn]);
 $sheet->getStyleByColumnAndRow(4, $i+7)->applyFromArray($styleArray);	
//кол-во
  $sheet->setCellValueByColumnAndRow(5, $i+7, $f[cnt]);
 $sheet->getStyleByColumnAndRow(5, $i+7)->applyFromArray($styleArray);	
 
}

// Сохраняем изменения в файле
$writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
 
$writer->save($patch."/tmp.xlsx");	
 
 
}
?>