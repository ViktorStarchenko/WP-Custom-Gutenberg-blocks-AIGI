<?php

$programs = get_field('program',$post);
if ($programs) { ?>

    <div class="tab-heading" style="font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;color:#131032;margin-bottom: 26px;">Program</div>
    <div class="accordion_wrapper">
    <?php foreach ($programs as $program) { ?>
        <div class="accordion_item" style="border-top: 1px solid #dfdfdf;padding-top: 12px;">
        <?php if($program['action_description']) { ?>
            <span class="title-h4 nav_list-title accordion_btn" style="font-size: 15.78px;line-height: 20px;letter-spacing: 0.02em;padding: 18px 0;color:#231F20;font-style: normal;font-weight: bold;"> <?php echo $program["action_time"]?>  -  <?php echo $program["action_title"]?></span>
        <?php } ?>
            <div  class="accordion_panel">
                <div class="accordion_content" style="font-size: 14px;line-height: 22px;letter-spacing: 0.08em;padding: 16px 20px;"> <?php echo $program["action_description"]?></div>
            </div>
        </div>
    <?php } ?>

    </div>
<?php } ?>
