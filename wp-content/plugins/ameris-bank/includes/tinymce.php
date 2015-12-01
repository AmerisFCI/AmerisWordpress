<?php

/**
 * Add the Formats tinymce button, which is disabled by default.
 */
function ameris_add_tinymce_button( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
add_filter( 'mce_buttons_2', 'ameris_add_tinymce_button' );

/**
 * Add custom formats to the Formats tinymce button.
 */
function ameris_add_tinymce_classes( $settings ) {

    $style_formats = array(
        array(
            'title'    => 'Intro',
            'inline'   => 'span',
            'classes'  => 'intro'
            ),
        array(
            'title'    => 'View All',
            'inline'   => 'span',
            'classes'  => 'view-all',
        ),
        array(
            'title'    => 'Button',
            'block'    => 'div',
            'classes'  => 'button',
            'wrapper'  => true
        ),
        array(
            'title'    => 'CTA Button',
            'block'    => 'div',
            'classes'  => 'button-cta',
            'wrapper'  => true
        ),
        array(
            'title'    => 'Columned List',
            'block'    => 'ul',
            'selector' => 'ul',
            'classes'  => 'column-list'
        )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}
add_filter( 'tiny_mce_before_init', 'ameris_add_tinymce_classes' );

/**
 * Now that the custom formats are implemented, use the theme's editor-style.css
 * to actually show results when one of those formats are selected.
 */
function ameris_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'ameris_editor_styles' );