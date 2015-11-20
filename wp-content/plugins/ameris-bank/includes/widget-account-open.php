<?php
/**
 * Widget to display the red callout box (inititally used specifically
 * for the Open an Account widget).
 */
class Ameris_Account_Open_Widget extends WP_Widget {

	/**
	 * Default field values.
	 * @var array
	 */
	var $defaults;

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		$this->defaults = array(
			'title'     => '',
			'blurb'     => '',
			'link'      => '',
			'link_text' => ''
		);

		parent::__construct(
			'ameris_account_open_widget',
			'Ameris Red Callout Box',
			array( 'description' => 'Provide a brief description and link.' )
		);

	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		$instance = array_intersect_key( $instance, $this->defaults );

		echo $args['before_widget']; ?>

		<div class="account-open">
			<h2 class="account-open__title"><?php echo $instance['title']; ?></h2>
			<p class="account-open__blurb"><?php echo $instance['blurb']; ?></p>
			<a class="account-open__button button" href="<?php echo $instance['link']; ?>"><?php echo $instance['link_text']; ?></a>
		</div>
		
		<?php echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		$instance = array_intersect_key( $instance, $this->defaults );

		foreach( $instance as $key => $value ) {
			$label = ucwords( str_replace( '_', ' ', $key ) ); ?>
			<p>
				<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $label; ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( $key ); ?>" name="<?php echo $this->get_field_name( $key ); ?>" type="text" value="<?php echo esc_attr( $value ); ?>">
			</p>

		<?php }
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = wp_parse_args( $new_instance, $this->defaults );
		$instance = array_intersect_key( $instance, $this->defaults );
		
		foreach( $instance as $key => $value ) {
			if ( $key === 'link' )
				$instance[$key] = esc_url_raw( $value );
			else
				$instance[$key] = sanitize_text_field( $value );
		}

		return $instance;
	}

}