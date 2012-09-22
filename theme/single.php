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
							<strong><i class="icon-user"></i></strong><?php the_author(); ?> <br />
							<strong><i class="icon-calendar"></i> </strong><?php the_date(); ?>
						</span>
						<?php the_content(); ?>
					</div>
					<?php wp_link_pages(); ?>
						<!--Comment Section-->
					<div class="results">
						<h3> Comentarios </h3>
						<div class="well well-large">
							<div class="singleresult" >
								<span class="pull-left"> <i class="icon-user"></i> JALopezSilva </span>
								<span class="pull-right"> <i class="icon-calendar"></i> 09/15/2012 </span>
								<p>
									Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
									Etiam porta sem malesuada magna mollis euismod.
								</p>
							</div>
						</div>
						<br />
						<br />
					</div>
				</div>
			</div> <!--Row fluid-->
		<?php endwhile; ?>
</div>





<?php get_footer(); ?>
