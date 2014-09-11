<div class="main-left-bar clearfix">
<?php
if(is_category( $category )){
	$this_cat = get_query_var('cat');
	$args = array(
	'type'                     => 'post',
	'child_of'                 => $this_cat,
	'parent'                   => '',
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 0,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'category',
	'pad_counts'               => false 
); 
	$categories = get_categories( $args );
	?>
	<div class="side-links">
		<h3><?php echo single_cat_title( '', true ); ?></h3>
		<div class="side-links-blcok">		
			<ul>
				<?php
				foreach ($categories as $cat) {
					?>
					<li class="cat-item cat-item-1"><a href="http://biasaigonhanoi.vn/?cat=<?php echo $cat->term_id; ?>" title="<?php echo $cat->name ?>"><?php echo $cat->name ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	
<?php }else if (is_page()){  
$args = array(
	'sort_order' => 'ASC',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'exclude' => '',
	'include' => '',
	'meta_key' => '',
	'meta_value' => '',
	'authors' => '',
	'child_of' => get_the_ID(),
	'parent' => -1,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
); 
$pages = get_pages($args); 
?>
<div class="side-links">
		<h3><?php echo get_post(get_the_ID())->post_title; ?></h3>
		<div class="side-links-blcok">		
			<ul>
				<?php
				foreach ($pages as $page) {
					?>
					<li class="cat-item cat-item-1"><a href="http://biasaigonhanoi.vn/?page_id=<?php echo $page->ID; ?>" title="<?php echo $page->post_title ?>"><?php echo $page->post_title ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
<?php } else{
	?>
<div class="side-links">
		<h3>Đồ uống</h3>
		<div class="side-links-blcok">		
			<ul>
				<li class="cat-item cat-item-1"><a href="http://biasaigonhanoi.vn/?cat=3" title="Bia">Bia</a></li>
				<li class="cat-item cat-item-1"><a href="http://biasaigonhanoi.vn/?cat=4" title="Rượu">Rượu</a></li>
				<li class="cat-item cat-item-1"><a href="http://biasaigonhanoi.vn/?cat=5" title="Nước giải khát">Nước giải khát</a></li>
			</ul>
		</div>
	</div>
<?php 
} ?>

<?php 
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('tp_left_sidebar') ){ 
?>

<?php

the_widget( 'WP_Widget_Archives','','before_widget=<div class="side-links">&after_widget=</div></div>&before_title=<h3>&after_title=</h3><div class="side-links-blcok">' );

the_widget( 'WP_Widget_Meta','','before_widget=<div class="side-links">&after_widget=</div></div>&before_title=<h3>&after_title=</h3><div class="side-links-blcok">' );

//the_widget( 'WP_Widget_Calendar', $instance, $args );

the_widget( 'WP_Widget_Categories', '', 'before_widget=<div class="side-links">&after_widget=</div></div>&before_title=<h3>&after_title=</h3><div class="side-links-blcok">' );

}
?>

</div>
    
     
    
    
    
   

