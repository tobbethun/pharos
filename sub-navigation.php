<?php
	$subpages = new WP_Query( array(
	    'post_type' => 'page',
	    'post_parent' => $post->ID,
	    'posts_per_page' => -1,
	    'orderby' => 'menu_order'
	));

	if( $subpages->have_posts() ) { ?>
			<ul id="sub-menu">
				<li><?php the_title(); ?></li>
	    <?php while( $subpages->have_posts() ) {
	      $subpages->the_post();
				$url = get_the_permalink();
				$id = basename($url);
				?>
	        <li>
						<a href="#<?= $id?>"><?php the_title(); ?></a>
					</li>

	    <?php
	  }
	}
	wp_reset_postdata();
?>
