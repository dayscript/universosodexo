<?php 
/**
 * This file defines available hooks to be used across the theme.
 * 
 * You can attach a function to a hook by calling:
 * 
 * add_action( 'hook_name', 'your_function_name', optional_priority_number );
 * 
 */

// Before Post Title (with argument for ad placement)
function qi_before_post_title() {
	do_action( 'qi_before_post_title', 'pretitle' );
}

// After Post Title (with argument for ad placement)
function qi_after_post_title() {
	do_action( 'qi_after_post_title', 'posttitle' );
}

// Before Post Content (with argument for ad placement)
function qi_before_post() {
	do_action( 'qi_before_post', 'precontent' );
}

// After Post Content (with argument for ad placement)
function qi_after_post() {
	do_action( 'qi_after_post', 'postcontent' );
}