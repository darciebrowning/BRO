<?php
/**
 * Barrier Reef Orchestra Theme Customizer.
 *
 * @package Barrier_Reef_Orchestra
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function barrier_reef_orchestra_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'barrier_reef_orchestra_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function barrier_reef_orchestra_customize_preview_js() {
	wp_enqueue_script( 'barrier_reef_orchestra_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'barrier_reef_orchestra_customize_preview_js' );
