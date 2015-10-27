<?php
/**
 * The template used for displaying the banner image and title content
 */
?>

<div class="image-banner">
	<?php the_post_thumbnail( 'full' ); ?>
<?php if ( get_field( 'banner_blurb' ) ) { ?>
    <div class="blurb"><?php the_field( 'banner_blurb' ); ?></div>
<?php } ?>
</div>

<header class="page-title">

    <?php if ( function_exists( 'breadcrumb_trail' ) ) { ?>
        <div class="breadcrumbs">
            <?php breadcrumb_trail( array(
                'show_browse' => false
            ) ); ?>
        </div>
    <?php } ?>

    <?php global $post;

    // if a blog post or blog home - get the title for the blog home (newsroom)
    if ( is_singular( 'post' ) || is_home() ) {
        $blog_home = get_option( 'page_for_posts', 0 ); ?>
        <h2><a href="<?php echo get_permalink( $blog_home ); ?>">
                <?php echo get_the_title( get_option( 'page_for_posts', 0 ) ); ?>
            </a></h2>

        <?php // if a leader - get the title for the leadership main page
    } elseif( is_singular( 'leadership' ) ) { ?>
        <h2>Leadership</h2>

    <?php } elseif ( is_archive() ) { ?>
        <h1><?php the_archive_title(); ?></h1>

    <?php } elseif ( is_search() ) { ?>
        <h1>Search Results</h1>

    <?php } elseif ( is_404() ) { ?>
        <h1>Page Not Found</h1>

    <?php } else { ?>
        <h1><?php the_title(); ?></h1>
    <?php } ?>

</header>