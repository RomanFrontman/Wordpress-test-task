<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>


<?php if ( get_field('primary_button_style', 'options') == 'filled' ): 
    $primary_button_style = "primary-button-filled";
elseif ( get_field('primary_button_style', 'options') == 'bordered' ):
    $primary_button_style = "primary-button-bordered";
endif; ?>

<?php if ( get_field('secondary_button_style', 'options') == 'filled' ): 
    $secondary_button_style = "secondary-button-filled";
elseif ( get_field('secondary_button_style', 'options') == 'bordered' ):
    $secondary_button_style = "secondary-button-bordered";
endif; ?>


<body <?php body_class([$primary_button_style, $secondary_button_style]); ?>>
<style>
        :root {
            --body-bg: <?php echo get_field('body_background', 'options') ?>;  
            --text: <?php echo get_field('text_color', 'options') ?>;
            --text-lighter: <?php echo get_field('lighter_text_color', 'options') ?>;
            --primary-button-background: <?php echo get_field('primary_button_background', 'options') ?>;
            --primary-button-color: <?php echo get_field('primary_button_color', 'options') ?>;
            --primary-button-border-color: <?php echo get_field('primary_button_border_color', 'options') ?>;
            --primary-button-border-radius: <?php echo get_field('primary_button_border_radius', 'options') ?>px;
            --secondary-button-background: <?php echo get_field('secondary_button_background', 'options') ?>;
            --secondary-button-color: <?php echo get_field('secondary_button_color', 'options') ?>;
            --secondary-button-border-color: <?php echo get_field('secondary_button_border_color', 'options') ?>;
            --secondary-button-border-radius: <?php echo get_field('secondary_button_border_radius', 'options') ?>px;
            --mobile-menu-bg: <?php echo get_field('mobile_menu_background', 'options') ?>;
            --navigation: <?php echo get_field('navigation_color', 'options') ?>;
            --navigation-hover: <?php echo get_field('navigation_hover_color', 'options') ?>;
            --footer-text: <?php echo get_field('footer_text_color', 'options') ?>;
            --footer-navigation: <?php echo get_field('footer_navigation_color', 'options') ?>;
            --footer-navigation-hover: <?php echo get_field('footer_navigation_hover_color', 'options') ?>;
            --primary: <?php echo get_field('primary_color', 'options') ?>;
            --secondary: <?php echo get_field('secondary_color', 'options') ?>;
            --font-family: <?php echo get_field('font-family', 'options') ?>;
        }
    </style>
    <header class="header <?php if ( get_field('header_appearence', 'options') == 'centered' ): ?>header--centered<?php endif ?> <?php if ( get_field('header_background', 'options') == 'image' ): ?>header--img-bg<?php endif ?>" 
    style="
        <?php if ( get_field('header_background', 'options') == 'image' ): ?>
            background-image: url(<?php echo get_field('header_background_image', 'options'); ?>);
        <?php elseif ( get_field('header_background', 'options') == 'gradient' ): ?>
            background: <?php echo get_field('header_color_gradient', 'options'); ?>;
        <?php else : ?>
            background-color: <?php echo get_field('header_background_color', 'options'); ?>;
        <?php endif ?>

        <?php if ( get_field('header_border_color', 'options') ): ?>
            border-bottom: 3px solid <?php echo get_field('header_border_color', 'options'); ?>;
        <?php endif ?>
    ">
        <div class="container">
            <div class="header-wrap">
          
                <a href="/" class="main-logo">
                    <?php 
                    $logo = get_field('main_logo', 'options');
                    if( !empty( $logo ) ): ?>
                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>"  title="<?php echo esc_attr($logo['alt']); ?>" />
                    <?php endif; ?>
                </a>

                <div class="header-controls-wrap">

                    <div class="mobile-menu-bg"></div>

                    <div class="header-menu-wrap">
                        <?php 
                            wp_nav_menu(array(
                              'theme_location'  => 'header-menu',
                              'menu_class'      => 'main-nav',
                              'echo'            => true,
                              'fallback_cb'     => 'wp_page_menu',
                              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                              'container'       => false
                            ));
                        ?>
                    </div>
                    

                </div>

                <div>
                    <?php 
                                    $link = get_field('header_button', 'options');
                                    if( $link ): 
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                        <a rel="nofollow" class="btn btn--<?php echo get_field('button_style','options'); ?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>

                <div class="header__menu-btn">
                    <span class="sandwitch"> 
                      <span class="sw-topper sw-line"></span> 
                      <span class="sw-bottom sw-line"></span> 
                      <span class="sw-footer sw-line"></span> 
                    </span>
                </div>

            </div>
        </div>
  	</header>
