<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

function aquila_options_page() { 	?>
	<div class="wrap">

    <h2><?php _e('Aquila Settings', 'aquila-admin-theme'); ?></h2>

    <?php $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'generalSettings'; ?>
    
    <h2 class="nav-tab-wrapper">
      <a href="?page=aquilaSettings&tab=generalSettings" class="nav-tab <?php echo $active_tab == 'generalSettings' ? 'nav-tab-active' : ''; ?>"><?php _e('General Settings', 'aquila-admin-theme'); ?></a>
      <a href="?page=aquilaSettings&tab=logoSettings" class="nav-tab <?php echo $active_tab == 'logoSettings' ? 'nav-tab-active' : ''; ?>"><?php _e('Custom Logo', 'aquila-admin-theme'); ?></a>
      <a href="?page=aquilaSettings&tab=colourSettings" class="nav-tab <?php echo $active_tab == 'colourSettings' ? 'nav-tab-active' : ''; ?>"><?php _e('Color Scheme', 'aquila-admin-theme'); ?></a>
      <a href="?page=aquilaSettings&tab=help" class="nav-tab <?php echo $active_tab == 'help' ? 'nav-tab-active' : ''; ?>"><?php _e('Help', 'aquila-admin-theme'); ?></a>
    </h2>

		<form action="options.php" method="post" class="aquilaSettingsPage">
	 
	    <?php 
        if ($active_tab == 'logoSettings') {
          settings_fields('aquilaLogoSettings');
          do_settings_sections('aquilaLogoSettings');
          submit_button();
        } elseif ( $active_tab == 'colourSettings' ) {
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
