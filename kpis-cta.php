<?php
/*
Plugin Name: KPIS CTA Buttons
Description: Show float Buttons to CTA on sidebar websites. KPIS CTA Buttons is Easy to use & atraction to conversion.
Version: 2.0.2
Author: Agencia KPIS
Author URI: https://agenciakpis.com
License: GPLv2 (or later)
Text Domain: kpis-cta-buttons
*/
if ( ! defined( 'ABSPATH' ) ) { exit;  }

	if ( !defined('name_kpis_cta_buttons' ) ) {
	define( 'name_kpis_cta_buttons', 'KPIS CTA Buttons' );
	define( 'version_kpis_cta_buttons', '2.0.2' );
	define( 'KPIS_CTA_BUTTONS_URL', plugin_dir_url( __FILE__ ));
	define( 'KPIS_CTA_BUTTONS_PATH', plugin_dir_path(__FILE__));
	}
	
	/* loads the language file */
	load_plugin_textdomain('kpis-cta-buttons', false, dirname(plugin_basename(__FILE__)) . '/languages');
	
	/* admin enqueue_css */
	function kpis_cta_enqueue_custom_admin_style() {
		wp_enqueue_style('style-backend-cta', KPIS_CTA_BUTTONS_URL. 'assets/css/backend-cta.min.css');
	}
	add_action( 'admin_enqueue_scripts', 'kpis_cta_enqueue_custom_admin_style' );
	
	/* front enqueue_css */
	function kpis_cta_enqueue_custom_front_style() {
		wp_enqueue_style('style-front-cta', KPIS_CTA_BUTTONS_URL. 'assets/css/front-cta.min.css');
	}
	add_action( 'wp_enqueue_scripts', 'kpis_cta_enqueue_custom_front_style' );
	
	/* menu wp-admin */
	function kpis_cta_buttons_submenu(){
		add_menu_page( 
			esc_html__( 'Kpis Cta Buttons', 'kpis-cta-buttons' ),
			esc_html__( 'Kpis Cta Buttons', 'kpis-cta-buttons' ),
			'manage_options',
			'manutencion-cta-buttons',
			'kpis_cta_buttons_manutencion_rotina_callback',
			KPIS_CTA_BUTTONS_URL. 'assets/images/icono_wp_17x17.png',
			10
		);
	}
	add_action( 'admin_menu', 'kpis_cta_buttons_submenu' );

	/*check freemius */
	//require_once 'licensing.php';
	
	/* include the template when not is wp-admin and plugin active to users */
	require_once( KPIS_CTA_BUTTONS_PATH . 'inc/manutencion.php');
	if (get_option('kpis_cta_active') =="1" and !is_admin() ) { require_once( KPIS_CTA_BUTTONS_PATH . 'inc/templates.php'); }