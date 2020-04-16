<?php
if(have_posts()) {
  while (have_posts()) {
    the_post();
    ?>
      <?php
      if ( has_post_thumbnail() ) {
        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
        ?>
        <div class="pharos-page__image" style="background-image:url('<?php echo $url; ?>');">
          <!-- <?php the_post_thumbnail(); ?> -->
        </div>
        <a href="<?php echo home_url(); ?>" class="pharos-page__home-link"></a>
        <?php
      }?>
      <div class="pharos-page__wrapper">
       <!--  <div class="pharos-page__side-menu">


          <?php get_template_part( 'sub-navigation'); ?>
        </div> -->
        <div class="pharos-page__content">
          <!-- <div class="pharos-page__breadcrumb breadcrumb"><?php get_breadcrumb(); ?></div> -->
          <div class="pharos-page__title">
            <h1><?php the_title(); ?></h1>
          </div>
          <?php if ( '' !== get_post()->post_content ) { ?>
            <?php $media = get_attached_media( 'audio', $post->ID  );
             if (count($media) > 0) { ?>
                <img src="<?php bloginfo('template_url'); ?>/images/speaker-symbol.png" class="startpage-section__speaker first-content--speaker" alt="Högtalar ikon">
             <?php
             }
            ?>
            <div class="pharos-page__text">
              <?php the_content(); ?>
            </div>
          <?php } ?>
          <?php include( get_template_directory() . '/includes/sub-content.php');?>
        </div>
      </div>
    <?php
  }
}
?>
