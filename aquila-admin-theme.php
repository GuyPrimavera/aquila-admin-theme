<?php
/**
 * Plugin Name: Aquila Admin Theme
 * Plugin URI: https://wordpress.org/plugins/aquila-admin-theme/
 * Description: The Aquila Admin Theme
 * Author: Guy Primavera
 * Author URI: https://guyprimavera.com/
 * Version: 2.2
 * Text Domain: aquila-admin-theme
 * Domain Path: /lang/
 * License: GPL2
 *
 * 2017 Guy Primavera
 */ 

$aquilaVer = "2.2";

include ('scripts.php');
include ('login/aquila-login-screen.php');
include ('admin/dashboard.php');
include ('admin/adminBar.php');
include ('admin/options.php');
include ('admin/colour/colourScheme.php');
?>