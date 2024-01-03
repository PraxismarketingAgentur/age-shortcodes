<?php

/**
 * Plugin Name:       Age Shortcodes
 * Plugin URI:        https://praxismarketing-agentur.com/wordpress-plugins/age-shortcodes/
 * Description:       Add shortcodes for the age of someone or something in years
 * Version:           0.2
 * Author:            Lukas Pugstaller
 * Author URI:        https://praxismarketing-agentur.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       age-shortcodes
 */

// If accessed directly, exit
if ( ! defined( 'ABSPATH' ) ) exit;

function age_in_years_shortcodes( $atts ) {

    if ( empty( $atts['birthday'] ) )
        return 0;

    if ( ( strtotime( $atts['birthday'] ) ) === false )
        return 0;

    $years_diff = date_diff( date_create(), date_create( $atts['birthday'] ) )->y;

    if ( $years_diff === false )
        return 0;

    return $years_diff;

}

function age_in_years_shortcodes_notice() {

    echo '<div class="notice notice-error"><p>The Age Shortcodes plugin is not working because the shortcode [age] is already registered.</p></div>';

}

function age_in_years_shortcodes_init() {

    if ( shortcode_exists( 'age' ) )
        add_action( 'all_admin_notices', 'age_in_years_shortcodes_notice' );

    else
        add_shortcode( 'age', 'age_in_years_shortcodes' );

}

add_action( 'init', 'age_in_years_shortcodes_init' );