<?php
get_header(); ?>
<div  class="content">
	<div class="hd-max-width d-flex">
		<div class="main-content">
		<?php   if(have_posts()){
			        while(have_posts()){
					   the_post();
			           get_template_part('content',get_post_format());
				}
			    }else {
				    get_template_part('content','none');
			    } ?>
		</div>
		<div class="sidebar">
		        <?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php 
get_footer();
?>