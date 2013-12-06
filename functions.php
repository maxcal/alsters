<?php
if ( ! isset( $content_width ) )
	$content_width = 1170;

function elv_dequeue_carousel(){
	wp_dequeue_style('wp-bootstrap-carousel');
	wp_dequeue_script('wp-bootstrap-carousel');
	wp_dequeue_script('wp-bootstrap-carousel-init');
	
	wp_dequeue_style( 'thickbox' );
    wp_dequeue_script( 'thickbox' );
}

add_action('wp_bootstrap_carousel_enqueue', 'elv_dequeue_carousel');

function elv_setup() {
	
	
	/*
	 * Makes Alsters available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'elv' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'elv', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'elv' ) );
	register_nav_menu( 'top', __( 'Top Menu', 'elv' ) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	define('ELV_THUMBNAIL_WIDTH', 200);
	define('ELV_THUMBNAIL_HEIGHT', 150);
	set_post_thumbnail_size( ELV_THUMBNAIL_WIDTH, ELV_THUMBNAIL_HEIGHT, true );
	
	add_image_size( 'large-feature', 1170, 370, true );
	// Used for featured posts if a large-feature doesn't exist.
	add_image_size( 'small-feature', 500, 300 );
}
add_action( 'after_setup_theme', 'elv_setup' );

function elv_init(){
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if (is_plugin_active('user-taxonomies/user-taxonomies.php')){
			register_taxonomy('city', 'user', array(
				'public'      =>true,
				'labels'      =>array(
					'name'                        => __( 'Cities', 'elv' ),
					'singular_name'               => __( 'City', 'elv' ),
					'menu_name'                   => __( 'Cities', 'elv' ),
					'search_items'                => __( 'Search Cities', 'elv' ),
					'popular_items'               =>  __( 'Popular Cities', 'elv' ),
					'all_items'                   => __( 'All Cities', 'elv' ),
					'edit_item'                   => __( 'Edit City', 'elv' ),
					'update_item'				  => __( 'Update City', 'elv' ),
					'add_new_item'                => __( 'Add City', 'elv' ),
					'new_item_name'               => __( 'New City Name', 'elv' ),
					'separate_items_with_commas'  => __('Separate cities with commas', 'elv'),
					'add_or_remove_items'     =>  __( 'Add or remove professions', 'elv' ),
					'choose_from_most_used'       => __('Choose from the most popular professions', 'elv'),
				),
				'rewrite'     =>array(
					'with_front'              => true,
					'slug'                        =>'medarbetare/city',
				),
				'capabilities'    => array(
					'manage_terms'                =>'edit_users',
					'edit_terms'              =>'edit_users',
					'delete_terms'                =>'edit_users',
					'assign_terms'                =>'read',
				),
			));
			
			register_taxonomy('area', 'user', array(
				'public'      =>true,
				'labels'      =>array(
					'name'                        => __( 'Business Areas', 'elv' ),
					'singular_name'               => __( 'Business Area', 'elv' ),
					'menu_name'                   => __( 'Business Areas', 'elv' ),
					'search_items'                => __( 'Search Business Areas', 'elv' ),
					'popular_items'               =>  __( 'Popular Business Areas', 'elv' ),
					'all_items'                   => __( 'All Business Areas', 'elv' ),
					'edit_item'                   => __( 'Edit Business Area', 'elv' ),
					'update_item'				  => __( 'Update Business Area', 'elv' ),
					'add_new_item'                => __( 'Add Business Area', 'elv' ),
					'new_item_name'               => __( 'New Business Area Name', 'elv' ),
					'separate_items_with_commas'  => __('Separate Business Areas with commas', 'elv'),
					'add_or_remove_items'     =>  __( 'Add or remove Business Areas', 'elv' ),
					'choose_from_most_used'       => __('Choose from the most popular Business Areas', 'elv'),
				),
				'rewrite'     =>array(
					'with_front'              => true,
					'slug'                        =>'medarbetare/area',
				),
				'capabilities'    => array(
					'manage_terms'                =>'edit_users',
					'edit_terms'              =>'edit_users',
					'delete_terms'                =>'edit_users',
					'assign_terms'                =>'read',
				),
			));
			
			register_taxonomy('interest', 'user', array(
				'public'      =>true,
				'labels'      =>array(
					'name'                        => __( 'Interests', 'elv' ),
					'singular_name'               => __( 'Interest', 'elv' ),
					'menu_name'                   => __( 'Interests', 'elv' ),
					'search_items'                => __( 'Search Interests', 'elv' ),
					'popular_items'               =>  __( 'Popular Interests', 'elv' ),
					'all_items'                   => __( 'All Interests', 'elv' ),
					'edit_item'                   => __( 'Edit Interest', 'elv' ),
					'update_item'				  => __( 'Update Interest', 'elv' ),
					'add_new_item'                => __( 'Add Interest', 'elv' ),
					'new_item_name'               => __( 'New Interest Name', 'elv' ),
					'separate_items_with_commas'  => __('Separate Interests with commas', 'elv'),
					'add_or_remove_items'     =>  __( 'Add or remove Interests', 'elv' ),
					'choose_from_most_used'       => __('Choose from the most popular Interests', 'elv'),
				),
				'rewrite'     =>array(
					'with_front'              => true,
					'slug'                        =>'medarbetare/intresse',
				),
				'capabilities'    => array(
					'manage_terms'                =>'edit_users',
					'edit_terms'				  =>'edit_users',
					'delete_terms'                =>'edit_users',
					'assign_terms'                =>'read',
				),
			));
	}
}

add_action('init', 'elv_init');

function elv_scripts_styles() {

	wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script('isotope', get_stylesheet_directory_uri() . '/js/jquery.isotope.min.js', array('jquery') );
	wp_enqueue_script('placeholder', get_stylesheet_directory_uri() . '/js/jquery.placeholder.min.js', array('jquery') );
	
	wp_enqueue_script('alsters-master', get_stylesheet_directory_uri() . '/js/master.js', array('bootstrap', 'jquery') );

	/*
	 * Loads our main stylesheet.
	 */
	
	wp_enqueue_style( 'elv-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'elv-bootstrap-responsive', get_stylesheet_directory_uri() . '/css/bootstrap-responsive.css', array('elv-bootstrap') );
	wp_enqueue_style( 'elv-style', get_stylesheet_uri(), array('elv-bootstrap', 'elv-bootstrap-responsive') );
	wp_enqueue_style( 'placeholder', get_stylesheet_uri() . '/css/jquery.placeholder.min.css' );

}
add_action( 'wp_enqueue_scripts', 'elv_scripts_styles' );

function elv_active_nav_class( $classes, $item )
{   
	$add_active = false;
	foreach($classes AS $class){
		if (false !== strpos($class, 'current')){
			$add_active = true;
			break;
		}
	}
	
	if ($add_active){
		$classes[] = 'active';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'elv_active_nav_class', 10, 2 );

function elv_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'elv' ),
		'id' => 'sidebar-1',
		'description' => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'ERP & Integration sidebar', 'elv' ),
		'id' => 'erp-integration',
		'description' => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Business Intelligence sidebar', 'elv' ),
		'id' => 'business-intelligence',
		'description' => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Social Enterprise sidebar', 'elv' ),
		'id' => 'social-enterprise',
		'description' => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
		
	register_sidebar( array(
		'name' => __( 'Food & Beverage sidebar', 'elv' ),
		'id' => 'food-beverage',
		'description' => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
		
	register_sidebar( array(
		'name' => __( 'Tillverkningsindustri sidebar', 'elv' ),
		'id' => 'tillverkningsindustri',
		'description' => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'elv_widgets_init' );

/**
 * Displays navigation to next/previous pages when applicable.
 *
 */
function elv_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<ul class="pager" role="navigation">
			<li class="previus"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'elv' ) ); ?></li>
			<li class="next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'elv' ) ); ?></li>
		</ul><!-- #<?php echo $nav_id; ?> .navigation -->
	<?php endif;
}

