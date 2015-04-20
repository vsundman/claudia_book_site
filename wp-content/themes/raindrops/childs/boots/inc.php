<?php
/**
 * Child Theme config file
 *
 *
 */
$raindrops_current_data			 = wp_get_theme( 'raindrops' );
$raindrops_current_data_version	 = $raindrops_current_data->get( 'Version' );
$raindrops_version_compare		 = version_compare(  '1.255', $raindrops_current_data_version);

if ( ! function_exists( 'raindrops_child_customizer_relate' ) && $raindrops_version_compare !== 1 ) {

	add_filter( 'raindrops_embed_meta_echo', 'raindrops_child_customizer_relate' );

	function raindrops_child_customizer_relate( $content ) {

		$style_type	 = raindrops_warehouse_clone( "raindrops_style_type" );
		$theme_name	 = wp_get_theme()->get( 'Name' );
		if ( $style_type == $theme_name ) {
			return raindrops_child_embed_css();
		} else {
			return $content;
		}
	}
}

/**
 *
 * @return type
 *
 *
 */

if ( !function_exists( 'raindrops_child_embed_css' ) ) {

    function raindrops_child_embed_css() {

        global $post, $raindrops_current_theme_name, $raindrops_base_font_size;
		$pinup_style			   = '';
        $result                    = '';
        $css                       = '';
        $result_indv               = '';
        $raindrops_base_color      = raindrops_warehouse_clone( 'raindrops_base_color' );
        $raindrops_style_type      = raindrops_warehouse_clone( "raindrops_style_type" );
        // $css .= raindrops_design_output( $raindrops_style_type ) /* . raindrops_color_base() */;
        //when this code exists [raindrops color_type="minimal" col="1"] in the post
        $raindrops_hyperlink_color = raindrops_warehouse_clone( 'raindrops_hyperlink_color' );
        $raindrops_indv_css        = raindrops_design_output( $raindrops_style_type ) . raindrops_color_base( $raindrops_base_color, array( 'color' => 'rd-type-boots .color', 'face' => 'rd-type-boots .face' ) );
        $raindrops_indv_css        = raindrops_color_type_custom( $raindrops_indv_css );

        $raindrops_fluid_maximum_width = raindrops_warehouse_clone( 'raindrops_fluid_max_width' );

        $css .= "\n.rd-type-boots #access .menu-header,.rd-type-boots #access .menu,";
        $css .= "\nbody #doc3{max-width:" . $raindrops_fluid_maximum_width . 'px;}';
        $css .= apply_filters( "raindrops_indv_css", $raindrops_indv_css );

        if ( $raindrops_hyperlink_color !== '' ) {

            $css .= raindrops_custom_link_color( $raindrops_hyperlink_color );
        }
        $background = get_background_image();
        $color      = get_background_color();

        if ( !empty( $background ) || !empty( $color ) ) {

            $css = preg_replace( "|body[^{]*{[^}]+}|", "", $css );
        }
        if ( raindrops_warehouse_clone( 'raindrops_basefont_settings' ) > 13 ) {

            $css .= 'body{font-size:' . raindrops_warehouse_clone( 'raindrops_basefont_settings' ) . 'px;}';
        } elseif ( isset( $raindrops_base_font_size ) ) {

            $css .= 'body{font-size:' . $raindrops_base_font_size . 'px;}';
        }
        $css .= raindrops_embed_css();
        $css = str_replace( "raindrops_color_ja", '', $css );


        $raindrops_text_color = get_theme_mod( 'header_textcolor', 'ffffff' );
        $header_image         = get_header_image();

        if ( $raindrops_text_color !== 'blank' && !empty( $header_image ) ) {

            $css .= " \n#site-title a,#site-title span{color:#" . $raindrops_text_color . ';}';
            $css .= " \n.description{color:#" . $raindrops_text_color . ';}';
        }
        $raindrops_options         = get_option( 'raindrops_theme_settings' );
        $raindrops_hyperlink_color = raindrops_warehouse_clone( 'raindrops_hyperlink_color' );

        if ( $raindrops_hyperlink_color !== '' ) {
            $css .= "#bd a{color:" . $raindrops_hyperlink_color . "!important;}";
        }

        $raindrops_fonts_color = raindrops_warehouse_clone( 'raindrops_default_fonts_color' );

        if ( $raindrops_fonts_color !== '' ) {
            $css .= "article {color:" . $raindrops_fonts_color . "!important;}";
        }

        $raindrops_fonts_color = raindrops_warehouse_clone( 'raindrops_footer_color' );

        if ( $raindrops_fonts_color !== '' ) {
            $css .= "#ft {color:" . $raindrops_fonts_color . "!important;}";
        }

        $raindrops_footer_link_color = raindrops_warehouse_clone( 'raindrops_footer_link_color' );

        if ( !empty( $raindrops_footer_link_color ) ) {
            $css .= "#ft a{color:" . $raindrops_footer_link_color . "!important;}";
        }



        $background = get_background_image();
        $color      = get_background_color();

        if ( !empty( $background ) || !empty( $color ) ) {

            $css .= preg_replace( "|body[^{]*{[^}]+}|", "", $css );
        }

        //body background
        $body_background            = get_theme_mod( "background_color" );
        $body_background_image      = get_theme_mod( "background_image" );
        $body_background_repeat     = get_theme_mod( "background_repeat" );
        $body_background_position_x = get_theme_mod( "background_position_x" );
        $body_background_attachment = get_theme_mod( "background_attachment" );

        if ( $body_background !== false && !empty( $body_background ) && !empty( $body_background_image ) ) {

            $css .= "\nbody{background:#" . $body_background . ' url(  ' . $body_background_image . '  );}';
        } elseif ( $body_background !== false && !empty( $body_background ) ) {

            $css .= "\nbody{background-color:#" . $body_background . '!important;}';
        } elseif ( !empty( $body_background_image ) ) {

            $css .= "\nbody{background-image: url(  " . $body_background_image . '  );}';
        }

        if ( isset( $body_background_repeat ) && !empty( $body_background_repeat ) ) {

            $css .= "\nbody{background-repeat: " . $body_background_repeat . ';}';
        }

        if ( isset( $body_background_position_x ) && !empty( $body_background_position_x ) ) {

            $css .= "\nbody{background-position:top " . $body_background_position_x . ';}';
        }

        if ( isset( $body_background_attachment ) && !empty( $body_background_attachment ) ) {

            $css .= "\nbody{background-attachment: " . $body_background_attachment . ';}';
        }
		/* Primary Menu Font Size */
			$primary_menu_font_size = raindrops_warehouse_clone( 'raindrops_menu_primary_font_size' );

			if ( isset( $primary_menu_font_size ) && !empty( $primary_menu_font_size ) ) {
				/* Add check value why some web site font-size:0% using child theme */
				if ( $primary_menu_font_size > 76 && $primary_menu_font_size < 183 ) {
					
					$css .= '#access a{font-size:' . floatval( $primary_menu_font_size ) . '%;}';
				} else {
					
					$css .= '#access a{font-size:100%;}';	
				}
			} else {
				$css .= '#access a{font-size:100%;}';
			}
		
		$primary_menu_min_width = raindrops_warehouse_clone( 'raindrops_menu_primary_min_width' );
			
		if ( isset( $primary_menu_min_width ) && !empty( $primary_menu_min_width ) ) {

			if ( $primary_menu_min_width < 10 ) { $child_width = 10; }else{ $child_width = floatval( $primary_menu_min_width );}

			$adding_style = '#access ul ul li,#access ul ul,#access a{ min-width:%1$dem;}
							.ie8 #access .page_item_has_children > a:after,
							.ie8 #access .menu-item-has-children > a:after{ content :"";}
							#access .children li,#access .sub-menu li,#access .children ul,#access .sub-menu ul,#access .children a,#access .sub-menu a{
							 width:%2$dem;
							}';
			$css .= sprintf( $adding_style , $primary_menu_min_width, $child_width );				
		} 
		
        if ( function_exists( 'raindrops_gradient_clone' ) ) {

            $css .= raindrops_gradient_clone( '.rd-type-boots #yui-main .entry-content .gradient' );
        }
        if ( function_exists( 'raindrops_color_base_clone' ) ) {

            // $css .= raindrops_color_base_clone( $raindrops_base_color );
        }

        if ( is_single() || is_page() ) {

					$pinup_widget_ids		= raindrops_get_pinup_widget_ids();
					$pinup_widget_post_ids	= raindrops_pinup_widget_ids_to_post_ids( $pinup_widget_ids );

					foreach( $pinup_widget_post_ids as $pinup_id ){

						$web_fonts = get_post_meta( $pinup_id, '_web_fonts_link_element', true );

						if ( isset( $web_fonts ) && !empty( $web_fonts ) ) {

							$web_fonts_each_array = explode("\n", $web_fonts);

							foreach( $web_fonts_each_array as $web_fonts_each ) {
								$result = str_replace( array( $web_fonts_each,"\n\n"), array('',"\n"), $result );
								$result .= $web_fonts_each ."\n";
							}
						}

						$web_fonts_style = get_post_meta( $pinup_id, '_web_fonts_styles', true );

							if ( isset( $web_fonts_style ) && !empty( $web_fonts_style ) ) {

								$web_fonts_style_each_array = explode("\n", $web_fonts_style );

								foreach( $web_fonts_style_each_array as $web_fonts_style_each ) {
									$pinup_style = str_replace( array( $web_fonts_style_each,"\n\n"), array('',"\n"), $pinup_style );
									$pinup_style .= $web_fonts_style_each ."\n";
								}
							}
					}

					$web_fonts = get_post_meta( get_the_ID(), '_web_fonts_link_element', true );

					if ( isset( $web_fonts ) && !empty( $web_fonts ) ) {

						$result .= $web_fonts ;
					}

					$web_fonts_styles = get_post_meta( $post->ID, '_web_fonts_styles', true );

					if ( ( isset( $web_fonts_styles ) && !empty( $web_fonts_styles ) ) || !empty( $pinup_style )) {

						$web_fonts_styles_wrapper = "<style type=\"text/css\" media=\"screen\">\n". '%1$s</style>'. "\n";

						$result .= sprintf( $web_fonts_styles_wrapper,  $web_fonts_styles. $pinup_style );

					}

            $css_single = get_post_meta( $post->ID, 'css', true );

            $css_single .= get_post_meta( $post->ID, '_css', true );

            if ( true == RAINDROPS_OVERRIDE_POST_STYLE_ALL_CONTENTS ) {

                $css .= preg_replace_callback( '![^}]+{[^}]+}!siu', 'raindrops_css_add_id', $css_single );
            } else {

                $css .= $css_single;
            }

            if ( !empty( $css ) && RAINDROPS_CUSTOM_FIELD_CSS == true ) {

                $result .= '<style type="text/css" id="raindrops-embed-css">';
                $result .= "\n<!--/*<! [CDATA[*/\n";
                $result .= strip_tags( $css );
                $result .= "\n/*]]>*/-->\n";
                $result .= "</style>";
            }

            $meta = get_post_meta( $post->ID, 'meta', true );

            if ( !empty( $meta ) && RAINDROPS_CUSTOM_FIELD_META == true ) {

                $result .= raindrops_esc_custom_field_meta( $meta );
            }

            $javascript = get_post_meta( $post->ID, 'javascript', true );

            if ( !empty( $javascript ) && RAINDROPS_CUSTOM_FIELD_SCRIPT == true ) {

                $result .= '<script type="text/javascript">';
                $result .= "\n<!--/*<! [CDATA[*/\n";
                $result .= raindrops_esc_custom_field_javascript( $javascript );
                $result .= "\n/*]]>*/-->\n";
                $result .= "</script>";
            }
        } else {

			$pinup_widget_ids		= raindrops_get_pinup_widget_ids();
			$pinup_widget_post_ids	= raindrops_pinup_widget_ids_to_post_ids( $pinup_widget_ids );

			foreach( $pinup_widget_post_ids as $pinup_id ){

				$web_fonts = get_post_meta( $pinup_id, '_web_fonts_link_element', true );

				if ( isset( $web_fonts ) && !empty( $web_fonts ) ) {

					$web_fonts_each_array = explode("\n", $web_fonts);

					foreach( $web_fonts_each_array as $web_fonts_each ) {

						$result = str_replace( array( $web_fonts_each,"\n\n"), array('',"\n"), $result );
						$result .= $web_fonts_each ."\n";
					}
				}

				$web_fonts_style = get_post_meta( $pinup_id, '_web_fonts_styles', true );

				if ( isset( $web_fonts_style ) && !empty( $web_fonts_style ) ) {

					$web_fonts_style_each_array = explode("\n", $web_fonts_style );

					foreach( $web_fonts_style_each_array as $web_fonts_style_each ) {
						$result_indv = str_replace( array( $web_fonts_style_each,"\n\n"), array('',"\n"), $result_indv );
						$result_indv .= $web_fonts_style_each ."\n";
					}
				}
			}

            $result .= '<style type="text/css">';
            $result .= "\n<!--/*<! [CDATA[*/\n";

            if ( true == RAINDROPS_OVERRIDE_POST_STYLE_ALL_CONTENTS ) {

                if ( have_posts() ) {

                    if ( false == RAINDROPS_USE_AUTO_COLOR ) {

                    }
                    $result .= "\n/*start custom fields style for loop pages*/\n";
                    while ( have_posts() ) {
                        the_post();
                        $collections = get_post_meta( $post->ID, 'css', true );
                        $collections .= get_post_meta( $post->ID, '_css', true );
                        $result_indv .= preg_replace_callback( '![^}]+{[^}]+}!siu', 'raindrops_css_add_id', $collections );
                    }
                    rewind_posts();
                }
            }

            if ( WP_DEBUG !== true ) {

                $result_indv = str_replace( array( "\n", "\r", "\t", '&quot;', '--', '\"' ), array( "", "", "", '"', '', '"' ), $result_indv );
            }
            $result .= $result_indv;
            $result .= "\n/*end custom fields style for loop pages*/\n";
            $result .= "\n/*]]>*/-->\n";
            $result .= "</style>";
        }
		$css = apply_filters( 'raindrops_embed_meta_css', $css );
        return '<style type="text/css">' . $css . '</style>' . $result;
    }

}

