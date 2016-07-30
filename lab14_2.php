<?php
if($_POST)
{
$v1=$_POST['v1'];
$v2=$_POST['v2'];
$v3=$_POST['v3'];
$v4=$_POST['v4'];

Header("Content-type: image/png");
$image= ImageCreate(500,200);

$white= ImageColorAllocate($image, 255, 255, 255);
$black= ImageColorAllocate($image, 0, 0,0);
$red= ImageColorAllocate($image, 255, 0,0);
$green= ImageColorAllocate($image, 0, 255,0);
$blue= ImageColorAllocate($image, 0, 0,255);

imagefilledrectangle($image, 0, 0, $v1, 19, $blue);
imagefilledrectangle($image, 0, 20, $v2, 39, $red);
imagefilledrectangle($image, 0, 40, $v3, 59, $green);
imagefilledrectangle($image, 0, 60, $v4, 79, $black);

imagestring($image, 4, $v1+10, 0, $v1 . "(West Hills)", $black);
imagestring($image, 4, $v2+10, 20, $v2 . "(Pomona)", $black);
imagestring($image, 4, $v3+10, 40, $v3 . "(Long Beach)", $black);
imagestring($image, 4, $v4+10, 60, $v4 . "(Irvine)", $black);

ImagePNG($image);

imageSaveAlpha("test1.png", true);
ImageDestroy($image);
?>

<img src="<?=$_SERVER['PHP_SELF']; ?>">

<?php
}

else
{
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Enter Values (between 0 and 400):
<ol>
<li>West Hills: <input type="text" name="v1" size=5>
<li>Pomona: <input type="text" name="v2" size=5>
<li>Long Beach: <input type="text" name="v3" size=5>
<li>Irvine: <input type="text" name="v4" size=5>
</ol>
<input type="submit" value="Plot">
</form>

<?php
}
?>