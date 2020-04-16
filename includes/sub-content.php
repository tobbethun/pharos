<article class="sub-content">
  <?php
  global $post;
  $nav = array(
    'post_type' => 'page',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_parent' => $post->ID
  );
  $child_pages = get_posts($nav);
  ?>
  <?php foreach ($child_pages as $child_page) :
    $title = $child_page->post_title;
    $formattedTitle = apply_filters('the_content', $title);
    $text = $child_page->post_content;
    $content = apply_filters('the_content', $text);
    $url = get_the_permalink($child_page);
    $id = basename($url);
    ?>
    <section id=<?=$id?> class="sub-content__container">
      <img src="<?php bloginfo('template_url'); ?>/images/speaker-symbol.png" class="startpage-section__speaker sub-content--speaker" alt="Högtalar ikon">
      <h1 class="sub-content__title"><?=$title?></h1>
      <div class="sub-content__text"><?=$content?></div>
    </section>
      
  <?php endforeach; ?>
</article>
