<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**Parent language file customize example
 *
 *
 * copy from raindrops/languages/lang.mo
 * paste to puddle/languages/raindrops/lang.mo
 *
 */
/* Example code

add_filter( 'raindrops_load_text_domain', 'puddle_child_lang' );
function child_lang( ) {

	return get_stylesheet_directory().'/languages/raindrops';
}
*/
/**Puddle language file
 *
 *
 *
 */

load_child_theme_textdomain( 'puddle',get_stylesheet_directory( ) . '/languages' );

/**Theme Puddle Infomation
 *
 *
 *
 *
 */
$puddle_current_data				= wp_get_theme( );
$puddle_current_data_theme_uri		= apply_filters( 'puddle_theme_url', $puddle_current_data->get( 'ThemeURI' ) );
$puddle_current_data_author_uri		= apply_filters( 'puddle_author_url', $puddle_current_data->get( 'AuthorURI' ) );
$puddle_current_data_version		= $puddle_current_data->get( 'Version' );
$puddle_current_theme_name			= $puddle_current_data->get( 'Name' );
/**
 * Create Child Theme Color Type
 *
 *
 *
 */	
add_action( 'raindrops_include_after', 'raindrops_extend_styles' );

function raindrops_extend_styles(){

	raindrops_register_styles("puddle");
}
/** Child Theme Color Type Base Settings
 * 
 *
 * You need to select color type 'puddle'( child theme name ) 
 * where Theme options page Color Type selectbox
 *
 *
 * note:
 * if you change child theme name then 
 * change function name is raindrops_indv_css_[your child theme name]
 */
function raindrops_indv_css_puddle(){

	global $puddle_style;

	$style = $puddle_style;
	/* Add another color class */
	
	//$style .= raindrops_color_base( '#000000','extend' );

	
	/* override style example color type dark include*/

	//$style .= raindrops_indv_css_dark();

	/* override style example latest color type include*/

	//$style .= raindrops_warehouse_clone( '_raindrops_indv_css' );
	
	/* if you use gradient class */
		$style .= raindrops_gradient_clone( );

	$style .= 'a{color:'.raindrops_warehouse_clone( 'raindrops_hyperlink_color' ) . ';}';
	
	$font_color = raindrops_warehouse_clone( 'raindrops_default_fonts_color' );
	
	if( ! empty( $font_color ) ) {		
		$style .= "\n". 'body{color:' . $font_color . ';}';
	}
	$style .= puddle_body_background_style();

	return $style;

}
	
/** Parent Template No NEED EXAMPLE
 * Template filterling example
 *
 * Change template from date.php to index.php when date archive page shows
 *
 *
 */
//add_filter( 'template_include', 'puddle_template_include' );

function puddle_template_include( $template ) {

		$template_sp = str_replace( 'date.php', 'index.php', $template );
		
		if ( file_exists( $template_sp ) ) {
			$template = $template_sp;
		}
	return $template;
}
/** Child Theme Default Settings
 *
 *
 *
 *
 */
    $puddle_base_setting_args = array(
         array(
        'option_name' => "raindrops_color_scheme",
        'option_value' => "raindrops_color_ja",
       	),
        array(
        'option_name' => "raindrops_base_color",
        'option_value' => "#444444",
        ),
        array(
        'option_name' => "raindrops_style_type",
        'option_value' => "puddle",
        ),
        array(
        'option_name' => "raindrops_header_image",
        'option_value' => "none",
       	),
        array(
        'option_name' => "raindrops_footer_image",
        'option_value' => "none",
        ),
        array(
        'option_name' => "raindrops_heading_image",
        'option_value' => "",
        ),
        array(
        'option_name' => "raindrops_heading_image_position",
        'option_value' => "0",
       ),
        array(
        'option_name' => "raindrops_page_width",
        'option_value' => "doc3",
        ),
        array(
        'option_name' => "raindrops_col_width",
        'option_value' => "t6",
        ),
        array(
        'option_name' => "raindrops_default_fonts_color",
        'option_value' => "",
        ),
        array(
        'option_name' => "raindrops_footer_color",

        'option_value' => "",
        ),
        array(
        'option_name' => "raindrops_show_right_sidebar",
        'option_value' => "hide",
        ),
        array(
        'option_name' => "raindrops_right_sidebar_width_percent",
        'option_value' => "25",
        ),
        array(
        'option_name' => "raindrops_show_menu_primary",
        'option_value' => "show",

		),
        array(
        'option_name' => "raindrops_hyperlink_color",
        'option_value' => "#777777"),
		 array(
        'option_name' => "raindrops_accessibility_settings",
        'option_value' => "no",
		 ),
		 array(
        'option_name' => "raindrops_doc_type_settings",
        'option_value' => "html5",
		 ),
    	);
		
