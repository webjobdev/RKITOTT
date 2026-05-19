<?php

/**
 * [sassriver_breadcrumb description]
 * @return [type] [description]
 */
function sassriver_breadcrumb() {

    $wpbreadcrumb_class = '';
    $breadcrumb_show = 1;

    $id = get_the_ID();

    if ( is_front_page() && is_home() ) {
        $title = get_the_title();
        $wpbreadcrumb_class = 'tx-front-page';
    } elseif ( is_front_page() ) {
        $title = get_the_title();
        $breadcrumb_show = 0;

    } elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $id = get_option( 'page_for_posts' );
            $title = get_the_title( get_option( 'page_for_posts' ) );
        }
    } elseif ( is_single() && 'post' == get_post_type() ) {
        $title = get_the_title();
    } elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'sassriver' ) . get_search_query();
    } elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'sassriver' );
    } elseif ( function_exists( 'is_woocommerce' ) && is_shop() ) {
        $title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
    } elseif ( function_exists( 'is_woocommerce' ) && is_product() ) {
        $title = __( 'Product Details', 'sassriver' );
    } elseif ( function_exists( 'is_woocommerce' ) && is_product_tag() ) {
        $title = get_the_archive_title();
    } elseif ( function_exists( 'is_woocommerce' ) && is_product_category() ) {
        $title = get_the_archive_title();
    } elseif ( is_archive() ) {
        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }

    // from page meta
    if ( get_option( 'page_for_posts' ) ) {
        $page_for_posts = get_queried_object_id();
        $page_for_posts_meta = get_post_meta( $page_for_posts, 'tx_page_meta', true ) ? get_post_meta( $page_for_posts, 'tx_page_meta', true ) : [];
    } else {
        $page_meta = get_post_meta( $id, 'tx_page_meta', true ) ? get_post_meta( $id, 'tx_page_meta', true ) : [];
    }

    if ( get_option( 'page_for_posts' ) ) {
        $enable_page_preadcrumb = array_key_exists( 'enable_page_preadcrumb', $page_for_posts_meta ) ? $page_for_posts_meta['enable_page_preadcrumb'] : true;
    } else {
        $enable_page_preadcrumb = array_key_exists( 'enable_page_preadcrumb', $page_meta ) ? $page_meta['enable_page_preadcrumb'] : true;
    }

    if ( get_option( 'page_for_posts' ) ) {
        $enable_bg_image = array_key_exists( 'enable_bg_image', $page_for_posts_meta ) ? $page_for_posts_meta['enable_bg_image'] : true;
    } else {
        $enable_bg_image = array_key_exists( 'enable_bg_image', $page_meta ) ? $page_meta['enable_bg_image'] : true;
    }

    if ( $enable_page_preadcrumb == true && $breadcrumb_show == 1 ) {
        // from page meta
        if ( get_option( 'page_for_posts' ) ) {
            $bg_img_from_page = array_key_exists( 'bg_img_from_page', $page_for_posts_meta ) ? $page_for_posts_meta['bg_img_from_page'] : '';
            $enable_custom_title = array_key_exists( 'enable_custom_title', $page_for_posts_meta ) ? $page_for_posts_meta['enable_custom_title'] : false;
            $page_custom_title = array_key_exists( 'page_custom_title', $page_for_posts_meta ) ? $page_for_posts_meta['page_custom_title'] : '';
        } else {
            $bg_img_from_page = array_key_exists( 'bg_img_from_page', $page_meta ) ? $page_meta['bg_img_from_page'] : '';
            $enable_custom_title = array_key_exists( 'enable_custom_title', $page_meta ) ? $page_meta['enable_custom_title'] : false;
            $page_custom_title = array_key_exists( 'page_custom_title', $page_meta ) ? $page_meta['page_custom_title'] : '';
        }

        // from theme option
        $breadcrumb_bg = cs_get_option( 'breadcrumb_bg_img' );
        $bg_img = !empty( $breadcrumb_bg ) ? $breadcrumb_bg['url'] : '';

        if ( $enable_bg_image == false ) {
            $bg_img = $bg_img;
        } else {
            $bg_img = !empty( $bg_img_from_page['url'] ) ? $bg_img_from_page['url'] : $bg_img;
        }

        $shop_details_breadcrumb = is_single() && 'product' == get_post_type() ? ' no-breadcrumb-ttile' : '';
        $bg_url = !empty( $bg_img ) ? $bg_img : "";
        $title = $enable_custom_title == true ? $page_custom_title : $title;

        // check if front page
        if ( is_front_page() ) {
            $title = __('Blog', 'sassriver');
        }

        $enable_breadcrumb = cs_get_option( 'enable_breadcrumb', true );
        $enable_breadcrumb_list = cs_get_option( 'enable_breadcrumb_list', true );
        if (
            $enable_breadcrumb &&
            ! is_404()
        ) :
        ?>
        <!-- breadcrumb-start -->
        <section class="sr-breadcrumb-area wa-bg-default tx-breadcrumb <?php echo esc_attr( $wpbreadcrumb_class . $shop_details_breadcrumb ); ?>" data-background="<?php echo esc_url($bg_url) ? esc_url($bg_url) : ''; ?>">
            <div class="container sr-container-1">
                <div class="sr-breadcrumb-wrap">
                    <h1 class="sr-breadcrumb-title"><?php echo wp_kses_post($title); ?></h1>
                    <?php if( $enable_breadcrumb_list == true ) : ?>
                    <div class="sr-breadcrumb-list ">
                        <?php sassriver_breadcrumb_callback(); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- breadcrumb-end -->
        <?php
    endif;
    }
}
add_action( 'sassriver_before_main_content', 'sassriver_breadcrumb' );

function sassriver_breadcrumb_callback() {
    $args = [
        'show_browse'   => false,
        'post_taxonomy' => ['product' => 'product_cat'],
    ];
    $breadcrumb = new SassriverBreadcrumbClass( $args );

    return $breadcrumb->trail();
}
