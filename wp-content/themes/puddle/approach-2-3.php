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
<div class="approach-content home-tab-list">
<?php
	if ( ! dynamic_sidebar('approach-2-3' ) ) {
?>
<ul class="raindrops-tab-list clearfix"><li class="dummy">Tab Area</li></ul>
	<div class="raindrops-tab-content clearfix">
<?php 
		$message1 = get_theme_mod( 'puddle_message1' );
		if ( ! empty( $message1 ) ){
			$title = get_theme_mod( 'puddle_message1_title','NoTitle' );
?>
		<div class="raindrops-tab-page">
		<h3><?php echo esc_html( $title );?></h3>
		<?php echo do_shortcode( $message1 );?>
		</div>
<?php 
		}
		$message2 = get_theme_mod( 'puddle_message2' ) ;

		if( ! empty( $message2 ) ){
			$title = get_theme_mod( 'puddle_message2_title','NoTitle' );
?>
		<div class="raindrops-tab-page">
		<h3><?php echo esc_html( $title );?></h3>
		<?php echo do_shortcode( $message2 );?>	
		</div>
<?php	
		}
		$message3 = get_theme_mod( 'puddle_message3' ) ;

		if( ! empty( $message3 ) ){
			$title = get_theme_mod( 'puddle_message3_title','NoTitle' );
?>
		<div class="raindrops-tab-page">
		<h3><?php echo esc_html( $title );?></h3>
		<?php echo do_shortcode( $message3 );?>	
		</div>
<?php	
		}
?>
	</div>
<?php
	} 
?>
</div>
<?php 		do_action( 'raindrops_after_part_'. basename( __FILE__, '.php' ). '_'. basename( $template ) ); ?>
