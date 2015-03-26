<?php
/* Plugin Name: Linkedin Connections to Wp Users
Plugin URI: http://www.socialbullets.com/
Description: Add Linkedin Connections as your Wordpress Site Users
Version: 1.0
Author: Arsalan Ahmed
Author URI: http://www.socialbullets.com/
License: GPLv2 or later
*/
 	function azalaan_admin_page() 
		{
			include('azalaan_linkedin_importer.php');
		}

		function azalaan_importer_actions() 
		{
			add_options_page("Import Linkedin Connections", "Linkedin CSV Import",1,"manage_importer", "azalaan_admin_page");
		    add_menu_page( 'Import Linkedin Connections', 'Import Linkedin Connections', 'manage_options','azalaan_linkedin_importer', 'azalaan_admin_page', plugins_url( 'import_linkedin_users/icon.png' ),6);
		}

		add_action('admin_menu', 'azalaan_importer_actions');
?>