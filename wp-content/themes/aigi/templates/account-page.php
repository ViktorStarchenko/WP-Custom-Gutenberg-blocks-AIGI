<?php
/*
* Template Name: Account page
* Template Post Type: page
*/
?>

<?php get_header(); ?>
<main id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php  $current_user = wp_get_current_user(); ?>
<?php $account_page = get_field('account_page'); ?>

        <div class="main-inner search-page">
            <div class="wrapper-full-width content-wrapper search-page__top">
                <div class="search-page__header wrapper-1245 content-wrapper">
                    <div class="search-page__heading">
                        <div class="">
                            <?php if ($account_page['heading']) {?>
                                <p class="search-page_title"><?php echo $account_page['heading']; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="search-page__sorting">


                    </div>
                </div>
            </div>
            <div class="wrapper-1245 content-wrapper">
                <div class="profile-details">
                    <?php if( $current_user->exists() ){ ?>
                        <div class="account-menu">
                            <div class="account-menu__user-info">
                                <div class="account-menu__user-name"><?php echo $current_user->user_firstname; ?> <?php echo $current_user->user_lastname; ?></div>
                                <div class="account-menu__user-email"><?php echo $current_user->user_email; ?></div>
                                <?php
                                $today = time(); // Get the current date
                                $user_date = strtotime($current_user->user_registered); // Get the user registration date
                                $diference = $today - $user_date; // Get the difference between today and the user registration date.
                                $diferencedays = floor($diference/(60*60*24)); // Transform the date to days.

                                if ($diferencedays <= 0) {
                                    $diferencedays = 1;
                                }

                                if ($diferencedays > 365) {
                                    $user_years = floor($diferencedays / 365);
                                    $user_month = $diferencedays - ($user_years * 365);
                                }

                                if ($diferencedays >= 30) {
                                    $user_month = floor($diferencedays / 30);
                                    $user_days = $diferencedays - ($user_month * 30) ;
                                }
                                if ($diferencedays <30) {
                                    $user_days = $diferencedays;
                                }

                                $user_total_time = '';
                                if (isset($user_years)) {
                                    $user_years = $user_years . ' years ';
                                    $user_total_time.= '' . $user_years;
                                }
                                if (isset($user_month)) {
                                    $user_month = $user_month . ' month ';
                                    $user_total_time.= '' . $user_month;
                                }
                                if (isset($user_days)) {
                                    $user_days = $user_days . ' days ';
                                    $user_total_time.= '' . $user_days;
                                }

                                ?>
                                <div class="account-menu__user-loggedin">user for <?php echo $user_total_time; ?></div>
                            </div>
                            <div class="account-menu__links">
                                <?php if ($account_page['account_page_menu']) {?>
                                    <ul class="rounded-list">
                                        <?php foreach ($account_page['account_page_menu'] as $account_page_menu) {?>
                                            <li>
                                                <a href="<?php echo $account_page_menu['link']['url']; ?>"><?php echo $account_page_menu['link']['title']; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="profile-details__wrap">
                            <div class="profile-details__inner">
                                <div class="profile-details__header">
                                    <?php if ($account_page['profile_form_title']) {?>
                                        <div class="profile-details__heading"><?php echo $account_page['profile_form_title']; ?></div>
                                    <?php } ?>

                                    <?php if ($account_page['form_shortcode']) {?>
                                        <?php $form_shortcode = $account_page['form_shortcode']; ?>
                                        <div class="profile-details__form">
                                            <?php echo do_shortcode(''. $form_shortcode .'') ; ?>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>

                        </div>
                    <?php } ?>
                </div>



            </div>
            <?php get_template_part('template-parts/layout', 'page-before-content-blocks'); ?>
        </div>

    <?php endwhile; endif; ?>
    <footer class="footer">

    </footer>
</main>
<script>
    jQuery('#edit_profile').attr('value', 'Save changes');
</script>

<?php get_footer(); ?>

