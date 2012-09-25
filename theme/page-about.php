<?php get_header(); ?>

<div id="main-content" class="container">
	<div class="row-fluid">
		<div class="span12">
			<div class="page-header">
				<h1><?php echo get_the_title($ID); ?> <small> <?php bloginfo('name'); ?> </small> </h1>
		      </div>
		</div>
	</div>
	<div class="row-fluid">
		<div id="sidebar" class="span3">
			<ul class="nav nav-list bs-docs-sidenav affix-top" data-spy="affix" data-offset-top="50">
				<li class="active"><a href="#1">¿Quiénes somos? <i class="icon-chevron-right pull-right"></i></a></li>
				<li><a href="#2">¿Qué hacemos? <i class="icon-chevron-right pull-right"></i></a></li>
				<li><a href="#3">¿Qué esperamos? <i class="icon-chevron-right pull-right"></i></a></li>
				<li><a href="#4">¿Qué es ACM? <i class="icon-chevron-right pull-right"></i></a></li>
			</ul>
		</div>
		<div class="span9 posts about">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<?php the_content();?> 
		<?php endwhile; endif; ?>     
		</div>
	</div>
</div>
<?php get_footer(); ?>
