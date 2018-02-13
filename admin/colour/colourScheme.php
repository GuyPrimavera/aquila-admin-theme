<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { exit; }

if ( is_admin() ) {
	add_action('admin_head', 'colourSchemeCSS');
} else {
	add_action('wp_before_admin_bar_render', 'colourSchemeCSS');
}

add_action('login_head', 'colourSchemeCSS');


function colourSchemeCSS() {

include('mdColours.php');
include('bright.php');
include('isDark.php');

/// Define custom colours

$aquilaColourSettings = get_option( 'aquilaColourSettings' );
$aquilaPrimary = $aquilaColourSettings['aquila_primary_colour'];
$aquilaSecondary = $aquilaColourSettings['aquila_secondary_colour'];
$aquilaMenuBack = $aquilaColourSettings['aquila_menu_back_colour'];

// Check darkness of custom colours

if ( $aquilaPrimary ) {
  $pri = $aquilaPrimary;
  if( isDark( $pri, 99 ) ) {
    $priNew = $mdGrey900;
  } elseif( !isDark( $pri, 1 ) ) {
    $priNew = $mdGrey50;
  } else {
    $priNew = $pri;
  }
} else {
  $pri = $mdYellow400;
  $priNew = $pri;
}

if ( $aquilaSecondary ) {
  $sec = $aquilaSecondary;
  if( isDark( $sec, 99 ) ) {
    $secNew = $mdGrey900;
  } elseif( !isDark( $sec, 1 ) ) {
    $secNew = $mdGrey50;
  } else {
    $secNew = $sec;
  }
} else {
  $sec = $mdLightBlueA700;
  $secNew = $sec;
}

if ( $aquilaMenuBack ) {
  $menu = $aquilaMenuBack;
  if( isDark( $menu, 99 ) ) {
    $menuNew = $mdGrey900;
  } elseif( !isDark( $menu, 1 ) ) {
    $menuNew = $mdGrey100;
  } else {
    $menuNew = $menu;
  }
} else {
  $menu = $mdGrey700;
  $menuNew = $menu;
}


/// Modify selected colours

if( isDark( $pri, 50 ) ) {
  $priText = $mdWhite;
  $pri2 = bright( $priNew, 20);
  $pri3 = bright( $priNew, 40);
} else {
  $priText = $mdGrey900;
  $pri2 = bright( $priNew, -20);
  $pri3 = bright( $priNew, -40);
}
$priD = bright( $priNew, -120);
if( isDark( $sec, 50 ) ) {
  $secText = $mdWhite;
  $sec2 = bright( $secNew, 20);
  $sec3 = bright( $secNew, 40);
} else {
  $secText = $mdGrey900;
  $sec2 = bright( $secNew, -20);
  $sec3 = bright( $secNew, -40);
}

if( isDark( $menu, 50 ) ) {
  $menuText = $mdWhite;
  $menu2 = bright( $menuNew, 20);
  $menu3 = bright( $menuNew, 40);
} else {
  $menuText = $mdGrey900;
  $menu2 = bright( $menuNew, -20);
  $menu3 = bright( $menuNew, -40);
}
$bodyBack = $mdGrey100;
$disabled = $mdGrey500;
$linkText = $mdGrey900;

// LessPHP

require "lessc.inc.php";
$less = new lessc;
$less->setFormatter("compressed");

$less->setVariables(array(
  "pri"       => $pri,
  "pri2"      => $pri2,
  "pri3"      => $pri3,
  "priText"   => $priText,
  "sec"       => $sec,
  "sec2"      => $sec2,
  "sec3"      => $sec3,
  "secText"   => $secText,
  "menu"      => $menu,
  "menu2"     => $menu2,
  "menu3"     => $menu3,
  "menuText"  => $menuText,
  "bodyBack"  => $bodyBack,
  "disabled"  => $disabled,
  "linkText"  => $linkText
));

echo '<style type="text/css" media="screen">';
echo $less->compile('


/* Core UI */

body.wp-core-ui {
  .button {
    background: @sec;
    color: @secText;
    &:hover, &:active, &:focus, &:target {
      background: @sec2;
      color: @secText;
      -webkit-box-shadow: none;
      box-shadow: none;
      border: none;
    }
  }
  .button-primary {
    background: @pri;
    color: @priText;
    &:hover, &:active, &:focus, &:target {
      background: @pri2;
      color: @priText;
    }
    &[disabled],
    &:disabled,
    &.button-primary-disabled,
    &.disabled {
      color: @bodyBack !important;
      background: @disabled !important;
      border-color: @disabled !important;
      text-shadow: none !important;
    }
    &.button-hero {
      -webkit-box-shadow: 0 2px 0 @pri3 !important;
      box-shadow: 0 2px 0 @pri3 !important;
    }
    &.button-hero:active {
      -webkit-box-shadow: inset 0 3px 0 @pri2 !important;
      box-shadow: inset 0 3px 0 @pri2 !important;
    }
  }
  .button-secondary {
    background: @sec;
    color: @secText;
    &:hover, &:active, &:focus, &:target {
      background: @sec2;
      color: @secText;
    }
  }
  input[type="reset"]:hover,
  input[type="reset"]:active {
    color: @pri3;
  }
  .wp-ui-primary {
    color: @menuText;
    background-color: @menu;
  }
  .wp-ui-text-primary {
    color: @menu;
  }
  .wp-ui-highlight {
    color: @priText;
    background-color: @pri;
  }
  .wp-ui-text-highlight {
    color: @pri;
  }
  .wp-ui-notification {
    color: @secText;
    background-color: @sec;
  }
  .wp-ui-text-notification {
    color: @sec;
  }
  .wp-ui-text-icon {
    color: @bodyBack;
  }
  input[type=text],
  input[type=search],
  input[type=tel],
  input[type=time],
  input[type=url],
  input[type=week],
  input[type=password],
  input[type=color],
  input[type=date],
  input[type=datetime],
  input[type=datetime-local],
  input[type=email],
  input[type=month],
  input[type=number],
  select,
  textarea {
    &:hover, &:target, &:target, &:focus {
      border-color: @pri;
    }
  }
  .add-new-h2,
  .page-title-action,
  .add-new-h2:active,
  .page-title-action:active {
    background: @sec;
    color: @secText;
  }
}


/* WP Admin */

body.wp-admin {
  background: @bodyBack;
  a {
    color: @linkText;
  }
  a:hover,
  a:active,
  a:focus {
    color: @priD;
  }
  #media-upload a.del-link:hover,
  div.dashboard-widget-submit input:hover,
  .subsubsub a:hover,
  .subsubsub a.current:hover {
    color: @pri3;
  }
  input[type=checkbox]:checked:before {
    color: @pri;
  }
  input[type=radio]:checked:before {
    background: @pri;
  }


  .wrap .add-new-h2:hover,
  .wrap .page-title-action:hover,
  .tablenav .tablenav-pages a:hover,
  .tablenav .tablenav-pages a:focus {
    color: @menuText;
    background-color: @menu;
  }
  .view-switch a {
    &.current:before,
    &:hover:before {
      color: @menu;
    }
  }
  .about-wrap h2 .nav-tab-active,
  .nav-tab-active,
  .nav-tab-active:hover {
    background-color: @bodyBack;
    border-bottom-color: @bodyBack;
  }
}

/* Admin Menu */

body.wp-admin {
  #adminmenuback,
  #adminmenuwrap,
  #adminmenu {
    background: @menu;
  }
  #adminmenu {
    a {
      color: @menuText;
    }
    div.wp-menu-image:before {
      color: @menuText;
    }
    a:hover,
    li.menu-top:hover,
    li.opensub > a.menu-top,
    li > a.menu-top:focus {
      color: @menuText;
      background-color: @menu3;
    }
    li.menu-top:hover div.wp-menu-image:before,
    li.opensub > a.menu-top div.wp-menu-image:before {
      color: @menuText;
    }
    li.wp-has-current-submenu.menu-top:hover,
    li.wp-has-current-submenu.opensub > a.menu-top,
    li.wp-has-current-submenu > a.menu-top:focus {
      background-color: @pri;
    }
    .wp-submenu,
    .wp-has-current-submenu .wp-submenu,
    .wp-has-current-submenu.opensub .wp-submenu,
    a.wp-has-current-submenu:focus + .wp-submenu {
      background: @menu2;
    }
    li.wp-has-submenu.wp-not-current-submenu.opensub:hover:after {
      border-right-color: @menu2;
    }
    .wp-submenu .wp-submenu-head {
      color: @menuText;
      background: @menu3;
    }
    .wp-submenu a,
    .wp-has-current-submenu .wp-submenu a,
    a.wp-has-current-submenu:focus + .wp-submenu a,
    .wp-has-current-submenu.opensub .wp-submenu a {
      color: @menuText;
    }
    .wp-submenu a:focus,
    .wp-submenu a:hover,
    .wp-has-current-submenu .wp-submenu a:focus,
    .wp-has-current-submenu .wp-submenu a:hover,
    a.wp-has-current-submenu:focus + .wp-submenu a:focus,
    a.wp-has-current-submenu:focus + .wp-submenu a:hover,
    .wp-has-current-submenu.opensub .wp-submenu a:focus,
    .wp-has-current-submenu.opensub .wp-submenu a:hover {
      color: @menuText;
    }
    .wp-submenu li.current a,
    a.wp-has-current-submenu:focus + .wp-submenu li.current a,
    .wp-has-current-submenu.opensub .wp-submenu li.current a {
      color: @menuText;
    }
    .wp-submenu li.current a:hover,
    .wp-submenu li.current a:focus,
    a.wp-has-current-submenu:focus + .wp-submenu li.current a:hover,
    a.wp-has-current-submenu:focus + .wp-submenu li.current a:focus,
    .wp-has-current-submenu.opensub .wp-submenu li.current a:hover,
    .wp-has-current-submenu.opensub .wp-submenu li.current a:focus {
      color: @menuText;
    }
    a.wp-has-current-submenu:after,
    > li.current > a.current:after {
      border-right-color: @bodyBack;
    }
    li.current a.menu-top,
    li.wp-has-current-submenu a.wp-has-current-submenu,
    li.wp-has-current-submenu .wp-submenu .wp-submenu-head {
      color: @priText;
      background: @pri;
    }
    li:hover div.wp-menu-image:before,
    li a:focus div.wp-menu-image:before,
    li.opensub div.wp-menu-image:before {
      color: @menuText;
    }
    li.wp-has-current-submenu div.wp-menu-image:before,
    a.current:hover div.wp-menu-image:before,
    li.wp-has-current-submenu a:focus div.wp-menu-image:before,
    li.wp-has-current-submenu.opensub div.wp-menu-image:before {
      color: @priText!important;
    }
    .wp-has-current-submenu .wp-submenu .wp-submenu-head,
    .wp-menu-arrow,
    .wp-menu-arrow div,
    li.current a.menu-top,
    li.wp-has-current-submenu a.wp-has-current-submenu {
      background: @pri;
    }
    .awaiting-mod,
    .update-plugins {
      color: @secText;
      background: @sec;
    }
    li.current a .awaiting-mod,
    li a.wp-has-current-submenu .update-plugins,
    li:hover a .awaiting-mod,
    li.menu-top:hover > a .update-plugins {
      color: @secText;
      background: @sec2;
    }
    #collapse-button {
      color: @menuText;
      background: @menu2;
      &:hover, &:target, &:target, &:focus {
        color: @menuText;
        background: @menu3;
      }
    }
  }
  &.folded #adminmenu {
    .wp-has-current-submenu .wp-submenu {
      background: @menu2;
    }
    .wp-has-current-submenu .wp-submenu a,
    a.wp-has-current-submenu:focus + .wp-submenu a,
    .wp-has-current-submenu.opensub .wp-submenu a {
      color: @menuText;
    }
    .wp-submenu a,
    .wp-has-current-submenu .wp-submenu a,
    a.wp-has-current-submenu:focus + .wp-submenu a,
    .wp-has-current-submenu.opensub .wp-submenu a {
      &:hover, &:target, &:target, &:focus {
        color: @menuText;
      }
    }
    li.current.menu-top {
      color: @priText;
      background: @pri;
    }
    li.current.menu-top,
    li.wp-has-current-submenu {
      background: @pri;
    }
  }
}


