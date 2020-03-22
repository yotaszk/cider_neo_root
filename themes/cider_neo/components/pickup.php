<section class="Pickup">
	<h2 class="Pickup-Heading">Pickup</h2>
	<div class="Pickup-Cards">
		<?php
		$temp = $wp_query;
		$wp_query = null;
		$wp_query = new WP_Query();
		$wp_query->query('post_type=post' . '&posts_per_page=3' . '&tag=pickup' . '&paged=' . $paged);
		?>
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<article class="Pickup-Card">
				<a href="<?php the_permalink(); ?>" class="Pickup-Wrapper" title="<?php the_title(); ?>">
					<figure class="Pickup-Figure">
						<?php if (has_post_thumbnail()) : ?>
							<?php $post_title = get_the_title();
							the_post_thumbnail('', array('class' => 'Image Pickup-Image', 'alt' => $post_title)); ?>
						<?php endif; ?>
					</figure>
					<header class="Pickup-Header">
						<time class="Pickup-Time"><?php the_time("Y.m.d") ?></time>
						<h2 class="Pickup-Title"><?php the_title(); ?></h2>
					</header>
				</a>
			</article>
		<?php endwhile; ?>
		<?php $wp_query = null;
		$wp_query = $temp; ?>
	</div>
</section>