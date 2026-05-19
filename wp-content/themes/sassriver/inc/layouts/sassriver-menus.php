<?php

/**
 * [sassriver_header_menu description]
 * @return [type] [description]
 */
function sassriver_header_menu() {
    if (has_nav_menu('main-menu')) {
        $menu = wp_nav_menu([
            'theme_location' => 'main-menu',
            'menu_class'     => 'nav navbar-nav clearfix list-unstyled',
            'id'             => 'main-nav',
            'walker'         => class_exists('Sassriver_Mega_Menu_Walker') ? new Sassriver_Mega_Menu_Walker : '',
            'fallback_cb'    => ['Navwalker_Class', 'fallback'],
            'echo'           => false,
        ]);
    } else {
        $menu = '<ul class="navigation clearfix"></ul>'; // Display an empty menu if no menu is found
    }

    $menu = str_replace('menu-item-has-children', 'dropdown', $menu);
    $menu = str_replace('sub-menu', 'dropdown-menu', $menu);

    echo wp_kses_post($menu);
}