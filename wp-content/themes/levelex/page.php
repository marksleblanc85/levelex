<?php get_header(); ?>
	<main role="main" class="lightbg">
		<div class="wrapper ">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<h2 class="brackets"><span><?php the_title(); ?></span></h2>
				<div class="content wrapper">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</main>
<?php get_footer(); ?>
