<?php

// Custom Footer
function aquila_admin_footer_admin () {
	echo '&copy; 2016 - <a href="https://designbymito.com/" target="_blank">design by Mito</a>';
}
add_filter('admin_footer_text', 'aquila_admin_footer_admin');

?>