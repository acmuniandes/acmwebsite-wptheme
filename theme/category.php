<?php get_header(); ?>
		<div id="main-content" class="container">
			<div class="row-fluid">
				<div class="span12">
					<div class="page-header">
						<h1><?php single_cat_title(); ?> <small> <?php bloginfo('name'); ?> </small></h1>
					</div>
				</div>
			</div>
			<!--Two columns for news-->
			<div class="row-fluid posts projects" >
				<?php 
				$numpost = 0; 
				if ( have_posts() ) : while ( have_posts() ) : the_post();?>
				<div class="span6">
					<div id="post-<?php the_ID(); ?>">
						<?php the_title("<h2>", "</h2>"); ?>
						<?php the_content_limit(1700, ""); ?>
						<a class="pull-right" href="<?php the_permalink() ?>" rel="bookmark" title="permanent link to <?php the_title_attribute(); ?>"><?php _e('Keep on Reading','acmtheme'); ?></a>
					</div>
				</div>
				<?php endwhile; else:?>
					<p><?php _e('Sorry, no posts matched your criteria.','acmtheme'); ?></p>
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
