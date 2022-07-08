<article id="post-<?php the_ID(); ?>">
	<div class="entry-thumnail">
		 <?php haduy_thumbnail('thumbnail'); ?>
	</div> 
    <div class="content-container">
        <div class="entry-header">
            <?php haduy_entry_header(); ?>
            <?php haduy_entry_meta(); ?>
        </div>
        <div class="entry-content">
            <?php haduy_entry_content(); ?>
            <?php (is_single()) ? haduy_entry_tag() : '';?>
        </div>
    </div>
</article>