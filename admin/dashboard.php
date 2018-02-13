<?php

// Remove widgets //

function aquila_admin_remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
        remove_meta_box( 'ai_dashboard_widget', 'dashboard', 'normal' );
        remove_meta_box( 'welcome-panel', 'dashboard', 'normal' );
        remove_meta_box( 'dashboardb_range', 'dashboard', 'normal' );		
        remove_meta_box( 'sdf_dashboard_widget', 'dashboard', 'normal' );		
}
add_action( 'admin_init', 'aquila_admin_remove_dashboard_meta' );


// End remove widgets //

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function aquila_admin_welcome_widget() {
	
	$aquilaName = get_bloginfo('name');

	wp_add_dashboard_widget(
                 'welcome-to-aquila',         // Widget slug.
                 $aquilaName,         // Title.
                 'aquila_admin_welcome_widget_function' // Display function.
        );
}
add_action( 'wp_dashboard_setup', 'aquila_admin_welcome_widget' );

/**
 * Create the function to output the contents of Dashboard Widget.
 */
function aquila_admin_welcome_widget_function() {
	
	global $aquilaVer;
	$wordpressVer = get_bloginfo('version');
	$aquilaName = get_bloginfo('name');
	$aquilaUrl = get_bloginfo('url');

	echo "	
	<p class='about-description'>
		<h2>Website Information</h2>
		<ul>
			<li>WordPress Version: &nbsp; " . $wordpressVer . "</li>
			<li>Website Address: &nbsp; <a href='" . $aquilaUrl . "' target='_blank'>" . $aquilaUrl . "</a></li>
		</ul>
		<h2>Aquila Information</h2>
		<ul>
			<li>Aquila Version: &nbsp; " . $aquilaVer . "</li>
			<li>Author: &nbsp; Guy Primavera (<a href='https://designbymito.com/' target='_blank'>design by Mito</a>)</li>
		</ul>
	</p>
	";
}

function aquila_admin_support_widget() {
	
	wp_add_dashboard_widget(
	 'aquila-support',         			// Widget slug.
	 'Support',         						// Title.
	 'aquila_admin_support_widget_function' 	// Display function.
	);
}
add_action( 'wp_dashboard_setup', 'aquila_admin_support_widget' );

function aquila_admin_support_widget_function() {
	
	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) { 
		$supportVC = "<li><a href='https://vc.wpbakery.com/video-tutorials/' target='_blank'>Visual Composer Support</a></li>";
	}
	if ( is_plugin_active( 'revslider/revslider.php' ) ) { 
		$supportRev = "<li><a href='https://www.themepunch.com/revslider-doc/slider-revolution-documentation/' target='_blank'>Slider Revolution Support</a></li>";
	}
	if ( is_plugin_active( 'jetpack/jetpack.php' ) ) { 
		$supportJP = "<li><a href='https://jetpack.com/support/' target='_blank'>Jetpack Support</a></li>";
	}
	if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) { 
		$supportSC = "<li><a href='https://docs.woothemes.com/documentation/plugins/woocommerce/getting-started/' target='_blank'>WooCommerce Support</a></li>";
	}
	
	
	echo "	
	<p class='about-description'>
		<h2>Aquila Support</h2>
		<ul>
			<li><a href='https://designbymito.com/guides/product/aquila/' target='_blank'>Aquila User Guides</a></li>
			<li><a href='https://designbymito.com/contact/' target='_blank'>Mito Support</a></li>
			<li><a href='mailto:support@designbymito.com' target='_blank'>Email Support</a></li>
		</ul>
		<h2>WordPress Support</h2>
		<ul>
			<li><a href='https://codex.wordpress.org/WordPress_Lessons' target='_blank'>WordPress Lessons</a></li>
			<li><a href='http://easywpguide.com/wordpress-manual/' target='_blank'>WordPress User Guide</a></li>
		</ul>
		<h2>Plugins Support</h2>
		<ul>
			" . $supportVC . $supportRev . $supportJP . $supportSC . "
		</ul>
	</p>
	";
}

// Add role to body

function aquila_admin_body_role($classes) {
global $current_user;
$user_role = array_shift($current_user->roles);
$classes .= 'role-'. $user_role;
return $classes;
}
//add_filter('body_class','aquila_admin_body_role');
add_filter('admin_body_class', 'aquila_admin_body_role');

function aquila_admin_body_class($classes) {
        $classes[] = 'aquila';
        return $classes;
}
add_filter('body_class', 'aquila_admin_body_class');
//add_filter('admin_body_class', 'aquila_admin_body_class');

function aquila_admin_bar() {

if ( is_admin_bar_showing() ) {

	echo "<style type='text/css' media='screen'>
		html { margin-top: 50px !important; }
		* html body { margin-top: 50px !important; }
		@media screen and ( max-width: 782px ) {
			html { margin-top: 46px !important; }
			* html body { margin-top: 46px !important; }
		}
	</style>
	";
}
}
	 
add_action( 'wp_head', 'aquila_admin_bar', 99 ); 

//hide core updates notification in the dashboard

function aquila_admin_update_nag() {
    remove_action( 'admin_notices', 'update_nag', 3 ); //update notice at the top of the screen
    remove_filter( 'update_footer', 'core_update_footer' ); //update notice in the footer
}
add_action('admin_menu','aquila_admin_update_nag');


function aquila_admin_menu_classes() 
{
	global $menu;

	foreach ((array) $menu as $key => $val) {
	//foreach ( $menu as $key => $val ) {
		if ( 'Dashboard' == $val[0] ) {
			$menu[$key][0] = 'Aquila';
			$menu[$key][6] = 'dashicons- aql-aquila';
		}
		//if ( 'Posts' == $val[0] ) {
			//$menu[$key][0] = 'Blog';
		//}
	}		
	
}

add_action( 'admin_init','aquila_admin_menu_classes' );


function aquila_admin_post_to_blog() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Blog';
    $submenu['edit.php'][10][0] = 'Add Blog Post';
    $submenu['edit.php'][16][0] = 'Blog Tags';
    echo '';
}
function aquila_admin_blog_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blog';
    $labels->singular_name = 'Blog Post';
    $labels->add_new = 'Add Blog Post';
    $labels->add_new_item = 'Add Blog Post';
    $labels->edit_item = 'Edit Blog Post';
    $labels->new_item = 'Blog Post';
    $labels->view_item = 'View Blog Post';
    $labels->search_items = 'Search Blog Posts';
    $labels->not_found = 'No Blog Posts found';
    $labels->not_found_in_trash = 'No Blog Posts found in Trash';
    $labels->all_items = 'All Blog Posts';
    $labels->menu_name = 'Blog';
    $labels->name_admin_bar = 'Blog';
}
 
add_action( 'admin_menu', 'aquila_admin_post_to_blog' );
add_action( 'init', 'aquila_admin_blog_object' );


// Custom Footer
function aquila_admin_footer_admin () {
	echo '&copy; 2016 - <a href="https://designbymito.com/" target="_blank">design by Mito</a>';
}
add_filter('admin_footer_text', 'aquila_admin_footer_admin');

// Blog //

function aquila_admin_blog_meta_boxes() {
	remove_meta_box( 'formatdiv' , 'post' , 'normal' ); 
	remove_meta_box( 'mymetabox_revslider_0' , 'post' , 'normal' ); 
}
add_action( 'admin_menu' , 'aquila_admin_blog_meta_boxes' );



?>