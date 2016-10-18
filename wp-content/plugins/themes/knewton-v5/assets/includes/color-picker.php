			<div class="color-picker bg-white ptb-12">
				<div class="inner">
					<span class="caps smaller lower" style="padding-right: 10px">Colors (Please allow up to 10 seconds to load):</span> 
					<a class="no-ajaxy current" href="<?php bloginfo('stylesheet_directory'); ?>/style.php">0</a>
					<a class="no-ajaxy" href="<?php bloginfo('stylesheet_directory'); ?>/style.php?style=2">2</a>
					<a class="no-ajaxy" href="<?php bloginfo('stylesheet_directory'); ?>/style.php?style=3">3</a>
					<a class="no-ajaxy" href="<?php bloginfo('stylesheet_directory'); ?>/style.php?style=4">4</a>					
				</div>
			</div>
			
			<script>
				$(document).ready(function(){
					$('.color-picker a').click(function(){
						var $me = $(this),
							myHref = $me.attr('href');
						
						$('#style-main').attr('href', myHref);
						
						$('.color-picker a').removeClass('current');
						$me.addClass('current');
						
						return false;
					});
				});
			</script>
			
			<link id="style-main" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.php" />

// In style.php

$style = '';

if(!empty($_GET['style'])) {
	$style = $_GET['style'];
}


$url = "assets/css/style-bromco" . $style . ".less";