/** Child Theme Setup
 *
 *
 *
 *
 */		
function setup_puddle( ) {

	global $wpdb, $puddle_base_setting_args;

	$raindrops_theme_settings = get_option( 'raindrops_theme_settings' );

	foreach( $puddle_base_setting_args as $add ) {
	
		if( isset($add['option_name']) ){
		
			$option_name = $add['option_name'];
			$raindrops_theme_settings[$option_name] = $add['option_value'];
	   }
	}
	
	$style_type				= 'puddle';
	$raindrops_indv_css		= raindrops_design_output_clone( $style_type ).raindrops_color_base_clone( );
	$raindrops_indv_css     = raindrops_color_type_custom( $raindrops_indv_css );

	$raindrops_theme_settings['_raindrops_indv_css']    = $raindrops_indv_css;
	
	update_option( 'raindrops_theme_settings', $raindrops_theme_settings, "", true );
	update_option( 'puddle_theme_settings', array( 'install_once' => 1 ) );
}

/** Child Theme Install
 *
 *
 *
 *
 */
$puddle_theme_settings = get_option( 'puddle_theme_settings' );

if ( $puddle_theme_settings['install_once'] == false ) {
	add_action( 'admin_init', 'setup_puddle' );
}
/** Child Theme Reset option
 *
 *
 *
 *
 */
add_action( 'raindrops_remove_theme_mods', 'puddle_remove_theme_mods' );

function puddle_remove_theme_mods(){

	remove_theme_mods( 'puddle' );
	setup_puddle( );

}
/** Child Theme Delete
 *
 *
 *
 *
 */		
add_action( 'switch_theme', 'puddle_uninstall' );

function puddle_uninstall(){

	delete_option( "puddle_theme_settings" );
	delete_option("raindrops_theme_settings");
}
/** Child Theme Background
 *
 *
 *
 *
 */
function puddle_body_background_style(){

	global $raindrops_custom_background_args;
	
	$body_background				= get_theme_mod( "background_color", $raindrops_custom_background_args['default-color'] );
	$body_background_image			= get_theme_mod( "background_image", $raindrops_custom_background_args['default-image']);
//body background
	$body_background_repeat         = get_theme_mod( "background_repeat" );
	$body_background_position_x     = get_theme_mod( "background_position_x" );
	$body_background_attachment     = get_theme_mod( "background_attachment" );
	
	$css = '';
	
	if ( $body_background !== false and !empty( $body_background ) and !empty( $body_background_image ) ) {

		$css .= "\nbody{background:#".$body_background.' url( '. $body_background_image. ' );}';
	} elseif ( $body_background !== false and !empty( $body_background ) ) {

		$css .= "\nbody{background-color:#".$body_background.';}';
	} elseif ( !empty( $body_background_image ) ) {

		$css                    .= "\nbody{background-image: url( ". $body_background_image. ' );}';
	}

	if ( isset( $body_background_repeat ) and !empty( $body_background_repeat ) ) {

		$css                    .= "\nbody{background-repeat: ". $body_background_repeat. ';}';
	}

	if ( isset( $body_background_position_x ) and !empty( $body_background_position_x ) ) {

		$css                    .= "\nbody{background-position:top ". $body_background_position_x. ';}';
	}

	if ( isset( $body_background_attachment ) and !empty( $body_background_attachment ) ) {

		$css                    .= "\nbody{background-attachment: ". $body_background_attachment. ';}';
	}
	
	return $css."\n";
}
/** puddle_socialWidget
 * 
 */
add_action( 'widgets_init', 'puddle_add_widget' );
 
function puddle_add_widget(){

	register_widget( "puddle_socialWidget" );
	register_widget( "puddle_entryWidget" );
}
 
class puddle_socialWidget extends WP_Widget {
 
 	function puddle_socialWidget() {
	
		$widget_ops= array( 'description'=> 'Display your Social links widget area and homepage top') ;
		parent::WP_Widget(false, 'Social links',$widget_ops);
		wp_reset_query();
	}
	
