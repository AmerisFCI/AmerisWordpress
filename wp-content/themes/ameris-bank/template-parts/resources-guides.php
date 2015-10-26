<div class="related-resources">
	<h3 class="related-resources__heading">Resources &amp; Guides</h3>
	<?php if ( get_field( 'resources_guides' ) ) { ?>
		<ul class="related-resources__rotator resources-rotator">
			<?php foreach( get_field( 'resources_guides' ) as $post ) {
				setup_postdata( $post ); ?>
				<li class="related-resources__resource">
					<a href="<?php the_permalink(); ?>" class="related-resources__link">
						<div class="related-resources__icon"><?php the_post_thumbnail( 'circle-icon' ); ?></div>
						<div class="related-resources__title"><?php the_title(); ?></div>
					</a>
				</li>
			<?php }
			wp_reset_postdata(); ?>
		</ul>
	<?php } ?>
</div><!-- .related-resources -->