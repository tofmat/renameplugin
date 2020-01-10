<?php
/**
 * @package GiltraPlugin
 */
/*
Plugin Name: Tofmat Plugin
Plugin URI: #
Description: PLugin to Replace words in your content with your own choice of words and add a “Thank you for reading this Blog” note at the end of every blog post.
Version: 1.0.0
Author: Tosin Ogunfowote
Author URI: #
License: Later
Text Domain: tofmat-plugin
*/

//Ensures all persons accessing this file is following the right path.
if ( ! defined ( 'ABSPATH' ) ) {
    die;
}
//Other ways to do this
/*
defined ( 'ABSPATH' ) or die( 'Hey, you can/t access this file' );

if( ! function_exists( 'add_action' ) ) {
    echo 'Hey, you can/t access this file';
    exit;
}
*/

//This function replaes a single word with another word
function rename( $text ) {
	return str_replace( 'jewelry', 'Jewellery', $text );
}
add_filter( 'the_content', 'rename' );
/*This PHP function takes ( $text ) as the argument, and returns the 1st string ‘wordpress’ replaced with the 2nd string ‘WordPress’. */
/*I added a filter ( add_filter ) to the plugin to tell our function ( rename ) to work on the text we’ve selected, which in this case is the entire post content ( the_content ). */



/*this function to replace multiple words or phrases at once*/
function replace( $content ) {
	$search  = array( 'wordpress', 'goat', 'Easter', '70', 'sensational' );
	$replace = array( 'WordPress', 'coffee', 'Easter holidays', 'seventy', 'extraordinary' );
	return str_replace( $search, $replace, $content );
}
add_filter( 'the_content', 'replace' );

/*this is a function to add a note at the end of a content or blog post*/
function footer_note( $content ) {
	$content .= '<footer class="renym-content-footer">Thank you for reading this blog post.</footer>';
	return $content;
}
add_filter( 'the_content', 'footer_note' );

?>