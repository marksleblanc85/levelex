		<footer>
			<div class="wrapper">
				<nav>
					<a href="<?= get_site_url(); ?>/press">Press</a>
					<a href="<?= get_site_url(); ?>/careers">Work With Us</a>
					<a href="<?= get_site_url(); ?>/contact">Contact Us</a>
					<a href="<?= get_site_url(); ?>/terms-conditions">Terms & Conditions</a>
					<a href="<?= get_site_url(); ?>/privacy-policy">Privacy Policy</a>
				</nav>
				<div class="badges">
					<div class="row center">
						<a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/badge-app-store.svg" width="140"></a>
						<a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/badge-google-play.svg" width="140"></a>
					</div>
				</div>
				<div class="socials">
					<a href="http://www.linkedin.com/company/level-ex" target="_blank"><i class="fab fa-linkedin"></i></a>
					<a href="http://www.twitter.com/levelexteam" target="_blank"><i class="fab fa-twitter"></i></a>
					<a href="https://www.youtube.com/channel/UCA6CXfLvPRra93Zdzvjb2zg" target="_blank"><i class="fab fa-youtube"></i></a>
				</div>
				<p>&copy; 2019 Level Ex. All Rights Reserved</p>
			</div>
		</footer>
		<?php wp_footer(); ?>
		<script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-NQBQX29"></script>
		<script type="text/javascript">
			$(function(){
				$('.search-toggle').click(function(){
					if($('.searchbox').is(':visible')){
						$('.search-toggle i').attr('class','').addClass('fas fa-search');
						$('.searchbox').fadeOut();
					} else {
						$('.search-toggle i').attr('class','').addClass('fas fa-times');
						$('.searchbox').fadeIn();
						$('.searchbox input').focus();
					}
				});
				$('body').click(function(event){
		            var $target = $(event.target);
		            if(!$target.parents().is(".searchbox") && !$target.is(".searchbox")){
		            	$('body').find('.search-toggle i').attr('class','').addClass('fas fa-search');
						$('body').find('.searchbox').fadeOut();
		            }
		            if(!$target.parents().is(".modal") && !$target.is(".modal")){
	            		$('.modal').fadeOut('fast');
		            }
		        });
		        $(".searchbox").add('.search-toggle').add('.case').add('.modal').click(function(e){
					e.stopPropagation();
				});
				$('.case').click(function(){
					$('#'+$(this).attr('data-target')).fadeIn('slow');
				});
				$('.modals .close').click(function(){
					$('.modal').fadeOut('fast');
				});
				$('.testimonials').slick({
					autoplay:true,
					infinite: true,
					dots: true,
  					arrows: false,
  					fade: true,
  					speed: 500
				});
			});
			$(document).keyup(function(e) {
			     if (e.key === "Escape") {
			        if($('.searchbox').is(':visible')){
			        	$('.search-toggle i').attr('class','').addClass('fas fa-search');
						$('.searchbox').fadeOut();
			        }
			    }
			});
			window.onscroll = function() {
				growShrinkLogo()
			};
			function growShrinkLogo() {
				if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
					$('body').addClass('scrolled');
				} else {
					$('body').removeClass('scrolled');
				}
			}
		</script>
	</body>
</html>
