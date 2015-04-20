<?php
		do_action( 'raindrops_'. basename(__FILE__) );
		get_header( $raindrops_document_type );
		do_action( 'raindrops_pre_'.basename( __FILE__) );
		
		$raindrops_current_column = raindrops_show_one_column( );
		
		if ( $raindrops_current_column !== false ) {
			add_filter( "raindrops_theme_settings__raindrops_indv_css","raindrops_color_type_custom" );
		}
		raindrops_debug_navitation( __FILE__ );
?>
	<div id="yui-main">
		<div id="container">
<?php
/**
 *  Widget only home
 *
 */
		if ( is_front_page( ) && is_active_sidebar( 'sidebar-3' ) ) {
		
			echo '<div class="topsidebar">'."\n".'<ul>';
			
			dynamic_sidebar( 'sidebar-3' );
			
			echo '</ul>'."\n".'</div>'."\n".'<br class="clear" />';
		}
?>

		<div class="after-nav-menu">
<?php
/** raindrops_poster args settings
 *
 *
 *
 *
 */
	$puddle_page = get_posts( array( 'post_type' => 'page','orderby' => 'post_date','order' => 'ASC', ) );
	
	$page_lists = array(
		array(
			array('type' => array( 'include', 'approach-1-1.php' ), 'class' => 'unit size2of3' ),
			array('type' => array( 'include', 'approach-1-2.php' ), 'class' => 'unit size1of3' )
		),
		array(
			array('type' => array( 'include','approach-2-1.php' ), 'class' => 'unit size1of3' ),
			array('type' => array( 'include','approach-2-2.php' ), 'page_id'=>3 , 'class' => 'unit size1of3' ),
			array('type' => array( 'include','approach-2-3.php' ), 'class' => 'unit size1of3' ),
		),

	);
	raindrops_poster( $page_lists );
?>
		</div>
<?php
/** raindrops_tile( )
 *
 *
 *
 *
 */
	$args = array(
			'posts_per_page'  => 3,
			'numberposts'     => -1,
			'orderby'         => 'post_date',
			'order'           => 'DESC',
			'post_type'       => 'post',
		//	'meta_key'        => '_thumbnail_id', //Shows only has post thumbnail
			'post_status'     => 'publish',
			'post__not_in'    => get_option( 'sticky_posts' ),
			'raindrops_tile_col' => 3,//columns 2-4
			);
	raindrops_tile( $args );
?>
      </div>
    </div>
</div>
<?php get_footer( $raindrops_document_type ); ?>