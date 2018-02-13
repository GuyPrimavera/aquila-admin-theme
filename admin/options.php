<?php 
if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

add_action( 'admin_menu', 'aquila_add_admin_menu' );
add_action( 'admin_init', 'aquila_settings_init' );

function aquila_add_admin_menu(  ) { 

	add_submenu_page( 
		'options-general.php', 
		'Aquila Settings', 
		'<i class="aquila-aquila" style="font-size: 140%;float: right;line-height: 0.8;"></i>  Aquila Settings', 
		'manage_options', 
		'aquilaSettings', 
		'aquila_options_page' 
	);

}


function aquila_settings_init(  ) { 

	register_setting( 'aatPage', 'aquila_settings' );

	add_settings_section(
		'aquila_aatPage_section', 
		__( 'Aquila Settings', 'aquila-admin-theme' ), 
		'aquila_settings_section_callback', 
		'aatPage'
	);

	add_settings_field( 
		'aquila_chk_abLinks', 
		__( 'Show <strong>Adminbar</strong> links?', 'aquila-admin-theme' ), 
		'aquila_chk_abLinks_render', 
		'aatPage', 
		'aquila_aatPage_section' 
	);

	add_settings_field( 
		'aquila_chk_pluginSupport', 
		__( 'Show Editors <strong>Plugins Support</strong> metabox?', 'aquila-admin-theme' ), 
		'aquila_chk_pluginSupport_render', 
		'aatPage', 
		'aquila_aatPage_section' 
	);

	add_settings_field( 
		'aquila_chk_dashBoxes', 
		__( 'Show all other <strong>Dashboard metaboxes</strong>?', 'aquila-admin-theme' ), 
		'aquila_chk_dashBoxes_render', 
		'aatPage', 
		'aquila_aatPage_section' 
	);

	add_settings_field( 
		'aquila_chk_postBlog', 
		__( 'Do not rename <strong>Posts</strong> to <strong>Blog</strong>', 'aquila-admin-theme' ), 
		'aquila_chk_postBlog_render', 
		'aatPage', 
		'aquila_aatPage_section' 
	);

	add_settings_field( 
		'aquila_new_logo', 
		__( 'Custom logo', 'aquila-admin-theme' ), 
		'aquila_new_logo_render', 
		'aatPage', 
		'aquila_aatPage_section' 
	);

	add_settings_field( 
		'aquila_new_logo_sqr', 
		__( 'Custom logo (square) <br/><em>Used in the "folded" menu</em>', 'aquila-admin-theme' ), 
		'aquila_new_logo_sqr_render', 
		'aatPage', 
		'aquila_aatPage_section' 
	);

}


function aquila_chk_abLinks_render(  ) { 

	$options = get_option( 'aquila_settings' );
	if ( isset ( $options['aquila_chk_abLinks'] ) ) { $aquilaABLinks = $options['aquila_chk_abLinks'];
	} else { $aquilaABLinks = 0; };

	?>
	<input type='checkbox' name='aquila_settings[aquila_chk_abLinks]' <?php checked( $aquilaABLinks, 1 ); ?> value='1'>
	<?php

}


function aquila_chk_pluginSupport_render(  ) { 

	$options = get_option( 'aquila_settings' );
	if ( isset ( $options['aquila_chk_pluginSupport'] ) ) { $aquilaPluginSupport = $options['aquila_chk_pluginSupport']; 
	} else { $aquilaPluginSupport = 0; };

	?>
	<input type='checkbox' name='aquila_settings[aquila_chk_pluginSupport]' <?php checked( $aquilaPluginSupport, 1 ); ?> value='1'>
	<?php

}

function aquila_chk_dashBoxes_render(  ) { 

	$options = get_option( 'aquila_settings' );
	if ( isset ( $options['aquila_chk_dashBoxes'] ) ) { $aquilaDashBoxes = $options['aquila_chk_dashBoxes']; 
	} else { $aquilaDashBoxes = 0; };

	?>
	<input type='checkbox' name='aquila_settings[aquila_chk_dashBoxes]' <?php checked( $aquilaDashBoxes, 1 ); ?> value='1'>
	<?php

}

function aquila_chk_postBlog_render(  ) { 

	$options = get_option( 'aquila_settings' );
	if ( isset ( $options['aquila_chk_postBlog'] ) ) { $aquilaPostBlog = $options['aquila_chk_postBlog']; 
	} else { $aquilaPostBlog = 0; };

	?>
	<input type='checkbox' name='aquila_settings[aquila_chk_postBlog]' <?php checked( $aquilaPostBlog, 1 ); ?> value='1'>
	<?php

}

function aquila_new_logo_render(  ) { 

	$options = get_option( 'aquila_settings' );
	if ( isset ( $options['aquila_new_logo'] ) ) { 
		$aquilaNewLogo = $options['aquila_new_logo']; 
	} else { 
		$aquilaNewLogo = 'none'; 
	};
	?>

	<input class="aquilaNewLogoUrl" id="" type="text" name="aquila_settings[aquila_new_logo]" value="<?php echo $aquilaNewLogo; ?>" style="margin-bottom:10px; clear:right; display: none;">
	<a href="#" class="button aquilaNewLogoUpload">Upload logo</a>
	<a href="#" class="button aquilaNewLogoClear">Remove logo</a>
	<img class="aquilaOptionsLogo aquila_new_logo" src="<?php echo $aquilaNewLogo; ?>" />
	<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>
	<?php

}

function aquila_new_logo_sqr_render(  ) { 

	$options = get_option( 'aquila_settings' );
	if ( isset ( $options['aquila_new_logo_sqr'] ) ) { 
		$aquilaNewLogoSqr = $options['aquila_new_logo_sqr']; 
	} else { 
		$aquilaNewLogoSqr = 'none'; 
	};
	?>

	<input class="aquilaNewLogoUrl" id="" type="text" name="aquila_settings[aquila_new_logo_sqr]" value="<?php echo $aquilaNewLogoSqr; ?>" style="margin-bottom:10px; clear:right; display: none;">
	<a href="#" class="button aquilaNewLogoUpload">Upload logo</a>
	<a href="#" class="button aquilaNewLogoClear">Remove logo</a>
	<img class="aquilaOptionsLogo aquila_new_logo" src="<?php echo $aquilaNewLogoSqr; ?>" />
	<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>
	<?php

}


function aquila_settings_section_callback(  ) { 

	echo __( '', 'aquila-admin-theme' );

}


function aquila_options_page(  ) { 

	?>
	<div class="wrap">
		<form action='options.php' method='post' class='aquilaSettingsPage'>

			<h2><i class="aquila-aquila" style="font-size: 200%;line-height: 0.5;float: left;margin-right: 5px"></i></h2>

			<?php
			settings_fields( 'aatPage' );
			do_settings_sections( 'aatPage' );
			submit_button();
			?>

		</form>
	</div>
	<?php

}

?>