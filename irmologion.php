<?php
	/*
	Plugin Name: Irmologion
	Plugin URI: http://studio.hamburg-hram.de/plugins/irmologion-wordpress-plugin/
	Description: This WordPress plugin enables to add texts in church slavonic to WordPress blogs.
	Version: 1.2.1

	Author: Hamburg Church Studio
	Author URI: http://studio.hamburg-hram.de/

	License: GPLv2 or later
	*/


	add_action( 'wp_enqueue_scripts', 'irmologion_styles' );
	add_filter( 'mce_css', 'irmologion_css' );
	add_filter( 'tiny_mce_before_init', 'irmologion_change_tinymce_settings' );
	add_filter( 'mce_buttons_2', 'irmologion_add_buttons' );


	if ( ! function_exists( 'irmologion_styles' ) ) {
		function irmologion_styles() {

			wp_register_style( 'irmologion', WP_PLUGIN_URL . '/irmologion/main.css' );
			wp_enqueue_style( 'irmologion' );
		}
	}


	if ( ! function_exists( 'irmologion_css' ) ) {
		function irmologion_css( $mce_css ) {

			if ( ! empty( $mce_css ) )
				$mce_css .= ',';

			$mce_css .= plugins_url( 'main.css', __FILE__ );
			return $mce_css;
		}
	}


	if ( ! function_exists( 'irmologion_change_tinymce_settings' ) ) {
		function irmologion_change_tinymce_settings ( $init ) {

//			$init['block_formats'] = 'Paragraph=p;Heading 3=h3;Heading 4=h4';
//			$init['block_formats'] .= 'Irmologion=slavic';

			$style_formats = array (
				array( 'title' => 'Irmologion (block)',  'block'  => 'p',    'classes' => 'slavic'),
				array( 'title' => 'Irmologion (inline)', 'inline' => 'span', 'classes' => 'slavic' ),

//			array( 'title' => 'Bold text', 'inline' => 'b' ),
//			array( 'title' => 'Red header', 'block' => 'h1', 'styles' => array( 'color' => '#ff0000' ) ),
//			array( 'title' => 'Example 1', 'inline' => 'span', 'classes' => 'example1' ),
			);

			$init['style_formats'] = json_encode( $style_formats );

			$init['style_formats_merge'] = false;

//			echo '<pre>';print_r( $init );echo '</pre>';
			return $init;
		}
	}


	function irmologion_add_buttons ( $buttons ) {
		array_splice( $buttons, 1, 0, 'styleselect' );
		return $buttons;
	}



