<?php if ( get_field( 'resources_guides' ) ) { ?>
<div class="related-resources">
	<h2 class="related-resources__heading landing-heading">Tools &amp; Resources</h2>
	<ul class="related-resources__rotator resources-rotator">
		<?php foreach( get_field( 'resources_guides' ) as $post ) {
			setup_postdata( $post ); ?>
			<li class="related-resource">
				<a href="<?php the_permalink(); ?>" class="related-resource__link">
					<div class="related-resource__icon"><?php the_post_thumbnail( 'circle-icon' ); ?></div>
					<h3 class="related-resource__title"><?php the_title(); ?></h3>
				</a>
			</li>
		<?php }
		wp_reset_postdata(); ?>
	</ul>
</div><!-- .related-resources -->
<?php } ?>