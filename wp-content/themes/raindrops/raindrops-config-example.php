<?php

/** Raindrops Cofig file
 *
 *
 * Please Rename from raindrops-config-example.php
 * 				 to   raindrops-config.php
 *
 */
/** Theme Option Page
 *
 *
 * true Shows Theme option page
 * false Hide Theme option page
 * default true
 */
$raindrops_show_theme_option = true;

/** Shows Place holder for insert contents
 *
 * When WP_DEBUG value true and $raindrops_actions_hook_message value true
 * Show Raindrops action filter position and examples
 *
 * default false
 * @since 0.980
 */
$raindrops_actions_hook_message = false;

/** Browser Detection Server Side or Cliant Side
 *
 * use server side browser detection or javascript browser ditection
 *
 * javascript browser ditection is At a target [ operate / even when cash plug-in is used / properly ]
 * value bool
 * default false ( cliant side javascript )
 * ver 1.121
 */
$raindrops_browser_detection = false;

/** Custom Page width for Fixed Width
 * Original page width implementation by manual labor
 *
 * If you need original page width
 * you can specific pixel page width
 * e.g. '$raindrops_page_width = '776';' is  776px page width.
 *
 * default ''
 */
$raindrops_page_width = '';

/** Custom Page width for fluid ( responsive )
 *
 * fluid page  main column maximum width px
 *
 *
 *
 * $raindrops_fluid_maximum_width
 * default 1280
 *
 */
$raindrops_fluid_maximum_width = '1280';

/** UPLOAD IMAGE
 *
 *
 *
 *
 */
$raindrops_allow_file_type = array( 'image/png', 'image/jpeg', 'image/jpg', 'image/gif' );

//max upload size byte
$raindrops_max_upload_size = 2000000;

//header or footer image max width px
$raindrops_max_width = 1300;

/**
 * Show Raindrops status bar at browser bottom
 *
 * shows true hide false
 * @since 1.211
 */
$raindrops_status_bar = true;
/**
 * Featured image size
 *
 * full size or single-post-thumbnail 600x200 size
 * since 1.215
 */
 $raindrops_featured_image_full_size = true;
/**
 * Custom fields name css is add to post style rules.
 *
 * When false add to style single post and pages
 * When true add to style all list style posts and pages
 * RAINDROPS_OVERRIDE_POST_STYLE_ALL_CONTENTS
 * @since 0.992
 */
define( "RAINDROPS_OVERRIDE_POST_STYLE_ALL_CONTENTS", true );

/** Show Post Delete link
 *
 *
 *
 * RAINDROPS_SHOW_DELETE_POST_LINK
 *
 */
define( "RAINDROPS_SHOW_DELETE_POST_LINK", false );

/** Excerpt Settings
 *
 * the_content(   ) or the_excerpt
 *
 * the_excerpt use where index,archive,other not single pages.
 * If RAINDROPS_USE_LIST_EXCERPT value false and use the_content .
 *
 * RAINDROPS_USE_LIST_EXCERPT
 * add ver 1.127
 * When use excerpt please set $raindrops_where_excerpts
 */
define( "RAINDROPS_USE_LIST_EXCERPT", false );

// values 'is_search', 'is_archive', 'is_category' ,'is_tax', 'is_tag' any conditional function name

$raindrops_where_excerpts = array( 'is_search' );

/** Color Setting Show or Hide at Theme Option Page
 * Auto Color On or Off
 * If you want no Auto Color when set value false.
 *
 *
 * RAINDROPS_USE_AUTO_COLOR
 *
 */
define( "RAINDROPS_USE_AUTO_COLOR", true );

/** Featured Image Size
 * single-post-thumbnail
 *
 *
 * RAINDROPS_SINGLE_POST_THUMBNAIL_WIDTH
 * RAINDROPS_SINGLE_POST_THUMBNAIL_HEIGHT
 *
 */
define( 'RAINDROPS_SINGLE_POST_THUMBNAIL_WIDTH', 600 );

define( 'RAINDROPS_SINGLE_POST_THUMBNAIL_HEIGHT', 200 );

/** Add Light Box for Featured Image Size
 *
 *
 * RAINDROPS_USE_FEATURED_IMAGE_LIGHT_BOX
 * @since 1.002
 */
define( 'RAINDROPS_USE_FEATURED_IMAGE_LIGHT_BOX', false );

/** Add CSS from Custom field
 *
 *
 * field name: css
 * default: true
 * @since 1.201
 */
define( 'RAINDROPS_CUSTOM_FIELD_CSS', true );

/** Add javascript element from Custom field
 *
 *
 * field name: javascript
 * default: true
 * @since 1.201
 */
define( 'RAINDROPS_CUSTOM_FIELD_META', true );

/** Add meta element from Custom field
 *
 *
 * field name: meta
 * default: false
 * possible elements <base><link><meta>
 * @since 1.201
 */
define( 'RAINDROPS_CUSTOM_FIELD_SCRIPT', false );
/**
 * Enabling accessibility links when Setting value no at Raindrops options page Accessibility Settings
 *
 *
 * @since1.217
 */
if ( ! isset( $raindrops_accessibility_link ) ) {

    $raindrops_accessibility_link = true;
}
/**
 * Base Font Size
 * Test
 *
 */
if ( ! isset( $raindrops_base_font_size ) ) {

    $raindrops_base_font_size = 13;
}
/**
 *
 * Add <wbr> element for entry title.
 *
 * uses true no use false
 * @since 1.228
 */
if ( ! isset( $raindrops_use_wbr_for_title ) ) {

    $raindrops_use_wbr_for_title = false;
}
/**
 *
 * Add enable keyboard focus
 *
 * uses true no use false
 * @since 1.229
 */
if ( ! isset( $raindrops_enable_keyboard ) ) {

    $raindrops_enable_keyboard = true;
}
/**
 *
 * Use or Not Raindrops recommend plugin installer
 *
 * uses true no use false
 * @since 1.229
 */
if( ! isset( $raindrops_recommend_plugins )){
	
	$raindrops_recommend_plugins = true;
}
/**
 * xhtml media type
 * value 'application/xhtml+xml' or 'text/html'
 */
if ( ! isset( $raindrops_xhtml_media_type ) ) {
	
	$raindrops_xhtml_media_type = 'text/html';
}
/**
 * Raindrops Gallery Presentation
 * value false shows WordPress Standard Gallery Style.
 * @since 1.269
 */
if( ! isset( $raindrops_extend_galleries ) ) {
	
	$raindrops_extend_galleries = true;
}