<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<main role="main">
		<section>
			<div class="hero shadow">
				<div class="content">
					<h1><?= the_field('hero_title'); ?></h1>
					<?= the_field('hero_content') ?>
				</div>
				<div class="shade"></div>
			</div>
			<div class="our-apps">
				<div class="wrapper text-center">
					<div class="brackets slim-mob">
						<h2>
							<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-left.png" height="32">
							<span>Medical Apps</span>
							<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-right.png" height="32">
						</h2>
					</div>
					<h4>Over 4 million cases played in 2018!</h4>
					<h3>Download our free apps for <span>iOS</span> and <span>Android</span></h3>
					
					<div class="row">
						<div class="column">
							<div class="shade">
								<img src="<?php echo get_template_directory_uri(); ?>/img/card-airway-ex.png" width="270">
							</div>
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo-airway-ex.png" width="200">
							<p>
								Played by Anesthesiologists, CRNAs, and Airway Specialists 
							</p>
							<div class="icons">
								<a href="https://itunes.apple.com/us/app/airway-ex/id1154656060?mt=8" target="_blank"><i class="fab fa-apple"></i></a>
								<a href="https://play.google.com/store/apps/details?id=com.levelex.airwayex&hl=en_US" target="_blank"><i class="fab fa-google-play"></i></a>
							</div>
						</div>
						<div class="column">
							<div class="shade">
								<img src="<?php echo get_template_directory_uri(); ?>/img/card-gastro-ex.png" width="270">
							</div>
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo-gastro-ex.png" width="200">
							<p>
								Played by Gastroenterologists and Colorectal surgeons 
							</p>
							<div class="icons">
								<a href="https://itunes.apple.com/us/app/gastro-ex/id1202398609?mt=8" target="_blank"><i class="fab fa-apple"></i></a>
								<a href="https://play.google.com/store/apps/details?id=com.levelex.gastroex" target="_blank"><i class="fab fa-google-play"></i></a>
							</div>
						</div>
						<div class="column">
							<div class="shade">
								<img src="<?php echo get_template_directory_uri(); ?>/img/card-pulm-ex.png" width="270">
							</div>
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo-pulm-ex.png" width="200">
							<p>
								Played by Pulmonologists and critical care specialists 
							</p>
							<div class="icons">
								<a href="https://itunes.apple.com/us/app/pulm-ex/id1357146922?mt=8" target="_blank"><i class="fab fa-apple" target="_blank"></i></a>
								<a title="Available soon!"><i class="fab fa-google-play"></i></a>
							</div>
						</div>
						<div class="column">
							<div class="shade">
								<img src="<?php echo get_template_directory_uri(); ?>/img/card-cardio-ex.png" width="270">
							</div>
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo-cardio-ex.png" width="200">
							<p>
								For general, EP, and interventional cardiologists 
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="review shadow">
				<div class="wrapper">
					<div class="column">
						<div class="testimonials">
							<div class="testimonial">
								<h2>EXTREMELY CHALLENGING!</h2>
								<hr>
								<blockquote>"The anatomy is very accurate. Some of the cases are extremely challenging. Overall, one of the best medical apps I’ve seen on my iPad."</blockquote>
								<cite>- App Store Review</cite>
							</div>
							<div class="testimonial">
								<h2>TRULY ENGAGING</h2>
								<hr>
								<blockquote>"A completely new way to train and excel. Hyper realistic scenarios are truly engaging."</blockquote>
								<cite>- App Store Review</cite>
							</div>
							<div class="testimonial">
								<h2>NO ONE HAS COME CLOSE!</h2>
								<hr>
								<blockquote>“I’ve seen others try and recreate anatomy but no one has come close to how accurate and realistic this app is.”</blockquote>
								<cite>- App Store Review</cite>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<div class="events">
				<div class="brackets wide">
					<h2>
						<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-left.png" height="32">
						<span>Upcoming Events</span>
						<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-right.png" height="32">
					</h2>
				</div>
				<div class="wrapper">
					<div class="events-list column">
						<?php 
							$args = array(
								'post_type'              => array( 'tribe_events' ),
								'order'                  => 'ASC',
								'orderby'                => 'modified',
							);
							$query = new WP_Query( $args );

							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post();
									echo '<div class="event">';
									echo '<h3><a href="'.tribe_get_event_meta( get_the_ID(), '_EventURL', true ).'" target="_blank">'.get_the_title().'</a></h3>';
									echo '<p><span class="date">';
									if (tribe_get_start_date() !== tribe_get_end_date() ) {
										echo tribe_get_start_date() .' - '. tribe_get_end_date();
									} else {
										echo tribe_get_start_date();
									}
									echo '</span></p>';
									echo '<p><em>'.tribe_get_venue().'</em></p>';
									echo '<div class="row">';
									echo '<a href="'.tribe_get_event_meta( get_the_ID(), '_EventURL', true ).'" target="_blank">';
									echo tribe_event_featured_image( $query->ID, 'large', false );
									echo '</a>';
									echo '<p class="desc">'.get_the_content().'</p>';
									echo '</div>';
									echo '<a href="'.tribe_get_event_meta( get_the_ID(), '_EventURL', true ).'" target="_blank">View Event <i class="fas fa-angle-double-right"></i></a>';
									echo '</div>';
								}
							} else {
								echo '<h2>No Events Scheduled</h2>';
							}

							wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
			<div class="review orange shadow">
				<div class="wrapper">
					<div class="column">
						<h2>LIFE-LIKE VIRTUAL PATIENTS</h2>
						<hr>
						<p>Level Ex games present life-like virtual patients that physicians can interact with from their phones, presenting with a spectrum of diseases and conditions. Level Ex virtual patients breathe, bleed, secrete fluids, and mimic tissue properties and responsive movements with striking precision. </p>
					</div>
				</div>
			</div>
			<div class="our-apps cases">
				<div class="wrapper text-center">
					<div class="brackets  wide-mob">
					<h2>
						<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-left.png" height="32">
						<span>Popular cases</span>
						<img src="<?php echo get_template_directory_uri(); ?>/img/bracket-right.png" height="32">
					</h2>
				</div>
					<div class="row">
						<div class="column">
							<a href="https://itunes.apple.com/us/app/pulm-ex/id1357146922?mt=8" class="case case1" target="_blank">
								<span>Play Now</span>
							</a>
							<p>Carpenter’s Conundrum <br>Pulm Ex CME Case</p>
						</div>
						<div class="column">
							<a href="https://itunes.apple.com/us/app/airway-ex/id1154656060?mt=8" target="_blank" class="case case2">
								<span>Play Now</span>
							</a>
							<p>Suprane LMA Case<br>In partnership with Baxter</p>
						</div>
						<div class="column">
							<a href="https://itunes.apple.com/us/app/gastro-ex/id1202398609?mt=8" class="case case3" target="_blank">
								<span>Play Now</span>
							</a>
							<p>Dieulafoy’s Dilemma<br>Gastro Ex GI Case</p>
						</div>
						<div class="column">
							<a href="https://itunes.apple.com/us/app/airway-ex/id1154656060?mt=8" class="case case4" target="_blank">
								<span>Play Now</span>
							</a>
							<p>Augmented Reality in Airway Ex<br>In partnership with Medtronic</p>
						</div>
					</div>
					<div class="modals">
						<div class="modal" id="modal-case-1">
							<i class="close fas fa-times"></i>
							<div class="row">
								<div class="column">
									<img src="<?php echo get_template_directory_uri(); ?>/img/thumb-case-1.png" alt="">
								</div>
								<div class="column text-center">
									<img src="<?php echo get_template_directory_uri(); ?>/img/logo-pulm-ex.png" height="40">
									<div class="case-title">Carpenter's<br><span>Conundrum</span></div>
									<p>Remove the nail from the bronchial tree and earn CME credits</p>
								</div>
							</div>
						</div>
						<div class="modal" id="modal-case-2">
							<i class="close fas fa-times"></i>
							<div class="row">
								<div class="column">
									<img src="<?php echo get_template_directory_uri(); ?>/img/thumb-case-2.png" alt="">
								</div>
								<div class="column text-center">
									<img src="<?php echo get_template_directory_uri(); ?>/img/logo-gastro-ex.png" height="40">
									<div class="case-title">Carpenter's<br><span>Conundrum</span></div>
									<p>Remove the nail from the bronchial tree and earn CME credits</p>
								</div>
							</div>
						</div>
						<div class="modal" id="modal-case-3">
							<i class="close fas fa-times"></i>
							<div class="row">
								<div class="column">
									<img src="<?php echo get_template_directory_uri(); ?>/img/thumb-case-3.png" alt="">
								</div>
								<div class="column text-center">
									<img src="<?php echo get_template_directory_uri(); ?>/img/logo-cardio-ex.png" height="40">
									<div class="case-title">Carpenter's<br><span>Conundrum</span></div>
									<p>Remove the nail from the bronchial tree and earn CME credits</p>
								</div>
							</div>
						</div>
						<div class="modal" id="modal-case-4">
							<i class="close fas fa-times"></i>
							<div class="row">
								<div class="column">
									<img src="<?php echo get_template_directory_uri(); ?>/img/thumb-case-4.png" alt="">
								</div>
								<div class="column text-center">
									<img src="<?php echo get_template_directory_uri(); ?>/img/logo-airway-ex.png" height="40">
									<div class="case-title">Carpenter's<br><span>Conundrum</span></div>
									<p>Remove the nail from the bronchial tree and earn CME credits</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php get_footer(); ?>
			</div>
		</section>
	</main>
	<?php endwhile; ?>
	<?php endif; ?>
	<script type="text/javascript">
		window.onload = function() {
		    document.body.className += " loaded";
		}
	</script>

