<?php

/**
 * Plugin Name:       Age Shortcodes
 * Plugin URI:        https://praxismarketing-agentur.com/wordpress-plugins/age-shortcodes/
 * Description:       Add shortcodes for the age of someone or something in years
 * Version:           0.1
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
        return '';

    if ( ( $birthday = strtotime( $atts['birthday'] ) ) === false )
        return '';

    $years_diff = date_diff( date_create(), date_create( $atts['birthday'] ) )->y;
    return $years_diff;  

}
add_shortcode( 'age', 'age_in_years_shortcodes' );