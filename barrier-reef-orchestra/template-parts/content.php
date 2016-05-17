<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Barrier_Reef_Orchestra
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
            
            
            <?php
            if ( has_post_thumbnail()) { ?>
            <figure class="featured-image">
                <?php the_post_thumbnail(); ?>
            </figure>
            <?php }
            ?>
            
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php barrier_reef_orchestra_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
            
		<?php
                 the_excerpt();
		?>
           
	</div><!-- .entry-content -->
        
        <div class="continue">
            <a href="<?php echo esc_url(get_permalink()); ?> " rel="bookmark">
               <?php 
                    printf(	
                        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'barrier-reef-orchestra' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
			);
                    ?>
               </a>
	</div>

	<footer class="entry-footer">
		<?php barrier_reef_orchestra_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
