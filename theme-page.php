<?php 
/**
 * Template Name: Theme page
 *
 * Description: 
 *
 */

global $post;
$slug = $post->post_name;

	if ( is_active_sidebar( $slug ) ){
		$primary_width = 'span8';
	} else {
		$primary_width = 'span12';
	}
	
get_header();
?>
<?php if (has_post_thumbnail()){ ?>
<div class="row-fluid" style="margin:0 0 40px 0;">
	<div class="span12">
		<figure class="post-thumbnail-container">
			<?php the_post_thumbnail('large-feature'); ?>
			<div class="carousel-caption"><h4><?php the_title(); ?></h4></div>
		</figure>
	</div>
</div>
<?php } ?>

<div class="row-fluid">
	<div class="<?php echo $primary_width; ?> primary">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header assistive-text"> <!-- assistive text to hide if from people, it's already in the top image -->
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>

			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'elv' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'elv' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->
		</article><!-- #post -->
			<?php comments_template( '', true ); ?>
		<?php endwhile; // end of the loop. ?>
	</div><!-- .primary -->	
	<?php if ( is_active_sidebar( $slug ) ) : ?>
	<div class="secondary widget-area span4" role="complementary">
		<?php elv_it8n_dynamic_sidebar( $slug ); ?>
	</div><!-- #secondary -->
<?php endif; ?>
</div>

	</div><!-- .container -->

<?php if (get_post_meta($post->ID, 'contact_title', true)){
	require 'partials/call-to-action.php';
}

get_footer(); ?>