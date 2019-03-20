<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

// Helper functions

// Create checkboxes
function aquila_checkbox ( $optionGroup, $optionName, $helpText ) {
	$getOption = get_option( $optionGroup );
	if ( isset ( $getOption[$optionName] ) ) { 
		$optionValue = $getOption[$optionName]; 
	} else { 
		$optionValue = 0; 
	};
	echo '<input type="checkbox" name="'. $optionGroup .'['. $optionName .']" '. checked( $optionValue, 1, false ) .' value="1">';
	echo '<label for="'. $optionGroup .'['. $optionName .']">'. $helpText .'</label>';
}

// Create image uploaders
function aquila_img_upload( $optionGroup, $optionName ) {
	$options = get_option( $optionGroup );
	$aquilaColourSettings = get_option( 'aquilaColourSettings' );
	//$aquilaPrimary = $aquilaColourSettings['aquila_primary_colour'];
	//$aquilaSecondary = $aquilaColourSettings['aquila_secondary_colour'];
	$aquilaMenuBack = $aquilaColourSettings['aquila_menu_back_colour'];
	if ( isset ( $options[$optionName] ) ) { 
		$imgSrc = $options[$optionName]; 
	} else { 
		$imgSrc = 'none'; 
	};
	echo '<input class="aquilaNewLogoUrl" type="text" name="'. $optionGroup .'['. $optionName .']" value="'. $imgSrc .'" style="margin-bottom:10px; clear:right; display: none;">
	<a href="#" class="button aquilaNewLogoUpload">'. __( 'Upload logo', 'aquila-admin-theme' ) .'</a>
	<a href="#" class="button aquilaNewLogoClear">'. __( 'Remove logo', 'aquila-admin-theme' ) .'</a>
	<img style="background-color: '. $aquilaMenuBack .';" class="aquilaOptionsLogo '. $optionName .'" src="'. $imgSrc .'" />';
	echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) );
}

// Create colour pickers
function aquila_colour_picker( $optionGroup, $optionName ) {
	$options = get_option( $optionGroup );
	if ( isset ( $options[$optionName] ) && ( $options[$optionName] !== '' ) ) { 
		$colour = $options[$optionName]; 
	} else { 
		switch ($optionName) {
		case 'aquila_primary_colour':
			$colour = '#0091ea';
			break;
		case 'aquila_secondary_colour':
			$colour = '#e0e0e0';
			break;
		case 'aquila_background_colour':
			$colour = '#f5f5f5';
			break;
		case 'aquila_text_colour':
			$colour = '#23282d'; 
			break;
		case 'aquila_menu_back_colour':
			$colour = '#000000';
			break;
		case 'aquila_menu_text_colour':
			$colour = '#ffffff'; 
			break;
		default:
			$colour = '#000'; 
		}
	};
	echo '<input type="text" class="colourPicker" name="'. $optionGroup .'['. $optionName .']" id="" value="'. $colour .'" />';
}

// Help section helper
function aquila_help_box( $url, $title, $subtitle ) {
	echo '
		<li>
			<a href="'. $url .'" target="_blank">
				<h3>'. $title . '</h3>
				<h4>'. $subtitle .'</h4>
			</a>
		</li>
	';
}

?>