/**
 * Add Broad Screenshot at Customizer
 *
 *
 */
if ( !function_exists( 'raindrops_customize_controls_print_styles' ) ) {

    function raindrops_customize_controls_print_styles() {
        ?>
        <style type="text/css">

            #customize-control-raindrops_style_type .customize-control-title + label{

                background:url( <?php echo get_template_directory_uri() . '/images/screen-shot-dark.png'; ?> );
                height:200px;
                display:block;
                background-position:0px 40px;
                background-repeat:no-repeat;
                background-size:cover;
            }
            #customize-control-raindrops_style_type .customize-control-title  + label + label{

                background:url( <?php echo get_template_directory_uri() . '/images/screen-shot-w3standard.png'; ?> );
                height:200px;
                display:block;
                background-position:0px 40px;
                background-repeat:no-repeat;
                background-size:cover;
            }
            #customize-control-raindrops_style_type .customize-control-title  + label +label + label{

                background:url( <?php echo get_template_directory_uri() . '/images/screen-shot-light.png'; ?> );
                height:200px;
                display:block;
                background-position:0px 40px;
                background-repeat:no-repeat;
                background-size:cover;
            }
            #customize-control-raindrops_style_type .customize-control-title  + label +label + label + label{

                background:url( <?php echo get_template_directory_uri() . '/images/screen-shot-minimal.png'; ?> );
                height:200px;
                display:block;
                background-position:0px 40px;
                background-repeat:no-repeat;
                background-size:cover;
            }
            #customize-control-raindrops_style_type .customize-control-title  + label +label + label + label + label{

                background:url( <?php echo get_stylesheet_directory_uri() . '/screenshot.png'; ?> );
                height:180px;
                display:block;
                background-position:0px 40px;
                background-repeat:no-repeat;
                background-size:cover;
            }
        </style>
        <?php
    }

}
/**
 * Remove table data when Uninstall Theme
 *
 *
 */
