<?php
function fullinsert($tablename)
{
 global $db;
//получить либо список столбоцов в скобках(kind=1)
//либо готовые операторы пост, учитывая что все переменные пост одноименны столбцам(kind=2)
$qr = mysqli_query ($db,"SHOW COLUMNS FROM $tablename ");



$s1="(";
$s2="(";

$nr=mysqli_num_rows($qr);

$fr=mysqli_fetch_array($qr);
for( $ir=1;$ir<=$nr-1;$ir++)
{
$fr=mysqli_fetch_array($qr);
if(!isset( $_POST[$fr[0]]))
$_POST[$fr[0]]="";
if($s1!="(")
$s1=$s1.",".$fr[0];
else
$s1=$s1.$fr[0];
if($s2!="(")
$s2=$s2.",'".$_POST[$fr[0]]."'";
else
$s2=$s2."'".$_POST[$fr[0]]."'";

}
$s1=$s1.")";
$s2=$s2.")";
$qr = mysqli_query ($db,"INSERT INTO $tablename $s1 VALUES  $s2  ");
 

}
?>