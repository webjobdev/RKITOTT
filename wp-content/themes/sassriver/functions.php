<?php

// DEFINE CONSTANTS
define( 'SASSRIVER_THEME_DIR', get_template_directory() );
define( 'SASSRIVER_THEME_URI', get_template_directory_uri() );
define( 'SASSRIVER_THEME_CSS_DIR', SASSRIVER_THEME_URI . '/assets/css/' );
define( 'SASSRIVER_THEME_JS_DIR', SASSRIVER_THEME_URI . '/assets/js/' );
define( 'SASSRIVER_THEME_INC', SASSRIVER_THEME_DIR . '/inc/' );
define( 'SASSRIVER_CORE_PLUG_DIR', plugins_url( 'sassriver-core/assets/' ) );
define( 'SASSRIVER_CORE', in_array( 'sassriver-core/sassriver-core.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

// INCLUDE CS FRAMEWORK FILE
require SASSRIVER_THEME_INC . 'csf-functions.php';

if ( !defined( 'SASSRIVER_WOOCOMMERCE_ACTIVED' ) ) {
    define( 'SASSRIVER_WOOCOMMERCE_ACTIVED', in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
}

if ( home_url() == "https://themexriver.com/wp/sassriver" OR home_url() == 'http://localhost:10010' ) {
    define( 'VERSION', time() );
} else {
    define( 'VERSION', wp_get_theme()->get( 'Version' ) );
}

if ( SASSRIVER_WOOCOMMERCE_ACTIVED ) {
    /**
     * Remove Action Hook
     */
    function sassriver_woo_theme_init(){
        $sassriver_exlude_hooks = require SASSRIVER_THEME_INC . 'woocommerce/woo-actions.php';
        foreach( $sassriver_exlude_hooks as $k => $v )
        {
            foreach( $v as $value )
            remove_action( $k, $value[0], $value[1] );
        }

    }
    add_action( 'init', 'sassriver_woo_theme_init');
}

// INCLUDE SASSRIVER AFTER SETUP
require SASSRIVER_THEME_INC . 'sassriver-after-setup.php';

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sassriver_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'sassriver_content_width', 640 );
}
add_action( 'after_setup_theme', 'sassriver_content_width', 0 );

// INCLUDE SASSRIVER REGISTER WIDGETS
require SASSRIVER_THEME_INC . 'sassriver-register-widgets.php';

// INCLUDE SASSRIVER ENQUEUE SCRIPTS
require SASSRIVER_THEME_INC . 'sassriver-enqueue-scripts.php';

// INCLUDE CUSTOM HEADER
require SASSRIVER_THEME_INC . 'custom-header.php';

// INCLUDE CUSTOM FUNCTIONS FILE
require SASSRIVER_THEME_INC . 'sassriver-functions.php';

// INCLUDE CUSTOM CSS
require SASSRIVER_THEME_INC . 'sassriver-custom-css.php';

// INCLUDE DEFAULT COMMENT
require SASSRIVER_THEME_INC . 'sassriver-comment.php';

// INCLUDE LOGO FILE
require SASSRIVER_THEME_INC . 'layouts/sassriver-logos.php';

// INCLUDE MENU FILE
require SASSRIVER_THEME_INC . 'layouts/sassriver-menus.php';

// INCLUDE DEFAULT BREADCRUMB
require SASSRIVER_THEME_INC . 'layouts/sassriver-breadcrumb.php';

// INCLUDE ALL ACTION FILE
require SASSRIVER_THEME_INC . 'layouts/sassriver-actions.php';

// INCLUDE DEFAULT HEADER
require SASSRIVER_THEME_INC . 'layouts/sassriver-default-header.php';

// INCLUDE FOOTER FILE
require SASSRIVER_THEME_INC . 'layouts/sassriver-default-footer.php';

// INCLUDE SEARCH WIDGET FILE
require SASSRIVER_THEME_INC . 'sassriver-search-widget.php';

// LOAD JETPACK COMPATIBILITY FILE
if ( defined( 'JETPACK__VERSION' ) ) {
    require SASSRIVER_THEME_INC . 'jetpack.php';
}

// ALL CLASS FILE
include_once SASSRIVER_THEME_INC . 'classes/class-sassriver-helper.php';
require_once SASSRIVER_THEME_INC . 'classes/class-breadcrumb.php';
require_once SASSRIVER_THEME_INC . 'classes/class-navwalker.php';
require_once SASSRIVER_THEME_INC . 'classes/class-tgm-plugin-activation.php';
require_once SASSRIVER_THEME_INC . 'required-plugin.php';