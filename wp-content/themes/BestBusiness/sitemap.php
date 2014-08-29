<?php
/**
* Template Name: Site Map
*/

get_header();
?>
<div class="container wraper">

<div class="content-spacing margin-top-bottom">

<div class="row">


<div class="col-sm-6 col-sm-push-2 content-spacing">

<div class="midd-bar">

			<div class="recent-post-box">
			    <header class="page-header1">
		<h1 class="page-title"><?php the_title(); ?></h1>

			</header>
			            <span>
			                <h2>Pages</h2>
			                <ul>
			                    <?php wp_list_pages('title_li='); ?>
			                </ul>
			            </span>
			            
			            <span>
			                <h2>Categories</h2>
			                <ul>
			                    <?php wp_list_categories('title_li='); ?>
			                </ul>
</span>			            
			            <span>
			                <h2>Archives</h2>
			                <ul>
			                    <?php wp_get_archives('type=monthly&show_post_count=0'); ?>
			                </ul>
</span>			        
			        
			            <span class="post-cat"><h2>Posts by Category</h2>
			            
			            <?php
				    
				            $cats = get_categories();
				            foreach ( $cats as $cat ) {
				    
				            query_posts( 'cat=' . $cat->cat_ID );
				
				        ?>
			    
			    			<h3><?php echo $cat->cat_name; ?></h3>
				        	<ul>	
				        	    <?php while ( have_posts() ) { the_post(); ?>
			    	    	    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			        		    <?php } wp_reset_query(); ?>
				        	</ul>
			
					    <?php } ?></span>
			            
			        
			    </div>		
	
	
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

<div class="spacingfooter"></div>


</div>



<?php get_footer(); ?>