<?php

function get_pdf_event_info($post) {


    $html = '';
    $early_bird = '';
    $full_price = '';
    $partner_price = '';
    $date_rate = '';
    $freepaid = 'no';
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

    $html .=                                    '<div class="post-tile__pricing-block" style="margin:32px auto;">';
    $html .=                                        '<div class="post-tile__pricing-title" style="font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 10.53px;line-height: 12px;letter-spacing: 2px;text-transform: uppercase;color:#0762a4;margin-bottom: 16px;">Event Pricing</div>';
    $html .=                                       '<div class="post-tile__pricing-list" style="display: flex;align-items: center;justify-content: flex-start;">';
    if ($early_bird) {
        $html .=           '<div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;padding-left:0;border-right: 1px solid #e0e0e0;">
                                                            <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Early Bird</span>
                                                            <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;">'.$early_bird.'</span>
                                                        </div>';
                                }
                                if ($full_price) {
                                    $html .=            '<div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;border-right: 1px solid #e0e0e0;">
                                                            <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Full Price</span>
                                                            <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;">'.$full_price.'</span>
                                                        </div>';
                                }
                                if ($partner_price) {
                                    $html .=              '<div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;border-right: 1px solid #e0e0e0;">
                                                                <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Partner Price</span>
                                                                <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;">'.$partner_price.'</span>
                                                            </div>';
                                }
                                if ($partner_price) {
                                    $html .=              '<div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;border-right: 1px solid #e0e0e0;">
                                                                <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Date Rate</span>
                                                                <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;">'.$date_rate.'</span>
                                                            </div>';
                                }
                                if ($freepaid) {
                                    $html .=          ' <div class="post-tile__pricing-item" style="display: inline-block;width: 20%;max-width: 100px;padding: 0 25px;">
                                                                <span class="post-tile__pricing-type" style="display: block;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 14.8px;line-height: 19px;letter-spacing: 0.05em;color:#131032;">Free</span>
                                                                <span class="post-tile__pricing-price" style="font-family: Proxima Nova;font-style: normal;font-weight: normal;font-size: 14.4px;line-height: 19px;text-align: right;letter-spacing: 0.05em;color:#4d4d4d;">'.$freepaid.'</span>
                                                            </div>';
                                }

    $html .=               '</div>';
    $html .=           '</div>';
                                if ($ticket_link) {
                                    $html .=                '<div class="single-event__pricing-list" style="margin: 16px 0 32px">';

                                    $html .=                 '<div class="single-event__pricing-item">';
                                    $html .=                     '<a href="'.$ticket_link.'" target="_blank" class="btn-body  btn-h-secondary-blue  enlarge  after  Between " tabindex="0" style="min-width: 217px;font-family: Proxima Nova;font-style: normal;font-weight: 800;font-size: 15px;line-height: 14px;display: flex;align-items: center;text-align: center;display: inline-block;letter-spacing: 0.08em;text-transform: uppercase;text-decoration: none;border-radius: 5px;padding: 17px 20px;transition: all .3s;box-sizing: border-box;position: relative;cursor: pointer;white-space: nowrap;color: #FFFFFF;background-color:#138dcd;border: 1px solid #138dcd;"><span class="btn-inner">Get tickets</span></a>';
                                    $html .=                '</div>';
                                    $html .=                '</div>';
                                }

                                if (get_field('events_details', $post)['start_date']) {
                                    $html .=    '<div class="post-details">';
                                    $html .=        '<div class="post-details__item" style="margin-bottom: 16px;">';
                                    $html .=            '<div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Events details</div>';
                                    $html .=            '<div class="post-details__text" style="font-weight: normal;font-size: 16px;line-height: 24px;letter-spacing: 0.05em;color:#4d4d4d;">';
                                    $html .=                '<div> '.get_field("events_details", $post)["start_date"].' - '.get_field("events_details", $post)["end_date"].'</div>';
                                    $html .=            '</div>';
                                            $googleCalendarLink = googleCalendarLink();
                                    $html .=            '<a href=" '.$googleCalendarLink.' " target="_blank" class="post-details__link"  style="font-weight: bold;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color: #0762a4;display: inline-block;">Add to calendar</a>';
                                    $html .=        '</div>';
                                    $html .=        '<div class="post-details__item" style="margin-bottom: 16px;">';
                                    $html .=            '<div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Location</div>';
                                    $html .=            '<div class="post-details__text" style="font-weight: normal;font-size: 16px;line-height: 24px;letter-spacing: 0.05em;color:#4d4d4d;">'. get_field("location", $post)["address"]["address"].'</div>';
                                    $html .=            '<a href="https://maps.google.com/?q='.get_field("location", $post)["address"]["lat"].','.get_field("location", $post)["address"]["lng"].'" target="_blank" class="post-details__link" style="    font-weight: bold;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color: #0762a4;display: inline-block;">View on map</a>';
                                    $html .=        '</div>';
                                    $html .=    '</div>';

                                }

    return $html;
}


