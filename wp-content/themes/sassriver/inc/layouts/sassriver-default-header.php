<?php

/**
 * Default Header Style
 */
function sassriver_default_header() {
    if ( has_nav_menu( 'main-menu' ) ) {
        $no_menu_class = '';
    } else {
        $no_menu_class = 'no-menu ';
    }

    ?>

	<header class="sr-header-1-area wa_sticky_header tx-header tx-DefaultHeader <?php echo esc_attr($no_menu_class); ?>">
		<div class="container sr-container-1">
			<div class="sr-header-1-wrap">

				<!-- logo -->
				<?php function_exists( 'sassriver_header_logo' ) ? sassriver_header_logo() : '';?>

				<!-- menu -->
				<?php if ( has_nav_menu( 'main-menu' ) ) : ?>
				<nav class="sr-main-navigation  d-none d-xl-block">
					<?php function_exists( 'sassriver_header_menu' ) ? sassriver_header_menu( 'main-menu' ) : null;?>
				</nav>

				<div class="sr-header-1-action-link">
					<!-- offcanvas-btn -->
					<button type="button" aria-label="name" class="sr-offcanvas-btn-1 offcanvas_toggle d-xl-none d-inline-block">
						<i class="fa-solid fa-bars"></i>
					</button>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</header>

	<div class="wa-offcanvas-area  offcanvas_box_active lenis lenis-smooth">
		<div class="wa-offcanvas-wrap ">
			<!-- top -->
			<div class="wa-offcanvas-top">

				<!-- logo -->
				<?php function_exists( 'sassriver_side_info_logo' ) ? sassriver_side_info_logo() : '';?>

				<!-- close-btn -->
				<button class="wa-offcanvas-close offcanvas_box_close" aria-label="name" >
					<span></span>
					<span></span>
				</button>

			</div>

			<!-- mobile-menu-list -->
			<nav class="mobile-main-navigation mb-50 d-block d-lg-none">
				<?php function_exists( 'sassriver_header_menu' ) ? sassriver_header_menu( 'main-menu' ) : null;?>
			</nav>
		</div>
	</div>

	<?php
}
