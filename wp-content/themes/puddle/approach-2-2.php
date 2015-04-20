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
<div class="approach gray"><ul>
<?php
	if ( ! dynamic_sidebar('approach-2-2' ) ) {
?>
		<!-- Dummy Image -->
		<li style="margin:-13px 0 0;padding:0;height:313px;"><img style="margin-top:15px;" src="<?php echo get_stylesheet_directory_uri().'/images/dummy.jpg';?>" /></li>
		<!-- Dummy Image -->	
<?php		
	} 
?>
</ul></div>
<?php 		do_action( 'raindrops_after_part_'. basename( __FILE__, '.php' ). '_'. basename( $template ) ); ?>
