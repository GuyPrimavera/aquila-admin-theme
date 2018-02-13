<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

add_action( 'admin_menu', 'aquila_add_admin_menu' );
add_action( 'admin_init', 'aquila_settings_init' );

function aquila_add_admin_menu(  ) { 

	add_submenu_page( 
		'options-general.php', 
		__( 'Aquila Settings', 'aquila-admin-theme' ), 
		'<i class="aquila-aquila" style="font-size: 140%;float: right;line-height: 0.8;"></i>  ' . __( 'Aquila', 'aquila-admin-theme' ), 
		'manage_options', 
		'aquilaSettings', 
		'aquila_options_page' 
	);

}

function aquila_settings_init(  ) { 

	register_setting( 'aquilaGeneralSettings', 'aquila_settings' );

	add_settings_section(
		'aquila_aquilaGeneralSettings_section', 
		__( 'Aquila Settings', 'aquila-admin-theme' ), 
		'aquilaGeneralCallback', 
		'aquilaGeneralSettings'
	);

	add_settings_field( 
		'aquila_chk_abLinks', 
		__( 'Show <strong>Adminbar</strong> links?', 'aquila-admin-theme' ), 
		'aquila_chk_abLinks_render', 
		'aquilaGeneralSettings', 
		'aquila_aquilaGeneralSettings_section' 
	);

	add_settings_field( 
		'aquila_chk_pluginSupport', 
		__( 'Show Editors <strong>Plugins Support</strong> metabox?', 'aquila-admin-theme' ), 
		'aquila_chk_pluginSupport_render', 
		'aquilaGeneralSettings', 
		'aquila_aquilaGeneralSettings_section' 
	);

	add_settings_field( 
		'aquila_chk_dashBoxes', 
		__( 'Show all other <strong>Dashboard metaboxes</strong>?', 'aquila-admin-theme' ), 
		'aquila_chk_dashBoxes_render', 
		'aquilaGeneralSettings', 
		'aquila_aquilaGeneralSettings_section' 
	);

	add_settings_field( 
		'aquila_chk_postBlog', 
		__( 'Do not rename <strong>Posts</strong> to <strong>Blog</strong>', 'aquila-admin-theme' ), 
		'aquila_chk_postBlog_render', 
		'aquilaGeneralSettings', 
		'aquila_aquilaGeneralSettings_section' 
	);

	add_settings_field( 
		'aquila_chk_hideFooter', 
		__( 'Hide <strong>Footer credit</strong> link.', 'aquila-admin-theme' ), 
		'aquila_chk_hideFooter_render', 
		'aquilaGeneralSettings', 
		'aquila_aquilaGeneralSettings_section' 
	);

	add_settings_field( 
		'aquila_chk_showNag', 
		__( 'Show <strong>WordPress Update</strong> notices.', 'aquila-admin-theme' ), 
		'aquila_chk_showNag_render', 
		'aquilaGeneralSettings', 
		'aquila_aquilaGeneralSettings_section' 
	);


	// Custom Logo

	register_setting( 'aquilaLogoSettings', 'aquilaLogoSettings' );

	add_settings_section(
		'aquila_aquilaLogoSettings_section', 
		__( 'Custom Logo', 'aquila-admin-theme' ), 
		'aquilaLogoCallback', 
		'aquilaLogoSettings'
	);

	add_settings_field( 
		'aquila_new_logo', 
		__( 'Custom logo', 'aquila-admin-theme' ), 
		'aquila_new_logo_render', 
		'aquilaLogoSettings', 
		'aquila_aquilaLogoSettings_section' 
	);

	add_settings_field( 
		'aquila_new_logo_sqr', 
		__( 'Custom logo (square) <br/><em>Used in the "folded" menu</em>', 'aquila-admin-theme' ), 
		'aquila_new_logo_sqr_render', 
		'aquilaLogoSettings', 
		'aquila_aquilaLogoSettings_section' 
	);


	// Colour Scheme

	register_setting( 'aquilaColourSettings', 'aquilaColourSettings' );

	add_settings_section(
		'aquila_aquilaColourSettings_section', 
		__( 'Color Scheme', 'aquila-admin-theme' ), 
		'aquilaColourCallback', 
		'aquilaColourSettings'
	);

	add_settings_field( 
		'aquila_primary_colour', 
		__( 'Primary Color', 'aquila-admin-theme' ), 
		'aquila_primary_colour_render', 
		'aquilaColourSettings', 
		'aquila_aquilaColourSettings_section' 
	);

	add_settings_field( 
		'aquila_secondary_colour', 
		__( 'Secondary Color', 'aquila-admin-theme' ), 
		'aquila_secondary_colour_render', 
		'aquilaColourSettings', 
		'aquila_aquilaColourSettings_section' 
	);

	add_settings_field( 
		'aquila_menu_back_colour', 
		__( 'Menu Background Color', 'aquila-admin-theme' ), 
		'aquila_menu_back_colour_render', 
		'aquilaColourSettings', 
		'aquila_aquilaColourSettings_section' 
	);

}


