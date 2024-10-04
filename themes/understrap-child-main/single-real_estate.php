<?php get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <section class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center banner-wrap">
                        <h1><?php the_title(); ?></h1>
                        <p class="description"><?php echo $args['description'] ?? '' ?></p>
                        <button class="nav-btn nav-btn--next" type="button">
                            <?php echo wp_get_attachment_image(97, 'full') ?>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <div class="house-details">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <?php
                            $image_id = get_field('image');
                            if ($image_id): ?>
                                <img src="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'full')); ?>" alt="<?php echo esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', true)); ?>" class="img-fluid" />
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-md-6">
                            <p><strong>House Name:</strong> <?php the_field('house_name'); ?></p>
                            <p><strong>Location Coordinates:</strong> <?php the_field('location_coordinates'); ?></p>
                            <p><strong>Number of Floors:</strong> <?php the_field('number_of_floors'); ?></p>
                            <p><strong>Type of Building:</strong> <?php the_field('type_of_building'); ?></p>
                            <p><strong>Environmental Friendliness:</strong> <?php the_field('environmental_friendliness'); ?></p>
                            <a class="btn btn--primary" href="/contacts" target="_self">Buy</a>
                        </div>
                    </div>

                    <div class="row">
                        <?php if (have_rows('rooms')): ?>
                            <div class="col-12 col-md-6">
                                <h3 class="col-12">Rooms:</h3>
                                <?php while (have_rows('rooms')): the_row(); ?>
                                    <p><strong>Area:</strong> <?php the_sub_field('area'); ?></p>
                                    <p><strong>Number of Rooms:</strong> <?php the_sub_field('number_of_rooms'); ?></p>
                                    <p><strong>Balcony:</strong> <?php the_sub_field('balcony'); ?></p>
                                    <p><strong>Bathroom:</strong> <?php the_sub_field('bathroom'); ?></p>
                            </div>
                            <div class="col-12 col-md-6">
                                <?php
                                    $room_image_id = get_sub_field('image');
                                    if ($room_image_id): ?>
                                    <img src="<?php echo esc_url(wp_get_attachment_image_url($room_image_id, 'full')); ?>" alt="<?php echo esc_attr(get_post_meta($room_image_id, '_wp_attachment_image_alt', true)); ?>" class="img-fluid" />
                                <?php endif; ?>
                            <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

<?php endwhile;
endif;
?>

<?php get_footer(); ?>