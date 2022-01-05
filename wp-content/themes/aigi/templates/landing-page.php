<?php
/*
* Template Name: Landing page 2
* Template Post Type: page
*/
?>

<?php get_header(); ?>
<main id="content" role="main">
    <!--    <div class="section">-->
    <!--        <div class="wrapper">-->
    <!--            <div class="hero-slider" style="height: 548px; width: 100%; background: var(--color-error)" ></div>-->
    <!--        </div>-->
    <!--    </div>-->
    <?php if (get_field('header_slider')): ?>
        <?php get_template_part('template-parts/content-blocks/content', 'header-slider'); ?>
    <?php endif; ?>
    <div class="main-inner top-of-hero">
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
            <?php get_template_part('template-parts/layout', 'page-after-content-blocks'); ?>
            <div class="wrapper-1245">
                <div class="content-wrapper wrapper-1245">
                    <div class="post-tile__list landing-page">





                        <div class="post-tile__wrap event">
                            <div class="post-tile__mob-header">
                                <div class="post-tile__tags">
                                    <a class="content-tags__item" href="#" data-tem-id="">conference</a>
                                    <a class="content-tags__item" href="#" data-tem-id="">event</a>
                                    <a class="content-tags__item" href="#" data-tem-id="">conference</a>
                                    <a class="content-tags__item" href="#" data-tem-id="">conference</a>
                                    <a class="content-tags__item" href="#" data-tem-id="">conference</a>
                                    <a class="content-tags__item" href="#" data-tem-id="">event</a>
                                    <!--                                        --><?php //$term_list = wp_get_post_terms( get_the_ID(), 'content_tags', array('fields' => 'all') );
                                    //
                                    //                                        foreach ($term_list as $term) :
                                    //
                                    //                                            ?>
                                    <!--                                            <a class="content-tags__item" href="/search-facewp/?_news_categories=--><?php //echo $term->slug ?><!--" data-tem-id="--><?php //echo  $term->term_id ?><!--">--><?php //echo $term->name ?><!--</a>-->
                                    <!--                                        --><?php //endforeach ?>
                                </div>
                                <a href="#" class="add-to-calendar"></a>
                            </div>
                            <div class="post-tile__img-box">
                                <div class="post-tile__img">
                                    <!--                                --><?php //if (get_the_post_thumbnail_url( get_the_ID(), 'full' )) { ?>

                                    <img class="post-tile__thumb" src="http://aigi-build/wp-content/uploads/2021/12/66638c04-34a8-39e9-9b87-f7e65fa5f0ac.jpg" alt="<?php the_title(); ?>">

                                    <!--                                --><?php //} else { ?>
                                    <!--                                    <picture>-->
                                    <!--                                        <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/news.svg" alt="--><?php //the_title(); ?><!--">-->
                                    <!--                                    </picture>-->
                                    <!--                                --><?php //} ?>
                                </div>
                                <div class="btn-group f-start m-center">
                                    <a href="#" target="" class="btn-61b2477e729e7  btn-body  btn-transparent  calendar  after  Between " tabindex="0">
                                        <span class="btn-inner">Link 2</span>
                                    </a>
                                    <a href="#" target="" class="btn-61aa84409fd20  btn-body  btn-h-secondary-blue  triangle  after  Between " tabindex="0">
                                        <span class="btn-inner">FIND A STORE</span>
                                    </a>
                                </div>

                            </div>


                            <div class="post-tile__content">
                                <div class="post-tile__content-header">
                                    <div class="post-tile__left">
                                        <span class="post-tile__pub-date">Apr 20, 2021</span>
                                        <span class="post-tile__location">Brisbane Convention Centre</span>
                                    </div>

                                    <div class="post-tile__right">

                                    </div>
                                </div>
                                <div class="post-tile__content-body">
                                    <div class="post-tile__tags">
                                        <a class="content-tags__item" href="#" data-tem-id="">conference</a>
                                        <a class="content-tags__item" href="#" data-tem-id="">event</a>
