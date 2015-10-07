<?php
/**
 * The sidebar containing the secondary widget area.
 *
 * @package ameris-bank
 */

if ( ! is_active_sidebar( 'sidebar-right' ) ) {
	return;
}
?>

<div id="sidebar-right" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-right' ); ?>
</div><!-- #secondary -->
