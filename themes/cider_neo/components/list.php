<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article>
	<a href="<?php the_permalink(); ?>" class="Card" title="<?php the_title(); ?>">
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
<?php endwhile; endif; ?>

<?php next_posts_link( 'Next' ); ?>
<?php previous_posts_link( 'Prev' ); ?>