	function widget($args, $instance) {
	
		global $post;
		extract( $args );
		echo $before_widget;
		if( ! empty( $instance['title'] ) ) {
			echo $before_title. esc_html($instance['title']). $after_title;
		}
		echo $this->puddle_url2link( $instance['urls'] );
		echo $after_widget;
	}
  
 	function puddle_url2link( $url ) {
	
		$result		= '';	
		$html		= '<a href="%1$s" class="social-link" title="%3$s" rel="me"><span class="%2$s"><span class="link-text">%1$s</span></span></a>';
		
		$font_icons = array(	"github"=> array( "f200" , "genericon genericon-github") ,
								"dribbble"=> array( "f201" , "genericon genericon-dribbble") ,
								"twitter"=> array( "f202" , "genericon genericon-twitter") ,
								"facebook"=> array( "f203" , "genericon genericon-facebook") ,
								"facebook-alt"=> array( "f204" , "genericon genericon-facebook-alt") ,
								"wordpress"=> array( "f205" , "genericon genericon-wordpress") ,
								"googleplus"=> array( "f206" , "genericon genericon-googleplus") ,
								"linkedin"=> array( "f207" , "genericon genericon-linkedin") ,
								"linkedin-alt"=> array( "f208" , "genericon genericon-linkedin-alt") ,
								"pinterest"=> array( "f209" , "genericon genericon-pinterest") ,
								"pinterest-alt"=> array( "f210" , "genericon genericon-pinterest-alt") ,
								"flickr"=> array( "f211" , "genericon genericon-flickr") ,
								"vimeo"=> array( "f212" , "genericon genericon-vimeo") ,
								"youtube"=> array( "f213" , "genericon genericon-youtube") ,
								"tumblr"=> array( "f214" , "genericon genericon-tumblr") ,
								"instagram"=> array( "f215" , "genericon genericon-instagram") ,
								"codepen"=> array( "f216" , "genericon genericon-codepen") ,
								"polldaddy"=> array( "f217" , "genericon genericon-polldaddy") ,
								"googleplus-alt"=> array( "f218" , "genericon genericon-googleplus-alt") ,
								"path"=> array( "f219" , "genericon genericon-path") ,
								"skype"=> array( "f220" , "genericon genericon-skype") ,
								"digg"=> array( "f221" , "genericon genericon-digg") ,
								"reddit"=> array( "f222" , "genericon genericon-reddit") ,
								"stumbleupon"=> array( "f223" , "genericon genericon-stumbleupon") ,
								"pocket"=> array( "f224" , "genericon genericon-pocket") ,
								"share"=> array( "f415" , "genericon genericon-share") ,
								"cloud"=> array( "f426" , "genericon genericon-cloud") ,
						);
		$font_icons	= apply_filters( 'puddle_font_icons', $font_icons );
		$class		= $font_icons['cloud'][1];
		
		if( ! preg_match( "!".PHP_EOL."!" , $url) ) {
			
			if( preg_match( "/(https?:\/\/)([-_.!˜*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/iu", $url ) ) {
			
				foreach( $font_icons as $key=>$icon ) {
	
						if( preg_match( '!'.$key.'!', $url ) ) {
						
							$class = $icon[1];
							break;
						}
				}
				$result .= sprintf( $html, esc_url( $url ), esc_attr( $class ), esc_attr( $key ) );
			}
		} else {
		
			$links = explode( PHP_EOL, $url );

			foreach( $links as $key => $val ) {
			
				if( preg_match( "/(https?:\/\/)([-_.!˜*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/iu", $val ) ) {
				
					foreach( $font_icons as $key=>$icon ) {
					
					
						if( preg_match( '!'.$key.'!', $val ) ) {
						
							$class = $icon[1];
							break;
						}
					}
					$result .= sprintf( $html, esc_url( $val ), esc_attr( $class ), esc_attr( $key ) );
				}
			}
		}
		return $result;
	}
  
	function update( $new_instance, $old_instance ) {
	
	   $instance['title']= strip_tags(stripslashes($new_instance['title']));
	   $instance['urls']= strip_tags(stripslashes($new_instance['urls']));
	
	   return $instance;
	}


