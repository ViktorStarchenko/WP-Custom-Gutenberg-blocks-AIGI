<?php

    $venue_details = get_field('venue_details', $post);

    if ($venue_details['catered'] == 'yes' || $venue_details['accessibility_options'] || $venue_details['carparking_options'] || $venue_details['other_transport_options'] || $venue_details['covid_safe_plan']) { ?>
        <div class="tab tab-venue-details global-search-tab" data-post-type="venue-details">
            <div class="tab-heading" style="font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;color:#131032;margin-bottom: 26px;">Venue details</div>
            <div class="tab-content-wrapper">

        <?php if ($venue_details['catered'] == 'yes') { ?>
                <div class="post-details__item" style="padding: 0 0 0 12px;">
                    <div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Catered</div>
                    <div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d">Catered - <?php echo $venue_details["catered"] ?></div>
                    <div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d">Details:  <?php echo $venue_details["catered_details"] ?> </div>
                </div>
        <?php } ?>

        <?php if ($venue_details["accessibility_options"]) { ?>
            <div class="post-details__item" style="padding: 8px 0 8px 12px;">
                <div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Accessibility Options</div>
                <div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d">
            <?php foreach ($venue_details['accessibility_options'] as $accessibility_options) { ?>
                    <?php echo $accessibility_options ?>
            <?php } ?>
                </div>
            </div>
        <?php } ?>

        <?php if ($venue_details['carparking_options']) { ?>
            <div class="post-details__item" style="padding: 8px 0 8px 12px;">
                <div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Carparking Options</div>
                <div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d">
            <?php foreach ($venue_details['carparking_options'] as $carparking_options) { ?>
                    <?php echo $carparking_options ?>
            <?php } ?>
                </div>
            </div>
        <?php } ?>

        <?php if ($venue_details['other_transport_options']) { ?>
            <div class="post-details__item" style="padding: 8px 0 8px 12px;">
                <div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Other Transport Options</div>
                <div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d"><?php echo $venue_details['other_transport_options']?></div>
                </div>
        <?php } ?>

        <?php if ($venue_details['covid_safe_plan']) { ?>
            <div class="post-details__item" style="padding: 8px 0 8px 12px;">
                <div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">COVID safe plan</div>
                <div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d">
            </div>
            <a href="<?php echo $venue_details["covid_safe_plan"]["url"] ?>" class="post-details__link" style="    font-weight: bold;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color:#0762a4;display: inline-block;">safe plan</a>
         </div>
        <?php } ?>




        </div>
    </div>
   <?php  } ?>

