<?php
/**
* The template for displaying page
*
* @package Tobias Thun
* @subpackage Pharos
* @since VERSION 1.0
*/

get_header();
?>
<div class="pharos-page">
  <?php include( get_template_directory() . '/includes/content.php');?>
</div>
<?php
	include( get_template_directory() . '/box-menu-on-page.php');
  get_footer();
?>
