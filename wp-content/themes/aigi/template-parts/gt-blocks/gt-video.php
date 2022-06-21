<?php
$classname = 'custom_video';
if (!empty($block['clasName'])) {
    $classname .= ' ' . $block['clasName'];
}
if (!empty($block['align'])) {
    $classname .= ' align' . $block['align'];
}
?>


<?php if (get_field('video_block')) : ?>
<?php $data = get_field('video_block'); ?>
    <?php $data_video_suf = $data['block_id']; ?>
    <div class="content-item video-block <?php echo ($data['disable_styling'] == true) ? 'disable_styling' : '' ?>  <?php echo esc_attr($classname)  ?>">
        <div class="single-resource__container video extended">
            <div class="single-resource__bg extended"></div>
            <div class="single-resource__inner">
                <div class="single-resource__header">
                    <div class="single-resource__title">
                        <span><?php echo $data['title'];?></span>
                    </div>
                    <span class="single-resource__icon video"></span>
                </div>
                <div class="single-resource__body">

                    <?php if ($data['video_source_type'] == 'embed') : ?>

                        <?php if($data['youtube_code']): ?>
                            <div class="resource-video__wrap">
                                <!--                                        <object width="100%" height="100%"><param name="movie" value="https://www.youtube.com/v/--><?php //echo  $content_item['video_block']['youtube_code']; ?><!--?wmode=transparent&version=3&amp;hl=en_US&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="https://www.youtube.com/v/--><?php //echo $content_item['video_block']['youtube_code']; ?><!--?version=1&amp;hl=en_US&amp;rel=0" type="application/x-shockwave-flash" width="460" height="264" allowscriptaccess="always" allowfullscreen="true"></embed></object>-->
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $data['youtube_code']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        <?php endif; ?>

                    <?php elseif ($data['video_source_type'] == 'upload') :  ?>

                        <?php if($data['add_file']): ?>
                            <div class="resource-video__wrap">
                                <div class="online__video-wrap">
                                    <video  preload="metadata" class="paused online-video" data-watched="false" data-issetsrc="false" data-video="<?php echo $data_video_suf ?>" playsinline="" webkit-playinginline="" heght="auto" width="100%" src="<?php echo $data['add_file']['url']?>">
                                    </video>
                                    <div class="video-button-wrap">
                                        <button id="online__video-button" class="play online__video-button fist-lesson-button" data-video="<?php echo $data_video_suf ?>">
                                            <span class="play-button-body"></span>
                                        </button>
                                    </div>
                                    <div class="video-pause-wrap" data-video="<?php echo $data_video_suf ?>">
                                        <button id="online__video-pause-button" class="pause"></button></div>
                                </div>
                            </div>
                        <?php endif ?>

                    <?php elseif ($data['video_source_type'] == 'vimeo-link') :  ?>

                        <div class="resource-video__wrap vimeo">
                            <?php echo $data['vimeo_link']; ?>
                        </div>

                    <?php endif ?>

                    <?php if($data['add_text']) : ?>
                        <div class="resource__text">
                            <p><?php echo $data['add_text']; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="single-resource__footer"></div>
            </div>

        </div>
    </div>

<?php endif ?>