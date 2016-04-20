<?php
/**
 * FooGallery FooBox Custom Captions
 *
 * Override the captions in FooBox
 *
 * @wordpress-plugin
 * Plugin Name: FooGallery FooBox Custom Captions
 * Description: Override the captions in FooBox
 * Version:     1.0.0
 * Author:      Brad Vincent
 * Author URI:  http://fooplugins.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
if ( ! class_exists( 'FoogalleryFooboxCustomCaptions' ) ) {

	class FoogalleryFooboxCustomCaptions {

		function __construct() {
			add_filter( 'foogallery_attachment_html_link_attributes', array($this, 'add_html_attributes'), 10, 3 );
		}

		/**
		 * Alter the anchor attributes so that the correct captions are output to the frontend
		 */
		function add_html_attributes($attr, $args, $foogallery_attachment) {

			$attachment_post = $foogallery_attachment->_post;

			$attr['data-caption-title'] = trim( $attachment_post->post_title );

			$attr['data-caption-desc'] = trim( $attachment_post->post_excerpt ) . '<br />' . trim( $attachment_post->post_content );

			return $attr;
		}
	}

	new FoogalleryFooboxCustomCaptions();
}