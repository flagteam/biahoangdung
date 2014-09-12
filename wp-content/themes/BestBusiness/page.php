<?php
global $data;
get_header(); 
?>
<div class="container wraper">
<div class="content-spacing margin-top-bottom">
<div class="row">

<div class="col-sm-6 col-sm-push-2 content-spacing">

<div class="midd-bar">
<?php
if(have_posts()) : ?>

<?php while(have_posts()) : the_post(); ?>
<div class="recent-post-box clearfix">
<div class="recent-post-top-menu clearfix">
	<ul>				
		<li><span><img src="<?php echo get_bloginfo('template_directory');?>/images/icon-date.png" alt="" /><?php __( 'Posted on', 'tp' );?><?php echo get_the_date(); ?></span></li>
	
<!--<li><span><img src="--><?php //echo get_bloginfo('template_directory');?><!--/images/icon-comment.png" alt="" />--><?php //comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><!--</span></li>	-->
		</ul>
		
		</div>
		
		
		<h1><?php the_title(); ?></h1>

		<p class="img-<?php echo trim($data['tp_featured_loop_position']); ?>">
			<?php 
			if ( has_post_thumbnail() ) {
									
			the_post_thumbnail( 'single-page-thumbnail' );
			
			?>
			</p>
			<?php
			}//
			?>
			<?php the_content(); ?>
			
			<hr/>
	</div>
	
<?php endwhile; ?>
<div class="navigation">
<strong><p><?php posts_nav_link(); ?></p></strong>
<?php //paginate_links(); ?>
</div>
<footer class="entry-meta recent-post-box">			
<!--<h2>What do you think?</h2>-->
<?php comments_template(); ?>		
</footer>
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
<div class="spacingfooter"></div>
</div>
</div>

<?php get_footer(); ?>