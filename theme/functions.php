<?php
/**
 * Funcions.php for the acmtheme.
 * Registers the features supported by the theme,
 * Features supported:
 * Navigation bar
 */



/**
 * Function to setup the main features of the theme.
 */
function acmtheme_setup()
{
	/**
	 * Registers the main navegation menu.
	 */
	register_nav_menus(
		array('nav-menu' => _('Navegation Menu'))
	);
}

/*
 * Modifies the main query for each specific template.
 */
function modify_query($query)
{
	if($query->is_main_query())
	{
		//For news
		if(is_category('news'))
		{
			 $query->set('posts_per_page','3');
		//For activities	 
		}else if(is_category('activities'))
		{
			 $query->set('posts_per_page','2');

		}
	}
}

add_action('init','acmtheme_setup');
add_action('pre_get_posts', 'modify_query');
?>
