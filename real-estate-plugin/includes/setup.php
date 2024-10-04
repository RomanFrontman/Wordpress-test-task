<?php

function load_assets()
{
  wp_enqueue_script('jquery');
  wp_enqueue_script('real-estate-script', REAL_ESTATE_URL.'/assets/script.js', [], 1, ['jQuery']);
  
  wp_localize_script('real-estate-script', 'ajaxUrl', admin_url('admin-ajax.php'));
}


add_action('wp_enqueue_scripts', 'load_assets');

function get_real_estate_component($post){
  $args = [
    'title' => $post->post_title,
    'title' => get_field ('house_name', $post->ID),
    'description' => mb_strimwidth($post->post_excerpt, 0, 100, '...'), 
    'image' => get_field('image', $post->ID),
    'url' => get_the_permalink($post),
  ];
  get_template_part('templates/real-estate-card', \null, $args );
}

