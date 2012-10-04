<?php get_header(); ?>
<div id="main-content" class="container"> 
	<div class="row-fluid">
		<div class="span12">
			<div class="page-header">
				<h1> <?php _e('Ooops.','acmtheme'); ?> <small>  <?php  _e('Something went wrong','acmtheme');  ?>  </small></h1>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
		<p> <?php 
		$ret = site_url();
		sprintf(_e('Oops, I screwed up and you discovered my fatal flaw. 
				Well, we\'re not all perfect, but we try.  Can you try this
				again or maybe visit our <a 
				title="Our Site" href="%s">Home 
				Page</a> to start fresh.  We\'ll do better next time.', 'acmtheme'), $ret); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
