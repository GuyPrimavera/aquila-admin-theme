<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

// Custom Footer
$aquilaOptions = get_option('aquila_settings');
if(isset($aquilaOptions['aquila_chk_hideFooter']) && $aquilaOptions['aquila_chk_hideFooter'] == 1) {
	function aquila_admin_footer_admin() {
		echo '';
	}
	add_filter('admin_footer_text', 'aquila_admin_footer_admin');
}
