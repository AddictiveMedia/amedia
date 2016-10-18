<?php

	$tweets = get_transient('knerd-tweets');

	if (1||!$tweets) {

		$settings = array(
			'oauth_access_token' => "23974515-FfIkMUIQC535DK19Gc0uponUtPbDUkMDwI7uuItkI",
			'oauth_access_token_secret' => "qXd8dFBNmMNecVD6zT919XQ1AjhB7kLykC3G7a7oj2w",
			'consumer_key' => "S4a4KGsgs74lCSUFQwXGg",
			'consumer_secret' => "gzNJZ3DXnpXf5MG8pdMatYqzqrPFYvwY8Dd9oNtDxIM"
		);

		$get = '?' . http_build_query(array(
			'owner_screen_name' => 'Knewton',
			'slug' => 'knerd-tweets',
			'count' => 20,
			'include_rts' => true
		));

		$twitter = new TwitterAPIExchange($settings);
		$list_tweets = json_decode($twitter->setGetfield($get)
			->buildOauth('https://api.twitter.com/1.1/lists/statuses.json', 'GET')
			->performRequest());

		$get = '?' . http_build_query(array(
			'screen_name' => 'Knewton',
			'count' => 10,
			'include_rts' => true,
			'exclude_replies' => true
		));


		$user_tweets = json_decode($twitter->setGetfield($get)
			->buildOauth('https://api.twitter.com/1.1/statuses/user_timeline.json', 'GET')
			->performRequest());

		$tweets = array_merge($user_tweets, $list_tweets);

		//no point in spending resources running linkify
		//every time we do the render,
		//so do it now before saving to db
		foreach ($tweets as &$tweet) {
			$tweet->linkified_text = knewton_linkify_twitter($tweet->text);
		}

		usort($tweets, 'knewton_sort_all_tweets_by_date');
		set_transient('knerd-tweets', $tweets, 60 * 60);  //1 hour
	}

	function knewton_sort_all_tweets_by_date($a, $b) {
		$a = strtotime($a->created_at);
		$b = strtotime($b->created_at);

		if ($a == $b) {
			return 0;
		}

		return $a < $b ? 1 : -1;
	}

?><html>
<head>
<style>
body {
	margin:0;
	padding:0;
	background:#2F2F2F;
}

#wrap {
	width:1920px;
	height:1080px;
	margin:0 auto;
	display: table;
	background:#2F2F2F;
}

.tweet {
	padding:170px 95px;
	display: table-cell;
	vertical-align: middle;
	background:#2F2F2F;
}

.tweet .tweet-content {
	float:left;
	width:1500px;
}

.tweet img {
	float:left;
	width:140px;
	margin-right:70px;
}

.tweet-text {
	font-family:"museo-sans-n5", "museo-sans";
	font-style:normal;
	font-weight:500;
	font-size:93px;
	line-height:130px;
	color:#e2dfdf;
}

.tweet-text a {
	color:#30c1bf;
	text-decoration: none;
}

.tweet-meta {
	font-family:"museo-sans-n7", "museo-sans";
	font-style:normal;
	font-weight:700;
	font-size:54px;
	line-height:76px;
	color:#89898a;
	border-bottom:7px solid #CACACA;
	padding-bottom:60px;
	margin-bottom:60px;
}

.tweet-author {
	font-family:"museo-sans-n9", "museo-sans";
	font-style:normal;
	font-weight:900;
	font-size:90px;
	color:#ffffff;
	line-height:76px;
}

</style>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.cycle/3.03/jquery.cycle.all.min.js"></script>

<script type="text/javascript">
	(function($) {
		$(function() {
			$('#wrap').cycle({
				timeout: 7000,
			});
		});
	})(jQuery);
</script>

</head>
<body>
	<div id="wrap">
		<?php $i = 0 ?>
		<?php foreach ($tweets as $tweet): ?>
			<div class="tweet" style="<?php echo $i++ ? 'display:none;' : '' ?>">
				<img src="<?php echo $tweet->user->profile_image_url ?>" />
				<div class="tweet-content">
					<div class="tweet-author"><?php echo $tweet->user->name ?></div>
					<div class="tweet-meta">@<?php echo strtolower($tweet->user->screen_name) ?>&nbsp;•&nbsp;<?php echo date('j M Y', strtotime($tweet->created_at)) ?></div>
					<div class="tweet-text"><?php echo $tweet->linkified_text ?></div>
				</div>
				<br clear="all" />
			</div>
		<?php endforeach ?>
	</div>
</body>
</html>