	function form($instance) {
	
		$title = '';
		$urls = '';
	
	if( isset( $instance['title'] ) ) {
	
		$title	= esc_attr($instance['title']);
	}
	if( isset( $instance['urls'] ) ) {

		$urls	= esc_attr($instance['urls']);
	}
		
?>
		<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php _e( 'Title:', 'puddle' ); ?> <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('urls') ); ?>"><?php _e( 'URLs:', 'puddle' ); ?> <textarea class="widefat" id="<?php echo $this->get_field_id('urls'); ?>" name="<?php echo $this->get_field_name('urls'); ?>" 
		placeholder="For Example ( linebreak for each url )
		
		https://twitter.com/*****
		http://******.tumblr.com/" rows="10"><?php echo $urls; ?></textarea>"</label></p>
<?php
	}
}
/** 
 *
 *
 *
 *
 */
class puddle_entryWidget extends WP_Widget {
 
 	function puddle_entryWidget() {
	
		$widget_ops= array( 'description'=> 'Display Special entries widget area and homepage top') ;
		parent::WP_Widget(false, 'Special entries',$widget_ops);
		wp_reset_query();
	}
	
	function widget($args, $instance) {
	
		extract( $args );
		echo $before_widget;
		
		if( preg_match( '!,!', $instance['id'] ) ) {
		
			$instance['id'] = explode( ',', $instance['id'] );
			$count 			= count( $instance['id'] );
			$num			= rand( 0, $count - 1 );
			
			$instance['id'] = $instance['id'][ $num ];
		}
		
		if ( $instance['content'] == 'content' || $instance['content'] == 'excerpt' )  {
		
			$posts = get_posts( array( 'include' => absint( $instance['id'] ), 'post_type' => sanitize_key( $instance['type'] ) ) );
			
			$html_title = '<h2 class="title" id="approach-%1$s"><a href="%2$s">%3$s</a></h2>';
	
			foreach($posts as $post){
				setup_postdata($post);
				
				printf( $html_title, absint( $post->ID ), esc_url( get_permalink( $post->ID ) ), get_the_title( $post->ID ) );
				
					//echo get_the_title($post->ID);
				if( isset( $instance['content'] ) and  $instance['content'] == 'excerpt' ) {
					the_excerpt();
				} else {
					the_content();
				}
			}

   		 	wp_reset_postdata( );
		}
		 
		if ( $instance['content'] == 'attachment' ) {
		
			$args = array(
			   'post_type' => 'attachment',
			   'numberposts' => -1,
			   'post_status' => 'public',
			   'post_parent' => $instance['id']
			  );
			$attachments 		= get_posts( $args );
			$attachments_num	= count( $attachments );
			$attachment_key		= rand( 0, $attachments_num - 1 );			
			$post				= $attachments[ $attachment_key ];
			setup_postdata( $post );
			
			$html = '<a href="%1$s" class="approach-image">%2$s</a>';
			
			printf( $html, get_permalink( $instance['id'] ), wp_get_attachment_image( $post->ID, 'full' ) );
			
			//the_title('<h2 class="entry-title" style="position:absolute;bottom:0;">','</h2>');
			$html = '<h2 class="entry-title puddle-entrywidget-attachment-title" id="approach-%2$s">%1$s</h2>';
			
			printf( $html, get_the_title($instance['id']), absint( $instance['id'] ) );

			wp_reset_postdata();
		}
		echo $after_widget;
	}
 
  
	function update( $new_instance, $old_instance ) {
	
	   $instance['id']= strip_tags(stripslashes($new_instance['id']));
	   $instance['content']= strip_tags(stripslashes($new_instance['content']));
	   $instance['type']= strip_tags(stripslashes($new_instance['type']));
	
	   return $instance;
	}


