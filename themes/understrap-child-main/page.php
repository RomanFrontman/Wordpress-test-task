<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Roman
 */

get_header();
?>

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
		<div class="row">
			<div class="page-content">
				<?php the_content(); ?> <!-- Контент сторінки -->
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