function elv_entry_meta() {
	$date = sprintf( '<a href="%1$s" title="%2$s" class="muted entry-date small" rel="bookmark"><time datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard">%3$s <a class="url fn n" href="%1$s" rel="author">%2$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author(),
		get_avatar(get_the_author_meta('ID'), 24)
	);


	printf(
		'%1$s %2$s',
		$author,
		$date
	);
}

function elv_entry_footer_meta(){
	$title_and_category = sprintf('<a href="%1$s" rel="permalink">%2$s</a> publicerades i %3$s',
		esc_url_raw(get_permalink()),
		esc_attr(get_the_title()),
		get_the_category_list(', ')
	);
	
	if ($tags = get_the_tag_list( '', ', ')){
		$tags = ' och taggades med ' . $tags;
	}
	
	printf(
		'%1$s%2$s.',
			$title_and_category,
			$tags
	);
}

function elv_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'elv' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'elv' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'elv' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'elv' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'elv' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'elv' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'elv' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}

add_filter('user_contactmethods', 'elv_user_contactmethods');
function elv_user_contactmethods($user_contactmethods){
	unset($user_contactmethods['yim']);
	unset($user_contactmethods['aim']);
	unset($user_contactmethods['jabber']);
	$user_contactmethods['title'] = __( 'Title', 'elv' );
	$user_contactmethods['twitter'] = __( 'Twitter', 'elv' );
	$user_contactmethods['facebook'] = __( 'Facebook', 'elv' );
	$user_contactmethods['linkedin'] = __( 'Linked In', 'elv' );
	$user_contactmethods['mobile'] = __( 'Mobile', 'elv' );
	$user_contactmethods['phone'] = __( 'Phone', 'elv' );
	return $user_contactmethods;
}

function elv_get_user_titles($employees){
	$titles = array();
	$title_slugs = array();
	foreach($employees AS $employee){
		$title_name = $employee->get('title');
		$title_slug = sanitize_title($title_name);
		if (!in_array($title_slug, $title_slugs)){
			$title = new stdClass();
			$title->slug = $title_slug;
			$title->name = $title_name;
			$title_slugs[] = $title_slug;
			
			$titles[] = $title;
		}
	}
	
	return $titles;				
}

