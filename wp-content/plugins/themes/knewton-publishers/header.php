<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!--[if ie]><meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/><![endif]-->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
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
				<a href="http://learn.knewton.com/entry" class="cta-btn">Build with Knewton</a>
				<a href="http://learn.knewton.com/entry" class="cta-btn-mob">Build</a>
			</div>
			<div class="site-navigation">
				<nav id="cssmenu">
					<ul>
						<li class="current">
							<a href="javascript:void();">Publishers</a>
							<ul>
								<li>
									<a href="javascript:void();">Why Knewton?</a>
								</li>
								<li>
									<a href="javascript:void();">Our Offer</a>
								</li>
								<li>
									<a href="javascript:void();">Our Partners</a>
								</li>
								<li>
									<a href="javascript:void();">Case Studies</a>
								</li>
								<li>
									<a href="javascript:void();">Get Started</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:void();">Our Approach</a>
						</li>
						<li>
							<a href="javascript:void();">About</a>
						</li>
						<li>
							<a href="javascript:void();">Resources</a>
						</li>
						<li class="blue-link">
							<a href="javascript:void();">Sign In</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="nav-child">
		<ul>
			<li class="current">
				<a href="javascript:void();">Why Knewton?</a>
			</li>
			<li>
				<a href="javascript:void();">Our Offering</a>
			</li>
			<li>
				<a href="javascript:void();">Our Partners</a>
			</li>
			<li>
				<a href="javascript:void();">Case Studies</a>
			</li>
			<li class="blue-link">
				<a href="javascript:void();">Get Started</a>
			</li>
		</ul>
	</div>
</header>
<section id="content" class="site-content">