<?php get_header(); ?>
	<main role="main">
		<section class="games">
			<div class="wrapper">
				<h2 class="brackets">
					<span>Our Games</span>
				</h2>
				<div class="content desc">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="wrapper">
				<div class="row">
					<div class="column">
						<img src="<?php echo get_template_directory_uri(); ?>/img/card-airway-ex.png">
					</div>
					<div class="column">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo-airway-ex.png" width="300">
						<p>
							Perform Difficult Airway procedures using the latest medical devices; plus, anesthesia simulations on our fully-interactive virtual patients that breathe, bleed, responds to pressure, can laryngospasm, and more. Our Airway Ex video game is used by anesthesiologists, emergency medicine physicians, and other providers to hone their skills and earn CME credit.
						</p>
						<a href="https://itunes.apple.com/us/app/airway-ex/id1154656060?mt=8" target="_blank"><i class="fab fa-apple"></i></a>
						<a href="https://play.google.com/store/apps/details?id=com.levelex.airwayex&hl=en_US" target="_blank"><i class="fab fa-google-play"></i></a>
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

