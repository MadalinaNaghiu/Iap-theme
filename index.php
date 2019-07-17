<?php get_header(); ?>
<?php 
	/**
	 * #hero section will be coded live with you so you 
	 * only need to look at css/hero.css file. 
	 * There you can find the styles for this section.
	 *
	 * We will create a custom WordPress query and get posts based on a tag/category 
	 * called featured_post.
	 */
	/**
	<section id="hero" class="hero">
	<div class="hero-item">
		<div class="hero-content container">
			<div class="hero-avatar">
				<?php echo get_avatar('medeline2012@gmail.com'); ?>
			</div>
			<div class="hero-title">
				Titlu pagina
			</div>
		</div>
	</div>
</section>
*/
?>
<section class="hero-slider">
<?php
	// Query arguments : https://codex.wordpress.org/Class_Reference/WP_Query
	$args = array(
		'posts_per_page'	=> 4,
		'orderby'			=> 'date',
		'order'				=> 'DESC',
    	// 'category_name' 	=> 'featured'
	);
	
	// create the query
	$slider = new WP_Query($args);
	
	// loop through the new created query  
	if ( $slider->have_posts() ) :
		while ( $slider->have_posts() ) : $slider->the_post();
			?>
			<div id="hero" <?php post_class('hero'); ?>>
			<style>
				.post-<?php echo get_the_ID(); ?> .hero-item {
					background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' );?>);
				}
			</style>
				<div class="hero-item">
					<div class="hero-content container">
						<div class="hero-avatar">
							<?php echo get_avatar(get_the_author_meta('user_email')); ?>
						</div>
						<div class="hero-title">
							<?php the_title(); ?>
						</div>
					</div>
				</div>
			</div>
			<?php
		endwhile;
	else: 
		echo __( 'There are no posts to show', 'textdomain' );
	endif;
	
	wp_reset_postdata(); 
?>
</section>

<div id="primary" class="container content-area">
	<main id="main" class="site-main row" role="main">
		<?php 
		/**
		 * Verify if we have posts to show
		 */
		if ( have_posts() ) : 
			/**
			 * While we have posts we loop through them and show 
			 * their title, excerpt, date, category etc.
			 */
			while ( have_posts() ) : the_post(); 
			/**
			 * Check if post is sticky :
			 * https://developer.wordpress.org/reference/functions/is_sticky/
			 */
			if ( is_sticky() ) : 
		?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12'); ?>>
				<header class="article-header">
					<?php 
						/**
						 * Get the post featured image.
						 * The featured image size is the one we have defined in 
						 * functions.php file
						 */
						the_post_thumbnail('featured-image-sticky'); 
					?>
					<?php 
						/**
						 * Get the post category function
						 * You can find the documentation link below: 
						 * https://developer.wordpress.org/reference/functions/get_the_category/
						 */
						the_category(); 
					?>
				</header>
				<div class="article-title">

					<?php 
						/**
						 * Show the title of the post wrapped in <h2> tags with
						 * .entry-title class.
						 * esc_url is a WordPress function that verifies that the 
						 * URL provided by get_permalink is valid (sort of)
						 * get_permalink will get the post url so we can read the 
						 * post details.
						 */
						the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
					?>
					<span class="article-meta">
						<?php 
							/**
							 * get_the_date will show the publish date for the article
							 * The parameters availabile for this function are listed in the
							 * php manual : https://www.php.net/manual/en/function.date.php
							 *
							 * get_the_author function will display the post author.
							 * docs: https://codex.wordpress.org/Function_Reference/get_the_author
							 */
						?>
						<?php echo get_the_date('d F Y'); ?> | <strong><?php echo get_the_author(); ?></strong>
					</span>
				</div>
			</article>
		<?php 
			else :
		?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4'); ?>>
				<header class="article-header">
					<?php 
						/**
						 * Get the post featured image.
						 * The featured image size is the one we have defined in 
						 * functions.php file
						 */
						the_post_thumbnail('featured-image-small'); 
					?>
					<?php 
						/**
						 * Get the post category function
						 * You can find the documentation link below: 
						 * https://developer.wordpress.org/reference/functions/get_the_category/
						 */
						the_category(); 
					?>
				</header>
				<div class="article-title">

					<?php 
						/**
						 * Show the title of the post wrapped in <h2> tags with
						 * .entry-title class.
						 * esc_url is a WordPress function that verifies that the 
						 * URL provided by get_permalink is valid (sort of)
						 * get_permalink will get the post url so we can read the 
						 * post details.
						 */
						the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
					?>
					<span class="article-meta">
						<?php 
							/**
							 * get_the_date will show the publish date for the article
							 * The parameters availabile for this function are listed in the
							 * php manual : https://www.php.net/manual/en/function.date.php
							 *
							 * get_the_author function will display the post author.
							 * docs: https://codex.wordpress.org/Function_Reference/get_the_author
							 */
						?>
						<?php echo get_the_date('d F Y'); ?> | <strong><?php echo get_the_author(); ?></strong>
					</span>
				</div>
			</article>
		<?php  
			endif;
			/**
			 * End of the while loop. We have listed all the posts.
			 */
			endwhile; 
		else :
			/**
			 * If there are no posts to show than display a 
			 * custom message
			 */
			echo _e( 'There are no articles to show', 'iap' );
		endif;
		?>
	</main>

	<?php wp_pagenavi(); ?> 
	
	</div>		

<?php get_footer(); ?>