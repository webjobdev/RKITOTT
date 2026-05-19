<?php
/**
 * Get the correct page ID depending on context
 */
function sassriver_get_page_id() {
    $id = get_the_ID();

    if ( get_option( 'page_for_posts' ) ) {
        $id = get_the_ID();
    }

    if ( defined( 'SASSRIVER_WOOCOMMERCE_ACTIVED' ) && SASSRIVER_WOOCOMMERCE_ACTIVED && is_shop() ) {
        $id = get_option( 'woocommerce_shop_page_id' );
    }

    return $id;
}

/**
 * Generic function to check header/footer
 */
function sassriver_check_section( $section = 'header' ) {
    $id = sassriver_get_page_id();
    $meta = get_post_meta( $id, 'tx_page_meta', true ) ?: [];
    $key = "page_{$section}_disable";
    $method = "sassriver_{$section}_template";

    $disabled = !empty( $meta[$key] ) ? $meta[$key] : false;

    if ( !$disabled && method_exists( 'Sassriver_Helper', $method ) ) {
        Sassriver_Helper::$method();
    }
}

// Hooks
add_action( 'sassriver_header_style', function () {
    sassriver_check_section( 'header' );
}, 10 );

add_action( 'sassriver_footer_style', function () {
    sassriver_check_section( 'footer' );
}, 10 );
