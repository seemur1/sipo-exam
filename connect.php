<?php
 
$dblocation = "localhost"; 
  $dbname = "zdata"; 
  $dbuser = "root"; 
  $dbpasswd = ""; 

  $db = @mysqli_connect($dblocation, $dbuser, $dbpasswd); 
  if (!$db) 
  { 
    echo "<p>no server  </p>"; 
    exit(); 
  } 
  $selected = mysqli_select_db($db, $dbname)  
or die("Could not select examples");  
  
  
 
$q = mysqli_query($db,"SET NAMES utf8 ");
mb_internal_encoding("UTF-8");
?>