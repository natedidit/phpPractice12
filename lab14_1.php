<?php

Header("Content-type: image/png");
$image= ImageCreate(400,400);

$white= ImageColorAllocate($image, 255, 255, 255);
$black= ImageColorAllocate($image, 0, 0,0);
$red= ImageColorAllocate($image, 255, 0,0);
$green= ImageColorAllocate($image, 0, 255,0);
$blue= ImageColorAllocate($image, 0, 0,255);

ImageArc ($image, 100, 100, 150, 150, 0, 360, $black);
ImageFilledArc($image, 200, 200, 50, 50, 0, 360, $black, IMG_ARC_PIE);
ImageRectangle($image, 60, 60, 10, 300, $blue);
ImageLine($image, 5, 390, 390, 10, $red);
imagefilledrectangle($image, 300, 150, 390, 380, $green);

ImagePNG($image);
ImageDestroy($image);

?>