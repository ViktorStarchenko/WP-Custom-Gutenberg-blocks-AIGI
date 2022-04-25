<?php

$terms =  wp_get_post_terms( $post->ID, 'resource_type', array('fields' => 'names') );

$type = '';
$resource_bg_extended = '';
$tag_title = '';
$data_video_suf = '';
 if($terms[0] == 'Video') {
     $type = 'video';
     $resource_bg_extended = 'extended';
     $data_video_suf = random_int(0, 999);
 } else if ($terms[0] == 'Link') {
     $type = 'link';
 } else if ($terms[0] == 'Diagram') {
    if (get_field('diagram_type') == 'Table') {
        $type = 'table';
    } else if (get_field('diagram_type') == 'Rightaligned' || get_field('add_diagram')) {
        $type = 'image';
        $resource_bg_extended = 'extended';
    }
 } else if ($terms[0] == 'File') {
     $type = 'file';
 } else if ($terms[0] == 'Example') {
     $term_list = wp_get_post_terms(get_the_ID(), 'resource_tag', array("fields" => "names"));
     $the_tags = implode(", ", $term_list);
     if($the_tags == 'Tips'):

         $tag_title = 'Tips: ';
     else:
         $tag_title = 'Example: ';
     endif;
     $type = 'tips';
 } else if ($terms[0] == 'Publication') {
     $type = 'publication';
     if (get_field('td_resource_image')) {
         $resource_bg_extended = 'extended';
     }
 }
 ?>

<style>
    .single-resource__container {
        margin: 32px 0;
    }
    .single-resource__container a {
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
    .resource__text {
        font-size: 14.4px;
        line-height: 24px;
        letter-spacing: 0.05em;
        color: #4d4d4d;
        padding: 20px 0;
    }
    .resource-image__wrap {
        margin:16px 0;
        max-width: 500px;
    }
    .resource-image__wrap img {
        width:100%;
        max-width:500px;
        height:auto;
        max-height: 80vh;
        object-fit:contain;
    }

    th,
    td {
        font-size: 15px;
        line-height: 24px;
        letter-spacing: 0.03em;
        padding: 16px;
        box-shadow: 0px 0px 0px #e0e0e0, 0px -1px 0px #e0e0e0;
    }
    th p,
    td p {
        text-align: left;
    }
    th:nth-child(even),
    td:nth-child(even) {
        box-shadow: 0px 0px 0px #e0e0e0, -1px -1px 0px #e0e0e0;
    }
</style>
<div class="single-resource__container <?php echo $type;?> <?php echo $resource_bg_extended;?>">
    <div class="single-resource__bg <?php echo $resource_bg_extended;?>"></div>
    <div class="single-resource__inner">
        <div class="single-resource__header">
            <div class="single-resource__title">
                <a href="<?php echo  get_the_permalink(get_the_ID()) ?>"><?=$tag_title?><?php the_title();?></a>
            </div>
            <span class="single-resource__icon  <?php echo $type;?>"></span>
        </div>
        <div class="single-resource__body">

            <?php if(get_field('youtube_code')): ?>
                <div class="resource-video__wrap" style="margin: 16px 0;">
                    <a href="https://www.youtube.com/watch?v=<?php echo get_field("youtube_code"); ?>" style="font-style: normal;font-weight: 700;font-size: 10px;line-height: 16px;letter-spacing: 2px;text-transform: uppercase;color: #0762A4;text-decoration: none;">https://www.youtube.com/watch?v=<?php echo get_field("youtube_code"); ?></a>
                </div>
            <?php endif; ?>

            <?php if(get_field('add_file')  && $terms[0] == 'Video'): ?> <!-- Video -->
                <div class="resource-video__wrap" style="margin: 16px 0;">
                    <div class="online__video-wrap">
                        <a href="<?php echo get_field('add_file')['url']?>"><?php echo get_field('add_file')['title']?></a>
                    </div>
                </div>
            <?php endif ?>

            <?php if (get_field('add_diagram')) : ?> <!-- Diagram -->
                <div class="resource-image__wrap">
                    <picture>
                        <img src="<?php echo get_field('add_diagram');?>" alt="<?php the_title();?>">
                    </picture>
                </div>
            <?php endif ?>

            <?php if (get_field('td_resource_image')) : ?> <!-- Publication -->
                <div class="resource-image__wrap">
                    <picture>
                        <img src="<?php echo get_field('td_resource_image')['url'];?>" alt="<?php echo get_field('td_resource_image')['title'];?>">
                    </picture>
                </div>
            <?php endif ?>

<!--            --><?php //if (get_field('preview_thumbnail')) : ?>
<!--                <div class="resource-image__wrap">-->
<!--                    <picture>-->
<!--                        <img src="--><?php //echo get_field('preview_thumbnail');?><!--" alt="--><?php //the_title();?><!--">-->
<!--                    </picture>-->
<!--                </div>-->
<!--            --><?php //endif ?>

<!--            --><?php //if (get_field('add_image')) : ?>
<!--                <div class="resource-image__wrap">-->
<!--                    <picture>-->
<!--                        <img src="--><?php //echo get_field('add_image');?><!--" alt="--><?php //the_title();?><!--">-->
<!--                    </picture>-->
<!--                </div>-->
<!--            --><?php //endif ?>

            <?php if(get_field('add_text') && $terms[0] == 'Example'): ?> <!-- Example -->
                <div class="resource__text">
                    <?php the_field('add_text'); ?>
                </div>
            <?php elseif(get_field('add_text') && !($terms[0] == 'Example')) : ?>
                <div class="resource__text">
                    <p><?php the_field('add_text'); ?></p>
                </div>
            <?php endif; ?>

            <?php if(get_field('td_resource_content')): ?> <!--publication -->
            <div class="resource__text">
                <?php the_field('td_resource_content'); ?>
            </div>
            <?php endif ?>

            <?php if(get_field('add_link')): ?> <!-- Link -->
                <div class="resource-link">
                    <a target="_blank" href="<?php echo get_field('add_link'); ?>"><?php echo parse_url(get_field('add_link'), PHP_URL_HOST); ?></a>
                </div>
            <?php endif; ?>


            <?php if(get_field('td_resource_download')['file']): ?> <!--publication -->
                <div class="resource-link file">
                    <a target="_blank" href="<?php echo get_field('td_resource_download')['file']; ?>"><?php echo get_field('td_resource_download')['link_text']; ?></a>
                </div>
            <?php endif; ?>

            <?php if(get_field('add_file') && !($terms[0] == 'Video')): ?> <!-- Video -->
                <div class="resource-link file">
                    <a href="<?php echo get_field('add_file'); ?>" download><?php echo aigi_get_filename_from_url( get_field('add_file') ); ?></a>
                </div>
            <?php endif; ?>

            <?php if(get_field('how_to_use')): ?>
            <div class="resource__text">
                <p><strong>How To Use:</strong><br/><?php echo get_field('how_to_use'); ?><p>
            </div>

                <?php endif; ?>

        </div>

        <div class="single-resource__footer"></div>
    </div>

</div>


