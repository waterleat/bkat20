<?php
/**
 * Template Name: New Member Template
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Bka2020
 */

get_header();

 /* Start the Loop */
while ( have_posts() ) :
 the_post();

get_template_part('membership/newmember/mem', $post->post_name);


endwhile;

get_footer();
