<?php /* Template Name: Careers */ ?>
<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<main role="main">
		<section class="team">
			<div class="wrapper text-center">
				<div class="brackets slim">
					<h2>
						<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-left.png" height="32">
						<span>Careers</span>
						<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-right.png" height="32">
					</h2>
				</div>
				<div class="wrapper all-jobs">
					<div class="row wrap">
						<div class="column center">
							<h3>Game Development</h3>
							<div class="press-list-top wrapper wrap">
								<ul class="job-list">
								<?php
									$args = array (
										'post_type'              => array( 'careers' ),
										'post_status'            => array( 'publish' ),
										'nopaging'               => true,
										'order'                  => 'ASC',
										'orderby'                => 'menu_order',
										'tax_query' => array(
									        array (
									            'taxonomy' => 'career-categories',
									            'field' => 'slug',
									            'terms' => 'game-development'
									        )
									    ),
									);
									$posts = new WP_Query( $args );
									if ( $posts->have_posts() ) {
										while ( $posts->have_posts() ) {
											$posts->the_post();?>
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
											<?php
										}
									} else {
										echo '<h4>No available positions</h4>';
									}
									wp_reset_postdata();
									wp_reset_query();
								?>
								</ul>
							</div>
						</div>
						<div class="column center">
							<h3>Operations</h3>
							<ul class="job-list">
								<?php
									$args = array (
										'post_type'              => array( 'careers' ),
										'post_status'            => array( 'publish' ),
										'nopaging'               => true,
										'order'                  => 'ASC',
										'orderby'                => 'menu_order',
										'tax_query' => array(
									        array (
									            'taxonomy' => 'career-categories',
									            'field' => 'slug',
									            'terms' => 'operations'
									        )
									    ),
									);
									$posts = new WP_Query( $args );
									if ( $posts->have_posts() ) {
										while ( $posts->have_posts() ) {
											$posts->the_post();?>
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
											<?php
										}
									} else {
										echo '<h4>No available positions</h4>';
									}
									wp_reset_postdata();
									wp_reset_query();
								?>
								</ul>
						</div>
						<div class="column center">
							<h3>Marketing</h3>
							<ul class="job-list">
								<?php
									$args = array (
										'post_type'              => array( 'careers' ),
										'post_status'            => array( 'publish' ),
										'nopaging'               => true,
										'order'                  => 'ASC',
										'orderby'                => 'menu_order',
										'tax_query' => array(
									        array (
									            'taxonomy' => 'career-categories',
									            'field' => 'slug',
									            'terms' => 'marketing'
									        )
									    ),
									);
									$posts = new WP_Query( $args );
									if ( $posts->have_posts() ) {
										while ( $posts->have_posts() ) {
											$posts->the_post();?>
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
											<?php
										}
									} else {
										echo '<h4>No available positions</h4>';
									}
									wp_reset_postdata();
									wp_reset_query();
								?>
								</ul>
						</div>
						<div class="column center">
							<h3>Sales</h3>
							<ul class="job-list">
								<?php
									$args = array (
										'post_type'              => array( 'careers' ),
										'post_status'            => array( 'publish' ),
										'nopaging'               => true,
										'order'                  => 'ASC',
										'orderby'                => 'menu_order',
										'tax_query' => array(
									        array (
									            'taxonomy' => 'career-categories',
									            'field' => 'slug',
									            'terms' => 'sales'
									        )
									    ),
									);
									$posts = new WP_Query( $args );
									if ( $posts->have_posts() ) {
										while ( $posts->have_posts() ) {
											$posts->the_post();?>
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
											<?php
										}
									} else {
										echo '<h4>No available positions</h4>';
									}
									wp_reset_postdata();
									wp_reset_query();
								?>
								</ul>
						</div>
						<!-- <div class="column center">
							<h3>Medical</h3>
							<ul class="job-list">
								<?php
									$args = array (
										'post_type'              => array( 'careers' ),
										'post_status'            => array( 'publish' ),
										'nopaging'               => true,
										'order'                  => 'ASC',
										'orderby'                => 'menu_order',
										'tax_query' => array(
									        array (
									            'taxonomy' => 'career-categories',
									            'field' => 'slug',
									            'terms' => 'medical'
									        )
									    ),
									);
									$posts = new WP_Query( $args );
									if ( $posts->have_posts() ) {
										while ( $posts->have_posts() ) {
											$posts->the_post();?>
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
											<?php
										}
									} else {
										echo '<h4>No available positions</h4>';
									}
									wp_reset_postdata();
									wp_reset_query();
								?>
								</ul>
						</div> -->
					</div>
				</div>
				
			</div>
			
		</section>
	</main>
	<?php get_footer(); ?>
	<?php wp_reset_query(); ?>
	<?php endwhile; ?>
	<?php endif; ?>
	<script type="text/javascript">
		window.onload = function() {
		    document.body.className += " loaded";
		}
	</script>

