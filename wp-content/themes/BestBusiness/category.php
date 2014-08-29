<?php
global $data;
?>
<?php get_header(); ?>


<div class="container wraper">

<div class="content-spacing margin-top-bottom">

<div class="row">

<div class="col-sm-6 col-sm-push-2 content-spacing">

<div class="midd-bar">

<?php
if(have_posts()) : ?>


<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category:</h1>
			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1>Archive for <?php the_time('F jS, Y'); ?>:</h1>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1>Archive for <?php the_time('F, Y'); ?>:</h1>
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1>Archive for <?php the_time('Y'); ?>:</h1>
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1>Author Archive</h1>
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1>Blog Archives</h1>
		<?php } ?>			



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