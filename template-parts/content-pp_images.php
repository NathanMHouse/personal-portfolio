<?php
/**
 * Template part for displaying image excerpts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Portfolio
 */

$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>

<img
    class="images__image popup-image"
    src="<?php echo esc_attr(  $featured_image_url ); ?>"
    href="<?php echo esc_attr(  $featured_image_url ); ?>"
>
