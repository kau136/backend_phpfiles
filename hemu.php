<?php
$n=$_POST['t1'];
// $n=5;
$f=1;
while($n>0)
{
    $f=$f*$n;
    $n--;
}
echo $f;
?>