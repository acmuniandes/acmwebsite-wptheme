<form id="searchform" class="navbar-search pull-right" method="GET" action="<?php bloginfo('url'); ?>">
	<input name="s" id="s" type="text" class="search-query" value="<?php the_search_query(); ?>" placeholder="<?php echo _('Looking for something?'); ?>" />
</form>
