<?php get_header(); ?>
<main class="main">
	<div class="list">
		<header class="list__meta">
			<h1 class="list__label list__label--small">
				「<?php if ( is_category() ) { ?>
				<?php single_cat_title(); ?>
				<?php } elseif ( is_tag() ) { ?>
				<?php single_tag_title(); ?>
				<?php } elseif ( is_day() ) { ?>
				<?php echo get_the_time( 'Y/m/d' ); ?>
				<?php } elseif ( is_month() ) { ?>
				<?php echo get_the_time( 'Y/m' ); ?>
				<?php } elseif ( is_year() ) { ?>
				<?php echo get_the_time( 'Y' ); ?>
				<?php } elseif ( is_author() ) { ?>
				<?php } ?>」まとめ</h1>
				<?php if ( is_category() ) { ?>
				<div class="list__descr"><?php echo category_description(); ?></div>

				<div class="list__category">
					<?php $cats_id = get_category_by_slug($category_name)->term_id; $args = array('orderby' => 'name', 'order' => 'ASC','child_of' => $cats_id,'hide_empty'=>'0' ); $categories = get_categories($args); ?>
					<?php foreach($categories as $category){echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . $category->name . '" ' . '>' . $category->name . '' .'</a>';} ?>
				</div>
				<?php } ?>
			</header>
			<?php get_template_part( 'components/list' ); ?>
		</div>
	</main>
	<?php get_footer(); ?>
