<?php
/*
 * Template Name: Team Page
 * Template Post Type: page
 */
?>

<?php get_header(); ?>
<main id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="main-inner main-inner__contact-us <?php  echo ((get_field('header_slider')['enable'] == true) ? ' top-of-hero ' :''); ?>">
            <div class="wrapper-1245">

                <div class="no-sidebar">
                    <div class="col-content"  data-height="">
                        <div class="single-column__inner">
                            <?php the_content() ?>
                            <?php $content_items = get_field('content_items'); ?>
                            <?php get_template_part('template-parts/content-blocks/content', 'custom-content', $content_items); ?>

                        </div>



                        <div class="single-column__inner wrapper-1125 ">

                            <?php if (get_field('team_block')) :
                                $team_block = get_field('team_block');

                                if ($team_block['board_members']['source'] == 'Auto') {

//                                    $board_members_posts = get_posts( array(
//                                        'numberposts' => -1,
//                                        'orderby'     => 'date',
//                                        'order'       => 'DESC',
//                                        'post_type'   => 'aigi_staff',
//                                        'tax_query' => array(
//                                            array(
//                                                'taxonomy' => 'aigi_staff_group',
//                                                'field' => 'slug',
//                                                'terms' => 'board-members',
//                                                'operator' => 'IN',
//                                            )
//                                        )
//                                    ) );

                                    $board_members_args = array(
                                        'numberposts' => -1,
                                        'orderby'     => 'date',
                                        'order'       => 'DESC',
                                        'post_type'   => 'aigi_staff',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'aigi_staff_group',
                                                'field' => 'slug',
                                                'terms' => 'board-members',
                                                'operator' => 'IN',
                                            )
                                        )
                                    );

                                    $board_members_posts = new WP_Query( $board_members_args);
                                    $board_members_posts_count = $board_members_posts->post_count;
                                    $board_members_posts = $board_members_posts->get_posts();
                                } else if ($team_block['board_members']['source'] == 'Manually') {
                                    if ($team_block['board_members']['board_members_posts']) {
                                        $board_members_posts = $team_block['board_members']['board_members_posts'];
                                    }
                                }

