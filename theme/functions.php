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

/**
 * Function that returns an image or media linked within a post content.
 * The function returns either an inside image, an external image a youtube video or nothing.
 * @author - Vladimir Prelovae
 */

function get_thumb_url($text)
{
  global $post;
 
  $imageurl="";        
 
  // extract the thumbnail from attached imaged
  $allimages =&get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );        
 
  foreach ($allimages as $img){                
     $img_src = wp_get_attachment_image_src($img->ID);
     break;                       
  }
 
  $imageurl=$img_src[0];
 
 
  // try to get any image
  if (!$imageurl)
  {
    preg_match('/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'>]*)/i' ,  $text, $matches);
    $imageurl=$matches[1];
  }
 
  // try to get youtube video thumbnail
  if (!$imageurl)
  {
    preg_match("/([a-zA-Z0-9\-\_]+\.|)youtube\.com\/watch(\?v\=|\/v\/)([a-zA-Z0-9\-\_]{11})([^<\s]*)/", $text, $matches2);
 
    $youtubeurl = $matches2[0];
    if ($youtubeurl)
     $imageurl = "http://i.ytimg.com/vi/{$matches2[3]}/1.jpg"; 
   else preg_match("/([a-zA-Z0-9\-\_]+\.|)youtube\.com\/(v\/)([a-zA-Z0-9\-\_]{11})([^<\s]*)/", $text, $matches2);
 
   $youtubeurl = $matches2[0];
   if ($youtubeurl)
     $imageurl = "http://i.ytimg.com/vi/{$matches2[3]}/1.jpg"; 
  }
 
 
return $imageurl;
}







/*
 * Registers and enqueues scripts to be used on the wptheme.
*/

function loadjs()
{
	wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),'', true);
	wp_enqueue_script('jquery','/wp-includes/js/jquery/jquery.js','','',true);
}

add_theme_support('post-thumbnails');
add_action('init','acmtheme_setup');
add_action('pre_get_posts', 'modify_query');
add_action( 'wp_enqueue_scripts', 'loadjs');
?>