/* Other */

body.wp-admin {
  .wp-pointer .wp-pointer-content h3 {
    background-color: @pri;
    border-color: @pri;
    &:before {
      color: @pri;
    }
  }
  .wp-pointer.wp-pointer-top .wp-pointer-arrow,
  .wp-pointer.wp-pointer-top .wp-pointer-arrow-inner,
  .wp-pointer.wp-pointer-undefined .wp-pointer-arrow,
  .wp-pointer.wp-pointer-undefined .wp-pointer-arrow-inner {
    border-bottom-color: @pri;
  }
  .media-item .bar,
  .media-progress-bar div {
    background-color: @pri;
  }
  .details.attachment {
    -webkit-box-shadow: inset 0 0 0 3px @pri, inset 0 0 0 7px @pri;
    box-shadow: inset 0 0 0 3px @pri, inset 0 0 0 7px @pri;
  }
  .attachment.details .check {
    background-color: @pri;
    -webkit-box-shadow: 0 0 0 1px @pri, 0 0 0 2px @pri;
    box-shadow: 0 0 0 1px @pri, 0 0 0 2px @pri;
  }
  .media-selection .attachment.selection.details .thumbnail {
    -webkit-box-shadow: 0 0 0 1px @pri, 0 0 0 3px @pri;
    box-shadow: 0 0 0 1px @pri, 0 0 0 3px @pri;
  }
  .theme-browser .theme.active .theme-name,
  .theme-browser .theme.add-new-theme a:hover:after,
  .theme-browser .theme.add-new-theme a:focus:after {
    background: @pri;
  }
  .theme-browser .theme.add-new-theme a:hover span:after,
  .theme-browser .theme.add-new-theme a:focus span:after {
    color: @pri;
  }
  .theme-section.current,
  .theme-filter.current {
    border-bottom-color: @menu;
  }
  body.more-filters-opened .more-filters {
    color: @menuText;
    background-color: @menu;
  }
  body.more-filters-opened .more-filters:before {
    color: @priText;
  }
  body.more-filters-opened .more-filters:hover,
  body.more-filters-opened .more-filters:focus {
    background-color: @pri;
    color: @priText;
  }
  body.more-filters-opened .more-filters:hover:before,
  body.more-filters-opened .more-filters:focus:before {
    color: @priText;
  }
  .widgets-chooser li.widgets-chooser-selected {
    background-color: @pri;
    color: @priText;
  }
  .widgets-chooser li.widgets-chooser-selected:before,
  .widgets-chooser li.widgets-chooser-selected:focus:before {
    color: @priText;
  }
  div#wp-responsive-toggle a:before {
    color: @priText;
  }
  .wp-responsive-open div#wp-responsive-toggle a {
    border-color: transparent;
    background: @pri;
  }
  .mce-container.mce-menu {
    .mce-menu-item:hover,
    .mce-menu-item.mce-selected,
    .mce-menu-item:focus,
    .mce-menu-item-normal.mce-active,
    .mce-menu-item-preview.mce-active {
      background: @pri;
    }
  }
  .nav-tab {
    color: @mdGrey800;
  }
  .nav-tab-active,
  .nav-tab-active:focus,
  .nav-tab-active:focus:active,
  .nav-tab-active:hover {
    color: @mdGrey900;
  }
  .contextual-help-tabs .active {
    border-color: @pri;
  }
  #the-comment-list .unapproved th.check-column {
    border-color: @mdRed900;
  }
}

