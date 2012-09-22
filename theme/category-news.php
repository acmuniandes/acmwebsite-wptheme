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
	
	<div id="post-<?php the_ID(); ?>" <?php post_class("row-fluid"); ?> >
		<?php
		
		$heading = 2;
		if($numpost==2) $heading = 3;
		if($numpost>2 ) $heading = 4; 
		the_title("<h$heading>", "</h$heading>");
		?> 
	
		 <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author.
		 <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small> -->
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
			<?php
				global $wp_query;

				$big = 999999999; // need an unlikely integer
				$arr = paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => 0,
					'total' => $wp_query->max_num_pages,
					'prev_next' => true,
					'prev_text' => __('«'),
					'next_text' => __('»'),
					'type' => 'array'
				) );
				
				foreach ($arr as $value) {
					echo '<li>'.$value.'</li>';
				}
			?>
						</ul>
					</div>
				</div>
			</div>
			
	</div><!--main content-->

	
<!-- 	<div class="navigation">
	 	<div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
	 	<div class="alignright"><?php next_posts_link('Next Entries &raquo;','') ?></div>
 	</div> -->
		
	<?php else:?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
<?php get_footer(); ?>