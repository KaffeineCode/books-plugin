<?php

add_action( 'init', 'bp_register_books_block' );

function bp_register_books_block() {
    wp_register_script(
        'bp-books-block',
        plugins_url( '../build/index.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-data' ),
        filemtime( plugin_dir_path( __FILE__ ) . '../build/index.js' )
    );

    wp_register_style(
        'bp-books-block-style',
        plugins_url( 'assets/css/books-block.css', dirname( __FILE__) ),
        array(),
        filemtime( plugin_dir_path( __DIR__ ) . 'assets/css/books-block.css' )
    );    

    register_block_type( 'bp/books-list', array(
        'editor_script'   => 'bp-books-block',
        'editor_style'    => 'bp-books-block-style',
        'render_callback' => 'bp_render_books_block',
        'style'           => 'bp-books-block-style',
        'attributes'      => array(
            'numberOfBooks' => array(
                'type'    => 'number',
                'default' => 5,
            ),
        ),
    ) );
}

function bp_render_books_block( $attributes ) {
    $query = new WP_Query( array(
        'post_type'      => 'books',
        'posts_per_page' => $attributes['numberOfBooks'],
    ) );

    if ( ! $query->have_posts() ) {
        return '<p>No books found.</p>';
    }

    $output = '<ul class="bp-books-list">';
    while ( $query->have_posts() ) {
        $query->the_post();
        $output .= '<li>';
        $output .= get_the_post_thumbnail( get_the_ID(), 'thumbnail' );
        $output .= '<strong>' . esc_html( get_the_title() ) . '</strong>';
        $output .= '</li>';
    }
    $output .= '</ul>';

    wp_reset_postdata();

    return $output;
}