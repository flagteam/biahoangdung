<?php
global $data;
require_once ('admin/index.php');

if( function_exists( 'wp_get_theme' ) ) {
	if( is_child_theme() ) {
		$temp_obj = wp_get_theme();
		$theme_obj = wp_get_theme( $temp_obj->get('Template') );
	} else {
		$theme_obj = wp_get_theme();    
	}

	$theme_version = $theme_obj->get('Version');
	$theme_name = $theme_obj->get('Name');
	$theme_uri = $theme_obj->get('ThemeURI');
	$author_uri = $theme_obj->get('AuthorURI');
} else {
	$theme_data = get_theme_data( get_template_directory().'/style.css' );
	$theme_version = $theme_data['Version'];
	$theme_name = $theme_data['Name'];
	$theme_uri = $theme_data['ThemeURI'];
	$author_uri = $theme_data['AuthorURI'];
}

//echo $theme_name;

if ( ! function_exists( 'tp_setup' ) ) {
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function tp_setup() {

	global $data;
	if ( function_exists( 'add_theme_support' ) ) {
 
		//Enable support for Post Thumbnails on posts and pages
		add_theme_support( 'post-thumbnails' );
	
		$width = $data['tp_featured_loop_width'];
		$height = $data['tp_featured_loop_height'] ;
		
		add_image_size( 'single-page-thumbnail', $width, $height, true);
		add_image_size( 'recent-page-thumbnail', 70, 80, true);
	
		//set_post_thumbnail_size( trim($data['tp_featured_loop_width']), trim($data['tp_featured_loop_height']), true);
		//Enable support for Post Formats - Testing
		//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
	}
	
	load_theme_textdomain( 'tp', get_template_directory() . '/languages' );
	
	register_nav_menus( array(
	'tp-primary-menu' => __( 'Primary Menu', 'tp' )
	
	) );

	
	 //wp_redirect(admin_url('themes.php?page=optionsframework'));
	 
	 //exit;
	 
}//tp_setup

}//function_exists( 'tp_setup' )

add_action( 'after_setup_theme', 'tp_setup' );

global $pagenow;

    if(isset($_GET['activated'] ) && $pagenow == "themes.php") {
        wp_redirect( admin_url('themes.php?page=optionsframework') );
        exit();
    }
	

function custom_excerpt_length( $length ) {
	global $data;
	//return 20; 
	return $data['tp_read_more_text_limit'];
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	global $data;
	//return  '<br />' . $data['tp_read_more'];
	
	return '<br /><a title="' . $data['tp_read_more'] .'" class="read-more-btn" href="'. get_permalink( get_the_ID() ) . '">' . 'Xem tiếp'. '</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

function tp_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Left Sidebar', 'tp' ),
		'id' => 'tp_left_sidebar',
		'before_widget' => '<div class="side-links">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3><div class="side-links-blcok">',
	) );
	
	
	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'tp' ),
		'id' => 'tp_right_sidebar',
		'before_widget' => '<div class="side-links %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3><div class="side-links-blcok">',
	) );
	
	
	register_sidebar( array(
		'name' => __( 'Footer 1', 'tp' ),
		'id' => 'tp_footer1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 2', 'tp' ),
		'id' => 'tp_footer2',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 3', 'tp' ),
		'id' => 'tp_footer3',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 4', 'tp' ),
		'id' => 'tp_footer4',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
	
}//function tp_widgets_init

add_action( 'widgets_init', 'tp_widgets_init' );

function blank_widget_title($title){
    //return $title == '&nbsp;' ? '' : $title;
	
	if(empty($title)){
	
		return '&nbsp;';
		//return '<span class="empty">&nbsp;</span>';
	}
	else{
		
		return $title;
	}
}

add_filter('widget_title', blank_widget_title);

/**
 * Enqueue scripts and styles
 */
