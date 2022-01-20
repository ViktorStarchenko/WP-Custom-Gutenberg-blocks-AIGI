
<?php

// Show the selected front page content.
if( have_rows('after_content_blocks') ): ?>

    <?php while( have_rows('after_content_blocks') ) : the_row(); ?>

        <?php if(get_row_layout() == 'hero_slider'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'hero-slider'); ?>

        <?php endif; // end get_row_layout (hero_slider) if ?>

        <?php if(get_row_layout() == 'text_block'): ?>
        
            <?php get_template_part('template-parts/content-blocks/content', 'text-block'); ?>

        <?php endif; // end get_row_layout (text_block) if ?>


        <?php if(get_row_layout() == 'header_block'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'header-block'); ?>

        <?php endif; // end get_row_layout (header_block) if ?>

        <?php if(get_row_layout() == 'speakers_slider'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'speakers-slider'); ?>

        <?php endif; // end get_row_layout (speakers_slider) if ?>

        <?php if(get_row_layout() == 'resources_slider'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'resources-slider'); ?>

        <?php endif; // end get_row_layout (resources_slider) if ?>


        <?php if(get_row_layout() == 'news_slider'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'news-slider'); ?>

        <?php endif; // end get_row_layout (news_slider) if ?>

        <?php if(get_row_layout() == 'profile_list'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'profile-list'); ?>

        <?php endif; // end get_row_layout (profile_list) if ?>

        <?php if(get_row_layout() == 'highlighted_media'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'highlighted-media'); ?>

        <?php endif; // end get_row_layout (highlighted_slider) if ?>

        <?php if(get_row_layout() == 'text_with_media'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'text-with-media'); ?>

        <?php endif; // end get_row_layout (text_with_media) if ?>

        <?php if(get_row_layout() == 'blockquote_slider'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'blockquote-slider'); ?>

        <?php endif; // end get_row_layout (blockquote_slider) if ?>

        <?php if(get_row_layout() == 'how_to_use'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'how-to-use'); ?>

        <?php endif; // end get_row_layout (how_to_use) if ?>

        <?php if(get_row_layout() == 'got_questions'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'got-questions'); ?>

        <?php endif; // end get_row_layout (got_questions) if ?>

        <?php if(get_row_layout() == 'blockquote_single'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'blockquote-single'); ?>

        <?php endif; // end get_row_layout (blockquote_single) if ?>

        <?php if(get_row_layout() == 'centered_block'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'centered-block'); ?>

        <?php endif; // end get_row_layout (centered_block) if ?>

        <?php if(get_row_layout() == 'form_block'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'form-block'); ?>

        <?php endif; // end get_row_layout (form_block) if ?>

        <?php if(get_row_layout() == 'upcoming_event'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'event-block'); ?>

        <?php endif; // end get_row_layout (event_block) if ?>

    <?php endwhile; // end have_rows while ?>

<?php endif; // end have_rows if ?>