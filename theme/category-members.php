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
		<div class="row-fluid" >
			<?php 
			$numpost = 0; 
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if($numpost % 4 == 0) : ?>
					<div class="row-fluid">
				<?php endif; ?>
						<div class="span3 photo" >
							<?php if (has_post_thumbnail()): ?><a class="photoPicture thumbnail" href="#"><?php the_post_thumbnail('full');?></a>
							<div class="photoContent">
								<?php the_content(); ?>
							</div>
							<?php else: ?>
								<p>A member got lost</p>
							<?php endif;?>
						</div>
				<?php if($numpost % 4 == 3) : ?>
					</div>
					<br />
				<?php endif; ?>
				<?php $numpost++; ?>
			<?php endwhile; ?>
			<?php if($numpost % 4 != 0 ) echo "</div> <!--closing it-->"; ?>
			<?php else:?>
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
