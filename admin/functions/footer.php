<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

// Custom Footer
$aquilaOptions = get_option( 'aquila_settings' );
if(isset($aquilaOptions['aquila_chk_hideFooter']) && $aquilaOptions['aquila_chk_hideFooter'] == 1){
	// do nothing
} else {
}

?>