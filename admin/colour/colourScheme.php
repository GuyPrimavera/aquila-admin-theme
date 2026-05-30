<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

if (is_admin()) {
	add_action('admin_head', 'colourSchemeCSS');
} else {
	add_action('wp_before_admin_bar_render', 'colourSchemeCSS');
}

function colourSchemeCSS() {
  include('mdColours.php');
  include('bright.php');
  include('isDark.php');

  $aquilaColourSettings = get_option('aquilaColourSettings');
  $aquilaPrimary = $aquilaColourSettings['aquila_primary_colour'] ?? '#039be5';
  $aquilaSecondary = $aquilaColourSettings['aquila_secondary_colour'] ?? '#ffeb3b';
  $aquilaLinkText = $aquilaColourSettings['aquila_link_text_colour'] ?? '#212121';
  $aquilaMenuBack = $aquilaColourSettings['aquila_menu_back_colour'] ?? '#212121';
  $aquilaMenuText = $aquilaColourSettings['aquila_menu_text_colour'] ?? '#ffffff';

  $pri = $aquilaPrimary ? $aquilaPrimary : $mdYellow400;
  $sec = $aquilaSecondary ? $aquilaSecondary : $mdLightBlueA700;
  $linkText = $aquilaLinkText ? $aquilaLinkText : $mdGrey900;
  $menu = $aquilaMenuBack ? $aquilaMenuBack : $mdGrey700;
  $menuText = $aquilaMenuText ? $aquilaMenuText : $mdWhite;

  if (isDark($pri, 50)) {
    $priText = $mdWhite;
    $pri2 = bright($pri, 20);
    $pri3 = bright($pri, 40);
  } else {
    $priText = $mdGrey900;
    $pri2 = bright($pri, -20);
    $pri3 = bright($pri, -40);
  }

  $priD = bright($pri, -120);

  if (isDark($sec, 50)) {
    $secText = $mdWhite;
    $sec2 = bright($sec, 20);
    $sec3 = bright($sec, 40);
  } else {
    $secText = $mdGrey900;
    $sec2 = bright($sec, -20);
    $sec3 = bright($sec, -40);
  }

  if (isDark($menu, 50)) {
    $menu2 = bright($menu, 20);
    $menu3 = bright($menu, 40);
  } else {
    $menu2 = bright($menu, -20);
    $menu3 = bright($menu, -40);
  }

  $bodyBack = $mdGrey100;
  $disabled = $mdGrey500;

  $cssVars = array(
    '--aq-pri' => $pri,
    '--aq-pri2' => $pri2,
    '--aq-pri3' => $pri3,
    '--aq-pri-text' => $priText,
    '--aq-pri-d' => $priD,
    '--aq-sec' => $sec,
    '--aq-sec2' => $sec2,
    '--aq-sec3' => $sec3,
    '--aq-sec-text' => $secText,
    '--aq-menu' => $menu,
    '--aq-menu2' => $menu2,
    '--aq-menu3' => $menu3,
    '--aq-menu-text' => $menuText,
    '--aq-body-back' => $bodyBack,
    '--aq-disabled' => $disabled,
    '--aq-link-text' => $linkText,
    '--aq-md-grey-800' => $mdGrey800,
    '--aq-md-grey-900' => $mdGrey900,
    '--aq-md-red-900' => $mdRed900,
  );

  $cssVarText = '';
  foreach ($cssVars as $name => $value) {
    $cssVarText .= $name . ':' . esc_attr($value) . ';';
  }

  $staticCssFile = __DIR__ . '/colourScheme-static.css';
  $staticCss = is_readable($staticCssFile) ? file_get_contents($staticCssFile) : '';

  echo '<style type="text/css" media="screen">';
  echo ':root{' . $cssVarText . '}';
  echo $staticCss;
  echo '</style>';
}
