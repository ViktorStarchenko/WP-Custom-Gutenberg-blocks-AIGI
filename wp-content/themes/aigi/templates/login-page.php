<?php
/*
* Template Name: Login page
* Template Post Type: page
*/

?>

<?php get_header(); ?>

<?php
$post_type = get_field('landing_page')['post_type'];
if ($post_type == 'event') {
    $event_group = get_field('landing_page')['event_term'];
    $event_group = $event_group->slug;
}
?>

<?php

$content = get_field('content');
$attributes = get_field('attributes');

$classes = '';
if ($attributes['background']['background_image']) {
    $classes.= '  bg-image ';
}

$bg_color_preset = '';
if ($attributes['background']['bg_color_preset']) {
    $bg_color_preset =  $attributes['background']['bg_color_preset'];
}
$background_texture = '';
if ($attributes['background']['background_texture']) :
    $background_texture_classes = $attributes['background']['background_texture'];
    $background_texture = implode(" ", $background_texture_classes);
endif;

$form_type = '';
if ($content['form_type']) {
    $form_type = $content['form_type'];
}
?>
    <main id="content" role="main">
        <!--    <div class="section">-->
        <!--        <div class="wrapper">-->
        <!--            <div class="hero-slider" style="height: 548px; width: 100%; background: var(--color-error)" ></div>-->
        <!--        </div>-->
        <!--    </div>-->
        <div class="main-inner <?php  echo ((get_field('header_slider')['enable'] == true) ? ' top-of-hero ' :''); ?> <?php echo ($post_type == 'case_studies') ? 'map-enable' : ''; ?>">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part('template-parts/layout', 'page-before-content-blocks'); ?>

            <div class="wrapper-1245">
                <div class="content-wrapper wrapper-1245">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content" itemprop="mainContentOfPage">
                            <?php the_content(); ?>
                        </div>
                    </article>
                </div>
            </div>
<!--            [custom-login-form]-->
<!--            [custom-register-form]-->
<!--            [custom-password-lost-form]-->
<!--            [custom-password-reset-form]-->
<!--            [account-info]-->

            <div class="content-wrapper wrapper-fullwidth">
                <div class="login-page__wrapper <?php echo $form_type; ?>">
                    <div class="login-page__bg-block <?php echo $bg_color_preset; ?> <?php echo $background_texture ?> <?php echo $classes; ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); ">
                    <div class="bg-overlay <?php  echo ($attributes['background']['enable_overlay'] == true ?  ' active ' : ''); ?>"></div>
                        <?php if ($attributes['images']['image_1']) : ?>
                        <div class="login-page__image image1" style="background-image: url('<?php echo $attributes['images']['image_1']['url']; ?>');">
                        </div>
                        <?php endif ?>
                        <?php if ($attributes['images']['image_2']) : ?>
                            <div class="login-page__image image2" style="background-image: url('<?php echo $attributes['images']['image_2']['url']; ?>');">
                            </div>
                        <?php endif ?>
                        <?php if ($attributes['images']['image_3']) : ?>
                            <div class="login-page__image image3" style="background-image: url('<?php echo $attributes['images']['image_3']['url']; ?>');">
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="login-page__form-block">
                        <div class="login-page__form-header">
                            <?php if ($content['heading']) : ?>
                            <div class="login-page__form-heading"><?php echo $content['heading']; ?></div>
                            <?php endif ?>
                            <?php if ($content['description']) : ?>
                            <div class="login-page__form-description"><?php echo $content['description']; ?></div>
                            <?php endif ?>
                        </div>
                        <?php if ($content['shortcode']) : ?>
                            <div class="login-page__form">
                                <?php $form_shortcode = $content['shortcode']; ?>
                                <?php echo do_shortcode(' '. $form_shortcode .' '); ?>
                                <a class="return-to-login" href="">Return back to login</a>
                            </div>

                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <?php get_template_part('template-parts/layout', 'page-after-content-blocks'); ?>

        <?php endwhile; endif; ?>
        </div>

    </main>
    <script>
        jQuery(document).ready(function(){
            // login
            jQuery('.login-page__wrapper.login input[type="text"]').attr('placeholder', 'Email Address');
            jQuery('.login-page__wrapper.login input[type="password"]').attr('placeholder', 'Password');

            jQuery(jQuery(".login-page__wrapper.login .um-link-alt").detach()).appendTo(".login-page__wrapper.login .um-field-password");
            jQuery(".login-page__wrapper.login .um-link-alt").html('I Forgot');
            jQuery(".login-page__wrapper.login .um-right.um-half .um-button").html('Request an Account');

            // Registration
            jQuery(".login-page__wrapper.registration input[type=submit]").attr('value', 'Submit');

            // Password
            jQuery(".login-page__wrapper.reset-password input[type=submit]").attr('value', 'Reset Password');
        })
    </script>

<?php get_footer('login-page'); ?>