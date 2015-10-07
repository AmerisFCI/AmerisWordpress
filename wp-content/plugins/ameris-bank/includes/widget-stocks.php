<?php

/**
 * Widget to display the latest tweets, minimal markup.
 */
class Ameris_Widget extends WP_Widget {

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
			'subhead'   => '',
			'headline'  => '',
			'blurb'     => '',
			'page'      => 0,
			'link_text' => ''
		);
		parent::__construct(
			'fred_history_widget',
			'Our First 75 Years',
			array( 'description' => 'The "First 75 Years" widget designed to display above the footer of most pages.' )
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

		echo $args['before_widget'];
		?>
		<div class="diamond history-diamond">
			<h4><?php echo esc_html( $instance['subhead'] ); ?></h4>
			<h2><?php echo esc_html( $instance['headline'] ); ?></h2>
			<p><?php echo esc_html( $instance['blurb'] ); ?></p>
			<a class="button" href="<?php echo get_permalink( (int) $instance['page'] ); ?>">
				<?php echo esc_html( $instance['link_text'] ); ?>
			</a>
		</div>
		<?php
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

		foreach( $instance as $key => $value ) {
			$label = ucwords( str_replace( '_', ' ', $key ) );
			?><p>
				<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $label; ?>:</label>
				<?php switch( $key ) {
					// textarea field
					case 'blurb' :
						?>
						<textarea class="widefat" id="<?php echo $this->get_field_id( $key ); ?>" name="<?php echo $this->get_field_name( $key ); ?>" rows="6"><?php echo esc_attr( $value ); ?></textarea>
						<?php
						break;
					// page dropdown field
					case 'page' :
						wp_dropdown_pages( array(
							'selected' => $value,
							'name'     => $this->get_field_name( $key ),
							'id'       => $this->get_field_id( $key ),
							'class'    => 'widefat'
						) );
						break;
					// text field
					default:
						?>
						<input class="widefat" id="<?php echo $this->get_field_id( $key ); ?>" name="<?php echo $this->get_field_name( $key ); ?>" type="text" value="<?php echo esc_attr( $value ); ?>">
						<?php
						break;
				} ?>
			</p><?php
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

		foreach( $instance as $key => $value ) {
			switch( $key ) {
				case 'page' :
					$instance[$key] = (int) $value;
					break;
				default:
					$instance[$key] = sanitize_text_field( $value );
					break;
			}
		}

		return $instance;
	}

}