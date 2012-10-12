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
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-30945558-2']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>
	</head>
	<body <?php body_class();?>>
		<div id="navbar" class="navbar navbar-fixed-bottom">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
					<a class="brand" href="#"><img src="<?php bloginfo('template_url')?>/img/logo.png"></a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<?php wp_nav_menu(array('container'=> false,'theme_location'=>'nav-menu', 'items_wrap' => '%3$s') ); ?>
							<li>
								<a href="#contact-form" data-toggle="modal">Contacto</a>
							</li>
						</ul>
							<?php get_search_form() ?>
					</div>
				</div>
			</div>
		</div>
		<?php if(!is_front_page()) : ?>
			<?php if( !is_user_logged_in()) : ?>
				<a id ="user-info" href="#login-form" class="user-info" data-toggle="modal"><i class="icon-user"></i></a>
			<?php else: global $user_login; get_currentuserinfo();?>
			<span id ="user-info" class="user-info"><i class="icon-user"></i>&nbsp;&nbsp;<span id="user-login"><?php echo $user_login; ?></span> - <span id="logged-in" class="log-out"><?php _e('Logout','acmtheme'); ?></span></span>
			<?php endif; ?>
		<?php endif; ?>
