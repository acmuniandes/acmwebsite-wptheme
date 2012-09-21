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
					<div class="span6">	
	<?php 
	$numpost = 0; 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); $numpost++; ?>
	
	<?php  if($numpost==3) echo '<div class="span6">'; ?> 
	
	<div id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
	
	<?php
	$heading = 2;
	if($numpost==2) $heading = 3;
	if($numpost>2 ) $heading = 4; 
	the_title("<h$heading>", "</h$heading>");
	?>

	 <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author.
	 <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small> -->
	
	 <!-- Display the Post's Content in a div box. -->
	 <div class="entry"><p>
	   <?php
	   $chars =  1400;
	   if($numpost>2) $chars = 470; 
	   the_content_limit($chars, ""); ?>
	 </p></div>
	
	 <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Keep on Reading </a><br />
	 </div> <!-- closes the first div box -->
	 
	 <?php  if($numpost==2 || $numpost==5) echo '</div>'; ?> 
	

	<?php endwhile; ?>
					</div> <!--newsupper-->
			</div> <!--row-fluid-->
	</div><!--main content-->
	<div class="navigation">
 	<div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
 	<div class="alignright"><?php next_posts_link('Next Entries &raquo;','') ?></div>
 	</div>
		
	<?php else:?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
<?php get_footer(); ?>
