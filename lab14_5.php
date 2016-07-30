<?php

if ($_POST)
{

$v1=$_POST['v1'];
$v2=$_POST['v2'];
$v3=$_POST['v3'];
$v4=$_POST['v4'];
$v5=$_POST['v5'];
$v6=$_POST['v6'];
$v7=$_POST['v7'];
$v8=$_POST['v8'];
$v9=$_POST['v9'];
$v10=$_POST['v10'];

$BarValues=array($v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10);

header("Content-type: image/png");

$img=imagecreate(300, 300);
$white=imagecolorallocate($img, 255, 255, 255);
$black=imagecolorallocate($img, 0, 0, 0);

$red=imagecolorallocate($img, 255, 0, 0);
$LiteRed=imagecolorallocate($img, 200, 0, 0);

imageline($img, 0, 0, 0, 300, $black);
imageline($img, 0, 0, 300, 0, $black);
imageline($img, 299, 0, 299, 299, $black);
imageline($img, 0, 299, 299, 299, $black);


for ($i=1; $i<=10; $i++){
imageline($img, $i*30, 0, $i*30, 300, $black);
imageline($img, 0, $i*30, 300, $i*30, $black);
}

for($i=0; $i<10; $i++){
imagefilledrectangle($img, $i*30, (300-$BarValues[$i]), ($i+1)*30, 300, $LiteRed);
imagefilledrectangle($img, ($i*30)+1, (300-$BarValues[$i])+1, (($i+1)*30)-5, 298, $red);
}


imagepng($img);
imagedestroy($img);
?>

<img src="$_SERVER['PHP_SELF']">

<?php
}

else
{
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
ENTER values (between 0 and 300):
<ol>
<li>Value 1: <input type="text" name="v1" size=5>
<li>Value 2: <input type="text" name="v2" size=5>
<li>Value 3: <input type="text" name="v3" size=5>
<li>Value 4: <input type="text" name="v4" size=5>
<li>Value 5: <input type="text" name="v5" size=5>
<li>Value 6: <input type="text" name="v6" size=5>
<li>Value 7: <input type="text" name="v7" size=5>
<li>Value 8: <input type="text" name="v8" size=5>
<li>Value 9: <input type="text" name="v9" size=5>
<li>Value 10: <input type="text" name="v10" size=5>
</ol>
<input type="submit" value=" Plot ">
</form>

<?php
}
?>