function aquila_chk_abLinks_render(  ) { 

	$options = get_option( 'aquila_settings' );
	if ( isset ( $options['aquila_chk_abLinks'] ) ) { $aquilaABLinks = $options['aquila_chk_abLinks'];
	} else { 
		$aquilaABLinks = 0; 
	};
	?>
	<input type='checkbox' name='aquila_settings[aquila_chk_abLinks]' <?php checked( $aquilaABLinks, 1 ); ?> value='1'>
	<?php

}


function aquila_chk_pluginSupport_render(  ) { 

	$options = get_option( 'aquila_settings' );
	if ( isset ( $options['aquila_chk_pluginSupport'] ) ) { $aquilaPluginSupport = $options['aquila_chk_pluginSupport']; 
	} else { 
		$aquilaPluginSupport = 0; 
	};
	?>
	<input type='checkbox' name='aquila_settings[aquila_chk_pluginSupport]' <?php checked( $aquilaPluginSupport, 1 ); ?> value='1'>
	<?php

}

function aquila_chk_dashBoxes_render(  ) { 

	$options = get_option( 'aquila_settings' );
	if ( isset ( $options['aquila_chk_dashBoxes'] ) ) { $aquilaDashBoxes = $options['aquila_chk_dashBoxes']; 
	} else { 
		$aquilaDashBoxes = 0; 
	};
	?>
	<input type='checkbox' name='aquila_settings[aquila_chk_dashBoxes]' <?php checked( $aquilaDashBoxes, 1 ); ?> value='1'>
	<?php

}

function aquila_chk_postBlog_render(  ) { 

	$options = get_option( 'aquila_settings' );
	if ( isset ( $options['aquila_chk_postBlog'] ) ) { $aquilaPostBlog = $options['aquila_chk_postBlog']; 
	} else { 
		$aquilaPostBlog = 0; 
	};
	?>
	<input type='checkbox' name='aquila_settings[aquila_chk_postBlog]' <?php checked( $aquilaPostBlog, 1 ); ?> value='1'>
	<?php

}

function aquila_chk_hideFooter_render(  ) { 

	$options = get_option( 'aquila_settings' );
	if ( isset ( $options['aquila_chk_hideFooter'] ) ) { $aquilaHideFooter = $options['aquila_chk_hideFooter']; 
	} else { 
		$aquilaHideFooter = 0; 
	};
	?>
	<input type='checkbox' name='aquila_settings[aquila_chk_hideFooter]' <?php checked( $aquilaHideFooter, 1 ); ?> value='1'>
	<?php

}

function aquila_chk_showNag_render(  ) { 

	$options = get_option( 'aquila_settings' );
	if ( isset ( $options['aquila_chk_showNag'] ) ) { $aquilaShowNag = $options['aquila_chk_showNag']; 
	} else { 
		$aquilaShowNag = 0; 
	};
	?>
	<input type='checkbox' name='aquila_settings[aquila_chk_showNag]' <?php checked( $aquilaShowNag, 1 ); ?> value='1'>
	<?php

}

function aquila_new_logo_render(  ) { 

	$options = get_option( 'aquilaLogoSettings' );
	if ( isset ( $options['aquila_new_logo'] ) ) { 
		$aquilaNewLogo = $options['aquila_new_logo']; 
	} else { 
		$aquilaNewLogo = 'none'; 
	};
	?>

	<input class="aquilaNewLogoUrl" id="" type="text" name="aquilaLogoSettings[aquila_new_logo]" value="<?php echo $aquilaNewLogo; ?>" style="margin-bottom:10px; clear:right; display: none;">
	<a href="#" class="button aquilaNewLogoUpload"><?php _e( 'Upload logo', 'aquila-admin-theme' ); ?></a>
	<a href="#" class="button aquilaNewLogoClear"><?php _e( 'Remove logo', 'aquila-admin-theme' ); ?></a>
	<img class="aquilaOptionsLogo aquila_new_logo" src="<?php echo $aquilaNewLogo; ?>" />
	<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>
	<?php

}

