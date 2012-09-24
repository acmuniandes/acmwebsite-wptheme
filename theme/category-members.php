<?php get_header(); ?>
	<div id="main-content" class="container">
		<div class="row-fluid">
			<div class="span12">
				<div class="page-header">
					<h1><?php single_cat_title(); ?> <small> <?php bloginfo('name'); ?> </small></h1>
				</div>
			</div>
		</div>
		<!--Grid like images-->
		<div class="row-fluid posts projects" >
			<?php 
			$numpost = 0; 
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if($numpost % 4 == 0) : ?>
					<div class="row-fluid">
				<?php endif; ?>
						<div class="span3 photo" >
							<a class="photoPicture thumbnail" href="#"><img src="http://placehold.it/250x250" alt="" /></a>
							<div class="photoContent" style="display:none;height: 100%;width: 100%;border: 1px solid lightgrey;">
								<?php the_content(); ?>
							</div>
						</div>
				<?php if($numpost % 4 == 3) : ?>
					</div>
				<?php endif; ?>
				<?php $numposts++; ?>
			<?php endwhile; else:?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
		</div>
		<!--Pagination business-->
		<div class="row-fluid">
			<div class="span12">
				<div class="pagination">
					<ul>
						<?php list_pagination_links(); ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
