<section class='wrap_mine'>
<?php get_header(); ?>

<main class="site-main">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php the_content(); ?>

		<?php endwhile; else: ?>

		<?php endif; ?>

	</main><!-- #main -->
	</section>

<?php get_footer(); ?>



