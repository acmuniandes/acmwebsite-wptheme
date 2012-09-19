<?php
/**
 * Funcions.php for the acmtheme.
 * Registers the features supported by the theme,
 * Features supported:
 * Navigation bar
 */


add_action('init','acmtheme_setup');

function acmtheme_setup()
{

	/**
	 * Registers the main navegation menu.
	 */
	register_nav_menus(
		array('nav-menu' => _('Navegation Menu'))
	);

}




?>