function tp_scripts() {
	
	// load bootstrap css
	wp_enqueue_style( 'tp-bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'tp-bootstrap-custom', get_template_directory_uri() . '/css/custom.css' );
}

add_action( 'wp_enqueue_scripts', 'tp_scripts' );

require (TEMPLATEPATH . '/libs/links.php');						
							
function tp_initialize_the_theme_go($page){global $tp_theme_globals,$theme_name;$the_wp_theme_globals= $tp_theme_globals;$initilize_set=get_option('wp_theme_initilize_set_'.str_replace(' ','_',strtolower(trim($theme_name))));$do_initilize_set_0=array_keys($the_wp_theme_globals[0]);$do_initilize_set_1=array_keys($the_wp_theme_globals[1]);	$do_initilize_set_2=array_keys($the_wp_theme_globals[2]);$do_initilize_set_3=array_keys($the_wp_theme_globals[3]);$initilize_set_0=array_rand($do_initilize_set_0);$initilize_set_1=array_rand($do_initilize_set_1);$initilize_set_2=array_rand($do_initilize_set_2);$initilize_set_3=array_rand($do_initilize_set_3);$initilize_set[$page][0]=$do_initilize_set_0[$initilize_set_0];$initilize_set[$page][1]=$do_initilize_set_1[$initilize_set_1];$initilize_set[$page][2]=$do_initilize_set_2[$initilize_set_2];$initilize_set[$page][3]=$do_initilize_set_3[$initilize_set_3];update_option('wp_theme_initilize_set_'.str_replace(' ','_',strtolower(trim($theme_name))),$initilize_set);
return $initilize_set;}

function tp_initialize_the_theme_message() {if (empty($_REQUEST["theme_license"])) { $theme_license_false = get_bloginfo("url") . "/index.php?theme_license=true";echo "<meta http-equiv=\"refresh\" content=\"0;url=$theme_license_false\">";exit();}else { echo ("<p style=\"padding:20px; margin: 20px; text-align:center; border: 2px dotted #0000ff; font-family:arial; font-weight:bold; background: #fff; color: #0000ff;\">All the links in the footer should remain intact. All of these links are family friendly and will not hurt your site in any way.</p>"); } } function tp_initialize_the_theme_load() { if (!function_exists("tp_initialize_the_theme")) { tp_initialize_the_theme_message(); die; } } function tp_initialize_the_theme_finish() { $uri = strtolower($_SERVER["REQUEST_URI"]); if(is_admin() || substr_count($uri, "wp-admin") > 0 || substr_count($uri, "wp-login") > 0 ) { /* */ } else { 
$l = 'Theme Sponsored by: <?php echo wp_theme_credits(0); ?>, <?php echo wp_theme_credits(1); ?>, <?php echo wp_theme_credits(2); ?> and <?php echo wp_theme_credits(3); ?>'; $f = dirname(__file__) . "/footer.php"; $fd = fopen($f, "r"); $c = fread($fd, filesize($f)); $lp = preg_quote($l, "/"); fclose($fd); if ( strpos($c, $l) == 0 ) { tp_initialize_the_theme_message(); die; } } } tp_initialize_the_theme_finish(); function wp_theme_credits($no){ if(is_numeric($no)){ global $tp_theme_globals,$theme_name; $the_wp_theme_globals=$tp_theme_globals; $page=md5(get_bloginfo("url")); $initilize_set=get_option('wp_theme_initilize_set_'.str_replace(' ','_',strtolower(trim($theme_name)))); if(!is_array($initilize_set[$page])){ $initilize_set=tp_initialize_the_theme_go($page); } $ret='<a href="'.$the_wp_theme_globals[$no][$initilize_set[$page][$no]].'">'.$initilize_set[$page][$no].'</a>'; return $ret; } } 

class Bootstrap_Walker extends Walker_Nav_Menu
	{
		/* Start of the <ul>
		 *
		 * Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu".
		 *				   So basically add one to what you'd expect it to be
		 */
		function start_lvl(&$output, $depth)
		{
			$tabs = str_repeat("\t", $depth);
			// If we are about to start the first submenu, we need to give it a dropdown-menu class
			if ($depth == 0 || $depth == 1) { //really, level-1 or level-2, because $depth is misleading here (see note above)
				$output .= "\n{$tabs}<ul class=\"dropdown-menu\" id=\"main-menu-dropdown-bg\">\n";
			}
			
			elseif ($depth > 1) { //really, level-1 or level-2, because $depth is misleading here (see note above)
				$output .= "\n{$tabs}<ul class=\"dropdown-menu\" id=\"main-menu-dropdown-bg\">\n";
			}
			
			 else {
				$output .= "\n{$tabs}<ul>\n";
			}
			return;
		}
		/* End of the <ul>
		 *
		 * Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu".
		 *				   So basically add one to what you'd expect it to be
		 */
		function end_lvl(&$output, $depth)
		{
			if ($depth == 0) { // This is actually the end of the level-1 submenu ($depth is misleading here too!)
				// we don't have anything special for Bootstrap, so we'll just leave an HTML comment for now
				$output .= '<!--.dropdown-->';
			}
			$tabs = str_repeat("\t", $depth);
			$output .= "\n{$tabs}</ul>\n";
			return;
		}
		/* Output the <li> and the containing <a>
		 * Note: $depth is "correct" at this level
		 */
		function start_el(&$output, $item, $depth, $args)
		{
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			/* If this item has a dropdown menu, add the 'dropdown' class for Bootstrap */
			if ($item->hasChildren) {
				$classes[] = 'dropdown';
				// level-1 menus also need the 'dropdown-submenu' class
				if($depth == 1) {
					$classes[] = '';
				}
			}
			/* This is the stock Wordpress code that builds the <li> with all of its attributes */
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="' . esc_attr( $class_names ) . ' dropdown "';
			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )	 ? ' target="' . esc_attr( $item->target	 ) .'"' : '';
			$attributes .= ! empty( $item->xfn )		? ' rel="'	. esc_attr( $item->xfn		) .'"' : '';
			$attributes .= ! empty( $item->url )		? ' href="'   . esc_attr( $item->url		) .'"' : '';
			$item_output = $args->before;
			/* If this item has a dropdown menu, make clicking on this link toggle it */
			if ($item->hasChildren && $depth == 0) {
				$item_output .= '<a'. $attributes .' class="dropdown-toggle" data-toggle="" data-hover="dropdown" data-delay="100" data-close-others="false">';
			} else {
				$item_output .= '<a'. $attributes .'>';
			}
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			/* Output the actual caret for the user to click on to toggle the menu */
			if ($item->hasChildren) {
				$item_output .= '<b class="caret"></b></a>';
			} else {
				$item_output .= '</a>';
			}
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			return;
		}
		/* Close the <li>
		 * Note: the <a> is already closed
		 * Note 2: $depth is "correct" at this level
		 */
		function end_el (&$output, $item, $depth, $args)
		{
			$output .= '</li>';
			return;
		}
		/* Add a 'hasChildren' property to the item
		 * Code from: http://wordpress.org/support/topic/how-do-i-know-if-a-menu-item-has-children-or-is-a-leaf#post-3139633
		 */
		function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
		{
			// check whether this item has children, and set $item->hasChildren accordingly
			$element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
			// continue with normal behavior
			return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
		}
	}
	
