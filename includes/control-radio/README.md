# Customizer radio

### What is Customizer radio ?

Customizer radio is a nicer way to display a radio control in customizer

### How to use? (backend-part)

Here's an example of how to add this control, add the following code in your theme's customizer.php:

    function xxx_customize_register( $wp_customize ) {
        if ( class_exists( 'Customize_Radio_Control' ) ) {
            $wp_customize->add_setting(
                'top_bar_alignment', array(
                    'default' => 'right',
                )
            );
            
            $wp_customize->add_control(
                new Customize_Radio_Control(
                    $wp_customize, 'top_bar_alignment', array(
                        'label' => esc_html__( 'Layout', 'your-textdomain' ),
                        'priority' => 99,
                        'section' => 'colors',
                        'choices' => array(
                            'on' => esc_html__( 'On', 'bigartwp-customify' ),
                            'off' => esc_html__( 'Off', 'bigartwp-customify' )
                        ),
                    )
                )
            );
        }
    }
    add_action( 'customize_register', 'xxx_customize_register' );

### How to use? (frontend-part)

To get the input from your control just call it in the normal way:

    $customizer_page_editor = get_theme_mod('top_bar_alignment');
    if( $customizer_page_editor === 'on' ){
        // Do something
    }
    if( $customizer_page_editor === 'off' ){
        // Do something
    }

### Contribute

You can make this better by contributing. If you find a bug or simply want to contribute to this collection, submit your pull request and we'll have a look on it.  

How can you help?
- Submit a bug
- Fix reported bugs
- Share with us another cool control

