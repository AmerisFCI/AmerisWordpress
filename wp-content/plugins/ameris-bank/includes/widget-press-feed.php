<?php
/**
 * Widget to display recent posts.
 */
class Ameris_Press_Feed_Widget extends WP_Widget {

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
			'amount'     => 3
		);

		parent::__construct(
			'ameris_press_feed_widget',
			'Ameris Press Feed',
			array( 'description' => 'RSS feed of SNL press releases.' )
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

		echo $args['before_widget'];
		
		if ( $instance['title'] ) {
			echo $args['before_title'];
			echo apply_filters( 'widget_title', $instance['title'] );
			echo $args['after_title'];
		}

		get_template_part( 'template-parts/press-feed' );

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

		// title, amount, thumbnails, category
		// text,  num,    checkbox,   dropdown

		foreach( $instance as $key => $value ) {
			?><p><?php

			switch( $key ) {
				case 'title' : ?>
					<label for="<?php echo $this->get_field_id( $key ); ?>">Title</label>
					<input class="widefat" id="<?php echo $this->get_field_id( $key ); ?>" name="<?php echo $this->get_field_name( $key ); ?>" type="text" value="<?php echo esc_attr( $value ); ?>">
					<?php break;

				case 'amount' : ?>
					<label for="<?php echo $this->get_field_id( $key ); ?>">Amount</label>
					<input class="widefat" id="<?php echo $this->get_field_id( $key ); ?>" name="<?php echo $this->get_field_name( $key ); ?>" type="number" max="20" value="<?php echo esc_attr( $value ); ?>">
					<?php break;
			}

			?></p><?php
		}
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
			switch( $key ) {
				case 'title' :
					$instance[$key] = sanitize_text_field( $value );
					break;
				case 'amount' :
					$instance[$key] = (int) $value;
					break;
			}
		}

		return $instance;
	}

}