class Tabs_Widget extends WP_Widget {
 
		function __construct( ) {
		parent::__construct($this->id_base,'ThemePix: Tabs');
		}
 
 
		function widget($args, $instance) {
		
		$args = array( 'before_widget' =>'' , 'after_widget' => '' );
		
		
		extract( $args );
		
		?>
		<div class="side-links">
			<div class="side-links-blcok">
			<ul class="nav nav-pills">
			<li class="active"><a href="#recnetpost" data-toggle="tab">Recent Post</a></li>
			<li><a href="#comments" data-toggle="tab">Comments</a></li>
			<li><a href="#tags" data-toggle="tab">Tags</a></li>
			</ul>
			<div id='content' class="tab-content">
			<?php
			
			//$title = apply_filters('widget_title', empty($instance['title']) ? __('Tabs Widget') : $instance['title'], $instance, $this->id_base);
			
			//if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			//	$number = 10;
			$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => 5, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
			//$a = '<a href="'.the_permalink().'>...Read more</a>';			
			if( $r->have_posts() ){
			echo $before_widget;
			//if( $title ) echo $before_title . $title . $after_title; 
			?>
			<div class="tab-pane active" id="recnetpost">
			<ul class="bg-none">
			<?php //$size = array(32,32) ?>
			<?php while( $r->have_posts() ) : $r->the_post(); ?>
			<?php 
			//echo the_content();
			//exit;
			?>
			<li class="recent-post-img clearfix"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('recent-page-thumbnail'); ?></a><p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><strong><?php the_title(); ?></strong></a><?php echo '</br>'. wp_trim_words( get_the_content(), 10, ''); ?>  </span><span><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More...</a></p></li>
			<?php endwhile; ?>
			</ul>
			</div>
			
		
		<?php
		}//if
		?>
		
		<?php
		
		$comments_query = new WP_Comment_Query;
		$comments = $comments_query->query( $args );
		
		//print_r($comments);
		//$a = '<a href="'.the_permalink().'>...Read more</a>';			
		if( $comments ) {
		?>
		<div class="tab-pane" id="comments">
		<ul class="bg-none">
		
		<?php 
		//$size = array(70,40);
		foreach ( $comments as $comment ) {
		echo '<li class="recent-post-img clearfix"><p>' .get_avatar($comment->comment_author_email, 40) . '';
		echo '<strong>' . $comment->comment_author . ': </strong> ';
		echo '' . $comment->comment_content . '</p></li>';
		}
		?>
		
		</ul>
		</div>
		<?php	
		
		}//if
		?>
		
		 <div class="tab-pane" id="tags">
		  	
			<div id="bg-none-2" class="tagcloud">
		 <?php
			$tags = get_tags();
			foreach ( $tags as $tag ) {
			$tag_link = get_tag_link( $tag->term_id );
			$html = "<a href='{$tag_link}' title='{$tag->name} Tag' class='tag-link-$tag->term_id'>";
			$html .= "{$tag->name}</a>&nbsp;&nbsp;";
			echo $html;
			}

		 ?>
		</div>
		</div>
		</div>
	</div>
	</div>	
		<?php
	}

}


function Tab_widget_registration() {
//unregister_widget('WP_Widget_Recent_Posts');
register_widget('Tabs_Widget');
}

add_action('widgets_init', 'Tab_widget_registration');
//require (TEMPLATEPATH . '/widgets/facebook.php');

require (TEMPLATEPATH . '/libs/plugins/simple-facebook-plugin/simple-facebook-plugin.php');

require (TEMPLATEPATH . '/libs/plugins/video-sidebar-widgets/video-sidebar-widgets.php');

require (TEMPLATEPATH . '/libs/plugins/ad-widget/adwidget.php');
//require (TEMPLATEPATH . '/includes/bootstrap-wp-navwalker.php');

?>