	function form($instance) {
		$id			= get_theme_mod( 'id' );
		$content	= get_theme_mod( 'content' );
		$type 		= get_theme_mod( 'type' );
	
	if ( isset( $instance['id'] ) ) {
	
		$id							= esc_attr($instance['id']);
	}
	if ( isset( $instance['content'] ) ) {
	
		$content					= esc_attr($instance['content']);
		
		$puddle_content_checked		= checked($instance['content'], "content",false );
		$puddele_excerpt_checked	= checked($instance['content'], "excerpt",false );
		
	}
	if ( isset( $instance['type'] ) ) {
	
		$type					= esc_attr($instance['type']);
	}

		
		if(  empty( $puddle_content_checked ) && empty( $puddele_excerpt_checked ) ) {
			
			$checked_default = "checked='checked'"; 
		} else {
		
			$checked_default = "";
		} 
		
        $puddle_html = '<h4>%1$s</h4><p><label for="%2$s">%3$s<input class="widefat" id="%4$s" name="%5$s" type="text" value="%6$s" /></label></p>';		
		
		printf( $puddle_html,
				'Post ID',
				esc_attr( $this->get_field_id('id') ),
				__( 'comma separated IDs[Randum Displayed]', 'puddle' ),
				esc_attr( $this->get_field_id('id') ),
				esc_attr( $this->get_field_name('id') ),
				esc_html( $id )
			);		

		$puddle_html = '<h4>%1$s</h4><p><label style="display:inline-block;"><input type="radio" id="%2$s" name="%3$s" value="%7$s" %4$s style="display:inline-block;" %5$s />%6$s</label>';
		
		printf( $puddle_html,
				'Post Type',
				esc_attr( $this->get_field_id('type') ),
				esc_attr( $this->get_field_name('type') ),
				checked($type, "post", false ),
				$checked_default,
				__( 'Post:', 'puddle' ),
				'post'
			);

			
		$puddle_html = 	'<label style="display:inline-block;"><input type="radio" id="%1$s" name="%2$s" value="%5$s" %3$s style="display:inline-block;" />%4$s</label></p>';
		
		printf( $puddle_html,
				esc_attr( $this->get_field_id('type') ),
				esc_attr( $this->get_field_name('type') ),
				checked($type, "page" ,false ),
				__( 'Page:', 'puddle' ),
				'page'
			);


	
		$puddle_html = '<h4>%1$s</h4><p><label style="display:inline-block;"><input type="radio" id="%2$s" name="%3$s" value="%7$s" %4$s style="display:inline-block;" %5$s />%6$s</label>';
		
		printf( $puddle_html,
				'Content Type',
				esc_attr( $this->get_field_id('content') ),
				esc_attr( $this->get_field_name('content') ),
				checked($content, "content", false ),
				$checked_default,
				__( 'Content:', 'puddle' ),
				'content'
				
			);
			
		$puddle_html = 	'<label style="display:inline-block;"><input type="radio" id="%1$s" name="%2$s" value="%5$s" %3$s style="display:inline-block;" />%4$s</label>';
		
		printf( $puddle_html,
				esc_attr( $this->get_field_id('content') ),
				esc_attr( $this->get_field_name('content') ),
				checked($content, "excerpt" ,false ),
				__( 'Excerpt:', 'puddle' ),
				'excerpt'
			);

		$puddle_html = 	'<label style="display:inline-block;"><input type="radio" id="%1$s" name="%2$s" value="%5$s" %3$s style="display:inline-block;" />%4$s</label></p>';
		
		printf( $puddle_html,
				esc_attr( $this->get_field_id('content') ),
				esc_attr( $this->get_field_name('content') ),
				checked($content, "attachment" ,false ),
				__( 'Attachment IMG:', 'puddle' ),
				'attachment'
			);

	}
}
/** Add Social links homepage top
 *
 *
 *
 *
 */

add_filter( 'raindrops_prepend_doc', 'puddle_header_image_contents' );

function puddle_header_image_contents( ){

	$puddle_social_link = get_option( 'widget_puddle_socialwidget' );

	if( is_array( $puddle_social_link ) ) {
	
		$key			= array_keys( $puddle_social_link );
		$key			= array_shift($key);
	
		if( $puddle_social_link !== false && !empty( $puddle_social_link[ $key ]['urls'] ) ) {
			if( is_home() ){		 
				echo '<div style="text-align:right;margin-bottom:-10px;padding:0 10px">';
				the_widget('puddle_socialWidget', array( 'title'=>'','urls'=> $puddle_social_link[ $key ]['urls'] ) );
				echo '</div>';
			}
		}
	}
}
/** Add Scroll Settings
 *
 *
 *
 *
 */
