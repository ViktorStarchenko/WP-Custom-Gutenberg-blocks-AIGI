<?php get_header(); ?>
<main id="content" role="main">
<article id="post-0" class="post not-found">
<div class="entry-content wrappper_404" itemprop="mainContentOfPage" >
<?php 
$data = get_field('404', 'option');
?>
<div class="wrapper-1245">
	<h1><?= $data['title'] ?></h1>
	<p class="subtitle_404"><?= $data['subtitle'] ?></p>
	<a href="/" class="btn-body  btn-m-blue  Between " tabindex="0">
        <span class="btn-inner">Return back to home</span>
    </a>
    <p class="subtitle_404 subtitle2_404 subtitle2_404_d"><?= $data['image_description_desktop'] ?></p>
    <p class="subtitle_404 subtitle2_404 subtitle2_404_m"><?= $data['image_description_mob'] ?></p>
</div>

</div>
</article>
</main>
<style type="text/css">
	.wrappper_404 {
		background-image: url(<?= $data['image_desktop']['url'] ?>);
	}
	@media (max-width: 767px) {
		.wrappper_404 {
			background-image: url(<?= $data['image_mob']['url'] ?>);
		}
	}
</style>
<?php get_footer(); ?>