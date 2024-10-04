<?php

add_action('init', 'create_real_estate_cpt');

function create_real_estate_cpt()
{
    register_post_type('real_estate', [
        'labels'        => [
            'name'           => __('Real Estates', 'real_estate'),
        ],
        'public'        => true,
        'has_archive'   => false,
        'show_in_rest'  => false,
        'menu_icon'     => 'dashicons-admin-home',
        'supports'      => ['title', 'editor', 'excerpt', 'thumbnail', 'author']
    ]);

    register_taxonomy('real_estate_category', ['real_estate'], [
        'labels' => [
            'name' => 'District',
        ],
        'publicly_queryable' => false,
        'show_admin_column' => true,
        'public'            => true,
        'hierarchical'      => true,
        'show_in_rest'      => true,
    ]);
}