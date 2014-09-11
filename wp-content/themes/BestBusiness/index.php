<?php

global $data;
?>
<?php get_header(); ?>


<div class="container wraper">

<?php
if($data['tp_primary_slider'] && is_home() && !is_paged()){
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
	
	
	  
	  <?php
	  
 	 $slides = $data['tp_slider'];
	 
	 //echo 'here';
	 
	 //print_r($slides[1]['url']);
	 
	 if(count($slides) == 1 && isset($slides[1]['url']) && $slides[1]['url'] != ''){
	 
	 ?>
	 
	 <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
	 <?php
	 	
		echo '<div class="carousel-inner">';
		
			echo '<div class="item active">';
			if(trim($slides[1]['link']) != ''){
				echo '<a href="' . $slides[1]['link'] . '" title="' . $slides[1]['title']. '">';	
			}//if
				echo '<img  src="' . $slides[1]['url'] . '" alt="' . $slides[1]['title'] . '">';
			if(trim($slides[1]['link']) != ''){
				echo '</a>';
			}//if
			
			if(trim($slides[1]['description']) != ''){
    			echo '<div class="carousel-caption">';
		    	echo '<p>'.$slides[1]['description'].'</p>';
				echo '</div>';
			}//if
			
			echo '</div>';
			
			echo '<div class="item">';
			
			if(trim($slides[1]['link']) != ''){
				echo '<a href="' . $slides[1]['link'] . '" title="' . $slides[1]['title']. '">';	
			}//if
				echo '<img  src="' . $slides[1]['url'] . '" alt="' . $slides[1]['title'] . '">';
			if(trim($slides[1]['link']) != ''){
				echo '</a>';
			}//if
			
				if(trim($slides[1]['description']) != ''){
    			echo '<div class="carousel-caption">';
		    	echo '<p>'.$slides[1]['description'].'</p>';
				echo '</div>';
				}//if
			
			echo '</div>';
			//Testing
		echo '</div>';	
			
				
				
	 }
	 elseif(count($slides) > 1){
	 
	 	echo '<ol class="carousel-indicators">';
		$j = 0;			
	 	 foreach($slides as $slide) {
		 
		 	
			echo '<li data-target="#myCarousel" data-slide-to="' . $j .'" ' . (trim($slide['order']) == 1 ? 'class="active"' :  '') .'></li>';
			
      
		 $j++;
		 }//foreach
	 	echo '</ol>';
	 		
	 		echo '<div class="carousel-inner">';
			
	 	 foreach($slides as $slide) {
		 
		
		
			echo '<div class="item' . (trim($slide['order']) == 1 ? ' active' :  '') .'">';
			if(trim($slide['link']) != ''){
				echo '<a href="' . $slide['link'] . '" title="' . $slide['title']. '">';	
			}//if
				echo '<img  src="' . $slide['url'] . '" alt="' . $slide['title'] . '">';
			if(trim($slide['link']) != ''){
				echo '</a>';
			}//if
			
			//Testing
			if(trim($slide['description']) != ''){
				echo '<div class="carousel-caption">';
				echo '<p>'.$slide['description'].'</p>';
				echo '</div>';
			}//if
			
			echo '</div>';
		}//foreach

		echo '</div>';
		
	 }//if
	 else{
	  ?>
	   <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
	 <div class="carousel-inner">
	 
        <div class="item active">
			<a href="http://themepix.com/" title="ThemePix.com">
			<img  src="<?php echo get_bloginfo('template_directory');?>/images/slide1.jpg" alt="First slide" />
			</a>
			  <div class="carousel-caption">
			  <p>You can easy customize the featured slides from theme options page.</p>
			  </div>
        </div>
		
        <div class="item">
					<a href="http://themepix.com/" title="ThemePix.com">
		          <img  src="<?php echo get_bloginfo('template_directory');?>/images/slide2.jpg" alt="Second slide" />
				  </a>
		          <div class="carousel-caption">
           			<p>You can show as many featured slides as you like via options page.</p>
         		 </div>
        </div>
		<div class="item">
			<a href="http://themepix.com/" title="ThemePix.com">
          <img  src="<?php echo get_bloginfo('template_directory');?>/images/slide3.jpg" alt="Third slide" />
		  	</a>
          <div class="carousel-caption">
           <p>All the featured slides can be sorted just with drag and drop.</p>
          </div>
        </div>
     </div>   
	<?php
	}//if if(count($slides) > 0)
	?>	
      
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"><img  src="<?php echo get_bloginfo('template_directory');?>/images/previous-arrow.png" alt="First slide"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"><img  src="<?php echo get_bloginfo('template_directory');?>/images/next-arrow.png" alt="Next"></span></a>
    </div>
	
<?php
}//if($data['tp_primary_menu'])
?>

<div class="content-spacing margin-top-bottom">

<div class="row">


<div class="col-sm-6 col-sm-push-2 content-spacing">

<div class="midd-bar">

<?php if (have_posts()) : ?>	
<?php while(have_posts()) : the_post(); ?>
<div class="recent-post-box clearfix">
<div class="recent-post-top-menu clearfix">
	<ul>				
		<li><span><img src="<?php echo get_bloginfo('template_directory');?>/images/icon-date.png" alt="" /><?php __( 'Posted on', 'tp' );?><?php echo get_the_date(); ?></span></li>
	<li class="cat"><span><img src="<?php echo get_bloginfo('template_directory');?>/images/icon-folder.png" alt="" /><?php the_category(', '); ?></span></li>
<li><span><img src="<?php echo get_bloginfo('template_directory');?>/images/icon-comment.png" alt="" /><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span></li>	
		</ul>
		
		</div>
		
		
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

		
		<p class="img-<?php echo trim($data['tp_featured_loop_position']); ?>">
			<?php 
			if ( has_post_thumbnail() ) {
			
			the_post_thumbnail( 'thumbnail' );
			
			?>
			</p>
			<?php
			}//
			?>
			<?php the_excerpt(); ?>
			
			<hr/>
	</div>
	
	
	
<?php endwhile; ?>

<div class="navigation">
<p><?php posts_nav_link(); ?></p>
<?php //paginate_links(); ?>
</div>

<?php endif; ?>		
		
	
	
	</div><!-- close .main-content-inner -->
	</div>

<div class="col-sm-2 col-sm-pull-6 content-spacing">
	<?php
	get_sidebar('left');
	?>
	</div>



	
	

	<div class="col-sm-4 content-spacing">	
	<?php get_sidebar('right'); ?>
	</div>
        <!-- close .sidebar-padder -->
</div>



</div>



</div>
<?php get_footer(); ?>

