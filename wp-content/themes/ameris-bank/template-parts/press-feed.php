<div class="recent-posts">
	<?php 
	$url = 'http://www.snl.com/IRWebLinkX/rss/prfeed.aspx?iid=100594';
	$rss = fetch_feed( $url );
	if ( is_wp_error( $rss ) ) {
		echo $rss->get_error_message();
	} else {
		foreach ( $rss->get_items( 0, 3 ) as $item ) { ?>
			<div class="recent-post">
				<h3 class="recent-post__title"><a href="<?php echo $item->get_link(); ?>"><?php echo $item->get_title(); ?></a></h3>
				<div class="recent-post__meta meta"><?php echo date( 'n/j/Y', strtotime( $item->get_date() ) ); ?></div>
			</div>
		<?php }
	} ?>
	<div class="more-recent-posts">
		<a class="more-recent-posts__link" href="<?php echo $url; ?>">More Press</a>
	</div>
</div>