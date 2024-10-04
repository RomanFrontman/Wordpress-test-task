<?php 
/*-------------------------------------------------*/
/*	Load stylesheet and scripts dynamically
/*-------------------------------------------------*/ 
function understrap_child_theme_scripts() {
    // wp_dequeue_style('understrap-parent');
    // wp_deregister_style('understrap-parent');

    wp_enqueue_style( 'understrap-child-main', get_stylesheet_uri() );
    wp_enqueue_style( 'understrap-child-common', get_stylesheet_directory_uri() . '/scss/style.css', array(), '1.3' );
    
    wp_enqueue_script( 'understrap-child-main', get_stylesheet_directory_uri() . '/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'understrap_child_theme_scripts', 20 );



/*-------------------------------------------------*/
/*	Navigation
/*-------------------------------------------------*/
	register_nav_menus(
		array(
			'header-menu'  => __( 'Header Menu', 'understrap-child' ),
			'footer-menu'  => __( 'Footer Menu', 'understrap-child' )
		)
	);

/*-------------------------------------------------*/
/*  Enable featured image
/*-------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

/*-------------------------------------------------*/
/*  Change the output query above the created custom post type so that the output of these posts is sorted by the "environmental" field created above.
/*-------------------------------------------------*/


class Custom_Homepage_Sorting {

    public function __construct() {
        // Додаємо хук для зміни основного запиту на головній сторінці
        add_action( 'pre_get_posts', [ $this, 'modify_homepage_query' ] );
    }

    /**
     * Функція для зміни запиту на головній сторінці
     *
     * @param WP_Query $query
     */
    public function modify_homepage_query( $query ) {
        // Переконуємося, що це не адмінка, це головний запит і це головна сторінка
        if ( ! is_admin() && $query->is_main_query() && ( is_home() || is_front_page() ) ) {

            // Додаємо сортування за полем "екологічність"
            $query->set( 'meta_key', 'environmental_friendliness' );
            $query->set( 'orderby', 'meta_value_num' ); // Сортування по числовому полю
            $query->set( 'order', 'DESC' ); // Від більшого до меншого
        }
    }
}

// Ініціалізуємо клас
new Custom_Homepage_Sorting();


