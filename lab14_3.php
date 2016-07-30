<?php

if ($_POST)
{
$v1=round($_POST['POM']*360, 0);
$v2=$v1+round($_POST['WH']*360, 0);
$v3=$v2+round($_POST['LB']*360, 0);

$p1= $_POST['POM'];
$p2= $_POST['WH'];
$p3 = $_POST['LB'];
$p4= 1- ($p1+$p2+$p3);

header('Content-type: image/png');

$image= imagecreate(550, 400);

$white= imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
$green= imagecolorallocate($image, 0x00, 0xFF, 0x00);
$blue= imagecolorallocate($image, 0x00, 0x00, 0xFF);
$red= imagecolorallocate($image, 0xFF, 0x00, 0x00);
$gray= imagecolorallocate($image, 0xC0, 0xC0, 0x00);
$black= imagecolorallocate($image, 0xC0, 0xC0, 0xC0);

imagefilledarc($image, 200, 200, 300, 300, 0, $v1, $green, IMG_ARC_PIE);
imagefilledarc($image, 200, 200, 300, 300, $v1, $v2, $blue, IMG_ARC_PIE);
imagefilledarc($image, 200, 200, 300, 300, $v2, $v3, $red, IMG_ARC_PIE);
imagefilledarc($image, 200, 200, 300, 300, $v3, 360, $gray, IMG_ARC_PIE);

imagefilledrectangle($image, 360, 300, 375, 315, $green);
imagestring($image, 4, 380, 300, ($p1*100) . "% (POMONA)", $black);

imagefilledrectangle($image, 360, 320, 375, 335, $blue);
imagestring($image, 4, 380, 320, ($p2*100) . "% (West Hills)", $black);

imagefilledrectangle($image, 360, 340, 375, 355, $red);
imagestring($image, 4, 380, 340, ($p3*100) . "% (Long Beach)", $black);

imagefilledrectangle($image, 360, 360, 375, 375, $gray);
imagestring($image, 4, 380, 360, ($p4*100) . "% (Others)", $black);

$black= imagecolorallocate($image,0,0,0);
imagestring($image,5, 150, 10, "Sales Revenue", $black);

imagepng($image);
imagedestroy($image);
?>

<img src="<?=$_SERVER['PHP_SELF']; ?>">

<?php
}

else
{
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Enter percentage (between 0 and 1):
<ol>
<li>Pomona: <input type="text" name="POM" size=5>
<li>West Hills: <input type="text" name="WH" size=5>
<li>Long Beach: <input type="text" name="LB" size=5>
<li>Others: 
</ol>
<input type="submit" value="Plot">
</form>

<?php
}
?>