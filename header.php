<?php header('X-UA-Compatible: IE=edge'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php $pageid = get_the_ID();?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<!-- facebook meta -->
	<meta property="fb:app_id" content=""/>
	<meta property="og:title" content="<?=do_shortcode('[get-meta-title pageid="'.$pageid.'"]');?>"/>
	<meta property="og:description" content="<?=do_shortcode('[get-meta-description pageid="'.$pageid.'"]');?>"/>
	<meta property="og:url" content="<?=do_shortcode('[get-current-url pageid="'.$pageid.'"]');?>"/>
	<meta property="og:image" content="<?=do_shortcode('[get-share-thumb pageid="'.$pageid.'"]');?>"/>
	<meta property="og:type" content="website"/>
	<!-- twitter meta -->
	<meta name="twitter:site" content="@<?=get_option('twitter_handle');?>">
	<meta name="twitter:title" content="<?=do_shortcode('[get-meta-title pageid="'.$pageid.'"]');?>">
	<meta name="twitter:description" content="<?=do_shortcode('[get-meta-description pageid="'.$pageid.'"]');?>">
	<meta property="twitter:image" content="<?=do_shortcode('[get-share-thumb pageid="'.$pageid.'"]');?>"/>
	<meta property="twitter:card" content="summary_large_image" />
	<!-- additional meta -->
	<meta name="keywords" content="<?=do_shortcode('[get-meta-keywords pageid="'.$pageid.'"]');?>" />
	<meta name="description" content="<?=do_shortcode('[get-meta-description pageid="'.$pageid.'"]');?>" />
	
	<title><?=do_shortcode('[get-meta-title pageid="'.$pageid.'"]');?></title>
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
	<?php wp_head(); ?>
	<?=do_shortcode( '[get-google-analytics]' );?>
</head>
<body <?php body_class(); ?>>
	<div class="site">
		<header class="header">
			<div class="container">
				<div class="row">
					<div class="col span9">
						<h1 class="logo"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><img src="<?=bloginfo( 'stylesheet_directory' );?>/images/logo.png"  alt=""  /></a></h1>
					</div>
					<div class="col span3">
						<ul class="social-icons h-list">
							<li><a href="#" title="" class="icon-facebook"></a></li>
							<li><a href="#" title="" class="icon-twitter"></a></li>
							<li><a href="#" title="" class="icon-youtube"></a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<nav role="navigation" class="main-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary-nav', 'menu_class' => 'h-list cf', 'container' => false ) );?>
					</nav>
				</div>
			</div>
		</header>