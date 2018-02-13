<?php 

function bright($hex, $adjustment){
   
    $adjustment = max(-255, min(255, $adjustment));  // Adjustment value is between 255 & -255
    $hex = str_replace('#', '', $hex);   //Remove # from string
    
    //if hex value is 3 numbers set to 6
    if (strlen($hex) == 3){
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    $colors = str_split($hex, 2); //split values into three channels
    $adjusted_value = '#';

    foreach($colors as $color) {
        $color = hexdec($color); //convert to decimal 
        $color = max(0, min(255, $color + $adjustment)); //perform adjustment
        $adjusted_value .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); //make two character hex code
    }

    return $adjusted_value;
}

?>