<?php
/**
 * Widget to display a callout to a specific page.
 */
class Ameris_Page_Callout_Widget extends WP_Widget {

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
			'page'      => 0,
			'image'     => '',
			'label'     => '',
			'headline'  => '',
			'link_text' => ''
		);

		parent::__construct(
			'ameris_page_callout_widget',
			'Ameris Page Callout',
			array( 'description' => 'Callout box for a specific page.' )
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

		if ( $instance['page'] ) {

			// get page title if there's no label
			if ( !$instance['label'] )
				$instance['label'] = get_the_title( (int) $instance['page'] );

			// get featured image if there's no image
			if ( !$instance['image'] ) {
				$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $instance['page'] ), 'callout-box' );
				$instance['image'] = $image_array[0];
			}

		}

		echo $args['before_widget']; ?>

		<div class="callout-box sidebar-callout-box callout-box--small">
			<div class="callout-background-image" style="background-image:url( '<?php echo $instance['image']; ?>' );"></div>
			<h2 class="callout-box__kicker kicker sidebar-callout-box__kicker  callout-box--small__kicker"><?php echo $instance['label']; ?></h2>
			<div class="callout-box__header sidebar-callout-box__header  callout-box--small__header">
				<h3 class="callout-box__headline sidebar-callout-box__headline  callout-box--small__headline"><?php echo $instance['headline']; ?></h3>
				<a class="button callout-box__button sidebar-callout-box__button  callout-box--small__button" href="<?php echo get_permalink( $instance['page'] ); ?>"><?php echo $instance['link_text']; ?></a>
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
		$instance = array_intersect_key( $instance, array_merge( array( 'title' => '' ), $this->defaults ) );

		foreach( $instance as $key => $value ) {
			$label = ucwords( str_replace( '_', ' ', $key ) );
			if ( $label === 'Image' ) $label = 'Image URL';

			?><p>
				<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $label; ?></label>
				<?php switch( $key ) {
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
				<?php if ( $key === 'label' ) { ?>
					<span class="howto">If left blank, the page title will be used.</span>
				<?php } ?>
				<?php if ( $key === 'image' ) { ?>
					<span class="howto">If left blank, the page's featured image will be used.</span>
				<?php } ?>
			</p><?php
		}

		// hidden title
		?><input
			type="hidden"
			id="<?php echo $this->get_field_id( 'title' ); ?>"
			name="<?php echo $this->get_field_name( 'title' ); ?>"
			value="<?php echo esc_attr( $instance['title'] ); ?>"
		/><?php

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
				case 'page' :
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

		// force the title
		$title = $instance['label'];
		if ( !$title )
			$title = get_the_title( $instance['page'] );
		$instance['title'] = $title;

		return $instance;
	}

}