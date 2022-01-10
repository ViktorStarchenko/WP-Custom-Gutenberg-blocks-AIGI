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
		height: 760px;
		background-size: cover;

	}
	.wrappper_404 .wrapper-1245 {
		padding-top: 260px;
	}
	.wrappper_404 h1 {
		font-weight: bold;
		font-size: 40.5px;
		line-height: 110%;
		letter-spacing: 0.02em;
		color: #FFFFFF;
		max-width: 730px;
	}
	.subtitle_404 {
		margin: 50px 0;
	}
	.wrappper_404 .wrapper-1245 p {
	    font-weight: normal;
	    font-size: 16.88px;
	    line-height: 160%;
	    letter-spacing: 0.05em;
	    color: #FFFFFF;
	    margin: 29px 0;
	}
	.wrappper_404 .wrapper-1245 p.subtitle2_404 {
		font-weight: normal;
		font-size: 14.4px;
		line-height: 130%;
		letter-spacing: 0.05em;
		color: #FFFFFF;
	}
	.subtitle2_404_m {
		display: none;
	}
	@media (max-width: 767px) {
		.error404 .wrappper_404 a.btn-body {
			background: transparent;
		    border: unset;
		    text-decoration: underline;
		}
		.error404 .wrappper_404 a.btn-body span {
			text-decoration: underline;
		}
		.subtitle2_404_m {
			display: block;
		}
		.subtitle2_404_d {
			display: none;
		}
		.wrappper_404 .wrapper-1245 {
			padding: 130px 15px 0 15px;
		}
		.wrappper_404 {
			background-image: url(<?= $data['image_mob']['url'] ?>);
			text-align: center;
			height: 500px;
		}
		h1 {
			font-weight: bold;
			font-size: 32.44px;
			line-height: 110%;
			text-align: center;
			letter-spacing: 0.02em;
		}
		.subtitle_404 {
			font-size: 15px;
			line-height: 160%;
			text-align: center;
			letter-spacing: 0.03em;
		}
		.wrappper_404 .wrapper-1245 p.subtitle2_404 {
			font-size: 14px;
			line-height: 18px;
			text-align: center;
			letter-spacing: 0.05em;
		}
	}
</style>
<?php get_footer(); ?>