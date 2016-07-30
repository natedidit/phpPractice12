<?php

$redPoint=array(10,32,100,90,80,140,160,180,90,190,220);
$bluePoint=array(14,18,19,56,67,87,95,160,100,90,40);
$greenPoint=array(80,60,70,90,140,150,160,190,220,100,240);

header("Content-type: image/png");

$img= imagecreate(300, 300);
$white= imagecolorallocate($img, 255, 255, 255);
$black= imagecolorallocate($img, 0, 0, 0);

//line colors
$red=imagecolorallocate($img, 255, 0,0);
$blue=imagecolorallocate($img, 0, 0, 255);
$green=imagecolorallocate($img, 0, 255, 0);

//border
imageline($img, 0, 0, 0, 300, $black);
imageline($img, 0, 0, 300, 0, $black);
imageline($img, 299, 0, 299, 299, $black);
imageline($img, 0, 299, 299, 299, $black);

//create grid
for ($i=1; $i<=10; $i++){
imageline($img, $i*30, 0, $i*30, 300, $black);
imageline($img, 0, $i*30, 300, $i*30, $black);
}

//create red line graph
for($i=0; $i<10; $i++){
imageline($img, $i*30, (300-$redPoint[$i]), ($i+1)*30, (300-$redPoint[$i+1]), $red);
}

//blue line graph
for($i=0; $i<10; $i++){
imageline($img, $i*30, (300-$bluePoint[$i]), ($i+1)*30, (300-$bluePoint[$i+1]), $blue);
}

//green line graph
for($i=0; $i<10; $i++){
imageline($img, $i*30, (300-$greenPoint[$i]), ($i+1)*30, (300-$greenPoint[$i+1]), $green);
}

imagepng($img);
imagedestroy($img);
?>

<img src="<?=$_SERVER['PHP_SELF']; ?>">
