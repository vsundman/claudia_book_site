<?php
/**
 * The xhtml1.0 transitional header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="bd">
 *
 * @package Raindrops
 * @since Raindrops 0.997
 *
 */
if ( !defined( 'ABSPATH' ) ) {
	exit;
}
global $template, $raindrops_document_type, $raindrops_link_unique_text;
do_action( 'raindrops_pre_part_' . basename( __FILE__, '.php' ) . '_' . basename( $template ) );

switch ( $raindrops_document_type ) {
	/**
	 *
	 *
	 *
	 *
	 */
	case( 'html5' ):
		?>
<!DOCTYPE html>
	<html <?php language_attributes(); ?>>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>" />
			<?php wp_head(); ?>
		</head>
		<?php
		break;
		/**
		 *
		 *
		 *
		 *
		 */
		default:
echo '<' . '?' . 'xml version="1.0" encoding="' . get_bloginfo( 'charset' ) . '"' . '?' . '>' . "\n";
			?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="content-script-type" content="text/javascript" />
		<meta http-equiv="content-style-type" content="text/css" />
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
	</head>
	<?php
	break;
		} //end switch( $raindrops_document_type )
		?>
	<body <?php body_class(); ?>>
		<?php if ( raindrops_warehouse( 'raindrops_disable_keyboard_focus' ) == 'enable' ) { ?>	
		<div class="skip-link">
			<a href="#container" class="screen-reader-text" title="<?php esc_attr_e( 'Skip to content', 'Raindrops' ); ?>"><?php esc_html_e( 'Skip to content', 'Raindrops' ); ?></a>
		</div>
		<?php } // raindrops_disable_keyboard_focus ?>
		<div id="<?php echo esc_attr( raindrops_warehouse( 'raindrops_page_width' ) ); ?>" class="<?php echo esc_attr( 'yui-' . raindrops_warehouse( 'raindrops_col_width' ) ); ?> hfeed">
			<?php raindrops_prepend_doc(); ?>
			<<?php raindrops_doctype_elements( 'div', 'header' ); ?> id="top">
				<div id="hd">
					<?php echo raindrops_site_title(); ?>

					<?php echo raindrops_site_description(); ?>

				</div>
				<?php raindrops_nav_menu_primary();?>
				<?php raindrops_after_nav_menu();?>
			</<?php raindrops_doctype_elements( 'div', 'header' ); ?>>
			<?php
			$raindrops_title_in_the_header_check = raindrops_warehouse_clone( 'raindrops_place_of_site_title' );
				 
			if ( true == $raindrops_link_unique_text || $raindrops_title_in_the_header_check == 'header_image' ) {
			
				$raindrops_header_image = raindrops_header_image( 'elements' );
			} else {

				$raindrops_header_image = raindrops_header_image( 'home_url' );
			}

			if ( !empty( $raindrops_header_image ) || has_post_thumbnail() ) {
				?>
				<span id="container"></span>
				<div class="yui-g front-page-top-container">
					<div class="" <?php raindrops_doctype_elements( '', 'role="main"' ); ?>>
						<div class="static-front-content">
							<?php
							if ( is_page() ) {

								if ( have_posts() ) {

									while ( have_posts() ) {

										the_post();
										the_content();
									}
								}
							}
							?>
							<br style="clear:both" />
						</div>
					</div>
					<div class="yui-u">
						<div class="static-front-media">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'large', 'style=max-width:100%;width:100%;height:auto;' );
							} else {
								echo $raindrops_header_image;
							}
						} else {
							?>  
							<div class="static-front-content">
								<?php
								if ( is_page() ) {

									if ( have_posts() ) {

										while ( have_posts() ) {

											the_post();
											the_content();
										}
									}
								}
								?>
								<br style="clear:both" />
							</div>
<?php } // end if ( ! empty( $raindrops_header_image ) || has_post_thumbnail( ) )   ?>
					</div>
				</div>
			</div>
			<div id="bd" class="clearfix">
<?php do_action( 'raindrops_after_part_' . basename( __FILE__, '.php' ) . '_' . basename( $template ) ); ?>