/* WP Admin Bar */

#wpadminbar {
  color: @menuText;
  background: @menu2;
  .ab-item,
  a.ab-item,
  > #wp-toolbar span.ab-label,
  > #wp-toolbar span.noticon {
    color: @menuText;
  }
  .ab-icon,
  .ab-icon:before,
  .ab-item:before,
  .ab-item:after {
    color: @menuText;
  }
  #adminbarsearch:before,
  .ab-icon:before,
  .ab-item:before {
    color: @menuText;
  }
  &:not(.mobile) .ab-top-menu > li:hover > .ab-item,
  &:not(.mobile) .ab-top-menu > li > .ab-item:focus,
  &.nojq .quicklinks .ab-top-menu > li > .ab-item:focus,
  &.nojs .ab-top-menu > li.menupop:hover > .ab-item,
  .ab-top-menu > li.menupop.hover > .ab-item {
    color: @menuText;
    background: @menu2;
  }
  &:not(.mobile) > #wp-toolbar li:hover span.ab-label,
  &:not(.mobile) > #wp-toolbar li.hover span.ab-label,
  &:not(.mobile) > #wp-toolbar a:focus span.ab-label {
    color: @menuText;
  }
  &:not(.mobile) li:hover {
    .ab-icon:before,
    .ab-item:before,
    .ab-item:after,
    #adminbarsearch:before {
      color: @menuText;
    }
  }
  .menupop .ab-sub-wrapper {
    background: @menu2;
  }
  .quicklinks .menupop ul.ab-sub-secondary,
  .quicklinks .menupop ul.ab-sub-secondary .ab-submenu {
    background: @menu;
  }
  .ab-submenu .ab-item,
  .quicklinks .menupop ul li a,
  .quicklinks .menupop.hover ul li a,
  &.nojs .quicklinks .menupop:hover ul li a {
    color: @menuText;
  }
  .quicklinks li .blavatar,
  .menupop .menupop > .ab-item:before {
    color: @menuText;
  }
  .quicklinks .menupop ul li a:hover,
  .quicklinks .menupop ul li a:focus,
  .quicklinks .menupop ul li a:hover strong,
  .quicklinks .menupop ul li a:focus strong,
  .quicklinks .ab-sub-wrapper .menupop.hover > a,
  .quicklinks .menupop.hover ul li a:hover,
  .quicklinks .menupop.hover ul li a:focus,
  &.nojs .quicklinks .menupop:hover ul li a:hover,
  &.nojs .quicklinks .menupop:hover ul li a:focus,
  li:hover .ab-icon:before,
  li:hover .ab-item:before,
  li a:focus .ab-icon:before,
  li .ab-item:focus:before,
  li .ab-item:focus .ab-icon:before,
  li.hover .ab-icon:before,
  li.hover .ab-item:before,
  li:hover #adminbarsearch:before,
  li #adminbarsearch.adminbar-focused:before {
    color: @menuText;
  }
  .quicklinks li a:hover .blavatar,
  .quicklinks li a:focus .blavatar,
  .quicklinks .ab-sub-wrapper .menupop.hover > a .blavatar,
  .menupop .menupop > .ab-item:hover:before,
  &.mobile .quicklinks .ab-icon:before,
  &.mobile .quicklinks .ab-item:before {
    color: @menuText;
  }
  &.mobile .quicklinks .hover {
    .ab-icon:before,
    .ab-item:before {
      color: @menuText;
    }
  }
  #adminbarsearch:before {
    color: @menuText;
  }
  & > #wp-toolbar > #wp-admin-bar-top-secondary > #wp-admin-bar-search #adminbarsearch input.adminbar-input:focus {
    color: @menuText;
    background: @menu;
  }
  .quicklinks li#wp-admin-bar-my-account.with-avatar > a img {
    border-color: @menu;
    background-color: @menu;
  }
  #wp-admin-bar-user-info .display-name {
    color: @menuText;
  }
  #wp-admin-bar-user-info a:hover .display-name {
    color: @menuText;
  }
  #wp-admin-bar-user-info .username {
    color: @menuText;
  }
  .wp-responsive-open #wp-admin-bar-menu-toggle a {
    background: @menu2;
  }
  .wp-responsive-open #wp-admin-bar-menu-toggle .ab-icon:before {
    color: @menuText;
  }
  .ab-top-menu>li.hover>.ab-item,
  &.nojq .quicklinks .ab-top-menu>li>.ab-item:focus,
  &:not(.mobile) .ab-top-menu>li:hover>.ab-item,
  &:not(.mobile) .ab-top-menu>li>.ab-item:focus {
    background: @menu3;
    color: @menuText;
  }
  .quicklinks .ab-sub-wrapper .menupop.hover>a,
  .quicklinks .menupop ul li a:focus,
  .quicklinks .menupop ul li a:focus strong,
  .quicklinks .menupop ul li a:hover,
  .quicklinks .menupop ul li a:hover strong,
  .quicklinks .menupop.hover ul li a:focus,
  .quicklinks .menupop.hover ul li a:hover,
  .quicklinks .menupop.hover ul li div[tabindex]:focus,
  .quicklinks .menupop.hover ul li div[tabindex]:hover,
  li #adminbarsearch.adminbar-focused:before,
  li .ab-item:focus .ab-icon:before,
  li .ab-item:focus:before,
  li a:focus .ab-icon:before,
  li.hover .ab-icon:before,
  li.hover .ab-item:before,
  li:hover #adminbarsearch:before,
  li:hover .ab-icon:before,
  li:hover .ab-item:before,
  &.nojs .quicklinks .menupop:hover ul li a:focus,
  &.nojs .quicklinks .menupop:hover ul li a:hover {
    color: @menuText;
  }
  .menupop .ab-sub-wrapper,
  .shortlink-input {
    background: @menu3;
  }
  .quicklinks .menupop ul.ab-sub-secondary,
  .quicklinks .menupop ul.ab-sub-secondary .ab-submenu {
    background: @menu2;
  }
  #wp-admin-bar-adminTitle .ab-item {
    background: @menu;
  }
  .wp-responsive-open & #wp-admin-bar-menu-toggle {
    a {
      background: @menu3;
    }
    .ab-icon::before {
      color: @menuText;
    }
  }
}

/* Login */

body.login.wp-core-ui {
  background: @menu;
  color: @menuText;
  #login {
    form#loginform {
      background: @menu2;
    }
  }
  label,
  a,
  #backtoblog a,
  #nav a {
    color: @menuText;
  }
}
  
');

echo '</style>';

} ?>
