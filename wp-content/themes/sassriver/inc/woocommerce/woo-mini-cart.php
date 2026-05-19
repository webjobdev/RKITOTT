<?php

if (SASSRIVER_WOOCOMMERCE_ACTIVED) {
    function sassriver_mini_cart()
    {
        ob_start();
    ?>
    <div class="xs-sidebar-group info-group info-group tx-sideInfoWrapper">
		<div class="xs-overlay xs-bg-black"></div>
		<div class="xs-sidebar-widget">
			<div class="sidebar-widget-container">
				<div class="close-button">
					<span class="far fa-times fa-fw"></span>
				</div>
				<div class="sidebar-textwidget">
					<div class="sidebar-info-contents">
						<div class="content-inner">
							<div class="title-box">
								<h5><?php echo esc_html__('Shopping Cart', 'sassriver'); ?></h5>
							</div>
							<div class="header-mini-cart">
                				<?php woocommerce_mini_cart(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php return ob_get_clean();
    }
}

add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    // Modify the mini cart content
    ob_start();
    ?>
    <div class="header-mini-cart">
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php
    $fragments['.header-mini-cart'] = ob_get_clean();

    // Modify the cart count
    ob_start();
    ?>
    <span class="tx-cart-count tx-radious-50">
        <?php print esc_html(WC()->cart->cart_contents_count); ?>
    </span>
    <?php
    $fragments['.tx-cart-count'] = ob_get_clean();

    return $fragments;
});
