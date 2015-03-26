<?php 
function json_datafeed_activate () {
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
} 
?>