add_action( 'wp_enqueue_scripts', 'puddle_scripts' );
function puddle_scripts(){

	if( is_home() ) {
	
		global $puddle_current_data_version;

		wp_enqueue_script(	'puddle-mousewheel', 
							get_stylesheet_directory_uri().'/js/jquery.mousewheel.js',
							array('jquery'), $puddle_current_data_version,true );
				
		wp_enqueue_script(	'puddle-perfect-scrollbar', 
							get_stylesheet_directory_uri().'/js/perfect-scrollbar.js',
							array('jquery'), $puddle_current_data_version,true );
	
		wp_enqueue_style(	'puddle-scroll',
							get_stylesheet_directory_uri().'/js/perfect-scrollbar.css',
							array(), $puddle_current_data_version );
	}
/** Include genericons fonts 
 *
 *
 *
 *
 */
	wp_enqueue_style('puddle-icon-font', apply_filters( 'puddle_web_font', get_stylesheet_directory_uri().'/genericons/genericons.css' ) );
/** Include web fonts 
 *
 *
 *
 *
 */
	wp_enqueue_style('enough-web-font', apply_filters( 'enough_web_font', 'http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' ) );
}
/**
 *
 *
 *
 *
 */
add_action( 'wp_head', 'puddle_scroll_script' );
function puddle_scroll_script(){
	if( is_home() ) {
?>
<style type="text/css">
.unit .widget > ul:not(.raindrops-tab-list){
	position:relative;
		height:245px;
	overflow:hidden;
}	
#ft .widget > ul{
	position:relative;
		height:245px;
	overflow:hidden;

}
.unit .page article,
.unit .raindrops-tab-content,
.unit .menu,
.unit .widget_puddle_entrywidget{
	position:relative;
		height:300px;
	overflow:hidden;
}
.unit .page article{
	height:293px;
}

</style>
<script type="text/javascript">
	  jQuery(function() {
	  	jQuery('.widget_puddle_entrywidget').perfectScrollbar('update');
        jQuery('.widget_puddle_entrywidget').perfectScrollbar({
          wheelSpeed:20,
          wheelPropagation:false
        });
	  
	  	jQuery('.widget ul').perfectScrollbar('update');
        jQuery('.widget ul').perfectScrollbar({
          wheelSpeed:20,
          wheelPropagation:false
        });
	  	jQuery('.unit .raindrops-tab-content,.unit .page article').perfectScrollbar('update');
        jQuery('.unit .raindrops-tab-content,.unit .page article').perfectScrollbar({
          wheelSpeed:20,
          wheelPropagation:false
        });

	  });
</script>
<?php
	}
}
/** Post Format Archive links
 *
 *
 *
 *
 */
function puddle_list_post_formats( $exclude = array() ){

	$result					= '';
	$puddle_post_formats	= get_theme_support( 'post-formats');
	$filter_before			= apply_filters( 'raindrops_list_post_formats_before', '' );
	$filter_after			= apply_filters( 'raindrops_list_post_formats_after', '' );
	$html_wrapper			= '%2$s<aside class="puddle-list-post-formats-wrapper"><ul id="puddle-list-post-formats">%1$s</ul><br class="clear" /></aside>%3$s';
	$html					= '	<li class="%3$s"><a href="%1$s" class="%4$s"><span>%2$s</span></a></li>';
	
	$genericon_class		= array( 'standard'=>'genericon genericon-standard color-5', 'aside'=>'genericon genericon-aside color-4', 'image'=>'genericon genericon-image color-3', 'gallery'=>'genericon genericon-gallery color-2', 'video'=>'genericon genericon-video color-1', 'status'=>'genericon genericon-status color1', 'quote'=>'genericon genericon-quote color2', 'link'=> 'genericon genericon-link color3', 'chat'=> 'genericon  genericon-chat color4', 'audio'=>'genericon genericon-audio color5');
			
	foreach( $puddle_post_formats[0] as $format ) {
		if( ! in_array( $format, $exclude ) ) {
			$result .= sprintf( $html, 
					esc_url( get_post_format_link( $format ) ), 
					esc_html( get_post_format_string( $format ) ),
					esc_attr( $format ),
					$genericon_class[ $format ]
				);
		}
	}
	
	return sprintf( $html_wrapper, $result, $filter_before, $filter_after );
}
/** Parent function override
 *
 *
 *
 *
 */
