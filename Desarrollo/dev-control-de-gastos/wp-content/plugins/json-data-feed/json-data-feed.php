<?php
/*
Plugin Name: JSON Data Feed
Plugin URI: http://xiik.com
Description: Creates a JSON data feed for your wordpress site.
Version: 0.5.3
Author: Jason Cordial
Author URI: http://xiik.com/team/jason_cordial	
License: GPL2
*/
/*  Copyright 2013  Jason Cordial  (email : jasonc@xiik.com)

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
require_once "JSONFeedSettings.inc.php";
require_once "JSONFeeder.inc.php";
// require_once "JSONRewrite.inc.php";

// JSONRewrite::init();
define("JSON_FEED_DIR", plugin_dir_path(  __FILE__ ));

$JSONFeedSettings = new JSONFeedSettings();
$JSONFeeder = new JSONFeeder();

register_activation_hook( JSON_FEED_DIR."json_aux.php", 'json_datafeed_activate' );



?>