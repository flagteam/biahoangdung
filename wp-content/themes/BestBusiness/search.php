<?php
global $data;
?>
<?php get_header(); ?>


<div class="container wraper">

<div class="content-spacing margin-top-bottom">

<div class="row">

<div class="col-sm-6 col-sm-push-2 content-spacing">

<div class="midd-bar">

<h1>Kết quả tìm kiếm</h1>

<?php
if(have_posts()) : ?>




<?php while(have_posts()) : the_post(); ?>
<div class="recent-post-box clearfix">
<div class="recent-post-top-menu clearfix">
	<ul>				
		<li><span><img src="<?php echo get_bloginfo('template_directory');?>/images/icon-date.png" alt="" /><?php __( 'Posted on', 'tp' );?><?php echo get_the_date(); ?></span></li>
	<li class="cat"><span><img src="<?php echo get_bloginfo('template_directory');?>/images/icon-folder.png" alt="" /><a href="#"><?php the_category(', ') ; ?></a></span></li>
<li><span><img src="<?php echo get_bloginfo('template_directory');?>/images/icon-comment.png" alt="" /><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span></li>	
		</ul>
		
		</div>
		
		
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

		
		<p class="img-<?php echo trim($data['tp_featured_loop_position']); ?>">
			<?php 
			if ( has_post_thumbnail() ) {
									
			the_post_thumbnail( 'single-page-thumbnail' );
			
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
<strong><p><?php posts_nav_link(); ?></p></strong>
<?php //paginate_links(); ?>
</div>

<?php else : ?>

					<div class="recent-post-box clearfix">
						<h2 class="pagetitle">Không tìm thấy kết quả. Hãy thử lại!</h2>
						<form method="get" id="searchform" action="<?php echo home_url() ; ?>/">
							<div class="search-box-2" style="text-align:center;">           
<div class="input-group">

<input type="text" value="<?php echo esc_html($s, 1); ?>" name="s" id="s" maxlength="33" class="form-control" />

<span class="input-group-btn">
<input type="submit" name="search" id="search" class="search-box-btn btn btn-default" value="Tìm kiếm" />

</span>

</div></div></form>

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

<div class="spacingfooter"></div>

</div>



<?php get_footer(); ?>