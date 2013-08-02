<?php
/*
Plugin Name: Brick Street Connect
Plugin URI: https://github.com/BrickStreetSoftware/connect-wordpress/
Description: A brief description of the Plugin.
Version: The Plugin's Version Number, e.g.: 1.0
Author: Chrismedia
Author URI: http://brickstreetsoftware.com
License: A "Slug" license name e.g. GPL2
*/
?><?php
define('VTWIDGETS_NAME', 'My Sugar');
define('VTWIDGETS_PATH', dirname(__FILE__));
require_once(VTWIDGETS_PATH."/vtfunctions.php");
// activaction hook
//register_activation_hook( __FILE__, 'vtinit');