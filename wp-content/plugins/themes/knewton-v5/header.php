<?php
	function removeWhitespace($buffer)
	{
	    return preg_replace('~>\s*\n\s*<~', '><', $buffer);
	}

	ob_start('removeWhitespace');
?>

<!DOCTYPE HTML>
<!--[if lt IE 7]><html class="ie ie6 lte9 lte8 lte7"><![endif]-->
<!--[if IE 7]><html class="ie ie7 lte9 lte8 lte7"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8"><![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9"><![endif]-->
<!--[if !IE]><!--><html class="not-ie"><!--<![endif]-->

	<head>

		<link rel="shortcut icon" href="/favicon.ico" />

		<title><?php wp_title(' – ', true, 'right'); ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); echo '/style.php?' . filemtime( get_stylesheet_directory() . '/style.php'); ?>" type="text/css" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/fancybox/jquery.fancybox.css" />

<!-- 		<link rel="stylesheet" href="assets/css/build/style.min.css" /> -->

		<!--[if lt IE 9]>
			<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/html5shiv.js"></script>
			<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/plugins/respond.js"></script>
		<![endif]-->

		<?php wp_head(); ?>
	</head>

	<body>
		<div id="content" <?php body_class("pagename-" . sanitize_title(get_the_title())) ?>>

			<header id="header" class="group">
				<div class="header-wrap">
					<div class="inner header-inner group">
						<h1 class="header-logo">
							<a class="header-logo-link" href="/">
								<img class="header-logo-img" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logo-color.png" />
							</a>
						</h1>

						<div class="header-cta-wrap fr">
							<a href="http://learn.knewton.com/entry" class="border-btn btn small header-cta color-btn bg-turq1 cta-btn">Build with Knewton</a>
							<a href="http://learn.knewton.com/entry" class="border-btn btn small header-cta color-btn bg-turq1 cta-btn-mob">Build</a>
							<button class="border-btn btn small nav-toggle icon-menu" data-toggle="collapse" data-target="#main-nav"></button>
						</div>

						<div id="main-nav-wrap">
							<nav id="main-nav" class="nav-collapse collapse pr">
								<ul class="group">
									<?php
										$menu = wp_nav_menu(array(
											'menu' => 'Main Menu v5',
											'depth' => 2,
											'container' => false,
											'container_class' => false,
											'echo' => false,
											'walker' => new Child_Wrap()
										));

										echo preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
									?>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</header> <!-- header -->

			<div id="switcheroo" class="ajax-fade">
