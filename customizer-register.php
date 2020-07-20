<?php
/**
 * Add controls Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function customize_register_controls( $wp_customize ) {
	/*
	* Header
	*/
	$wp_customize->add_section('sidebar', array(
        'title'    => __('Sidebar', 'bigartwp-customify'),
        'priority' => 80,
    ));
    if (class_exists( 'Customize_Radio_Control' )){
		$wp_customize->add_setting(
		    'sidebar', array(
		    	'type' => 'option',
		    	'default'           => 'sidebar-right',
		        'sanitize_callback' => 'sanitize_text_field',
		    )
		);		
		$wp_customize->add_control(
		    new Customize_Radio_Control(
		        $wp_customize, 'sidebar', array(
		        	'label'             => esc_html__( 'Sidebar', 'bigartwp-customify' ),
		            'section' => 'sidebar',
		            'default' => 'sidebar-right',
		            'choices' => array(
		            	'sidebar-none' => esc_html__( 'Sidebar none', 'bigartwp-customify' ),
		            	'sidebar-right' => esc_html__( 'Sidebar right', 'bigartwp-customify' ),
		            	'sidebar-left' => esc_html__( 'Sidebar left', 'bigartwp-customify' ),
		            ),
		        )
		    )
		);
	}
	/*
	*	Fonts
	*/
	$wp_customize->add_section('fonts', array(
        'title'    => __('Fonts', 'bigartwp-customify'),
        'priority' => 50,
    ));
	if (class_exists( 'Font_Selector' )){
	    $wp_customize->add_setting(
	        'headings_font', array(
	            'type'              => 'theme_mod',
	            'sanitize_callback' => 'sanitize_text_field',
	        )
	    );
	    $wp_customize->add_setting(
	        'body_font', array(
	            'type'              => 'theme_mod',
	            'sanitize_callback' => 'sanitize_text_field',
	        )
	    );
	    $wp_customize->add_control(
	        new Font_Selector(
	            $wp_customize, 'headings_font', array(
	                'label'             => __( 'Headings', 'bigartwp-customify' ),
	                'section'           => 'fonts',
	                'priority'          => 1,
	                'default'           => 'PT Sans',
	                'type'              => 'select',
	            )
	        )
	    );
	    $wp_customize->add_control(
	        new Font_Selector(
	            $wp_customize, 'body_font', array(
	                'label'             => __( 'Body', 'bigartwp-customify' ),
	                'section'           => 'fonts',
	                'priority'          => 2,
	                'default'           => 'PT Serif',
	                'type'              => 'select',
	            )
	        )
	    );
	}

	/*
	* Colors
	*/
    $wp_customize->add_setting( 'color1' , array(
	    'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_setting( 'color2' , array(
	    'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_setting( 'color3' , array(
	   	'transport'   => 'postMessage',
	   	'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_setting( 'color4' , array(
	    'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_setting( 'color5' , array(
	    'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'color_1', array(
    'label'    => __('Color 1', 'bigartwp-customify'),
    'section'  => 'colors',
    'transport'=> 'postMessage',
    'settings' => 'color1',
    )));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'color_2', array(
    'label'    => __('Color 2', 'bigartwp-customify'),
    'section'  => 'colors',
    'transport'=> 'postMessage',
    'settings' => 'color2',
    )));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'color_3', array(
    'label'    => __('Color 3', 'bigartwp-customify'),
    'section'  => 'colors',
    'transport'=> 'postMessage',
    'settings' => 'color3',
    )));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'color_4', array(
    'label'    => __('Color 4', 'bigartwp-customify'),
    'section'  => 'colors',
    'transport'=> 'postMessage',
    'settings' => 'color4',
    )));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'color_5', array(
    'label'    => __('Color 5', 'bigartwp-customify'),
    'section'  => 'colors',
    'transport'=> 'postMessage',
    'settings' => 'color5',
    )));

    /*
    * Style Presets
    */
	$wp_customize->add_section('style_presets', array(
        'title'    => esc_html__('Style Presets', 'bigartwp-customify'),
        'priority' => 30,
    ));

	if (class_exists( 'Customizer_Presets_Control' )){
		$wp_customize->add_setting(
		    'presets', array(
		    	'default' => esc_html__('France','bigartwp-customify'),
		    	'transport' => 'postMessage',
		        'sanitize_callback' => 'sanitize_text_field',
		    )
		);

		$wp_customize->add_control(
		    new Customizer_Presets_Control(
		        $wp_customize, 'presets', array(
		            'section' => 'style_presets',
		            'presets'    => array(
		            	__('Tart','bigartwp-customify') => array(
		                    'sample_letter' => 'P',
		                    'bg-image' => plugin_dir_url(__FILE__).'includes/control-presets/img/Tart.jpg',
		                    'colors' => array(
		                    	'color1'=>'#211e24',
		                    	'color2'=>'#2e2a32',
		                    	'color3'=>'#5a5a70',
		                    	'color4'=>'#fcfcfd',
		                    	'color5'=>'#ebecf0'
		                    ),//Photo by Rebeca G. Sendroiu on Unsplash
		                ),
		            	__('Sweet','bigartwp-customify') => array(
		                    'sample_letter' => 'S',
		                    'bg-image' => plugin_dir_url(__FILE__).'includes/control-presets/img/Sweet.jpg',
		                    'colors' => array(
		                    	'color1'=>'#332728',
		                    	'color2'=>'#6d5456',
		                    	'color3'=>'#792c20',
		                    	'color4'=>'#f7f2ee',
		                    	'color5'=>'#f5f0ea'
		                    ),//Photo by Uliana Kopanytsia on Unsplash
		                ),
		            	__('Sour','bigartwp-customify') => array(
		                    'sample_letter' => 'S',
		                    'bg-image' => plugin_dir_url(__FILE__).'includes/control-presets/img/Sour.jpg',
		                    'colors' => array(
		                    	'color1'=>'#1a1d16',
		                    	'color2'=>'#3b4133',
		                    	'color3'=>'#ddaa3c',
		                    	'color4'=>'#f4f5fb',
		                    	'color5'=>'#e8ebf6'
		                    ),//Photo by Morton Xiong on Unsplash
		                ),
		            	__('Spicy','bigartwp-customify') => array(
		                    'sample_letter' => 'S',
		                    'bg-image' => plugin_dir_url(__FILE__).'includes/control-presets/img/Spicy.jpg',
		                    'colors' => array(
		                    	'color1'=>'#312e2e',
		                    	'color2'=>'#5c5757',
		                    	'color3'=>'#c9542e',
		                    	'color4'=>'#ececef',
		                    	'color5'=>'#d6d7dc'
		                    ),//Photo by Uliana Kopanytsia on Unsplash
		                ),
		           		__('Sweet & Sour','bigartwp-customify') => array(
		                    'sample_letter' => 'S',
		                    'bg-image' => plugin_dir_url(__FILE__).'includes/control-presets/img/Sweet&Sour.jpg',
		                    'colors' => array(
		                    	'color1'=>'#282e24',
		                    	'color2'=>'#5a6751',
		                    	'color3'=>'#a5b453',
		                    	'color4'=>'#f5f1f0',
		                    	'color5'=>'#ebe3e0'
		                    ),//Photo by Alina Karpenko on Unsplash
		                ),
		            ),
		        )
		    )
		);
	}
}
add_action( 'customize_register', 'customize_register_controls' );
