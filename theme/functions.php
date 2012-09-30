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
	if (strlen($_GET['p']) > 0) {

		echo force_balance_tags($content);
	}
	else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
		$content = substr($content, 0, $espacio);
		$content = $content;
		echo force_balance_tags($content." […]");
	}
	else {
		echo force_balance_tags($content);
	}

}

/*
 * Registers and enqueues scripts to be used on the wptheme.
 */
function load_scripts_styles()
{
	wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),'', true);
	wp_enqueue_script('jquery','/wp-includes/js/jquery/jquery.js','','',true);
	wp_enqueue_script('jqueryui',get_template_directory_uri().'/js/jqueryui.min.js',array('jquery'),'', true);
	wp_enqueue_script('support',get_template_directory_uri().'/js/support.js',array('jquery','jqueryui'),'', true);
	wp_localize_script('support','ajax_script', array('ajaxurl'=> admin_url('admin-ajax.php')));

	if(is_page('about')){
		wp_enqueue_script('page-about',get_template_directory_uri().'/js/page-about.js',array('jquery','bootstrap'),'',true);
	} else if(is_single()){
		wp_enqueue_script('single-post',get_template_directory_uri().'/js/single-post.js',array('jquery','bootstrap',
		'support'),'',true);
	} else if (is_category('members')) {
		wp_enqueue_script('members',get_template_directory_uri().'/js/members.js',array('jquery','bootstrap'),'',true);
	}
	
	wp_enqueue_style('bootstrapcss',get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('responsivecss',get_template_directory_uri().'/css/bootstrap-responsive.min.css');
	wp_enqueue_style('common',get_template_directory_uri().'/css/common.css');
	
	if(is_front_page()){
		wp_enqueue_style('home',get_template_directory_uri().'/css/home.css');
	} else {
		wp_enqueue_style('style',get_template_directory_uri().'/style.css');
	}
}

/**
 * Function to display each comment using the theme's defined style.
 */
function display_custom_comment($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
?>
	      <div <?php comment_class('well well-large'); ?> >
			<div class="singleresult" >
				<span id="author-<?php comment_ID(); ?>" class="pull-left"> <i class="icon-user"></i> <?php comment_author(); ?> </span>
				<span id="date-<?php comment_ID(); ?>"class="pull-right"> <i class="icon-calendar"></i> <?php comment_date(); ?> - <?php comment_time(); ?> </span>
				<br />
				<div id="comment-content">
					<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.'); ?></em>
					<br />
					<?php endif; ?>
					<?php comment_text(); ?>
				</div>
			</div>
				<span class="pull-left"> <?php edit_comment_link(_('Edit')); ?></span>
				<span class="pull-right">  <a id="<?php comment_ID(); ?>" class='comment-reply-link' href="#comment-form" data-toggle="modal"><? echo _('Reply'); ?></a> </span>
		</div>
<?php

}

/*
 * Lists the pagination links for pagination menu
 */
