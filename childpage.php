<?php
/*
	Template Name: A child page
*/
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bka2020
 */

$parent_page_id = wp_get_post_parent_id( $post_ID );
$parent_title = get_the_title( $post->post_parent );
$parent_title = 'Other pages in '.$parent_title.' are:';

get_header(); ?>

<div class="container mx-auto ">

	<div class="flex flex-col align-stretch">

		<!-- <div class="sm:w-3/4 px-2"> -->
		<div class=" p-4">

			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<div class="bg-green-400 p-4 ">
						<ul class="list-disc pl-6 li-py-2">
						<?php
						wp_list_pages( array(
							'title_li'    => $parent_title ,
							'child_of' => $parent_page_id
						) );
						?>

						</ul>
					</div>

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						get_template_part( 'views/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile;

					?>

				</main><!-- #main -->
			</div><!-- #primary -->

		</div><!-- .col- -->
<!-- disabled sidebar oct 2018 -->
		<div class=" p-4">
			<?php // get_sidebar(); ?>
		</div>

	</div><!-- .row -->

</div><!-- .container -->

<?php
get_footer();
