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
		if(is_category('news')){
			$query->set('posts_per_page','5');
			//For activities
		} else if(is_category('activities') || is_category('projects')){
			$query->set('posts_per_page','2');

		} else if(is_category('members')){
			$query->set('posts_per_page','15');

		}
	}
}

/**
 *  Function that limits the number of characters appearing in a post's content.
 */
function the_content_limit($max_char, $more_link_text = '_(Read more…)', $stripteaser = 0, $more_file = "") {

	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	//$content = str_replace(']]>', ']]>', $content);
	$content = apply_filters('the_content', $content);
	$content = strip_tags($content);

	if (strlen($_GET['p']) > 0) {

		echo $content;
	}
	else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
		$content = substr($content, 0, $espacio);
		$content = $content;
		echo $content;
		echo "…";
		echo " ".$more_link_text." ";
	}
	else {
		echo $content;
	}

}

/*
 * Registers and enqueues scripts to be used on the wptheme.
 */
function loadjs()
{
	wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),'', true);
	wp_enqueue_script('jquery','/wp-includes/js/jquery/jquery.js','','',true);
}

/*
 * 
 */
function list_pagination_links(){
	global $wp_query;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	
	$arr = paginate_links( array(
		'base' => @add_query_arg('paged','%#%'),
		'format' => '?paged=%#%',
		'total' => $wp_query->max_num_pages,
		'prev_next' => false,
		'prev_text' => __('«'),
		'next_text' => __('»'),
		'type' => 'array'
	) );
	
	if($current != 1){
		echo '<li>'.get_previous_posts_link(__('«')).'</li>';
	}
	foreach ($arr as $value) {
		echo '<li>'.$value.'</li>';
	}
	if($current != $wp_query->max_num_pages){
		echo '<li>'.get_next_posts_link(__('»')).'</li>';
	}
}

add_action('init','acmtheme_setup');
add_action('pre_get_posts', 'modify_query');
add_action( 'wp_enqueue_scripts', 'loadjs');
?>
