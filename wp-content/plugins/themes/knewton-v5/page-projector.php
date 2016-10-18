<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<title>Knewton Dashboards</title>
		<meta name="robots" content="noindex,nofollow,noodp,noydir"/>

		<!-- Place favicon.ico and apple-touch-icon.png in the images folder -->
		<link rel="shortcut icon" type="image/ico" href="/wp-content/themes/knewton-v2/favicon.ico">

		<link href="http://www.knewton.com/wp-content/themes/knewton-v2/css/typo.css?v=0" rel="stylesheet" type="text/css" />
		<style type="text/css">
		body, html { margin: 0; padding: 0; width: 100%; height: 100%; overflow:hidden; }
		iframe { border: none; }
		</style>

		<?php
		if ($_GET['screen'] == elevator1) {
			$background = "#000";
			echo "<script type='text/javascript'>

			var Dash = {
				nextIndex: 0,

				dashboards: [
					{url: '/wp-content/themes/knewton-v2/projector-assets/videos-loop/', time: 213, height:774}
				],

				display: function()
				{
					var dashboard = Dash.dashboards[Dash.nextIndex];
					frames['displayArea'].location.href = dashboard.url;
					document.getElementById('display').style.height = dashboard.height + 'px';
					Dash.nextIndex = (Dash.nextIndex + 1) % Dash.dashboards.length;
					setTimeout(Dash.display, dashboard.time * 1000);
				}
			};

			window.onload = Dash.display;
			</script>";
		}
		elseif ($_GET['screen'] == elevator2) {
			$background = "#000";
			echo "<script type='text/javascript'>
			var Dash = {
				nextIndex: 0,

				dashboards: [
					{url: '/wp-content/themes/knewton-v2/projector-assets/news/', time: 30, height:768},
					{url: '/wp-content/themes/knewton-v2/projector-assets/twitter-employees/', time: 30, height:768},
					{url: '/wp-content/themes/knewton-v2/projector-assets/news/', time: 30, height:768},
					{url: '/wp-content/themes/knewton-v2/projector-assets/twitter-knewton/', time: 30, height:768},
					{url: '/wp-content/themes/knewton-v2/projector-assets/testimonials/', time: 20, height:768}
				],

				display: function()
				{
					var dashboard = Dash.dashboards[Dash.nextIndex];
					frames['displayArea'].location.href = dashboard.url;
					document.getElementById('display').style.height = dashboard.height + 'px';
					Dash.nextIndex = (Dash.nextIndex + 1) % Dash.dashboards.length;
					setTimeout(Dash.display, dashboard.time * 1000);
				}
			};

			window.onload = Dash.display;
			</script>";
		}
		elseif  ($_GET['screen'] == reception) {
			$background = "#000";
			echo "<script type='text/javascript'>
			var Dash = {
				nextIndex: 0,

				dashboards: [
					{url: '/wp-content/themes/knewton-v2/projector-assets/knewtonians/', time: 30, height:768},
					{url: '/wp-content/themes/knewton-v2/projector-assets/testimonials/', time: 20, height:768},
					{url: '/wp-content/themes/knewton-v2/projector-assets/investors/', time: 10, height:768}
				],

				display: function()
				{
					var dashboard = Dash.dashboards[Dash.nextIndex];
					frames['displayArea'].location.href = dashboard.url;
					document.getElementById('display').style.height = dashboard.height + 'px';
					Dash.nextIndex = (Dash.nextIndex + 1) % Dash.dashboards.length;
					setTimeout(Dash.display, dashboard.time * 1000);
				}
			};

			window.onload = Dash.display;
			</script>";
		}
		elseif  ($_GET['screen'] == newsletter) {
			$background = "#fff";
			echo "<script type='text/javascript'>
			var Dash = {
				nextIndex: 0,

				dashboards: [
					{url: '/newsletter-redirect/', time: 1800, height:1000}
				],

				display: function()
				{
					var dashboard = Dash.dashboards[Dash.nextIndex];
					frames['displayArea'].location.href = dashboard.url;
					document.getElementById('display').style.height = dashboard.height + 'px';
					Dash.nextIndex = (Dash.nextIndex + 1) % Dash.dashboards.length;
					setTimeout(Dash.display, dashboard.time * 1000);
				}
			};

			window.onload = Dash.display;
			</script>";
		}
		elseif  ($_GET['screen'] == work) {
			$background = "#000";
			echo "<script type='text/javascript'>
			var Dash = {
				nextIndex: 0,

				dashboards: [
					{url: '/wp-content/themes/knewton-v2/projector-assets/ppt/updates.php', time: 120, height:1080},
					{url: '/wp-content/themes/knewton-v2/projector-assets/knewtonians/', time: 30, hieght:768},
					{url: 'https://trello.com/board/knewton-hive-mind/4fd2758c7a792072108d9f03', time: 30, height:1000},
					{url: '/wp-content/themes/knewton-v2/projector-assets/testimonials/', time: 20, height:768}
				],

				display: function()
				{
					var dashboard = Dash.dashboards[Dash.nextIndex];
					frames['displayArea'].location.href = dashboard.url;
					document.getElementById('display').style.height = dashboard.height + 'px';
					Dash.nextIndex = (Dash.nextIndex + 1) % Dash.dashboards.length;
					setTimeout(Dash.display, dashboard.time * 1000);
				}
			};

			window.onload = Dash.display;
			</script>";
		}
		elseif  ($_GET['screen'] == pearson) {
			$background = "#000";
			echo "<script type='text/javascript'>
			var Dash = {
				nextIndex: 0,

				dashboards: [
					{url: '/wp-content/themes/knewton-v2/projector-assets/graphite-pearson/dashboard1.php', time: 30, height:1080},
					{url: '/wp-content/themes/knewton-v2/projector-assets/graphite-pearson/dashboard2.php', time: 30, height:1080}
				],

				display: function()
				{
					var dashboard = Dash.dashboards[Dash.nextIndex];
					frames['displayArea'].location.href = dashboard.url;
					document.getElementById('display').style.height = dashboard.height + 'px';
					Dash.nextIndex = (Dash.nextIndex + 1) % Dash.dashboards.length;
					setTimeout(Dash.display, dashboard.time * 1000);
				}
			};

			window.onload = Dash.display;
			</script>";
		}
		elseif  ($_GET['screen'] == graphs) {
			$background = "#000";
			echo "<script type='text/javascript'>
			var Dash = {
				nextIndex: 0,

				dashboards: [
					// {url: '/wp-content/themes/knewton-v2/projector-assets/graphite-pearson/dashboard1.php', time: 10, height:1080},
					// {url: '/wp-content/themes/knewton-v2/projector-assets/graphite-pearson/dashboard2.php', time: 10, height:1080},
					{url: 'https://docs.google.com/a/knewton.com/spreadsheet/pub?key=0Atyf5s1aSMfmdDVtRnlPbk5weVFlX1F5cFBXejgtRUE&single=true&gid=0&range=A1:C11&output=html&pli=1', time: 30, height:1080, background: '#ffffff'},
					{url: 'https://www.leftronic.com/share/3FEntx/#dashboard+3FEntx', time: 30, height:1080},
					{url: 'https://www.leftronic.com/share/1uRDoB/#dashboard+1uRDoB', time: 30, height:1080},
					{url: 'https://knewton.atlassian.net/wiki/display/CULTURE/Mastering', time:30, height:1080}
				],

				display: function()
				{
					var dashboard = Dash.dashboards[Dash.nextIndex];
					frames['displayArea'].location.href = dashboard.url;
					document.getElementById('display').style.height = dashboard.height + 'px';
					Dash.nextIndex = (Dash.nextIndex + 1) % Dash.dashboards.length;
					setTimeout(Dash.display, dashboard.time * 1000);
					if (typeof dashboard.background != 'undefined') {
						document.body.style.background = dashboard.background;
					} else {
						document.body.style.background = '<?php echo $background ?>';
					}
				}
			};

			window.onload = Dash.display;
			</script>";
		}
		elseif  ($_GET['screen'] == readiness) {
			$background = "#fff";
			echo "<script type='text/javascript'>
			var Dash = {
				nextIndex: 0,

				dashboards: [
					{url: 'https://reports.knewton.com/metrics/Academics/newLogo/index.html', time: 300, height:1080}
				],

				display: function()
				{
					var dashboard = Dash.dashboards[Dash.nextIndex];
					frames['displayArea'].location.href = dashboard.url;
					document.getElementById('display').style.height = dashboard.height + 'px';
					Dash.nextIndex = (Dash.nextIndex + 1) % Dash.dashboards.length;
					setTimeout(Dash.display, dashboard.time * 1000);
				}
			};

			window.onload = Dash.display;
			</script>";
		}
		elseif  ($_GET['screen'] == quiet) {
			$background = "#232323";
			echo "<script type='text/javascript'>
			var Dash = {
				nextIndex: 0,

				dashboards: [
					{url: '/wp-content/themes/knewton-v2/projector-assets/quiet/index.php', time: 300, height:1350}
				],

				display: function()
				{
					var dashboard = Dash.dashboards[Dash.nextIndex];
					frames['displayArea'].location.href = dashboard.url;
					document.getElementById('display').style.height = dashboard.height + 'px';
					Dash.nextIndex = (Dash.nextIndex + 1) % Dash.dashboards.length;
					setTimeout(Dash.display, dashboard.time * 1000);
				}
			};

			window.onload = Dash.display;

			</script>";
		}
		else {
			$background = "#000";
			// blank screen;
		}
		?>

	</head>

	<?php echo '<body style="background-color: ' . $background . ';">'; ?>
		<div style="margin: 0 auto; text-align: center;">
			<iframe name="displayArea" id="display" width="100%" height="100%" scrolling="no" border="no"></iframe>
			<!-- Refresh page every 30 minutes -->
			<script type="text/javascript">
				setTimeout(function() {window.location.reload(true);}, 30e4);
			</script>
		</div>
	</body>
</html>