function get_pdf_event_speakers($post) {
    $speakers = get_field('speakers', $post);
    $html = '';
    if ($speakers) {
        $html.=    '<div class="content-item profile-list">';
        $html.=        '<div class="rslider__header">';
        $html.=            '<div class="rslider__header-top">';
        $html.=                '<div class="rslider__heading" style="font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;color:#131032;margin-bottom: 22px;">Keynote speakers</div>';
        $html.=            '</div>';
        $html.=        '</div>';
        $html.=        '<div class="profile-list__wrapper">';

                     foreach($speakers as $speaker) {
                         $html.=                 '<div class="profile-list__item" style="margin-bottom: 32px;">';
                         $html.=                        '<div class="rslider__item-header">';

                         $html.= '</div>';
                         $html.=   '<div class="rslider__item-body">';
                         $html.=   '<div class="speakers__bio" style="margin-bottom: 16px;">';
                         $html.=    '<div class="speakers__image" style="width: 80px;min-width: 80px;height: 80px;border-radius: 5px;overflow: hidden;margin-right: 16px; display: inline-block;">';

                         $html.=        '<img src="'.get_the_post_thumbnail_url($speaker->ID, 'full').'" alt="'.$speaker->post_title.'" style="width: 100%;height: 100%;object-fit: cover;">';
                         $html.=    '</div>';
                         $html.=   '<div class="speakers__bio-text" style="font-weight: bold;font-size: 18px;line-height: 22px;letter-spacing: 0.02em;color:#131032; display: inline-block;">';
                         $html.=        '<div class="speakers__name"> '.$speaker->post_title.'</div>';
                         $html.=        '<div class="speakers__position"> '.get_field("people_info")["position"].'</div>';
                         $html.=    '</div>';
                         $html.= '</div>';

                         $html.= '<div class="rslider__excerpt" style="ont-size: 15px;line-height: 24px;letter-spacing: 0.03em;margin-bottom: 10px;color:#4d4d4d"> '.get_custom_excerpt($speaker->post_excerpt, 450, true).'</div>';

                         $html.=  '</div>';

                         $html.=   '</div>';
                    }

//                    wp_reset_postdata();


        $html.=        '</div>';
        $html.=    '</div>';
    }

    return $html;

}

function get_pdf_event_program($post) {
    $programs = get_field('program',$post);
    $html = '';
    if ($programs) {

        $html .= '<div class="tab-heading" style="font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;color:#131032;margin-bottom: 26px;">Program</div>';
        $html .= '<div class="accordion_wrapper">';
        foreach ($programs as $program) {
            $html .=     '<div class="accordion_item" style="border-top: 1px solid #dfdfdf;padding-top: 12px;">';
                 if($program['action_description']) {
                     $html .=            '<span class="title-h4 nav_list-title accordion_btn" style="font-size: 15.78px;line-height: 20px;letter-spacing: 0.02em;padding: 18px 0;color:#231F20;font-style: normal;font-weight: bold;"> '.$program["action_time"].'  -  '.$program["action_title"].'</span>';
                 }
            $html .=             '<div  class="accordion_panel">';
            $html .=                 '<div class="accordion_content" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;padding: 16px 20px;"> '.$program["action_description"].'</div>
                </div>';
            $html .=    '</div>';
        }

//        wp_reset_postdata();
        $html .= '</div>';
    }
    return $html;
}


