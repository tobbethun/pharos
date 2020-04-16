<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Thun
 * @subpackage Pharos
 * @since VERSIONING
 */
?>

		<?php
		/*if(is_active_sidebar('sidebar-footer')) {
			dynamic_sidebar('sidebar-footer');
		}*/
		?>
        <div class="footer">
            <img src="<?php bloginfo('template_url'); ?>/images/loggor_footer.png" class="footer__logos" alt="skma och forum för levande historia logos">
            <div class="footer__info">
                <span>Ett informations- och undervisningsmaterial från Svenska kommittén mot antisemitism (SKMA) och Forum för levande historia. Läs mer <a href="http://antisemitismdaochnu.se/om-materialet">om materialet</a> och se vilka källor som ligger till grund för materialet.</span>
                
            </div>
        </div>
	<?php wp_footer(); ?>
</body>
</html>