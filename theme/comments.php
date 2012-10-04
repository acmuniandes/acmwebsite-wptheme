<?php if( have_comments() ): ?>
<div class="comment-results">
	<h3> <?php _e('Comments','acmtheme'); ?> <small><?php comments_number( __('No responses','acmtheme'),__('One Response','acmtheme'),__('% Responses','acmtheme')); ?></small></h3>

		<div id="comments">
			<?php wp_list_comments(array('callback'=>'display_custom_comment')); ?>
		</div>	
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="row-fluid">
				<div class="span12">
					<div class="pagination">
						<ul>
							<?php list_pagination_links(true) ?>
						</ul>
					</div>
				</div>
			</div>
		<?php endif; ?>
</div>

<?php endif; ?>
<?php  if( comments_open()) : ?>
<!--Button to trigger modal-->
<a  id="comment-button" href="#comment-form" role="button" class="btn btn-primary pull-right" data-toggle="modal"><?php _e('Talk to us!','acmtheme'); ?></a>
<!--Comment form-->
<div id="comment-form" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<?php custom_comment_form(); ?>
</div>
<?php endif; ?>
