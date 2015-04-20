<?php
/**
 * Template part file for default sidebar.
 *
 *
 * @package Raindrops
 * @since Raindrops 0.1
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $template;
do_action( 'raindrops_pre_part_'. basename( __FILE__, '.php' ). '_'. basename( $template ) );
?>
<ul class="approach coal">
<?php
	if ( ! dynamic_sidebar('approach-2-1' ) ) {
		$raindrops_bf_category_posts_setting = array(	
				'title'			=> esc_html__( 'News', 'Raindrops' ) ,
				'numberposts'	=> -1 ,//show count
				'category'		=> 0 ,//Please specify the category ID you want to display
				'orderby'		=> 'post_date',
				'order'			=> 'DESC',
				'raindrops_post_thumbnail' => false,
                                'raindrops_category_post_thumbnail_default_uri' => '',
                    );
		raindrops_category_posts( $raindrops_bf_category_posts_setting );
	}
?>
</ul><?php 		do_action( 'raindrops_after_part_'. basename( __FILE__, '.php' ). '_'. basename( $template ) ); ?>