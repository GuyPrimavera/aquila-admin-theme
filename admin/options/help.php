<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

function aquilaHelpCallback($args) {
	echo '<ul id="aquilaHelp">';
		aquila_help_box(
			'https://wordpress.org/plugins/aquila-admin-theme/',
			__('View this plugin on WordPress.org', 'aquila-admin-theme'),
			__('See the features and recent updates.', 'aquila-admin-theme')
		);
		aquila_help_box(
			'https://wordpress.org/support/plugin/aquila-admin-theme',
			__('View the support forum', 'aquila-admin-theme'),
			__('On WordPress.org.', 'aquila-admin-theme')
		);
		aquila_help_box(
			'https://wordpress.org/support/plugin/aquila-admin-theme#new-post',
			__('Ask a question', 'aquila-admin-theme'),
			__('Something not working? Let me know.', 'aquila-admin-theme')
		);
		aquila_help_box(
			'https://wordpress.org/plugins/aquila-admin-theme/#developers',
			__('See the ChangeLog', 'aquila-admin-theme'),
			__('See what\'s changed.', 'aquila-admin-theme')
		);
		aquila_help_box(
			'https://translate.wordpress.org/projects/wp-plugins/aquila-admin-theme',
			__('Translate into your language', 'aquila-admin-theme'),
			__('Je voudrais un sandwich.', 'aquila-admin-theme')
		);
		aquila_help_box(
			'https://github.com/GuyPrimavera/aquila-admin-theme',
			__('View the source code on GitHub', 'aquila-admin-theme'),
			__('It\'s a hub for gits.', 'aquila-admin-theme')
		);
		aquila_help_box(
			'https://plugins.trac.wordpress.org/browser/aquila-admin-theme/',
			__('View the source code on WP Trac', 'aquila-admin-theme'),
			__('Similar to GitHub.', 'aquila-admin-theme')
		);
		aquila_help_box(
			'https://plugins.trac.wordpress.org/log/aquila-admin-theme/',
			__('View the development log', 'aquila-admin-theme'),
			__('On WordPress.org.', 'aquila-admin-theme')
		);
		aquila_help_box(
			'https://wordpress.org/plugins/aquila-admin-theme/advanced/#plugin-download-history-stats',
			__('Previous versions', 'aquila-admin-theme'),
			__('Download an older version of the plugin.', 'aquila-admin-theme')
		);
		aquila_help_box(
			'https://guyprimavera.com/projects/wordpress-plugins/aquila-admin-theme/',
			__('View the plugin\'s web page', 'aquila-admin-theme'),
			__('On GuyPrimavera.com.', 'aquila-admin-theme')
		);
		aquila_help_box(
			'https://wordpress.org/support/plugin/aquila-admin-theme/reviews/#new-post',
			__('Leave a review', 'aquila-admin-theme'),
			__('Let me know what you think!', 'aquila-admin-theme')
		);
		aquila_help_box(
			'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YVPWSJB4SPN5N',
			__('Donate towards this plugin', 'aquila-admin-theme'),
			__('This full-version is free to use, but every little helps!', 'aquila-admin-theme')
		);
	echo '<ul>';
}
