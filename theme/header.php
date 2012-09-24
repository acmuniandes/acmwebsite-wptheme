<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="<?php bloginfo('description') ?>" />
		<meta name="author" content="<?php bloginfo('admin_email'); ?>" />

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php wp_head();?>
	</head>
	<body <?php body_class();?>>
		<div class="navbar navbar-fixed-bottom">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
					<a class="brand" href="#"><img src="<?php bloginfo('template_url')?>/img/logo.png"></a>
						<!--<a class="brand" href="#">ACM Uniandes</a>-->
					<div class="nav-collapse collapse">
						<?php wp_nav_menu(array('container'=> '','theme_location'=>'nav-menu','menu_class'=>'nav' ) ); ?>
						<?php get_search_form() ?>
					</div>
				</div>
			</div>
		</div>
