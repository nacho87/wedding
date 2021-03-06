<?php namespace Leean;
/**
 * Template part for displaying posts.
 *
 * @package Leean
 * @subpackage partials
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
		itemscope itemType="http://schema.org/BlogPosting">
	<header class="entry__header">

		<h1 class="entry__title" itemprop="name">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h1>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry__meta">
			<span itemprop="dateModified" style="display:none;">
				Last modified: <?php the_modified_date(); ?>
			</span>
		</div>
		<?php endif; ?>
	</header>

	<?php if ( is_search() ) : ?>
	<div class="entry-summary" itemprop="description">
		<?php the_excerpt(); ?>
	</div>
	<?php else : ?>
	<div class="entry__content" itemprop="articleBody">
		<?php
			the_content( sprintf(
				esc_html__( 'Continue reading%s &rarr;', _TEXT_DOMAIN_ ),
				'<span class="screen-reader-text">  '.get_the_title().'</span>'
			)  );
		?>

		<?php
			wp_link_pages( [
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', _TEXT_DOMAIN_ ),
				'after'  => '</div>',
			] );
		?>
	</div>
	<?php endif; ?>

	<footer class="entry__meta" itemprop="keywords">
		<?php if ( ! post_password_required() && ( comments_open() || 0 !== get_comments_number() ) ) : ?>
		<span class="comments__link" itemprop="comment" >
		<?php
			comments_popup_link(
				esc_html__( 'Leave a comment', _TEXT_DOMAIN_ ),
				esc_html__( '1 Comment', _TEXT_DOMAIN_ ),
				esc_html__( '% Comments', _TEXT_DOMAIN_ )
			);
		?>
		</span>
		<?php endif; ?>

		- <?php
			edit_post_link(
				esc_html__( 'Edit', _TEXT_DOMAIN_ ),
				'<span class="edit-link">', '</span>'
			);
		?>
	</footer>
</article>