function get_pdf_event_venue_details($post) {
    $venue_details = get_field('venue_details', $post);
    $html = '';
    if ($venue_details['catered'] == 'yes' || $venue_details['accessibility_options'] || $venue_details['carparking_options'] || $venue_details['other_transport_options'] || $venue_details['covid_safe_plan']) {
        $html .= '<div class="tab tab-venue-details global-search-tab" data-post-type="venue-details">';
        $html .=        '<div class="tab-heading" style="font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;color:#131032;margin-bottom: 26px;">Venue details</div>';
        $html .=        '<div class="tab-content-wrapper">';

             if ($venue_details['catered'] == 'yes') {
                 $html .=  '<div class="post-details__item" style="padding: 0 0 0 12px;">';
                 $html .=                '<div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Catered</div>';
                 $html .=                '<div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d">Catered - '. $venue_details["catered"] .'</div>';
                 $html .=                '<div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d">Details:  '.$venue_details["catered_details"].' </div>';
                 $html .=            '</div>';
             }

             if ($venue_details["accessibility_options"]) {
                 $html .=            '<div class="post-details__item" style="padding: 8px 0 8px 12px;">';
                 $html .=                '<div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Accessibility Options</div>';
                 $html .=                '<div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d">';
                        foreach ($venue_details['accessibility_options'] as $accessibility_options) {
                            $html .=                    $accessibility_options . ', ';
                        }
                 $html .=            '</div>';
                 $html .=        '</div>';
                }

             if ($venue_details['carparking_options']) {
                 $html .=        '<div class="post-details__item" style="padding: 8px 0 8px 12px;">';
                 $html .=            '<div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Carparking Options</div>';
                 $html .=             '<div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d">';
                            foreach ($venue_details['carparking_options'] as $carparking_options) {
                                $html .=                        $carparking_options . ', ';
                            }
                 $html .=               '</div>';
                 $html .=        '</div>';
             }

             if ($venue_details['other_transport_options']) {
                 $html .=        '<div class="post-details__item" style="padding: 8px 0 8px 12px;">';
                 $html .=            '<div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">Other Transport Options</div>';
                 $html .=                '<div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d">';
                 $html .=                         $venue_details['other_transport_options'];
                 $html .=              '</div>';
                 $html .=         '</div>';
             }

            if ($venue_details['covid_safe_plan']) {
                $html .=        '<div class="post-details__item" style="padding: 8px 0 8px 12px;">';
                $html .=          '<div class="post-details__heading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032;margin-bottom: 16px;">COVID safe plan</div>';
                $html .=                '<div class="post-details__text" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;color:#4d4d4d">';
                $html .=                '</div>';
                $html .=                '<a href="'.$venue_details["covid_safe_plan"]["url"].'" class="post-details__link" style="    font-weight: bold;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color:#0762a4;display: inline-block;">safe plan</a>';
                $html .=            '</div>';
            }




        $html .=        '</div>';
        $html .=    '</div>';
    }


    return $html;

}

function get_pdf_event_faqs($post) {
    $faqs = get_field('faqs',$post);

    $html = '';
    if ($faqs) {
        $html .=  '<div style="margin: 32px 0">';
        $html .= '<div class="tab-heading" style="font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;color: #131032;margin-bottom: 26px;">FAQS</div>';
        $html .=   ' <div class="tab-content-wrapper">';
        $html .=        '<div class="accordion_wrapper">';
                foreach ($faqs as $faq) {
                    $html .=                '<div class="accordion_item" style="border-top: 1px solid #dfdfdf;
    padding-top: 12px;">';
                        if($faq['question']) {
                            $html .=                    '<span class="title-h4 nav_list-title accordion_btn" style="font-size: 15.78px;line-height: 20px;letter-spacing: 0.02em;padding: 18px 0;color: #231F20;font-style: normal;font-weight: bold;"> '.$faq["question"].'</span>';
                        }
                    $html .=                    '<div  class="accordion_panel">';
                    $html .=                        '<div class="accordion_content" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;padding: 16px 20px;">'.$faq["answer"].'</div>';
                    $html .=                    '</div>';
                    $html .=                '</div>';
                }
        $html .=        '</div>';
        $html .=    '</div>';
        $html .=    '</diiv>';
    }

    return $html;
}