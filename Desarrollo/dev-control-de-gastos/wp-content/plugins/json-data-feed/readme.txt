=== JSON Data Feed ===
Contributors: jpcordial
Donate link:  
Tags: json,data feed
Requires at least: 3.5
Tested up to: 3.5.1
Stable tag: 0.5.3
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

JSON Data Feed can be used to supplement a WordPress blog's normal XML feeds with a JSON feed. Install it, activate it, and you're done. 

== Description ==

JSON Data Feed can be used to supplement a WordPress blog's normal XML feeds with a JSON feed. Install it, activate it, and you're done. 

The JSON feed can be accessed by going to {a url on a WordPress site}/json

== Installation ==

1. Unzip the plugin folder.
1. Upload the unpacked folder to your plugins directory.
1. Activate the plugin.
1. Enjoy!

== Frequently asked questions ==
= Can I add my own data to a post's JSON feed? =

Yes, you can!

In your theme's *functions.php* file, you can use a filter to add whatever data you need.

`add_filter("get_json_meta", "my_metadata_function");
function my_metadata_function($metadata){
	$myData = ""; //Add your data here.
	array_push($metadata, $myData);
}`

Every post type also has it's own meta data filter. If you need to add metadata only to a single post type, 

`add_filter("get_json_meta_{post_type}", "my_metadata_function");
function my_metadata_function($metadata){
	$myData = ""; //Add your data here.
	array_push($metadata, $myData);
}`

Any data you push onto the array will be available in *{post}.meta* section of the JSON feed.

= Can I get full category and tag objects in the feed? =

Sure can! You can change that in the plug in settings.

Settings can be accessed from Settings->JSON Data Feed. 

= Can I modify the blog info in the data feed? =

Why yes, you can! Once again, through the magic of filters, anything is possible!

`add_filter("get_json_bloginfo", "my_bloginfo_function");
function my_bloginfo_function($bloginfo){
	$myData = ""; //Add your data here.
	array_push($bloginfo, $myData);
}`

== Screenshots ==



== Changelog ==

= 0.1.1 =

Added *get_json_bloginfo* filter to add or change the blog info in the data feed. 


== Upgrade notice ==

