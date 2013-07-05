<?php
/*
Plugin Name: Brick Street Connect
Description: Create a new widgets on install the plugin
Version: vtwidgets1.0
Author: Brick Street Connect {ChrisMedia }
*/
?><?php
define('VTWIDGETS_NAME', 'My Sugar');
define('VTWIDGETS_PATH', dirname(__FILE__));
require_once(VTWIDGETS_PATH."/vtfunctions.php");
// activaction hook
//register_activation_hook( __FILE__, 'vtinit');