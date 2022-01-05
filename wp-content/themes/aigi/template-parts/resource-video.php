<?php the_post(); ?>
<h3 class="author-name"><?php the_title(); ?></h3>
<?php if ( has_post_thumbnail() ) : ?>
    <div class="author-thumbnail">
        <?php the_post_thumbnail(); ?>
    </div>
<?php endif; ?>
<div class="author-bio">
    <?php the_content() ?>
</div>