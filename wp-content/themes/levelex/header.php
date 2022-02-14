<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<?php wp_head(); ?>
		<script>
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>
	</head>
	<body <?php body_class(); ?>>
		<header class="header mobilehide" role="banner">
			<div class="wrapper">
				<nav class="nav" role="navigation">
					<?php html5blank_nav_left(); ?>
				</nav>
				<div class="logo">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/levelex-logo.svg" alt="Logo" class="logo-img" width="230">
					</a>
				</div>
				<nav class="nav" role="navigation">
					<?php html5blank_nav_right(); ?>
					<!-- <div class="search">
						<a href="javascript:void(0);" data-target="searchbox" class="search-toggle"><i class="fas fa-search"></i></a>
						<div class="searchbox">
							<?php get_search_form(); ?>
						</div>
					</div> -->
				</nav>
			</div>
		</header>