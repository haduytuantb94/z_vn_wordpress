<article id="post-<?php the_ID(); ?>">
    <div class="content-container">
        <div class="entry-header">
            <?php haduy_entry_header(); ?>
        </div>
        <div class="entry-content">
            <?php the_content(); ?>
            <?php (is_single()) ? haduy_entry_tag() : '';?>
        </div>
    </div>
</article>