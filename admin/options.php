<?php
add_action( 'admin_menu', 'aquila_add_admin_menu' );
add_action( 'admin_init', 'aquila_settings_init' );


function aquila_add_admin_menu(  ) { 

	add_submenu_page( 'index.php', 'Aquila Settings', '<i class="aquila-aquila" style="font-size: 140%;float: right;line-height: 0.8;"></i>  Aquila Settings', 'manage_options', 'aquilaSettings', 'aquila_options_page' );

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
		__( 'Show <em>Adminbar</em> links?', 'aquila-admin-theme' ), 
		'aquila_chk_abLinks_render', 
		'aatPage', 
		'aquila_aatPage_section' 
	);

	add_settings_field( 
		'aquila_chk_pluginSupport', 
		__( 'Show Editors <em>Plugins Support</em> metabox?', 'aquila-admin-theme' ), 
		'aquila_chk_pluginSupport_render', 
		'aatPage', 
		'aquila_aatPage_section' 
	);

	add_settings_field( 
		'aquila_chk_dashBoxes', 
		__( 'Show all other <em>Dashboard metaboxes</em>?', 'aquila-admin-theme' ), 
		'aquila_chk_dashBoxes_render', 
		'aatPage', 
		'aquila_aatPage_section' 
	);

	/*
	add_settings_field( 
		'aquila_text_field_2', 
		__( 'Settings field description', 'aquila-admin-theme' ), 
		'aquila_text_field_2_render', 
		'aatPage', 
		'aquila_aatPage_section' 
	);

	add_settings_field( 
		'aquila_radio_field_3', 
		__( 'Settings field description', 'aquila-admin-theme' ), 
		'aquila_radio_field_3_render', 
		'aatPage', 
		'aquila_aatPage_section' 
	);

	add_settings_field( 
		'aquila_textarea_field_4', 
		__( 'Settings field description', 'aquila-admin-theme' ), 
		'aquila_textarea_field_4_render', 
		'aatPage', 
		'aquila_aatPage_section' 
	);

	add_settings_field( 
		'aquila_select_field_5', 
		__( 'Settings field description', 'aquila-admin-theme' ), 
		'aquila_select_field_5_render', 
		'aatPage', 
		'aquila_aatPage_section' 
	);
	*/

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

/*
function aquila_text_field_2_render(  ) { 

	$options = get_option( 'aquila_settings' );
	?>
	<input type='text' name='aquila_settings[aquila_text_field_2]' value='<?php echo $options['aquila_text_field_2']; ?>'>
	<?php

}


function aquila_radio_field_3_render(  ) { 

	$options = get_option( 'aquila_settings' );
	?>
	<input type='radio' name='aquila_settings[aquila_radio_field_3]' <?php checked( $options['aquila_radio_field_3'], 1 ); ?> value='1'>
	<?php

}


function aquila_textarea_field_4_render(  ) { 

	$options = get_option( 'aquila_settings' );
	?>
	<textarea cols='40' rows='5' name='aquila_settings[aquila_textarea_field_4]'> 
		<?php echo $options['aquila_textarea_field_4']; ?>
 	</textarea>
	<?php

}


function aquila_select_field_5_render(  ) { 

	$options = get_option( 'aquila_settings' );
	?>
	<select name='aquila_settings[aquila_select_field_5]'>
		<option value='1' <?php selected( $options['aquila_select_field_5'], 1 ); ?>>Option 1</option>
		<option value='2' <?php selected( $options['aquila_select_field_5'], 2 ); ?>>Option 2</option>
	</select>

<?php

}
*/

function aquila_settings_section_callback(  ) { 

	echo __( '', 'aquila-admin-theme' );

}


function aquila_options_page(  ) { 

	?>
	<div class="wrap">
		<form action='options.php' method='post'>

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