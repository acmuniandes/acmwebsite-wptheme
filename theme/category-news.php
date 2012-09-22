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
		
		<?php
		global $post;
		$thumb= get_thumb_url($post->post_content);
		$style = "height:150px;width:150px;";
		if ($thumb!='') echo '<img style="'.$style.'" src="'.$thumb.'" alt="'. get_the_title().'" />';
		?>	

		  <p><?php
		   $chars =  1400;
		   if($numpost>2) $chars = 470; 
		   the_content_limit($chars, ""); ?></p>
		
		 <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Keep on Reading </a>
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
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
<?php get_footer(); ?>
