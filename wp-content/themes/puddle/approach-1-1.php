<?php
/**
 * Template part file for default sidebar.
 *
 *
 * @package Raindrops
 * @since Raindrops 0.1
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $template, $raindrops_document_type;
do_action( 'raindrops_pre_part_'. basename( __FILE__, '.php' ). '_'. basename( $template ) );
?>
<ul class="approach">
<?php
	if ( ! dynamic_sidebar('approach-1-1' ) ) {
	
		$puddle_page	= get_posts( array( 'post_type' => 'page','orderby' => 'post_date','order' => 'ASC', ) );
		$post			= $puddle_page[0];	
		setup_postdata($post);
		printf( '<!--%1$s-->', $raindrops_document_type );
?>
        			<li style="margin:0;border:none;"><div class="entry page approach-content">
          				<<?php raindrops_doctype_elements( 'div', 'article' );?> id="post-<?php the_ID( ); ?>" <?php raindrops_post_class( );?>>
<?php 
				raindrops_entry_title( );
?>
            				<div class="entry-content">
<?php 
				raindrops_prepend_entry_content( );
				
				the_post_thumbnail( 'full','class=page-featured-image' );
				
				raindrops_entry_content( );
?>
              					<br class="clear" />
<?php
				raindrops_append_entry_content( );
?>
            				</div></li>
<?php		
		wp_reset_postdata( );
	} 
?>
</ul>
<?php 		do_action( 'raindrops_after_part_'. basename( __FILE__, '.php' ). '_'. basename( $template ) ); ?>

