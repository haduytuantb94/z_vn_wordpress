<article id="post-<?php the_ID(); ?>">
	<div class="entry-thumnail">
		 <?php haduy_thumbnail('large'); ?>
	</div> 
    <div class="content-container">
        <div class="entry-header">
            <?php haduy_entry_header(); ?>
            <?php 
             $attachment = get_children(array('post_parent'=>$post->ID));
             $attachment_number = count($attachment);
             printf(__('This images post content %1$s photo','haduythemee'),$attachment_number);
            ?>
        </div>
        <div class="entry-content">
            <?php haduy_entry_content(); ?>
            <?php (is_single()) ? haduy_entry_tag() : '';?>
        </div>
    </div>
</article>