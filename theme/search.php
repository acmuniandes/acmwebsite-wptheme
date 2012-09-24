<?php get_header(); ?>
<!--Page header-->
<div id="main-content" class="container"> 
	<div class="row-fluid">
		<div class="span12">
			<div class="page-header">
				<h1> <?php echo _('Search'); ?> <small>  <?php bloginfo('name'); ?>  </small></h1>
			</div>
		</div>
	</div>

	<?php if( have_posts()) : ?>
		<div class="row-fluid posts results">
			<div class="span12">
				<div class="results">
					<h3> <?php echo _('Results'); ?> </h3>
					<?php while( have_posts()): the_post(); ?>
					<!--For each post..-->
						<div class="well well-large">
							<div class="singleresult"> 
								<?php the_title('<h4>','</h4>'); ?>
								<span class="pull-left"> <i class="icon-user"></i> <?php the_author(); ?> </span>
								<br />
								<span class="pull-left"> <i class="icon-calendar"></i> <?php echo get_the_date(); ?> - <?php the_time(); ?> </span>
								<?php the_excerpt(); ?>	
								<a href="<?php the_permalink(); ?>" class="pull-right"><?php echo _('Read more') ?></a>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>	
		<!--Pagination links-->
		<div class="row-fluid">
			<div class="span12">
				<div class="pagination">
					<ul>
						<?php list_pagination_links(); ?>
					</ul>
				</div>
			</div>
		</div>
	<?php else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
</div><!-- Close main-content -->

<?php get_footer(); ?>
