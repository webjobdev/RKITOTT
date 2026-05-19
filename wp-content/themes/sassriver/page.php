<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sassriver
 */

get_header();
if(  SASSRIVER_WOOCOMMERCE_ACTIVED) {
	if ( 'product' !== get_post_type() || is_checkout() || is_cart() || is_account_page() ) {
		$class = 'page-area pt-120 pb-120 fix';
	} else {
		$class = 'page-area pb-120 pt-120 fix';
	}
} else {
	$class = 'page-area pb-120 pt-120 fix';
}

?>

<div class="<?php echo esc_attr($class); ?>">
	<div class="container chy-container-1">
		<div class="row">
			<div class="col-xl-12">
				<div class="tx-page-content">
				<?php
					if ( have_posts() ):
						while ( have_posts() ): the_post();
							get_template_part( 'post-formats/content', 'page' );
						endwhile;
					else:
						get_template_part( 'post-formats/content', 'none' );
					endif;
				?>
				</div>
			</div>
		</div>
    </div>
</div>

<?php
get_footer();
