<?php
/**
 *
 * @since      1.0.0
 * @author     Urij Horuzij <urijhoruzij@gmail.com>
 * @copyright  Copyright (c) 2019, BigArtWP
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @package bigartwp-customify
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

define( 'PRESETS_VERSION', '1.0.0' );

/**
 * Presets customize control.
 *
 * @access public
 */
class Customizer_Presets_Control extends WP_Customize_Control {
	/**
	 * The type of customize control being rendered.
	 *
	 * @var   string
	 */
	public $type = 'presets';

	public function __construct( $manager, $id, $args = array() ) {

		parent::__construct( $manager, $id, $args );

		$this->presets = $args['presets'];		
	}
	/**
	 * The type refresh being used.
	 *
	 * @var   string
	 */
	public $transport = 'postMessage';

	/**
	 * The priority of the control.
	 *
	 * @var   string
	 */
	public $priority = -10;

	/**
	 * The tabs with keys of the controls that are under each tab.
	 *
	 * @var array
	 */
	public $presets;

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.1.40
	 * @access public
	 * @return array
	 */
	public function to_json()
    {
        parent::to_json();
        $this->json['presetsdata'] = $this->presets;
    }

	/**
	 * Displays the control content.
	 *
	 * @access public
	 * @return void
	 */
	public function render_content() {
		if ( empty( $this->presets )) {
			return;
		}
		if ( ! empty( $this->label ) ) { ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <?php }
        if ( ! empty( $this->description ) ) { ?>
            <span class="description customize-control-description"><?php echo $this->description; ?></span>
        <?php } ?>
       	<div class="presets">
            <?php
            foreach ( $this->presets as $value => $args ) { ?>
            	<span class="customize-inside-control-row" style="background-image: url(<?php echo esc_html($args['bg-image']) ?>);">
            		<input class="preset" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( "_customize-presets-{$this->id}" ); ?>" id="<?php echo esc_attr( "{$this->id}-{$value}" ); ?>" <?php $this->link(); ?> <?php checked( $this->value(), $value ); ?> />          
		           	<label for="<?php echo esc_attr("{$this->id}-{$value}")?>">
						<span class="label__inner" style="color:#333;background:#fff;">
							<?php 
							$names_color = array_keys($args['colors']);
							$bg_color = $args['colors'][$names_color[0]];
							?>
						    <i class="preview__letter" style="background:<?php echo $bg_color; ?>"><?php echo esc_html($args['sample_letter'])?></i>
						    <i class="preview__letter--checked" style="background-color:<?php echo $bg_color;?>; background-image: url(<?php echo plugin_dir_url(__FILE__).'img/check.svg';?>);"></i>
						    <?php echo esc_html($value)?>
						</span>
					</label>
	                <div class="palette">
	        			<?php
	        			foreach ($args['colors'] as $option => $color ) {?>
	        				<div class="palette__item" style="background:<?php echo esc_attr($color)?>"></div>
	        			<?php 
	        			} ?>
	    			</div>
	    		</span>                     
            <?php } ?>
        </div>
		<?php 
	}
	/**
	 * Loads the scripts and hooks our custom styles in.
	 *
	 * @since  1.1.45
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'presets-control-script', plugin_dir_url(__FILE__) . 'js/script.js', array( 'jquery' ), PRESETS_VERSION, true );
		wp_enqueue_style( 'presets-control-style', plugin_dir_url(__FILE__) . 'css/style.css', null, PRESETS_VERSION );
	}
}

