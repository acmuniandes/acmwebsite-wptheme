<?php get_header(); ?>
<div id="main-content" class="container"> 
	<div class="row-fluid">
		<div class="span12">
			<div class="page-header">
				<h1> <?php echo _('Ooops.'); ?> <small>  <?php echo _('Something went wrong');  ?>  </small></h1>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
		<p> <?php echo 'Oops, I screwed up and you discovered my fatal flaw. 
				Well, we\'re not all perfect, but we try.  Can you try this
				again or maybe visit our <a 
				title="Our Site" href="'. site_url() .'">Home 
				Page</a> to start fresh.  We\'ll do better next time.'; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
