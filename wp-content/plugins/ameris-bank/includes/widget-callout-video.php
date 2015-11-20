<?php
/**
 * Widget to display a callout to a specific video.
 */
class Ameris_Video_Callout_Widget extends WP_Widget {

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
			'video'     => 0,
			'image'     => '',
			'title'     => ''
		);

		parent::__construct(
			'ameris_video_callout_widget',
			'Ameris Video Callout',
			array( 'description' => 'Callout box for a specific video.' )
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

		$date = '';
		if ( $instance['video'] ) {

			// get video title if there's no label
			if ( !$instance['title'] )
				$instance['title'] = get_the_title( (int) $instance['video'] );

			// get featured image if there's no image
			if ( !$instance['image'] )
				$image = get_the_post_thumbnail( $instance['video'], 'callout-video' );
			else
				$image = '<img src="' . esc_url( $instance['image'] ) . '" alt="' . esc_attr( $instance['title'] ) . '" />';

			// get video datetime
			$date = get_the_date( 'm.d.Y | h:i a', (int) $instance['video'] );

		}

		echo $args['before_widget']; ?>

		<div class="video-callout">
			<div class="video-callout__image">
				<a href="<?php echo get_permalink( $instance['video'] ); ?>">
					<?php echo $image; ?>
				</a>
			</div>
			<div class="video-callout__body">
				<h3 class="video-callout__headline">
					<a href="<?php echo get_permalink( $instance['video'] ); ?>"><?php echo $instance['title']; ?></a>
				</h3>
				<p class="video-callout__date"><?php echo $date; ?></p>
			</div>
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
			$label = ucwords( str_replace( '_', ' ', $key ) );
			if ( $label === 'Image' ) $label = 'Image URL';

			?><p>
				<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $label; ?></label>
				<?php switch( $key ) {
					// video dropdown field
					case 'video' :
						wp_dropdown_pages( array(
							'parent'   => 103,
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
				<?php if ( $key === 'title' ) { ?>
					<span class="howto">If left blank, the video title will be used.</span>
				<?php } ?>
				<?php if ( $key === 'image' ) { ?>
					<span class="howto">If left blank, the video's featured image will be used.</span>
				<?php } ?>
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
		$instance = array_intersect_key( $instance, $this->defaults );

		foreach( $instance as $key => $value ) {
			switch( $key ) {
				case 'video' :
					$instance[$key] = (int) $value;
					break;
				case 'image' :
					$instance[$key] = esc_url_raw( $value );
					break;
				default:
					$instance[$key] = sanitize_text_field( $value );
					break;
			}
		}

		return $instance;
	}

}