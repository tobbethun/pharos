<?php

function register_my_menus() {
  register_nav_menus(
    array(
      'main_menu' => __( 'Main Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

add_theme_support( 'post-thumbnails' );

register_nav_menu( 'primary', __( 'Main Menu', 'Single Page Menu', 'pharos' ) );

register_sidebar(array( // gör så att sidebar funkar
	'id' => 'sidebar-resursbank',
	'name' => __('Sidebar', 'pharos'),
	'desc' => 'Sidebar för resursbank'
	));



// breadcrumb function

function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Hem</a>';
    if (is_category() || is_single()) {
        echo ">";
        the_category(' &bull; ');
            if (is_single()) {
                echo "<span>></span>";
                the_title();
            }
    } elseif (is_page()) {
      global $post;     // if outside the loop

if ( is_page() && $post->post_parent ) {
    // This is a subpage
  $parentID = $post->post_parent;
  $parent_title = get_the_title($parentID);
  echo "<span>></span>";
  echo "<a href=".home_url().'/'. $parent_title .">" . $parent_title . "</a>";
  // echo "<a href=" . $parent_title . ">" . $parent_title. "</a>";

}
        echo "<span>></span>";
        echo the_title();
    } elseif (is_search()) {
        echo ">&nbsp;&nbsp;Sökresultat för... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

add_theme_support( 'title-tag' );


// add_theme_support( 'post-thumbnails' ); // sätter storlekarna bilder som används på sidan. Name, width, height
// add_image_size( 'mobile-thumb', 800, 800, false); //true = beskärs false = skalas

// add_theme_support( 'html5', array( 'search-form' ) );

// add_filter('wp_list_pages', create_function('$t', 'return str_replace("<a ", "<a class=\"list\" ", $t);'));

// function custom_excerpt_length( $length ) { //ändrar längden på excerpt texten till 15 ord
//   return 30;
// }
// add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


//Ladda css och js den rätta vägen.
function load_pharos_scripts() {
  wp_enqueue_script( 'pharos_script_jquery', get_bloginfo('template_directory') . '/js/jquery-3.3.1.min.js' );
  wp_enqueue_script( 'pharos_script_jquery', get_bloginfo('template_directory') . '/js/jquery-migrate-3.0.0.min.js' );
  wp_enqueue_script( 'pharos_script', get_bloginfo('template_directory') . '/js/main.js' );

}


add_action('wp_enqueue_scripts', 'load_pharos_scripts');

?>