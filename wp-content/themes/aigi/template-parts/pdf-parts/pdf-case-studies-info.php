<?php

$authors = get_field('author',$post);

if ($authors) { ?>
    <div class="post-details__item author" style="margin: 32px 0;">
        <div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Written by</div>
        <?php foreach (get_field('author') as $author) { ?>
            <div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d">
                <?php echo $author->post_title ?>:
                <?php if (get_field ('author_title', $author->ID)) { ?>
                    <span><?php echo get_field("author_title", $author->ID)?> </span>
        <?php } ?>
            </div>
    <?php } ?>
    </div>
<?php }


$c_studies_locationtion = get_field('c_studies_locationtion', $post);

if ($c_studies_locationtion['address']) { ?>
    <div class="post-details__item" style="margin: 32px 0;">
        <div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Location</div>
            <div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d"> <?php echo $c_studies_locationtion["address"]["address"];?></div>
                <a style="font-weight: 700;font-size: 14px;line-height: 160%;letter-spacing: 0.7px;text-decoration-line: underline;color: #0762A4;" href="https://maps.google.com/?q=<?php echo $c_studies_locationtion["address"]["lat"]?>,<?php echo $c_studies_locationtion["address"]["lng"]?>" target="_blank" class="post-details__link">View on map</a>
    </div>
<?php } ?>
