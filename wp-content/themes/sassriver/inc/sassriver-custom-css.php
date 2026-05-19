<?php

// File Security Check
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

function sassriver_primary_color() {

    wp_enqueue_style( 'sassriver-primary-color', SASSRIVER_THEME_CSS_DIR . 'sassriver-custom.css', [] );

    $theme_color_1 = cs_get_option( 'theme_color_1', '#7A5AF8' );
    $theme_color_2 = cs_get_option( 'theme_color_2', '#FF4200' );
    $theme_color_3 = cs_get_option( 'theme_color_3', '#009393' );
    $theme_color_4 = cs_get_option( 'theme_color_4', '#7063db' );
    $theme_color_5 = cs_get_option( 'theme_color_5', '#4F4AE6' );
    $theme_color_6 = cs_get_option( 'theme_color_6', '#FF7800' );
    $theme_gd_color_1 = cs_get_option( 'theme_gd_color_1', [
        'color_1' => '#FF7800',
        'color_2' => '#FF4200',
    ] );
    $theme_gd_color_2 = cs_get_option( 'theme_gd_color_2', [
        'color_1' => '#009393',
        'color_2' => '#01dddd',
    ] );


    $scroll_up_color = cs_get_option( 'scroll_up_color' );

    $id = get_the_ID();
    $page_meta = get_post_meta( $id, 'tx_page_meta', true ) ? get_post_meta( $id, 'tx_page_meta', true ) : [];

    // page_scrollbar_color
    $page_scroll_color = array_key_exists( 'page_scroll_color', $page_meta ) ? $page_meta['page_scroll_color'] : '#7A5AF8';

    if (
        $theme_color_1 ||
        $theme_color_2 ||
        $theme_color_3 ||
        $theme_color_4 ||
        $theme_color_5 ||
        $theme_color_6
    ) {
        $custom_css = '';
        $custom_css .= '
            :root {
                --sr-clr-pr-1: ' . esc_attr( $theme_color_1 ) . ';
                --sr-clr-pr-2: ' . esc_attr( $theme_color_2 ) . ';
                --sr-clr-pr-3: ' . esc_attr( $theme_color_3 ) . ';
                --sr-clr-pr-5: ' . esc_attr( $theme_color_4 ) . ';
                --sr-clr-sd-1: ' . esc_attr( $theme_color_5 ) . ';
                --sr-clr-sd-5: ' . esc_attr( $theme_color_6 ) . ';
            }
        ';

        wp_add_inline_style( 'sassriver-primary-color', $custom_css );
    }

    if ( isset( $theme_gd_color_1['color_1'] ) || isset( $theme_gd_color_1['color_2'] ) ) {
        $custom_css = '';
        $custom_css .= '
            :root {
                --sr-clr-gd-1: linear-gradient(180deg, ' . esc_attr( $theme_gd_color_1['color_1'] ) . ' 0%, ' . esc_attr( $theme_gd_color_1['color_2'] ) . ' 100%);
            }
        ';
        wp_add_inline_style( 'sassriver-primary-color', $custom_css );
    }

    if ( isset( $theme_gd_color_2['color_1'] ) || isset( $theme_gd_color_2['color_2'] ) ) {
        $custom_css = '';
        $custom_css .= '
            :root {
                --sr-clr-gd-2: linear-gradient( 0deg, ' . esc_attr( $theme_gd_color_2['color_1'] ) . ' 0%, ' . esc_attr( $theme_gd_color_2['color_2'] ) . ' 100%);
            }
        ';
        wp_add_inline_style( 'sassriver-primary-color', $custom_css );
    }

    if (
        $page_scroll_color
    ) {
        $custom_css = '';
        $custom_css .= '
            ::-webkit-scrollbar-thumb {
                background-color: ' . esc_attr( $page_scroll_color ) . ';
            }
        ';

        wp_add_inline_style( 'sassriver-primary-color', $custom_css );
    }

}
add_action( 'wp_enqueue_scripts', 'sassriver_primary_color' );