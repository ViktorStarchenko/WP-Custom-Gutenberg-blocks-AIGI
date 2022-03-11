<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup() {
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'search-form' ) );
global $content_width;
if ( !isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'blankslate' ) ) );
}
add_action( 'admin_notices', 'blankslate_admin_notice' );
function blankslate_admin_notice() {
$user_id = get_current_user_id();
if ( !get_user_meta( $user_id, 'blankslate_notice_dismissed_3' ) && current_user_can( 'manage_options' ) )
echo '<div class="notice notice-info"><p>' . __( '<big><strong>BlankSlate</strong>:</big> Help keep the project alive! <a href="?notice-dismiss" class="alignright">Dismiss</a> <a href="https://calmestghost.com/donate" class="button-primary" target="_blank">Make a Donation</a>', 'blankslate' ) . '</p></div>';
}
add_action( 'admin_init', 'blankslate_notice_dismissed' );
function blankslate_notice_dismissed() {
$user_id = get_current_user_id();
if ( isset( $_GET['notice-dismiss'] ) )
add_user_meta( $user_id, 'blankslate_notice_dismissed_3', 'true', true );
}
add_action( 'wp_enqueue_scripts', 'blankslate_enqueue' );
function blankslate_enqueue() {
wp_enqueue_style( 'blankslate-style', get_stylesheet_uri() );
wp_enqueue_script( 'jquery' );
}
add_action( 'wp_footer', 'blankslate_footer' );
function blankslate_footer() {
?>
<script>
jQuery(document).ready(function($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
</script>
<?php
}
add_filter( 'document_title_separator', 'blankslate_document_title_separator' );
function blankslate_document_title_separator( $sep ) {
$sep = '|';
return $sep;
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '...';
} else {
return $title;
}
}
add_filter( 'nav_menu_link_attributes', 'blankslate_schema_url', 10 );
function blankslate_schema_url( $atts ) {
$atts['itemprop'] = 'url';
return $atts;
}
if ( !function_exists( 'blankslate_wp_body_open' ) ) {
function blankslate_wp_body_open() {
do_action( 'wp_body_open' );
}
}
add_action( 'wp_body_open', 'blankslate_skip_link', 5 );
function blankslate_skip_link() {
echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'blankslate' ) . '</a>';
}
add_filter( 'the_content_more_link', 'blankslate_read_more_link' );
function blankslate_read_more_link() {
if ( !is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'blankslate' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'excerpt_more', 'blankslate_excerpt_read_more_link' );
function blankslate_excerpt_read_more_link( $more ) {
if ( !is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'blankslate' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'blankslate_image_insert_override' );
function blankslate_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
unset( $sizes['1536x1536'] );
unset( $sizes['2048x2048'] );
return $sizes;
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
register_sidebar( array(
'name' => esc_html__( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'wp_head', 'blankslate_pingback_header' );
function blankslate_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function blankslate_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
<?php
}
add_filter( 'get_comments_number', 'blankslate_comment_count', 0 );
function blankslate_comment_count( $count ) {
if ( !is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

/****
 *
 *
 * START CUSTOM CODE
 *
 *
 ****/
include 'lib/remove-unwanted-funcs.php';
include 'lib/custom-post-types.php';
include 'lib/insert-posts-into-toolkit.php';
include 'lib/events-post-type.php';
include 'lib/people-post-type.php';
include 'lib/partners-post-type.php';
include 'lib/case-studies-post-type.php';
include 'lib/news-post-type.php';
include 'lib/staff-post-type.php';
include 'lib/author-post-type.php';
include 'lib/acf.php';
include 'lib/post-views-counter.php';
include 'lib/custom-facetwp.php';
include 'lib/gf.php';

function custom_wp_custom_admin_scripts() {
    wp_enqueue_style('admin-styles', get_theme_file_uri() . '/assets/css/admin-styles.css');
}
add_action( 'admin_enqueue_scripts', 'custom_wp_custom_admin_scripts' );

function custom_wp_custom_scripts(){

    if (!is_admin()) {
        wp_enqueue_style('slick-theme', get_theme_file_uri() . '/assets/css/slick/slick-theme.css');
        wp_enqueue_style('slick', get_theme_file_uri() . '/assets/css/slick/slick.css');
        wp_enqueue_style('slick', get_theme_file_uri() . '/assets/css/swiper.min.css');
        wp_enqueue_style('styles', get_theme_file_uri() . '/assets/css/style.css');


        wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick/slick.min.js', ['jquery'], false, false);
        wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], false, true);
    }
}

add_action( 'wp_enqueue_scripts', 'custom_wp_custom_scripts' );

function aigi_get_filename_from_url( $file_url ) {
    $parts = wp_parse_url( $file_url );
    if ( isset( $parts['path'] ) ) {
        return basename( $parts['path'] );
    }
}




/*** Header and footer settings code ***/
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Header Settings',
        'menu_title'    => 'Header Settings',
        'menu_slug'     => 'header-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_page(array(
        'page_title'    => 'Footer Settings',
        'menu_title'    => 'Footer Settings',
        'menu_slug'     => 'footer-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

}


/*** Hide adminbar on frontend ***/
add_filter( 'show_admin_bar', '__return_false' );

/*** Get total posts count ***/
function get_total_posts(){
    $total_posts = 0;
    $total_posts += (int) wp_count_posts('event')->publish;
    $total_posts += (int) wp_count_posts('news')->publish;
    $total_posts += (int) wp_count_posts('resource')->publish;
    $total_posts += (int) wp_count_posts('toolkit')->publish;
    return $total_posts;
}


/*** Custom excerpt ***/
function get_custom_excerpt($content, $limit, $ellipsis = true){

    $excerpt = $content;
    $excerpt = preg_replace(" ([.*?])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
//    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt;
    if ($ellipsis == true) {
        $excerpt.= '...';
    }

    return $excerpt;
}

/*** Link for Add to Google calendar button ***/
function googleCalendarLink( $post_id = null )
{
    $post = get_post($post_id);
    $start_date = strtotime(get_field('events_details', $post->ID)['start_date']);
    $end_date = strtotime(get_field('events_details', $post->ID)['end_date']);

    $dates = date('Ymd', $start_date) . 'T' . date('Hi00', $start_date) . '/' . date('Ymd', $end_date) . 'T' . date('Hi00', $end_date);


    $location = get_field('location', $post->ID)['address']['address'];

    $event_details = $post->post_excerpt;
    $event_details = str_replace('</p>', '</p> ', $event_details);
    $event_details = strip_tags($event_details);
    if (strlen($event_details) > 996) {

        $event_url = get_permalink($post->ID);
        $event_details = substr($event_details, 0, 996);

        //Only add the permalink if it's shorter than 900 characters, so we don't exceed the browser's URL limits
        if (strlen($event_url) < 900) {
            $event_details .= sprintf(esc_html__(' (View Full %1$s Description Here: %2$s)', 'the-events-calendar'), $event_url);
        }
    }

    $params = [
        'action' => 'TEMPLATE',
        'text' => urlencode(strip_tags($post->post_title)),
        'dates' => $dates,
        'details' => urlencode($event_details),
        'location' => urlencode($location),
        'trp' => 'false',
        'sprop' => 'website:' . home_url(),
    ];

    if ( get_field('events_details', $post->ID)['timezone'] ) {
        $params['ctz'] = urlencode( get_field('events_details', $post->ID)['timezone'] );
    }


    $params = apply_filters('tribe_google_calendar_parameters', $params, $post->ID);

    $base_url = 'https://www.google.com/calendar/event';
    $url = add_query_arg($params, $base_url);


    return $url;
}


/*** Enqueue Font Awesome. ***/

add_action( 'wp_enqueue_scripts', 'custom_load_font_awesome' );

function custom_load_font_awesome() {

    wp_enqueue_style( 'font-awesome-free', '//use.fontawesome.com/releases/v5.2.0/css/all.css' );

}


//test
