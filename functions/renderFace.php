<?php
function renderFace($id,$disabled,$zstepVisible)
{
	 
	global $db,$zstep,$split;
	$q=mysqli_query($db,"SELECT * FROM zv WHERE id='$id'");
 
	$f=mysqli_fetch_array($q);
if(strlen($f[cmp])>3)
{
$cmp=$f[cmp];
$background="background: rgba(0 0, 0, 0)";
}
else
{
$cmp="Имя компании?";
$background="background: rgba(200 10, 28, 0.15)";
}

if(strlen($f[comm])>3)
{
$adr=$f[comm];
$background2="background: rgba(0 0, 0, 0)";
}
else
{
$adr="Коммментарий";
$background2="background: rgba(200 10, 28, 0.15)";
}

 echo"<div  id='idpl$f[id]'  ondblclick=\"plDblClick(this,$split)\" class='pStep1'>";

//поле компании
 echo"<div   style='position:absolute;left:12px;top:20px;$background;font-size:16px '>";
 if($disabled=="disabled")
 $onchange="";
 else
 $onchange="onchange='saveCompanyName($f[id],this.value)'";
 
 echo"<select  $onchange  >";
$qq=mysqli_query($db,"SELECT * FROM comp");
$nn=mysqli_num_rows($qq);
echo"<option>Имя компании?</option>";
for($ii=0;$ii<$nn;$ii++)
{
	$ff=mysqli_fetch_array($qq);
	if($ff[nme]==$f[cmp])
echo"<option selected>$ff[nme]</option>";	
else
echo"<option  >$ff[nme]</option>";

}
echo"</select>";  
 echo"</div>";
//статус и дедлайн и дата
$date=date("d.m.y",$f[dl]);
 echo"<div   style='position:absolute;left:15px;top:70px; font-size:16px '>$date</div>";
 $date=date("d.m.y",$f[dt]);
 echo"<div   style='position:absolute;left:15px;top:90px; font-size:16px '>$date</div>";
  echo"<div    style='position:absolute;left:12px;top:47px; font-size:16px '>";
   if($disabled=="disabled")
 $onchange="";
 else
 $onchange="onchange='changeState($f[id],this.value)'";
 
 if($zstepVisible=="3")
 $onchange="onchange='changeStatePartly($f[id],this.value,$split)'";
  if($zstepVisible=="4")
 $onchange="onchange='changeStatePartly2($f[id],this.value,$split)'";
   if($zstepVisible=="5")
 $onchange="onchange='changeStatePartly3($f[id],this.value,$split)'";
echo"<select $onchange >";
if($zstepVisible=="1")
{
	
 
echo"<option selected>$zstep[0]</option>";
 echo"<option >$zstep[1]</option>";
}
if($zstepVisible=="2")
{
	
 
echo"<option selected>$zstep[1]</option>";
 
}
if($zstepVisible=="3")
{
	
 
echo"<option selected>$zstep[1]</option>";
  echo"<option >$zstep[2]</option>";
}
  if($zstepVisible=="4")
{
	
 
echo"<option selected>$zstep[2]</option>";
  echo"<option >$zstep[3]</option>";
}
  if($zstepVisible=="5")
{
	
 
echo"<option selected>$zstep[3]</option>";
  echo"<option >$zstep[4]</option>";
 
}
  if($zstepVisible=="6")
{
	
 
 
  echo"<option >$zstep[4]</option>";
}
  if($zstepVisible=="7")
{
	
 
 
  echo"<option >$id</option>";
} 
echo"</select>";  
 echo" </div>";
  
 //поле адреса
 
 echo"<div align='left' onkeydown='z2KeyDown(this)'  onblur=\"endEdit2(this)\"   onclick='beginEdit2(this)' contenteditable='true' style='position:absolute;left:15px;top:110px;$background2;font-size:12px; '>$adr</div>";
 
 echo"</div>";	

}
?>