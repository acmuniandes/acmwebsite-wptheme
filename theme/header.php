<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="<?php bloginfo('description') ?>" />
		<meta name="author" content="<?php bloginfo('admin_email'); ?>" />

		<!-- Le styles -->
		<link href="<?php bloginfo('template_url')?>/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php bloginfo('template_url')?>/css/common.css" rel="stylesheet" type="text/css"/>
		<link href="<?php bloginfo('template_url')?>/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
		<?php if(is_front_page()){ ?>
			<link href="<?php bloginfo('template_url')?>/css/home.css" rel="stylesheet" type="text/css"/>
		<?php } else { ?> 
			<link href="<?php bloginfo('stylesheet_url')?>" rel="stylesheet" type="text/css"/>
		<?php } ?> 
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="navbar navbar-fixed-bottom">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
					<a class="brand" href="#"><img src="<?php bloginfo('template_url')?>/images/logo.png"></a>
						<!--<a class="brand" href="#">ACM Uniandes</a>-->
					<div class="nav-collapse collapse">
						<?php wp_nav_menu(array('container'=> '','theme_location'=>'nav-menu','menu_class'=>'nav' ) ); ?>
						<form class="navbar-search pull-right">
							<input type="text" class="search-query" placeholder="Looking for something?" />
						</form>
					</div>
				</div>
			</div>
		</div>
