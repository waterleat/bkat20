<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bka2020
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="text-4xl font-bold page-title"><?php esc_html_e( 'Nothing Found', 'Bka2020' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
		?>
			<p>
				<?php
				printf(
					/* translators: 1: link. */
					wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'Bka2020' ), array(
						'a' => array(
							'href' => array(),
						),
					) ), esc_url( admin_url( 'post-new.php' ) )
				);
				?>
			</p>
			<?php
		elseif ( is_search() ) :
			?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'Bka2020' ); ?></p>
			<?php
			get_search_form();
		else :
			?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'Bka2020' );?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div>
</section>
