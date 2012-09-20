<?php get_header(); ?>
	<?php query_posts( array ('posts_per_page' => 3 ) ); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	 <div class="post">
	
	 <!-- Display the Title as a link to the Post's permalink. -->
	 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	
	 <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
	 <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
	
	 <!-- Display the Post's Content in a div box. -->
	 <div class="entry">
	   <?php the_content(); ?>
	 </div>
	
	 <!-- Display a comma separated list of the Post's Categories. -->
	 <p class="postmetadata">Posted in <?php the_category(', '); ?></p>
	 </div> <!-- closes the first div box -->
	

	<?php endwhile; ?>
	 <div class="navigation">
 	 <div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
 	<div class="alignright"><?php next_posts_link('Next Entries &raquo;','') ?></div>
 	</div>
		
	<?php else:?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
<?php get_footer(); ?>
