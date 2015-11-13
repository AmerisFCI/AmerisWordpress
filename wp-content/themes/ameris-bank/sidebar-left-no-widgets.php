<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package ameris-bank
 */
?>

<?php $menu = get_ameris_sidebar_menu();
if ( $menu ) { ?>

	<div id="sidebar-left" class="sidebar sidebar-left sidebar-simple" role="complementary">

		<?php if ( $menu ) { ?>
			<nav class="sidebar-menu">
				<?php echo $menu; ?>
			</nav>
		<?php } ?>

	</div><!-- #secondary -->

<?php } ?>