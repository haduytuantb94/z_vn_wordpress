<?php
get_header(); ?>
<div  class="content">
	<div class="hd-max-width d-flex">
		<div class="main-content">
			<div class="archive-title">
				<?php 
                    if(is_tag()) {
                	    printf(__('Posts tagged: %1$s','haduythemee'),single_tag_title(',',false));
                    } else if(is_category()) {
                        printf(__('Posts Category : %1$s','haduythemee'),single_cat_title('',false));
                    } else if(is_day()) {
                        printf(__('Daily Archives :%1$s','haduythemee'),get_the_time('l, F j, Y'));
                    } else if(is_month()) {
                    	printf(__('monthly Archives :%1$s','haduythemee'),get_the_time('F Y'));
                    } else if (is_year()) {
                    	printf(__('Yearly Archives :%1$s','haduythemee'),get_the_time('Y'));
                    }
				?>
			</div>
		<?php  
				if(have_posts()){
				    while(have_posts()){
				        the_post();
				        get_template_part('content',get_post_format());
				    }
				    haduy_pagination();
				} else {
				         get_template_part('content','none');
				    }
			    ?>
		</div>
		<div class="sidebar">
		        <?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php 
get_footer();
?>