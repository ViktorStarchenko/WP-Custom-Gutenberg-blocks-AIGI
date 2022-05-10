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

        font-family: Proxima Nova;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color:#0762a4;position: relative;word-break: break-all;
    }
    .single-resource__container {
        max-width: 600px;
        background: #FFFFFF;
        box-sizing: border-box;
        border-radius: 4px;
        position: relative;
        margin: 24px auto;
        padding-bottom: 24px;
    }
    /*.single-resource__container.video .single-resource__bg,*/
    .single-resource__container.video .single-resource__header {
        /*background-color: #00AF90;*/
    }
    /*.single-resource__container.video {*/
    /*    border: 2px solid #00AF90;*/
    /*}*/
    .single-resource__container.image .single-resource__bg,
    .single-resource__container.image .single-resource__header {
        /*background-color: #DC9C50;*/
    }
    .single-resource__container.image {
        /*border: 2px solid #DC9C50;*/
    }
    .single-resource__container.table .single-resource__bg,
    .single-resource__container.table .single-resource__header {
        /*background-color: #7B367C;*/
    }
    .single-resource__container.table {
        /*border: 2px solid #7B367C;*/
    }
    .single-resource__container.tips .single-resource__bg,
    .single-resource__container.tips .single-resource__header {
        /*background-color: #C45726;*/
    }
    .single-resource__container.tips {
        /*border: 2px solid #C45726;*/
    }
    .single-resource__container.link .single-resource__bg,
    .single-resource__container.link .single-resource__header {
        /*background-color: #138DCD;*/
    }
    .single-resource__container.link {
        /*border: 2px solid #138DCD;*/
    }
    .single-resource__container.file .single-resource__b,
    .single-resource__container.file .single-resource__header {
        /*background-color: #97A93E;*/
    }
    .single-resource__container.file {
        /*border: 2px solid #97A93E;*/
    }
    .single-resource__container.publication .single-resource__b,
    .single-resource__container.publication .single-resource__header {
        /*background-color: #131032;*/
    }
    .single-resource__container.publication {
        /*border: 2px solid #131032;*/
    }


    .single-resource__bg {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        min-height: 80px;
        background-image: url(/wp-content/themes/aigi/assets/images/texture-resource.svg);
        background-repeat: no-repeat;
        background-size: cover;
    }
    .single-resource__inner {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: auto;
        position: relative;
    }
    .single-resource__header {
        width: 100%;
        /*min-height: 80px;*/
        padding: 10px 0 0;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        /*color: #fff;*/
        /*font-family: Proxima Nova;*/
        /*font-style: normal;*/
        /*font-weight: bold;*/
        /*font-size: 22.44px;*/
        /*line-height: 25px;*/
        /*letter-spacing: 0.02em;*/
        text-decoration: none;


        font-style: normal;
        font-weight: bold;
        font-size: 22.44px;
        line-height: 25px;
        letter-spacing: 0.02em;
        color: #231F20;
    }
    .resource__text {
        font-size: 14.4px;
        line-height: 24px;
        letter-spacing: 0.05em;
        color: #4d4d4d;
        /*padding: 20px 0;*/
    }
    .resource__text p {
        margin-top: 0;
    }
    .sub-heading {
        font-style: normal;
        font-weight: 600;
        font-size: 22.78px;
        line-height: 36px;
        letter-spacing: 0.06em;
        color: #a74f39;
    }
    .content-item.text-block {
        color:#4d4d4d;
        font-size:16px;
    }
    .content-item.text-block.text_item.heading {
        font-weight: bold;font-size: 30.35px;line-height: 36px;letter-spacing: 0.02em;color:#131032
    }
    .content-item.text-block.text_item.subheading {
        font-weight: bold;font-size: 19.98px;line-height: 22px;letter-spacing: 0.02em;color:#131032
    }
    .content-item.text-block.text_item.small-text {
        font-size: 14px;line-height: 24px;letter-spacing: 0.03em;color:#4d4d4d"
    }
    .content-item {
        margin: 16px 0
    }
    .content-item.buttons-block {
        margin: 32px 0;
    }
    .single-resource__inner {
        display: flex;flex-direction: column;align-items: center;margin: auto;position: relative;
    }
    .single-resource__title {
        /*margin-left: 20px;*/
    }
    .single-resource__body {
        padding:12px 0;
    }

    .video-link {
        font-family: Proxima Nova;font-size: 14px;line-height: 22px;letter-spacing: 0.7px;text-decoration-line: underline;color:#0762a4;position: relative;word-break: break-all;
    }
    img {
        max-width: 600px;
    }
    .blockquote-body {
        font-weight: bold; color:#c45726
    }
    .blockquote-text {
        font-style: italic;font-weight: bold;font-size:16px; color:#c45726
    }
    .accordion_item {
        border-top: 1px solid #dfdfdf;
        padding-top: 12px;
    }
    .accordion_item .nav_list-title {
        font-style: normal;
        font-weight: bold;
        font-size: 22.44px;
        line-height: 25px;
        letter-spacing: 0.02em;
        color: #231F20;
    }
    .accordion_panel {
        padding-top: 10px;
    }
    .accordion_subtitle {
        font-style: normal;font-weight: bold;font-size: 18px;line-height: 25px;letter-spacing: 0.02em;color:#0762a4; padding-left: 16px;
    }
    .accordion_content {
        font-style: normal;font-weight: normal;font-size: 16px;line-height: 24px; letter-spacing: 0.05em; color:#4d4d4d; padding-left: 16px;
    }
    .btn-group {
        margin: -4px
    }
    .btn-group .coma:last-child {
        display: none;
    }
    .btn-body {
        min-width: 217px;
        font-family: Proxima Nova;
        font-style: normal;
        font-weight: 800;
        font-size: 15px;
        line-height: 14px;
        display: flex;
        align-items: center;
        text-align: center;
        display: inline-block;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        text-decoration: none!important;
        border-radius: 5px;
        padding: 17px 20px;
        transition: all .3s;
        box-sizing: border-box;
        position: relative;
        cursor: pointer;
        white-space: nowrap;
        color: #fff!important;
        background-color: #0762a4;
        margin: 4px;
    }
