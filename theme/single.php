<?php get_header(); ?>


		<!--Page header-->
<div  id="main-content" class="container">
		<?php while( have_posts()) : the_post(); ?>
			<div class="row-fluid">
				<div class="span12">
					<div class="page-header">
						<h1><?php  the_title(); ?> <small> <?php $category = get_the_category(); echo $category[0]->cat_name; ?></small></h1>
					</div>
				</div>
			</div>
				<!--Singlepost-->
			<div class="row-fluid posts single">
				<div class="span12">
					<div>
						<span id="author">
							<p>
								<strong><i class="icon-user"></i></strong> <?php the_author(); ?> <br />
								<strong><i class="icon-calendar"></i></strong> <?php the_date(); ?>
							</p>
						</span>
						<?php the_content(); ?>
					</div>
					<?php wp_link_pages(); ?>
					<!--Comment Section-->
					<?php comments_template(); ?>
				</div>
			</div> <!--Row fluid-->
		<?php endwhile; ?>
</div>





<?php get_footer(); ?>
