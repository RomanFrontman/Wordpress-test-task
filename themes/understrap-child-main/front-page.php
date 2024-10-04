<?php get_header();

$posts = get_posts([
    'post_type' => 'real_estate',
    'posts_per_page' => -1,
]);
?>

<section class="banner">
    <div class="container">
        <div class="row">
            <div class="banner-wrap">
                <h1>Welcome to our Real-estate web-site!</h1>
                <h2>I hope you will realy enjoy here</h2>
                <div class="banner-copy">Choose your house of dream below</div>
                <button class="nav-btn nav-btn--next" type="button">
                    <?php echo wp_get_attachment_image(97, 'full') ?>
                </button>
            </div>
        </div>
    </div>
</section>

<section class="posts-section">
    <div class="section-wrapper">
        <div class="aside">
            <?php echo do_shortcode('[aside_filters]'); ?>
        </div>

        <div class="content">
            <div class="content-grid">
                <?php foreach ($posts as $post):
                    echo get_real_estate_component($post);
                endforeach ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>