</style>

<?php


$content_items = $args;

if ($content_items)  {

    foreach ($content_items as $content_item) {
//Subheads-->
        if ($content_item['item_type'] == 'Subheads') { ?>
            <div class="content-item subheads-block">
                <p class="sub-heading"><?php echo $content_item["subheads_block"]["content"]; ?></p></div>
        <?php } ?>
        <?php if ($content_item['item_type'] == 'Text Block') { ?>
            <div class="content-item text-block"> <?php echo $content_item["text_block"]["content"] ; ?></div>
        <?php } ?>
        <!--            Heading-->
        <?php if ($content_item['item_type'] == 'Heading') { ?>
            <div class="content-item text-block text_item heading"> <?php $content_item["heading_block"]["content"] ?></div>
        <?php } ?>
        <!--            Subheading-->
        <?php if ($content_item['item_type'] == 'Subheading') { ?>
            <div class="content-item text-block text_item subheading"><?php echo $content_item["subheading_block"]["content"]; ?></div>
        <?php } ?>
        <!--            Small Text-->
        <?php if ($content_item['item_type'] == 'Small Text') { ?>
            <div class="content-item text-block text_item small-text"><?php echo $content_item["small_text_block"]["content"]?></div>
        <?php } ?>


        <!--            Video-->
        <?php if ($content_item['item_type'] == 'Video') { ?>
            <div class="content-item video">
                <div class="single-resource__container link">
                    <div class="single-resource__bg"></div>
                    <div class="single-resource__inner">
                        <div class="single-resource__header">
                            <div class="single-resource__title">
                                <span> <?php echo $content_item["video_block"]["title"]; ?></span>
                            </div>
                            <span class="single-resource__icon  link"></span>
                        </div>
                        <div class="single-resource__body">

                            <?php if ($content_item['video_block']['video_source_type'] == 'embed') { ?>

                                <?php if($content_item['video_block']['youtube_code']) { ?>

                                    <a target="_blank" href="https://youtu.be/<?php echo $content_item['video_block']['youtube_code']?>"> <?php echo $content_item["video_block"]["title"]?></a>

                                <?php } ?>

                            <?php } else if ($content_item['video_block']['video_source_type'] == 'upload') { ?>
                                <?php if ($content_item['video_block']['add_file']) { ?>
                                    <a  class="video-link" target="_blank" href="<?php echo $content_item['video_block']['add_file']['url']?>"> <?php echo $content_item["video_block"]["title"]?></a>
                                <?php } ?>

                            <?php } else if ($content_item['video_block']['video_source_type'] == 'vimeo-link') { ?>
<!--                                --><?php //echo $content_item['video_block']['vimeo_link']; ?>
                            <?php } ?>
                            <div class="resource__text"><?php echo $content_item['video_block']['add_text'];?></div>
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
                    <img src="<?php echo $content_item["image_block"]["add_image"]["url"] ?>" alt="<?php echo $content_item["image_block"]["add_image"]["title"] ?>"/>
                </div>
            <?php } ?>
            <?php if($content_item['image_block']['add_text']) { ?>
                <div class="resource__text">
                    <p><?php echo   $content_item['image_block']['add_text'] ?></p>
                </div>
            <?php } ?>
        <?php } ?>

        <!--            Blockquote-->
        <?php if ($content_item['item_type'] == 'Blockquote') { ?>
            <div class="content-item text-block">
                <div class="blockquote-body">
                    <blockquote class="blockquote-text"><?php echo $content_item["blockquote"]["text"]; ?></blockquote>
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
                <div class="content-item accordion">
                    <div class="accordion_wrapper">
                        <?php foreach ($content_item['accordion_block'] as $accordion_item) { ?>
                            <div class="accordion_item">
                                <?php if($accordion_item['content']) { ?>
                                    <span class="title-h4 nav_list-title"><?php echo $accordion_item["title"]?></span>
                                <?php } ?>

                                <div  class="accordion_panel">
                                    <?php if($accordion_item['subtitle']) { ?>
                                        <span class="accordion_subtitle"><?php echo $accordion_item["subtitle"]; ?></span>
                                    <?php } ?>

                                    <div class="accordion_content">
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
            <div class="content-item file">
                <div class="single-resource__container file">
                    <div class="single-resource__bg"></div>
                    <div class="single-resource__inner">
                        <div class="single-resource__header">
                            <div class="single-resource__title">
                                <span><?php echo $content_item["file_block"]["file_title"] ; ?></span>
                            </div>
                            <span class="single-resource__icon file"></span>
                        </div>
                        <div class="single-resource__body">

                            <div class="resource__text"><?php echo  $content_item['file_block']['file_text'];?></div>

                            <?php if($content_item['file_block']['files']) { ?>
                                <?php foreach ($content_item['file_block']['files'] as $file) { ?>
                                    <div class="resource-link file">
                                        <a href="<?php echo $file["file"]["url"];?>" download><?php echo $file["file"]["title"] ?></a>;
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
            <div class="content-item link">
                <div class="single-resource__container link">
                    <div class="single-resource__bg"></div>
                    <div class="single-resource__inner">
                        <div class="single-resource__header">
                            <div class="single-resource__title">
                                <span><?php echo $content_item["link_block"]["link_title"]; ?></span>
                            </div>
                            <span class="single-resource__icon  link"></span>
                        </div>
                        <div class="single-resource__body">
                            <div class="resource__text"><?php echo $content_item['link_block']['link_text'];?></div>
                            <?php if($content_item['link_block']['link']) { ?>
                                <div class="resource-link">
                                    <a target="_blank" href="<?php echo $content_item["link_block"]["link"]["url"] ; ?>"> <?php echo $content_item["link_block"]["link"]["title"]; ?></a>
                                </div>
                            <?php } ?>

                        </div>

                        <div class="single-resource__footer"></div>
                    </div>

                </div>
            </div>
        <?php } ?>

        <?php if ($content_item['item_type'] == 'Buttons Group') { ?>
            <div class="content-item buttons-block">

                <?php $button_group = $content_item['button_group']; ?>

                <?php if($button_group['buttons']) { ?>
                    <div class="btn-group">
                        <?php foreach($button_group['buttons'] as $button) { ?>
                            <a href="<?php echo  $button['button']['url'] ?>" target="_blank" class=""><?php echo $button["button"]["title"] ; ?></a><span class="coma">, </span>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

        <?php } ?>

    <?php } ?>

<?php } ?>

