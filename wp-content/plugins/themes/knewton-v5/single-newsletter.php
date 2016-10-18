<?php while (have_posts()): the_post() ?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<?php $modules = get_field('modules') ?>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="format-detection" content="telephone=no">
	<title>Knerd Dispatch: <?php echo $modules[0]['title'] ?></title>
	<style type="text/css">

		@media only screen and (max-width: 480px) {
			body[yahoo] table[class="table"], body[yahoo] td[class="cell"] {
				width: 300px !important;
				margin:0 auto;
			}

			body[yahoo] td.stack {
				display: block;
				width:100% !important;
			}

			body[yahoo] td.bar {
				height:5px !important;
			}

			body[yahoo] h1 {
				font-size:24px !important;
				line-height:24px !important;
			}

			body[yahoo] h2 {
				font-size:15px !important;
				line-height:28px !important;
			}

			body[yahoo] img.full {
				width:100%;
				max-width:100%;
			}
		}
	</style>
</head>
<body yahoo="fix" width="100%" bgcolor="#F4F4F4" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased;width:100% !important;background:#f4f4f4;-webkit-text-size-adjust:none;" align="center">
	<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#F4F4F4" align="center">
		<?php if (is_user_logged_in()): ?>
			<tr>
				<td bgcolor="#D8D8D8" height="25" width="100%">
					<table width="600" cellpadding="0" cellspacing="0" border="0" bgcolor="#D8D8D8" align="center" class="table">
						<tr>
							<td style="font-family:Verdana;font-size:9px;color:#16161d" bgcolor="#D8D8D8" width="100%" align="center" valign="middle">
								<?php if (get_field('preview_text')): ?>
									<img src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="1" height="1" alt="<?php the_field('preview_text') ?>">
								<?php endif ?>
								The monthly dispatch from Knewton. Look funny? <a style="color:#16161d;text-decoration:underline;" href="<?php the_permalink() ?>">View it in a browser</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		<?php endif ?>
		<tr>
			<td width="100%" bgcolor="#16161D" height="110" align="center">
				<a href="http://www.knewton.com"><img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/logo.jpg" width="317" height="110"></a>
			</td>
		</tr>
		<tr>
			<td bgcolor="#DEDEDE">
				<img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="1" height="30">
			</td>
		</tr>
		<tr>
			<td width="100%" bgcolor="#DEDEDE" align="center">
				<table width="600" cellpadding="0" cellspacing="0" border="0" bgcolor="#DEDEDE" align="center" class="table">
					<tr>
						<td align="center" style="text-align:center;font-family:Helvetica;font-size:28px;line-height:28px;color:#303030;font-weight:normal;margin:0;padding:0;">
							<?php the_field('main_title') ?>
						</td>
					</tr>
					<tr>
						<td bgcolor="#DEDEDE">
							<img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="1" height="15">
						</td>
					</tr>
					<tr>
						<td align="center" style="text-align:center;font-family:Georgia;font-size:18px;line-height:33px;color:#303030;font-weight:normal;margin:0;padding:0;">
							<?php the_field('main_subtitle') ?>
						</td>
					</tr>
					<tr>
						<td bgcolor="#DEDEDE">
							<img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="1" height="15">
						</td>
					</tr>
					<tr>
						<td align="center">
							<p style="text-align:center;font-family:Georgia;font-size:16px;line-height:16px;color:#303030;font-weight:normal;margin:0;padding:0;font-style:italic;">- The Knerds</p>
						</td>
					</tr>
					<tr>
						<td bgcolor="#DEDEDE">
							<img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="1" height="25">
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<?php $j = 0 ?>
		<?php foreach ($modules as $module): ?>
			<tr>
				<td bgcolor="#f4f4f4">
					<img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="1" height="25">
				</td>
			</tr>
			<tr>
				<td width="100%" bgcolor="#f4f4f4" align="center">
					<table width="600" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f4f4" align="center" class="table">
						<tr>
							<td width="5" bgcolor="#<?php echo $module['color'] ?>" class="bar stack">
								<img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="5" height="5">
							</td>
							<td class="stack">
								<img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="25" height="25">
							</td>
							<td class="stack">
								<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f4f4" align="center">
									<tr>
										<?php if (is_user_logged_in()): ?>
											<?php if ($title_link = $module['title_link']): ?>
												<td align="left" style="text-decoration:none;font-family:Helvetica;font-size:26px;line-height:26px;color:#303030;font-weight:normal;margin:0;padding:0;"><a style="font-family:Helvetica;font-size:26px;line-height:26px;color:#303030;font-weight:normal;margin:0;padding:0;text-decoration:none;" href="<?php echo $title_link ?>"><?php echo $module['title'] ?></a></td>
											<?php else: ?>
												<td align="left" style="font-family:Helvetica;font-size:26px;line-height:26px;color:#303030;font-weight:normal;margin:0;padding:0;"><?php echo $module['title'] ?></td>
											<?php endif ?>
										<?php else: ?>
											<td align="left" style="text-decoration:none;font-family:Helvetica;font-size:26px;line-height:26px;color:#303030;font-weight:normal;margin:0;padding:0;">
												<?php if (!$j++): ?>
													<?php if ($title_link = $module['title_link']): ?>
														<h1 style="font-family:Helvetica;font-size:26px;line-height:26px;color:#303030;font-weight:normal;margin:0;padding:0;text-decoration:none;"><a style="text-decoration:none;font-family:Helvetica;font-size:26px;line-height:26px;color:#303030;font-weight:normal;margin:0;padding:0;" href="<?php echo $title_link ?>"><?php echo $module['title'] ?></a></h1>
													<?php else: ?>
														<h1 style="font-family:Helvetica;font-size:26px;line-height:26px;color:#303030;font-weight:normal;margin:0;padding:0;"><?php echo $module['title'] ?></h1>
													<?php endif ?>
												<?php else: ?>
													<?php if ($title_link = $module['title_link']): ?>
														<a style="font-family:Helvetica;font-size:26px;line-height:26px;color:#303030;font-weight:normal;margin:0;padding:0;text-decoration:none;" href="<?php echo $title_link ?>"><?php echo $module['title'] ?></a>
													<?php else: ?>
														<?php echo $module['title'] ?>
													<?php endif ?>
												<?php endif ?>
											</td>
										<?php endif ?>
									</tr>
									<?php if ($module['subtitle']): ?>
										<tr>
											<td align="left" style="font-family:Georgia;font-size:14px;line-height:24px;color:#303030;font-weight:normal;margin:0;padding:0;font-style:italic;">
												<?php echo knewton_add_link_style($module['subtitle'], 'subtitle') ?>
											</td>
										</tr>
									<?php endif ?>
									<tr>
										<td>
											<img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="1" height="10" />
										</td>
									</tr>
									<tr>
										<?php if ($module['calendar_items']): ?>
											<?php $chunked = array_chunk($module['calendar_items'], 2) ?>
											<td style="font-family:Georgia;font-size:14px;line-height:25px;color:#303030;" valign="top">
												<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f4f4" align="center">
													<?php foreach ($chunked as $chunk): ?>
														<tr>
															<td width="<?php echo isset($chunk[1]) ? '50%' : '100%" colspan="2' ?>" class="stack" valign="top">
																<?php $date = strtotime($chunk[0]['date']) ?>
																<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f4f4" align="center">
																	<tr>
																		<td valign="top" align="left">
																			<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f4f4" align="center">
																				<tr>
																					<td valign="top" width="35" align="left">
																						<table width="35" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f4f4" align="left">
																							<tr>
																								<td valign="top" style="color:#303030;font-family:Helvetica;font-size:14px;line-height:18px;font-weight:bold;">
																									<?php echo date('M', $date) ?>
																								</td>
																							</tr>
																							<tr>
																								<td valign="top" style="color:#303030;font-family:Helvetica;font-size:24px;line-height:18px;font-weight:bold">
																									<?php echo date('d', $date) ?>
																								</td>
																							</tr>
																						</table>
																					</td>
																					<td valign="top" align="left">
																						<table width="240" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f4f4" align="left">
																							<tr>
																								<td valign="top" align="left">
																									<a style="color:#303030;font-weight:bold;text-decoration:underline;" href="<?php echo $chunk[0]['event_link'] ?>"><?php echo $chunk[0]['event_title'] ?></a>
																								</td>
																							</tr>
																							<tr>
																								<td valign="top" align="left" style="color:#303030;font-family:Georgia;font-size:14px;line-height:25px;">
																									<?php echo knewton_add_link_style($chunk[0]['event_text'], 'content') ?>
																								</td>
																							</tr>
																						</table>
																					</td>
																				</tr>
																			</table>
																		</td>
																	</tr>
																</table>
															</td>
															<?php if (isset($chunk[1])): ?>
																<td width="50%" class="stack" valign="top">
																	<?php $date = strtotime($chunk[1]['date']) ?>
																	<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f4f4" align="center">
																		<tr>
																			<td valign="top" align="left">
																				<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f4f4" align="center">
																					<tr>
																						<td valign="top" width="35" align="left">
																							<table width="35" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f4f4" align="left">
																								<tr>
																									<td valign="top" style="color:#303030;font-family:Helvetica;font-size:14px;line-height:18px;font-weight:bold;">
																										<?php echo date('M', $date) ?>
																									</td>
																								</tr>
																								<tr>
																									<td valign="top" style="color:#303030;font-family:Helvetica;font-size:24px;line-height:18px;font-weight:bold">
																										<?php echo date('d', $date) ?>
																									</td>
																								</tr>
																							</table>
																						</td>
																						<td valign="top" align="left">
																							<table width="240" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f4f4" align="left">
																								<tr>
																									<td valign="top" align="left">
																										<a style="color:#303030;font-weight:bold;text-decoration:underline;" href="<?php echo $chunk[1]['event_link'] ?>"><?php echo $chunk[1]['event_title'] ?></a>
																									</td>
																								</tr>
																								<tr>
																									<td valign="top" align="left" style="color:#303030;font-family:Georgia;font-size:14px;line-height:25px;">
																										<?php echo knewton_add_link_style($chunk[1]['event_text'], 'content') ?>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																				</table>
																			</td>
																		</tr>
																	</table>
																</td>
															<?php endif ?>
														</tr>
														<tr>
															<td colspan="2">
																<img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="1" height="10">
															</td>
														</tr>
													<?php endforeach ?>
												</table>
											</td>
										<?php elseif ($module['tweets']): ?>
											<td style="font-family:Georgia;font-size:14px;line-height:25px;color:#303030;">
												<?php foreach ($module['tweets'] as $tweet): ?>
													<a href="<?php echo $tweet['tweet_link'] ?>"><img border="0" src="<?php echo $tweet['tweet_image']['url'] ?>" class="full" /></a>
												<?php endforeach ?>
											</td>
										<?php elseif ($module['in_the_news']): ?>
											<td style="font-family:Georgia;font-size:14px;line-height:25px;color:#303030;">
												<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f4f4" align="center">
													<?php foreach ($module['in_the_news'] as $news): ?>
														<tr>
															<td>
																<a href="<?php echo $news['news_link_url'] ?>"><img src="<?php echo $news['news_image']['url'] ?>" /></a>
															</td>
															<td>
																<img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="10" height="1" />
															</td>
															<td align="left" valign="middle" style="font-family:Georgia;font-size:14px;line-height:24px;color:#303030;">
																<?php echo $news['news_text'] ?><?php if ($news['show_read_more_link']): ?>&nbsp;<a style="color:#303030;font-weight:bold;font-family:Georgia;font-size:14px;line-height:25px;text-decoration:underline;" href="<?php echo $news['news_link_url'] ?>">Read more ›</a><?php endif ?>
															</td>
														</tr>
														<tr>
															<td colspan="3">
																<img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="1" height="10" />
															</td>
														</tr>
													<?php endforeach ?>
												</table>
											</td>
										<?php elseif ($module['knerd_alerts']): ?>
											<?php $chunked = array_chunk($module['knerd_alerts'], 2) ?>
											<td style="font-family:Georgia;font-size:14px;line-height:25px;color:#303030;">
												<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f4f4f4" align="center">
													<?php foreach ($chunked as $chunk): ?>
														<tr>
															<td width="<?php echo isset($chunk[1]) ? '50%' : '100%" colspan="2' ?>" align="left">
																<a style="font-family:Helvetica;font-weight:bold;color:#303030;font-size:14px;text-decoration:underline;" href="<?php echo $chunk[0]['alert_url'] ?>"><?php echo $chunk[0]['alert_title'] ?></a>
															</td>
															<?php if (isset($chunk[1])): ?>
																<td width="50%" align="left">
																	<a style="font-family:Helvetica;font-weight:bold;color:#303030;font-size:14px;text-decoration:underline;" href="<?php echo $chunk[1]['alert_url'] ?>"><?php echo $chunk[1]['alert_title'] ?></a>
																</td>
															<?php endif ?>
														</tr>
													<?php endforeach ?>
												</table>
												<br />
												<a style="font-family:Helvetica;font-weight:bold;color:#303030;font-size:14px;text-decoration:underline;" href="http://www.knewton.com/jobs">See all open jobs ›</a>
											</td>
										<?php else: ?>
											<td align="left" style="font-family:Georgia;font-size:14px;line-height:25px;color:#303030;">
												<?php if ($module['image']): ?>
													<?php if (isset($module['image_link']) && $module['image_link']): ?><a href="<?php echo $module['image_link'] ?>"><?php endif ?>
													<img border="0" align="left" src="<?php echo $module['image']['url'] ?>" class="<?php echo $module['image_type'] == 'half' ? 'full' : '' ?>" />
													<?php if (isset($module['image_link']) && $module['image_link']): ?></a><?php endif ?>
												<?php endif ?>
												<?php if ($module['content']): ?>
													<?php echo nl2br(knewton_add_link_style($module['content'], 'content')) ?>
												<?php endif ?>
												<?php if ($module['read_more_url']): ?>
													<a style="color:#303030;font-weight:bold;font-family:Georgia;font-size:14px;line-height:25px;text-decoration:underline;" href="<?php echo $module['read_more_url'] ?>">Read more ›</a>
												<?php endif ?>
											</td>
										<?php endif ?>
									</tr>
								</table>
							</td>
							<td>
								<img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="5" height="1">
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td bgcolor="#f4f4f4">
					<img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="1" height="25">
				</td>
			</tr>
			<tr>
				<td bgcolor="#DEDEDE" height="2" style="line-height:2px">
					<img style="display:block;" border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="1" height="2">
				</td>
			</tr>
		<?php endforeach ?>
		<tr>
			<td bgcolor="#DEDEDE">
				<img border="0" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/wp-content/themes/knewton-v3/emails/knerd-dispatch/images/spacer.gif" width="1" height="25">
			</td>
		</tr>
		<tr>
			<td bgcolor="#16161D" align="center" height="40" width="100%" style="font-size:10px;color:#d2d2d2;font-family:Helvetica;">
				<a style="font-size:10px;color:#d2d2d2;font-family:Helvetica;text-decoration:underline;" href="http://www.knewton.com">www.knewton.com</a> | <a style="font-size:10px;color:#d2d2d2;font-family:Helvetica;text-decoration:underline;" href="http://www.knewton.com/contact/">Contact us</a> <?php if (is_user_logged_in()): ?>| <a style="font-size:10px;color:#d2d2d2;font-family:Helvetica;text-decoration:underline;" href="{{unsubscribe_link}}">Unsubscribe</a><?php else: ?>| <a style="font-size:10px;color:#d2d2d2;font-family:Helvetica;text-decoration:underline;" href="/subscribe/">Subscribe</a><?php endif ?>
				<?php if (is_user_logged_in()): ?>
					<br />
	                {{site_settings.company_name}}, {{site_settings.company_street_address_1}}, {{site_settings.company_city}}, {{site_settings.company_state}}
	            <?php endif ?>
			</td>
		</tr>
	</table>
	<?php if (is_user_logged_in()): ?>

	<?php else: ?>
		<?php include(realpath(dirname(__FILE__)) . '/assets/includes/footer_tracking_code.php') ?>
	<?php endif ?>
</body>
</html><?php endwhile ?>