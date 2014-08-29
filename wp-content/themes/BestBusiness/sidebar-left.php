<div class="main-left-bar clearfix">
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
    
     
    
    
    
   

