<div class="item">
  <?php echo wp_get_attachment_image($args['image'] ?? '', 'medium') ?>
  <h3><?php echo $args['title'] ?? '' ?></h3>
  <p class="description"><?php echo $args['description'] ?? '' ?></p>
  <a class="btn btn--primary" href="<?php echo $args['url'] ?? '#'?>"><?php _e('Read more','real_estate') ?></a>
</div>