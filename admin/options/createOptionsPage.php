<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

function aquila_options_page() { 	?>
	<div class="wrap">

    <h2><?php esc_html_e('Aquila Settings', 'aquila-admin-theme'); ?></h2>

    <?php
      $allowed_tabs = array('generalsettings', 'logosettings', 'coloursettings', 'help');
      $active_tab = isset($_GET['tab']) ? sanitize_key(wp_unslash($_GET['tab'])) : 'generalsettings';
      if (!in_array($active_tab, $allowed_tabs, true)) {
        $active_tab = 'generalsettings';
      }
    ?>
    
    <h2 class="nav-tab-wrapper">
      <a href="<?php echo esc_url(add_query_arg(array('page' => 'aquilaSettings', 'tab' => 'generalsettings'), admin_url('options-general.php'))); ?>" class="nav-tab <?php echo esc_attr($active_tab == 'generalsettings' ? 'nav-tab-active' : ''); ?>"><?php esc_html_e('General Settings', 'aquila-admin-theme'); ?></a>
      <a href="<?php echo esc_url(add_query_arg(array('page' => 'aquilaSettings', 'tab' => 'logosettings'), admin_url('options-general.php'))); ?>" class="nav-tab <?php echo esc_attr($active_tab == 'logosettings' ? 'nav-tab-active' : ''); ?>"><?php esc_html_e('Custom Logo', 'aquila-admin-theme'); ?></a>
      <a href="<?php echo esc_url(add_query_arg(array('page' => 'aquilaSettings', 'tab' => 'coloursettings'), admin_url('options-general.php'))); ?>" class="nav-tab <?php echo esc_attr($active_tab == 'coloursettings' ? 'nav-tab-active' : ''); ?>"><?php esc_html_e('Color Scheme', 'aquila-admin-theme'); ?></a>
      <a href="<?php echo esc_url(add_query_arg(array('page' => 'aquilaSettings', 'tab' => 'help'), admin_url('options-general.php'))); ?>" class="nav-tab <?php echo esc_attr($active_tab == 'help' ? 'nav-tab-active' : ''); ?>"><?php esc_html_e('Help', 'aquila-admin-theme'); ?></a>
    </h2>

		<form action="options.php" method="post" class="aquilaSettingsPage">
	 
	    <?php 
        if ($active_tab == 'logosettings') {
          settings_fields('aquilaLogoSettings');
          do_settings_sections('aquilaLogoSettings');
          submit_button();
        } elseif ( $active_tab == 'coloursettings' ) {
          settings_fields('aquilaColourSettings');
          do_settings_sections('aquilaColourSettings');
          submit_button();
        } elseif ( $active_tab == 'help' ) {
          settings_fields('aquilaHelp');
          do_settings_sections('aquilaHelp');
        } else {
          settings_fields('aquilaGeneralSettings');
          do_settings_sections('aquilaGeneralSettings');
        	submit_button();
        } 
	    ?>
             
		</form>
	</div>

	<?php
}
