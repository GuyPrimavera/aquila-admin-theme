<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

// Callbacks
function aquilaDashboardCallback() {
	//echo __('Configure your Dashboard', 'aquila-admin-theme');
}

function aquilaAdminbarCallback() {
	//echo __('Configure your admin bar', 'aquila-admin-theme');
}

function aquilaLoginCallback() {
	/*echo '<form action="#">
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" id="sample3">
			<label class="mdl-textfield__label" for="sample3">Text...</label>
		</div>
	</form>';*/
}

function aquilaLogoCallback() {
	echo __('Choose a custom logo for your admin area.', 'aquila-admin-theme');
}

function aquilaColourCallback() { 
	echo __('Select a new color scheme for the admin area.', 'aquila-admin-theme');
}

function aquilaColourMenuCallback() { 
	echo __('Select colors for the admin menu and admin bar.', 'aquila-admin-theme');
}
