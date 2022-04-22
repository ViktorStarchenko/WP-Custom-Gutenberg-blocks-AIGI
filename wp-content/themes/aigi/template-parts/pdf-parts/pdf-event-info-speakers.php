<?php

$speakers = get_field('speakers', $post);

if ($speakers) { ?>
    <div class="content-item profile-list">
        <div class="rslider__header">
            <div class="rslider__header-top" style="margin: 16px 0 32px;">
                <div class="rslider__heading" style="font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;color:#131032;margin-bottom: 22px;">Keynote speakers</div>
            </div>
        </div>
   <div class="profile-list__wrapper">

        <?php foreach($speakers as $speaker) { ?>
        <div class="profile-list__item" style="margin-bottom: 32px;">
            <div class="rslider__item-header"></div>
            <div class="rslider__item-body">
                <div class="speakers__bio" style="margin-bottom: 16px;">
                    <div class="speakers__image" style="width: 80px;min-width: 80px;height: 80px;border-radius: 5px;overflow: hidden;margin-right: 16px; display: inline-block;">
                        <img src="<?php echo get_the_post_thumbnail_url($speaker->ID, 'full') ?>" alt="<?php echo $speaker->post_title?>" style="width: 100%;height: 100%;object-fit: cover;">
                    </div>
                   <div class="speakers__bio-text" style="font-weight: bold;font-size: 18px;line-height: 22px;letter-spacing: 0.02em;color:#131032; display: inline-block;">
                        <div class="speakers__name"> <?php echo $speaker->post_title?></div>
                        <div class="speakers__position"><?php echo get_field("people_info")["position"]?></div>
                   </div>
                </div>

                <div class="rslider__excerpt" style="ont-size: 15px;line-height: 24px;letter-spacing: 0.03em;margin-bottom: 10px;color:#4d4d4d"> <?php echo get_custom_excerpt($speaker->post_excerpt, 450, true) ?></div>

            </div>

        </div>
        <?php } ?>

   </div>
</div>
<?php } ?>