function raindrops_loop_class( $raindrops_loop_number, $raindrops_tile_post_id, $add_class = '' ) {

	if ( is_front_page( ) || is_home( ) ) {

		$id = get_option( 'page_on_front' );
		$template_name		= basename( get_page_template_slug( $id ), '.php' );
	} elseif ( is_page( ) ) {

		global $template;
		$template_name		= basename( $template, '.php' );
	} else {

		$template_name		= '';
	}
	$str_class				= '';
	$raindrops_background	= '';

	if ( is_array( $add_class ) ) {

		foreach ( $add_class as $class ) {

			$str_class		= ' ' . $class;
		}
	} else {

		$str_class			= ' ' . $add_class;
	}
	$post_formats			= get_post_format_slugs( );
	
	foreach ( $post_formats as $key => $val ) {

		if ( has_post_format( $val ) ) {

			$str_class .= ' loop-post-format-' . $val;
		}
	}
	$raindrops_loop_five = $str_class;

		if ( 12 == $raindrops_loop_number ) {

			$raindrops_loop_number	= 0;
		} elseif ( 0 == $raindrops_loop_number % 5 ) {

			$raindrops_loop_five .= ' loop-five';
		}

		$post_thumbnail_id			= get_post_thumbnail_id( $raindrops_tile_post_id );
		$raindrops_background		= wp_get_attachment_image_src( $post_thumbnail_id, 'none' );

		list( $raindrops_background, $width, $height ) = $raindrops_background;

		if ( ! $raindrops_background ) {

			$raindrops_loop_five .= ' loop-item-show-allways';
		} else {
			$raindrops_loop_five .= ' gradient3 hide-text';
			$raindrops_background = ' style="background:url(  ' . $raindrops_background . '  );background-size:cover;"';
		}
	return array( $raindrops_loop_number, $raindrops_loop_five, $raindrops_background );
}
/**
 * widget settings
 *
 * Registered Default Sidebar, Extra Sidebar, Sticky Widget, Footer Widget, Category Blog Widget
 *
 * @since 1.119 Widget label change from Category Blog Widget to Status Sidebar
 *
 */
add_action( 'widgets_init', 'puddle_widgets_init' );

if ( ! function_exists( 'puddle_widgets_init' ) ) {

	function puddle_widgets_init( ) {

		register_sidebar( array( 'name' => esc_html__( 'Approach Row1 Col1', 'puddle' ),
								 'id' => 'approach-1-1',
								 'before_widget' => '<li id="%1$s" class="%2$s widget approach-1-1" >',
								 'after_widget' => '</li>',
								 'before_title' => '<h2 class="widgettitle default h2"><span>',
								 'after_title' => '</span></h2>',
								 'widget_id' => 'approach_1_1',
								 'widget_name' => 'approach_1_1',
								 'text' => "1" ) );
			
		register_sidebar( array( 'name' => esc_html__( 'Approach Row1 Col2', 'puddle' ),
								 'id' => 'approach-1-2',
								 'before_widget' => '<li id="%1$s" class="%2$s widget approach-1-2">',
								 'after_widget' => '</li>',
								 'before_title' => '<h2 class="widgettitle extra h2"><span>',
								 'after_title' => '</span></h2>',
								 'widget_id' => 'approach_1_2',
								 'widget_name' => 'approach_1_2',
								 'text' => "2" ) );
		register_sidebar( array( 'name' => esc_html__( 'Approach Row2 Col1', 'puddle' ),
								 'id' => 'approach-2-1',
								 'before_widget' => '<li id="%1$s" class="%2$s widget approach-2-1">',
								 'after_widget' => '</li>',
								 'before_title' => '<h2 class="widgettitle home-top-content h2"><span>',
								 'after_title' => '</span></h2>',
								 'widget_id' => 'approach_2_1',
								 'widget_name' => 'approach_2-1',
								 'text' => "3" ) );
		register_sidebar( array( 'name' => esc_html__( 'Approach Row2 Col2', 'puddle' ),
								 'id' => 'approach-2-2',
								 'before_widget' => '<li id="%1$s" class="%2$s widget approach-2-2">',
								 'after_widget' => '</li>',
								 'before_title' => '<h2 class="widgettitle footer-widget h2"><span>',
								 'after_title' => '</span></h2>',
								 'widget_id' => 'approach_2_2',
								 'widget_name' => 'approach_2_2',
								 'text' => "4" ) );
		register_sidebar( array( 'name' => esc_html__( 'Approach Row2 Col3', 'puddle' ),
								 'id' => 'approach-2-3',
								 'before_widget' => '<li  id="%1$s" class="%2$s widget approach-2-3">',
								 'after_widget' => '</li>',
								 'before_title' => '<h2 class="widgettitle category-blog-widget h2 status-side-bar">',
								 'after_title' => '</h2>',
								 'widget_id' => 'approach_2_3',
								 'widget_name' => 'approach_2_3',
								 'text' => "5" ) );
	}
}
/**
 *
 *
 *
 *
 */
