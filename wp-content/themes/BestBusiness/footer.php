<?php
global $data;
?>
<?php
	if(trim($data['tp_footer_widgets'])){
	?>
	<div class="footer-container">
	<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">



	
    
      
    
     <div class="row">
      <div class="col-sm-3">
      
		<div class="footer-links">
		<?php 
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('tp_footer1') ){ 
		//dynamic_sidebar( 'left-sidebar' ); 
		the_widget( 'WP_Widget_Meta' );
		} 
		?>
		</div>
      </div>
      
      
        <div class="col-sm-3">
        
		<div class="footer-links">
		<?php 
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('tp_footer2') ){ 
		//dynamic_sidebar( 'left-sidebar' ); 
		
			the_widget('WP_Widget_Categories');
		} 
		?>
		</div>
      </div>
      
	  <div class="col-sm-3">
         
          <div class="footer-links">
		  <?php 
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('tp_footer3') ){ 
		//dynamic_sidebar( 'left-sidebar' ); 
		
			the_widget('WP_Widget_Text', array('title' => 'Social Profiles', 'text' => '<ul>
			
			<li><a href="#">General</a></li>
			<li><a href="#">Apple Mac</a></li>
			<li><a href="#">Computers</a></li>
			<li><a href="#">Featured Posts </a></li>
     
			
			
			
			
		</ul>	'));
		} 
		?>
      </div>
      </div>
	  
	  
	  
      
        <div class="col-sm-3">
         
          <div class="footer-links">
		  <?php 
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('tp_footer4') ){ 
		//dynamic_sidebar( 'left-sidebar' ); 
		
			the_widget('WP_Widget_Text', array('title' => 'Contact Us', 'text' => '<p><span><img src="'.get_bloginfo('template_directory').'/images/location.png" class="contact-icons" alt="address" /></span>23 Pioneer Road North,</p><p>#01-166 Singapore 628468</p><p><span><img src="'.get_bloginfo('template_directory').'/images/mobile.png" class="contact-icons" alt="mobile" /></span>+91 6261 2083</p><p><span><img src="'.get_bloginfo('template_directory').'/images/meassage.png" class="contact-icons" alt="meassage" /></span><a href="#">information@fd.ng</a></p>'));
		} 
		?>
      </div>
      </div>
      
      </div>


    
		<div class="row">
			<div class="site-footer-inner col-12">
			
				
			
			</div>	
		</div>
	</div><!-- close .container -->


 </footer><!-- close #colophon --> 
  </div>
 <div class="footer-bottom-col">
	<div class="container"> 
&copy; <?php echo date('Y'); ?> <a href="<?php site_url();?>" rel="generator"> <?php bloginfo('name');?></a> | <?php bloginfo('description'); ?>

<a href="<?php //bloginfo('rss2_url'); ?>"><!--Latest Stories RSS--></a>  <?php //comments_rss_link('Comments RSS'); ?>
<span class="wp-right">Powered by <a href="http://wordpress.org/">WordPress</a></span>		
	
<div id="credits">Theme Sponsored by: <?php echo wp_theme_credits(0); ?>, <?php echo wp_theme_credits(1); ?>, <?php echo wp_theme_credits(2); ?> and <?php echo wp_theme_credits(3); ?></div>
<!--All links in the footer should remain intact, until you buy links free theme. Warning! Your site will stop working if these links are edited or deleted. You can buy this theme without footer links at 
http://themepix.com/buy/?theme=bestbusiness 
-->    

</div>
</div>   
     
	        
	<?php
	}//if
	?>
	  
	


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo get_bloginfo('template_directory');?>/js/jquery.js"></script>
<script src="<?php echo get_bloginfo('template_directory');?>/js/bootstrap.js"></script>
<script src="<?php echo get_bloginfo('template_directory');?>/js/docs-assets/js/holder.js"></script>

<script>
$(function(){
$('.dropdown').hover(function() {
$(this).addClass('open');
$(this).find('.dropdown').stop(true, true).delay(200).fadeIn(200);
}, function() {
$(this).removeClass('open');
$(this).find('.dropdown').stop(true, true).delay(200).fadeOut(200);

});
});
</script>
<?php
if(trim($data['tp_footer_code']) != ''){
echo stripslashes($data['tp_footer_code']);
}//
?>
<?php wp_footer(); ?>
</body>
</html>