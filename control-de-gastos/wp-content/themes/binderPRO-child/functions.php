<?php
/**
 * Child Theme Functions File
 */

/**
 * To extend or modify the functions present in the parent theme, both in functions.php or in extras.php
 * files, copy the function to this file and modify it according to your needs.
 *
 * Keep in mind that this file (unlike what happens with the style.css file) will load BEFORE the parent
 * theme functions.php file, which is why any function declared both here and in the original functions.php
 * file will be overriden for whatever you include here.
 */

// Happy editing...

add_filter('widget_text', 'do_shortcode');

?>