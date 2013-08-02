<?php
/*
Plugin Name: Brick Street CONNECT
Plugin URI: https://github.com/BrickStreetSoftware/connect-wordpress/
Description: Integrate Brick Street CONNECT with Wordpress
Version: 1.0
Author: chrismaeda
Author URI: http://brickstreetsoftware.com
License: GPL2
*/
/*  Copyright 2013 Brick Street Software, Inc. (email : info@brickstreetsoftware.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php
define('BRICKSTCONNECT_NAME', 'Brick Street CONNECT');
define('BRICKSTCONNECT_PATH', dirname(__FILE__));
require_once(BRICKSTCONNECT_PATH."/brickst-functions.php");
// activaction hook
//register_activation_hook( __FILE__, 'brickstinit');
?>