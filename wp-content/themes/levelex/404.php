<?php get_header(); ?>
	<main role="main">
		<section>
			<div class="wrapper">
				<article id="post-404" class="text-center">
					<h2 class="brackets"><span>404</span></h2>
					<div class="content">
						<p>This page doesn't exist. <a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'levelex' ); ?></a></p>
					</div>
				</article>
			</div>
		</section>
	</main>
<?php get_footer(); ?>