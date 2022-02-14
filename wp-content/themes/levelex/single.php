<?php get_header(); ?>
	<main role="main" class="lightbg">
	<section>
		<div class="wrapper">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" class="content">
					<?php if(get_field('apply_button_url')): ?>
						<div class="fill">
							<h1><?php the_title(); ?></h1>
							<a href="<?php the_field('apply_button_url'); ?>" class="btn btn-apply" target="_blank">Apply Now</a>
						</div>
					<?php else: ?>
						<h1><?php the_title(); ?></h1>
						<p><span class="date"><?php the_time('F j, Y'); ?></span></p>
					<?php endif; ?>
					
					<?php the_content(); ?>
					<br><br>
				</article>
				<?php endwhile; ?>
				<?php else: ?>
					<article>
						<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
					</article>
				<?php endif; ?>
			</div>
		</section>
	</main>
<?php get_footer(); ?>
