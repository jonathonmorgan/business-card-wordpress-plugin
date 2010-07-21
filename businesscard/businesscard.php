<?php
/*
Plugin Name: Business Card
Plugin URI: http://blacklightsolutions.com/wp-businesscard
Description: Quickly create a virtual business card and display it on your site.
Version: 0.7
Author: Jonathon Morgan
Author URI: http://blacklightsolutions.com/
License: GPL

This is pretty basic. If I were to actually use this on a project, I'd prob
add an image field, default css and optional overrides, some client side
form validation, server-side validation to make sure urls were going in 
url fields, etc.

Copyright (C) 2010 Jonathon Morgan, jonathonmorgan@gmail.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
*/

//note: played around with autoloading, obvs would be better here - still working on it. 
//path const is defined in wp-settings
include BCARD_PATH.'/CardSettings.php';
include BCARD_PATH.'/CardAdmin.php';
include BCARD_PATH.'/Card.php';

$business_card_settings = CardSettings::get_instance();
$business_card_admin = new CardAdmin();
$business_card = new Card();

function businessCardAdmin() {
	global $business_card_admin;
	add_options_page('Business Card', 'Business Card', 9, basename(__FILE__), array(&$business_card_admin, 'printForm'));
}	

add_action('admin_menu', 'businessCardAdmin');
add_action('wp_head', array(&$business_card, 'showCard'), 1);
add_action('activate_businesscard/businesscard.php',  array(&$business_card_settings, 'setUp'));
?>

$business_card_settings = CardSettings::get_instance();
$business_card_admin = new CardAdmin();
$business_card = new Card();

function businessCardAdmin() {
	global $business_card_admin;
	add_options_page('Business Card', 'Business Card', 9, basename(__FILE__), array(&$business_card_admin, 'printForm'));
}	

add_action('admin_menu', 'businessCardAdmin');
add_action('wp_head', array(&$business_card, 'showCard'), 1);
add_action('activate_businesscard/businesscard.php',  array(&$business_card_settings, 'setUp'));
?>