<?php //get_sidebar(); ?>
</div>
<?php 
$footer_top_section = get_field('footer_top_section', 'option'); 
$footer_contacts = get_field('footer_contacts_section', 'option'); 
$footer_partners = get_field('footer_partners', 'option');
$footer_button = get_field('footer_button', 'option');
$footer_copyright = get_field('copyright', 'option');
$footer_bottom_menu = get_field('footer_bottom_menu', 'option');
?>
<footer id="footer" role="contentinfo">
	<div class="footer_wrapper">
		<?php if (!empty($footer_top_section)) : ?>
		<div class="footer_top_block">
			<p><?= $footer_top_section ?></p>
		</div>
		<?php endif; ?>
		<div class="footer_contacts_wrapper">
			<div class="footer_contacts_block">
				<div class="footer_logo_block footer_contacts_col">
					<div class="footer_logo">
						<img src="<?= $footer_contacts['logo']['url'] ?>" alt="<?= get_option( 'blogname' ); ?>">
					</div>
				</div>
				<div class="footer_location_block footer_contacts_col">
                    <a href="https://maps.google.com/?q=<?php echo $footer_contacts['adress'];?>" target="_blank"><?= $footer_contacts['adress'] ?></a>
				</div>
				<div class="footer_social_block footer_contacts_col">
					<?php if (!empty($footer_contacts['mail']['url'])) : ?>
					<a class="footer_mail" href="<?= $footer_contacts['mail']['url'] ?>"><?= $footer_contacts['mail']['title'] ?></a>
					<?php endif; ?>
					<?php if (!empty($footer_contacts['twitter']['url'])) : ?>
					<a class="footer_twitter" href="<?= $footer_contacts['twitter']['url'] ?>"><?= $footer_contacts['twitter']['title'] ?></a>
					<?php endif; ?>
					<?php if (!empty($footer_contacts['instagram']['url'])) : ?>
					<a class="footer_instagram" href="<?= $footer_contacts['instagram']['url'] ?>"><?= $footer_contacts['instagram']['title'] ?></a>
					<?php endif; ?>
					<?php if (!empty($footer_contacts['facebook']['url'])) : ?>
					<a class="footer_facebook" href="<?= $footer_contacts['facebook']['url'] ?>"><?= $footer_contacts['facebook']['title'] ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="footer_partners_block">
			<div class="footer_partners">
				<?php foreach($footer_partners as $item) : ?>    
					<a href="<?= $item['link']['url'] ?>">
						<img alt="<?= $item['link']['title'] ?>" src="<?= $item['logo']['url'] ?>">
					</a>                                                    
                <?php endforeach; ?>
			</div>
			<div class="footer_button">
                <?php if (!empty($footer_button)) : ?>
<!--                    <a class="btn-body" href="--><?//= $footer_button['url'] ?><!--"><span class="btn-inner">--><?//= $footer_button['title'] ?><!--</span></a>-->
                    <a class="custom-dbox-popup btn-body" href="<?= $footer_button['url'] ?>" target="_self"><?= $footer_button['title'] ?></a>
                <?php endif; ?>
			</div>
		</div>
<!--        <button id="Zoomout" style="">Zoom Out</button>-->
<!--        <button id="Zoomin" style="">Zoom In</button>-->

		<div class="footer_bottom_block">
			<div class="copyright">
				<?= $footer_copyright ?>
			</div>
			<div class="footer_bottom_menu">
				<?php foreach($footer_bottom_menu as $item) : ?>    
					<a href="<?= $item['link']['url'] ?>"><?= $item['link']['title'] ?></a><span>/</span>                                                    
                <?php endforeach; ?>
			</div>
		</div>
	</div>
</footer>
</div>
<?php wp_footer(); ?>

<!--partner popup-->
<div id="partner-popup-main-wrapper"></div>

<script>
jQuery('#checkZoom').on('click', function(){
    // zoomin()
    toggleZoomScreen()
})

    let zoom = 100;
    jQuery('#Zoomin').on('click', function() {
        zoom = zoom+10;
        document.body.style.zoom = zoom+'%';
        console.log(zoom)
    })
    jQuery('#Zoomout').on('click', function() {
        zoom = zoom-10;
        document.body.style.zoom = zoom+'%';
        console.log(zoom)
    })

</script>

<script>
    function toggleZoomScreen() {

    }
</script>
</body>
</html>