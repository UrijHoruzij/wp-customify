<?php
/**
 *
 * @author     Urij Horuzij <urijhoruzij@gmail.com>
 * @copyright  Copyright (c) 2019, BigArtWP
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @package bigartwp-customify
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Radio customize control.
 *
 * @since  1.1.24
 * @access public
 */
class Customize_Radio_Control extends WP_Customize_Control {
	/**
	 * The type of customize control being rendered.
	 *
	 * @since 1.1.24
	 * @var   string
	 */
	public $type = 'radio-custom';
	/**
	 * Displays the control content.
	 *
	 * @since  1.1.24
	 * @access public
	 * @return void
	 */
	public function render_content() {
		/* If no choices are provided, bail. */
		if ( empty( $this->choices ) ) {
			return;
		} ?>

		<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>
		<?php foreach ( $this->choices as $value => $name ) : ?>
			<label class="radio">
		        <input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( "_customize-radio-{$this->id}" ); ?>" id="<?php echo esc_attr( "{$this->id}-{$value}" ); ?>" <?php $this->link(); ?> <?php checked( $this->value(), $value ); ?> />
		        <?php if ( ! empty( $name ) ) { ?>
            		<span><?php echo $name; ?></span>
        		<?php } ?> 
		    </label>
		<?php endforeach; ?>
	<?php
	}
	/**
	 * Enqueue control related styles.
	 *
	 * @since  1.1.24
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_style( 'radio-control-style', plugin_dir_url(__FILE__) . 'css/style.css', null, '1.0.0' );
	}
}
