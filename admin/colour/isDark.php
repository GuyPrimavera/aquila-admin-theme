<?php 

function isDark($hexCode, $darknessVar) {

  // $darknessVar must be a number between 0 and 100
  // $lightnessVar = 180;

  if($hexCode[0] == '#')
    $hexCode = substr($hexCode, 1);

  if (strlen($hexCode) == 3)
  {
    $hexCode = $hexCode[0] . $hexCode[0] . $hexCode[1] . $hexCode[1] . $hexCode[2] . $hexCode[2];
  }

  $r = hexdec($hexCode[0] . $hexCode[1]);
  $g = hexdec($hexCode[2] . $hexCode[3]);
  $b = hexdec($hexCode[4] . $hexCode[5]);

  $rgbColour = $b + ($g << 0x8) + ($r << 0x10);

  // rgb to hsl

  $r = 0xFF & ($rgbColour >> 0x10);
  $g = 0xFF & ($rgbColour >> 0x8);
  $b = 0xFF & $rgbColour;

  $r = ((float)$r) / 255.0;
  $g = ((float)$g) / 255.0;
  $b = ((float)$b) / 255.0;

  $maxC = max($r, $g, $b);
  $minC = min($r, $g, $b);

  $l = ($maxC + $minC) / 2.0;

  if($maxC == $minC)
  {
    $s = 0;
    $h = 0;
  }
  else
  {
    if($l < .5)
    {
      $s = ($maxC - $minC) / ($maxC + $minC);
    }
    else
    {
      $s = ($maxC - $minC) / (2.0 - $maxC - $minC);
    }
    if($r == $maxC)
      $h = ($g - $b) / ($maxC - $minC);
    if($g == $maxC)
      $h = 2.0 + ($b - $r) / ($maxC - $minC);
    if($b == $maxC)
      $h = 4.0 + ($r - $g) / ($maxC - $minC);

    $h = $h / 6.0; 
  }

  $h = (int)round(255.0 * $h);
  $s = (int)round(255.0 * $s);
  $l = (int)round(255.0 * $l);

  $darkness = 100 - ( ( $l / 255 ) * 100 );

  //return (object) Array('hue' => $h, 'saturation' => $s, 'lightness' => $l);

  //return $l;

  if ($darkness > $darknessVar) {
    return true;
  } else {
    return false;
  }

}



?>