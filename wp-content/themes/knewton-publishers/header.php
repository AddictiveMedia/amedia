<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!--[if ie]><meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/><![endif]-->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<link href="<?php bloginfo('template_directory'); ?>/css/slick.css" rel="stylesheet" type="text/css" />
</head>
<body <?php body_class(); ?>>
<?php
	$logo = get_field('upload_logo','option');
?>
<header id="masthead" class="site-header" role="banner">
	<div class="header-upper">
		<div class="wrapper">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo $logo['url']; ?>" alt="<?php bloginfo('name'); ?>" />
				</a>
			</div>
			<div class="header-cta">
				<a href="http://learn.knewton.com/entry-2" target="_blank">Get Started</a>
				<button id="menu-toggle" class="menu-toggle"><span><?php _e('Menu', 'twentysixteen' ); ?></span></button>
			</div>
			<?php if(has_nav_menu('primary')){ ?>
				<div id="site-header-menu" class="site-header-menu">
					<?php if(has_nav_menu('primary')){ ?>
						<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
							<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'primary-menu')); ?>
						</nav>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</header>
<section id="content" class="site-content">