function ezs_admin_init() {
	// Custom meta boxes for the edit podcast screen
	add_meta_box("ezsContactInfo", 'Call to action', "ezs_meta_contact_info", "post", "normal", "high");
	add_meta_box("ezsContactInfo", 'Call to action', "ezs_meta_contact_info", "page", "normal", "high");
}
// Admin interface init
add_action("admin_init", "ezs_admin_init");

// Admin post meta contents
function ezs_meta_contact_info() {
		global $post;
		$custom = get_post_custom($post->ID);

		$title = $custom["contact_title"][0];
		$text = $custom["contact_text"][0];
		$user_id = $custom["contact_user_id"][0];
?>
<table class="form-table">
	<tr>
		<th>Title:</th>
		<td><input class="large-text" type="text" name="contact_title" value="<?php echo $title; ?>" /></td>
	</tr>
	<tr>
		<th>Text:</th>
		<td><textarea class="large-text" name="contact_text"><?php echo $text; ?></textarea>
	</tr>
	<tr>
		<th>Contact person:</th>
		<td><?php wp_dropdown_users(array(
			'name' => 'contact_user_id',
			'selected' => $user_id,
		)); ?></td>
	</tr>
</table>
<?php }

// When a post is inserted or updated
function ezs_wp_insert_post($post_id, $post = null) {
	if (!in_array($post->post_type, array('post', 'page'))) {
		return $post_id;
	}
		$meta_fields = array(
			'contact_title',
			'contact_text',
			'contact_user_id',
		);
		
		// Loop through the POST data
		foreach ($meta_fields as $key) {
			$value = @$_POST[$key];
			if (empty($value)) {
				delete_post_meta($post_id, $key);
				continue;
			}

			// If value is a string it should be unique
			if (!is_array($value)) {
				// Update meta
				if (!update_post_meta($post_id, $key, $value)) {
					// Or add the meta data
					add_post_meta($post_id, $key, $value);
				}
			} else {
				// If passed along is an array, we should remove all previous data
				delete_post_meta($post_id, $key);

				// Loop through the array adding new values to the post meta as different entries with the same name
				foreach ($value as $entry)
					add_post_meta($post_id, $key, $entry);
			}
		}

} // end wp_insert_post
// Insert post hook
add_action("wp_insert_post", "ezs_wp_insert_post", 10, 2);

function elv_post_classes($classes){
	global $post;
	if (has_post_thumbnail($post->ID)){
		$classes[] = 'post-thumbnail';
	}
	
	return $classes;
}

add_filter('post_class', 'elv_post_classes');

function elv_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'elv_excerpt_length' );

function elv_search_excerpt( $excerpt ){
	$date = '';
	if (is_search()){
		$date = sprintf( '<p><time class="entry-date muted" datetime="%1$s">%2$s</time> – ',
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);
		
		return $date . substr($excerpt, 3);
	}
	
	return $excerpt;
}
add_filter('the_excerpt', 'elv_search_excerpt');


/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twenty Ten 1.0
 * @return string "Continue Reading" link
 */
function elv_continue_reading_link($classes = null) {
	$classes = (array) $classes;
	return ' <a href="'. get_permalink() . '" class="' . implode(', ', $classes) . '">' . __( 'Read more', 'elv' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function elv_auto_excerpt_more( $more ) {
	
	return ' &hellip;' . elv_continue_reading_link();
}
add_filter( 'excerpt_more', 'elv_auto_excerpt_more' );

function elv_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= elv_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'elv_custom_excerpt_more' );

add_filter( 'pre_get_posts', 'elv_get_posts' );
function elv_get_posts( $query ) {
	$query->set( 'ignore_sticky_posts', 1 );

	return $query;
}

/* WP bootstrap carousel */

add_filter('wp_bootstrap_carousel_extra_style', '__return_false');

function elv_pre_user_query( &$query ){
	global $wpdb;
	if ( isset( $query->query_vars['orderby'] ) && 'user_order' == $query->query_vars['orderby'] ){
		$query->query_orderby = str_replace( 'user_login', "CAST($wpdb->usermeta.meta_value AS SIGNED)", $query->query_orderby );
	}
}

add_action('pre_user_query', 'elv_pre_user_query');

function elv_member_template_redirect()
   {
      global $wp_query;

      if( array_key_exists('author_name', $wp_query->query_vars) && !empty($wp_query->query_vars['author_name']) )
      {
		 $members = get_users(array(
			 'meta_key' => 'nickname',
			 'meta_value' => $wp_query->query_vars["author_name"],
			 'number' => 1,
		 ));
         if( $members )
         {
			 $member = $members[0];
            include( TEMPLATEPATH . "/member.php" );
            exit;
         }
      }
   }

   add_action( 'template_redirect', 'elv_member_template_redirect' );
   

function elv_upload_mimes ( $existing_mimes=array() ) {
	// Allows .eps files to be uploaded
	$existing_mimes['eps'] = 'application/postscript';
	
	return $existing_mimes;
}
add_filter('upload_mimes', 'elv_upload_mimes');