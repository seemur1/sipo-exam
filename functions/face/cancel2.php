<?php
 
$q=mysqli_query($db,"SELECT * FROM zv    ");
$n=mysqli_num_rows($q);
 
for($i=0;$i<$n;$i++)
{
$f=mysqli_fetch_array($q);
$qq=mysqli_query($db,"SELECT DISTINCT spl FROM zdata WHERE zid=$f[id]   AND accepted=2000  ");
 
$nn=mysqli_num_rows($qq);
for($ii=0;$ii<$nn;$ii++)
{
$ff=mysqli_fetch_array($qq);
$split=$ff[spl];
 
renderFace($f[id],"","7");	
}

}	
?>