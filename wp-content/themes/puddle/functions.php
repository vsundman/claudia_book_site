<?php
/**
 * functions and constants for puddle theme
 *
 *
 * @package puddle
 * @since puddle 0.1
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( get_stylesheet_directory().DIRECTORY_SEPARATOR . 'inc.php' );
/**
 * This theme base font size 16px
 * Need change base font size functions.php
 *
 *
 */
add_filter( 'raindrops_base_font_size', 'puddle_base_font_size' );

function puddle_base_font_size( $content ){
	return 16;
}

/* Setting Example
 *
	$raindrops_fluid_maximum_width = 800;
 */

/**
 * HEADER IMAGE
 *
 *
 *
 */
/* NOTE: This Theme can override header image

	See style.css line 165
	tag archives, category archive, monthly archive shows deffarent images
*/
$raindrops_custom_header_args = array( 
		'default-text-color' => '333333'
		, 'width' => apply_filters( 'raindrops_header_image_width', '950' )
		, 'flex-width' => true
		, 'height' => apply_filters( 'raindrops_header_image_height', '400' )
		, 'flex-height' => true
		, 'header-text' => true
		, 'default-image' => get_stylesheet_directory_uri().'/images/headers/wp3.jpg'
		, 'wp-head-callback' => apply_filters( 'raindrops_wp-head-callback', 'raindrops_embed_meta' )
		, 'admin-preview-callback' => 'raindrops_admin_header_image'
		, 'admin-head-callback' => 'raindrops_admin_header_style'
	);
	
add_theme_support( 'custom-header', $raindrops_custom_header_args );
/**
 * BACKGROUND
 *
 *
 *
 */
$raindrops_custom_background_args = array( 'default-color' => 'fefefe'
		, 'default-image' => get_stylesheet_directory_uri().'/images/puddle-bg.png'
		, 'wp-head-callback' =>'raindrops_embed_meta'
	);

add_theme_support( 'custom-background', $raindrops_custom_background_args );
/**
 *  Raindrops Status bar
 * 
 *  This child theme can not use status bar.
 * 
 */
$raindrops_status_bar = false;
/**
 * Dynamic STYLE 
 * This style setting uses when Color Type Select puddle
 *
 *
 */
$puddle_restore_check = get_theme_mod( 'header_image', get_theme_support( 'custom-header', 'default-image' ) );

if ( $puddle_restore_check !== 'remove-header' ) {

	$puddle_header_background_color	= 'background:-webkit-linear-gradient(bottom, #000, #000) no-repeat 0 200px;';
	$puddle_bd						= '#bd{border:1px solid #bbb;background:#efefef;}';
	$puddle_nav_menu_color			= '	.menu > ul > li > a{color:#fff;}';
}else{

	$puddle_header_background_color	= '';
	$puddle_bd						= '';
	$puddle_nav_menu_color			= '';
}

$puddle_restore_check =	get_background_image();

if ( ! empty( $puddle_restore_check ) and basename( $puddle_restore_check ) !== 'puddle-bg.png' ) {

	$puddle_header_style = '.hfeed{background:inherit;}';
	
	$puddle_header_style .= '#menu-responsive{background:#fff;}';
	$puddle_header_style .= '#ft address a,#access .menu >li >a{color:#fff}';
	$puddle_header_style .= '#ft,#top{margin:0;padding:0;
	background:inherit;
	color:#fff;
	position:relative;
	z-index:1;
	border:1px solid rgba(222,222,222,.6);}';

	$puddle_header_style .= "\n\n". "#ft:before,#top:before{content: '';
	position:absolute;
	top: 0;
	left:0;
	right:0;
	bottom:0;
	background: inherit;
	filter: blur(5px);
	-webkit-filter: blur(6px);
	-moz-filter: blur(6px);
	-o-filter: blur(6px);
	-ms-filter: blur(6px);
	z-index:-1;
	filter: url(#blur);filter:progid:DXImageTransform.Microsoft.Blur(PixelRadius='6');}";
	
	$puddle_header_style .= "\n\n". ".safari #ft,.safari #top, .gecko #ft,.gecko #top{content: '';background:rgba(000,000,000,.2) }";
    	
	
	
} else {
	$puddle_header_style = '';
}

