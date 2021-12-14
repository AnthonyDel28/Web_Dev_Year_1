<?php
/**
 * Progression Theme Customizer
 *
 * @package pro
 */

get_template_part('inc/customizer/new', 'controls');
get_template_part('inc/customizer/typography', 'controls');


/* Remove Default Theme Customizer Panels that aren't useful */
function progression_studios_change_default_customizer_panels ( $wp_customize ) {
	$wp_customize->remove_section("themes"); //Remove Active Theme + Theme Changer
   $wp_customize->remove_section("static_front_page"); // Remove Front Page Section		
}
add_action( "customize_register", "progression_studios_change_default_customizer_panels" );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function progression_studios_customize_preview_js() {
	wp_enqueue_script( 'progression_studios_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'progression_studios_customize_preview_js' );


function progression_studios_customizer( $wp_customize ) {
	
	
	/* Panel - General */
	$wp_customize->add_panel( 'progression_studios_general_panel', array(
		'priority'    => 3,
		'title'       => esc_html__( 'General', 'poker-dice-progression' ),
		 ) 
 	);
	
	
	/* Section - General - General Layout */
	$wp_customize->add_section( 'progression_studios_section_general_layout', array(
		'title'          => esc_html__( 'General Options', 'poker-dice-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 10,
		) 
	);
	
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_site_boxed' ,array(
		'default' => 'full-width-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_site_boxed', array(
		'label'    => esc_html__( 'Site Layout', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 10,
		'choices'     => array(
			'full-width-pro' => esc_html__( 'Full Width', 'poker-dice-progression' ),
			'boxed-pro' => esc_html__( 'Boxed', 'poker-dice-progression' ),
		),
		))
	);
	
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting('progression_studios_site_width',array(
		'default' => '1200',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_site_width', array(
		'label'    => esc_html__( 'Site Width(px)', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 961,
			'max'  => 4500,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_select_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_select_color', array(
		'label'    => esc_html__( 'Mouse Selection Color', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_general_layout',
		'priority'   => 20,
		)) 
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_select_bg', array(
		'default'	=> '#fcb501',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_select_bg', array(
		'default'	=> '#fcb501',
		'label'    => esc_html__( 'Mouse Selection Background', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_general_layout',
		'priority'   => 25,
		)) 
	);
	

	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_lightbox_caption' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_caption', array(
		'label'    => esc_html__( 'Lightbox Captions', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 100,
		'choices'     => array(
			'on' => esc_html__( 'On', 'poker-dice-progression' ),
			'off' => esc_html__( 'Off', 'poker-dice-progression' ),
		),
		))
	);
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_lightbox_play' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_play', array(
		'label'    => esc_html__( 'Lightbox Gallery Play/Pause', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 110,
		'choices'     => array(
			'on' => esc_html__( 'On', 'poker-dice-progression' ),
			'off' => esc_html__( 'Off', 'poker-dice-progression' ),
		),
		))
	);
	
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_lightbox_count' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_count', array(
		'label'    => esc_html__( 'Lightbox Gallery Count', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 150,
		'choices'     => array(
			'on' => esc_html__( 'On', 'poker-dice-progression' ),
			'off' => esc_html__( 'Off', 'poker-dice-progression' ),
		),
		))
	);
	
	
	
	
	
	
	
	
	/* Section - General - Page Loader */
	$wp_customize->add_section( 'progression_studios_section_page_transition', array(
		'title'          => esc_html__( 'Page Loader', 'poker-dice-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 26,
		) 
	);

	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_transition' ,array(
		'default' => 'transition-off-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_transition', array(
		'label'    => esc_html__( 'Display Page Loader?', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_page_transition',
		'priority'   => 10,
		'choices'     => array(
			'transition-on-pro' => esc_html__( 'On', 'poker-dice-progression' ),
			'transition-off-pro' => esc_html__( 'Off', 'poker-dice-progression' ),
		),
		))
	);
	
	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_transition_loader' ,array(
		'default' => 'circle-loader-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_transition_loader', array(
		'label'    => esc_html__( 'Page Loader Animation', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_page_transition',
		'type' => 'select',
		'priority'   => 15,
		'choices' => array(
			'circle-loader-pro' => esc_html__( 'Circle Loader Animation', 'poker-dice-progression' ),
	        'cube-grid-pro' => esc_html__( 'Cube Grid Animation', 'poker-dice-progression' ),
	        'rotating-plane-pro' => esc_html__( 'Rotating Plane Animation', 'poker-dice-progression' ),
	        'double-bounce-pro' => esc_html__( 'Doube Bounce Animation', 'poker-dice-progression' ),
	        'sk-rectangle-pro' => esc_html__( 'Rectangle Animation', 'poker-dice-progression' ),
			'sk-cube-pro' => esc_html__( 'Wandering Cube Animation', 'poker-dice-progression' ),
			'sk-chasing-dots-pro' => esc_html__( 'Chasing Dots Animation', 'poker-dice-progression' ),
			'sk-circle-child-pro' => esc_html__( 'Circle Animation', 'poker-dice-progression' ),
			'sk-folding-cube' => esc_html__( 'Folding Cube Animation', 'poker-dice-progression' ),
		
		 ),
		)
	);





	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_loader_text', array(
		'default' => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_text', array(
		'label'    => esc_html__( 'Page Loader Color', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_page_transition',
		'priority'   => 30,
	) ) 
	);
	
	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_loader_secondary_color', array(
		'default' => '#ededed',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_secondary_color', array(
		'label'    => esc_html__( 'Page Loader Secondary (Circle Loader)', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_page_transition',
		'priority'   => 31,
	) ) 
	);


	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_loader_bg', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_bg', array(
		'label'    => esc_html__( 'Page Loader Background', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_page_transition',
		'priority'   => 35,
	) ) 
	);
	
	
	
	
	
	
	


	/* Section - Footer - Scroll To Top */
	$wp_customize->add_section( 'progression_studios_section_scroll', array(
		'title'          => esc_html__( 'Scroll To Top Button', 'poker-dice-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 100,
	) );

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_pro_scroll_top', array(
		'default' => 'scroll-on-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_pro_scroll_top', array(
		'label'    => esc_html__( 'Scroll To Top Button', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 10,
		'choices'     => array(
			'scroll-on-pro' => esc_html__( 'On', 'poker-dice-progression' ),
			'scroll-off-pro' => esc_html__( 'Off', 'poker-dice-progression' ),
		),
	) ) );

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		) 
	);
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_scroll_color', array(
		'label'    => esc_html__( 'Color', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 15,
		) ) 
	);


	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_bg_color', array(
		'default' => 'rgba(255,255,255,  0.15)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
		) 
	);
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_scroll_bg_color', array(
		'default' => 'rgba(255,255,255,  0.15)',
		'label'    => esc_html__( 'Background', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 20,
		) ) 
	);



	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_hvr_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_scroll_hvr_color', array(
		'label'    => esc_html__( 'Hover Arrow Color', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 30,
		) ) 
	);
	
	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_hvr_bg_color', array(
		'default' => '#febd00',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_scroll_hvr_bg_color', array(
		'default' => '#febd00',
		'label'    => esc_html__( 'Hover Arrow Background', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 40,
		) ) 
	);



	
	
	
	/* Panel - Header */
	$wp_customize->add_panel( 'progression_studios_header_panel', array(
		'priority'    => 5,
		'title'       => esc_html__( 'Header', 'poker-dice-progression' ),
		) 
	);
	
	
	/* Section - General - Site Logo */
	$wp_customize->add_section( 'progression_studios_section_logo', array(
		'title'          => esc_html__( 'Logo', 'poker-dice-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 10,
		) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_studios_theme_logo' ,array(
		'default' => get_template_directory_uri().'/images/logo.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_theme_logo', array(
		'section' => 'progression_studios_section_logo',
		'priority'   => 10,
		))
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_width',array(
		'default' => '220',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_width', array(
		'label'    => esc_html__( 'Logo Width (px)', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_margin_top',array(
		'default' => '25',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_margin_top', array(
		'label'    => esc_html__( 'Logo Margin Top (px)', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 250,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_margin_bottom',array(
		'default' => '25',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_margin_bottom', array(
		'label'    => esc_html__( 'Logo Margin Bottom (px)', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 25,
		'choices'     => array(
			'min'  => 0,
			'max'  => 250,
			'step' => 1
		), ) ) 
	);
	

	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_studios_logo_position' ,array(
		'default' => 'progression-studios-logo-position-left',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_logo_position', array(
		'label'    => esc_html__( 'Logo Position', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 50,
		'choices'     => array(
			'progression-studios-logo-position-left' => esc_html__( 'Left', 'poker-dice-progression' ),
			'progression-studios-logo-position-center' => esc_html__( 'Center (Block)', 'poker-dice-progression' ),
			'progression-studios-logo-position-right' => esc_html__( 'Right', 'poker-dice-progression' ),
		),
		))
	);
	


	/* Section - Header - Header Options */
	$wp_customize->add_section( 'progression_studios_section_header_bg', array(
		'title'          => esc_html__( 'Header Options', 'poker-dice-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 20,
		) 
	);

	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_width' ,array(
		'default' => 'progression-studios-header-normal-width',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_width', array(
		'label'    => esc_html__( 'Header Layout', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 10,
		'choices'     => array(
			'progression-studios-header-full-width' => esc_html__( 'Wide', 'poker-dice-progression' ),
			'progression-studios-header-full-width-no-gap' => esc_html__( 'No Gap', 'poker-dice-progression' ),
			'progression-studios-header-normal-width' => esc_html__( 'Default', 'poker-dice-progression' ),
		),
		))
	);
	


	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_background_color', array(
		'default' => '#010012',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_header_background_color', array(
		'default' => '#010012',
		'label'    => esc_html__( 'Header Background Color', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_header_bg',
		'priority'   => 15,
		)) 
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_border_bottom_color', array(
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_header_border_bottom_color', array(
		'label'    => esc_html__( 'Header Border Bottom Color', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_header_bg',
		'priority'   => 16,
		)) 
	);
	
	




	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_header_bg_image' ,array(
		'default' => get_template_directory_uri().'/images/header-bg.jpg',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_header_bg_image', array(
		'label'    => esc_html__( 'Header Background Image', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 40,
		))
	);
	
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_bg_image_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_bg_image_image_position', array(
		'label'    => esc_html__( 'Image Cover', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 50,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'poker-dice-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'poker-dice-progression' ),
		),
		))
	);
	
	

	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_section( 'progression_studios_section_mobile_header', array(
		'title'          => esc_html__( 'Tablet/Mobile Header Options', 'poker-dice-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 23,
		) 
	);
	
	

	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_transparent' ,array(
		'default' => 'default',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_header_transparent', array(
		'label'    => esc_html__( 'Tablet/Mobile Header Transparent', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 9,
		'choices'     => array(
			'transparent' => esc_html__( 'Transparent', 'poker-dice-progression' ),
			'default' => esc_html__( 'Default', 'poker-dice-progression' ),
		),
		))
	);
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_mobile_header_bg', array(
		'label'    => esc_html__( 'Tablet/Mobile Background Color', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 10,
		)) 
	);
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_menu_text' ,array(
		'default' => 'off',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_menu_text', array(
		'label'    => esc_html__( 'Display "Menu" text for Menu', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 11,
		'choices'     => array(
			'on' => esc_html__( 'Display', 'poker-dice-progression' ),
			'off' => esc_html__( 'Hide', 'poker-dice-progression' ),
		),
		))
	);
	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_top_bar_left' ,array(
		'default' => 'progression_studios_hide_top_left_bar',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_top_bar_left', array(
		'label'    => esc_html__( 'Tablet/Mobile Header Top Left', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 12,
		'choices'     => array(
			'on-pro' => esc_html__( 'Display', 'poker-dice-progression' ),
			'progression_studios_hide_top_left_bar' => esc_html__( 'Hide', 'poker-dice-progression' ),
		),
		))
	);
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_top_bar_right' ,array(
		'default' => 'progression_studios_hide_top_left_right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_top_bar_right', array(
		'label'    => esc_html__( 'Tablet/Mobile Header Top Right', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 13,
		'choices'     => array(
			'on-pro' => esc_html__( 'Display', 'poker-dice-progression' ),
			'progression_studios_hide_top_left_right' => esc_html__( 'Hide', 'poker-dice-progression' ),
		),
		))
	);

	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_nav_padding' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_nav_padding', array(
		'label'    => esc_html__( 'Tablet/Mobile Nav Padding', 'poker-dice-progression' ),
		'description'    => esc_html__( 'Optional padding above/below the Navigation. Example: 20', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 25,
		)
	);
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_logo_width' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_logo_width', array(
		'label'    => esc_html__( 'Tablet/Mobile Logo Width', 'poker-dice-progression' ),
		'description'    => esc_html__( 'Optional logo width. Example: 180', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 30,
		)
	);
	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_logo_margin' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_logo_margin', array(
		'label'    => esc_html__( 'Tablet/Mobile Logo Margin Top/Bottom', 'poker-dice-progression' ),
		'description'    => esc_html__( 'Optional logo margin. Example: 25', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 35,
		)
	);
	
	
	
	
	
	
	/* Section - Header - Sticky Header */
	$wp_customize->add_section( 'progression_studios_section_sticky_header', array(
		'title'          => esc_html__( 'Sticky Header Options', 'poker-dice-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 25,
		) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_header_sticky' ,array(
		'default' => 'none-sticky-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_sticky', array(
		'section' => 'progression_studios_section_sticky_header',
		'priority'   => 10,
		'choices'     => array(
			'sticky-pro' => esc_html__( 'Sticky Header', 'poker-dice-progression' ),
			'none-sticky-pro' => esc_html__( 'Disable Sticky Header', 'poker-dice-progression' ),
		),
		))
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_header_background_color', array(
		'default' =>  'rgba(9,4,29, 0.9)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sticky_header_background_color', array(
		'default' =>  'rgba(9,4,29, 0.9)',
		'label'    => esc_html__( 'Sticky Header Background', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 15,
		)) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_header_border_color', array(
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sticky_header_border_color', array(
		'label'    => esc_html__( 'Sticky Header Border Color', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 16,
		)) 
	);
	

	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_drop_shadow' ,array(
		'default' => 'off',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_drop_shadow', array(
		'label'    => esc_html__( 'Sticky Header Shadow', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_sticky_header',
		'priority'   => 17,
		'choices'     => array(
			'on' => esc_html__( 'On', 'poker-dice-progression' ),
			'off' => esc_html__( 'Off', 'poker-dice-progression' ),
		),
		))
	);
	
	

	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_logo' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_sticky_logo', array(
		'label'    => esc_html__( 'Sticky Logo', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_sticky_header',
		'priority'   => 20,
		))
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_width',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_width', array(
		'label'    => esc_html__( 'Sticky Logo Width (px)', 'poker-dice-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'poker-dice-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 30,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_margin_top',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_margin_top', array(
		'label'    => esc_html__( 'Sticky Logo Margin Top (px)', 'poker-dice-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'poker-dice-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 40,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_margin_bottom',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_margin_bottom', array(
		'label'    => esc_html__( 'Sticky Logo Margin Bottom (px)', 'poker-dice-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'poker-dice-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 50,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_nav_padding',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_nav_padding', array(
		'label'    => esc_html__( 'Sticky Nav Padding Top/Bottom', 'poker-dice-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 60,
		'choices'     => array(
			'min'  => 0,
			'max'  => 80,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_color', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_color', array(
		'label'    => esc_html__( 'Sticky Nav Font Color', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 70,
		)) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_color_hover', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_color_hover', array(
		'label'    => esc_html__( 'Sticky Nav Font Hover Color', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 80,
		)) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_underline', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_underline', array(
		'label'    => esc_html__( 'Sticky Nav Underline', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 95,
		)) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_bg', array(
		'label'    => esc_html__( 'Sticky Nav Background Color', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 100,
		)) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_hover_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_hover_bg', array(
		'label'    => esc_html__( 'Sticky Nav Hover Background', 'poker-dice-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 105,
		)) 
	);
	
	

	

	
	
	
  	/* Section - Header - Header Icons */
  	$wp_customize->add_section( 'progression_studios_section_header_icons', array(
  		'title'          => esc_html__( 'Header Social Icons', 'poker-dice-progression' ),
  		'panel'          => 'progression_studios_header_panel', // Not typically needed.
  		'priority'       => 100,
  	) );
	
	
	/* Section - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_icon_location' ,array(
		'default' => 'inline-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_icon_location', array(
		'label'    => esc_html__( 'Header Icon Location', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'priority'   => 2,
		'choices'     => array(
			'icon-right-pro' => esc_html__( 'Top Right', 'poker-dice-progression' ),
			'icon-left-pro' => esc_html__( 'Top Left', 'poker-dice-progression' ),
			'inline-pro' => esc_html__( 'Navigation', 'poker-dice-progression' ),
		),
		))
	);
	
	
 	/* Setting - Header - Header Icons */
 	$wp_customize->add_setting( 'progression_studios_header_icon_color', array(
 		'default'	=> '#bbbbbb',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_header_icon_color', array(
 		'label'    => esc_html__( 'Icon Color', 'poker-dice-progression' ),
		'description'    => esc_html__( 'Does not apply to inline nav icons.', 'poker-dice-progression' ),
 		'section'  => 'progression_studios_section_header_icons',
 		'priority'   => 5,
 		)) 
 	);
	
 	/* Setting - Header - Header Icons */
 	$wp_customize->add_setting( 'progression_studios_top_header_icon_hover_color', array(
 		'default'	=> '#ffffff',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_icon_hover_color', array(
 		'label'    => esc_html__( 'Icon Hover Color', 'poker-dice-progression' ),
		'description'    => esc_html__( 'Does not apply to inline nav icons.', 'poker-dice-progression' ),
 		'section'  => 'progression_studios_section_header_icons',
 		'priority'   => 6,
 		)) 
 	);
	
 	/* Setting - Header - Header Icons */
 	$wp_customize->add_setting( 'progression_studios_header_icon_bg_color', array(
		'default' => 'rgba(255,255,255,  0.14)',
 		'sanitize_callback' => 'progression_studios_sanitize_customizer',
 	) );
 	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_header_icon_bg_color', array(
		'default' => 'rgba(255,255,255,  0.14)',
 		'label'    => esc_html__( 'Icon Background', 'poker-dice-progression' ),
		'description'    => esc_html__( 'Does not apply to inline nav icons.', 'poker-dice-progression' ),
 		'section'  => 'progression_studios_section_header_icons',
 		'priority'   => 8,
 		)) 
 	);
	
	
 	/* Setting - Header - Header Icons */
 	$wp_customize->add_setting( 'progression_studios_header_icon_bg_color_hover', array(
		'default' => 'rgba(255,255,255,  0.2)',
 		'sanitize_callback' => 'progression_studios_sanitize_customizer',
 	) );
 	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_header_icon_bg_color_hover', array(
		'default' => 'rgba(255,255,255,  0.2)',
 		'label'    => esc_html__( 'Icon Background', 'poker-dice-progression' ),
		'description'    => esc_html__( 'Does not apply to inline nav icons.', 'poker-dice-progression' ),
 		'section'  => 'progression_studios_section_header_icons',
 		'priority'   => 9,
 		)) 
 	);


	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_facebook' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_facebook', array(
		'label'          => esc_html__( 'Facebook Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 12,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_twitter' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_twitter', array(
		'label'          => esc_html__( 'Twitter Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 15,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_instagram' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_instagram', array(
		'label'          => esc_html__( 'Instagram Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 20,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_spotify' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_spotify', array(
		'label'          => esc_html__( 'Spotify Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 25,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_youtube' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_youtube', array(
		'label'          => esc_html__( 'Youtube Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 30,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_vimeo' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_vimeo', array(
		'label'          => esc_html__( 'Vimeo Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 35,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_google_plus' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_google_plus', array(
		'label'          => esc_html__( 'Google + Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 40,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_pinterest' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_pinterest', array(
		'label'          => esc_html__( 'Pinterest Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 45,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_soundcloud' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_soundcloud', array(
		'label'          => esc_html__( 'Soundcloud Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 50,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_linkedin' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_linkedin', array(
		'label'          => esc_html__( 'LinkedIn Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 52,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_snapchat' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_snapchat', array(
		'label'          => esc_html__( 'Snapchat Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 55,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_tumblr' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_tumblr', array(
		'label'          => esc_html__( 'Tumblr Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 60,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_flickr' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_flickr', array(
		'label'          => esc_html__( 'Flickr Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 65,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_dribbble' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_dribbble', array(
		'label'          => esc_html__( 'Dribbble Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 70,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_vk' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_vk', array(
		'label'          => esc_html__( 'VK Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 75,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_wordpress' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_wordpress', array(
		'label'          => esc_html__( 'WordPress Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 80,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_houzz' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_houzz', array(
		'label'          => esc_html__( 'Houzz Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 85,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_behance' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_behance', array(
		'label'          => esc_html__( 'Behance Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 90,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_github' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_github', array(
		'label'          => esc_html__( 'GitHub Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 95,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_lastfm' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_lastfm', array(
		'label'          => esc_html__( 'Last.fm Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 100,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_medium' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_medium', array(
		'label'          => esc_html__( 'Medium Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 105,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_tripadvisor' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_tripadvisor', array(
		'label'          => esc_html__( 'Trip Advisor Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 110,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_twitch' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_twitch', array(
		'label'          => esc_html__( 'Twitch Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 115,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_yelp' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_yelp', array(
		'label'          => esc_html__( 'Yelp Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 120,
		)
	);
	
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_mail' ,array(
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'progression_studios_header_mail', array(
		'label'          => esc_html__( 'E-mail Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 150,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_wishlist' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_wishlist', array(
		'label'          => esc_html__( 'Heart Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 160,
		)
	);
	
	
	
	
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_align' ,array(
		'default' => 'progression-studios-nav-right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_align', array(
		'label'    => esc_html__( 'Navigation Alignment', 'poker-dice-progression' ),
		'section' => 'progression-studios-navigation-font',
		'priority'   => 10,
		'choices'     => array(
			'progression-studios-nav-left' => esc_html__( 'Left', 'poker-dice-progression' ),
			'progression-studios-nav-center' => esc_html__( 'Center', 'poker-dice-progression' ),
			'progression-studios-nav-right' => esc_html__( 'Right', 'poker-dice-progression' ),
		),
		))
	);
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_font_size',array(
		'default' => '14',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_font_size', array(
		'label'    => esc_html__( 'Navigation Font Size', 'poker-dice-progression' ),
		'section'  => 'progression-studios-navigation-font',
		'priority'   => 500,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_padding',array(
		'default' => '34',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_padding', array(
		'label'    => esc_html__( 'Navigation Padding Top/Bottom', 'poker-dice-progression' ),
		'section'  => 'progression-studios-navigation-font',
		'priority'   => 505,
		'choices'     => array(
			'min'  => 5,
			'max'  => 100,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_left_right',array(
		'default' => '22',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_left_right', array(
		'label'    => esc_html__( 'Navigation Padding Left/Right', 'poker-dice-progression' ),
		'section'  => 'progression-studios-navigation-font',
		'priority'   => 510,
		'choices'     => array(
			'min'  => 8,
			'max'  => 80,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_font_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_font_color', array(
		'label'    => esc_html__( 'Navigation Font Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-navigation-font',
		'priority'   => 520,
		)) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_font_color_hover', array(
		'default'	=> '#f6a800',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_font_color_hover', array(
		'label'    => esc_html__( 'Navigation Font Hover Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-navigation-font',
		'priority'   => 530,
		)) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_underline', array(		
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_underline', array(
		'label'    => esc_html__( 'Navigation Underline', 'poker-dice-progression' ),
		'description'    => esc_html__( 'Remove underline by clearing the color.', 'poker-dice-progression' ),
		'section'  => 'progression-studios-navigation-font',
		'priority'   => 535,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_bg', array(
		'label'    => esc_html__( 'Navigation Item Background', 'poker-dice-progression' ),
		'description'    => esc_html__( 'Remove background by clearing the color.', 'poker-dice-progression' ),
		'section'  => 'progression-studios-navigation-font',
		'priority'   => 536,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_bg_hover', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_bg_hover', array(
		'label'    => esc_html__( 'Navigation Item Background Hover', 'poker-dice-progression' ),
		'description'    => esc_html__( 'Remove background by clearing the color.', 'poker-dice-progression' ),
		'section'  => 'progression-studios-navigation-font',
		'priority'   => 536,
		)) 
	);
	
	

	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_letterspacing',array(
		'default' => '0.5',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_letterspacing', array(
		'label'          => esc_html__( 'Navigation Letter-Spacing (px)', 'poker-dice-progression' ),
		'section' => 'progression-studios-navigation-font',
		'priority'   => 540,
		'choices'     => array(
			'min'  => -2,
			'max'  => 10,
			'step' => 0.5
		), ) ) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_search' ,array(
		'default' => 'off',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_search', array(
		'label'    => esc_html__( 'Search Icon in Navigation', 'poker-dice-progression' ),
		'section' => 'progression-studios-navigation-font',
		'priority'   => 600,
		'choices'     => array(
			'on' => esc_html__( 'On', 'poker-dice-progression' ),
			'off' => esc_html__( 'Off', 'poker-dice-progression' ),
		),
		))
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_cart' ,array(
		'default' => 'off',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_cart', array(
		'label'    => esc_html__( 'Cart Icon in Navigation', 'poker-dice-progression' ),
		'section' => 'progression-studios-navigation-font',
		'priority'   => 620,
		'choices'     => array(
			'on' => esc_html__( 'On', 'poker-dice-progression' ),
			'off' => esc_html__( 'Off', 'poker-dice-progression' ),
		),
		))
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_cart_icon_main_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_cart_icon_main_color', array(
		'label'    => esc_html__( 'Cart Icon Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-navigation-font',
		'priority'   => 621,
		)) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_cart_color', array(
		'default'	=> '#0a0715',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_cart_color', array(
		'label'    => esc_html__( 'Cart Count Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-navigation-font',
		'priority'   => 625,
		)) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_cart_background', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_cart_background', array(
		'label'    => esc_html__( 'Cart Count Background', 'poker-dice-progression' ),
		'section'  => 'progression-studios-navigation-font',
		'priority'   => 650,
		)) 
	);


	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_bg_border', array(
		'default' => '#febd00',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_bg_border', array(
		'label'    => esc_html__( 'Sub-Navigation Border Top Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-sub-navigation-font',
		'priority'   => 8,
		)) 
	);

	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_bg', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );	
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_bg', array(
		'default' => '#ffffff',
		'label'    => esc_html__( 'Sub-Navigation Background Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-sub-navigation-font',
		'priority'   => 10,
		)) 
	);
	
	
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_font_size',array(
		'default' => '13',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sub_nav_font_size', array(
		'label'    => esc_html__( 'Navigation Font Size', 'poker-dice-progression' ),
		'section'  => 'progression-studios-sub-navigation-font',
		'priority'   => 510,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_letterspacing' ,array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sub_nav_letterspacing', array(
		'label'          => esc_html__( 'Sub-Navigation Letter-Spacing (px)', 'poker-dice-progression' ),
		'section' => 'progression-studios-sub-navigation-font',
		'priority'   => 515,
		'choices'     => array(
			'min'  => -2,
			'max'  => 10,
			'step' => 0.5
		), ) ) 
	);

	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_font_color', array(
		'default'	=> '#888888',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_font_color', array(
		'label'    => esc_html__( 'Sub-Navigation Font Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-sub-navigation-font',
		'priority'   => 520,
		)) 
	);
	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_hover_font_color', array(
		'default'	=> '#0f0f10',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_hover_font_color', array(
		'label'    => esc_html__( 'Sub-Navigation Font Hover Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-sub-navigation-font',
		'priority'   => 530,
		)) 
	);
	
	

	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_border_color', array(
		'default'	=> '#ececec',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_border_color', array(
		'label'    => esc_html__( 'Sub-Navigation Divider Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-sub-navigation-font',
		'priority'   => 550,
		)) 
	);
	
	
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_onoff' ,array(
		'default' => 'on-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_top_header_onoff', array(
		'label'    => esc_html__( 'Display Top Header Bar?', 'poker-dice-progression' ),
		'section'  => 'progression-studios-top-header-font',
		'priority'   => 10,
		'choices'     => array(
			'on-pro' => esc_html__( 'On', 'poker-dice-progression' ),
			'off-pro' => esc_html__( 'Off', 'poker-dice-progression' ),
		),
		))
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_background', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_background', array(
		'label'    => esc_html__( 'Top Header Background Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-top-header-font',
		'priority'   => 20,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_border_bottom', array(
		'default' => 'rgba(255,255,255,  0.12)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_border_bottom', array(
		'default' => 'rgba(255,255,255,  0.12)',
		'label'    => esc_html__( 'Top Header Border Bottom', 'poker-dice-progression' ),
		'section'  => 'progression-studios-top-header-font',
		'priority'   => 22,
		)) 
	);
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_font_size',array(
		'default' => '13',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_top_header_font_size', array(
		'label'    => esc_html__( 'Top Header Font Size', 'poker-dice-progression' ),
		'section'  => 'progression-studios-top-header-font',
		'priority'   => 530,
		'choices'     => array(
			'min'  => 5,
			'max'  => 25,
			'step' => 1
		), ) ) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_padding',array(
		'default' => '20',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_top_header_padding', array(
		'label'    => esc_html__( 'Top Header Padding Above/Below', 'poker-dice-progression' ),
		'section'  => 'progression-studios-top-header-font',
		'priority'   => 535,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_color', array(
		'default' => '#bfb3ff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_color', array(
		'label'    => esc_html__( 'Top Header Font/Link Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-top-header-font',
		'priority'   => 550,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_hover_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_hover_color', array(
		'label'    => esc_html__( 'Top Header Font/Link Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-top-header-font',
		'priority'   => 555,
		)) 
	);
	

	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_bg', array(
		'default' => '#333333',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_sub_bg', array(
		'default' => '#333333',
		'label'    => esc_html__( 'Sub Navigation Background', 'poker-dice-progression' ),
		'section'  => 'progression-studios-top-header-font',
		'priority'   => 565,
		)) 
	);

	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_border_clr', array(
		'default' => '#444444',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_border_clr', array(
		'default' => '#444444',
		'label'    => esc_html__( 'Sub Navigation Border Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-top-header-font',
		'priority'   => 568,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_color', array(
		'default' => '#b4b4b4',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_color', array(
		'label'    => esc_html__( 'Sub Navigation Font Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-top-header-font',
		'priority'   => 570,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_hover_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_hover_color', array(
		'label'    => esc_html__( 'Sub Navigation Font Hover Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-top-header-font',
		'priority'   => 575,
		)) 
	);
	
	
	
	
	
	
	
	/* Panel - Body */
	$wp_customize->add_panel( 'progression_studios_body_panel', array(
		'priority'    => 8,
        'title'       => esc_html__( 'Body', 'poker-dice-progression' ),
    ) );
	 
	 
	 
 	/* Setting - Body - Body Main */
 	$wp_customize->add_setting( 'progression_studios_default_link_color', array(
 		'default'	=> '#ffffff',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_default_link_color', array(
 		'label'    => esc_html__( 'Default Link Color', 'poker-dice-progression' ),
 		'section'  => 'progression-studios-body-font',
 		'priority'   => 500,
 		)) 
 	);
	
 	/* Setting - Body - Body Main */
 	$wp_customize->add_setting( 'progression_studios_default_link_hover_color', array(
 		'default'	=> '#ffc900',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_default_link_hover_color', array(
 		'label'    => esc_html__( 'Default Hover Link Color', 'poker-dice-progression' ),
 		'section'  => 'progression-studios-body-font',
 		'priority'   => 510,
 		)) 
 	);
	
	

	
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_background_color', array(
		'default'	=> '#010015',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_background_color', array(
		'label'    => esc_html__( 'Body Background Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-body-font',
		'priority'   => 513,
		)) 
	);
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_body_bg_image' ,array(		
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_body_bg_image', array(
		'label'    => esc_html__( 'Body Background Image', 'poker-dice-progression' ),
		'section'  => 'progression-studios-body-font',
		'priority'   => 525,
		))
	);
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_body_bg_image_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_body_bg_image_image_position', array(
		'label'    => esc_html__( 'Image Cover', 'poker-dice-progression' ),
		'section'  => 'progression-studios-body-font',
		'priority'   => 530,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'poker-dice-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'poker-dice-progression' ),
		),
		))
	);
	
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_boxed_background_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_boxed_background_color', array(
		'label'    => esc_html__( 'Boxed Content Background Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-body-font',
		'priority'   => 560,
		)) 
	);
	
	

	

	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_padding_top',array(
		'default' => '100',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_page_title_padding_top', array(
		'label'    => esc_html__( 'Page Title Top Padding', 'poker-dice-progression' ),
		'section'  => 'progression-studios-page-title',
		'priority'   => 501,
		'choices'     => array(
			'min'  => 0,
			'max'  => 350,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_padding_bottom',array(
		'default' => '100',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_page_title_padding_bottom', array(
		'label'    => esc_html__( 'Page Title Bottom Padding', 'poker-dice-progression' ),
		'section'  => 'progression-studios-page-title',
		'priority'   => 515,
		'choices'     => array(
			'min'  => 0,
			'max'  => 350,
			'step' => 1
		), ) ) 
	);
	
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_underline_color', array(
		'default' => '#23175c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_title_underline_color', array(
		'label'    => esc_html__( 'Page Title Border Top', 'poker-dice-progression' ),
		'section'  => 'progression-studios-page-title',
		'priority'   => 520,
		)) 
	);
	
	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_bg_image' ,array(
		'default' => get_template_directory_uri().'/images/page-title.jpg',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_page_title_bg_image', array(
		'label'    => esc_html__( 'Page Title Background Image', 'poker-dice-progression' ),
		'section' => 'progression-studios-page-title',
		'priority'   => 535,
		))
	);
	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_title_image_position', array(
		'section' => 'progression-studios-page-title',
		'priority'   => 536,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'poker-dice-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'poker-dice-progression' ),
		),
		))
	);
	
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_bg_color', array(
		'default' => '#2d2269',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_title_bg_color', array(
		'label'    => esc_html__( 'Page Title Background Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-page-title',
		'priority'   => 580,
		)) 
	);
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_overlay_color', array(
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_page_title_overlay_color', array(
		'label'    => esc_html__( 'Page Title Image Overlay', 'poker-dice-progression' ),
		'section'  => 'progression-studios-page-title',
		'priority'   => 590,
		)) 
	);
	
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_sidebar_heading_underline', array(
		'default'	=> 'rgba(255,255,255,  0.18)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sidebar_heading_underline', array(
		'default'	=> 'rgba(255,255,255,  0.18)',
		'label'    => esc_html__( 'Sidebar Heading Underline', 'poker-dice-progression' ),
		'section'  => 'progression-studios-sidebar-headings',
		'priority'   => 330,
		)) 
	);

	

	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_sidebar_divider', array(
		'default'	=> 'rgba(255,255,255,  0.12)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sidebar_divider', array(
		'default'	=> 'rgba(255,255,255,  0.12)',
		'label'    => esc_html__( 'Sidebar Divider Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-sidebar-headings',
		'priority'   => 330,
		)) 
	);
	
	
	
	
	/* Section - Blog - Blog Index Post Options */
   $wp_customize->add_section( 'progression_studios_section_blog_index', array(
   	'title'          => esc_html__( 'Blog Index Options', 'poker-dice-progression' ),
   	'panel'          => 'progression_studios_blog_panel', // Not typically needed.
   	'priority'       => 20,
   ) 
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_cat_sidebar' ,array(
		'default' => 'right-sidebar',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_cat_sidebar', array(
		'label'    => esc_html__( 'Category Sidebar', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 70,
		'choices' => array(
			'left-sidebar' => esc_html__( 'Left', 'poker-dice-progression' ),
			'right-sidebar' => esc_html__( 'Right', 'poker-dice-progression' ),
			'no-sidebar' => esc_html__( 'Hidden', 'poker-dice-progression' ),
		
		 ),
		))
	);
	
	
	

	

   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_transition' ,array(
		'default' => 'progression-studios-blog-image-no-effect',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_blog_transition', array(
		'label'    => esc_html__( 'Post Image Hover Effect', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'type' => 'select',
		'priority'   => 104,
		'choices' => array(
			'progression-studios-blog-image-scale' => esc_html__( 'Zoom', 'poker-dice-progression' ),
			'progression-studios-blog-image-zoom-grey' => esc_html__( 'Greyscale', 'poker-dice-progression' ),
			'progression-studios-blog-image-zoom-sepia' => esc_html__( 'Sepia', 'poker-dice-progression' ),
			'progression-studios-blog-image-zoom-saturate' => esc_html__( 'Saturate', 'poker-dice-progression' ),
			'progression-studios-blog-image-zoom-shine' => esc_html__( 'Shine', 'poker-dice-progression' ),
			'progression-studios-blog-image-no-effect' => esc_html__( 'No Effect', 'poker-dice-progression' ),
		
		 ),
		)
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_background', array(
		'default' => 'rgba(255,255,255, 0.08)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_blog_post_background', array(
		'default' => 'rgba(255,255,255, 0.08)',
		'label'    => esc_html__( 'Post Background Color', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 105,
		)) 
	);
	


	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_image_opacity',array(
		'default' => '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_blog_image_opacity', array(
		'label'    => esc_html__( 'Image Transparency on Hover', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 206,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1,
			'step' => 0.05
		), ) ) 
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_image_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_image_bg', array(
		'label'    => esc_html__( 'Post Image Background Color', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 210,
		)) 
	);
	
  
	
	

	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_meta_author_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_author_display', array(
		'label'    => esc_html__( 'Author', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 335,
		'choices' => array(
			'true' => esc_html__( 'Display', 'poker-dice-progression' ),
			'false' => esc_html__( 'Hide', 'poker-dice-progression' ),
		
		 ),
		))
	);
	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_meta_date_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_date_display', array(
		'label'    => esc_html__( 'Date', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 340,
		'choices' => array(
			'true' => esc_html__( 'Display', 'poker-dice-progression' ),
			'false' => esc_html__( 'Hide', 'poker-dice-progression' ),
		
		 ),
		))
	);
	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_index_meta_category_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_index_meta_category_display', array(
		'label'    => esc_html__( 'Category', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 350,
		'choices' => array(
			'true' => esc_html__( 'Display', 'poker-dice-progression' ),
			'false' => esc_html__( 'Hide', 'poker-dice-progression' ),
		
		 ),
		))
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_meta_comment_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_comment_display', array(
		'label'    => esc_html__( 'Comment Count', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 355,
		'choices' => array(
			'true' => esc_html__( 'Display', 'poker-dice-progression' ),
			'false' => esc_html__( 'Hide', 'poker-dice-progression' ),
		
		 ),
		))
	);
	
	
  
	

	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_post_page_title_bg_image' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_post_page_title_bg_image', array(
		'label'    => esc_html__( 'Post Title Background Image', 'poker-dice-progression' ),
		'section' => 'progression-studios-blog-post-options',
		'priority'   => 170,
		))
	);
	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_post_title_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_post_title_image_position', array(
		'section' => 'progression-studios-blog-post-options',
		'priority'   => 180,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'poker-dice-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'poker-dice-progression' ),
		),
		))
	);
	
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_post_title_bg_color', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_post_title_bg_color', array(
		'label'    => esc_html__( 'Page Title Background Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-blog-post-options',
		'priority'   => 190,
		)) 
	);
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_post_title_overlay_color', array(
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_post_title_overlay_color', array(
		'label'    => esc_html__( 'Page Title Image Overlay', 'poker-dice-progression' ),
		'section'  => 'progression-studios-blog-post-options',
		'priority'   => 200,
		)) 
	);
	

	
   /* Section - Blog - Blog Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_sidebar' ,array(
		'default' => 'right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_sidebar', array(
		'label'    => esc_html__( 'Blog Post Sidebar', 'poker-dice-progression' ),
		'section' => 'progression-studios-blog-post-options',
		'priority'   => 330,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'poker-dice-progression' ),
			'right' => esc_html__( 'Right', 'poker-dice-progression' ),
			'none' => esc_html__( 'No Sidebar', 'poker-dice-progression' ),
		),
		))
	);
	
	
	
   /* Section - Blog - Blog Post Options */
 	$wp_customize->add_setting( 'progression_studios_blog_post_sharing' ,array(
 		'default' => 'on',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_sharing', array(
 		'label'    => esc_html__( 'Post Sharing', 'poker-dice-progression' ),
 		'section' => 'progression-studios-blog-post-options',
 		'priority'   => 508,
 		'choices'     => array(
 			'on' => esc_html__( 'On', 'poker-dice-progression' ),
 			'off' => esc_html__( 'Off', 'poker-dice-progression' ),
 		),
 		))
 	);
	
	

   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_facebook' ,array(
 		'default' =>  '1',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_facebook', array(
 		'label'          => esc_html__( 'Facebook Sharing', 'poker-dice-progression' ),
 		'section' => 'progression-studios-blog-post-options',
 		'type' => 'checkbox',
 		'priority'   => 509,
 		)
	
 	);
	
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_twitter' ,array(
 		'default' =>  '1',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_twitter', array(
 		'label'          => esc_html__( 'Twitter Sharing', 'poker-dice-progression' ),
 		'section' => 'progression-studios-blog-post-options',
 		'type' => 'checkbox',
 		'priority'   => 510,
 		)
	
 	);
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_pinterest' ,array(
 		'default' =>  '1',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_pinterest', array(
 		'label'          => esc_html__( 'Pinterest Sharing', 'poker-dice-progression' ),
 		'section' => 'progression-studios-blog-post-options',
 		'type' => 'checkbox',
 		'priority'   => 515,
 		)
	
 	);
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_vk' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_vk', array(
 		'label'          => esc_html__( 'VK Sharing', 'poker-dice-progression' ),
 		'section' => 'progression-studios-blog-post-options',
 		'type' => 'checkbox',
 		'priority'   => 520,
 		)
	
 	);
	
	
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_google' ,array(
 		'default' =>  '1',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_google', array(
 		'label'          => esc_html__( 'Google+ Sharing', 'poker-dice-progression' ),
 		'section' => 'progression-studios-blog-post-options',
 		'type' => 'checkbox',
 		'priority'   => 520,
 		)
	
 	);
	
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_reddit' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_reddit', array(
 		'label'          => esc_html__( 'Reddit Sharing', 'poker-dice-progression' ),
 		'section' => 'progression-studios-blog-post-options',
 		'type' => 'checkbox',
 		'priority'   => 525,
 		)
	
 	);
	
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_linkedin' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_linkedin', array(
 		'label'          => esc_html__( 'LinkedIn Sharing', 'poker-dice-progression' ),
 		'section' => 'progression-studios-blog-post-options',
 		'type' => 'checkbox',
 		'priority'   => 530,
 		)
	
 	);
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_tumblr' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_tumblr', array(
 		'label'          => esc_html__( 'Tumblr Sharing', 'poker-dice-progression' ),
 		'section' => 'progression-studios-blog-post-options',
 		'type' => 'checkbox',
 		'priority'   => 535,
 		)
	
 	);
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_stumble' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_stumble', array(
 		'label'          => esc_html__( 'StumbleUpon Sharing', 'poker-dice-progression' ),
 		'section' => 'progression-studios-blog-post-options',
 		'type' => 'checkbox',
 		'priority'   => 538,
 		)
	
 	);
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_mail' ,array(
 		'default' =>  '1',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_mail', array(
 		'label'          => esc_html__( 'Email Sharing', 'poker-dice-progression' ),
 		'section' => 'progression-studios-blog-post-options',
 		'type' => 'checkbox',
 		'priority'   => 540,
 		)
	
 	);
	
	




	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_font', array(
		'default'	=> '#694900',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_font', array(
		'label'    => esc_html__( 'Button Font Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-button-typography',
		'priority'   => 1635,
		)) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_background', array(
		'default'	=> '#febd00',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_background', array(
		'label'    => esc_html__( 'Button Background Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-button-typography',
		'priority'   => 1640,
		)) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_border_bottom', array(
		'default'	=> '#febd00',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_border_bottom', array(
		'label'    => esc_html__( 'Button Border Button Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-button-typography',
		'priority'   => 1645,
		)) 
	);
	

	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_font_hover', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_font_hover', array(
		'label'    => esc_html__( 'Button Hover Font Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-button-typography',
		'priority'   => 1650,
		)) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_background_hover', array(
		'default'	=> '#be7900',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_background_hover', array(
		'label'    => esc_html__( 'Button Hover Background Color', 'poker-dice-progression' ),
		'section'  => 'progression-studios-button-typography',
		'priority'   => 1680,
		)) 
	);
	
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_border_bottom_hover', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_border_bottom_hover', array(
		'label'    => esc_html__( 'Button Border Button Hover', 'poker-dice-progression' ),
		'section'  => 'progression-studios-button-typography',
		'priority'   => 1690,
		)) 
	);

	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_font_size',array(
		'default' => '16',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_button_font_size', array(
		'label'    => esc_html__( 'Button Font Size', 'poker-dice-progression' ),
		'section'  => 'progression-studios-button-typography',
		'priority'   => 1700,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);

	
	

	
	

	/* Panel - Footer */
	$wp_customize->add_panel( 'progression_studios_footer_panel', array(
		'priority'    => 11,
        'title'       => esc_html__( 'Footer', 'poker-dice-progression' ),
    ) 
 	);
	
	
	/* Setting - Footer - Footer Main */
	$wp_customize->add_setting( 'progression_studios_footer_width' ,array(
		'default' => 'progression-studios-footer-normal-width',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_width', array(
		'label'    => esc_html__( 'Footer Width', 'poker-dice-progression' ),
 		'section' => 'progression-studios-widgets-font',
		'priority'   => 10,
		'choices'     => array(
			'progression-studios-footer-full-width' => esc_html__( 'Full Width', 'poker-dice-progression' ),
			'progression-studios-footer-normal-width' => esc_html__( 'Default', 'poker-dice-progression' ),
		),
		))
	);


	/* Setting - Footer - Footer Main */
 	$wp_customize->add_setting( 'progression_studios_footer_widget_heading_underline', array(
 		'default'	=> 'rgba(255,255,255,  0.1)',
 		'sanitize_callback' => 'progression_studios_sanitize_customizer',
 	) );
 	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_footer_widget_heading_underline', array(
		'default'	=> 'rgba(255,255,255,  0.1)',
 		'label'    => esc_html__( 'Footer Widget Heading Underline', 'poker-dice-progression' ),
 		'section' => 'progression-studios-widgets-font',
 		'priority'   => 505,
 		)) 
 	);



	/* Setting - Footer - Footer Main */
 	$wp_customize->add_setting( 'progression_studios_footer_border_top', array(
 		'default'	=> 'rgba(255,255,255,  0.1)',
 		'sanitize_callback' => 'progression_studios_sanitize_customizer',
 	) );
 	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_footer_border_top', array(
		'default'	=> 'rgba(255,255,255,  0.1)',
 		'label'    => esc_html__( 'Footer Widget Heading Underline', 'poker-dice-progression' ),
 		'section' => 'progression-studios-widgets-font',
 		'priority'   => 508,
 		)) 
 	);

	
	/* Setting - Footer - Footer Main */
 	$wp_customize->add_setting( 'progression_studios_footer_background', array(
 		'default'	=> '#2e216c',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_footer_background', array(
 		'label'    => esc_html__( 'Footer Background', 'poker-dice-progression' ),
 		'section' => 'progression-studios-widgets-font',
 		'priority'   => 510,
 		)) 
 	);
	
	/* Setting - Footer - Footer Main */
	$wp_customize->add_setting( 'progression_studios_footer_main_bg_image' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_footer_main_bg_image', array(
		'label'    => esc_html__( 'Footer Background Image', 'poker-dice-progression' ),
		'section' => 'progression-studios-widgets-font',
		'priority'   => 535,
		))
	);
	
	
	/* Setting - Footer - Footer Main */
	$wp_customize->add_setting( 'progression_studios_main_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_main_image_position', array(
		'section' => 'progression-studios-widgets-font',
		'priority'   => 536,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'poker-dice-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'poker-dice-progression' ),
		),
		))
	);
	

	/* Setting - Footer - Footer Navigation */
	$wp_customize->add_setting( 'progression_studios_footer_nav_location' ,array(
		'default' => 'bottom',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_nav_location', array(
		'label'    => esc_html__( 'Footer Navigation Location', 'poker-dice-progression' ),
		'section' => 'progression-studios-footer-nav-font',
		'priority'   => 5,
		'choices'     => array(
			'top' => esc_html__( 'Top', 'poker-dice-progression' ),
			'middle' => esc_html__( 'Middle', 'poker-dice-progression' ),
			'bottom' => esc_html__( 'Bottom', 'poker-dice-progression' ),
		),
		))
	);
	
	/* Setting - Footer - Footer Navigation */
	$wp_customize->add_setting( 'progression_studios_footer_nav_align' ,array(
		'default' => 'right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_nav_align', array(
		'label'    => esc_html__( 'Footer Navigation Alignment', 'poker-dice-progression' ),
		'section' => 'progression-studios-footer-nav-font',
		'priority'   => 10,
		'choices'     => array(
			'progression_studios_nav_footer_left' => esc_html__( 'Left', 'poker-dice-progression' ),
			'progression_studios_nav_footer_center' => esc_html__( 'Center', 'poker-dice-progression' ),
			'right' => esc_html__( 'Right', 'poker-dice-progression' ),
		),
		))
	);
	
	
	

	
	
	
	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_section( 'progression_studios_section_widget_layout', array(
		'title'          => esc_html__( 'Footer Widgets', 'poker-dice-progression' ),
		'panel'          => 'progression_studios_footer_panel', // Not typically needed.
		'priority'       => 450,
		) 
	);
	
 	/* Setting - Footer - Footer Widgets */
 	$wp_customize->add_setting( 'progression_studios_footer_widget_count' ,array(
 		'default' => 'footer-3-pro',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_widget_count', array(
 		'label'    => esc_html__( 'Footer Widget Row 1 Count', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_widget_layout',
 		'priority'   => 10,
 		'choices'     => array(
 			'footer-1-pro' => '1',
 			'footer-2-pro' => '2',
			'footer-3-pro' => '3',
			'footer-4-pro' => '4',
			'footer-5-pro' => '5',
 		),
 		))
 	);
	
 	/* Setting - Footer - Footer Widgets */
 	$wp_customize->add_setting( 'progression_studios_footer_widget_count_row_two' ,array(
 		'default' => 'footer-3-pro',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_widget_count_row_two', array(
 		'label'    => esc_html__( 'Footer Widget Row 2 Count', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_widget_layout',
 		'priority'   => 10,
 		'choices'     => array(
 			'footer-1-pro' => '1',
 			'footer-2-pro' => '2',
			'footer-3-pro' => '3',
			'footer-4-pro' => '4',
			'footer-5-pro' => '5',
 		),
 		))
 	);
	
 	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_widgets_margin_top',array(
		'default' => '80',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_widgets_margin_top', array(
		'label'    => esc_html__( 'Footer Widget Margin Top', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_widget_layout',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
 	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_widgets_margin_bottom',array(
		'default' => '65',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_widgets_margin_bottom', array(
		'label'    => esc_html__( 'Footer Widget Margin Bottom', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_widget_layout',
		'priority'   => 22,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	


	

	
	
	
	
	
	
	
	
	 
	 
	 
	
	
	 
	 
	 
	 
  	
	 
	 

	 
	 
  	/* Section - Footer - Footer Icons */
  	$wp_customize->add_section( 'progression_studios_section_footer_icons', array(
  		'title'          => esc_html__( 'Footer Icons', 'poker-dice-progression' ),
  		'panel'          => 'progression_studios_footer_panel', // Not typically needed.
  		'priority'       => 500,
  	) );
	
	

	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_icon_location' ,array(
		'default' => 'middle',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_icon_location', array(
		'label'    => esc_html__( 'Footer Icon Location', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 2,
		'choices'     => array(
			'top' => esc_html__( 'Top', 'poker-dice-progression' ),
			'middle' => esc_html__( 'Middle', 'poker-dice-progression' ),
			'bottom' => esc_html__( 'Bottom', 'poker-dice-progression' ),
		),
		))
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_icon_location_align' ,array(
		'default' => 'center',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_icon_location_align', array(
		'label'    => esc_html__( 'Footer Icon Alignment', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 3,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'poker-dice-progression' ),
			'center' => esc_html__( 'Center', 'poker-dice-progression' ),
			'right' => esc_html__( 'Right', 'poker-dice-progression' ),
		),
		))
	);
	


	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_icon_size',array(
		'default' => '17',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_icon_size', array(
		'label'    => esc_html__( 'Icon Size', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 4,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_margin_top',array(
		'default' => '0', /* 100 */
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_margin_top', array(
		'label'    => esc_html__( 'Icon Margin Top', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 5,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_margin_bottom',array(
		'default' => '0', /* 75 */
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_margin_bottom', array(
		'label'    => esc_html__( 'Icon Margin Bottom', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 6,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_margin_sides',array(
		'default' => '5',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_margin_sides', array(
		'label'    => esc_html__( 'Icon Margin Left/Right', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 7,
		'choices'     => array(
			'min'  => -3,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	

	
	
 	/* Setting - Footer - Footer Icons */
 	$wp_customize->add_setting( 'progression_studios_footer_icon_color', array(
 		'default'	=> '#ffffff',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_footer_icon_color', array(
 		'label'    => esc_html__( 'Footer Icon Color', 'poker-dice-progression' ),
 		'section'  => 'progression_studios_section_footer_icons',
 		'priority'   => 8,
 		)) 
 	);
	

	
 	/* Setting - Footer - Footer Icons */
 	$wp_customize->add_setting( 'progression_studios_footer_icon_border_color', array(
		'default'	=> 'rgba(255,255,255,  0.06)',
 		'sanitize_callback' => 'progression_studios_sanitize_customizer',
 	) );
 	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_footer_icon_border_color', array(
		'default'	=> 'rgba(255,255,255,  0.06)',
 		'label'    => esc_html__( 'Footer Icon Background Color', 'poker-dice-progression' ),
 		'section'  => 'progression_studios_section_footer_icons',
 		'priority'   => 8,
 		)) 
 	);
	
 	/* Setting - Footer - Footer Icons */
 	$wp_customize->add_setting( 'progression_studios_footer_hover_icon_color', array(
 		'default'	=> '#ffffff',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_footer_hover_icon_color', array(
 		'label'    => esc_html__( 'Footer Icon Hover Color', 'poker-dice-progression' ),
 		'section'  => 'progression_studios_section_footer_icons',
 		'priority'   => 9,
 		)) 
 	);
	
 	/* Setting - Footer - Footer Icons */
 	$wp_customize->add_setting( 'progression_studios_footer_hover_background_icon_color', array(
 		'default'	=> 'rgba(255,255,255,  0.12)',
 		'sanitize_callback' => 'progression_studios_sanitize_customizer',
 	) );
 	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_footer_hover_background_icon_color', array(
		'default'	=> 'rgba(255,255,255,  0.12)',
 		'label'    => esc_html__( 'Footer Icon Hover Background', 'poker-dice-progression' ),
 		'section'  => 'progression_studios_section_footer_icons',
 		'priority'   => 10,
 		)) 
 	);
	
	
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_facebook' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_facebook', array(
		'label'          => esc_html__( 'Facebook Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 13,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_twitter' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_twitter', array(
		'label'          => esc_html__( 'Twitter Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 15,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_instagram' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_instagram', array(
		'label'          => esc_html__( 'Instagram Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 20,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_spotify' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_spotify', array(
		'label'          => esc_html__( 'Spotify Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 25,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_youtube' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_youtube', array(
		'label'          => esc_html__( 'Youtube Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 30,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_vimeo' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_vimeo', array(
		'label'          => esc_html__( 'Vimeo Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 35,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_google_plus' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_google_plus', array(
		'label'          => esc_html__( 'Google + Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 40,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_pinterest' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_pinterest', array(
		'label'          => esc_html__( 'Pinterest Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 45,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_soundcloud' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_soundcloud', array(
		'label'          => esc_html__( 'Soundcloud Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 50,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_linkedin' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_linkedin', array(
		'label'          => esc_html__( 'LinkedIn Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 52,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_snapchat' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_snapchat', array(
		'label'          => esc_html__( 'Snapchat Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 55,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_tumblr' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_tumblr', array(
		'label'          => esc_html__( 'Tumblr Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 60,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_flickr' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_flickr', array(
		'label'          => esc_html__( 'Flickr Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 65,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_dribbble' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_dribbble', array(
		'label'          => esc_html__( 'Dribbble Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 70,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_vk' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_vk', array(
		'label'          => esc_html__( 'VK Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 75,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_wordpress' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_wordpress', array(
		'label'          => esc_html__( 'WordPress Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 80,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_houzz' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_houzz', array(
		'label'          => esc_html__( 'Houzz Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 85,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_behance' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_behance', array(
		'label'          => esc_html__( 'Behance Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 90,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_github' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_github', array(
		'label'          => esc_html__( 'GitHub Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 95,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_lastfm' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_lastfm', array(
		'label'          => esc_html__( 'Last.fm Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 100,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_medium' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_medium', array(
		'label'          => esc_html__( 'Medium Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 105,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_tripadvisor' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_tripadvisor', array(
		'label'          => esc_html__( 'Trip Advisor Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 110,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_twitch' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_twitch', array(
		'label'          => esc_html__( 'Twitch Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 115,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_yelp' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_yelp', array(
		'label'          => esc_html__( 'Yelp Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 120,
		)
	);
	
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_mail' ,array(
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'progression_studios_footer_mail', array(
		'label'          => esc_html__( 'E-mail Icon', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 150,
		)
	);
	
	
	
	
	

	


	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_footer_copyright' ,array(
		'default' =>  'All Rights Reserved. Developed by Progression Studios',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control( 'progression_studios_footer_copyright', array(
		'label'          => esc_html__( 'Copyright Text', 'poker-dice-progression' ),
		'section' => 'progression-studios-copyright-font',
		'type' => 'textarea',
		'priority'   => 10,
		)
	);
	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_bg', array(
		'label'    => esc_html__( 'Copyright Background', 'poker-dice-progression' ),
		'section' => 'progression-studios-copyright-font',
		'priority'   => 150,
		)) 
	);
	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_border', array(
		'default' => 'rgba(255,255,255, 0.1)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_copyright_border', array(
		'default' => 'rgba(255,255,255, 0.1)',
		'label'    => esc_html__( 'Copyright Border Top', 'poker-dice-progression' ),
		'section' => 'progression-studios-copyright-font',
		'priority'   => 160,
		)) 
	);
	
	

	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_link', array(
		'default' => '#dddddd',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_link', array(
		'label'    => esc_html__( 'Copyright Link Color', 'poker-dice-progression' ),
		'section' => 'progression-studios-copyright-font',
		'priority'   => 530,
		)) 
	);
	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_link_hover', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_link_hover', array(
		'label'    => esc_html__( 'Copyright Link Hover Color', 'poker-dice-progression' ),
		'section' => 'progression-studios-copyright-font',
		'priority'   => 540,
		)) 
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_copyright_location' ,array(
		'default' => 'footer-copyright-align-left',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_copyright_location', array(
		'label'    => esc_html__( 'Copyright Text Alignment', 'poker-dice-progression' ),
		'section' => 'progression-studios-copyright-font',
		'priority'   => 560,
		'choices'     => array(
			'footer-copyright-align-left' => esc_html__( 'Left', 'poker-dice-progression' ),
			'footer-copyright-align-center' => esc_html__( 'Center', 'poker-dice-progression' ),
			'footer-copyright-align-right' => esc_html__( 'Right', 'poker-dice-progression' ),
		),
		))
	);
	
	
 	
	
	
 	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_copyright_margin_top',array(
		'default' => '28',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_copyright_margin_top', array(
		'label'    => esc_html__( 'Copyright Padding Top', 'poker-dice-progression' ),
		'section' => 'progression-studios-copyright-font',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
 	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_copyright_margin_bottom',array(
		'default' => '28',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_copyright_margin_bottom', array(
		'label'    => esc_html__( 'Copyright Padding Bottom', 'poker-dice-progression' ),
		'section' => 'progression-studios-copyright-font',
		'priority'   => 22,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);

  
  
   
	
	
	
	
	
	
	
	
	
	
	/* Panel - Body */
	$wp_customize->add_panel( 'progression_studios_blog_panel', array(
		'priority'    => 10,
        'title'       => esc_html__( 'Blog', 'poker-dice-progression' ),
    ) );
	
	


	
	
   /* Section - Body - Blog Typography */
	$wp_customize->add_setting( 'progression_studios_blog_title_link', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_title_link', array(
		'label'    => esc_html__( 'Title Color', 'poker-dice-progression' ),
		'section' => 'progression-studios-blog-headings',
		'priority'   => 5,
		)) 
	);
	
	
   /* Section - Body - Blog Typography */
	$wp_customize->add_setting( 'progression_studios_blog_title_link_hover', array(
		'default' => '#ffc900',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_title_link_hover', array(
		'label'    => esc_html__( 'Title Hover Color', 'poker-dice-progression' ),
		'section' => 'progression-studios-blog-headings',
		'priority'   => 10,
		)) 
	);
	

	
	
	
	
	
	
	
	/* Panel - Shop */
	$wp_customize->add_panel( 'progression_studios_shop_panel', array(
		'priority'    => 10,
        'title'       => esc_html__( 'Shop', 'poker-dice-progression' ),
    ) 
 	);
	
  	/* Section - Shop - Shop Index Options */
  	$wp_customize->add_section( 'progression_studios_section_shop_index', array(
  		'title'          => esc_html__( 'Shop Index Options', 'poker-dice-progression' ),
  		'panel'          => 'progression_studios_shop_panel', // Not typically needed.
  		'priority'       => 700,
  	) );
	
	/* Section - Shop - Shop Index Options */
	$wp_customize->add_setting( 'progression_studios_shop_columns' ,array(
		'default' => '2',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );

	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_columns', array(
		'label'    => esc_html__( 'Shop Index Columns', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 20,
		'choices'     => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
		),
		))
	);
	
	


	/* Section - Shop - Shop Index Options */
	$wp_customize->add_setting( 'progression_studios_shop_posts_Page' ,array(
		'default' =>  '9',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_shop_posts_Page', array(
		'label'          => esc_html__( 'Shop Posts Per Page', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'type' => 'text',
		'priority'   => 30,

		)
	
	);
	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_background', array(
		'default' => 'rgba(255,255,255, 0.08)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_shop_post_background', array(
		'default' => 'rgba(255,255,255, 0.08)',
		'label'    => esc_html__( 'Post Background Color', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 35,
		)) 
	);
	
	
	
   /* Section - Shop - Shop Index Typogrpahy */
	$wp_customize->add_setting( 'progression_studios_shop_rating_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_shop_rating_color', array(
		'label'    => esc_html__( 'Shop Rating Color', 'poker-dice-progression' ),
		'section' => 'progression-studios-shop-headings',
		'priority'   => 10,
		)) 
	);

	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_rating' ,array(
		'default' => 'false',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_post_rating', array(
		'label'    => esc_html__( 'Shop Post Rating', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 55,
		'choices' => array(
			'true' => esc_html__( 'Display', 'poker-dice-progression' ),
			'false' => esc_html__( 'Hide', 'poker-dice-progression' ),
		
		 ),
		))
	);
	
	
	
   /* Section - Shop - Shop Post Options */
   $wp_customize->add_section( 'progression_studios_section_shop_post', array(
   	'title'          => esc_html__( 'Shop Post Options', 'poker-dice-progression' ),
   	'panel'          => 'progression_studios_shop_panel', // Not typically needed.
   	'priority'       => 770,
   ) 
	);
	

	
   /* Section - Shop - Shop Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_related_display' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_post_related_display', array(
		'label'    => esc_html__( 'Show Related Products', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 4,
		'choices'     => array(
			'on' => esc_html__( 'Display', 'poker-dice-progression' ),
			'off' => esc_html__( 'Hide', 'poker-dice-progression' ),
		),
		))
	);
	
	
	/* Section - Shop - Shop Index Options */
	$wp_customize->add_setting( 'progression_studios_shop_related_columns' ,array(
		'default' => '3',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );

	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_related_columns', array(
		'label'    => esc_html__( 'Related Products Columns', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 5,
		'choices'     => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
		),
		))
	);
	
	
	
   /* Section - Shop - Shop Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_sidebar' ,array(
		'default' => 'none',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_post_sidebar', array(
		'label'    => esc_html__( 'Shop Post Sidebar', 'poker-dice-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 6,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'poker-dice-progression' ),
			'right' => esc_html__( 'Right', 'poker-dice-progression' ),
			'none' => esc_html__( 'No Sidebar', 'poker-dice-progression' ),
		),
		))
	);
	
	
	
	
	
	
   /* Section - Shop - Shop Post Options */
 	$wp_customize->add_setting( 'progression_studios_shop_post_sharing' ,array(
 		'default' => 'on',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_post_sharing', array(
 		'label'    => esc_html__( 'Shop Post Sharing', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_shop_post',
 		'priority'   => 208,
 		'choices'     => array(
 			'on' => esc_html__( 'On', 'poker-dice-progression' ),
 			'off' => esc_html__( 'Off', 'poker-dice-progression' ),
 		),
 		))
 	);
	
	

   /* Section - Shop - Post Options */
 	$wp_customize->add_setting( 'progression_single_shop_sharing_facebook' ,array(
 		'default' =>  '1',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_shop_sharing_facebook', array(
 		'label'          => esc_html__( 'Facebook Sharing', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_shop_post',
 		'type' => 'checkbox',
 		'priority'   => 209,
 		)
	
 	);
	
	
   /* Section - Shop - Post Options */
 	$wp_customize->add_setting( 'progression_single_shop_sharing_twitter' ,array(
 		'default' =>  '1',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_shop_sharing_twitter', array(
 		'label'          => esc_html__( 'Twitter Sharing', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_shop_post',
 		'type' => 'checkbox',
 		'priority'   => 210,
 		)
	
 	);
	
   /* Section - Shop - Post Options */
 	$wp_customize->add_setting( 'progression_single_shop_sharing_pinterest' ,array(
 		'default' =>  '1',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_shop_sharing_pinterest', array(
 		'label'          => esc_html__( 'Pinterest Sharing', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_shop_post',
 		'type' => 'checkbox',
 		'priority'   => 215,
 		)
	
 	);
	
   /* Section - Shop - Post Options */
 	$wp_customize->add_setting( 'progression_single_shop_sharing_vk' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_shop_sharing_vk', array(
 		'label'          => esc_html__( 'VK Sharing', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_shop_post',
 		'type' => 'checkbox',
 		'priority'   => 220,
 		)
	
 	);
	
	
	
   /* Section - Shop - Post Options */
 	$wp_customize->add_setting( 'progression_single_shop_sharing_google' ,array(
 		'default' =>  '1',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_shop_sharing_google', array(
 		'label'          => esc_html__( 'Google+ Sharing', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_shop_post',
 		'type' => 'checkbox',
 		'priority'   => 220,
 		)
	
 	);
	
	
   /* Section - Shop - Post Options */
 	$wp_customize->add_setting( 'progression_single_shop_sharing_reddit' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_shop_sharing_reddit', array(
 		'label'          => esc_html__( 'Reddit Sharing', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_shop_post',
 		'type' => 'checkbox',
 		'priority'   => 225,
 		)
	
 	);
	
	
   /* Section - Shop - Post Options */
 	$wp_customize->add_setting( 'progression_single_shop_sharing_linkedin' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_shop_sharing_linkedin', array(
 		'label'          => esc_html__( 'LinkedIn Sharing', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_shop_post',
 		'type' => 'checkbox',
 		'priority'   => 230,
 		)
	
 	);
	
   /* Section - Shop - Post Options */
 	$wp_customize->add_setting( 'progression_single_shop_sharing_tumblr' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_shop_sharing_tumblr', array(
 		'label'          => esc_html__( 'Tumblr Sharing', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_shop_post',
 		'type' => 'checkbox',
 		'priority'   => 235,
 		)
	
 	);
	
   /* Section - Shop - Post Options */
 	$wp_customize->add_setting( 'progression_single_shop_sharing_stumble' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_shop_sharing_stumble', array(
 		'label'          => esc_html__( 'StumbleUpon Sharing', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_shop_post',
 		'type' => 'checkbox',
 		'priority'   => 238,
 		)
	
 	);
	
   /* Section - Shop - Post Options */
 	$wp_customize->add_setting( 'progression_single_shop_sharing_mail' ,array(
 		'default' =>  '1',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_shop_sharing_mail', array(
 		'label'          => esc_html__( 'Email Sharing', 'poker-dice-progression' ),
 		'section' => 'progression_studios_section_shop_post',
 		'type' => 'checkbox',
 		'priority'   => 240,
 		)
	
 	);
	

	
	
}
add_action( 'customize_register', 'progression_studios_customizer' );

//HTML Text
function progression_studios_sanitize_customizer( $input ) {
    return wp_kses( $input, TRUE);
}

//no-HTML text
function progression_studios_sanitize_choices( $input ) {
	return wp_filter_nohtml_kses( $input );
}

function progression_studios_customizer_styles() {
	global $post;
	
	//https://codex.wordpress.org/Function_Reference/wp_add_inline_style
	wp_enqueue_style( 'progression-studios-custom-style', get_template_directory_uri() . '/css/progression_studios_custom_styles.css' );

   if ( get_theme_mod( 'progression_studios_header_bg_image', get_template_directory_uri() . '/images/header-bg.jpg')  ) {
      $progression_studios_header_bg_image = "background-image:url(" . esc_attr( get_theme_mod( 'progression_studios_header_bg_image', get_template_directory_uri() . '/images/header-bg.jpg' ) ) . ");";
	}	else {
		$progression_studios_header_bg_image = "";
	}
	
   if ( get_theme_mod( 'progression_studios_header_drop_shadow') == 'on' ) {
      $progression_studios_header_shadow_option = ".progression-sticky-scrolled header#masthead-pro { box-shadow: 0px 2px 6px rgba(0,0,0, 0.06); }";
	}	else {
		$progression_studios_header_shadow_option = "";
	}
	
   if ( get_theme_mod( 'progression_studios_header_bg_image_image_position', 'cover') == 'cover' ) {
      $progression_studios_header_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_header_bg_cover = "background-repeat:repeat-all; ";
	}
	
   if ( get_theme_mod( 'progression_studios_body_bg_image') ) {
      $progression_studios_body_bg = "background-image:url(" .   esc_attr( get_theme_mod( 'progression_studios_body_bg_image') ). ");";
	}	else {
		$progression_studios_body_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_body_bg_image_image_position', 'cover') == 'cover') {
      $progression_studios_body_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover; background-attachment: fixed;";
	}	else {
		$progression_studios_body_bg_cover = "background-repeat:repeat-all;";
	}
	
   if ( get_theme_mod( 'progression_studios_page_title_image_position', 'cover') == 'cover' ) {
      $progression_studios_page_tite_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_page_tite_bg_cover = "background-repeat:repeat-all;";
	}
	
	
   if ( get_theme_mod( 'progression_studios_page_post_title_image_position', 'cover') == 'cover' ) {
      $progression_studios_post_tite_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_post_tite_bg_cover = "background-repeat:repeat-all;";
	}
	
   if ( get_theme_mod( 'progression_studios_post_page_title_bg_image') ) {
      $progression_studios_post_tite_bg_image = "background-image:url(" .   esc_attr( get_theme_mod( 'progression_studios_post_page_title_bg_image') ). ");";
	}	else {
		$progression_studios_post_tite_bg_image = "";
	}
	
   if ( get_theme_mod( 'progression_studios_page_title_overlay_color') ) {
      $progression_studios_page_tite_overlay_image_cover = "#page-title-pro:before {background:" .  esc_attr( get_theme_mod('progression_studios_page_title_overlay_color') ) . "; }";
	}	else {
		$progression_studios_page_tite_overlay_image_cover = "";
	}
	
   if ( get_theme_mod( 'progression_studios_post_title_overlay_color') ) {
      $progression_studios_post_tite_overlay_image_cover = "#page-title-pro.page-title-pro-post-page:before {background:" .  esc_attr( get_theme_mod('progression_studios_post_title_overlay_color') ) . "; }";
	}	else {
		$progression_studios_post_tite_overlay_image_cover = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_logo_width', '0') != '0' ) {
      $progression_studios_sticky_logo_width = "width:" .  esc_attr( get_theme_mod('progression_studios_sticky_logo_width', '70') ) . "px;";
	}	else {
		$progression_studios_sticky_logo_width = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_logo_margin_top', '0') != '0' ) {
      $progression_studios_sticky_logo_top = "padding-top:" .  esc_attr( get_theme_mod('progression_studios_sticky_logo_margin_top', '31') ) . "px;";
	}	else {
		$progression_studios_sticky_logo_top = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_logo_margin_bottom', '0') != '0' ) {
      $progression_studios_sticky_logo_bottom = "padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_sticky_logo_margin_bottom', '31') ) . "px;";
	}	else {
		$progression_studios_sticky_logo_bottom = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_padding', '0') != '0' ) {
      $progression_studios_sticky_nav_padding = "
		.progression-sticky-scrolled .progression-mini-banner-icon {
			top:" . esc_attr( (get_theme_mod('progression_studios_sticky_nav_padding') - get_theme_mod('progression_studios_nav_font_size', '14')) - 4 ). "px;
		}
		.progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 3 ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 3 ). "px;
		}

		.progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count { top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') ). "px; }
		.progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 5  ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 5 ). "px;
		}
		progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
					padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 6  ). "px;
					padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 6 ). "px;
		}
		.progression-sticky-scrolled .sf-menu a {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') ). "px;
		}
			";
	}	else {
		$progression_studios_sticky_nav_padding = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_underline') ) {
      $progression_studios_nav_underline = "
		.progression-sticky-scrolled .sf-menu a:before {
			background:". esc_attr( get_theme_mod('progression_studios_sticky_nav_underline') ). ";
		}
		.progression-sticky-scrolled .sf-menu a:hover:before, .progression-sticky-scrolled .sf-menu li.sfHover a:before, .progression-sticky-scrolled .sf-menu li.current-menu-item a:before {
			opacity:1;
			background:". esc_attr( get_theme_mod('progression_studios_sticky_nav_underline') ). ";
		}
			";
	}	else {
		$progression_studios_nav_underline = "";
	}
	
   if (  get_theme_mod( 'progression_studios_sticky_nav_font_color') ) {
      $progression_studios_sticky_nav_option_font_color = "
			.progression-sticky-scrolled .active-mobile-icon-pro .mobile-menu-icon-pro, .progression-sticky-scrolled .mobile-menu-icon-pro,  .progression-sticky-scrolled .mobile-menu-icon-pro:hover,
	.progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search,
	.progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression-sticky-scrolled .sf-menu a {
		color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color') ) . ";
	}";
	}	else {
		$progression_studios_sticky_nav_option_font_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_color_hover') ) {
      $progression_studios_optional_sticky_nav_font_hover = "
		.progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, .progression-sticky-scrolled .sf-menu a:hover, .progression-sticky-scrolled .sf-menu li.sfHover a, .progression-sticky-scrolled .sf-menu li.current-menu-item a {
		color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color_hover') ) . ";
	}";
	}	else {
		$progression_studios_optional_sticky_nav_font_hover = "";
	}
	
   if ( get_theme_mod( 'progression_studios_nav_bg') ) {
      $progression_studios_optional_nav_bg = "background:" . esc_attr( get_theme_mod('progression_studios_nav_bg') ). ";";
	}	else {
		$progression_studios_optional_nav_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_nav_underline') ) {
      $progression_studios_nav_underline_default = "
		.sf-menu a:before {
			background:" . esc_attr( get_theme_mod('progression_studios_nav_underline') ). ";
		}
		.sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
			opacity:1;
			background:" . esc_attr( get_theme_mod('progression_studios_nav_underline') ). ";
		}
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:before, 
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover:before, 
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a:before, 
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a:before,
	
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:before, 
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover:before, 
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a:before, 
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a:before {
			background:" . esc_attr( get_theme_mod('progression_studios_nav_underline') ). ";
		}
			";
	}	else {
		$progression_studios_nav_underline_default = "";
	}
	
   if ( get_theme_mod( 'progression_studios_top_header_onoff', 'on-pro') == 'off-pro' ) {
      $progression_studios_top_header_off_on_display = "display:none;";
	}	else {
		$progression_studios_top_header_off_on_display = "";
	}
	
   if ( get_theme_mod( 'progression_studios_pro_scroll_top', 'scroll-on-pro') == "scroll-off-pro" ) {
      $progression_studios_scroll_top_disable = "display:none;";
	}	else {
		$progression_studios_scroll_top_disable = "";
	}
	
   if ( get_theme_mod( 'progression_studios_copyright_border', 'rgba(255,255,255, 0.1)')) {
      $progression_studios_copyright_optional_divider = "#copyright-divider-top {background:".  esc_attr( get_theme_mod('progression_studios_copyright_border', 'rgba(255,255,255, 0.1)') ). "; height:1px;} ";
	}	else {
		$progression_studios_copyright_optional_divider = "";
	}
	
   if ( get_theme_mod( 'progression_studios_footer_border_top', 'rgba(255,255,255, 0.1)')) {
      $progression_studios_footer_optional_border_top = "footer#site-footer {border-top:1px solid ".  esc_attr( get_theme_mod('progression_studios_footer_border_top', 'rgba(255,255,255, 0.1)') ). "; } ";
	}	else {
		$progression_studios_footer_optional_border_top = "";
	}
	
   if ( get_theme_mod( 'progression_studios_button_border_bottom', '#be7900')) {
      $progression_studios_option_border_bottom = "#woocomerce-tabs-container-progression-studios .woocommerce-tabs ul.wc-tabs li.active, body #widget-area-progression .progression-studios-social-icons-widget-container a.progression-button, #boxed-layout-pro .form-submit input#submit, #boxed-layout-pro input.button, .tml-submit-wrap input.button-primary, .acf-form-submit input.button, .tml input#wp-submit, #boxed-layout-pro #customer_login input.button, #boxed-layout-pro .woocommerce-checkout-payment input.button, #boxed-layout-pro button.button, #boxed-layout-pro a.button, .post-password-form input[type=submit], #respond input.submit, .wpcf7-form input.wpcf7-submit {border-bottom:3px solid ".  esc_attr( get_theme_mod('progression_studios_button_border_bottom', '#be7900') ). "; }  .tagcloud a {border-bottom:2px solid ".  esc_attr( get_theme_mod('progression_studios_button_border_bottom', '#be7900') ). ";}";
	}	else {
		$progression_studios_option_border_bottom = "";
	}
	
   if ( get_theme_mod( 'progression_studios_option_border_bottom_hover')) {
      $progression_studios_option_border_bottom_hover = ".tagcloud a:hover, body #widget-area-progression .progression-studios-social-icons-widget-container a.progression-button:hover, #boxed-layout-pro .form-submit input#submit:hover, #boxed-layout-pro input.button:hover, .tml-submit-wrap input.button-primary:hover, .acf-form-submit input.button:hover, .tml input#wp-submit:hover, #boxed-layout-pro #customer_login input.button:hover, #boxed-layout-pro .woocommerce-checkout-payment input.button:hover, #boxed-layout-pro button.button:hover, #boxed-layout-pro a.button:hover, .post-password-form input[type=submit]:hover, #respond input.submit:hover, .wpcf7-form input.wpcf7-submit:hover {border-bottom:3px solid ".  esc_attr( get_theme_mod('progression_studios_option_border_bottom_hover') ). "; } ";
	}	else {
		$progression_studios_option_border_bottom_hover = "";
	}
	
   if ( get_theme_mod( 'progression_studios_copyright_bg')) {
      $progression_studios_copyright_optional_bg = "background:".  esc_attr( get_theme_mod('progression_studios_copyright_bg') ). "; ";
	}	else {
		$progression_studios_copyright_optional_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_nav_bg_hover') ) {
      $progression_studios_optiona_nav_bg_hover = ".sf-menu a:hover, .sf-menu li.sfHover a, .sf-menu li.current-menu-item a { background:".  esc_attr( get_theme_mod('progression_studios_nav_bg_hover') ). "; }";
	}	else {
		$progression_studios_optiona_nav_bg_hover = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_bg') ) {
      $progression_studios_optiona_sticky_nav_font_bg = ".progression-sticky-scrolled .sf-menu a { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_font_bg') ). "; }";
	}	else {
		$progression_studios_optiona_sticky_nav_font_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_hover_bg') ) {
      $progression_studios_optiona_sticky_nav_hover_bg = ".progression-sticky-scrolled .sf-menu a:hover, .progression-sticky-scrolled .sf-menu li.sfHover a, .progression-sticky-scrolled .sf-menu li.current-menu-item a { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_font_hover_bg') ). "; }";
	}	else {
		$progression_studios_optiona_sticky_nav_hover_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_color') ) {
      $progression_studios_option_sticky_nav_font_color = ".progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a {
		color:". esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color') ). ";
	}";
	}	else {
		$progression_studios_option_sticky_nav_font_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_color_hover') ) {
      $progression_studios_option_stickY_nav_font_hover_color = ".progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover,  .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover,  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a {
		color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color_hover') ) . ";
	}";
	}	else {
		$progression_studios_option_stickY_nav_font_hover_color = "";
	}
	


	
   if ( get_theme_mod( 'progression_studios_sticky_nav_highlight_font') ) {
      $progression_studios_option_sticky_hightlight_font_color = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.sfHover.highlight-button a, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a, .progression-sticky-scrolled .sf-menu li.highlight-button a, .progression-sticky-scrolled .sf-menu li.highlight-button a:hover { color:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_highlight_font') ). "; }";
	}	else {
		$progression_studios_option_sticky_hightlight_font_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_highlight_button') ) {
      $progression_studios_option_sticky_hightlight_bg_color = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, body  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.highlight-button a:before { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_highlight_button') ). "; }";
	}	else {
		$progression_studios_option_sticky_hightlight_bg_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_highlight_button_hover') ) {
      $progression_studios_option_sticky_hightlight_bg_color_hover = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before,  body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before,
	body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:hover:before, body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:hover:before, .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_highlight_button_hover') ). "; }";
	}	else {
		$progression_studios_option_sticky_hightlight_bg_color_hover = "";
	}

   if ( get_theme_mod( 'progression_studios_mobile_header_bg') ) {
      $progression_studios_mobile_header_bg_color = ".progression-studios-transparent-header header#masthead-pro, header#masthead-pro {background:". esc_attr( get_theme_mod('progression_studios_mobile_header_bg') ) . ";  }";
	}	else {
		$progression_studios_mobile_header_bg_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_mobile_header_logo_width') ) {
      $progression_studios_mobile_header_logo_width = "body #logo-pro img { width:" . esc_attr( get_theme_mod('progression_studios_mobile_header_logo_width') ). "px; } ";
	}	else {
		$progression_studios_mobile_header_logo_width = "";
	}
	
   if ( get_theme_mod( 'progression_studios_mobile_header_logo_margin') ) {
      $progression_studios_mobile_header_logo_margin_top = " body #logo-pro img { padding-top:". esc_attr( get_theme_mod('progression_studios_mobile_header_logo_margin') ). "px; padding-bottom:". esc_attr( get_theme_mod('progression_studios_mobile_header_logo_margin') ). "px; }";
	}	else {
		$progression_studios_mobile_header_logo_margin_top = "";
	}
	
   if ( get_theme_mod( 'progression_studios_header_border_bottom_color') ) {
      $progression_studios_main_header_border = "
		 header#masthead-pro:after { display:block; background:" . esc_attr( get_theme_mod('progression_studios_header_border_bottom_color') ) . ";
	}";
	}	else {
		$progression_studios_main_header_border = "";
	}
	
   if ( get_theme_mod( 'progression_studios_header_background_color', '#010012') ) {
      $progression_studios_header_bg_optional = "
		 body.progression-studios-header-sidebar-before #progression-inline-icons .progression-studios-social-icons, body.progression-studios-header-sidebar-before:before, header#masthead-pro, .progression-studios-transparent-header header#masthead-pro { background-color:" . esc_attr( get_theme_mod('progression_studios_header_background_color' , '#010012' ) ) . ";
	}";
	}	else {
		$progression_studios_header_bg_optional = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_header_border_color') ) {
      $progression_studios_sticky_header_border = "
		 .progression-sticky-scrolled  header#masthead-pro:after { display:block; background:" . esc_attr( get_theme_mod('progression_studios_sticky_header_border_color') ) . ";
	}";
	}	else {
		$progression_studios_sticky_header_border = ".progression-sticky-scrolled header#masthead-pro:after { opacity:0; }";
	}
	
   if ( get_theme_mod( 'progression_studios_mobile_header_nav_padding') ) {
      $progression_studios_mobile_header_nav_padding_top = "		#progression-shopping-cart-count span.progression-cart-count {top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding')  ) . "px;}
		.mobile-menu-icon-pro {padding-top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 3 ) . "px; padding-bottom:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 5 ) . "px; }
		#progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 6 ) . "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 6 ) . "px;
		}";
	}	else {
		$progression_studios_mobile_header_nav_padding_top = "";
	}
	

	
   if ( get_theme_mod( 'progression_studios_footer_main_bg_image') ) {
      $progression_studios_footer_bg_image = "background-image:url(" . esc_attr( get_theme_mod( 'progression_studios_footer_main_bg_image') ) . ");";
	}	else {
		$progression_studios_footer_bg_image = "";
	}
	
   if ( get_theme_mod( 'progression_studios_main_image_position', 'cover') == 'cover' ) {
      $progression_studios_main_image_position_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_main_image_position_cover = "background-repeat:repeat-all;";
	}
	
	
   if (  function_exists('z_taxonomy_image_url') && z_taxonomy_image_url() ) {
      $progression_studios_custom_tax_page_title_img = "body #page-title-pro {background-image:url('" . esc_url( z_taxonomy_image_url() ) . "'); }";
	}	else {
		$progression_studios_custom_tax_page_title_img = "";
	}
	
   if ( is_page() && get_post_meta($post->ID, 'progression_studios_header_image', true ) ) {
      $progression_studios_custom_page_title_img = "body #page-title-pro {background-image:url('" . esc_url( get_post_meta($post->ID, 'progression_studios_header_image', true)) . "'); }";
	}	else {
		$progression_studios_custom_page_title_img = "";
	}
   if ( class_exists('Woocommerce') ) {
		global $woocommerce;
		$your_shop_page = get_post( wc_get_page_id( 'shop' ) );
		if ( 
		
		is_shop() && $your_shop_page || is_singular( 'product') && $your_shop_page  || is_tax( 'product_cat') && $your_shop_page  || is_tax( 'product_tag') && $your_shop_page ) {
			
			if ( get_post_meta($your_shop_page->ID, 'progression_studios_header_image', true ) ) {
				$progression_studios_woo_page_title = "body #page-title-pro {background-image:url('" .  esc_url( get_post_meta($your_shop_page->ID, 'progression_studios_header_image', true) ). "'); }";
			} else {
		$progression_studios_woo_page_title = "";
		}
		} else {
		$progression_studios_woo_page_title = "";
	}
	}	else {
		$progression_studios_woo_page_title = "";
	}
   if ( get_option( 'page_for_posts' ) ) {
		$cover_page = get_page( get_option( 'page_for_posts' ));
		 if ( is_home() && get_post_meta($cover_page->ID, 'progression_studios_header_image', true) || is_singular( 'post') && get_post_meta($cover_page->ID, 'progression_studios_header_image', true)|| is_category( ) && get_post_meta($cover_page->ID, 'progression_studios_header_image', true) ) {
			$progression_studios_blog_header_img = "body #page-title-pro {background-image:url('" .  esc_url( get_post_meta($cover_page->ID, 'progression_studios_header_image', true) ). "'); }";
		} else {
		$progression_studios_blog_header_img = ""; }
	}	else {
		$progression_studios_blog_header_img = "";
	}
	
   if ( get_theme_mod( 'progression_studios_page_title_underline_color', '#23175c') ) {
      $progression_studios_page_title_optional_underline = "#page-title-pro {border-top:8px solid " . esc_attr( get_theme_mod('progression_studios_page_title_underline_color', '#23175c') )  . ";}";
	}	else {
		$progression_studios_page_title_optional_underline = "";
	}
   if ( get_theme_mod( 'progression_studios_header_icon_bg_color', 'rgba(255,255,255,  0.14)') ) {
      $progression_studios_top_header_icon_bg = "background:" . esc_attr( get_theme_mod('progression_studios_header_icon_bg_color', 'rgba(255,255,255,  0.14)') )  . ";";
	}	else {
		$progression_studios_top_header_icon_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_top_header_background') ) {
      $progression_studios_top_header_background_option = "background:" . esc_attr( get_theme_mod('progression_studios_top_header_background') )  . ";";
	}	else {
		$progression_studios_top_header_background_option = "";
	}
	
   if ( get_theme_mod( 'progression_studios_top_header_border_bottom', 'rgba(255,255,255,  0.12);') ) {
      $progression_studios_top_header_border_bottom_option = "#poker-dice-progression-header-top #poker-dice-header-top-border-bottom {border-bottom:1px solid " . esc_attr( get_theme_mod('progression_studios_top_header_border_bottom', 'rgba(255,255,255,  0.12);') )  . "};";
	}	else {
		$progression_studios_top_header_border_bottom_option = "";
	}

	
   if ( get_theme_mod( 'progression_studios_shop_post_rating', 'false') == 'false'  ) {
      $progression_studios_shop_rating_index = "ul.products li.product .progression-studios-shop-index-content .star-rating {display:none;}	";
	}	else {
		$progression_studios_shop_rating_index = "";
	}
	
 if ( get_theme_mod( 'progression_studios_site_boxed') == 'boxed-pro' ) {
	 $progression_studios_boxed_layout = "
	 	@media only screen and (min-width: 959px) {
		
		#boxed-layout-pro.progression-studios-preloader {margin-top:90px;}
		#boxed-layout-pro.progression-studios-preloader.progression-preloader-completed {animation-name: ProMoveUpPageLoaderBoxed; animation-delay:200ms;}
 	 	#boxed-layout-pro { margin-top:50px; margin-bottom:50px;}
	 	}
		#boxed-layout-pro #content-pro {
			overflow:hidden;
		}
	 	#boxed-layout-pro {
	 		position:relative;
	 		width:". esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px;
	 		margin-left:auto; margin-right:auto; 
	 		background-color:". esc_attr( get_theme_mod('progression_studios_boxed_background_color', '#ffffff') ) . ";
	 		box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.15);
	 	}
 	#boxed-layout-pro .width-container-pro { width:90%; }
 	
 	@media only screen and (min-width: 960px) and (max-width: ". esc_attr( get_theme_mod('progression_studios_site_width', '1200') + 100 ) . "px) {
		body #boxed-layout-pro{width:92%;}
	}
	
	";
 }	else {
		$progression_studios_boxed_layout = "";
	}
	
	$progression_studios_custom_css = "
	$progression_studios_custom_page_title_img
	$progression_studios_woo_page_title
	$progression_studios_custom_tax_page_title_img
	$progression_studios_blog_header_img
	body #logo-pro img {
		width:" .  esc_attr( get_theme_mod('progression_studios_theme_logo_width', '220') ) . "px;
		padding-top:" .  esc_attr( get_theme_mod('progression_studios_theme_logo_margin_top', '25') ) . "px;
		padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_theme_logo_margin_bottom', '25') ) . "px;
	}
	.woocommerce-shop-single .woocommerce-product-rating a.woocommerce-review-link:hover, #boxed-layout-pro #content-pro p.stars a, #boxed-layout-pro #content-pro p.stars a:hover, #boxed-layout-pro #content-pro .star-rating, #boxed-layout-pro ul.products li.product .star-rating, a, .progression-post-meta i {
		color:" .  esc_attr( get_theme_mod('progression_studios_default_link_color', '#ffffff') ) . ";
	}
	a:hover {
		color:" .  esc_attr( get_theme_mod('progression_studios_default_link_hover_color', '#ffc900') ). ";
	}
	#poker-dice-progression-header-top .sf-mega, header ul .sf-mega {margin-left:-" .  esc_attr( get_theme_mod('progression_studios_site_width', '1200') / 2 ) . "px; width:" .  esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px;}
	body .elementor-section.elementor-section-boxed > .elementor-container {max-width:" .  esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px;}
	.width-container-pro {  width:" .  esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px; }
	body.progression-studios-header-sidebar-before #progression-inline-icons .progression-studios-social-icons, body.progression-studios-header-sidebar-before:before, header#masthead-pro {
		$progression_studios_header_bg_image
		$progression_studios_header_bg_cover
	}
	$progression_studios_header_bg_optional
	$progression_studios_header_shadow_option
	$progression_studios_main_header_border
	$progression_studios_sticky_header_border
	body {
		background-color:" .   esc_attr( get_theme_mod('progression_studios_background_color', '#010015') ). ";
		$progression_studios_body_bg
		$progression_studios_body_bg_cover
	}
	#page-title-pro {
		background-color:" .   esc_attr( get_theme_mod('progression_studios_page_title_bg_color', '#2d2269') ). ";
		background-image:url(" .   esc_attr( get_theme_mod( 'progression_studios_page_title_bg_image',  get_template_directory_uri().'/images/page-title.jpg' ) ). ");
		padding-top:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_top', '100') ). "px;
		padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_page_title_padding_bottom', '100') ). "px;
		$progression_studios_page_tite_bg_cover
	}
	$progression_studios_page_tite_overlay_image_cover
	$progression_studios_page_title_optional_underline
	.sidebar h4.widget-title:after {background:" .   esc_attr( get_theme_mod('progression_studios_sidebar_heading_underline', 'rgba(255,255,255,  0.18)') ). ";}
	.sidebar ul ul, .sidebar ul li, .widget .widget_shopping_cart_content p.buttons { border-color:" .   esc_attr( get_theme_mod('progression_studios_sidebar_divider', 'rgba(255,255,255,  0.12)') ). "; }
	
	/* START BLOG STYLES */	
	#page-title-pro.page-title-pro-post-page {
		background-color: " . esc_attr( get_theme_mod('progression_studios_post_title_bg_color', '#000000') ) . ";
		$progression_studios_post_tite_bg_image
		$progression_studios_post_tite_bg_cover
	}
	.progression-blog-content {
		background-color: " . esc_attr( get_theme_mod('progression_studios_blog_post_background', 'rgba(255,255,255, 0.08)') ) . ";
	}
	
	$progression_studios_post_tite_overlay_image_cover
	.progression-studios-feaured-image {background:" . esc_attr( get_theme_mod('progression_studios_blog_image_bg') ) . ";}
	.progression-studios-default-blog-overlay:hover a img, .progression-studios-feaured-image:hover a img { opacity:" . esc_attr( get_theme_mod('progression_studios_blog_image_opacity', '1') ) . ";}
	h2.progression-blog-title a {color:" . esc_attr( get_theme_mod('progression_studios_blog_title_link', '#ffffff') ) . ";}
	h2.progression-blog-title a:hover {color:" . esc_attr( get_theme_mod('progression_studios_blog_title_link_hover', '#ffc900') ) . ";}
	/* END BLOG STYLES */
	
	/* START SHOP STYLES */
	.progression-studios-shop-index-content {
		background: " . esc_attr( get_theme_mod('progression_studios_shop_post_background', 'rgba(255,255,255, 0.08)') ) . ";
	}
	$progression_studios_shop_rating_index
	.widget_rating_filter ul li.wc-layered-nav-rating  a .star-rating, .woocommerce ul.product_list_widget li .star-rating, p.stars a, p.stars a:hover, .woocommerce-shop-single .star-rating, #boxed-layout-pro .woocommerce ul.products li.product .star-rating { color:" . esc_attr( get_theme_mod('progression_studios_shop_rating_color', '#ffffff') ) . "; }
	/* END SHOP STYLES */
	
	/* START BUTTON STYLES */
	$progression_studios_option_border_bottom
	$progression_studios_option_border_bottom_hover
	body .woocommerce .woocommerce-MyAccount-content  {
		border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#febd00') ) . ";
	}
	.flex-direction-nav a:hover, body .woocommerce nav.woocommerce-MyAccount-navigation li.is-active a {
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#febd00') ) . ";
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#694900') ) . ";
	}
	.widget.widget_price_filter form .price_slider_wrapper .price_slider .ui-slider-handle {
		border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#febd00') ) . ";
	}
	.widget.widget_price_filter form .price_slider_wrapper .price_slider .ui-slider-range {
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#febd00') ) . ";
	}
	.wp-block-button a.wp-block-button__link,
	body #widget-area-progression .progression-studios-social-icons-widget-container a.progression-button, .wpcf7-form input.wpcf7-submit, #respond input.submit,
	body #content-pro .woocommerce #payment input.button, #boxed-layout-pro .woocommerce-shop-single .summary button.button, #boxed-layout-pro .woocommerce-shop-single .summary a.button, .tagcloud a, #boxed-layout-pro .woocommerce .shop_table input.button, #boxed-layout-pro .form-submit input#submit, #boxed-layout-pro input.button, .tml-submit-wrap input.button-primary, .acf-form-submit input.button, .tml input#wp-submit, #boxed-layout-pro #customer_login input.button, #boxed-layout-pro .woocommerce-checkout-payment input.button, #boxed-layout-pro button.button, #boxed-layout-pro a.button, .infinite-nav-pro a, #newsletter-form-fields input.button, a.progression-studios-button, .post-password-form input[type=submit], #respond input#submit {
		font-size:" . esc_attr( get_theme_mod('progression_studios_button_font_size', '16') ) . "px;
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#febd00') ) . ";
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#694900') ) . ";
	}
	#woocomerce-tabs-container-progression-studios .woocommerce-tabs ul.wc-tabs li.active a {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#694900') ) . ";
	}
	#woocomerce-tabs-container-progression-studios .woocommerce-tabs ul.wc-tabs li.active,
	.progression-page-nav a:hover, .progression-page-nav span, #content-pro ul.page-numbers li a:hover, #content-pro ul.page-numbers li span.current {
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#febd00') ) . ";
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#694900') ) . ";
	}
	.progression-page-nav a:hover span {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#694900') ) . ";
	}
	#progression-checkout-basket a.cart-button-header-cart {
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#febd00') ) . " !important;
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#694900') ) . " !important;
	}
	#progression-checkout-basket a.cart-button-header-cart:hover {
		background:" . esc_attr( get_theme_mod('progression_studios_button_background_hover', '#be7900') ) . " !important;
		color:" . esc_attr( get_theme_mod('progression_studios_button_font_hover', '#ffffff') ) . " !important;
	}
	
	body #content-pro .woocommerce #payment input.button, #boxed-layout-pro .woocommerce-shop-single .summary button.button, #boxed-layout-pro .woocommerce-shop-single .summary a.button {
		font-size:" . esc_attr( get_theme_mod('progression_studios_button_font_size', '16') + 1 ) . "px;
	}
	#boxed-layout-pro .woocommerce-checkout-payment input.button, #boxed-layout-pro button.button { font-size:" . esc_attr( get_theme_mod('progression_studios_button_font_size', '16') - 1 ) . "px; }
	.wp-block-button a.wp-block-button__link:hover,
	body #widget-area-progression .progression-studios-social-icons-widget-container a.progression-button:hover, body #content-pro .woocommerce #payment input.button:hover, #boxed-layout-pro .woocommerce-shop-single .summary button.button:hover, #boxed-layout-pro .woocommerce-shop-single .summary a.button:hover, .wpcf7-form input.wpcf7-submit:hover, #respond input.submit:hover,
	.tagcloud a:hover, #boxed-layout-pro .woocommerce .shop_table input.button:hover, #boxed-layout-pro .form-submit input#submit:hover, #boxed-layout-pro input.button:hover, .tml-submit-wrap input.button-primary:hover, .acf-form-submit input.button:hover, .tml input#wp-submit:hover, #boxed-layout-pro #customer_login input.button:hover, #boxed-layout-pro .woocommerce-checkout-payment input.button:hover, #boxed-layout-pro button.button:hover, #boxed-layout-pro a.button:hover, .infinite-nav-pro a:hover, #newsletter-form-fields input.button:hover, a.progression-studios-button:hover, .post-password-form input[type=submit]:hover, #respond input#submit:hover {
		background:" . esc_attr( get_theme_mod('progression_studios_button_background_hover', '#be7900') ) . ";
		color:" . esc_attr( get_theme_mod('progression_studios_button_font_hover', '#ffffff') ) . ";
	}
	
	.progression-page-nav a span {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#694900') ) . ";
	}
	.woocommerce-shop-single .quantity input:focus,
	.woocommerce #respond p.comment-form-email input:focus, .woocommerce #respond p.comment-form-author input:focus, .woocommerce #respond p.comment-form-comment textarea:focus,  #no-results-pro .search-form input.search-field:focus, body #content-pro form.woocommerce-checkout textarea:focus, body #content-pro form.woocommerce-checkout input:focus, #respond p.comment-form-comment input:focus, #respond p.comment-form-comment textarea:focus, #panel-search-progression .search-form input.search-field:focus, form#mc-embedded-subscribe-form  .mc-field-group input:focus, body .acf-form .acf-field .acf-input textarea:focus, body .acf-form .acf-field .acf-input-wrap input:focus, .tml input:focus, .tml textarea:focus, .woocommerce input:focus, #content-pro .woocommerce table.shop_table .coupon input#coupon_code:focus, #content-pro .woocommerce table.shop_table input:focus, form.checkout.woocommerce-checkout textarea.input-text:focus, form.checkout.woocommerce-checkout input.input-text:focus, #newsletter-form-fields input:focus, .wpcf7-form select:focus, blockquote, .post-password-form input:focus, .search-form input.search-field:focus, #respond textarea:focus, #respond input:focus, .wpcf7-form input:focus, .wpcf7-form textarea:focus { border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#febd00') ) . ";  }
	/* END BUTTON STYLES */
	
	/* START Sticky Nav Styles */
	.progression-studios-transparent-header .progression-sticky-scrolled header#masthead-pro, .progression-sticky-scrolled header#masthead-pro, #progression-sticky-header.progression-sticky-scrolled { background-color:" .   esc_attr( get_theme_mod('progression_studios_sticky_header_background_color', 'rgba(9,4,29, 0.9)') ) ."; }
	body .progression-sticky-scrolled #logo-po img {
		$progression_studios_sticky_logo_width
		$progression_studios_sticky_logo_top
		$progression_studios_sticky_logo_bottom
	}
	$progression_studios_sticky_nav_padding
	$progression_studios_sticky_nav_option_font_color	
	$progression_studios_optional_sticky_nav_font_hover
	$progression_studios_nav_underline
	/* END Sticky Nav Styles */
	/* START Main Navigation Customizer Styles */
	#progression-shopping-cart-count a.progression-count-icon-nav, nav#site-navigation { letter-spacing: ". esc_attr( get_theme_mod('progression_studios_nav_letterspacing', '0.5') ). "px; }
	#progression-inline-icons .progression-studios-social-icons a {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '34') - 3 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '34') - 3 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '14') + 3 ). "px;
	}
	.mobile-menu-icon-pro {
		min-width:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '14') + 6 ). "px;
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '34') - 3 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '34') - 5 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '14') + 6 ). "px;
	}
	.mobile-menu-icon-pro span.progression-mobile-menu-text {
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '14') ). "px;
	}
	#progression-shopping-cart-count span.progression-cart-count {
		top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '34') - 1). "px;
	}
	#progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_cart_icon_main_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '34') - 6 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '34') - 6 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '14') + 12 ). "px;
	}
	#progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon:hover,
	.activated-class #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon { 
		color:" . esc_attr( get_theme_mod('progression_studios_nav_cart_icon_main_color', '#ffffff') ). ";
	}
	#progression-studios-header-search-icon i.pe-7s-search {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '34') - 5 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '34') - 5 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '14') + 10 ). "px;
	}
	.sf-menu a {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '34') ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '34') ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '14') ). "px;
		$progression_studios_optional_nav_bg
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a  {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
	}
	$progression_studios_nav_underline_default
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a:hover,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a:hover,
	.active-mobile-icon-pro .mobile-menu-icon-pro,
	.mobile-menu-icon-pro:hover,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	#progression-studios-header-search-icon:hover i.pe-7s-search, #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, #progression-inline-icons .progression-studios-social-icons a:hover, #progression-shopping-cart-count a.progression-count-icon-nav:hover, .sf-menu a:hover, .sf-menu li.sfHover a, .sf-menu li.current-menu-item a {
		color:". esc_attr( get_theme_mod('progression_studios_nav_font_color_hover', '#f6a800') ) . ";
	}
	#progression-checkout-basket, #panel-search-progression, .sf-menu ul {
		border-color:".  esc_attr( get_theme_mod('progression_studios_sub_nav_bg_border', '#febd00') ). ";
		background:".  esc_attr( get_theme_mod('progression_studios_sub_nav_bg', '#ffffff') ). ";
	}
	#main-nav-mobile { background:".  esc_attr( get_theme_mod('progression_studios_sub_nav_bg', '#ffffff') ). "; }
	ul.mobile-menu-pro li a { color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_font_color', '#888888') ) . "; }
	ul.mobile-menu-pro .sf-mega .sf-mega-section li a, ul.mobile-menu-pro .sf-mega .sf-mega-section, ul.mobile-menu-pro.collapsed li a {border-color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_border_color', '#ececec') ) . ";}
	
	.sf-menu li li a { 
		letter-spacing:".  esc_attr( get_theme_mod('progression_studios_sub_nav_letterspacing', '0') ). "px;
		font-size:".  esc_attr( get_theme_mod('progression_studios_sub_nav_font_size', '13') ). "px;
	}
	#progression-checkout-basket .progression-sub-total {
		font-size:".  esc_attr( get_theme_mod('progression_studios_sub_nav_font_size', '13' ) ). "px;
	}
	#panel-search-progression input, #progression-checkout-basket ul#progression-cart-small li.empty { 
		font-size:".  esc_attr( get_theme_mod('progression_studios_sub_nav_font_size', '13' ) ). "px;
	}
	.progression-sticky-scrolled #progression-checkout-basket, .progression-sticky-scrolled #progression-checkout-basket a, .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, #panel-search-progression .search-form input.search-field, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover.highlight-button li a, .sf-menu li.current-menu-item.highlight-button li a, .progression-sticky-scrolled #progression-checkout-basket a.cart-button-header-cart:hover, .progression-sticky-scrolled #progression-checkout-basket a.checkout-button-header-cart:hover, #progression-checkout-basket a.cart-button-header-cart:hover, #progression-checkout-basket a.checkout-button-header-cart:hover, #progression-checkout-basket, #progression-checkout-basket a, .sf-menu li.sfHover li a, .sf-menu li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a {
		color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_font_color', '#888888') ) . ";
	}
	.progression-sticky-scrolled .sf-menu li li a:hover,  .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression-sticky-scrolled .sf-menu li.current-menu-item li a, .sf-menu li.sfHover li a, .sf-menu li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a { 
		background:none;
	}
	.progression-sticky-scrolled #progression-checkout-basket a:hover, .progression-sticky-scrolled #progression-checkout-basket ul#progression-cart-small li h6, .progression-sticky-scrolled #progression-checkout-basket .progression-sub-total span.total-number-add, .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover.highlight-button li a:hover, .sf-menu li.current-menu-item.highlight-button li a:hover, #progression-checkout-basket a.cart-button-header-cart, #progression-checkout-basket a.checkout-button-header-cart, #progression-checkout-basket a:hover, #progression-checkout-basket ul#progression-cart-small li h6, #progression-checkout-basket .progression-sub-total span.total-number-add, .sf-menu li.sfHover li a:hover, .sf-menu li.sfHover li.sfHover a, .sf-menu li.sfHover li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a { 
		color:". esc_attr( get_theme_mod('progression_studios_sub_nav_hover_font_color', '#0f0f10') ) . ";
	}
	
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	#progression-shopping-cart-count span.progression-cart-count { 
		background:" . esc_attr( get_theme_mod('progression_studios_nav_cart_background', '#ffffff') ) . "; 
		color:" . esc_attr( get_theme_mod('progression_studios_nav_cart_color', '#0a0715') ) . ";
	}
	.progression-sticky-scrolled .sf-menu .progression-mini-banner-icon,
	.progression-mini-banner-icon {
		background:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_font_color', '#ffffff') ) . "; 
		color:#000000;
	}
	.progression-mini-banner-icon {
		top:" . esc_attr( (get_theme_mod('progression_studios_nav_padding', '34') - get_theme_mod('progression_studios_nav_font_size', '14')) - 4 ). "px;
		right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') / 2 ) . "px; 
	}
	.sf-menu ul {
		margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 2 ) . "px; 
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, .sf-menu li.sfHover.highlight-button a, .sf-menu li.current-menu-item.highlight-button a, .sf-menu li.highlight-button a, .sf-menu li.highlight-button a:hover {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_font_color', '#ffffff') ). "; 
	}
	.sf-menu li.highlight-button a:hover {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_hover_color', '#ffffff') ). "; 
	}
	#progression-checkout-basket ul#progression-cart-small li, #progression-checkout-basket .progression-sub-total, #panel-search-progression .search-form input.search-field, .sf-mega li:last-child li a, body header .sf-mega li:last-child li a, .sf-menu li li a, .sf-mega h2.mega-menu-heading, .sf-mega ul, body .sf-mega ul, #progression-checkout-basket .progression-sub-total, #progression-checkout-basket ul#progression-cart-small li { 
		border-color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_border_color', '#ececec') ) . ";
	}
	
	.sf-menu a:before {
		margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') ) . "px;
	}
	.sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
	   width: -moz-calc(100% - " . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') * 2 ). "px);
	   width: -webkit-calc(100% - ". esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') * 2 ) . "px);
	   width: calc(100% - " . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') * 2 ) . "px);
	}
	#progression-inline-icons .progression-studios-social-icons a {
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') -  7 ). "px;
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 7 ). "px;
	}
	#progression-studios-header-search-icon i.pe-7s-search {
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') ). "px;
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') ). "px;
	}
	#progression-inline-icons .progression-studios-social-icons {
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 7 ). "px;
	}
	.sf-menu a {
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') ). "px;
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') ). "px;
	}
	
	.sf-menu li.highlight-button { 
		margin-right:". esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 7 ) . "px;
		margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 7 ) . "px;
	}
	.sf-menu li:last-child .sf-with-ul,
	.sf-arrows .sf-with-ul {
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 15 ) . "px;
	}
	.sf-arrows .sf-with-ul:after { 
		right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 9 ) . "px;
	}
	
	.rtl .sf-arrows .sf-with-ul {
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') ) . "px;
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 15 ) . "px;
	}
	.rtl  .sf-arrows .sf-with-ul:after { 
		right:auto;
		left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 9 ) . "px;
	}
	
	@media only screen and (min-width: 960px) and (max-width: 1300px) {
		#post-secondary-page-title-pro, #page-title-pro {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_top', '100') - 10 ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_bottom', '100') - 10 ). "px;
		}	
		.sf-menu a:before {
			margin-left:". esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 4 ) . "px;
		}
		.sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
		   width: -moz-calc(100% - " . esc_attr( (get_theme_mod('progression_studios_nav_left_right', '22') * 2 ) - 6) . "px);
		   width: -webkit-calc(100% - " . esc_attr( (get_theme_mod('progression_studios_nav_left_right', '22') * 2 ) - 6) . "px);
		   width: calc(100% - " . esc_attr( (get_theme_mod('progression_studios_nav_left_right', '22') * 2 ) - 6) . "px);
		}
		.sf-menu a {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 4 ). "px;
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 4 ). "px;
		}
		.sf-menu li.highlight-button { 
			margin-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 12 ). "px;
			margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 12 ). "px;
		}
		.sf-arrows .sf-with-ul {
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 13 ). "px;
		}
		.sf-arrows .sf-with-ul:after { 
			right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 7 ). "px;
		}
		.rtl .sf-arrows .sf-with-ul {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22')  ). "px;
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 13 ). "px;
		}
		.rtl .sf-arrows .sf-with-ul:after { 
			right:auto;
			left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') + 7 ). "px;
		}
		#progression-inline-icons .progression-studios-social-icons a {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') -  12 ). "px;
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 12 ). "px;
		}
		#progression-studios-header-search-icon i.pe-7s-search {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 4). "px;
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 4). "px;
		}
		#progression-inline-icons .progression-studios-social-icons {
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '22') - 12 ). "px;
		}
	}
	
	$progression_studios_optiona_nav_bg_hover
	$progression_studios_optiona_sticky_nav_font_bg	
	$progression_studios_optiona_sticky_nav_hover_bg
	$progression_studios_option_sticky_nav_font_color	
	$progression_studios_option_stickY_nav_font_hover_color
	$progression_studios_option_sticky_hightlight_bg_color
	$progression_studios_option_sticky_hightlight_font_color
	$progression_studios_option_sticky_hightlight_bg_color_hover
	/* END Main Navigation Customizer Styles */
	/* START Top Header Top Styles */
	#poker-dice-progression-header-top {
		font-size:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '13') ) . "px;
		$progression_studios_top_header_off_on_display
	}
	#poker-dice-progression-header-top .sf-menu a {
		font-size:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '13') ) . "px;
	}
	.progression-studios-header-left .widget, .progression-studios-header-right .widget {
		padding-top:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '20') + 1 ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '20') ) . "px;
	}
	#poker-dice-progression-header-top .sf-menu a {
		padding-top:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '20') + 2 ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '20') + 2 ) . "px;
	}
	#poker-dice-progression-header-top  .progression-studios-social-icons a {
		font-size:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '13') ) . "px;
		min-width:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '13') + 1 ) . "px;
		margin:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '20') - 5 ) . "px 10px 0px 0px;
		$progression_studios_top_header_icon_bg
		color:" . esc_attr( get_theme_mod('progression_studios_header_icon_color', '#bbbbbb') ) . ";
	}
	#poker-dice-progression-header-top .progression-studios-social-icons a:hover {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_icon_hover_color', '#ffffff') ) . ";
		background:" . esc_attr( get_theme_mod('progression_studios_header_icon_bg_color_hover', 'rgba(255,255,255,  0.2)') ) . ";
	}
	#main-nav-mobile .progression-studios-social-icons a {
		background:" . esc_attr( get_theme_mod('progression_studios_header_icon_bg_color', 'rgba(255,255,255,  0.14)') ) . ";
		color:" . esc_attr( get_theme_mod('progression_studios_header_icon_color', '#bbbbbb') ) . ";
	}
	#poker-dice-progression-header-top a, #poker-dice-progression-header-top .sf-menu a, #poker-dice-progression-header-top {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_color', '#bfb3ff') ) . ";
	}
	#poker-dice-progression-header-top a:hover, #poker-dice-progression-header-top .sf-menu a:hover, #poker-dice-progression-header-top .sf-menu li.sfHover a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_hover_color', '#ffffff') ) . ";
	}

	#poker-dice-progression-header-top .sf-menu ul {
		background:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_bg', '#333333') ) . ";
	}
	#poker-dice-progression-header-top .sf-menu ul li a { 
		border-color:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_border_clr', '#444444') ) . ";
	}

	.progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li a, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li a, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, #poker-dice-progression-header-top .sf-menu li.sfHover li a, #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li a, #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_color', '#b4b4b4') ) . "; }
	.progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li a:hover, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, #poker-dice-progression-header-top .sf-menu li.sfHover li a:hover, #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover a, #poker-dice-progression-header-top .sf-menu li.sfHover li li a:hover, #poker-dice-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, #poker-dice-progression-header-top .sf-menu li.sfHover li li li a:hover, #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, #poker-dice-progression-header-top .sf-menu li.sfHover li li li li a:hover, #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, #poker-dice-progression-header-top .sf-menu li.sfHover li li li li li a:hover, #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, #poker-dice-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_hover_color', '#ffffff') ) . ";
	}
	#poker-dice-progression-header-top {
		$progression_studios_top_header_background_option
	}
	$progression_studios_top_header_border_bottom_option
	/* END Top Header Top Styles */
	/* START FOOTER STYLES */
	footer#site-footer h4.widget-title:after {background: " . esc_attr(get_theme_mod('progression_studios_footer_widget_heading_underline', 'rgba(255,255,255,  0.1)')) . ";}
	footer#site-footer {
		background: " . esc_attr(get_theme_mod('progression_studios_footer_background', '#2e216c')) . ";
		$progression_studios_footer_bg_image
		$progression_studios_main_image_position_cover
	}
	#pro-scroll-top:hover {   color: " . esc_attr(get_theme_mod('progression_studios_scroll_hvr_color', '#ffffff')) . ";    background: " . esc_attr(get_theme_mod('progression_studios_scroll_hvr_bg_color', '#febd00')) . ";  }
	footer#site-footer #progression-studios-copyright a {  color: " . esc_attr(get_theme_mod('progression_studios_copyright_link', '#dddddd')) . ";}
	footer#site-footer #progression-studios-copyright a:hover { color: " . esc_attr(get_theme_mod('progression_studios_copyright_link_hover', '#ffffff')) . "; }
	#progression-studios-copyright { 
		$progression_studios_copyright_optional_bg
	}
	$progression_studios_footer_optional_border_top
	$progression_studios_copyright_optional_divider
	#pro-scroll-top { $progression_studios_scroll_top_disable color:" . esc_attr(get_theme_mod('progression_studios_scroll_color', '#ffffff')) . ";  background: " . esc_attr(get_theme_mod('progression_studios_scroll_bg_color', 'rgba(255,255,255,  0.15);')) . ";  }
	#progression-studios-lower-widget-container .widget, #widget-area-progression .widget { padding:" . esc_attr(get_theme_mod('progression_studios_widgets_margin_top', '80')) . "px 0px " . esc_attr(get_theme_mod('progression_studios_widgets_margin_bottom', '65')) . "px 0px; }
	#copyright-text { padding:" . esc_attr(get_theme_mod('progression_studios_copyright_margin_top', '28')) . "px 0px " . esc_attr(get_theme_mod('progression_studios_copyright_margin_bottom', '28')) . "px 0px; }
	footer#site-footer .progression-studios-social-icons {
		padding-top:" . esc_attr(get_theme_mod('progression_studios_footer_margin_top', '0')) . "px;
		padding-bottom:" . esc_attr(get_theme_mod('progression_studios_footer_margin_bottom', '0')) . "px;
	}
	footer#site-footer ul.progression-studios-social-widget li a , footer#site-footer #progression-studios-copyright .progression-studios-social-icons a, footer#site-footer .progression-studios-social-icons a {
		color:" . esc_attr(get_theme_mod('progression_studios_footer_icon_color', '#ffffff')) . ";
	}
	.sidebar ul.progression-studios-social-widget li a, footer#site-footer ul.progression-studios-social-widget li a, footer#site-footer .progression-studios-social-icons a {
		background:" . esc_attr(get_theme_mod('progression_studios_footer_icon_border_color', 'rgba(255,255,255,  0.06)')) . ";
	}
	footer#site-footer ul.progression-studios-social-widget li a:hover, footer#site-footer #progression-studios-copyright .progression-studios-social-icons a:hover, footer#site-footer .progression-studios-social-icons a:hover {
		color:" . esc_attr(get_theme_mod('progression_studios_footer_hover_icon_color', '#ffffff')) . ";
	}
	.sidebar ul.progression-studios-social-widget li a:hover, footer#site-footer ul.progression-studios-social-widget li a:hover, footer#site-footer .progression-studios-social-icons a:hover {
		background:" . esc_attr(get_theme_mod('progression_studios_footer_hover_background_icon_color', 'rgba(255,255,255,  0.12)')) . ";
	}
	footer#site-footer .progression-studios-social-icons li a {
		margin-right:" . esc_attr(get_theme_mod('progression_studios_footer_margin_sides', '5')) . "px;
		margin-left:" . esc_attr(get_theme_mod('progression_studios_footer_margin_sides', '5')) . "px;
	}
	footer#site-footer .progression-studios-social-icons a, footer#site-footer #progression-studios-copyright .progression-studios-social-icons a {
		font-size:" . esc_attr(get_theme_mod('progression_studios_footer_icon_size', '17')) . "px;
	}
	#progression-studios-footer-logo { max-width:" . esc_attr( get_theme_mod('progression_studios_footer_logo_width', '250') ) . "px; padding-top:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_top', '45') ) . "px; padding-bottom:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_bottom', '0') ) . "px; padding-right:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_right', '0') ) . "px; padding-left:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_left', '0') ) . "px; }
	/* END FOOTER STYLES */
	@media only screen and (max-width: 959px) { 
		
		
		#post-secondary-page-title-pro, #page-title-pro {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_top', '100') - 20 ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_bottom', '100') - 20 ). "px;
		}
		.progression-studios-transparent-header header#masthead-pro {
			$progression_studios_header_bg_image
			$progression_studios_header_bg_cover
		}
		$progression_studios_header_bg_optional
		$progression_studios_mobile_header_bg_color
		$progression_studios_mobile_header_logo_width
		$progression_studios_mobile_header_logo_margin_top
		$progression_studios_mobile_header_nav_padding_top
	}
	@media only screen and (max-width: 959px) {
		#progression-studios-lower-widget-container .widget, #widget-area-progression .widget { padding:" . esc_attr(get_theme_mod('progression_studios_widgets_margin_top', '80') - 10 ) . "px 0px " . esc_attr(get_theme_mod('progression_studios_widgets_margin_bottom', '65') - 10 ) . "px 0px; }
	}
	@media only screen and (min-width: 960px) and (max-width: ". esc_attr( get_theme_mod('progression_studios_site_width', '1200') + 100 ) . "px) {
		.width-container-pro {
			width:94%; 
			position:relative;
			padding:0px;
		}

		
		.progression-studios-header-full-width-no-gap #poker-dice-progression-header-top .width-container-pro,
		footer#site-footer.progression-studios-footer-full-width .width-container-pro,
		.progression-studios-page-title-full-width #page-title-pro .width-container-pro,
		.progression-studios-header-full-width #poker-dice-progression-header-top .width-container-pro,
		.progression-studios-header-full-width header#masthead-pro .width-container-pro {
			width:94%; 
			position:relative;
			padding:0px;
		}
		.progression-studios-header-full-width-no-gap.progression-studios-header-cart-width-adjustment header#masthead-pro .width-container-pro,
		.progression-studios-header-full-width.progression-studios-header-cart-width-adjustment header#masthead-pro .width-container-pro {
			width:98%;
			margin-left:2%;
			padding-right:0;
		}
		#progression-shopping-cart-toggle.activated-class a i.shopping-cart-header-icon,
		#progression-shopping-cart-count i.shopping-cart-header-icon {
			padding-left:24px;
			padding-right:24px;
		}
		#progression-shopping-cart-count span.progression-cart-count {
			right:14px;
		}
		#poker-dice-progression-header-top ul .sf-mega,
		header ul .sf-mega {
			margin-right:2%;
			width:98%; 
			left:0px;
			margin-left:auto;
		}
	}
	.progression-studios-spinner { border-left-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')). ";  border-right-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')). "; border-bottom-color: " . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')). ";  border-top-color: " . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')). "; }
	.sk-folding-cube .sk-cube:before, .sk-circle .sk-child:before, .sk-rotating-plane, .sk-double-bounce .sk-child, .sk-wave .sk-rect, .sk-wandering-cubes .sk-cube, .sk-spinner-pulse, .sk-chasing-dots .sk-child, .sk-three-bounce .sk-child, .sk-fading-circle .sk-circle:before, .sk-cube-grid .sk-cube{ 
		background-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')). ";
	}
	#page-loader-pro {
		background:" . esc_attr(get_theme_mod('progression_studios_page_loader_bg', '#ffffff')). ";
		color:" . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')). "; 
	}
	$progression_studios_boxed_layout
	::-moz-selection {color:" . esc_attr( get_theme_mod('progression_studios_select_color', '#ffffff') ) . ";background:" . esc_attr( get_theme_mod('progression_studios_select_bg', '#fcb501') ) . ";}
	::selection {color:" . esc_attr( get_theme_mod('progression_studios_select_color', '#ffffff') ) . ";background:" . esc_attr( get_theme_mod('progression_studios_select_bg', '#fcb501') ) . ";}
	";
        wp_add_inline_style( 'progression-studios-custom-style', $progression_studios_custom_css );
}
add_action( 'wp_enqueue_scripts', 'progression_studios_customizer_styles' );