if ( !function_exists( 'raindrops_child_uninstall' ) ) {
    add_action( 'switch_theme', 'raindrops_child_uninstall' );

    function raindrops_child_uninstall() {

       // delete_option( "raindrops_theme_settings" );
    }

}
/**
 * Overwrite Parent Theme Settings
 */
if ( !isset( $raindrops_child_base_setting_args ) ) {
    $raindrops_child_base_setting_args = array(
	array( 'option_id'    => 1,
        'blog_id'      => 0,
        'option_name'  => "raindrops_color_scheme",
        'option_value' => "raindrops_color_ja",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Color Scheme', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Please choose the naming convention for the color list', 'Raindrops' ),
        'validate'     => 'raindrops_color_scheme_validate', 'list'         => 12 ),
    array( 'option_id'    => 2,
        'blog_id'      => 0,
        'option_name'  => "raindrops_base_color",
        'option_value' => "#444444",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Base Color for Automatic Color Arrangement', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Please specify your favorite color. and an automatic arrangement of color is designed.', 'Raindrops' ),
        'validate'     => 'raindrops_base_color_validate',
        'list'         => 1 ),
    array( 'option_id'    => 3,
        'blog_id'      => 0,
        'option_name'  => "raindrops_style_type",
        'option_value' => "boots",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Color Type', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'The mood like dark atmosphere and the bright note, etc. is decided. and The editor is displayed when themename is selected, and a present style can be edited in detail.', 'Raindrops' ),
        'validate'     => 'raindrops_style_type_validate',
        'list'         => 2,
    ),
    array( 'option_id'    => 4,
        'blog_id'      => 0,
        'option_name'  => "raindrops_header_image",
        'option_value' => "none",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Header background image', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'The header image can be set by two methods.
One is a method of up-loading the image from the below up-loading form. Another is a method of filling in the filename from this textfield from Raindrops/images something image.', 'Raindrops' ),
        'validate'     => 'raindrops_header_image_validate',
        'list'         => 3,
    ),
    array( 'option_id'    => 5,
        'blog_id'      => 0,
        'option_name'  => "raindrops_footer_image",
        'option_value' => "none",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Footer background image', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'The footer image can be set by two methods.
One is a method of up-loading the image from the below up-loading form. Another is a method of filling in the filename from this textfield from Raindrops/images something image.', 'Raindrops' ),
        'validate'     => 'raindrops_footer_image_validate', 'list'         => 4 ),
    array( 'option_id'    => 6,
        'blog_id'      => 0,
        'option_name'  => "raindrops_heading_image",
        'option_value' => "none",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Widget Title Background Image', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'The header image can be chosen from among three kinds [h2.png,h2b.png,h2c.png].', 'Raindrops' ),
        'validate'     => 'raindrops_heading_image_validate', 'list'         => 5 ),
    array( 'option_id'    => 7,
        'blog_id'      => 0,
        'option_name'  => "raindrops_heading_image_position",
        'option_value' => "0",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Widget Title Background Image Position', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'The name of the picture file used for the h2 headding is set. Please set the integral value from 0 to 7. ', 'Raindrops' ),
        'validate'     => 'raindrops_heading_image_position_validate', 'list'         => 6 ),
    array( 'option_id'    => 8,
        'blog_id'      => 0,
        'option_name'  => "raindrops_page_width",
        'option_value' => "doc3",
        'autoload'     => 'yes',
        'title'        => __( 'Page Width', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Please choose width on the page.', 'Raindrops' ) .
        esc_html__( 'Please choose from four kinds of inside of', 'Raindrops' ) .
        esc_html__( '750px centerd 950px centerd fluid 974px.', 'Raindrops' ),
        'validate'     => 'raindrops_page_width_validate', 'list'         => 7 ),
    array( 'option_id'    => 9,
        'blog_id'      => 0,
        'option_name'  => "raindrops_col_width",
        'option_value' => "t2",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Column Width and Position', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Please specify the position and the width of Default Sidebar. Six kinds of sidebars of left 160px left 180px left 300px right 180px right 240px right 300px can be specified.', 'Raindrops' ),
        'validate'     => 'raindrops_col_width_validate', 'list'         => 8 ),
    array( 'option_id'    => 10,
        'blog_id'      => 0,
        'option_name'  => "raindrops_default_fonts_color",
        'option_value' => "none",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Text color in content ', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'If you need to set contents Special font color.', 'Raindrops' ),
        'validate'     => 'raindrops_default_fonts_color_validate', 'list'         => 9 ),
    array( 'option_id'    => 11,
        'blog_id'      => 0,
        'option_name'  => "raindrops_footer_color",
        'option_value' => "none",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Text color in footer ', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'If you need to set footer Special font color.', 'Raindrops' ),
        'validate'     => 'raindrops_footer_color_validate', 'list'         => 10 ),
    array( 'option_id'    => 12,
        'blog_id'      => 0,
        'option_name'  => "raindrops_show_right_sidebar",
        'option_value' => "show",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Extra Sidebar', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Please specify show when you want to use three row layout. Please set Ratio to text when extra sidebar is displayed when you specify show', 'Raindrops' ),
        'validate'     => 'raindrops_show_right_sidebar_validate', 'list'         => 11 ),
    array( 'option_id'    => 13,
        'blog_id'      => 0,
        'option_name'  => "raindrops_right_sidebar_width_percent",
        'option_value' => "25",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Extra Sidebar Width', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'When display extra sidebar is set to show', 'Raindrops' ) .
        esc_html__( 'it is necessary to specify it.', 'Raindrops' ) .
        esc_html__( 'It can decide to divide the width of which place of extra sidebar', 'Raindrops' ) .
        esc_html__( 'and to give it. Please select it from among 25% 33% 50% 66% 75%. ', 'Raindrops' ),
        'validate'     => 'raindrops_right_sidebar_width_percent_validate', 'list'         => 12 ),
    array( 'option_id'    => 14,
        'blog_id'      => 0,
        'option_name'  => "raindrops_show_menu_primary",
        'option_value' => "show",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Menu Primary', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Display or not Menu Primary. default value is show. set hide when not display menu primary', 'Raindrops' ),
        'validate'     => 'raindrops_show_menu_primary_validate', 'list'         => 13 ),
    array( 'option_id'    => 15,
        'blog_id'      => 0,
        'option_name'  => "raindrops_hyperlink_color",
        'option_value' => "none",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Link color', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Hyper link color', 'Raindrops' ),
        'validate'     => 'raindrops_hyperlink_color_validate', 'list'         => 14 ),
    array( 'option_id'    => 16,
        'blog_id'      => 0,
        'option_name'  => "raindrops_accessibility_settings",
        'option_value' => "no",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Accessibility Settings', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Accessibility Settings is create a unique link text. set to yes or no.', 'Raindrops' ),
        'validate'     => 'raindrops_accessibility_settings_validate',
        'list'         => 15
    ),
    array( 'option_id'    => 17,
        'blog_id'      => 0,
        'option_name'  => "raindrops_doc_type_settings",
        'option_value' => "html5",
        'autoload'     => 'yes',
        'title'        => esc_html__( "Document Type Settings", 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( "Default Document type html5. Set to xhtml or html5.", 'Raindrops' ),
        'validate'     => 'raindrops_doc_type_settings_validate',
        'list'         => 16
    ),
     array( 'option_id'    => 18,
        'blog_id'      => 0,
        'option_name'  => "raindrops_basefont_settings",
        'option_value' => "13",
        'autoload'     => 'yes',
        'title'        => esc_html__( "Base Font Size Setting", 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( "Base Font Size Value Recommend 13-20 (px size)", 'Raindrops' ),
        'validate'     => 'raindrops_basefont_settings_validate',
         'list'         => 17
    ),
      array( 'option_id'    => 19,
        'blog_id'      => 0,
        'option_name'  => "raindrops_fluid_max_width",
        'option_value' => "1280",
        'autoload'     => 'yes',
        'title'        => esc_html__( "Fluid ( Responsive ) Max Page Width", 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( "Default 1280 (px size)", 'Raindrops' ),
        'validate'     => 'raindrops_fluid_max_width_validate',
         'list'         => 18
    ),
    array( 'option_id'    => 20,
        'blog_id'      => 0,
        'option_name'  => "raindrops_entry_content_is_home",
        'option_value' => "content",
        'autoload'     => 'yes',
        'title'        => esc_html__( "Home Entry Content Type", 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( "value content, excerpt, none", 'Raindrops' ),
        'validate'     => 'raindrops_entry_content_is_home_validate',
         'list'         => 19
    ),
    array( 'option_id'    => 21,
        'blog_id'      => 0,
        'option_name'  => "raindrops_entry_content_is_category",
        'option_value' => "content",
        'autoload'     => 'yes',
        'title'        => esc_html__( "Category Archive Content Type", 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( "value content, excerpt, none", 'Raindrops' ),
        'validate'     => 'raindrops_entry_content_is_category_validate',
         'list'         => 20
    ),

       array( 'option_id'    => 22,
        'blog_id'      => 0,
        'option_name'  => "raindrops_entry_content_is_search",
        'option_value' => "content",
        'autoload'     => 'yes',
        'title'        => esc_html__( "Search Result Content Type", 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( "value content, excerpt, none", 'Raindrops' ),
        'validate'     => 'raindrops_entry_content_is_tag_validate',
         'list'         => 21
    ),
    array( 'option_id'    => 23,
        'blog_id'      => 0,
        'option_name'  => "raindrops_footer_link_color",
        'option_value' => "none",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Link color in footer ', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'If you need to set footer Special link color.hex color ex.#ff0000 or none', 'Raindrops' ),
        'validate'     => 'raindrops_footer_link_color_validate',
        'list'         => 22
    ),
	array( 'option_id'    => 24,
        'blog_id'      => 0,
        'option_name'  => "raindrops_complementary_color_for_title_link",
        'option_value' => "none",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Complementary Color For Entry Title Link ', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'If you need to set complementary color for entry title.(There is a need to link color is set to chromatic) value yes or none', 'Raindrops' ),
        'validate'     => 'raindrops_complementary_color_for_title_link_validate',
        'list'         => 23
    ),
	array( 'option_id'    => 25,
        'blog_id'      => 0,
        'option_name'  => "raindrops_plugin_presentation_bcn_nav_menu",
        'option_value' => "none",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Breadcrumb NavXT Automatic Presentation ', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Theme, will make a presentation of applying the plugin automatically, value set yes or none', 'Raindrops' ),
        'validate'     => 'raindrops_plugin_presentation_bcn_nav_menu_validate',
        'list'         => 24
    ),
	array( 'option_id'    => 26,
        'blog_id'      => 0,
        'option_name'  => "raindrops_plugin_presentation_wp_pagenav",
        'option_value' => "none",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'WP-PageNavi Automatic Presentation ', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Theme, will make a presentation of applying the plugin automatically, value set yes or none', 'Raindrops' ),
        'validate'     => 'raindrops_plugin_presentation_wp_pagenav_validate',
        'list'         => 25
    ),
	array( 'option_id'    => 27,
        'blog_id'      => 0,
        'option_name'  => "raindrops_plugin_presentation_meta_slider",
        'option_value' => "none",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Meta Slider Automatic Presentation ', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Please Set Meta Slider ID or none', 'Raindrops' ),
        'validate'     => 'raindrops_plugin_presentation_wp_pagenav_validate',
        'list'         => 26
    ),
	array( 'option_id'    => 28,
        'blog_id'      => 0,
        'option_name'  => "raindrops_plugin_presentation_the_events_calendar",
        'option_value' => "none",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'The Events Calendar Automatic Presentation ', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Theme, will make a presentation of applying the plugin automatically, value set yes or none', 'Raindrops' ),
        'validate'     => 'raindrops_plugin_presentation_the_events_calendarr_validate',
        'list'         => 27
    ),
	array( 'option_id'    => 29,
        'blog_id'      => 0,
        'option_name'  => "raindrops_disable_keyboard_focus",
        'option_value' => "enable",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Disable Keyboard Focus ', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Fallback Setting when Nav Menu displayed improperly, value set enable( defalt ) or disable', 'Raindrops' ),
        'validate'     => 'raindrops_disable_keyboard_focus_validate',
        'list'         => 28
    ),
	array( 'option_id'    => 30,
        'blog_id'      => 0,
        'option_name'  => "raindrops_sync_style_for_tinymce",
        'option_value' => "yes",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Synchronize Style for Visual Editor', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Reflect on Dynamically Editor Style Settings, value set yes ( default ) or none', 'Raindrops' ),
        'validate'     => 'raindrops_sync_style_for_tinymce_validate',
        'list'         => 29
    ),
	array( 'option_id'    => 31,
        'blog_id'      => 0,
        'option_name'  => "raindrops_uninstall_option",
        'option_value' => "keep",
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Uninstall Option', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Delete all Theme Settings when switch theme. default keep ( or delete )', 'Raindrops' ),
        'validate'     => 'raindrops_uninstall_option_validate',
        'list'         => 30
    ),
	 array( 'option_id'    => 32,
        'blog_id'      => 0,
        'option_name'  => "raindrops_menu_primary_font_size",
        'option_value' => 100,
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Menu Primary Font Size', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Menu Primary Font Size. default value is 100( % ). set font size between 77 and 182', 'Raindrops' ),
        'validate'     => 'raindrops_menu_primary_font_size_validate', 
		'list'         => 31 ),

		array( 'option_id'    => 33,
        'blog_id'      => 0,
        'option_name'  => "raindrops_menu_primary_min_width",
        'option_value' => 10,
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Menu Primary Menu Width', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Menu Primary Menu Width. default value is 10 ( em ). set 1 between 95.999', 'Raindrops' ),
        'validate'     => 'raindrops_menu_primary_min_width_validate', 
		'list'         => 32 ),

		array( 'option_id'    => 34,
        'blog_id'      => 0,
        'option_name'  => "raindrops_featured_image_position",
        'option_value' => 'left',
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Featured Image Position', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'Featured Image Position for Emphasis of new content using the Featured Image values default,left,front', 'Raindrops' ),
        'validate'     => 'raindrops_featured_image_position_validate', 
		'list'         => 33 ),
		array( 'option_id'    => 35,
        'blog_id'      => 0,
        'option_name'  => "raindrops_featured_image_size",
        'option_value' => 'thumbnail',
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Featured Image Size', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'values thumbnail, medium, large, default', 'Raindrops' ),
        'validate'     => 'raindrops_featured_image_size_validate', 
		'list'         => 34 ),
		array( 'option_id'    => 36,
        'blog_id'      => 0,
        'option_name'  => "raindrops_featured_image_recent_post_count",
        'option_value' => 3,
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Featured Image Special Layout Apply Post Count', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'values from 1 to Post Per Page count default value none', 'Raindrops' ),
        'validate'     => 'raindrops_featured_image_recent_post_count_validate', 
		'list'         => 35 ),
		array( 'option_id'    => 37,
        'blog_id'      => 0,
        'option_name'  => "raindrops_featured_image_singular",
        'option_value' => 'show',
        'autoload'     => 'yes',
        'title'        => esc_html__( 'Featured Image Show, lightbox or Hide on Singular Post,Page', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'values show or hide or lightbox ( light box is crop height ,add lightbox )', 'Raindrops' ),
        'validate'     => 'raindrops_featured_image_singular_validate', 
		'list'         => 36 ),
		array( 'option_id'    => 38,
        'blog_id'      => 0,
        'option_name'  => "raindrops_use_featured_image_emphasis",
        'option_value' => 'no',
        'autoload'     => 'yes',
        'title'        => esc_html__( 'USE or Not Emphasis of new content using the Featured Image', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'values yes or no default no', 'Raindrops' ),
        'validate'     => 'raindrops_use_featured_image_emphasis_validate', 
		'list'         => 37 ),
		array( 'option_id'    => 39,
        'blog_id'      => 0,
        'option_name'  => "raindrops_japanese_date",
        'option_value' => 'no',
        'autoload'     => 'yes',
        'title'        => esc_html__( 'USE or Not Japanese Date', 'Raindrops' ),
        'excerpt1'     => '',
        'excerpt2'     => esc_html__( 'values yes or no default no', 'Raindrops' ),
        'validate'     => 'raindrops_japanese_date_validate', 
		'list'         => 38 ),	
);
}

