<div class="entry-footer">
	<div class="author-box">
		<div class="author-avatar">
			<?php echo get_avatar(get_the_author_meta('ID'));?>
		</div>
		<h3>
			<?php printf(__('Write by <a href="%1$s">%2$s</a>','haduythemee'),
                            get_author_posts_url(get_the_author_meta('ID')),
                            get_the_author()
			 )?>
		</h3>
		<p>
			<?php echo get_the_author_meta('description');?>
		</p>
	</div>
</div>