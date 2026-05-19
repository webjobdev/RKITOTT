<?php

add_action( 'tgmpa_register', 'sassriver_register_required_plugins' );

function sassriver_register_required_plugins() {

    $plugins = [
        [
            'name'               => esc_html__( 'Sassriver Core', 'sassriver' ),
            'slug'               => 'sassriver-core',
            'source'             => esc_url( 'https://themexriver.com/wp/sassriver/sassriver-plug/sassriver-core.zip' ),
            'external_url'       => esc_url( 'https://themexriver.com/wp/sassriver/sassriver-plug/sassriver-core.zip' ),
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'     => esc_html__( 'Elementor Page Builder', 'sassriver' ),
            'slug'     => 'elementor',
            'required' => true,
        ],
        [
            'name'     => esc_html__( 'Contact Form 7', 'sassriver' ),
            'slug'     => 'contact-form-7',
            'required' => true,
        ],
        [
            'name'     => esc_html__( 'WooCommerce', 'sassriver' ),
            'slug'     => 'woocommerce',
            'required' => true,
        ],
        [
            'name'     => esc_html__( 'One Click Demo Import', 'sassriver' ),
            'slug'     => 'one-click-demo-import',
            'required' => false,
        ],
        [
            'name'     => esc_html__( 'SVG Support', 'sassriver' ),
            'slug'     => 'svg-support',
            'required' => false,
        ],

    ];

    $config = [
        'id'           => 'sassriver',
        'parent_slug'  => 'sassriver',
        'menu'         => 'tgmpa-install-plugins',
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'default_path' => '',
    ];

    tgmpa( $plugins, $config );
}
