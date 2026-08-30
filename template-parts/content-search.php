<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BelSKS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			belsks_posted_on();
			belsks_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
	if ( 'post' === get_post_type() ) :
		$card_image = get_field( 'post_card_image' );
		if ( $card_image ) :
		?>
			<img src="<?php echo esc_url( $card_image['url'] ); ?>" alt="<?php echo esc_attr( $card_image['alt'] ); ?>" class="post-card-image" />
		<?php else : ?>
			<?php belsks_post_thumbnail(); ?>
		<?php endif; ?>
	<?php else : ?>
		<?php belsks_post_thumbnail(); ?>
	<?php endif; ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php belsks_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
