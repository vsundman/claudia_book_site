<?php
/**
 *  Custom Header for boots Theme
 *
 *
 *
 */
if ( !isset( $boots_custom_header_args ) ) {
    $boots_custom_header_args = array(
        'default-text-color'     => 'ffffff'
        , 'width'                  => apply_filters( 'raindrops_header_image_width', '1600' )
        , 'flex-width'             => true
        , 'height'                 => apply_filters( 'raindrops_header_image_height', '160' )
        , 'flex-height'            => true
        , 'header-text'            => false
        , 'default-image'          => get_stylesheet_directory_uri() . '/images/headers/wp3.jpg'
        , 'wp-head-callback'       => apply_filters( 'raindrops_wp-head-callback', 'raindrops_embed_meta' )
        , 'admin-preview-callback' => 'raindrops_admin_header_image'
        , 'admin-head-callback'    => 'raindrops_admin_header_style'
    );

    add_theme_support( 'custom-header', $boots_custom_header_args );
}


/**
 * Setup
 *
 */
if ( !function_exists( 'raindrops_child_init' ) ) {
    add_action( 'after_setup_theme', 'raindrops_child_init' );

    function raindrops_child_init() {
        /* Insert Site Title and Description to Header Image */
		if ( file_exists( get_stylesheet_directory().'/header.php' ) ) {
		// if not exists child themes header.php then display raindrops same. (boxed header)	
			add_filter( 'raindrops_header_image_contents', 'boots_custom_header_image_filter' );
		}
        /* broad color type setting */
        add_action( 'raindrops_include_after', 'boots_extend_styles' );
    }

}

/**
 *
 * @param type $content
 * @return type
 */
if ( !function_exists( 'boots_custom_header_image_content' ) ) {

    function boots_custom_header_image_content( $content ) {
        global $raindrops_link_unique_text, $raindrops_fluid_maximum_width, $post;
		
        $boots_site_title = raindrops_site_title();

        if ( true !== $raindrops_link_unique_text ) {

            /* remove nested a elements */
            $boots_site_title = strip_tags( raindrops_site_title(), '<span><h1><div>' );
        }
		
		$boots_site_title = '<a href="'. esc_url( home_url() ). '" rel="home">'. $boots_site_title.'</a>';

        $boots_content_max_width = raindrops_warehouse_clone( 'raindrops_fluid_max_width' );

        if ( empty( $boots_content_max_width ) ) {

            $boots_content_max_width = 1280;
        }


        $html = '<div class="tagline-wrapper no-header-image"><div id="header-inner" style="%3$s">'
                . '%1$s%2$s'
                . '</div></div>';

        $page_width = boots_page_width();
		
		$image = get_header_image();
		
		if ( empty( $image ) ) {

			return sprintf( $html, 
						$boots_site_title, 
						'<div class="description">' . get_bloginfo( 'description' ) . '</div>', 
						apply_filters('boots_header_no_image_tagline_style', 'max-width:' . $boots_content_max_width . 'px;display:block;margin:auto; width:' . $page_width . ';')
					);
		}
		
		$post_meta = get_post_custom_values('_raindrops_this_header_image', $post->ID);		

		if ( is_singular() && isset( $post_meta ) && $post_meta[0] == 'hide' ) {
			
			return sprintf( $html, 
						$boots_site_title, 
						'<div class="description">' . get_bloginfo( 'description' ) . '</div>', 
						apply_filters('boots_header_no_image_tagline_style', 'max-width:' . $boots_content_max_width . 'px;display:block;margin:auto; width:' . $page_width . ';')
					);
		}
    }

}

if ( !function_exists( 'boots_custom_header_image_filter' ) ) {

    function boots_custom_header_image_filter( $content ) {
        global $raindrops_link_unique_text, $raindrops_fluid_maximum_width, $post;
		
        $boots_site_title = raindrops_site_title();

        if ( true !== $raindrops_link_unique_text ) {

            /* remove nested a elements */
            $boots_site_title = strip_tags( raindrops_site_title(), '<span><h1><div>' );
        }

        $boots_content_max_width = raindrops_warehouse_clone( 'raindrops_fluid_max_width' );

        if ( empty( $boots_content_max_width ) ) {

            $boots_content_max_width = 1280;
        }


        $html = '<div class="tagline-wrapper in-header-image"><div id="header-inner" style="%3$s">'
                . '%1$s%2$s'
                . '</div></div>';

        $page_width = boots_page_width();
		
		$post_meta = get_post_custom_values('_raindrops_this_header_image', $post->ID);		

		if ( ! isset( $post_meta ) || $post_meta[0] !== 'hide' ) {
			
			return sprintf( $html, 
						$boots_site_title, 
						'<div class="description">' . get_bloginfo( 'description' ) . '</div>', 
						apply_filters('boots_header_image_tagline_style', 'max-width:' . $boots_content_max_width . 'px;display:block;margin:auto; width:' . $page_width . ';')
					);
		}
    }

}


/**
 * Page width for style
 * @return string
 *
 */
if ( !function_exists( 'boots_page_width' ) ) {

    function boots_page_width() {

        $id = raindrops_warehouse_clone( 'raindrops_page_width' );

        switch ( $id ) {
            case('doc'):
                return '750px';
                break;
            case('doc2'):
                return '950px';
                break;
            case('doc4'):
                return '974px';
                break;
            default:
                $boots_content_max_width = raindrops_warehouse_clone( 'raindrops_fluid_max_width' );
 
                if ( ! empty( $boots_content_max_width )  && $id == 'doc3') {
                    return '100%; max-width:' . $boots_content_max_width . 'px;';
                } else {
                    return '100%';
                }
                break;
        }
    }

}

if ( !function_exists( 'boots_hash_link_change' ) ) {
    add_filter( 'raindrops_nav_menu_primary_html', 'boots_hash_link_change' );

    function boots_hash_link_change( $html ) {

        return str_replace( 'href="#doc3"', 'href="#"', $html );
    }

}