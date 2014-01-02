<?php
/**
 * The Header for our theme.
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=2.0;" />
<title><?php wp_title( ); ?></title>
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="container">
	<header class="masthead" role="banner">
		<div class="container-fluid">
			<?php if (is_user_logged_in()) { ?>
				<div class="row-fluid">
					<div class="span12">
						<div class="alert alert-error">
							<p style="margin:0;font-weight: bold; text-align: center;"><em>Beta:</em> Rapportera buggar eller ändringar konstigheter i appen <a target="_blank" href="https://elvenite.podio.com/marknadsforing/apps/buggar">Buggar i Podio</a>.</p>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="row-fluid">
				<div class="span5">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/elvenite-logo.png" width="300" height="52" /></a></h1>
				</div>
				<div class="span7">
					<nav class="top-navigation navbar navbar-clear hidden-tablet hidden-phone" role="navigation">
						<div class="navbar-inner">
							<div class="container-fluid">
								<a class="btn btn-navbar btn-top-navbar" data-target=".nav-top-collapse">
									<i class="icon icon-menu"></i> Meny
								</a>
								
								<div class="nav-collapse collapse nav-top-collapse">
									<?php wp_nav_menu( array( 
										'theme_location' => 'top',
										'container' => false,
										'menu_id' => false,
										'menu_class' => 'nav',
									)); ?>
								</div>
		
							</div>
						</div>
					</nav> <!-- top-navigation -->
					
					<nav class="contact-navigation navbar navbar-clear hidden-phone" role="navigation">
						<div class="navbar-inner">
							<div class="container-fluid">
								<ul id="menu-contact-menu" class="nav">
									<li><span class="tel">+46 (0)54 - 150 115</span></li>
									<li><a class="email" href="mailto:info@elvenite.se">info@elvenite.se</a></li>
									<!--<li><a class="link-map" href="https://maps.google.com/maps?q=Elvenite+AB,+Herrg%C3%A5rdsgatan+6,+Karlstad,+Sverige&hl=sv&ie=UTF8&ll=59.382469,13.506768&spn=0.006328,0.019248&sll=37.322998,-122.032182&sspn=0.158079,0.307961&oq=el&hq=Elvenite+AB,&hnear=Herrg%C3%A5rdsgatan+6,+652+24+Karlstad,+Sverige&t=m&z=16&iwloc=A">Hitta hit</a></li>-->
								</ul>
							</div>
						</div>
					</nav>
					
					<p style="text-align:center;margin: 20px 0 10px 0;" class="hidden-tablet hidden-desktop">
						<a href="tel:+4654150115" class="btn tel"><?php icl_translate ("header", "vcard", "Ring"); ?></a>
						<a class="email btn" href="mailto:info@elvenite.se"><?php icl_translate ("header", "vcard", "Maila") ?></a>
						<a class="link-map btn" href="https://maps.google.com/maps?q=Elvenite+AB,+Herrg%C3%A5rdsgatan+6,+Karlstad,+Sverige&hl=sv&ie=UTF8&ll=59.382469,13.506768&spn=0.006328,0.019248&sll=37.322998,-122.032182&sspn=0.158079,0.307961&oq=el&hq=Elvenite+AB,&hnear=Herrg%C3%A5rdsgatan+6,+652+24+Karlstad,+Sverige&t=m&z=16&iwloc=A"><?php icl_translate("header", "vcard", "Hitta hit")?> </a>
						<a class="search-dropdown btn">Sök <span class="caret"></span></a>
					</p>
					
						
					<div class="row-fluid row-search">
						<div class="span12">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
			<nav class="main-navigation navbar navbar-static-top navbar-inverse" role="navigation">
				<div class="navbar-inner">
					<div class="container-fluid">
						<a class="btn btn-navbar btn-main-navbar" data-target=".nav-main-collapse">
							<i class="icon icon-menu"></i> <?php icl_translate ("header", "buttons", "Kompentensområden"); ?>
						</a>
						
						<div class="nav-collapse collapse nav-main-collapse">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_id' => false, 'menu_class' => 'nav' ) ); ?>
						</div>
					</div>
				</div>
			</nav><!-- #site-navigation -->
	</header><!-- .masthead -->

	<div class="container-fluid main-content">
		
	<?php if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>