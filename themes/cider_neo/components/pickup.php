<?php
$temp = $wp_query;
$wp_query = null;
$wp_query = new WP_Query();
$wp_query->query('post_type=post' . '&posts_per_page=3' . '&tag=pickup' . '&paged=' . $paged);
?>
<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
	<article class="Card">
		<a href="<?php the_permalink(); ?>" class="Card-Wrapper" title="<?php the_title(); ?>">
			<figure class="Card-Figure">
				<?php if ( has_post_thumbnail() ): ?>
					<?php $post_title= get_the_title(); the_post_thumbnail('', array('class' => 'Image Card-Image' ,'alt' => $post_title)); ?>
				<?php endif; ?>
			</figure>
			<header class="Card-Header">
				<time class="Card-Time"><?php the_time("Y.m.d") ?></time>
				<h2 class="Card-Title"><?php the_title(); ?></h2>
			</header>
		</a>
	</article>
<?php endwhile; ?>
<?php $wp_query = null; $wp_query = $temp; ?>
