<?php
/**
 * Plugin Name: Aquila Admin Theme
 * Plugin URI: https://wordpress.org/plugins/aquila-admin-theme/
 * Description: The Aquila Admin Theme
 * Author: Guy Primavera
 * Author URI: http://www.guyprimavera.com/
 * Version: 1.0
 * Text Domain: aquila-admin-theme
 * License: GPL2
 *
 * Copyright 2016 Guy Primavera
 */ 

$aquilaVer = 1.0;

include ('scripts.php');
include ('login/aquila-login-screen.php');
include ('admin/dashboard.php');
include ('admin/adminBar.php');
include ('admin/options.php');

// TODO: User guides feed.
// TODO: JetPack login page support.

?>