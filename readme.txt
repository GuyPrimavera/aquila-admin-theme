=== Aquila Admin Theme ===
Contributors: GuyPrimavera
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YVPWSJB4SPN5N
Tags: admin theme, material design wordpress, material design admin theme, material design wordpress admin, material wordpress, admin, admin panel, admin theme style plugin, admin-theme, admin theme, aquila, backend theme, clean admin, color scheme, colour scheme, custom admin theme, flat admin theme, free admin theme, modern admin theme, new admin ui, plugin, simple admin theme, white label, white label admin, wordpress, WordPress admin, wordpress admin theme, wp-admin, wp admin page, wp admin theme
Requires at least: 4.0
Tested up to: 5.7
Stable tag: 3.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Material Design inspired admin theme with a customisable color scheme. Add your own custom logo to match your website.

== Description ==

A Material Design inspired customisable color scheme and re-design for WordPress Admin (v4.0 onwards). Aquila also cleans up the admin area from unnecessary or potentially confusing items for the end-user.

Many updates have been made to the admin area, including:

*   Admin area complete re-design.
*   Use your own logo instead of the WordPress logo in the admin area and login screen.
*   Customisable color scheme with color picker.
*   Roboto typeface to match Material Design guidelines.
*   "Posts" renamed to "Blog" (can be changed back in Aquila Settings).
*   Dashboard metaboxes removed and cleaned up.
*   User "Profile" area cleaned up and simplified.
*   New custom icon pack.
*   Current user role added as an admin body class.
*   Removed "How are you.." from the top-right corner.
*   Re-designed login screen.
*   Admin bar de-cluttered.
*   New dashboard widgets.
*   WordPress and plugins support links on dashboard.
*   "Update" notifications hidden from Editors.
*   "Post Format" removed from posts.
*   Multisite support.
*   Gutenberg support.
*   View server information directly on the dashboard.
*   Media Library support for clear PNG images.
*   Aquila Settings page to control most of these options.

== Installation ==

**Via FTP**

1. Upload **aquila-admin-theme** to the /wp-content/plugins/ directory.
2. Activate **Aquila Admin Theme** through the 'Plugins' menu in WordPress.
3. That's it! The default settings are applied automatically, and you can hide other pages in the options page at **Settings > Aquila Settings** if you wish.

**Via WordPress Admin**

1. Go to **Plugins** > **Add New**.
2. Search for **Aquila Admin Theme** and click **Install**.
3. Click **Activate** once installation is complete.
4. That's it! The default settings are applied automatically, and you can hide other pages in the options page at **Settings > Aquila Settings** if you wish.

== Frequently Asked Questions ==

= Do I need to configure this plugin or change any settings? =

No. All settings are applied automatically once the plugin is activated, but there is now an "Aquila Settings" page to refine these options if you wish to do so.

= Can I change the Aquila "eagle" logo to my own company's logo? =

Yes. Go to **Settings > Aquila Settings** to upload a new logo image. PNGs with a clear background and white foreground work best.

= Can I change the colors to my own website's style? =

Yes. Go to **Settings > Aquila Settings** and click the **Color Scheme** tab. Here you can choose new colors for the admin area.

= Does this plugin make any changes to the website's front-end? =

No. It only changes the admin area, the login page and the admin bar for logged-in users.

== Screenshots ==

1. Edit page with default Aquila options.
2. Dashboard with custom colors and logo.
3. Aquila general settings.
4. Custom logo upload screen.
5. Color scheme creator.
6. Example admin page with custom colors and logo.
7. Front-end showing admin bar icon instead of full admin bar (logged-in).

== Changelog ==

= 3.1.1 - 31/05/2021 =
* Code refactored.
* Bug fixes.
* New support links for adminbar.
* Footer credit removed.
* Removed FontAwesome dependency.
* Version updated.

= 3.0.3 - 03/10/2020 =
* Login styling updated.
* Code updated for PHP 7.4 compatibility.

= 2.4.3 - 19/05/2019 =
* Added option to hide admin bar logo drop-down menu.
* Fixed issue with Gutenberg blocks being hidden behind admin menu.
* Fixed issue with Gutenberg notices being partially obstructed behind Gutenberg top bar.
* Fixed admin bar CSS on front-end.
* Fixed alignment of WPBakery Page Builder modal windows.

= 2.4.2 - 31/01/2019 =
* Fixed error with lessc_formatter_compressed class.
* Added option to disable login page styling.
* Fixed styling of password reset page.
* Fixed styling of registration page.
* Fixed undefined variable "visibleText".
* Fixed styling of input boxes.
* Updated part of welcome widget.
* Added darker background to clear PNG images in Media Library.
* Added option to change the admin area link colors.

= 2.4.1 - 07/12/2018 =
* Fixed issue with body classes.

= 2.4 - 13/11/2018 =
* Added versioning to loaded resources.

= 2.3 - 13/11/2018 =
* New admin bar with icon and hidden top-bar.
* Added versioning for main JS file to allow easier updating of the plugin.
* Added failsafe check for lessc compiler in case it's already being used by another plugin.
* Reverted the color picker to standard WordPress function, as the other one was rubbish.
* Option to show admin bar by default on front-end.
* Revised options page.
* New "Menu Text Color" option.
* Better method of hiding admin bar links.
* Actions links added to plugins page.
* Added "Help" tab to the settings page.
* Re-structured settings area code.
* Failsafe check added to postToBlog.php to see if the submenus exist before modifying them.
* Login page logo title changed to site title.
* Interim login styling issue fixed.
* New asset images for WP repo.
* New translation files added for English (UK) and Italian.
* Tested with WP 5.0-beta4 and Gutenberg.

