<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-layouts
 *
 * @package sassriver
 */

$preloader_enable = cs_get_option( 'preloader_enable', true );
$enable_scroll_up = cs_get_option( 'enable_scroll_up', true );
$preloader_image = cs_get_option( 'preloader_image', get_template_directory_uri() . '/assets/logo/preloader-icon.webp' );
if(isset($preloader_image['url'])) {
    $preloader_image_url = $preloader_image['url'];
} else {
    $preloader_image_url = get_template_directory_uri() . '/assets/img/logo/preloader-icon.webp';
}
?>

<!doctype html>
<html <?php if(function_exists('language_attributes')) {language_attributes();} ?> <?php if(function_exists('sassriver_enable_rtl')) { print sassriver_enable_rtl();} ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' );?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
    <?php endif;?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head();?>
</head>

<body <?php body_class();?>>
<?php wp_body_open();?>

<div class="page-wrapper wa-fix">

    <!-- preloader start -->
    <?php if( $preloader_enable == true ) : ?>
    <div class="pg-preloader">
        <div class="pg-preloader-wrap">
            <div class="pg-preloader-logo">
                <?php if(!empty( $preloader_image_url )) : ?>
                <img src="<?php echo esc_url($preloader_image_url); ?>"
                    alt="<?php if(function_exists('sassriver_img_alt_text')) { echo sassriver_img_alt_text( $preloader_image_url ); } ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- preloader end -->

    <!-- back-to-top-button-start -->
    <?php if( $enable_scroll_up == true ) : ?>
    <div class="wa-back-to-top wa_backToTop">
        <i class="fa-solid fa-angle-up"></i>
    </div>
    <?php endif; ?>
    <!-- back-to-top-button-end -->

    <!-- header start -->
    <?php do_action( 'sassriver_header_style' ); ?>
    <!-- header end -->

    <div class="wa-overly"></div>

    <!-- wrapper-box start -->
    <?php do_action( 'sassriver_before_main_content' ); ?>