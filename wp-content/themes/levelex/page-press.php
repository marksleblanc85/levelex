<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<main role="main">
		<section class="team">
			<div class="wrapper ">
				<div class="brackets">
					<h2>
						<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-left.png" height="32">
						<span>In The News</span>
						<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-right.png" height="32">
					</h2>
				</div>
				<div class="press-list-top wrapper wrap">
					<?php
						$args = array (
							'post_type'              => array( 'post' ),
							'post_status'            => array( 'publish' ),
							'nopaging'               => true,
							'order'                  => 'ASC',
							'orderby'                => 'post_date',
							'cat' => 7,
						);
						$posts = new WP_Query( $args );
						if ( $posts->have_posts() ) {
							while ( $posts->have_posts() ) {
								$posts->the_post();
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $posts->ID ), 'single-post-thumbnail' );
								?>
									<div class="press-item column row">
										<div class="column">
											<a href="<?= get_field('press_url'); ?>" target="_blank">
												<img src="<?php echo $image[0]; ?>" alt="">
											</a>
											<h4><a href="<?= get_field('press_url'); ?>" target="_blank"><?php the_title(); ?></a></h4>
										</div>
									</div>
								<?php
								
							}
						}
						wp_reset_postdata();
					?>
				</div>
			</div>
			<div class="wrapper">
				<div class="brackets wide">
					<h2>
						<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-left.png" height="32">
						<span>Press Releases</span>
						<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-right.png" height="32">
					</h2>
				</div>
				<div class="press-releases">
					<?php
						$args = array (
							'post_type'              => array( 'post' ),
							'post_status'            => array( 'publish' ),
							'nopaging'               => true,
							'order'                  => 'ASC',
							'orderby'                => 'menu_order',
							'cat' => 5,
						);

						// The Query
						$posts = new WP_Query( $args );

						// The Loop
						if ( $posts->have_posts() ) {
							while ( $posts->have_posts() ) {
								$posts->the_post();
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $posts->ID ), 'single-post-thumbnail' );
								?>
									<div class="press-release">
										<a href="<?php the_permalink(); ?>"><?= get_the_title(); ?></a>
										<p><em><?= the_date(); ?></em></p>
									</div>
								<?php
								
							}
						} else {
							// no posts found
						}

						wp_reset_postdata();
					?>
					
				</div>
			</div>
		</section>
	</main>
	<?php get_footer(); ?>
	<?php endwhile; ?>
	<?php endif; ?>
	<script type="text/javascript">
		window.onload = function() {
		    document.body.className += " loaded";
		}
	</script>

