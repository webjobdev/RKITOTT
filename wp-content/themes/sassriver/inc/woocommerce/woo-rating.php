<?php

/**
 * [sassriver_woo_rating description]
 * @return [type] [description]
 */
function sassriver_product_details_rating(){
    global $product;
    $rating = $product->get_average_rating();
    $rating_count = $product->get_review_count();
    $html = '';
    $html .= '<div class="shop-detail_rating">';
    for ($i = 0; $i <= 4; $i++) {
        if ($i < floor($rating)) {
            $html .= '<span class="fas fa-star"></span>';
        } else {
            $html .= '<span class="fal fa-star"></span>';
        }
    }
    $html .= '
        <i class="tx-ratingText">( ' . $rating_count . ' Customar Review )</i>';
    $html .= '</div>';
    print sassriver_product_details_rating_render($html);
}

function sassriver_product_details_rating_render($html){
    return $html;
}

function sassriver_woo_rating_for_shop(){
    global $product;
    $rating = $product->get_average_rating();
    $rating_count = $product->get_review_count();
    $html = '';
    $html .= '<div class="sassriver-rating-wrapper rating">';
    for ($i = 0; $i <= 4; $i++) {
        if ($i < floor($rating)) {
            $html .= '<i class="fa fa-star"></i> ';
        } else {
            $html .= '<i class="light fa fa-star"></i>';
        }
    }
    $html .= '</div>';
    print sassriver_woo_rating_for_shop_html($html);
}

function sassriver_woo_rating_for_shop_html($html){
    return $html;
}

/**
 * [sassriver_woo_rating description]
 * @return [type] [description]
 */
function sassriver_woo_shop_rating()
{
    global $product;
    $rating = $product->get_average_rating();
    $review = esc_html('' . $rating . ' review');
    ob_start(); ?>
    <div class="sassriver-rating-wrapper sassriver-rating-wrapper__details">
        <?php
        for ($i = 0; $i <= 4; $i++) {
            if ($i < floor($rating)) { ?>
                <i class="fas fa-star"></i>
                <?php
            } else { ?>
                <i class="far fa-star"></i>
                <?php
            }
        }
        ?>
    </div>
    <?php
    return ob_get_clean();
}