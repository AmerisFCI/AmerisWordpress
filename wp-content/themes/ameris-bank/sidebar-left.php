<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package ameris-bank
 */
?>

<div id="sidebar-left" class="sidebar sidebar-left" role="complementary">

	<nav class="sidebar-menu">
		<?php ameris_sidebar_menu(); ?>
	</nav>

	<?php dynamic_sidebar( 'sidebar-left' ); ?>

</div><!-- #secondary -->
