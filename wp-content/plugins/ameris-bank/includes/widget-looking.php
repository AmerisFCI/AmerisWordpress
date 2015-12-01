<?php
/**
 * Widget to display recent posts.
 */
class Ameris_Looking_Widget extends WP_Widget {

	/**
	 * Default field values.
	 * @var array
	 */
	var $defaults;

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'ameris_looking_widget',
			'Ameris Looking for Something Else',
			array( 'description' => 'The "Looking for Something Else?" dropdown.' )
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

		global $post;

		// display children. if none, display children of parent.
		$has_children = get_pages( array( 'child_of' => $post->ID ) );
		if ( $has_children )
			$id = $post->ID;
		else
			$id = $post->post_parent;

		echo $args['before_widget']; ?>
			
		<div class="select-container quick-links">
			<?php wp_dropdown_pages( array(
				'child_of'         => $id,
				'exclude'          => $post->ID,
				'name'             => 'select_subpage',
				'show_option_none' => 'Looking for something else?'
			) ); ?>
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
		$instance = $new_instance;
		return $instance;
	}

}