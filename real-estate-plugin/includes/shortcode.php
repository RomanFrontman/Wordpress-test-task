<?php 

function add_aside_filters() {
  ob_start();
  get_template_part('templates/aside-filters');
  return ob_get_clean();
}

add_shortcode('aside_filters', 'add_aside_filters');