//                                var_dump($query->post_count);
//                                var_dump($board_members_posts->get_posts());
                                if ($team_block['our_staff']['source'] == 'Auto') {

//                                    $our_staff_posts = get_posts( array(
//                                        'numberposts' => -1,
//                                        'orderby'     => 'date',
//                                        'order'       => 'DESC',
//                                        'post_type'   => 'aigi_staff',
//                                        'tax_query' => array(
//                                            array(
//                                                'taxonomy' => 'aigi_staff_group',
//                                                'field' => 'slug',
//                                                'terms' => 'our-staff',
//                                                'operator' => 'IN',
//                                            )
//                                        )
//                                    ) );

                                    $our_staff_arg = array(
                                        'numberposts' => -1,
                                        'orderby'     => 'date',
                                        'order'       => 'DESC',
                                        'post_type'   => 'aigi_staff',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'aigi_staff_group',
                                                'field' => 'slug',
                                                'terms' => 'our-staff',
                                                'operator' => 'IN',
                                            )
                                        )
                                    );

                                    $our_staff_posts = new WP_Query( $our_staff_arg);
                                    $our_staff_posts_count = $our_staff_posts->post_count;
                                    $our_staff_posts = $our_staff_posts->get_posts();

                                } else if ($team_block['our_staff']['source'] == 'Manually') {
                                    if ($team_block['our_staff']['our_staff_posts']) {
                                        $our_staff_posts = $team_block['our_staff']['our_staff_posts'];
                                    }
                                }

                            endif ?>

                                <div class="content-item team-block">
                                    <div class="team-block__wrapper">
                                        <div class="team-block__tabs">

                                            <div class="nav">
                                                <div class="tabs__nav tabs-nav">

                                                    <div class="tabs-nav__item global-search-tab-nav text-left is-active" data-tab-name="tab-all"  data-post-type="all">All Staff ( <?php echo wp_count_posts('aigi_staff')->publish; ?> )</div>


                                                    <div class="tabs-nav__item global-search-tab-nav text-left " data-tab-name="tab-board-members" data-post-type="board-members">Board of Directors ( <?= $board_members_posts_count; ?> )</div>

                                                    <div class="tabs-nav__item global-search-tab-nav text-left " data-tab-name="tab-our-team" data-post-type="our-team">Team ( <?= $our_staff_posts_count; ?> )</div>


                                                </div>
                                            </div>


                                            <div class="search__nav-mobile">
                                                <div class="dropdown-body">
                                                    <span onclick="" class="dropbtn btn-body btn-transparent triangle after Between" data-dropdown="search-nav">All Staff</span>
                                                    <div id="myDropdown" class="dropdown-content" data-dropdown="search-nav">
                                                        <div class="tabs-nav__item global-search-tab-nav dropdown-item" data-tab-name="tab-all" data-post-type="all">All Staff (<span class="posts-count"><?php echo wp_count_posts('aigi_staff')->publish ;?>)</div>
                                                        <div class="tabs-nav__item global-search-tab-nav dropdown-item" data-tab-name="tab-board-members" data-post-type="board-members">Board of Directors (<span class="posts-count"><?= $board_members_posts_count; ?>)</span></div>
                                                        <div class="tabs-nav__item global-search-tab-nav dropdown-item" data-tab-name="tab-our-team" data-post-type="our-team">Team (<span class="posts-count"><?= $our_staff_posts_count; ?>)</span></div>

                                                    </div>
                                                </div>

                                            </div>


                                            <div class="content">
                                                <div class="tabs__content" id="global-search__filter">
                                                    <div class="tab tab-all global-search-tab is-active" data-post-type="all">
                                                        <div class="tab-content-wrapper">
                                                            <div class="team-block__member-wrap">
                                                                <div class="heading-block">
                                                                    <?php if ($team_block['board_members']['title']) : ?>
                                                                        <div class="rslider__heading"><?php echo  $team_block['board_members']['title']; ?></div>
                                                                    <?php endif ?>
                                                                    <?php if ($team_block['board_members']['description']) : ?>
                                                                        <div class="rslider__desc"><?php echo  $team_block['board_members']['description']; ?></div>
                                                                    <?php endif ?>
                                                                </div>

                                                                <?php if ($board_members_posts) : ?>
                                                                <div class="team-block__member-list">
                                                                    <?php foreach ($board_members_posts as $board_members) : ?>
                                                                        <div class="team-block__member-item board-member">
                                                                            <div class="team-block__member-img">
                                                                                <?php if (  get_field('staff_info', $board_members->ID)['image'] ): ?>
                                                                                <img src="<?php echo get_field('staff_info', $board_members->ID)['image']['url']; ?>" alt="<?php echo get_field('staff_info', $board_members->ID)['image']['title']; ?>">
                                                                                <?php endif ?>
                                                                            </div>

                                                                            <div class="team-block__member-body">
                                                                                <div class="team-block__member-name" data-height="teamMemberName"><?php echo $board_members->post_title; ?></div>
                                                                                <div class="team-block__member-position" data-height="teamMemberPosition"><?php echo get_field('staff_info', $board_members->ID)['role_qualifications']; ?></div>
                                                                                <a href="<?=  get_the_permalink($board_members->ID) ?>" target="" class="team-block__member-link  btn-body  btn-transparent-white  Between " tabindex="0">
                                                                                    <span class="btn-inner">Read more</span>
                                                                                </a>
                                                                            </div>

                                                                        </div>
                                                                    <?php endforeach ?>


                                                                </div>
                                                                <?php endif ?>
                                                            </div>

                                                            <div class="team-block__member-wrap">
                                                                <div class="heading-block">
                                                                    <?php if ($team_block['our_staff']['title']) : ?>
                                                                    <div class="rslider__heading"><?php echo $team_block['our_staff']['title'] ?></div>
                                                                    <?php endif ?>
                                                                    <?php if ($team_block['our_staff']['description']) : ?>
                                                                    <div class="rslider__desc"><?php echo $team_block['our_staff']['description'] ?></div>
                                                                    <?php endif ?>
                                                                </div>


                                                                <?php if ($our_staff_posts) : ?>
                                                                <div class="team-block__member-list">
                                                                    <?php foreach ($our_staff_posts as $our_staff) : ?>
                                                                        <div class="team-block__member-item our-staff">
                                                                            <div class="team-block__member-img">
                                                                                <?php if (  get_field('staff_info', $our_staff->ID)['image'] ): ?>
                                                                                <img src="<?php echo get_field('staff_info', $our_staff->ID)['image']['url']; ?>" alt="<?php echo get_field('staff_info', $our_staff->ID)['image']['title']; ?>">
                                                                                <?php endif ?>
                                                                            </div>

                                                                            <div class="team-block__member-body">
                                                                                <div class="team-block__member-name" data-height="teamMemberName"><?php echo $our_staff->post_title; ?></div>
                                                                                <div class="team-block__member-position" data-height="teamMemberPosition"><?php echo get_field('staff_info', $our_staff->ID)['role_qualifications']; ?></div>
                                                                                <a href="<?=  get_the_permalink($our_staff->ID) ?>" target="" class="team-block__member-link  btn-body  btn-transparent-white  Between " tabindex="0">
                                                                                    <span class="btn-inner">Read more</span>
                                                                                </a>
                                                                            </div>

                                                                        </div>
                                                                    <?php endforeach ?>


                                                                </div>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Board members-->
                                                    <div class="tab tab-board-members global-search-tab" data-post-type="board-members">
                                                        <div class="tab-content-wrapper">
                                                            <div class="team-block__member-wrap">
                                                                <div class="heading-block">
                                                                    <?php if ($team_block['board_members']['title']) : ?>
                                                                    <div class="rslider__heading"><?php echo  $team_block['board_members']['title']; ?></div>
                                                                    <?php endif ?>
                                                                    <?php if ($team_block['board_members']['description']) : ?>
                                                                    <div class="rslider__desc"><?php echo  $team_block['board_members']['description']; ?></div>
                                                                    <?php endif ?>
                                                                </div>


                                                                <?php if ($board_members_posts) : ?>
                                                                    <div class="team-block__member-list">
                                                                        <?php foreach ($board_members_posts as $board_members) : ?>
                                                                            <div class="team-block__member-item board-member">
                                                                                <div class="team-block__member-img">
                                                                                    <?php if (  get_field('staff_info', $board_members->ID)['image'] ): ?>
                                                                                        <img src="<?php echo get_field('staff_info', $board_members->ID)['image']['url']; ?>" alt="<?php echo get_field('staff_info', $board_members->ID)['image']['title']; ?>">
                                                                                    <?php endif ?>
                                                                                </div>

                                                                                <div class="team-block__member-body">
                                                                                    <div class="team-block__member-name" data-height="teamMemberName"><?php echo $board_members->post_title; ?></div>
                                                                                    <div class="team-block__member-position" data-height="teamMemberPosition"><?php echo get_field('staff_info', $board_members->ID)['role_qualifications']; ?></div>
                                                                                    <a href="<?=  get_the_permalink($board_members->ID) ?>" target="" class="team-block__member-link  btn-body  btn-transparent-white  Between " tabindex="0">
                                                                                        <span class="btn-inner">Read more</span>
                                                                                    </a>
                                                                                </div>

                                                                            </div>
                                                                        <?php endforeach ?>


                                                                    </div>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!--Our Staff-->

                                                    <div class="tab tab-our-team global-search-tab" data-post-type="our-team">
                                                        <div class="tab-content-wrapper">
                                                            <div class="team-block__member-wrap">
                                                                <div class="heading-block">
                                                                    <?php if ($team_block['our_staff']['title']) : ?>
                                                                        <div class="rslider__heading"><?php echo $team_block['our_staff']['title'] ?></div>
                                                                    <?php endif ?>
                                                                    <?php if ($team_block['our_staff']['description']) : ?>
                                                                        <div class="rslider__desc"><?php echo $team_block['our_staff']['description'] ?></div>
                                                                    <?php endif ?>
                                                                </div>

                                                                <?php if ($our_staff_posts) : ?>
                                                                    <div class="team-block__member-list">
                                                                        <?php foreach ($our_staff_posts as $our_staff) : ?>
                                                                            <div class="team-block__member-item our-staff">
                                                                                <div class="team-block__member-img">
                                                                                    <?php if (  get_field('staff_info', $our_staff->ID)['image'] ): ?>
                                                                                        <img src="<?php echo get_field('staff_info', $our_staff->ID)['image']['url']; ?>" alt="<?php echo get_field('staff_info', $our_staff->ID)['image']['title']; ?>">
                                                                                    <?php endif ?>
                                                                                </div>

                                                                                <div class="team-block__member-body">
                                                                                    <div class="team-block__member-name" data-height="teamMemberName"><?php echo $our_staff->post_title; ?></div>
                                                                                    <div class="team-block__member-position" data-height="teamMemberPosition"><?php echo get_field('staff_info', $our_staff->ID)['role_qualifications']; ?></div>
                                                                                    <a href="<?=  get_the_permalink($our_staff->ID) ?>" target="" class="team-block__member-link  btn-body  btn-transparent-white  Between " tabindex="0">
                                                                                        <span class="btn-inner">Read more</span>
                                                                                    </a>
                                                                                </div>

                                                                            </div>
                                                                        <?php endforeach ?>


                                                                    </div>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>

            </div>

            <?php get_template_part('template-parts/layout', 'page-after-content-blocks'); ?>
        </div>

    <?php endwhile; endif; ?>
    <footer class="footer">

    </footer>
</main>
<?php get_footer(); ?>

