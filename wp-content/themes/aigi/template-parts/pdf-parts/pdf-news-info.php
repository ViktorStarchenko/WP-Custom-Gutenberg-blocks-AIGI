<?php

$authors = get_field('author', $post);

if ($authors) { ?>
    <div class="post-details__item author" style="margin: 32px 0;">
        <div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color: #131032;margin-bottom: 16px;">Written by</div>

    <?php foreach (get_field('author') as $author) { ?>
        <div class="post-details__text" style="font-weight: normal;font-size: 16px;line-height: 24px;letter-spacing: 0.05em;color: #4d4d4d;">
        <?php echo $author->post_title ?>:
        <?php if (get_field ("author_title", $author->ID)) { ?>
            <span> <?php echo get_field("author_title", $author->ID) ?></span>
        <?php } ?>
        </div>
    <?php } ?>
    </div>
<?php } ?>

