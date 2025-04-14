<?php
/**
 * Plugin Name: Books Plugin
 * Description: Registers a "Books" custom post type with optional Genres taxonomy.
 * Version: 1.0.0
 * Author: Stefan Pantu
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Include files
require_once plugin_dir_path( __FILE__ ) . 'includes/post-types.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/taxonomies.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/blocks.php';

// Register post types and taxonomies
add_action( 'init', 'bp_register_book_post_type' );
add_action( 'init', 'bp_register_genres_taxonomy' );