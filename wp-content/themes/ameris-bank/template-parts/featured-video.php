<?php if ( get_field( 'featured_video' ) ) {
	$video_heading = get_field( 'featured_video_heading' );
	foreach( get_field( 'featured_video' ) as $post ) {
		setup_postdata( $post ); ?>
		<div class="featured-video">
			<div class="featured-video__image">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'about-news' ); // use this to avoid creating another image size ?>
				</a>
			</div>
			<div class="featured-video__text">
				<?php if ( $video_heading ) { ?>
					<div class="featured-video__heading kicker"> <?php echo $video_heading; ?></div>
				<?php } ?>
				<h2 class="featured-video__title"><a href="<?php the_permalink(); ?>"><?php
					$orig_title = get_the_title();
					$title = ameris_limit_by_char( $orig_title, 45 );
					if ( $title !== $orig_title )
						$title .= '...';
					echo $title;
				?></a></h2>
				<div class="featured-video__date meta">Posted <?php the_time( 'm.d.Y | h:i a' ); ?></div>
				<?php if ( $summary = get_field( 'video_summary' ) ) { ?>
					<div class="featured-video__excerpt">
						<?php
							$summary = strip_tags( $summary );
							$new_summary = ameris_limit_by_char( $summary, 275 );
							if ( $new_summary != $summary ) $new_summary .= '...';
							echo $new_summary;
						?>
						<a class="read-more" href="<?php the_permalink(); ?>">View video</a>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php }
	wp_reset_postdata();
}