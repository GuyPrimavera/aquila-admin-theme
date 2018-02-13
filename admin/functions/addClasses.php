<?php

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

?>