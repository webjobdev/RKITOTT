<?php

/**
 * sassriver_scripts description
 * @return [type] [description]
 */
function sassriver_scripts() {

    wp_enqueue_style( 'sassriver-fonts', sassriver_fonts_url(), [], null );
    wp_enqueue_style( 'animate-min', SASSRIVER_THEME_CSS_DIR . 'animate-min.css', [], VERSION );
    wp_enqueue_style( 'bootstrap-min', SASSRIVER_THEME_CSS_DIR . 'bootstrap.min.css', [] );
    wp_enqueue_style( 'magnific-popup', SASSRIVER_THEME_CSS_DIR . 'magnific-popup.css', [], VERSION );
    wp_enqueue_style( 'nice-select', SASSRIVER_THEME_CSS_DIR . 'nice-select.css', [], VERSION );
    wp_enqueue_style( 'swiper-min', SASSRIVER_THEME_CSS_DIR . 'swiper.min.css', [], VERSION );
    wp_enqueue_style( 'fontawesome-min', SASSRIVER_THEME_CSS_DIR . 'fontawesome-min.css', [] );
    wp_enqueue_style( 'odometer-min.css', SASSRIVER_THEME_CSS_DIR . 'odometer.min.css', [] );

    // THEME REQUIRED CSS
    wp_enqueue_style( 'sassriver-core', SASSRIVER_THEME_CSS_DIR . 'sassriver-core.css', [], VERSION );
    wp_enqueue_style( 'sassriver-companion', SASSRIVER_THEME_CSS_DIR . 'sassriver-companion.css', [] );
    wp_enqueue_style( 'sassriver-extra', SASSRIVER_THEME_CSS_DIR . 'sassriver-extra.css', [] );
    wp_enqueue_style( 'sassriver-custom', SASSRIVER_THEME_CSS_DIR . 'sassriver-custom.css', [] );
    wp_enqueue_style( 'sassriver-style', get_stylesheet_uri() );

    if ( class_exists('WooCommerce') ) {
		wp_enqueue_style( 'woocommerce-style', get_template_directory_uri() . '/woocommerce/woocommerce.css' );
	}

    $my_current_lang = apply_filters( 'wpml_current_language', NULL );

    $enable_rtl = cs_get_option( 'enable_rtl', false );
    if ( $my_current_lang != 'en' && $enable_rtl || is_rtl() ) {
        wp_enqueue_style( 'sassriver-rtl', SASSRIVER_THEME_CSS_DIR . 'sassriver-rtl.css', [] );
    }

    // all js files
    wp_enqueue_script( 'bootstrap-min', SASSRIVER_THEME_JS_DIR . 'bootstrap-min.js', ['jquery'], false, true );
    wp_enqueue_script( 'swiper-min', SASSRIVER_THEME_JS_DIR . 'swiper.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'lenis-min', SASSRIVER_THEME_JS_DIR . 'lenis.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'wow-min', SASSRIVER_THEME_JS_DIR . 'wow-min.js', ['jquery'], false, true );
    wp_enqueue_script( 'MotionPathPlugin-min', SASSRIVER_THEME_JS_DIR . 'MotionPathPlugin.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'odometer-min', SASSRIVER_THEME_JS_DIR . 'odometer.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'nice-select-min', SASSRIVER_THEME_JS_DIR . 'nice-select.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'jquery-marquee-min', SASSRIVER_THEME_JS_DIR . 'jquery.marquee.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'magnific-popup-min', SASSRIVER_THEME_JS_DIR . 'magnific-popup.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'SplitText-min', SASSRIVER_THEME_JS_DIR . 'SplitText.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'gsap-min', SASSRIVER_THEME_JS_DIR . 'gsap.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'customEase-min', SASSRIVER_THEME_JS_DIR . 'customEase.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'appear', SASSRIVER_THEME_JS_DIR . 'appear.js', ['jquery'], false, true );
    wp_enqueue_script( 'scrollTrigger-min', SASSRIVER_THEME_JS_DIR . 'scrollTrigger.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'touchspin', SASSRIVER_THEME_JS_DIR . 'touchspin.js', ['jquery'], false, true );
    wp_enqueue_script( 'sassriver-custom', SASSRIVER_THEME_JS_DIR . 'sassriver-custom.js', ['jquery'], false, true );

    if ( $my_current_lang != 'en' && $enable_rtl || is_rtl() ) {
        wp_enqueue_script( 'sassriver-core-rtl', SASSRIVER_THEME_JS_DIR . 'sassriver-core-rtl.js', ['jquery'], VERSION, true );
    } else {
        wp_enqueue_script( 'sassriver-core', SASSRIVER_THEME_JS_DIR . 'sassriver-core.js', ['jquery'], VERSION, true );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'sassriver_scripts' );
