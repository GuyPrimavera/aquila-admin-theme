<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }

// Dashboard
function aquila_chk_pluginSupport_render() {
	aquila_checkbox('aquila_settings', 'aquila_chk_pluginSupport', '');
}

function aquila_chk_dashBoxes_render() { 
	aquila_checkbox('aquila_settings', 'aquila_chk_dashBoxes', '');
}

function aquila_chk_postBlog_render() { 
	aquila_checkbox('aquila_settings', 'aquila_chk_postBlog', '');
}

function aquila_chk_hideFooter_render() { 
	aquila_checkbox('aquila_settings', 'aquila_chk_hideFooter', '');
}

function aquila_chk_showNag_render() { 
	aquila_checkbox('aquila_settings', 'aquila_chk_showNag', '');
}

// Admin Bar
function aquila_chk_abLinks_render() { 
	aquila_checkbox('aquila_settings', 'aquila_chk_abLinks', '');
}

function aquila_chk_abVisible_render() { 
	aquila_checkbox('aquila_settings', 'aquila_chk_abVisible', '');
}

function aquila_chk_abLogoMenuHide_render() { 
	aquila_checkbox('aquila_settings', 'aquila_chk_abLogoMenuHide', '');
}

// Login page
function aquila_chk_loginDisable_render() { 
	aquila_checkbox('aquila_settings', 'aquila_chk_loginDisable', '');
}

// Logo upload
function aquila_new_logo_render() { 
	aquila_img_upload('aquilaLogoSettings', 'aquila_new_logo');
}

function aquila_new_logo_sqr_render() { 
	aquila_img_upload('aquilaLogoSettings', 'aquila_new_logo_sqr');
}

// Colour Pickers
function aquila_primary_colour_render() {
	aquila_colour_picker('aquilaColourSettings', 'aquila_primary_colour');
}

function aquila_secondary_colour_render() {
	aquila_colour_picker('aquilaColourSettings', 'aquila_secondary_colour');
}

function aquila_link_text_colour_render() {
	aquila_colour_picker('aquilaColourSettings', 'aquila_link_text_colour');
}

/*
function aquila_text_colour_render() {
	aquila_colour_picker( 'aquilaColourSettings', 'aquila_text_colour' );
}
function aquila_background_colour_render() {
	aquila_colour_picker( 'aquilaColourSettings', 'aquila_background_colour' );
}
*/

function aquila_menu_back_colour_render() {
	aquila_colour_picker('aquilaColourSettings', 'aquila_menu_back_colour');
}

function aquila_menu_text_colour_render() {
	aquila_colour_picker('aquilaColourSettings', 'aquila_menu_text_colour');
}
