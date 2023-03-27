<?php
// Youtube channel : https://www.youtube.com/@kingchobo
//http://localhost/project/piechart/index.php

$good_angle = 274;
$bad_angle = 360;

$width = 500;
$height = 500;
$im = imagecreate($width, $height);

imagecolorallocate($im, 255, 255, 255);

$color_good = imagecolorallocate($im, 255, 0, 0);
$color_bad = imagecolorallocate($im, 0, 0, 255);
$black = imagecolorallocate($im, 0, 0, 0);

$center_x = 255; $center_y = 255;
$pie_width = 400;
$pie_height = 400;


// arc
//imagefilledarc();
// Good 그리기
$start_angle = 0;
$end_angle = $good_angle;
$color = $color_good;
imagefilledarc(
  $im,
  $center_x, // 중심축 x
  $center_y, // 중심축 y
  $pie_width, // 호의 width
  $pie_height, // 호의 height
  $start_angle,
  $end_angle,
  $color,
  IMG_ARC_PIE
);

// Bad 그리기
$start_angle = $good_angle;
$end_angle = $bad_angle;
$color = $color_bad;
imagefilledarc(
  $im,
  $center_x + 5, // 중심축 x
  $center_y - 5, // 중심축 y
  $pie_width, // 호의 width
  $pie_height, // 호의 height
  $start_angle,
  $end_angle,
  $color,
  IMG_ARC_PIE
);

// 범례
$font_filename = 'NanumSquareB.ttf';

// 찬성
$x1 = 10; $y1 = 10;
$x2 = 40; $y2 = 35;
imagefilledrectangle($im, $x1, $y1, $x2, $y2, $color_good); // 색이 채워진 사각형
$font_size = 12;
$font_angle = 0;
$text = '찬성';
imagettftext(
  $im,
  $font_size,
  $font_angle,
  $x2 + 3,
  $y2 - 6,
  $black,
  $font_filename,
  $text);

// 반대
$x1 = 10; $y1 = 40;
$x2 = 40; $y2 = 65;
imagefilledrectangle($im, $x1, $y1, $x2, $y2, $color_bad); // 색이 채워진 사각형
$font_size = 12;
$font_angle = 0;
$text = '반대';
imagettftext(
  $im,
  $font_size,
  $font_angle,
  $x2 + 3,
  $y2 - 6,
  $black,
  $font_filename,
  $text);

  
// 1. 이미지를 바로 출력하기
//header('Content-Type: image/png');
//imagepng($im);

// 2. 이미지를 파일로 만들기
imagepng($im, "chart/pie2.png"); // 파일로 생성하기

imagedestroy($im);
?>
<img src="chart/pie2.png">
