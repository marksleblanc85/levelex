<?php get_header(); ?>
	<main role="main">
		<section class="team">
			<!-- <div class="hero hdr-offset wrapper"></div> -->
			<div class="wrapper">
				<div class="brackets">
					<h2>
						<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-left.png" height="32">
						<span>Team Leaders</span>
						<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-right.png" height="32">
					</h2>
				</div>
				
				<div class="content desc">
					<p>Level Ex unites elite talent from the video game industry, expert physicians and surgeons from top hospitals, and industry leaders from digital health to create the company's acclaimed medical games.</p>
				</div>
			</div>
			<div class="wrapper">
				<div class="team-list">
					<?php
						$args = array (
							'post_type'              => array( 'team' ),
							'post_status'            => array( 'publish' ),
							'nopaging'               => true,
							'posts_per_page' 		 => '1',
							'order'                  => 'ASC',
							'orderby'                => 'menu_order',
						);

						// The Query
						$team = new WP_Query( $args );

						// The Loop
						if ( $team->have_posts() ) {
							while ( $team->have_posts() ) {
								$team->the_post();
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $team->ID ), 'single-post-thumbnail' );
								?>
									<div class="team-member row">
										<div class="column">
											<img src="<?php echo $image[0]; ?>" alt="">
											<div class="socials">
												<?php if( get_field('team_linkedin')): ?>
													<a href="<?= get_field('team_linkedin'); ?>"><i class="fab fa-linkedin"></i></a>
												<?php endif ?>
												<?php if( get_field('team_twitter')): ?>
													<a href="<?= get_field('team_twitter'); ?>"><i class="fab fa-twitter"></i></a>
												<?php endif ?>
											</div>
										</div>
										<div class="column details">
											<h4><?php the_title(); ?></h4>
											
											<p><em><?= get_field('team_title'); ?></em></p>
											
											<div class="content">
												<?php the_content(); ?>
											</div>
										</div>
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
			<div class="wrapper">
				<div class="brackets">
					<h2>
						<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-left.png" height="32">
						<span>Physician Advisors</span>
						<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-right.png" height="32">
					</h2>
				</div>
				<div class="row advisors">
					<div class="column">
						<p>
							<span>Eric Gantwerker, MD, FACS</span><br>
							Vice President, Medical Director<br><br>

							<span>Kyle Hogarth, MD</span><br>
							Interventional Pulmonology<br>
							University of Chicago<br><br>

							<span>Neeraj Desai, MD</span><br>
							General & Interventional Pulmonology<br>
							Amita Health<br><br>

							<span>Komal Bajaj, MD</span><br>
							OBGYN & Medical Simulation<br>
							NYC Health + Hospitals<br><br>

							<span>Adrian Pichurko, MD</span><br>
							Anesthesiology<br>
							Northwestern Hospital<br><br>

							<span>Charles Lei, MD</span><br>
							Emergency Medicine<br>
							Vanderbilt UMC

						</p>
					</div>
					<div class="column">
						<p>
							<span>Adam Ehrlich, MD</span><br>
							Gastroenterology<br>
							Temple University Hospital<br><br>

							<span>Atman Shah, MD</span><br>
							Interventional Cardiology<br>
							University of Chicago Medicine<br><br>

							<span>Errol Gordon, MD</span><br>
							Neurology & Critical Care<br>
							Mount Sinai Hospital<br><br>

							<span>Brian Gantwerker, MD</span><br>
							Neurosurgery<br>
							Craniospinal Center (LA)<br><br>

							<span>Ray Glassenberg, MD</span><br>
							Anesthesiology<br>
							Northwestern Hospital<br><br>

							<span>Diana Lerner, MD</span><br>
							Gastroenterology<br>
							Medical College of Wisconsin
						</p>
					</div>
				</div>
			</div>
			<div class="wrapper">
				<h2 class="brackets"><span>Board of Directors</span></h2>
				<div class="row flex board">
					<div class="column">
						<p>
							<strong>Sam Glassenberg</strong><br>
							Founder & CEO<br>
							Level Ex, Inc.
						</p>
					</div>
					<div class="column">
						<p>
							<strong>John F. Harris</strong><br>
							JAZZ Venture Partners<br>
						</p>
					</div>
					<div class="column">
						<p>
							<strong>Dan Malven</strong><br>
							4490 Ventures
						</p>
					</div>
					<div class="column">
						<p>
							<strong>Genevieve Paquette</strong><br>
							Chief Marketing Officer<br>
							Level Ex, Inc.
						</p>
					</div>
					<div class="column">
						<p>
							<strong>Garrett Vygantas, MD</strong><br>
							OSF Ventures<br>
							(Observer)
						</p>
					</div>
				</div>
			</div>
		</section>
	</main>
	<?php get_footer(); ?>
	<script type="text/javascript">
		window.onload = function() {
		    document.body.className += " loaded";
		}
	</script>

