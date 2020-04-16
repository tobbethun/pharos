<?php get_header();
$query1 = new WP_Query( array( 'category_name' => 'Startsidan-top' ,'order'    => 'ASC' ) );
$query2 = new WP_Query( array( 'category_name' => 'Startsidan' ,'order'    => 'ASC' ) ); ?>

<div class="startpage">
	<?php 
	if ( $query1->have_posts() ) {
		while ( $query1->have_posts() ) {
			$query1->the_post(); 
			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			?>
			<div class="startpage-section main-image" style="background-image:url('<?php echo $url; ?>');">
				<div class="startpage-section__main-logo"></div>
			</div>
			<div class="startpage-section__content main-content">
				<h1 class="startpage-section__title main-title"><span class="title-text"><?php the_title()?></span></h1>
				<div class="startpage-section__text">
					<img src="<?php bloginfo('template_url'); ?>/images/speaker-symbol.png" class="startpage-section__speaker first-speaker" alt="Högtalar ikon">	
					<?php the_content()?>
				</div>
			</div>

			<?php
		
		}
	}
	?>

	<?php wp_reset_query($query);


	if ( $query2->have_posts() ) {
		while ( $query2->have_posts() ) {
			$query2->the_post(); 
			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			if ( in_category('Video')) { ?>
			<div class="startpage-section__video"><?php
			}
			?>
				<div class="startpage-section" style="background-image:url('<?php echo $url; ?>');">
					<?php
					if ( in_category('Video')) {?>
					<img src="<?php bloginfo('template_url'); ?>/images/playicon.png" class="startpage-section__play" alt="play ikon"><?php
					}?>
				</div>
				<div class="startpage-section__content">
					<h1 class="startpage-section__title"><span class="title-text"><?php the_title()?></title></h1>
					<div class="startpage-section__text">
						<img src="<?php bloginfo('template_url'); ?>/images/speaker-symbol.png" class="startpage-section__speaker" alt="Högtalar ikon">
						<?php the_content()?>
					</div>
				</div>
			<?php
			if ( in_category('Video')) { ?>
			</div><?php
			}
			
		} 
	} 
	?>

	<?php wp_reset_query($query); ?>
	<?php include( get_template_directory() . '/box-menu.php');?>
</div>


<?php get_footer();?>