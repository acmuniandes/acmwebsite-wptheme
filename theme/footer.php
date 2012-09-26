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
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="contact-form">
			<div class="modal-header">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
				<h3 id="comment-form-header">Join us!</h3>
			</div>
			<div class="modal-body">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<input type="text" placeholder="Name *" size="50" name="author" id="contact-name">
				</div>
				<br>
				<div class="input-prepend">
					<span class="add-on">@</span>
					<input type="text" placeholder="Email *" size="50" name="email" id="contact-email">
				</div>
				<br>
				<div class="input-prepend">
					<span class="add-on"><i class="icon-book"></i></span>
					<input type="text" placeholder="Academic Program *" size="50" name="url" id="contact-program">
				</div>
				<br>
				<div class="input-prepend">
					<span class="add-on"><i class="icon-globe"></i></span>
					<input type="text" placeholder="Got something to show off?" size="50" name="url" id="contact-url">
				</div>
				<br>
				<label> Tell us about yourself: *</label>
				<textarea rows="7" name="contact-info" id="contact-info"></textarea>

			</div>
			<div class="modal-footer">
				<button aria-hidden="true" data-dismiss="modal" class="btn"> Cancel </button>
				<button aria-hidden="true" data-dismiss="modal" class="btn btn-primary" id="contact-send-btn"> Send it over </button>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
