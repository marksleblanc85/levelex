<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<main role="main">
		<section>
			<div class="contact-us wrapper">
				<div class="box">
					<div class="row">
						<div class="column">
							<p>
								Media Inquiries<br>
								<a href="mailto:Press@level-ex.com">Press@level-ex.com</a><br>
								<br>
								Technical Support<br>
								<a href="mailto:support@level-ex.com">support@level-ex.com</a>
							</p>
						</div>
						<div class="column">
							<p>
								Business Development<br>
								<a href="mailto:partnerships@level-ex.com">partnerships@level-ex.com</a><br>
								<br>
								Recruiting<br>
								<a href="mailto:careers@level-ex.com">careers@level-ex.com</a>
							</p>
						</div>
					</div>
				</div>
				<div class="locations">
					<div class="wrapper">
						<div class="location row wrap">
							<div class="column mobilehide">
								<img src="<?php echo get_template_directory_uri(); ?>/img/map-chicago.png">
							</div>
							<div class="column pad ">
								<h2>Chicago</h2>
								<div class="details left">
									
									<h3>Contact Info</h3>
									<address>
										<a href="https://goo.gl/maps/ZT5aC6CaCJs" target="_blank">
											363 West Erie Street, #4E <br>
										Chicago, IL 60654
										</a>
									</address>
									<br>
									<p><a href="mailto:hello@level-ex.com"><i class="fas fa-envelope"></i> hello@level-ex.com</a></p>
								</div>
								<p>Hello, leave a message</p>
								<?php 
						            echo FrmFormsController::show_form(2, $key = '', $title=false, $description=false);
						        ?>
							</div>
							<div class="column pad ">
								<h2>Boston</h2>
								<div class="details right">
									
									<h3>Contact Info</h3>
									<address>
										<a href="https://goo.gl/maps/y5xuWpBk7wM2" target="_blank">
											One Beacon Street, Floor 15<br>
											Boston, MA 02108
										</a>
									</address>
									<br>
									<p><a href="mailto:hello@level-ex.com"><i class="fas fa-envelope"></i> hello@level-ex.com</a></p>
								</div>
								<p>Hello, leave a message</p>
								<?php 
						            echo FrmFormsController::show_form(3, $key = '', $title=false, $description=false);
						        ?>
							</div>
							<div class="column mobilehide">
								<img src="<?php echo get_template_directory_uri(); ?>/img/map-boston.png">
							</div>
						</div>
					</div>
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

