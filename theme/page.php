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
		<div class="span12">
			<?php if (have_posts()) : while (have_posts()) : the_post();?>
				<?php the_content();?> 
			<?php endwhile; endif; ?>     
		</div>
	</div>
</div>
<?php get_footer(); ?>
