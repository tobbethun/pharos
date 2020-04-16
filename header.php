<?php
/**
 * The Header for pharos theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Pharos
 */

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=1">
	<meta property="og:url"                content="https://antisemitismdaochnu.se/" />
	<meta property="og:type"               content="website" />
	<meta property="og:title"              content="Antisemitism – då och nu" />
	<meta property="og:description"        content="Ett informations- och undervisningsmaterial från Svenska kommittén mot antisemitism (SKMA) och Forum för levande historia." />
	<meta property="og:image"              content="<?php echo get_template_directory_uri(); ?>/images/og-bild.jpg" />
	<title><?php bloginfo('name'); ?> | <?php wp_title( '|', true, 'left' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-12354258-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-12354258-1');
	</script>
</head>

<body <?php body_class(); ?>>

	<div class="menu__content">
		<div class="menu-pharos">
			<button tabindex="0" class="hamburger" aria-label="Meny"></button>
			<button class="close"></button>
			<a href="<?php echo home_url(); ?>" class="home icon" aria-label="Hem"></a>
			<a href="/om-materialet" class="info icon" aria-label="om materialet"></a>
			<a href="/till-larare" class="checkmark icon" aria-label="till lärare"></a>
		</div>
		<div class="menu__items">
			<?php
			wp_nav_menu(array(
					'theme_location' => 'main_menu'
					));
			?>
		</div>
		<div class="menu-footer">. . .</div>
	</div>
