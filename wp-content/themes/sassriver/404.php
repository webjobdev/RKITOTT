<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sassriver
 */

get_header();

$sassriver_error_image = cs_get_option( 'tx_error_image', get_template_directory_uri() . '/assets/img/shape/404-img.webp' );
$tx_error_title_1 = cs_get_option( 'tx_error_title_1', esc_html__( '404', 'sassriver' ) );
$tx_error_title_2 = cs_get_option( 'tx_error_title_2', esc_html__( 'Oops! Page Not Found.', 'sassriver' ) );
if(isset($sassriver_site_logo['url'])) {
	$image_url = $sassriver_error_image['url'];
} else {
	$image_url = get_template_directory_uri() . '/assets/img/shape/404-img.webp';
}
$sassriver_error_link_text = cs_get_option('tx_error_link_text', __('Back To Home Page', 'sassriver'));

?>
<!-- not-found-start -->
<div class="lbt-not-found-area">
	<div class="container">
		<div class="lbt-not-found-wrap">
			<?php if(!empty( $tx_error_title_1 )) : ?>
			<h2 class="lbt-not-found-big-title"><?php print esc_html($tx_error_title_1); ?></h2>
			<?php endif; ?>
			<div class="lbt-not-found-img">
				<img src="<?php echo esc_url($image_url) ? esc_url($image_url) : ''; ?>" alt="<?php if(function_exists('sassriver_img_alt_text')) { echo sassriver_img_alt_text( $image_url ); } ?>">
			</div>
			<?php if(!empty( $tx_error_title_2 )) : ?>
			<h3 class="lbt-not-found-title"><?php print esc_html($tx_error_title_2); ?></h3>
			<?php endif; ?>
			<?php if(!empty( $sassriver_error_link_text )) : ?>
			<a href="<?php echo esc_url(home_url()); ?>" class="sr-pr-btn-1 btn_split_1 wow fadeInRight2" data-wow-delay=".5s">
				<span class="text"><?php print esc_html($sassriver_error_link_text); ?></span>
				<span class="icon">
					<i class="ph ph-caret-double-right"></i>
					<i class="ph ph-caret-double-right"></i>
				</span>
			</a>
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- not-found-end -->

<?php
get_footer();
