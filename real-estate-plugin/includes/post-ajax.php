<?php

add_action('wp_ajax_filterPosts', 'filterPosts');
add_action('wp_ajax_nopriv_filterPosts', 'filterPosts');
function filterPosts()
{
  parse_str($_POST['filters'] ?? '', $form_data);
  $meta = [];

  if (!empty($form_data['build_type'])) {
    $meta[] = [
      'key' => 'type_of_building',
      'value' => $form_data['build_type'],
      'compare' => '=',
    ];
  }

  if (!empty($form_data['floor_num'])) {
    $meta[] = [
      'key' => 'number_of_floors',
      'value' => (int)$form_data['floor_num'],
      'type' => 'NUMERIC',
      'compare' => '<=',
    ];
  }

  $posts = get_posts([
    'post_type' => 'real_estate',
    'posts_per_page' => -1,
    's' => $form_data['search'] ?? '',
    'meta_query' => [
      'relation' => 'AND',
      $meta
    ],
  ]);

  $response = '';
  ob_start();

  foreach ($posts as $post) {
    get_real_estate_component($post);
  }

  $response = ob_get_clean();
  return wp_send_json_success($response);
}
