<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */
get_header(); ?>
<section>
	<div id="primary" class="container content-area">
		<main id="main" class="site-main row error-404 not-found" role="main">	
			<h1><?php _e( '404', 'iaptheme' ); ?></h1>
			<p><?php _e( 'Sfarsitul internetului! Nu am putut sa gasim aceasta pagina' );?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>