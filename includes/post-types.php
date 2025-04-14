<?php

function bp_register_book_post_type() {
    $labels = array(
        'name'               => 'Books',
        'singular_name'      => 'Book',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Book',
        'edit_item'          => 'Edit Book',
        'new_item'           => 'New Book',
        'all_items'          => 'All Books',
        'view_item'          => 'View Book',
        'search_items'       => 'Search Books',
        'not_found'          => 'No books found',
        'not_found_in_trash' => 'No books found in Trash',
        'menu_name'          => 'Books'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true, // ✅ Enable REST API
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'        => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-book', // 📘 Icon vibes
        'rewrite'            => array( 'slug' => 'books' ),
    );

    register_post_type( 'books', $args );
}