add_filter( 'raindrops_category_posts','puddle_filter_category_posts' );

function puddle_filter_category_posts( $content ) {

	$check_content_val = strip_tags( $content );

	if( empty( $check_content_val ) ) {
	
		return '<span style="height:300px;display:block;"><img  src="'. get_stylesheet_directory_uri(). '/images/dummy.jpg" /></span>';
	}

	return $content;	
}	
/**
 *
 *
 *
 *
 */
add_action( 'raindrops_after_part_searchform_404.php','puddle_404_pre' );

function puddle_404_pre(){

	echo '<span style="height:300px;display:block;"><img  src="'. get_stylesheet_directory_uri(). '/images/dummy.jpg" /></span>';
}
/**
 *
 *
 *
 *
 */

add_action( 'raindrops_customize_register','puddle_customize_register' );

function puddle_customize_register(){
	global $wp_customize;

	$wp_customize->add_section( 'puddle_settings', array(
		'title'=> __('Puddle Option', 'slides'),
		'priority' => 35,
	) );
	
/* message 1*/	
	$wp_customize->add_setting( 'puddle_message1_title', array(
	 'default' => '',
		) );
 
    $wp_customize->add_control( 'puddle_message1_title', array(
		 'label' => 'Message1 Title',
		 'section'=> 'puddle_settings',
		 'type' => 'text',
    ) );
	
	$wp_customize->add_setting( 'puddle_message1', array(
 'default' => '',
    ) );
	
	$wp_customize->add_control( new puddle_Customize_Textarea_Control( $wp_customize, 'puddle_message1', array(
		'label'   => 'Message1',
		'section' => 'puddle_settings',
		'settings'   => 'puddle_message1',
	) ) );
/* message 2 */	
	
	$wp_customize->add_setting( 'puddle_message2_title', array(
	 'default' => '',
		) );
 
    $wp_customize->add_control( 'puddle_message2_title', array(
		 'label' => 'Message2 Title',
		 'section'=> 'puddle_settings',
		 'type' => 'text',
    ) );
	
	$wp_customize->add_setting( 'puddle_message2', array(
 'default' => '',
    ) );
	$wp_customize->add_control( new puddle_Customize_Textarea_Control( $wp_customize, 'puddle_message2', array(
		'label'   => 'Message2',
		'section' => 'puddle_settings',
		'settings'   => 'puddle_message2',
	) ) );
/* message 3 */

	$wp_customize->add_setting( 'puddle_message3_title', array(
	 'default' => '',
		) );
 
    $wp_customize->add_control( 'puddle_message3_title', array(
		 'label' => 'Message3 Title',
		 'section'=> 'puddle_settings',
		 'type' => 'text',
    ) );
	
	$wp_customize->add_setting( 'puddle_message3', array(
 'default' => '',
    ) );
	$wp_customize->add_control( new puddle_Customize_Textarea_Control( $wp_customize, 'puddle_message3', array(
		'label'   => 'Message3',
		'section' => 'puddle_settings',
		'settings'   => 'puddle_message3',
	) ) );
}

if (class_exists( 'WP_Customize_Control' ) ){

	class puddle_Customize_Textarea_Control extends WP_Customize_Control {
	
    	public $type = 'textarea';
 
   	 	public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
        <?php
    	}
	}
}
/**
 *
 *
 *
 *
 */
function puddle_brightness( $color, $brightness ) {

	$color = str_replace( '#','', $color );
	
	if( strlen( $color ) == 6 ) {
		$r = round( hexdec( substr($color,0,2) ) * $brightness );
		$g = round( hexdec( substr($color,2,2) ) * $brightness );
		$b = round( hexdec( substr($color,4,2) ) * $brightness );
	}else{
		$r = round( hexdec( substr($color,0,1) ) * $brightness );
		$g = round( hexdec( substr($color,1,2) ) * $brightness );
		$b = round( hexdec( substr($color,2,3) ) * $brightness );
	}
	return '#'. dechex( $r ). dechex( $g ). dechex( $b );
}

/** All Design Finish then Remove Commentout.
 *
 *
 *
 *
 */
//define( "RAINDROPS_USE_AUTO_COLOR", false );
?>