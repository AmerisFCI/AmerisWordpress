<?php
/**
 * Widget to display recent posts.
 */
class Ameris_Recent_Posts_Widget extends WP_Widget {

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
			'amount'     => 3,
			'category'   => false,
			'thumbnails' => false
		);

		parent::__construct(
			'ameris_recent_posts_widget',
			'Ameris Recent Posts',
			array( 'description' => 'Your most recent posts. Unlike the basic Recent Posts widget, this allows you to limit by category and include thumbnails.' )
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

		$query_args = array(
			'post_type' => 'post',
			'posts_per_page' => $instance['amount'],
		);
		if ( $instance['category'] )
			$query_args['cat'] = $instance['category'];

		$recent_posts = new WP_Query( $query_args );
		if ( $recent_posts->have_posts() ) { ?>
			
			<div class="recent-posts">
			
				<?php while( $recent_posts->have_posts() ) {
					$recent_posts->the_post(); ?>
					
					<div class="recent-post">
						<?php if ( $instance['thumbnails'] ) { ?>
							<a class="recent-post__image" href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'article-sidebar' ); ?>
							</a>
						<?php } ?>
						<h4 class="recent-post__title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h4>
						<div class="recent-post__meta">
							<?php the_time( 'n/j/Y' ); ?>
						</div>
					</div>

					<?php
				} ?>
			
			</div><!-- .recent-posts -->

		<?php }
		wp_reset_postdata(); ?>

		<div class="more-recent-posts">
			<?php $newsroom_id = get_option( 'page_for_posts' );
			$more_link = get_permalink( $newsroom_id );
			$more_name = 'Posts';
			if ( $instance['category'] ) {
				$cat = get_term( $instance['category'], 'category' );
				$more_name = $cat->name;
				$more_link = $more_link . 'category/' . $cat->slug;
			} ?>
			<a class="more-recent-posts__link" href="<?php echo $more_link; ?>">More <?php echo $more_name; ?></a>
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
				case 'thumbnails' : ?>
					<label for="<?php echo $this->get_field_id( $key ); ?>">
						<input id="<?php echo $this->get_field_id( $key ); ?>" name="<?php echo $this->get_field_name( $key ); ?>" type="checkbox" value="1" <?php checked( $value ); ?>>
						Display thumbnails
					</label>
					<?php break;
				case 'category' : ?>
					<label for="<?php echo $this->get_field_id( $key ); ?>">Category</label>
					<?php wp_dropdown_categories( array(
						'id'              => $this->get_field_id( $key ),
						'class'           => 'widefat',
						'name'            => $this->get_field_name( $key ),
						'show_option_all' => 'All categories',
						'selected'        => $value
					) );
					break;
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
				case 'category' :
					$instance[$key] = (int) $value;
					break;
				case 'thumbnails' :
					$instance[$key] = (bool) $value;
					break;
			}
		}

		return $instance;
	}

}