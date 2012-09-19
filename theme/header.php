<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
	
		wp_title( '|', true, 'right' );
	
		// Add the blog name.
		bloginfo( 'name' );
	
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
	
		?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="<?php bloginfo('description') ?>" />
		<meta name="author" content="<?php bloginfo('admin_email'); ?>" />

		<!-- Le styles -->
		<link href="<?php bloginfo('template_url')?>/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
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
						<ul class="nav">
							<!--TODO Home, Inicio-->
							<?php wp_list_categories('title_li=&hide_empty=0&exclude=1&orderby=id'); ?>
							<?php wp_list_pages('title_li=&sort_column=ID'); ?>
						</ul>
						<form class="navbar-search pull-right">
							<input type="text" class="search-query" placeholder="Looking for something?" />
						</form>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
