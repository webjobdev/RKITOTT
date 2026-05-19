<?php
$sassriver_enable_blog_navigation = cs_get_option('tx_enable_blog_navigation');
$sassriver_prev_post = get_previous_post();
$sassriver_next_post = get_next_post();

if( $sassriver_enable_blog_navigation == true ) {
    if(!empty(get_previous_post() || get_next_post()) ) {
        ?>

        <div class="tx-nextPrev-post-wrapper">
            <div class="tx-item">
                <?php
                    $sassriver_prev_post_img = get_the_post_thumbnail_url( $sassriver_prev_post, 'full' );
                    if( !empty($sassriver_prev_post_img) ) :
                ?>
                <div class="tx-thumb">
                    <a href="<?php echo esc_url(get_permalink($sassriver_prev_post->ID)); ?>">
                        <img src="<?php print esc_url($sassriver_prev_post_img); ?>" alt="<?php if(function_exists('sassriver_img_alt_text')) { echo sassriver_img_alt_text( $sassriver_prev_post_img ); } ?>">
                        <i class="fa-solid fa-angle-left blog-details-navigate-icon"></i>
                    </a>
                </div>
                <?php endif; ?>
                <div class="tx-content">
                    <span class="tx-date"><?php print esc_html(get_the_date( get_option( 'date_format' ), $sassriver_prev_post )); ?></span>
                    <h3 class="tx-title">
                        <a href="<?php print get_the_permalink($sassriver_prev_post); ?>" aria-label="blog">
                            <?php print get_the_title($sassriver_prev_post); ?>
                        </a>
                    </h3>
                </div>
            </div>
            <div class="tx-item">
                <div class="tx-content">
                    <span class="tx-date"><?php print esc_html(get_the_date( get_option( 'date_format' ), $sassriver_next_post )); ?></span>
                    <h3 class="tx-title">
                        <a href="<?php print get_the_permalink($sassriver_next_post); ?>" aria-label="blog">
                            <?php print get_the_title($sassriver_next_post); ?>
                        </a>
                    </h3>
                </div>
                <?php
                    $sassriver_next_post_img = get_the_post_thumbnail_url( $sassriver_next_post, 'full' );
                    if( !empty($sassriver_next_post_img) ) :
                ?>
                <div class="tx-thumb">
                    <a href="<?php echo esc_url(get_permalink($sassriver_next_post->ID)); ?>">
                        <img src="<?php print esc_url($sassriver_next_post_img); ?>" alt="<?php if(function_exists('sassriver_img_alt_text')) { echo sassriver_img_alt_text( $sassriver_next_post_img ); } ?>">
                        <i class="fa-solid fa-angle-left blog-details-navigate-icon"></i>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    <?php
    }
}
?>