$puddle_background_color	= get_theme_mod( 'background_color' );
$puddle_shadow_color		= puddle_brightness( $puddle_background_color,0.6 );
$puddle_img_dir_url 		= get_stylesheet_directory_uri().'/images/';

	$puddle_style =<<<DOC
	
	$puddle_header_style
	
	$puddle_bd
	
/* home */
	.home #ft,
	.home #yui-main{
		/*background:#eee;
		box-shadow: 0 3px 3px $puddle_shadow_color;
		border:1px solid #bbb;*/
	}
	.home #container{

	}
	.approach{
		background:#fff;
		padding:10px;
		border:1px solid #bbb;
		min-height:100%;
		box-shadow: 0 3px 3px {$puddle_shadow_color};
		border-image: url("{$puddle_img_dir_url}cutter-face.png") 15 round;
		border-style:solid; border-width:10px;
		border:1px solid #bbb;
	}
	.approach .title a,
	.approach .title,	
	.widgettitle{
		color:#993300;
		box-shadow: 0 3px 3px rgba(222,222,222,.3);
		margin:.5em -10px;
		text-indent:20px;
		white-space: nowrap;
		overflow: hidden;
		-o-text-overflow: ellipsis;
		text-overflow: ellipsis;
	}
	ul.approach .widgettitle{
		display:block;
		width:100%;
		margin:.5em -20px .5em -10px;
		text-indent:20px;
	}
	.coal{
		background:#000;
		color:#fff;
	}
	.coal .widget li{
		background: -webkit-linear-gradient(bottom, #eee, #ccc); /* Chrome10+, #post-21 Safari5.1+ */
		background: -moz-linear-gradient(bottom, #eee, #ccc); /* FF3.6+ */
		background: -ms-linear-gradient(bottom, #eee,#ccc); /* IE10+ */
		background: -o-linear-gradient(bottom,#eee, #ccc); /* Opera 11.10+ */
		background: linear-gradient(  totop, #eee, #ccc); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#eee', endColorstr='#ccc', GradientType=0); /* IE6-9 */
	}
	.coal .widget li a{
		color:#000;
	}
	.coal .title a,
	.coal .title,	
	.coal .widgettitle{
		color:#fff;
		width:100%;
	}
	.stand-out{
		background:#191970;
		color:#fff;
	}
	.stand-out .widget li{
		background:-webkit-linear-gradient(bottom, #191970, #000080);
		background: -webkit-linear-gradient(bottom, #191970, #000080); /* Chrome10+, #post-21 Safari5.1+ */
		background: -moz-linear-gradient(bottom, #191970, #000080); /* FF3.6+ */
		background: -ms-linear-gradient(bottom, #191970,#000080); /* IE10+ */
		background: -o-linear-gradient(bottom,#191970, #000080); /* Opera 11.10+ */
		background: linear-gradient(  totop, #191970, #000080); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#191970', endColorstr='#000080', GradientType=0); /* IE6-9 */
	}
	.stand-out .widget li a{
		color:#fff;
		font-weight:bold;	
	}
	.stand-out .title a,
	.stand-out .title,	
	.stand-out .widgettitle{
		color:#fff;
		width:100%;
		font-weight:bold;
		background:#DC143C;
		white-space: nowrap;
		overflow: hidden;
		-o-text-overflow: ellipsis;
		text-overflow: ellipsis;
		margin: -10px -20px .5em -10px!important;
		padding:10px;
		text-indent:.2em;
	}
	.gray{
		background:gray;
		color:#fff;
	}
	.gray .widget li{
		background: -webkit-linear-gradient(bottom, #eee, #ccc); /* Chrome10+, #post-21 Safari5.1+ */
		background: -moz-linear-gradient(bottom, #eee, #ccc); /* FF3.6+ */
		background: -ms-linear-gradient(bottom, #eee,#ccc); /* IE10+ */
		background: -o-linear-gradient(bottom,#eee, #ccc); /* Opera 11.10+ */
		background: linear-gradient(  totop, #eee, #ccc); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#eee', endColorstr='#ccc', GradientType=0); /* IE6-9 */
		color:#000;
	}
	.gray .widget li a{
		color:#000;
	}
	.gray .title a,
	.gray .title,	
	.gray .widgettitle{
		color:#fff;
		width:100%;
	}
	.raindrops-tab-list li{
		background: -webkit-linear-gradient(bottom, #ccc, #eee); /* Chrome10+, #post-21 Safari5.1+ */
		background: -moz-linear-gradient(bottom, #ccc, #eee); /* FF3.6+ */
		background: -ms-linear-gradient(bottom, #eee,#ccc); /* IE10+ */
		background: -o-linear-gradient(bottom,#ccc, #eee); /* Opera 11.10+ */
		background: linear-gradient(  totop, #ccc, #eee); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ccc', endColorstr='#eee', GradientType=0); /* IE6-9 */
	}
	.raindrops-tab-list li a{
		color:#000;
	}
	.raindrops-tab-content{
		min-height:280px;
		background: -webkit-linear-gradient(bottom, #aaa, #ccc); /* Chrome10+, #post-21 Safari5.1+ */
		background: -moz-linear-gradient(bottom, #aaa, #ccc); /* FF3.6+ */
		background: -ms-linear-gradient(bottom, #aaa, #ccc); /* IE10+ */
		background: -o-linear-gradient(bottom,#aaa, #ccc); /* Opera 11.10+ */
		background: linear-gradient(  totop, #aaa, #ccc); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#aaa', endColorstr='#ccc', GradientType=0); /* IE6-9 */
	}
	.home-tab-list{
		box-shadow: 0 5px 3px -2px {$puddle_shadow_color};
		height: 323px;
		overflow:hidden;
		border-bottom:1px solid rgba(222,222,222,.6);
	}
@media screen and (max-width : 780px){
	.raindrops-tab-list li{
		display:block;
		width:100%;
	}
	.raindrops-tab-content{

	}
}
	.unit #recentcomments{
		margin:0;
	}
	.unit #recentcomments li{
		background:inherit;
		color:#fff;
	}
	.unit .widget_calendar caption,
	.unit #calendar_wrap{
		padding:10px;
		background:gray;
		color:#fff;
	}
	.unit #calendar_wrap{
		min-height:320px;
	}
	.unit #wp-calendar caption{
		margin:0 0 10px 0;
		text-align:left;
		font-family: 'Open Sans Condensed', sans-serif;
	}
	.unit .wp-calendar{
	
	}
	.unit .widget_calendar{
	}
	.unit .widget_calendar tbody,
	.unit .widget_calendar thead{
		background:-webkit-linear-gradient(bottom, gray, black);
		background: -webkit-linear-gradient(bottom, gray, black); /* Chrome10+, #post-21 Safari5.1+ */
		background: -moz-linear-gradient(bottom, gray, black); /* FF3.6+ */
		background: -ms-linear-gradient(bottom, gray, black); /* IE10+ */
		background: -o-linear-gradient(bottom,gray, black); /* Opera 11.10+ */
		background: linear-gradient(  totop, gray, black); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='gray', endColorstr='black', GradientType=0); /* IE6-9 */
		font-family: 'Open Sans Condensed', sans-serif;
	}
	.unit .widget_calendar tbody{
		background: -webkit-linear-gradient(bottom, #eee, #ccc); /* Chrome10+, #post-21 Safari5.1+ */
		background: -moz-linear-gradient(bottom, #eee, #ccc); /* FF3.6+ */
		background: -ms-linear-gradient(bottom, #eee,#ccc); /* IE10+ */
		background: -o-linear-gradient(bottom,#eee, #ccc); /* Opera 11.10+ */
		background: linear-gradient(  totop, #eee, #ccc); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#eee', endColorstr='#ccc', GradientType=0); /* IE6-9 */
		color:#000;
	}
	.unit .widget_calendar tbody td{
		height:2em;
	}
	.approach .widget li{
		line-height:2;
		border-bottom:1px solid rgba(222,222,222,.6);
		margin-left:0;
		padding-left:0;
		text-indent:1em;
		white-space: nowrap;
		overflow: hidden;
		-o-text-overflow: ellipsis;
		text-overflow: ellipsis;
	}
	.approach .widget li a{
		
	}
	.home .unit{/* add*/
		height: 325px;
	}
	.line{/* add*/
		margin-bottom:10px;
	}

	.approach-content{
		min-height:275px;
	}
	.home .edit-link{
		background:#fff;
		border:1px solid #bbb;
		border-radius:50%;
		padding:10px;
		background: -webkit-linear-gradient(bottom, #eeeeee, #efefef); /* Chrome10+, #post-21 Safari5.1+ */
		background: -moz-linear-gradient(bottom, #eeeeee, #efefef); /* FF3.6+ */
		background: -ms-linear-gradient(bottom, #eeeeee, #efefef); /* IE10+ */
		background: -o-linear-gradient(bottom,#eeeeee, #efefef); /* Opera 11.10+ */
		background: linear-gradient(  totop, #eeeeee, #efefef); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#eeeeee', endColorstr='#efefef', GradientType=0); /* IE6-9 */

	}
@media screen and (max-width : 640px){
	.home .edit-link{
		border:none;
	}
	.home #doc3 .entry-meta a{
		display:inline-block;
		width:auto;
	}
}

/* not home */
	body:not(.home) #ft,
	body:not(.home) #bd{
		box-shadow: 0 3px 3px {$puddle_shadow_color};
		border:1px solid #bbb;
	}
	.widget select,
	body:not(.home) #bd{
		background:#eee;
	}
	body:not(.home) #ft{
		border-top:none;
	}
	body:not(.home) #container{
		border-right:1px solid #bbb;
	}
	.widget select option:nth-child(odd){
		background:#efefef!important;
	}
	.widget select,	
	body:not(.home) .widgettitle{
		border-bottom:1px solid #bbb;
	}
	#wp-calendar caption{
		text-align:center;
		margin-bottom:1em;
		font-weight:bold;
		font-size:123.1%;
	}
	#wp-calendar tbody td{
		text-align:center;
		border:1px solid #fff;
	}
	#wp-calendar tbody td:hover{
		background:#fff;
	}
	
	#wp-calendar #prev{
		text-align:left;
	}
	#wp-calendar #prev,
	#wp-calendar #next{
		font-size:small;
	}
	.home .portfolio.column-4 ul.index > li{
		width:23%;
		margin:1.22222%;
	}
	.home .portfolio.column-3 ul.index > li{
		width:32%;
		margin:1%;
	}
	.home .portfolio.column-2 ul.index > li{
		width:49%;
		margin:1%;
	}
	.home .portfolio ul.index > li:first-child{
		margin-left:0;
	}
	.home .portfolio ul.index > li:last-child{
		margin-right:0;
	}
	.portfolio li{
		box-shadow: 0 3px 3px {$puddle_shadow_color};
	}
	.line{

	}
	.unit{
	
	}
	.approach .title a{
		border:none;
	}
	.archive article,
	.single article{
		margin:0 10px;
	}
	.hide-text article{
		visibility:hidden;
	}
	.archive #bd .hide-text:hover{
		background:none!important;
	}
	.hide-text:hover article{
		visibility:visible;
	}
	.poster-row-2,
	.poster-row-1{
		height:340px;
		overflow:hidden;
		}
	.portfolio li,
	.line .raindrops-inner-box,
	.line .raindrops-inner-box{
		margin:1px;
		height:100%;
		padding:10px!important;
	}
	.lsidebar,
	body:not(.home) #yui-main,
	.line .raindrops-inner-box,
	.line .raindrops-inner-box{
		background:#eee;
	}
	.portfolio li:hover a{
		background:none;
	}
	.lsidebar{
		margin-left:0;
	}
	.portfolio li{
		border:1px solid #fff;
	}
	body:not(.home) #container{
		background:#fff;
	}
	#raindrops_year_list td:nth-child(1),
	#date_list td:nth-child(1),
	#month_list td:nth-child(1){
		text-align:center;
	}
	#raindrops_year_list .month-name,
	#date_list .time,
	#month_list td:nth-child(odd){
		%c_5%
	}
	#raindrops_year_list td:nth-child(2),
	#date_list td:nth-child(2),
	#month_list td:nth-child(2){
		text-align:left;
	}
	#month_list tr{
		border-bottom:1px solid #bbb;
	}
	#raindrops_year_list tr:nth-child( even ),
	#date_list tr:nth-child(odd){
		color:#333;
		background:rgba(222,222,222,.6);
	}
	#raindrops_year_list tr:nth-child( odd ),
	#date_list tr:nth-child(even){
		color:#333;
		background:rgba(222,222,222,.4);
	}

	.portfolio .index li{
		border:1px solid #bbb!important;
		background:#fff;
		border-bottom:1px solid rgba(222,222,222,.6);
	}
	.portfolio-nav li{
		background:none;
		border:none;
	}
	.portfolio-nav li:hover a{
		color:#000;
	}
	.portfolio-nav li a{
		background:#000;
		color:#fff;
		padding:10px;
		border-radius:5%;
		border:1px solid #bbb;
		box-shadow: 0 3px 3px {$puddle_shadow_color};
	}
	#portfolio .portfolio-nav li a:hover{
		text-decoration:none!important;
		color:#000;
	}
	#portfolio .portfolio-nav li a:active{
		text-decoration:none!important;
		text-shadow:2px 2px 3px #ccc;
	}
	.portfolio-nav > ul{
		margin:2px;
	}
	.portfolio-nav > ul > li{
		margin:0;
		width:31%;
		border:none;
		box-shadow:none;
	}
	.line .raindrops-inner-box h2{
		margin-top:0;
	}
	#nav-below,
	div.entry-content,
	article.entry-content{
		margin-right:10px;
		margin-left:10px;
	}
	#container{
		margin-bottom:0;
	}
	header{
		$puddle_header_background_color
	}
		$puddle_nav_menu_color
	
@media screen and (max-width : 640px){
	header{
		background:none;
	}
	.poster-row-1{
		height:auto;
		overflow:visible;
	}
	.menu > ul > li > a{color:#000;}

}
	.after-nav-menu{
		margin: 10px 8px -30px;
	}
	.approach-2-3 .approach,
	.approach-2-2 .approach,
	.approach-1-2 .approach{
		margin-left:16px!important;
	}		
	.unit article{
		height:100%;
		position:relative;
	}
	.raindrops-more-wrapper{
		text-align:right;
		display:block;
		width:100%;
		position:absolute;
		bottom:0;
		right:0;
		background:rgba(250,250,250,1);
		padding:.5em;
	}
	#searchform input[type="text"]{
		padding:3px;
		width:60%;
		display:inline-block;
	}
	#commentform textarea,
	#commentform input,
	#searchform input{
		border:1px solid #ccc;
	}
	#searchform{
		padding:3px;	
	}
	#commentform input[type="submit"],
	#searchform input[type="submit"]{
		color:#fff;
		background:#000;
	}
	#commentform .form-allowed-tags,
	#commentform .comment-notes{
		font-size:small;
		color:#777;
	}
	.entry-content .page-featured-image{
		display:block;
		margin:0 0 32px!important;
	}
	.list-of-post-toggle{
		margin:1em 0 0 4em;
	}
	.yui-t6 #container > .first,
	.yui-t5 #container > .first,
	.yui-t4 #container > .first {
		margin:0;
	}
	.single #container .first{
		padding-top:10px;
	}
	.lsidebar, rsidebar{
		font-size:87.5%;
	}
	#ft{
		/*background:#fff;*/
	}
	.month-name{
		line-height:2.5;
	}
	#month_list tbody{
		border-top:1px solid #bbb;	
	}
	#raindrops_year_list .month-name a{
		vertical-align:middle;
		display:inline;
	}
	#raindrops_year_list .month-excerpt a{
		margin-left:10px;
	}
	.page > article{
		margin-left:10px;
	}
	.entry-content .gallery{
		background:#000;
		color:#fff;
	}
	.approach-image,
	.gallery img{
	  -webkit-transition: all 1s ease;
		 -moz-transition: all 1s ease;
		   -o-transition: all 1s ease;
		  -ms-transition: all 1s ease;
			  transition: all 1s ease;
	}

	.approach-image:hover,
	.gallery img:hover {
  		-webkit-filter: brightness(110%);
	}
/* below line don't add space, tab,anything */
DOC;

?>