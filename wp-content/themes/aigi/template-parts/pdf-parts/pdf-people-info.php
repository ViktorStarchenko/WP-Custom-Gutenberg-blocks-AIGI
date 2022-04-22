<?php

$people_info_get_position = get_field('people_info',$post)['position'];

if ($people_info_get_position) { ?>
    <div class="post-details__item" style="margin:8px 0">
        <div class="post-details__text"><?php echo $people_info_get_position; ?></div>
    </div>
<?php }


$people_info_get_qualification = get_field('people_info',$post);


if ($people_info_get_qualification['qualification']) { ?>
    <div class="post-details__item">
        <div class="post-details__text">
            <ul class="rounded-list">
            <?php foreach (get_field('people_info')['qualification'] as $qualification) { ?>
                <li style="margin: 8px 0;"><?php echo $qualification["item"]; ?></li>
    <?php } ?>
            </ul>
        </div>
    </div>
<?php }


$people_info_get_topics_of_expertise = get_field('people_info',$post)['topics_of_expertise'];

if ($people_info_get_topics_of_expertise) { ?>
    <div class="post-details__item border-top" style="margin: 16px;">
        <div class="post-details__heading topics_of_expertise" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">topics of expertise:</div>
            <div class="post-details__text">
                <div class="post-tile__tags">
                <?php foreach ($people_info_get_topics_of_expertise as $topics_of_expertise) { ?>
                    <span class="content-tags__item small" style="background: #FFFFFF;border: 1px solid #e0e0e0;box-sizing: border-box;border-radius: 50px;padding: 4px 10px;display: inline-block;margin: 4px;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 11.85px;line-height: 19px;letter-spacing: 2px;text-transform: uppercase;color: #000000;text-decoration: none;"><?php echo $topics_of_expertise["item"]; ?></span>
    <?php } ?>
                </div>
            </div>
    </div>
<?php }