function aquila_new_logo_sqr_render(  ) { 

	$options = get_option( 'aquilaLogoSettings' );
	if ( isset ( $options['aquila_new_logo_sqr'] ) ) { 
		$aquilaNewLogoSqr = $options['aquila_new_logo_sqr']; 
	} else { 
		$aquilaNewLogoSqr = 'none'; 
	};
	?>

	<input class="aquilaNewLogoUrl" id="" type="text" name="aquilaLogoSettings[aquila_new_logo_sqr]" value="<?php echo $aquilaNewLogoSqr; ?>" style="margin-bottom:10px; clear:right; display: none;">
	<a href="#" class="button aquilaNewLogoUpload"><?php _e( 'Upload logo', 'aquila-admin-theme' ); ?></a>
	<a href="#" class="button aquilaNewLogoClear"><?php _e( 'Remove logo', 'aquila-admin-theme' ); ?></a>
	<img class="aquilaOptionsLogo aquila_new_logo" src="<?php echo $aquilaNewLogoSqr; ?>" />
	<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>
	<?php

}

// Colour Pickers

function aquila_primary_colour_render() {

	$options = get_option( 'aquilaColourSettings' );
	if ( isset ( $options['aquila_primary_colour'] ) && ( $options['aquila_primary_colour'] !== '' ) ) { 
		$aquilaPrimaryColour = $options['aquila_primary_colour']; 
	} else { 
		$aquilaPrimaryColour = '#ffee58'; 
	};
	?>

	<input type="text" class="colourPicker" name="aquilaColourSettings[aquila_primary_colour]" id='colourPicker1' value="<?php echo $aquilaPrimaryColour; ?>" />

	<?php
}

function aquila_secondary_colour_render() {

	$options = get_option( 'aquilaColourSettings' );
	if ( isset ( $options['aquila_secondary_colour'] ) && ( $options['aquila_secondary_colour'] !== '' ) ) { 
		$aquilaSecondaryColour = $options['aquila_secondary_colour']; 
	} else { 
		$aquilaSecondaryColour = '#0091ea'; 
	};
	?>

	<input type="text" class="colourPicker" name="aquilaColourSettings[aquila_secondary_colour]" id='colourPicker2' value="<?php echo $aquilaSecondaryColour; ?>" />

	<?php
}

function aquila_menu_back_colour_render() {

	$options = get_option( 'aquilaColourSettings' );
	if ( isset ( $options['aquila_menu_back_colour'] ) && ( $options['aquila_menu_back_colour'] !== '' ) ) { 
		$aquilaMenuBackColour = $options['aquila_menu_back_colour']; 
	} else { 
		$aquilaMenuBackColour = '#616161'; 
	};
	?>

	<input type="text" class="colourPicker" name="aquilaColourSettings[aquila_menu_back_colour]" id='colourPicker2' value="<?php echo $aquilaMenuBackColour; ?>" />

	<?php
}

function aquilaGeneralCallback(  ) { 
	echo __( 'General changes to your admin area.', 'aquila-admin-theme' );
}

function aquilaLogoCallback(  ) { 
	echo __( 'Choose a custom logo for your admin area.', 'aquila-admin-theme' );
}

function aquilaColourCallback(  ) { 
	echo __( 'Select a new color scheme for the admin area.', 'aquila-admin-theme' );
}


function aquila_options_page(  ) { 	?>
	<div class="wrap">

    <h2><?php _e( 'Aquila Settings', 'aquila-admin-theme' ); ?></h2>
    <?php //settings_errors(); ?>

    <?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'generalSettings'; ?>
     
    <h2 class="nav-tab-wrapper">
        <a href="?page=aquilaSettings&tab=generalSettings" class="nav-tab <?php echo $active_tab == 'generalSettings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'General Settings', 'aquila-admin-theme' ); ?></a>
        <a href="?page=aquilaSettings&tab=logoSettings" class="nav-tab <?php echo $active_tab == 'logoSettings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Custom Logo', 'aquila-admin-theme' ); ?></a>
        <a href="?page=aquilaSettings&tab=colourSettings" class="nav-tab <?php echo $active_tab == 'colourSettings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Color Scheme', 'aquila-admin-theme' ); ?></a>
    </h2>

		<form action='options.php' method='post' class='aquilaSettingsPage'>
	 
	    <?php 

        if( $active_tab == 'generalSettings' ) {
          settings_fields( 'aquilaGeneralSettings' );
          do_settings_sections( 'aquilaGeneralSettings' );
          submit_button();
        } elseif ( $active_tab == 'logoSettings' ) {
          settings_fields( 'aquilaLogoSettings' );
          do_settings_sections( 'aquilaLogoSettings' );
          submit_button();
        } elseif ( $active_tab == 'colourSettings' ) {
          settings_fields( 'aquilaColourSettings' );
          do_settings_sections( 'aquilaColourSettings' );
					submit_button();
        } else {
          settings_fields( 'aquilaGeneralSettings' );
          do_settings_sections( 'aquilaGeneralSettings' );
        	submit_button();
        }
         
        //submit_button();

	    ?>
             
		</form>
	</div>

	<?php

}

?>