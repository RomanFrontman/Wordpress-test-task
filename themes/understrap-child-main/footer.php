	
  	<footer class="footer <?php if ( get_field('footer_appearence', 'options') == 'centered' ): ?>footer--centered<?php endif ?> <?php if ( get_field('footer_background', 'options') == 'image' ): ?>footer--img-bg<?php endif ?>"
  	style="
        <?php if ( get_field('footer_background', 'options') == 'image' ): ?>
            background-image: url(<?php echo get_field('footer_background_image', 'options'); ?>);
        <?php elseif ( get_field('footer_background', 'options') == 'gradient' ): ?>
            background: <?php echo get_field('footer_color_gradient', 'options'); ?>;
        <?php else : ?>
            background-color: <?php echo get_field('footer_background_color', 'options'); ?>;
        <?php endif ?>

        <?php if ( get_field('footer_border_color', 'options') ): ?>
            border-top: 3px solid <?php echo get_field('footer_border_color', 'options'); ?>;
        <?php endif ?>
    ">
    	
  		<div class="container">
			<div class="footer-wrap">
				<a href="/" class="footer-logo">
                    <?php 
                    $logo = get_field('footer_logo', 'options');
                    if( !empty( $logo ) ): ?>
                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>"  title="<?php echo esc_attr($logo['alt']); ?>" />
                    <?php endif; ?>
                </a>

                <?php if ( get_field('show_footer_navigation', 'options') ): ?>
                    <div class="footer-menu-wrap">
                        <?php 
                            wp_nav_menu(array(
                              'theme_location'  => 'footer-menu',
                              'menu_class'      => 'foot-nav',
                              'echo'            => true,
                              'fallback_cb'     => 'wp_page_menu',
                              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                              'container'       => false
                            ));
                        ?>
                    </div>
                <?php endif ?>

                <?php if( have_rows('random_footer_logos', 'options') ): ?>

                    <div class="footer-random-logos">
                    
                    <?php while( have_rows('random_footer_logos', 'options') ) : the_row(); ?>
                        <?php $logo_link = get_sub_field('logo_link', 'options'); ?>
                        <a rel="nofollow" <?php if ($logo_link) echo 'href="' . esc_url($logo_link) . '"'; ?>>
                            <div class="footer-logo-item">
                                <?php 
                                $image = get_sub_field('logo');
                                if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endwhile; ?>

                    </div>

                <?php else :
                    // Do something...
                endif; ?>

				<div class="copyright">© <?php echo date('Y'); ?> <?php echo get_field('copyright', 'options'); ?></div>
			</div>
		</div>

  	</footer>

<?php wp_footer() ?>
</body>
</html>