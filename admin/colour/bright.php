<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

function bright($hex, $adjustment) {
  $adjustment = max(-255, min(255, $adjustment));
  $hex = str_replace('#', '', $hex);

  if (strlen($hex) == 3) {
    $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
  }
  $colors = str_split($hex, 2);
  $adjusted_value = '#';
  foreach ($colors as $color) {
    $color = hexdec($color);
    $color = max(0, min(255, $color + $adjustment));
    $adjusted_value .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
  }
  return $adjusted_value;
}
