<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sassriver
 */
    $author_bio_avatar_size = 64;
    $tx_enable_social_share = cs_get_option( 'tx_enable_social_share' );

    // enable_blog_button
    $enable_blog_button = cs_get_option( 'enable_blog_button', true );
    $enable_author_meta = cs_get_option( 'enable_author_meta', true );
    $enable_default_date = cs_get_option( 'enable_default_date', true );
    $enable_comment_meta = cs_get_option( 'enable_comment_meta', true );
    $blog_button_text = cs_get_option( 'blog_button_text', __('Read More', 'sassriver') );
    $excerpt_length = cs_get_option( 'excerpt_length', 180 );

    // post read time
    $post_read_time = sassriver_post_read_time();

    $has_thumb = '';
    if(has_post_thumbnail()) {
        $has_thumb = 'has-thumbnail';
    } else {
        $has_thumb = 'has-nOthumbnail';
    }
    $id = get_the_ID();

    $post_author_name = get_the_author_meta('display_name');

    // use placeholder image if author has no image
    $post_author_image = get_the_author_meta('user_profile_image');
    if ( empty( $post_author_image ) ) {
        $post_author_image = get_template_directory_uri() . '/assets/img/author.webp';
    }



    if ( is_single() ):
?>

    <article id="post-<?php the_ID(); ?>"  <?php post_class( 'tx-blog-box tx-blogDetails-box'); ?>>
        <div class="blog-details-page-content">
            <div class="blog-details-item">
                <div class="tx-blogDetails-box__wrapper">
                    <div class="post-details-content tz-blog-details-text headline pera-content">
                        <?php if ( has_post_thumbnail() ): ?>
                        <div class="tz-thumb mb-30">
                            <?php the_post_thumbnail( 'full', ['class' => 'img-responsive w-100'] ); ?>
                        </div>
                        <?php endif; ?>
                        <div class="item-meta">
                            <?php if( $enable_default_date == true ) : ?>
                            <a href="<?php the_permalink(); ?>"><i class="fa-regular fa-calendar"></i> <?php echo esc_html( get_the_date( get_option( 'date_format' ), $id ) ); ?></a>
                            <?php endif; ?>

                            <?php if( $enable_author_meta == true ) : ?>
                            <a href="<?php the_permalink(); ?>"><i class="fa-regular fa-user"></i> <?php echo esc_html($post_author_name); ?></a>
                            <?php endif; ?>

                            <?php if( $enable_comment_meta == true ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <i class="fa-solid fa-comments"></i>
                                <?php
                                    $comment_count = get_comments_number();
                                    $comment_text = ($comment_count === '1') ? ' Comment' : ' Comments';
                                    echo esc_html($comment_text, 'logistify') . '(' . $comment_count . ')';
                                ?>
                            </a>
                            <?php endif; ?>
                        </div>
                        <?php the_content(); ?>
                    </div>
                    <div class="post-page-wrapper">
                        <?php
                            wp_link_pages( [
                                'before'      => '<div class="page-links mt-40 mb-55">' . esc_html__( 'Pages:', 'sassriver' ),
                                'after'       => '</div>',
                                'link_before' => '<span class="page-number">',
                                'link_after'  => '</span>',
                            ] );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <?php else: ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class( 'tx-blog-box mt-30'); ?>>
        <div class="tz-blog-item list-view-item">
            <?php if ( has_post_thumbnail() ): ?>
            <div class="item-img">
                <?php the_post_thumbnail( 'full', ['class' => 'img-responsive w-100'] ); ?>
            </div>
            <?php endif; ?>
            <div class="item-text headline pera-content">
                <div class="item-meta">
                    <?php if( $enable_default_date == true ) : ?>
                    <a href="<?php the_permalink(); ?>"><i class="fa-regular fa-calendar"></i> <?php echo esc_html( get_the_date( get_option( 'date_format' ), $id ) ); ?></a>
                    <?php endif; ?>

                    <?php if( $enable_author_meta == true ) : ?>
                    <a href="<?php the_permalink(); ?>"><i class="fa-regular fa-user"></i> <?php echo esc_html($post_author_name); ?></a>
                    <?php endif; ?>

                    <?php if( $enable_comment_meta == true ) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <i class="fa-solid fa-comments"></i>
                        <?php
                            $comment_count = get_comments_number();
                            $comment_text = ($comment_count === '1') ? ' Comment' : ' Comments';
                            echo esc_html($comment_text, 'logistify') . '(' . $comment_count . ')';
                        ?>
                    </a>
                    <?php endif; ?>
                </div>
                <h3 class="blog_title">
                    <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>
                <?php if(!empty( get_the_excerpt() )) : ?>
                <p>
                    <?php
                        $excerpt = get_the_excerpt();
                        $excerpt = substr($excerpt, 0, $excerpt_length);
                        if (strlen(get_the_excerpt()) > $excerpt_length) {
                            $excerpt .= '...';
                        }
                        echo esc_html($excerpt);
                    ?>
                </p>
                <?php endif; ?>

                <?php if( $enable_blog_button == true ) : ?>
                <a class="read_more" href="<?php the_permalink(); ?>"><?php echo esc_html($blog_button_text); ?> <i class="fa-solid fa-angles-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </article>
    <?php endif; ?>
