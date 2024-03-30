<?php
$q=mysqli_query($db,"SELECT * FROM zv WHERE stp='$zstep[0]'");
$n=mysqli_num_rows($q);

for($i=0;$i<$n;$i++)
{
$f=mysqli_fetch_array($q);
renderFace($f[id],"","1");
}	
?>