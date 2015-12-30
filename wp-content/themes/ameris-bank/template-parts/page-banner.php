<?php
/**
 * The template used for displaying the banner image and title content
 */
?>

<div class="banner <?php if ( ameris_has_banner_image() ) { ?>has-banner-image <?php } ?><?php if ( get_field( 'banner_blurb' ) ) { ?>has-blurb<?php } ?>">

    <?php get_template_part( 'template-parts/page', 'banner-image' ); ?>

    <header class="banner-text__inner-wrap inner-wrap">

        <div class="page-title">

            <?php if ( function_exists( 'breadcrumb_trail' ) ) { ?>
                <div class="breadcrumbs">
                    <?php breadcrumb_trail( array(
                        'show_browse' => false,
                        'show_title'  => false,
                        'show_on_front' => false
                    ) ); ?>
                </div>
            <?php } ?>

            <?php global $post;

            // if a blog post or blog home - get the title for the blog home (newsroom)
            if ( is_singular( 'post' ) || is_home() ) {
                $blog_home = get_option( 'page_for_posts', 0 ); ?>
                <div class="page-title-lookalike"><a href="<?php echo get_permalink( $blog_home ); ?>">
                        <?php echo get_the_title( get_option( 'page_for_posts', 0 ) ); ?>
                    </a></div>

            <?php // if a leader - get the title for the leadership main page
            } elseif( is_singular( 'leadership' ) ) { ?>
                <div class="page-title-lookalike">Leadership</div>

            <?php // if a lending expert - get the title for the lending expert main page
            } elseif( is_singular( 'lending_expert' ) ) { ?>
                <div class="page-title-lookalike">Lending Experts</div>

            <?php // if an advisor - get the title for the lending expert main page
            } elseif( is_singular( 'advisor' ) ) { ?>
                <div class="page-title-lookalike">Speak with an Advisor</div>

            <?php // if a lending expert - get the title for the lending expert main page
            } elseif( is_singular( 'warehouse_lender' ) ) { ?>
                <div class="page-title-lookalike">Become a Partner</div>

            <?php } elseif ( is_archive() ) { ?>
                <h1><?php the_archive_title(); ?></h1>

            <?php } elseif ( is_search() ) { ?>
                <h1>Search Results</h1>

            <?php } elseif ( is_404() ) { ?>
                <h1>Page Not Found</h1>

            <?php } else { ?>
                <h1><?php 
                if ( get_field( 'descriptive_title' ) )
                    the_field( 'descriptive_title' );
                else
                    the_title();
                ?></h1>
            <?php } ?>

        </div>



    </header>

</div>