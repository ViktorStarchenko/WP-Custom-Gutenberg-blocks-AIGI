<?php


$html = '';
$early_bird = '';
$full_price = '';
$partner_price = '';
$date_rate = '';
$freepaid = '';
$ticket_link = '';
    if (get_field('pricing', $post)['freepaid'] == 'paid') {

        if (get_field('pricing', $post)['early_bird']) {
        $early_bird = get_field('pricing', $post)['early_bird'];
        }
        if (get_field('pricing', $post)['full_price']) {
        $full_price = get_field('pricing', $post)['full_price'];
        }
        if (get_field('pricing', $post)['partner_price']) {
        $partner_price = get_field('pricing', $post)['partner_price'];
        }
        if (get_field('pricing', $post)['date_rate']) {
        $date_rate = get_field('pricing', $post)['date_rate'];
        }
    }

    if (get_field('pricing', $post)['freepaid'] == 'free') {
    $freepaid = get_field('pricing', $post)['freepaid'];
    }

    if (get_field('pricing', $post)['ticket_link']) {
    $ticket_link = get_field('pricing', $post)['ticket_link']['url'];
    }
?>
<style>

</style>
<?php if (get_field('pricing', $post)['enable'] == true) {?>
    <div class="post-tile__pricing-block" style="margin:32px auto;">

        <div class="post-tile__pricing-title" style="font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 10.53px;line-height: 12px;letter-spacing: 2px;text-transform: uppercase;color:#0762a4;margin-bottom: 24px">Event Pricing</div>
        <div class="post-tile__pricing-list" style="display: flex;align-items: center;justify-content: flex-start;">
         <?php   if ($early_bird) { ?>
            <div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;padding-left:0;border-right: 1px solid #e0e0e0;">
                <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Early Bird</span>
                <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;"><?php echo $early_bird?></span>
            </div>
            <?php } ?>
            <?php if ($full_price) { ?>
            <div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;border-right: 1px solid #e0e0e0;">
                <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Full Price</span>
                <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;"><?php echo $full_price?></span>
            </div>
            <?php } ?>
            <?php if ($partner_price) { ?>
            <div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;border-right: 1px solid #e0e0e0;">
                <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Partner Price</span>
                <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;"><?php echo $partner_price?></span>
            </div>
            <?php } ?>
            <?php if ($partner_price) { ?>
            <div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;border-right: 1px solid #e0e0e0;">
                <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Date Rate</span>
                <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;"><?php echo $date_rate; ?></span>
            </div>
            <?php } ?>
            <?php if ($freepaid) { ?>
            <div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;">
                <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Free</span>
                <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;"><?php echo $freepaid?></span>
            </div>
            <?php } ?>

            </div>
    </div>
<?php } ?>



    <?php if ($ticket_link) { ?>
    <div class="single-event__pricing-list" style="margin: 16px 0 32px">

            <div class="single-event__pricing-item">
                <a href="<?php echo $ticket_link ?>" target="_blank" class="" tabindex="0" style="font-family: 'Proxima Nova';font-style: normal;font-weight: 700;line-height: 12px;letter-spacing: 2px;text-transform: uppercase;color: #0762A4;text-decoration: none;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color:#0762a4;position: relative;word-break: break-all;">Get tickets</a>
            </div>
    </div>
    <?php } ?>

<?php if (get_field('events_details', $post)['start_date']) { ?>
        <div class="post-details">
            <div class="post-details__item" style="margin-bottom: 16px;">
                <div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Events details</div>
                <div class="post-details__text" style="font-weight: normal;font-size: 16px;line-height: 24px;letter-spacing: 0.05em;color:#4d4d4d;">
                    <div> <?php echo get_field("events_details", $post)["start_date"]?> - <?php echo get_field("events_details", $post)["end_date"]?></div>
                    </div>
               <?php $googleCalendarLink = googleCalendarLink(); ?>
               <a href=" <?php echo $googleCalendarLink ?> " target="_blank" class="post-details__link"  style="font-weight: bold;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color: #0762a4;display: inline-block;">Add to calendar</a>
               </div>

            <div class="post-details__item" style="margin-bottom: 16px;">
                <div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Location</div>
                <div class="post-details__text" style="font-weight: normal;font-size: 16px;line-height: 24px;letter-spacing: 0.05em;color:#4d4d4d;"><?php echo get_field("location", $post)["address"]["address"]?></div>
                <a href="https://maps.google.com/?q=<?php echo get_field("location", $post)["address"]["lat"]?>,<?php echo get_field("location", $post)["address"]["lng"]?>" target="_blank" class="post-details__link" style="    font-weight: bold;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color: #0762a4;display: inline-block;">View on map</a>
             </div>
        </div>

<?php } ?>

