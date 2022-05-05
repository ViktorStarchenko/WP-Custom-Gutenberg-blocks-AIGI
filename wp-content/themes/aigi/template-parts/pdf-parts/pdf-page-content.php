<style>
    .content-item a {
        font-family: 'Proxima Nova';
        font-style: normal;
        font-weight: 700;
        font-size: 10px;
        line-height: 12px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #0762A4;
        text-decoration: none;
    }
</style>

<?php


$content_items = $args;

if ($content_items)  {

foreach ($content_items as $content_item) {
//Subheads-->
        if ($content_item['item_type'] == 'Subheads') { ?>
            <div class="content-item subheads-block">
                <p class="sub-heading" style="font-style: normal;font-weight: 600;font-size: 22.78px;line-height: 36px;letter-spacing: 0.06em;color: #a74f39;"><?php echo $content_item["subheads_block"]["content"]; ?></p></div>
        <?php } ?>
        <?php if ($content_item['item_type'] == 'Text Block') { ?>
            <div class="content-item text-block" style="color:#4d4d4d;font-size:16px;"> <?php echo $content_item["text_block"]["content"] ; ?></div>
        <?php } ?>
        <!--            Heading-->
        <?php if ($content_item['item_type'] == 'Heading') { ?>
            <div class="content-item text-block text_item heading" style="font-weight: bold;font-size: 30.35px;line-height: 36px;letter-spacing: 0.02em;color:#131032"> <?php $content_item["heading_block"]["content"] ?></div>
        <?php } ?>
        <!--            Subheading-->
        <?php if ($content_item['item_type'] == 'Subheading') { ?>
            <div class="content-item text-block text_item subheading" style="font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032"><?php echo $content_item["subheading_block"]["content"]; ?></div>
        <?php } ?>
        <!--            Small Text-->
        <?php if ($content_item['item_type'] == 'Small Text') { ?>
            <div class="content-item text-block text_item small-text" style="font-size: 14px;line-height: 24px;letter-spacing: 0.03em;color:#4d4d4d"><?php echo $content_item["small_text_block"]["content"]?></div>
        <?php } ?>


        <!--            Video-->
        <?php if ($content_item['item_type'] == 'Video') { ?>
            <div class="content-item video"  style="margin: 16px 0">
                <div class="single-resource__container link" style="max-width: 800px;background: #FFFFFF;box-sizing: border-box;border-radius: 4px;position: relative;margin: 24px auto;padding-bottom: 24px;border: 2px solid #00af90;">
                    <div class="single-resource__bg"></div>
                    <div class="single-resource__inner" style="display: flex;flex-direction: column;align-items: center;margin: auto;position: relative;">
                        <div class="single-resource__header"  style="background-color:#00af90;width: 100%;padding: 20px 0;display: flex;flex-direction: row;align-items: center;justify-content: space-between;color:#fff;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;text-decoration: none;">
                            <div class="single-resource__title"  style="margin-left: 20px;">
                                <span> <?php echo $content_item["video_block"]["title"]; ?></span>
                            </div>
                            <span class="single-resource__icon  link"></span>
                        </div>
                        <div class="single-resource__body"  style="padding:12px 20px;">

                            <?php if ($content_item['video_block']['video_source_type'] == 'embed') { ?>

                                <?php if($content_item['video_block']['youtube_code']) { ?>

                                    <a  style="font-family: Proxima Nova;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color:#0762a4;position: relative;word-break: break-all;" target="_blank" href="https://youtu.be/<?php echo $content_item['video_block']['youtube_code']?>"> <?php echo $content_item["video_block"]["title"]?></a>

                                <?php } ?>

                            <?php } else if ($content_item['video_block']['video_source_type'] == 'upload') { ?>
                                <?php if ($content_item['video_block']['add_file']) { ?>
                                    <a  style="font-family: Proxima Nova;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color:#0762a4;position: relative;word-break: break-all;" target="_blank" href="<?php echo $content_item['video_block']['add_file']['url']?>"> <?php echo $content_item["video_block"]["title"]?></a>
                                <?php } ?>

                            <?php } else if ($content_item['video_block']['video_source_type'] == 'vimeo-link') { ?>
                                <?php echo $content_item['video_block']['vimeo_link']; ?>
                            <?php } ?>
                            <div class="resource__text"  style="font-size: 14.4px;line-height: 24px;letter-spacing: 0.05em;color:#4d4d4d;padding: 20px 0;"><?php echo $content_item['video_block']['add_text'];?></div>
                        </div>

                        <div class="single-resource__footer"></div>
                    </div>

                </div>
            </div>

        <?php } ?>

        <?php if ($content_item['item_type'] == 'Video') { ?>
            <!--                Image-->
            <?php if ($content_item['image_block']['add_image']) { ?>
                <div class="resource-image__wrap">
                    <img src="<?php echo $content_item["image_block"]["add_image"]["url"] ?>" alt="<?php echo $content_item["image_block"]["add_image"]["title"] ?>" style="max-width: 600px;"/>
                </div>
            <?php } ?>
            <?php if($content_item['image_block']['add_text']) { ?>
                <div class="resource__text">
                    <p style="font-size: 14px;line-height: 24px;letter-spacing: 0.03em;color:#4d4d4d"><?php echo   $content_item['image_block']['add_text'] ?></p>
                </div>
            <?php } ?>
        <?php } ?>

<!--            Blockquote-->
        <?php if ($content_item['item_type'] == 'Blockquote') { ?>
            <div class="content-item text-block" style="font-weight: bold; color:#c45726">
                <div class="blockquote-body">
                    <blockquote class="blockquote-text" style="font-style: italic;font-weight: bold;font-size:16px; color:#c45726"><?php echo $content_item["blockquote"]["text"]; ?></blockquote>
                    <div class="blockquote-author">
                        <span><?php echo $content_item["blockquote"]["author"]?></span>
                    </div>
                    <div class="blockquote-author-position">
                        <span><?php echo $content_item["blockquote"]["author_position"] ?></span>
                    </div>
                </div>
            </div>
        <?php } ?>
<!--            Accordion-->
        <?php if ($content_item['item_type'] == 'Accordion') { ?>

        <?php if ($content_item['accordion_block']) { ?>
            <div class="content-item accordion" style="margin: 16px 0">
            <div class="accordion_wrapper">
            <?php foreach ($content_item['accordion_block'] as $accordion_item) { ?>
                <div class="accordion_item" style="border-top: 1px solid #dfdfdf; padding-top: 12px;">
                <?php if($accordion_item['content']) { ?>
                    <span class="title-h4 nav_list-title" style="font-style: normal;font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;color: #231F20;"><?php echo $accordion_item["title"]?></span>
                    <?php } ?>

                    <div  class="accordion_panel" style="padding-top: 10px;">
                        <?php if($accordion_item['subtitle']) { ?>
                            <span class="accordion_subtitle" style="font-style: normal;font-weight: bold;font-size: 18px;line-height: 25px;letter-spacing: 0.02em;color:#0762a4; padding-left: 16px"><?php echo $accordion_item["subtitle"]; ?></span>
                        <?php } ?>

                        <div class="accordion_content" style="font-style: normal;font-weight: normal;font-size: 16px;line-height: 24px; letter-spacing: 0.05em; color:#4d4d4d; padding-left: 16px">
                            <?php if($accordion_item['content']) { ?>
                                <?php echo  $accordion_item['content']; ?>
                            <?php } ?>
                        </div>
                    </div>
                    </div>
                <?php } ?>
                </div>
                </div>
            <?php } ?>
        <?php } ?>



        <!--            File-->
        <?php if ($content_item['item_type'] == 'File') { ?>
            <div class="content-item file" style="margin: 16px 0">
                <div class="single-resource__container file" style="max-width: 800px;background: #FFFFFF;box-sizing: border-box;border-radius: 4px;position: relative;margin: 24px auto;padding-bottom: 24px;border: 2px solid #97a93e;">
                    <div class="single-resource__bg" style=""></div>
                    <div class="single-resource__inner"style="display: flex;flex-direction: column;align-items: center;margin: auto;position: relative;">
                        <div class="single-resource__header" style="background-color:#97a93e;width: 100%;padding: 20px 0;display: flex;flex-direction: row;align-items: center;justify-content: space-between;color:#fff;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;text-decoration: none;">
                            <div class="single-resource__title" style="margin-left: 20px;">
                                <span><?php echo $content_item["file_block"]["file_title"] ; ?></span>
                            </div>
                            <span class="single-resource__icon file"></span>
                        </div>
                        <div class="single-resource__body" style="padding:12px 20px;">

                            <div class="resource__text" style="font-size: 14.4px;line-height: 24px;letter-spacing: 0.05em;color:#4d4d4d;padding: 20px 0;"><?php echo  $content_item['file_block']['file_text'];?></div>

                            <?php if($content_item['file_block']['files']) { ?>
                                <?php foreach ($content_item['file_block']['files'] as $file) { ?>
                                    <div class="resource-link file">
                                        <a style="font-family: Proxima Nova;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color:#0762a4;position: relative;word-break: break-all;" href="<?php echo $file["file"]["url"];?>" download><?php echo $file["file"]["title"] ?></a>;
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>

                        <div class="single-resource__footer"></div>
                    </div>

                </div>
            </div>
        <?php } ?>

        <?php if ($content_item['item_type'] == 'Link') { ?>
            <div class="content-item link"  style="margin: 16px 0">
                <div class="single-resource__container link" style="max-width: 800px;background: #FFFFFF;box-sizing: border-box;border-radius: 4px;position: relative;margin: 24px auto;padding-bottom: 24px;border: 2px solid #138dcd;">
                    <div class="single-resource__bg"></div>
                    <div class="single-resource__inner" style="display: flex;flex-direction: column;align-items: center;margin: auto;position: relative;">
                        <div class="single-resource__header"  style="background-color:#138dcd;width: 100%;padding: 20px 0;display: flex;flex-direction: row;align-items: center;justify-content: space-between;color:#fff;font-family: Proxima Nova;font-style: normal;font-weight: bold;font-size: 22.44px;line-height: 25px;letter-spacing: 0.02em;text-decoration: none;">
                            <div class="single-resource__title"  style="margin-left: 20px;">
                                <span><?php echo $content_item["link_block"]["link_title"]; ?></span>
                            </div>
                            <span class="single-resource__icon  link"></span>
                        </div>
                        <div class="single-resource__body"  style="padding:12px 20px;">
                            <div class="resource__text"  style="font-size: 14.4px;line-height: 24px;letter-spacing: 0.05em;color:#4d4d4d;padding: 20px 0;"><?php echo $content_item['link_block']['link_text'];?></div>
                            <?php if($content_item['link_block']['link']) { ?>
                                <div class="resource-link">
                                    <a  style="font-family: Proxima Nova;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color:#0762a4;position: relative;word-break: break-all;" target="_blank" href="<?php echo $content_item["link_block"]["link"]["url"] ; ?>"> <?php echo $content_item["link_block"]["link"]["title"]; ?></a>
                                </div>
                            <?php } ?>

                        </div>

                        <div class="single-resource__footer"></div>
                    </div>

                </div>
            </div>
        <?php } ?>

        <?php if ($content_item['item_type'] == 'Buttons Group') { ?>
        <div class="content-item buttons-block" style ="margin: 32px 0">

            <?php $button_group = $content_item['button_group']; ?>

            <?php if($button_group['buttons']) { ?>
                <div class="btn-group  ?>" style=" margin: -4px">
                    <?php foreach($button_group['buttons'] as $button) { ?>
                        <a href="<?php echo  $button['button']['url'] ?>" target="_blank" class="  btn-body " style="   min-width: 217px;font-family: Proxima Nova;font-style: normal;font-weight: 800;font-size: 15px;line-height: 14px;display: flex;align-items: center;text-align: center;display: inline-block;letter-spacing: 0.08em;text-transform: uppercase;text-decoration: none;border-radius: 5px;padding: 17px 20px;transition: all .3s;box-sizing: border-box;position: relative;cursor: pointer;white-space: nowrap; color: #fff; background-color: #0762a4; margin: 4px;">
                            <span class="btn-inner"><?php echo $button["button"]["title"] ; ?></span>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

        <?php } ?>

    <?php } ?>

<?php } ?>

