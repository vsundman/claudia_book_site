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
<div class="approach"><ul>
<?php
	if ( ! dynamic_sidebar('approach-1-2' ) ) {
		the_widget( 'WP_Widget_Categories' );
	} 
?>
</ul>
</div>
<?php 		do_action( 'raindrops_after_part_'. basename( __FILE__, '.php' ). '_'. basename( $template ) ); ?>

