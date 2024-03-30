<?php
function checkFirstEnter($table)
{
	global $db,$err,$login;
	 
$_POST[code] = md5(uniqid(rand(), true));
$_POST['login']=addslashes($_POST['login']);
 
 
$q1 = mysqli_query ($db,"SELECT *  FROM  $table  WHERE email='$_POST[login]'   ");

$num1=mysqli_num_rows($q1);
$f=mysqli_fetch_array($q1); 
 
  $result = password_verify($_POST[pass], $f[pass]);
 
if($result==true)
{
 
setcookie("login",$f[id] , time()+360000); 
setcookie("code","$_POST[code]" , time()+360000); 
 
$q1 = mysqli_query ($db,"UPDATE  $table SET code='$_POST[code]'  WHERE email='$_POST[login]'   ");
 
 $_COOKIE[login]=$_POST[login];
 $_COOKIE[code]=$_POST[code];
 $login=$f[id];
header("Location: index.php");
 
	}
 
	 
  
 
 	
}
function checkEnter($table)
{
	 global $uenter,$db,$role,$userid,$err,$login,$fio;
 if(isset($_COOKIE['login']) && isset($_COOKIE['code'])  )
{
$login=addslashes($_COOKIE['login']);
$code=addslashes($_COOKIE['code']);
$q =  mysqli_query ($db,"SELECT *  FROM  $table WHERE id='$login' AND code='$code' ");
$num1=mysqli_num_rows($q);
 
if($num1==1)
{
$f=mysqli_fetch_array($q);
$role=$f[role];
$userid=$f[id];
$fio=$f[fio];
$uenter=1;
$login=$f[id];
}
if( $num1!=1)
{
$uenter="";
$login="";
 setcookie("login","" , time()+360000); 
setcookie("code","" , time()+360000); 
}


}
  
 
 
 
 
}

?>