		<?php if(!is_front_page()){ ?>
			<div id="footer-content" class="container">
				<div id="footer">
					<div id="footer-links" class="row-fluid">
						<?php 
						$bookmarks = get_bookmarks(array('category_name'=>'External','orderby'=>'link_id'));
						$size = sizeof($bookmarks);
						$each = floor(12/$size);
						for($i = 0; $i < 12 && $i < $size;$i++){
							$bm = $bookmarks[$i];		
							echo '<div class="span'.$each.'"><a href="'.$bm->link_url.'">'._($bm->link_name).'</a></div>';
						}

						?>
					</div>
					<div id="footer-icons" class="row-fluid">
						<div id="copyright" class="span4">
							<span>&copy; <?php bloginfo('name'); ?> </span>
						</div>
						<div id="footer-icons-inner" class="span2 offset5">
							<a href="<?php $arr = get_bookmarks(array('category_name'=>'Social','search'=>'Facebook')); echo $arr[0]->link_url; ?>"><img src="<?php bloginfo('template_url')?>/img/facebook2.png"></a> &nbsp;&nbsp;&nbsp; <a href="<?php $arr = get_bookmarks(array('category_name'=>'Social','search'=>'Twitter')); echo $arr[0]->link_url; ?>"><img src="<?php bloginfo('template_url')?>/img/twitter2.png"></a> &nbsp;&nbsp;&nbsp; <a href="<?php $arr = get_bookmarks(array('category_name'=>'Social','search'=>'Google Plus')); echo $arr[0]->link_url; ?>"><img src="<?php bloginfo('template_url')?>/img/google-plus.png"></a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php display_contact_dialog(); ?>
		<?php display_login_dialog(); ?>
		<?php wp_footer(); ?>
	</body>
</html>
