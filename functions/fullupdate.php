<?php

function fullupdate($tablename)
{
global $db;

//получить либо список столбоцов в скобках(kind=1)
//либо готовые операторы пост, учитывая что все переменные пост одноименны столбцам(kind=2)
$qr = mysqli_query ($db,"SHOW COLUMNS FROM $tablename ");





$nr=mysqli_num_rows($qr);

$fr=mysqli_fetch_array($qr);
 

$s1="SET ";

for( $ir=0;$ir<=$nr-2;$ir++)
{
$fr=mysqli_fetch_array($qr);
if(isset($_POST[$fr[0]]))
if($_POST[$fr[0]]!="")
$s1=$s1.$fr[0]."='".$_POST[$fr[0]]."',";

}
$s1=substr($s1,0,strlen($s1)-1);
if(isset($_GET['selid']))
$qr = mysqli_query ($db,"UPDATE $tablename $s1 WHERE id='$_GET[selid]' LIMIT 1");
if(isset($_POST['selid']))
$qr = mysqli_query ($db,"UPDATE $tablename $s1 WHERE id='$_POST[selid]' LIMIT 1");
 

}
?>