<?php get_header(); ?>
	<div id="main-content" class="container" >
			<div class="row-fluid">
				<div class="span12" >
					<div class="page-header">
						<h1><?php single_cat_title(); ?><small> <?php bloginfo('name'); ?> </small></h1>
					</div>
				</div>
			</div>
			<div class="row-fluid posts news">
				<div id="news-upper" class="row-fluid">
	<?php 
	$numpost = 0; 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); $numpost++; ?>
	
	<?php  if($numpost==3 || $numpost==1) echo '<div class="span6">'; ?> 
	
	<div id="post-<?php the_ID(); ?>" <?php post_class("row-fluid"); ?> >
		<?php
		
		$heading = 2;
		if($numpost==2) $heading = 3;
		if($numpost>2 ) $heading = 4; 
		the_title("<h$heading>", "</h$heading>");
		?> 
		
		   <div><?php
		   $chars =  1400;
		   if($numpost>2) $chars = 570; 
		   the_content_limit($chars, ""); ?></div>
		
	   <a class="pull-right" href="<?php the_permalink() ?>" rel="bookmark" title="permanent link to <?php the_title_attribute(); ?>"><?php _e('Keep on Reading','acmtheme'); ?></a>
	 </div> 
	 
	 <?php  if(($numpost == 2) || ($numpost == 5)) echo '</div>'; ?> 
	
	
	<?php endwhile; ?>
	<?php  if(($numpost == 4)|| ($numpost==3) || ($numpost == 1)) echo '</div>'; ?> 

					</div> <!--newsupper-->
			</div> <!--row-fluid-->
			<div class="row-fluid">
				<div class="span12">
					<div class="pagination">
						<ul>
							<?php list_pagination_links(); ?>
						</ul>
					</div>
				</div>
			</div>
			
	</div><!--main content-->
		
	<?php else:?>
	<p><?php _e('Sorry, no posts matched your criteria.','acmtheme'); ?></p>
	</div><!--end upper news -->
	</div> 
    </div>
	<?php endif; ?>
<?php get_footer(); ?>