<!--                                        --><?php //$term_list = wp_get_post_terms( get_the_ID(), 'content_tags', array('fields' => 'all') );
//
//                                        foreach ($term_list as $term) :
//
//                                            ?>
<!--                                            <a class="content-tags__item" href="/search-facewp/?_news_categories=--><?php //echo $term->slug ?><!--" data-tem-id="--><?php //echo  $term->term_id ?><!--">--><?php //echo $term->name ?><!--</a>-->
<!--                                        --><?php //endforeach ?>
                                    </div>

                                    <div class="post-tile__title">
                                        <span>CATSI act review final report Highlights AIGI Recommendations</span>
                                    </div>
                                    <div class="post-tile__excerpt"><p>AIGI's Advocacy team was chuffed to note their CATSI Act Review submission will form the basis of further training recommendations to ORIC, as outlined in the CATSI Act Review Final Report handed down this month.…</p></div>
                                </div>
                                <div class="post-tile__content-footer">
                                    <div class="post-tile__pricing-block">
                                        <div class="post-tile__pricing-title">
                                            Event Pricing
                                        </div>
                                        <div class="post-tile__pricing-list">
                                            <div class="post-tile__pricing-item">
                                                <span class="post-tile__pricing-type">Early Bird</span>
                                                <span class="post-tile__pricing-price">$300.00</span>
                                            </div>
                                            <div class="post-tile__pricing-item">
                                                <span class="post-tile__pricing-type">Full Price</span>
                                                <span class="post-tile__pricing-price">$300.00</span>
                                            </div>
                                            <div class="post-tile__pricing-item">
                                                <span class="post-tile__pricing-type">Partner Price</span>
                                                <span class="post-tile__pricing-price">$300.00</span>
                                            </div>
                                            <div class="post-tile__pricing-item">
                                                <span class="post-tile__pricing-type">Date Rate</span>
                                                <span class="post-tile__pricing-price">$300.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="post-tile__slider">
                                <div class="speakers-slider__heading">
                                    Speakers
                                </div>
                                <?php
                                $speakers = get_field('speakers', 3157);
                                ?>
                                <?php if ($speakers) : ?>

                                <div class="speakers-slider">
                                    <?php foreach ($speakers as $speaker) : ?>
                                    <div>
                                        <div class="speakers-slider__item">
                                            <div class="speakers-slider__img">
                                            <?php if (get_the_post_thumbnail_url( $speaker->ID, 'full' )) : ?>
                                                <img src="<?php echo get_the_post_thumbnail_url( $speaker->ID, 'full' ) ?> " alt="<?= $speaker->post_title ?>">
                                            <?php endif ?>
                                            </div>
                                            <div class="speakers-slider__content">
                                                <div class="speakers-slider__name">
                                                    <?= $speaker->post_title ?>
                                                </div>
                                                <div class="speakers-slider__position">
                                                    <?php echo substr(get_the_excerpt( $speaker->ID), 0,25) ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php endforeach ?>

                                </div>
                                    <div class="speakers-slider__nav"></div>
                                <?php endif?>
                            </div>

                            <div class="post-tile__mob-footer">
                                <a href="#" target="" class="  btn-body  btn-h-secondary-blue  triangle  after  Between " tabindex="0">
                                    <span class="btn-inner">FIND A STORE</span>
                                </a>
                            </div>
                        </div>

                        <div class="post-tile__wrap event">
                            <div class="post-tile__mob-header">
                                <div class="post-tile__tags">
                                    <a class="content-tags__item" href="#" data-tem-id="">conference</a>
                                    <a class="content-tags__item" href="#" data-tem-id="">event</a>
                                    <a class="content-tags__item" href="#" data-tem-id="">conference</a>
                                    <a class="content-tags__item" href="#" data-tem-id="">conference</a>
                                    <a class="content-tags__item" href="#" data-tem-id="">conference</a>
                                    <a class="content-tags__item" href="#" data-tem-id="">event</a>
                                    <!--                                        --><?php //$term_list = wp_get_post_terms( get_the_ID(), 'content_tags', array('fields' => 'all') );
                                    //
                                    //                                        foreach ($term_list as $term) :
                                    //
                                    //                                            ?>
                                    <!--                                            <a class="content-tags__item" href="/search-facewp/?_news_categories=--><?php //echo $term->slug ?><!--" data-tem-id="--><?php //echo  $term->term_id ?><!--">--><?php //echo $term->name ?><!--</a>-->
                                    <!--                                        --><?php //endforeach ?>
                                </div>
                                <a href="#" class="add-to-calendar"></a>
                            </div>
                            <div class="post-tile__img-box">
                                <div class="post-tile__img">
                                    <!--                                --><?php //if (get_the_post_thumbnail_url( get_the_ID(), 'full' )) { ?>

                                    <img class="post-tile__thumb" src="http://aigi-build/wp-content/uploads/2021/12/66638c04-34a8-39e9-9b87-f7e65fa5f0ac.jpg" alt="<?php the_title(); ?>">

                                    <!--                                --><?php //} else { ?>
                                    <!--                                    <picture>-->
                                    <!--                                        <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/news.svg" alt="--><?php //the_title(); ?><!--">-->
                                    <!--                                    </picture>-->
                                    <!--                                --><?php //} ?>
                                </div>
                                <div class="btn-group f-start m-center">
                                    <a href="#" target="" class="btn-61b2477e729e7  btn-body  btn-transparent  calendar  after  Between " tabindex="0">
                                        <span class="btn-inner">Link 2</span>
                                    </a>
                                    <a href="#" target="" class="btn-61aa84409fd20  btn-body  btn-h-secondary-blue  triangle  after  Between " tabindex="0">
                                        <span class="btn-inner">FIND A STORE</span>
                                    </a>
                                </div>

                            </div>


                            <div class="post-tile__content">
                                <div class="post-tile__content-header">
                                    <div class="post-tile__left">
                                        <span class="post-tile__pub-date">Apr 20, 2021</span>
                                        <span class="post-tile__location">Brisbane Convention Centre</span>
                                    </div>

                                    <div class="post-tile__right">

                                    </div>
                                </div>
                                <div class="post-tile__content-body">
                                    <div class="post-tile__tags">
                                        <a class="content-tags__item" href="#" data-tem-id="">conference</a>
                                        <a class="content-tags__item" href="#" data-tem-id="">event</a>
                                        <!--                                        --><?php //$term_list = wp_get_post_terms( get_the_ID(), 'content_tags', array('fields' => 'all') );
                                        //
                                        //                                        foreach ($term_list as $term) :
                                        //
                                        //                                            ?>
                                        <!--                                            <a class="content-tags__item" href="/search-facewp/?_news_categories=--><?php //echo $term->slug ?><!--" data-tem-id="--><?php //echo  $term->term_id ?><!--">--><?php //echo $term->name ?><!--</a>-->
                                        <!--                                        --><?php //endforeach ?>
                                    </div>

                                    <div class="post-tile__title">
                                        <span>CATSI act review final report Highlights AIGI Recommendations</span>
                                    </div>
                                    <div class="post-tile__excerpt"><p>AIGI's Advocacy team was chuffed to note their CATSI Act Review submission will form the basis of further training recommendations to ORIC, as outlined in the CATSI Act Review Final Report handed down this month.…</p></div>
                                </div>
                                <div class="post-tile__content-footer">
                                    <div class="post-tile__pricing-block">
                                        <div class="post-tile__pricing-title">
                                            Event Pricing
                                        </div>
                                        <div class="post-tile__pricing-list">
                                            <div class="post-tile__pricing-item">
                                                <span class="post-tile__pricing-type">Early Bird</span>
                                                <span class="post-tile__pricing-price">$300.00</span>
                                            </div>
                                            <div class="post-tile__pricing-item">
                                                <span class="post-tile__pricing-type">Full Price</span>
                                                <span class="post-tile__pricing-price">$300.00</span>
                                            </div>
                                            <div class="post-tile__pricing-item">
                                                <span class="post-tile__pricing-type">Partner Price</span>
                                                <span class="post-tile__pricing-price">$300.00</span>
                                            </div>
                                            <div class="post-tile__pricing-item">
                                                <span class="post-tile__pricing-type">Date Rate</span>
                                                <span class="post-tile__pricing-price">$300.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="post-tile__slider">
                                <div class="speakers-slider__heading">
                                    Speakers
                                </div>
                                <?php
                                $speakers = get_field('speakers', 3157);
                                ?>
                                <?php if ($speakers) : ?>

                                    <div class="speakers-slider">
                                        <?php foreach ($speakers as $speaker) : ?>
                                            <div>
                                                <div class="speakers-slider__item">
                                                    <div class="speakers-slider__img">
                                                        <?php if (get_the_post_thumbnail_url( $speaker->ID, 'full' )) : ?>
                                                            <img src="<?php echo get_the_post_thumbnail_url( $speaker->ID, 'full' ) ?> " alt="<?= $speaker->post_title ?>">
                                                        <?php endif ?>
                                                    </div>
                                                    <div class="speakers-slider__content">
                                                        <div class="speakers-slider__name">
                                                            <?= $speaker->post_title ?>
                                                        </div>
                                                        <div class="speakers-slider__position">
                                                            <?php echo substr(get_the_excerpt( $speaker->ID), 0,25) ?>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        <?php endforeach ?>

                                    </div>
                                    <div class="speakers-slider__nav"></div>
                                <?php endif?>
                            </div>

                            <div class="post-tile__mob-footer">
                                <a href="#" target="" class="  btn-body  btn-h-secondary-blue  triangle  after  Between " tabindex="0">
                                    <span class="btn-inner">FIND A STORE</span>
                                </a>
                            </div>
                        </div>




                        <div class="post-tile__wrap news">
                            <div class="post-tile__img">
                                <?php if (get_the_post_thumbnail_url( get_the_ID(), 'full' )) { ?>

                                    <img class="post-tile__thumb" src="http://aigi-build/wp-content/uploads/2021/12/66638c04-34a8-39e9-9b87-f7e65fa5f0ac.jpg" alt="<?php the_title(); ?>">

                                <?php } else { ?>
                                    <picture>
                                        <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/news.svg" alt="<?php the_title(); ?>">
                                    </picture>
                                <?php } ?>
                            </div>

                            <div class="post-tile__content">
                                <div class="post-tile__content-header">
                                    <div class="post-tile__left">
                                        <div class="post-tile__pub-date"><?php echo get_the_date(); ?></div>
                                    </div>

                                    <div class="post-tile__right">
                                        <div class="post-tile__time">
                                            <span>10 min read</span>
                                        </div>
                                        <?php echo do_shortcode('[favorite_button]') ?>
                                    </div>
                                </div>
                                <div class="post-tile__content-body">
                                    <div class="post-tile__tags">
                                        <?php $term_list = wp_get_post_terms( get_the_ID(), 'content_tags', array('fields' => 'all') );

                                        foreach ($term_list as $term) :

                                            ?>
                                            <a class="content-tags__item" href="/search-facewp/?_news_categories=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></a>
                                        <?php endforeach ?>
                                    </div>

                                    <div class="post-tile__title">
                                        <span><?php the_title(); ?></span>
                                    </div>
                                    <div class="post-tile__excerpt"><p><?php echo substr(get_the_excerpt(), 0,185) ?></p></div>
                                </div>
                                <div class="post-tile__content-footer">
                                    <a href="<?=  get_the_permalink(get_the_ID()) ?>" target="" class="btn-body btn-transparent triangle after Between">
                                        <span class="btn-inner">READ MORE</span>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>


        <?php endwhile; endif; ?>
    </div>

</main>
<?php get_footer(); ?>