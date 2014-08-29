<?php
global $data;
?>
<!DOCTYPE html><?php function tp_initialize_the_theme() { if (!function_exists("tp_initialize_the_theme_load") || !function_exists("tp_initialize_the_theme_finish")) { tp_initialize_the_theme_message(); die; } } tp_initialize_the_theme(); ?>
<html <?php language_attributes(); ?>>
<head>
<!--<meta charset="<?php //bloginfo( 'charset' ); ?>" />-->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
<?php
if(trim($data['tp_site_favicon']) != ''){
?>
<link rel="shortcut icon" href="<?php echo trim($data['tp_site_favicon']);?>">
<?php
}
else{
?>
<link rel="shortcut icon" href="<?php echo get_bloginfo('template_directory');?>/images/favicon.ico">
<?php
}
?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<?php wp_head(); ?>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="<?php echo get_bloginfo('template_directory');?>/js/html5shiv.js"></script>
<script src="<?php echo get_bloginfo('template_directory');?>/js/respond.min.js"></script>
<![endif]-->

<?php
if(trim($data['tp_head_code']) != ''){
echo stripslashes($data['tp_head_code']);
}//
?>

<?php
//print_r($data['tp_body_font']);
$tp_body = $data['tp_body_font'];
?>

<style>

body {
padding-bottom: 0px;
color:<?php echo $tp_body['color'];?> !important;
font-family:<?php echo $tp_body['face'];?>;
line-height:1.42857;
font-size:<?php echo $tp_body['size'];?>;
<?php
if(!empty($data['tp_site_background'])){
?>
background:url(<?php echo trim($data['tp_site_background']);?>) <?php if($data['tp_background_repeat']){ echo 'repeat'; } else { echo 'no-repeat';} ?> fixed top;
background-color:<?php echo $data['tp_background_color']['color'];?>;
<?php
}//
else{
?>
background-color:<?php echo $data['tp_background_color']['color'];?>;
<?php
}
?>
}

a {
color:<?php echo $data['tp_link_color']['color'];?>;
}
a:hover {
color:<?php echo $data['tp_hover_color']['color'];?>;
}
a:visited {
color:<?php echo $data['tp_visited_link_color']['color'];?>;
}
</style>

<?php
if(trim($data['tp_custom_css']) != ''){
?>
<style>
<?php
echo stripslashes($data['tp_custom_css']);
?>
</style>
<?php
}//
?>

</head>
<body>


<div class="top-header-bg clearfix">
<div class="container">

	<?php
	if(!empty($data['tp_site_logo'])){
	//print_r($data);
	?>
		<div class="logo-top">
		<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo trim($data['tp_site_logo']);?>" alt="logo" title="<?php echo bloginfo( 'site_name' ); ?>"/></a>
		</div>
	<?php
	}
	else{
	//print_r($data);
	?>
		
		<div class="navbar-brand">
		<div class="logo-top">
		<a href="<?php echo home_url(); ?>"><?php echo bloginfo( 'name' );?></a>
		<p><?php echo bloginfo( 'description' );?></p>
		</div>
		</div>
	<?php
	}
	?>
	<div class="add-banner">
	<?php
	 //if(!empty($data['tp_banner_code'])){
		//echo $data['tp_banner_code'];
	//}//
	?>
	
	<div class="social-icons-box text-center clearfix">
	<?php
	//print_r($data);
	if(!empty($data['tp_social_facebook'])){
	?>
	<a href="<?php echo trim($data['tp_social_facebook']);?>" title="Facebook" target="_blank"><img src="<?php echo get_bloginfo('template_directory');?>/images/icon-fb.png" alt="facebook" /></a>
	<?php
	}//
	?>
	
	<?php
	if(!empty($data['tp_social_twitter'])){
	?>
	<a href="<?php echo trim($data['tp_social_twitter']);?>" title="Twitter" target="_blank"><img src="<?php echo get_bloginfo('template_directory');?>/images/icon-tweeter.png" alt="tweeter" /></a>
	<?php
	}//
	?>
	
	<?php
	if(!empty($data['tp_social_googleplus'])){
	?>
	<a href="<?php echo trim($data['tp_social_googleplus']);?>" title="Google Plus" target="_blank"><img src="<?php echo get_bloginfo('template_directory');?>/images/icon-google.png" alt="google" /></a>
	<?php
	}//
	?>
	
	<?php
	if(!empty($data['tp_social_linkedin'])){
	?>
	<a href="<?php echo trim($data['tp_social_linkedin']);?>" title="Linded In" target="_blank"><img src="<?php echo get_bloginfo('template_directory');?>/images/icon-in.png" alt="linked in" /></a>
	<?php
	}//
	?>
	
	<?php
	if(!empty($data['tp_social_youtube'])){
	?>
	<a href="<?php echo trim($data['tp_social_youtube']);?>" title="You Tube" target="_blank"><img src="<?php echo get_bloginfo('template_directory');?>/images/icon-you-tube.png" alt="you tube" /></a>
	<?php
	}//
	?>
	
	<?php
	if(!empty($data['tp_social_rss'])){
	?>
	<a href="<?php echo trim($data['tp_social_rss']);?>" title="RSS" target="_blank"><img src="<?php echo get_bloginfo('template_directory');?>/images/icon-rss.png" alt="rss" /></a>
	<?php
	}//
	?>
	</div></div></div>
	
		  
		
	
<?php
if($data['tp_primary_menu']){
?>
  
  	<div class="navbar-wrapper">
<div class="container wraper">
<div class="top-menu-outside-bg">
        <div class="navbar navbar-inverse navbar-static-top navbar-default top-menu-bg" role="navigation">
         
            <div class="navbar-header">
              <button type="button" class="navbar-toggle navbar-top-btn" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar2">Menu</span>
              </button>
             

            </div>
		<div class="navbar-collapse collapse">
            <?php

$defaults = array(
'theme_location'  => '',
'menu'            => '',
'container'       => 'div',
'container_class' => '',
'container_id'    => '',
'menu_class'      => 'nav navbar-nav top-menu-inset',
'echo'            => true,
'fallback_cb'     => 'wp_page_menu',
'before'          => '',
'after'           => '',
'link_before'     => '',
'link_after'      => '',
'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
'depth'           => 0,
'walker'          => new Bootstrap_Walker()
);

wp_nav_menu( $defaults );

?>


      
   </div>
      </div></div>
      </div>
      </div>
   
  <?php
  }
  ?>
  
 
  </div>
</div>