function list_pagination_links($comments=false){
	global $wp_query;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	if($comments){
		$arr = paginate_comments_links( array(
			'base' => add_query_arg( 'cpage', '%#%' ),
			'format' => '?cpage=%#%',
			'echo' => false,
			'add_fragment' => '#comments',
			'prev_next' => true,
			'prev_text' => __('«'),
			'next_text' => __('»'),
			'type' => 'list'
		));
		echo $arr;
	} else{
		$arr = paginate_links( array(
			'base' => @add_query_arg('paged','%#%'),
			'format' => '?paged=%#%',
			'total' => $wp_query->max_num_pages,
			'prev_next' => false,
			'prev_text' => __('«'),
			'next_text' => __('»'),
			'type' => 'array'
		));
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
}
/**
 * Displays the pages for a multipage post.
 */

function display_link_pages()
{
	global $page, $numpages;
	$prev = $page - 1;
	$next = $page + 1;
	
	if( $prev )
		echo '<li>'._wp_link_page($prev).__('«').'</a></li>';

	echo '<li class="active">'._wp_link_page($page).'Page '.$page.'</a></li>';
		
	if( $page != $numpages )
		echo '<li>'._wp_link_page($numpages).'Page '.$numpages.'</a></li>';

	if($next <= $numpages)
		echo '<li>'._wp_link_page($next).__('»').'</a></li>';


		

}
/**
 * Displays the custom comment form within a modal dialog.
 **/
function custom_comment_form(){
?>		
	<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3 id="comment-form-header"><?php comment_form_title(); ?> </h3>
		</div>
		<div class="modal-body">
			<?php if ( is_user_logged_in() ) : ?>
				<h4> <?php global $current_user; get_currentuserinfo(); $username =  $current_user->user_login; echo _('Logged in as ').ucfirst($username); ?></h4>
			<br />
			<?php else : ?>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span><input id="author" name="author" class="span5" size="50" type="text" placeholder="<?php echo _('Username *'); ?>" />
			</div><br />
			<div class="input-prepend">
				<span class="add-on">@</span><input id="email" name="email" class="span5" size="50" type="text" placeholder="<?php echo _('Email *'); ?>" />
			</div><br />
			<div class="input-prepend">
				<span class="add-on"><i class="icon-globe"></i></span><input id="url" name="url" class="span5"  size="50" type="text" placeholder="<?php echo _('Website');?>" />
			</div><br />
			<?php endif; ?>
			<label> <?php echo _('Your comment *'); ?> </label>
			<textarea id="comment" name="comment" rows="8"></textarea>
			<p class="form-allowed-tags" style="margin:1em;">You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:  <code>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </code></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo _('Cancel'); ?></button>
			<input id="<?php echo esc_attr( $args['id_submit'] ); ?>" type="submit" class="btn btn-primary" value="<?php echo _('Post Comment'); ?>" />
			<?php comment_id_fields( $post_id ); ?>
		</div>
	</form>
<?php
}


/**
 * Displays the dialog for contact.
 */

function display_contact_dialog()
{
?>
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="contact-form">
			<div class="modal-header">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button" id="btn-close">x</button>
				<h3 id="comment-form-header"><?php echo __('Join us!')?></h3>
			</div>
			<div class="modal-body">
				<div class="row-fluid">
					<div id="div-contact-name" class="input-prepend span6">
						<span class="add-on"><i class="icon-user"></i></span>
						<input type="text" placeholder="<?php echo __('Name *')?>" size="50" name="contact-name" id="contact-name" />
					</div>
				</div>
				<br>
				<div class="row-fluid">
					<div id="div-contact-email" class="input-prepend span6">
						<span class="add-on">@</span>
						<input type="text" placeholder="<?php echo __('Email *')?>" size="50" name="contact-email" id="contact-email" />
					</div>
				</div>
				<br>
				<div class="row-fluid">
					<div id="div-contact-program" class="input-prepend span6">
					<span class="add-on"><i class="icon-book"></i></span>
						<input type="text" placeholder="<?php echo __('Academic Program *')?>" size="50" name="contact-program" id="contact-program" />
					</div>
				</div>
				<br>
				<div class="row-fluid">
					<div class="input-prepend span6">
						<span class="add-on"><i class="icon-globe"></i></span>
						<input type="text" placeholder="<?php echo __('Got something to show off?')?>" size="50" name="contact-url" id="contact-url" />
					</div>
				</div>
				<br>
				<div class="row-fluid">
					<div id="div-contact-info" class="span6">
						<label> <?php echo __('Tell us about yourself: *')?></label>
						<textarea rows="7" name="contact-info" id="contact-info"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button aria-hidden="true" data-dismiss="modal" class="btn" id="contact-cancel-btn"> <?php echo __('Cancel')?> </button>
				<button aria-hidden="true" data-dismiss="modal" class="btn btn-primary" id="contact-send-btn"> <?php echo __('Send it over')?> </button>
			</div>
		</div>

<?php
}

/**
 * Display login dialog.
 */

function display_login_dialog()
{
?>
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="login-form">
		<div class="modal-header">
			<button aria-hidden="true" data-dismiss="modal" class="close" type="button" id="login-close-btn">x</button>
			<h3 id="comment-form-header"><?php echo __('Who are you?')?></h3>
		</div>
		<div class="modal-body">
			<div class="row-fluid">
				<div class="span6">
					<p class="login-username">
						<label for="user_login"><?php echo __("Username"); ?></label>
						<input type="text" tabindex="10" size="20" value="" class="input" id="user_login" name="log">
					</p>
				</div>
				<div class="span6">
					<p class="login-password">
						<label for="user_pass"><?php echo __("Password"); ?></label>
						<input type="password" tabindex="20" size="20" value="" class="input" id="user_pass" name="pwd">
					</p>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<p class="text-info"> Inicia sesion con tus credenciales de la Universidad de los Andes. </p>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button aria-hidden="true" data-dismiss="modal" class="btn" id="login-cancel-btn"> <?php echo __('Cancel')?> </button>
			<button id="wp-submit" name="wp-submit" aria-hidden="true" data-dismiss="modal" class="btn btn-primary" id="login-send-btn"> <?php echo __('Login')?> </button>
			</div>
	</div>


<?php
}

/**
 * AJAX - Function
 * Logs in an user through AJAX.
 */
function log_in_user(){


	$username = $_POST["user"];
	$pass = $_POST["pass"];
	$creds = array('user_login' => $username, 'user_password' => $pass);
	$user = wp_signon($creds,false);

	if(is_wp_error($user))
		echo false;
	else{
		echo '<span id ="user-info" class="user-info"><i class="icon-user"></i>&nbsp;&nbsp;'. $username .' - <span class="log-out">Logout</span></span>';
	}
	 
 	exit();
}

/**
 * AJAX - Function
 * Logs in an user through AJAX.
 */
function log_out_user(){
	wp_logout();
	echo '<a id ="user-info" href="#login-form" class="user-info" data-toggle="modal"><i class="icon-user"></i></a>';
	exit();
}



//Ajax
add_action("wp_ajax_nopriv_log_in_user","log_in_user");
add_action("wp_ajax_log_out_user","log_out_user");


//Normal
add_filter('show_admin_bar','_return false');
add_theme_support('post-thumbnails');
add_action('init','acmtheme_setup');
add_action('pre_get_posts', 'modify_query');
add_action('wp_enqueue_scripts', 'load_scripts_styles');
?>