= 2.2.1 - 29/09/2017 =
* Fixed readme file.

= 2.2 - 29/09/2017 =
* Added customisable color scheme with a color-picker in the admin area.
* Material Design color picker.
* Create a new tabbed options page.
* New icons for WooCommerce product types in the admin area.
* Added "Analytify" and "Always Show Hooks" plugins to the list of removed adminbar links.
* Added an option to remove the footer credit link.
* Added an option to show WP upgrade notices.
* Fixed bug with renaming "posts" to "blog" when user has specific custom user role.
* LessPHP used to convert selected colors to CSS variables.
* Fixed margin of metaboxes in "WP Optimize" plugin.
* Fixed layout bug with the login CAPTCHA in "All-in-one Security" plugin.
* Created a list of Material Design Color Palette colors as PHP variables for use throughout plugin.
* Plugin set up for translation.
* Minor bug fixes.

= 2.2 - 29/09/2017 =
* Same as v2.2 (re-committed).

= 2.0.3 - 17/07/2017 =
* Fixed conflict with WP All Import plugin when custom logo is used.

= 2.0.2 - 14/06/2017 =
* Fixed custom logo alignment in FireFox.

= 2.0.1 - 14/06/2017 =
* Fixed "Headers already sent" error.

= 2.0 - 14/06/2017 =
* Ability to use your own logo images instead of the WordPress or Aquila logos.
* CSS re-written using LESS. Complete re-design.
* 35 new custom SVG icons added.
* Tweaked color scheme to Google's Material Design spec.
* "Dashboard" no longer renamed.
* Dashboard icon back to standard dashicons.
* Added body classes "aquila", "aquilaFront" and "aquilaAdmin" to help with CSS targeting.
* "Aquila Support" metabox removed.
* Links removed under admin bar WP-Logo, and Aquila/WordPress support links added.
* Typeface changes - now "Roboto" to match Material Design style.
* Plugin support added for 103 popular plugins.
* "Contextual Help" and "Screen Options" links removed from title area. Added smaller icon links in the admin bar for these.
* Current admin page title added to Admin Bar.
* Admin Bar de-cluttered.
* New admin menu icons.
* Plugin support widget now links to settings page to change view capabilities.
* Footer text width issue fixed.
* WooCommerce Status metabox fixed.
* Added server stats to Dashboard metabox (server IP address, PHP version, server memory usage and memory limit etc.).
* Clear PNG images given a grey background for easier visibility in the Media Library.
* Added option to leave "Posts" post type as it is, or rename it to "Blog".
* Dashicons in Admin Bar fixed when all links are displayed.

= 1.0 - 27/06/2016 =
* Aquila Settings page to control various functions.
* Multisite support for "Plugins Support" widget.
* Admin menu icons added for various plugins.
* Many plugin links removed from admin bar to keep it clean.
* Tested with over 100 popular plugins for conflicts.

= 0.95 - 20/06/2016 =
* Fixed issue with wp-logo in top-left of admin area.

= 0.94 - 20/06/2016 =
* Temporarily removed "plugin support" metabox due to issue on MultiSite installations.

= 0.93 - 20/06/2016 =
* New login screen.
* CSS (LESS) reformatted.
* Added more CSS cross-browser support.
* Fixed-position background logo.
* Functions organised and separated.
* Support links for all installed plugins now available to admins on dashboard.
* "Welcome" widget removed.
* Theme info in dashboard metabox.

= 0.92 - 15/06/2016 =
* ReadMe file updated.
* Asset images added.

= 0.91 - 10/06/2016 =
* Beta release.

== Upgrade Notice ==

= 3.1.1 =
* Code refactored.
* Bug fixes.
* New support links for adminbar.
* Footer credit removed.
* Removed FontAwesome dependency.
* Version updated.

= 3.0.3 =
* Login styling updated.
* Code updated to be compatible with PHP 7.4.

= 2.4.3 =
* Minor bug fixes.

= 2.4.2 =
* Bug fixes.

= 2.4.1 =
* Bug fixes.

= 2.4 =
* Bug fixes.

= 2.3 =
* New admin bar with icon and hidden top-bar.
* New color options.
* Bug fixes.

= 2.1 =
* Added customisable color scheme with a new color-picker in the admin area.
* Material Design Color Palette Color-Picker.
* New tabbed options page.
* English (UK) translation added.
* Italian translation added.
* Lots of little bug fixes.

= 2.0.3 =
* Fixed conflict with WPAI plugin.
* Minor bug fixes.

= 2.0.2 =
* Fixed custom logo alignment in FireFox.

= 2.0.1 =
* Minor bug fixes.

= 2.0 =
Entire plugin re-written.

= 1.0 =
Fixed things that needed fixing.

= 0.95 =
Beta release 5.

= 0.94 =
Beta release 4.

= 0.93 =
Beta release 3.

= 0.92 =
Beta release 2.
