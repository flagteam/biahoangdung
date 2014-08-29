<?php
global $data;
?>
<div class="main-right-bar clearfix">
<div class="text-center">

</div>

<?php 
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('tp_right_sidebar') ){ 

//dynamic_sidebar( 'left-sidebar' ); 

?>

<?php

the_widget( 'WP_Widget_Search','','before_widget=<div class="side-links widget_search">&after_widget=</div></div>&before_title=<h3>Search&after_title=</h3><div class="side-links-blcok">' );

the_widget( 'WP_Widget_Categories','','before_widget=<div class="side-links">&after_widget=</div></div>&before_title=<h3>&after_title=</h3><div class="side-links-blcok">' );

the_widget( 'WP_Widget_Pages','','before_widget=<div class="side-links">&after_widget=</div></div>&before_title=<h3>&after_title=</h3><div class="side-links-blcok">');

the_widget( 'WP_Widget_Archives','','before_widget=<div class="side-links">&after_widget=</div></div>&before_title=<h3>&after_title=</h3><div class="side-links-blcok">' );

the_widget( 'WP_Widget_Meta','','before_widget=<div class="side-links">&after_widget=</div></div>&before_title=<h3>&after_title=</h3><div class="side-links-blcok">' );

the_widget('WP_Widget_Text', array('title' => 'Widgets Ready', 'text' => '<p>On Sidebar(s) you will find default Wordpress widgets, just add your own Widgets and they will go away.</p>'), 'before_widget=<div class="side-links">&after_widget=</div></div>&before_title=<h3>&after_title=</h3><div class="side-links-blcok">');

} 
?>

</div>