<?php

add_action( 'cmb2_admin_init', 'progression_studios_page_meta_box' );
function progression_studios_page_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page_settings',
		'title'         => esc_html__('Page Settings', 'poker-dice-progression'),
		'object_types'  => array( 'page' ), // Post type,
	) );
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Sub-title', 'poker-dice-progression'),
		'id'         => $prefix . 'sub_title',
		'type'       => 'text',
	) );

	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Sidebar Display', 'poker-dice-progression'),
		'id'         => $prefix . 'page_sidebar',
		'type'       => 'select',
		'options'     => array(
			'hidden-sidebar'   => esc_html__( 'Hide Sidebar', 'poker-dice-progression' ),
			'right-sidebar'    => esc_html__( 'Right Sidebar', 'poker-dice-progression' ),
			'left-sidebar'    => esc_html__( 'Left Sidebar', 'poker-dice-progression' ),
		),
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Page Title Background Image', 'poker-dice-progression'),
		'id'         => $prefix . 'header_image',
		'type'         => 'file',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Page Title', 'poker-dice-progression'),
		'id'         => $prefix . 'disable_page_title',
		'type'       => 'checkbox',
	) );
	
}



add_action( 'cmb2_admin_init', 'progression_studios_page_header_meta_box' );
function progression_studios_page_header_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page_header',
		'title'         => esc_html__('Header Settings', 'poker-dice-progression'),
		'object_types'  => array( 'page' ), // Post type,
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Navigation Text Color', 'poker-dice-progression'),
		'id'         => $prefix . 'custom_page_nav_color',
		'type'       => 'select',
		'options'     => array(
			'progression_studios_default_navigation_color'    => esc_html__( 'Default Color', 'poker-dice-progression' ),
			'progression_studios_force_dark_navigation_color'    => esc_html__( 'Force Text Black', 'poker-dice-progression' ),
			'progression_studios_force_light_navigation_color'   => esc_html__( 'Force Text White', 'poker-dice-progression' ), 
		),
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Force Transparent Header', 'poker-dice-progression'),
		'id'         => $prefix . 'header_transparent_float',
		'type'       => 'checkbox',
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Custom logo for page', 'poker-dice-progression'),
		'desc' => esc_html__('Must be same size as the main logo.', 'poker-dice-progression'),
		'id'         => $prefix . 'custom_page_logo',
		'type'         => 'file',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Header', 'poker-dice-progression'),
		'id'         => $prefix . 'header_disabled',
		'type'       => 'checkbox',
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Footer', 'poker-dice-progression'),
		'id'         => $prefix . 'disable_footer_per_page',
		'type'       => 'checkbox',
	) );


	
}



add_action( 'cmb2_admin_init', 'progression_studios_index_post_meta_box' );
function progression_studios_index_post_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_post',
		'title'         => esc_html__('Post Settings', 'poker-dice-progression'),
		'object_types'  => array( 'post' ), // Post type
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Image Gallery', 'poker-dice-progression'),
		'desc' => esc_html__('Add-in images to display a gallery.', 'poker-dice-progression'),
		'id'         => $prefix . 'gallery',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Video/Audio', 'poker-dice-progression'),
		'desc'       => esc_html__('Paste in your video url or embed code', 'poker-dice-progression'),
		'id'         => $prefix . 'video_post',
		'type'       => 'textarea_code',
		'options' => array( 'disable_codemirror' => true )
	) );

	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Featured Image Link', 'poker-dice-progression'),
		'id'         => $prefix . 'blog_featured_image_link',
		'type'       => 'select',
		'options'     => array(
			'progression_link_default'   => esc_html__( 'Default link to post', 'poker-dice-progression' ), // {#} gets replaced by row number
			'progression_link_lightbox'    => esc_html__( 'Link to image in lightbox pop-up', 'poker-dice-progression' ),
			'progression_link_url'    => esc_html__( 'Link to URL', 'poker-dice-progression' ),
			'progression_link_url_new_window'    => esc_html__( 'Link to URL (New Window)', 'poker-dice-progression' ),
			'progression_lightbox_video'    => esc_html__( 'Link to video (Youtube/Vimeo/.MP4)', 'poker-dice-progression' ),
		),

	) );
	
	
	

	$progression_studios_cmb_demo->add_field( array(
		'name' => esc_html__('Optional Link', 'poker-dice-progression'),
		'desc' => esc_html__('Make your post link to another page or video pop-up.', 'poker-dice-progression'),
		'id'         => $prefix . 'external_link',
		'type'       => 'text',
	) );
	


	$progression_studios_cmb_demo->add_field( array(
		'name'       => esc_html__('Disable Sidebar on Post', 'poker-dice-progression'),
		'id'         => $prefix . 'group_552033a9a46bc',
		'type'       => 'checkbox',
	) );
	
	
	
	
}








