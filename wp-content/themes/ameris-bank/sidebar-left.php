<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package ameris-bank
 */
?>

<?php $menu = get_ameris_sidebar_menu();
if ( $menu || is_active_sidebar( 'sidebar-left' ) ) { ?>

	<div id="sidebar-left" class="sidebar sidebar-left" role="complementary">

		<?php if ( $menu ) { ?>
			<nav class="sidebar-menu">
				<?php echo $menu; ?>
			</nav>
		<?php } ?>

		<?php dynamic_sidebar( 'sidebar-left' ); ?>

	</div><!-- #secondary -->

<?php } ?>