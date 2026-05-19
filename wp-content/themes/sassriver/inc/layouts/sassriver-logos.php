<?php
// header logos
function sassriver_header_logo() {
    ?>
    <?php
        $sassriver_site_logo = cs_get_option( 'tx_logo', get_template_directory_uri() . '/assets/img/logo/logo-1.webp');
        if(isset($sassriver_site_logo['url'])) {
            $logo_url = $sassriver_site_logo['url'];
        } else {
            $logo_url = get_template_directory_uri() . '/assets/img/logo/logo-1.webp';
        }
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                ?>
                <a class="tx-logo sr-header-1-logo" href="<?php print esc_url( home_url( '/' ) );?>">
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php if(function_exists('sassriver_img_alt_text')) { echo sassriver_img_alt_text($logo_url); } ?>" />
                </a>
                <?php
            }
        ?>
    <?php
}


// side info logo
function sassriver_side_info_logo() {
    $tx_sideInfo_logo = cs_get_option( 'tx_sideInfo_logo', get_template_directory_uri() . '/assets/img/logo/logo-2.webp');
    if(isset($tx_sideInfo_logo['url'])) {
        $logo_url = $tx_sideInfo_logo['url'];
    } else {
        $logo_url = get_template_directory_uri() . '/assets/img/logo/logo-1.webp';
    }

    ?>
    <a class="wa-offcanvas-top-logo tx-logo" aria-label="logo" href="<?php print esc_url( home_url( '/' ) );?>">
        <img src="<?php print esc_url( $logo_url );?>" alt="<?php if(function_exists('logo_url')) { echo sassriver_img_alt_text($logo_url); } ?>" />
    </a>


<?php }