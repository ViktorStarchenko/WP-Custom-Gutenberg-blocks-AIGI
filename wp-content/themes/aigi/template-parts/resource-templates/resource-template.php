<?php $terms =  wp_get_post_terms( get_the_id(), 'resource_type', array('fields' => 'names') );?>
<?php
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
                <div class="resource-video__wrap">
<!--                    <object width="100%" height="100%"><param name="movie" value="https://www.youtube.com/v/--><?php //the_field('youtube_code'); ?><!--?wmode=transparent&version=3&amp;hl=en_US&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="https://www.youtube.com/v/--><?php //the_field('youtube_code'); ?><!--?version=1&amp;hl=en_US&amp;rel=0" type="application/x-shockwave-flash" width="460" height="264" allowscriptaccess="always" allowfullscreen="true"></embed></object>-->
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php the_field('youtube_code'); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php endif; ?>

            <?php if(get_field('add_file')  && $terms[0] == 'Video'): ?> <!-- Video -->
                <div class="resource-video__wrap">
                    <div class="online__video-wrap">
                        <video  preload="metadata" class="paused online-video" data-watched="false" data-issetsrc="false" data-video="<?php echo get_the_ID()?>-<?php echo $data_video_suf ?>" playsinline="" webkit-playinginline="" heght="auto" width="100%" src="<?php echo get_field('add_file')['url']?>">
                        </video>
                        <div class="video-button-wrap">
                            <button id="online__video-button" class="play online__video-button fist-lesson-button" data-video="<?php echo get_the_ID()?>-<?php echo $data_video_suf ?>">
                                <span class="play-button-body"></span>
                            </button>
                        </div>
                        <div class="video-pause-wrap" data-video="<?php echo get_the_ID()?>-<?php echo $data_video_suf ?>">
                            <button id="online__video-pause-button" class="pause"></button></div>
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
                <div class="resource-link">
                    <a target="_blank" href="<?php echo get_field('td_resource_download')['file']['url']; ?>"><?php echo get_field('td_resource_download')['link_text']; ?></a>
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



