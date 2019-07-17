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
?>
<section id="hero" class="hero">

	<!-- before --> 
	<div class="hero-item" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' );?>)">
		<div class="hero-content container">
			<div class="hero-avatar">
				<?php echo get_avatar('medeline2012@gmail.com'); ?> 

				<!--poza de pe contul gravatar https://en.gravatar.com/ pe care m-am logat cu adresa de email  <--></-->

			</div> -->

			<div class="hero-title">
				<?php the_title(); ?>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 content-area">
				<?php
					// Start the loop.
					while ( have_posts() ) : the_post(); 
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1><?php the_title(); ?></h1>	
					<?php the_content(); ?>
					<footer>

							<?php echo get_avatar(get_the_author_meta('user_email')); ?>
							<h3>
							<?php echo get_the_author_meta('user_firstname'); ?>
							<?php echo get_the_author_meta('user_lastname'); ?>
							<!-- facebook + twitter -->

						</h3>
						<p>
							<?php echo get_the_author_meta('user_description'); ?>
							</p>
							
						</footer>

				</article>

				<?php
		if ( comments_open() || get_comments_number() ) {
						comments_template();
					}		
					endwhile; 
				?>
			</div>
			
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>