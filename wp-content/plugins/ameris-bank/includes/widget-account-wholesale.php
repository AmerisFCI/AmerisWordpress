<?php
/**
 * Widget to display the account login form for only Wholesale account types.
 */
class Ameris_Account_Wholesale_Widget extends WP_Widget {

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
			'title'      => '',
			'text_below' => ''
		);

		parent::__construct(
			'ameris_account_wholesale_widget',
			'Ameris Wholesale Account Access',
			array( 'description' => 'The wholesale account access form widget.' )
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

		global $account_access_args;
		$account_access_args = $instance;

		$account_access_args['wholesale'] = true;

		echo $args['before_widget'];
		get_template_part( 'template-parts/account-access' );
		echo $args['after_widget'];
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
			if ( $key === 'title' ) $label = 'Title';
			if ( $key === 'text_below' ) $label = 'Text Below Form'; ?>
			<p>
				<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $label; ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( $key ); ?>" name="<?php echo $this->get_field_name( $key ); ?>" type="text" value="<?php echo esc_attr( stripslashes( $value ) ); ?>">
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
			if ( $key === 'text_below' )
				$instance[$key] = wp_filter_post_kses( $value );
			else
				$instance[$key] = sanitize_text_field( $value );
		}

		return $instance;
	}

}