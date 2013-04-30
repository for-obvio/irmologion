<?php
	/*
	Plugin Name: Irmologion
	Plugin URI: http://studio.hamburg-hram.de/plugins/irmologion-wordpress-plugin/
	Description: This WordPress plugin enables to add texts in church slavonic to WordPress blogs.
	Version: 1.2
	Author: Alexey Vidanov
	Author URI: http://vidanov.com
	*/


	if ( ! function_exists( 'irmologion_css' ) ) {
		function irmologion_styles() {

			wp_register_style( 'irmologion', WP_PLUGIN_URL . '/irmologion/main.css' );
			wp_enqueue_style( 'irmologion', WP_PLUGIN_URL . '/irmologion/main.css' );

		}
	}
	add_action( 'wp_print_styles', 'irmologion_styles' );


	if ( ! function_exists( 'irmologion_css' ) ) {
		function irmologion_css() {
			$s = ',' . WP_PLUGIN_URL . '/irmologion/main.css';
			return $s;
		}
	}
	add_filter( 'mce_css', 'irmologion_css' );


	if ( ! function_exists( 'irmologion_formatTinyMCE' ) ) {
		function irmologion_formatTinyMCE($init) {

			$init['theme_advanced_buttons2_add'] = 'styleselect';
			$init['theme_advanced_styles'] = 'Церковно-славянский=slavic';

			return $init;
		}
	}
	add_filter( 'tiny_mce_before_init', 'irmologion_formatTinyMCE' );


