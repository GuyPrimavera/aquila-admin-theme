<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

// Create checkboxes
function aquila_checkbox(string $optionGroup, string $optionName, string $helpText): void {
	$getOption = get_option($optionGroup);
	if (isset($getOption[$optionName])) { 
		$optionValue = $getOption[$optionName]; 
	} else { 
		$optionValue = 0; 
	};
	echo '<input type="checkbox" name="' . esc_attr($optionGroup) . '[' . esc_attr($optionName) . ']" ' . checked($optionValue, 1, false) . ' value="1">';
	echo '<label for="' . esc_attr($optionGroup) . '[' . esc_attr($optionName) . ']">' . wp_kses_post($helpText) . '</label>';
}

// Create image uploaders
function aquila_img_upload(string $optionGroup, string $optionName): void {
	$options = get_option($optionGroup);
	$aquilaColourSettings = get_option('aquilaColourSettings');
	$aquilaMenuBack = sanitize_hex_color($aquilaColourSettings['aquila_menu_back_colour'] ?? '#212121');
	if (!$aquilaMenuBack) {
		$aquilaMenuBack = '#212121';
	}
	if (isset($options[$optionName])) { 
		$imgSrc = $options[$optionName]; 
	} else { 
		$imgSrc = ''; 
	};
	echo '<input class="aquilaNewLogoUrl" type="text" name="' . esc_attr($optionGroup) . '[' . esc_attr($optionName) . ']" value="' . esc_attr($imgSrc) . '" style="margin-bottom:10px; clear:right; display: none;">
	<a href="#" class="button aquilaNewLogoUpload">' . esc_html__('Upload logo', 'aquila-admin-theme') . '</a>';

	if (!!$options && !!$imgSrc) {
		echo '<a href="#" class="button aquilaNewLogoClear">' . esc_html__('Remove logo', 'aquila-admin-theme') . '</a>';
	}
	echo '<img style="background-color: ' . esc_attr($aquilaMenuBack) . ';" class="aquilaOptionsLogo ' . esc_attr($optionName) . '" src="' . esc_url($imgSrc) . '" />';
}

// Create colour pickers
function aquila_colour_picker(string $optionGroup, string $optionName): void {
	$options = get_option($optionGroup);
	if (isset($options[$optionName]) && ($options[$optionName] !== '')) { 
		$colour = $options[$optionName]; 
	} else { 
		switch ($optionName) {
		case 'aquila_primary_colour':
			$colour = '#039be5'; 
			break;
		case 'aquila_secondary_colour':
			$colour = '#ffeb3b'; 
			break;
		case 'aquila_background_colour':
			$colour = '#f5f5f5'; 
			break;
		case 'aquila_link_text_colour':
			$colour = '#212121'; 
			break;
		case 'aquila_text_colour':
			$colour = '#23282d'; 
			break;
		case 'aquila_menu_back_colour':
			$colour = '#212121'; 
			break;
		case 'aquila_menu_text_colour':
			$colour = '#ffffff'; 
			break;
		default:
			$colour = '#000'; 
		}
	};
	echo '<input type="text" class="colourPicker" name="' . esc_attr($optionGroup) . '[' . esc_attr($optionName) . ']" value="' . esc_attr($colour) . '" />';
}

// Help section helper
function aquila_help_box(string $url, string $title, string $subtitle): void {
	echo '
		<li>
			<a href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer">
				<h3>' . esc_html($title) . '</h3>
				<h4>' . esc_html($subtitle) . '</h4>
			</a>
		</li>
	';
}

// Check checkbox values
function aquila_isset(string $var): bool {
	$aquilaOptions = get_option('aquila_settings');
	return (isset($aquilaOptions[$var]) && $aquilaOptions[$var] == 1);
}
