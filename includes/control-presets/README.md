# Customizer Presets
    
### How to use

Add the following function to your `customizer.php` or `functions.php` file. 

    function tabs_register( $wp_customize ) {
        $wp_customize->add_setting(
            'my_tabs', array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        
        $wp_customize->add_control(
            new Customizer_Presets_Control(
                $wp_customize, 'my_presets', array(
                    /* Make sure you edit the following parameters*/
                    'section' => 'my_section',
                    'presets'    => array(
                        'Love' => array(
                            'sample_letter' => 'A',
                            'bg-image' => plugin_dir_url(__FILE__).'includes/control-presets/img/love.jpg',
                            'colors' => array(
                                'color1'=>'#d2c8c7',
                                'color2'=>'#262c22',
                                'color3'=>'#784141',
                                'color4'=>'#536940',
                                'color5'=>'#cc663c'
                            ), 
                        ),
                        'Food' => array(
                            'sample_letter' => 'B',
                            'bg-image' => plugin_dir_url(__FILE__).'includes/control-presets/img/food.jpg',
                            'colors' => array(
                                'color1'=>'#15171b',
                                'color2'=>'#2b2b30',
                                'color3'=>'#525962',
                                'color4'=>'#e7c19e',
                                'color5'=>'#aa652f',
                            ),
                        ), 
                    ),
                )
            )
        );
    }
    add_action( 'customize_register', 'tabs_register' );
    
- `nicename` parameter is the text that appears on tab.
- `icon` parameter is the FontAwesome class without the `fa-` prefix  
    Note: In order to show the icon, make sure you enqueue FontAwesome in customizer.
- `controls` parameter is an array with all the controls ids that you want to show in that area.