<?php
add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		$of_options_featured_img 	= array("left" => "Left","right" => "Right","center" => "Center");
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 
		$logo_img = '<img src="'.get_template_directory_uri().'/images/logo.png" border="0">';
		
	//	$social_guide = array( 'name' => 'facebook', 'des' => 'fdsfdfdsffsfdfs');
/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( 	"name" 		=> "Theme Guide",
						"type" 		=> "heading",
					);							

$of_options[] = array( 	"name" 		=> "Theme Guide & Help",
						"type" 		=> "tab",
						"desc" 		=> "This is a theme guide of the " . THEMENAME . " theme."
				);
				
			$of_options[] = array( 	"name" 		=> "Logo and Background Image",
									"type" 		=> "tab",
									"desc" 		=> "" . THEMENAME . " theme give you the option to change the logo and background. Go to General Settigns to remove or upload your logo and background."
							);
							
	$of_options[] = array( 	"name" 		=> "Font, Color of Text and Links",
							"type" 		=> "tab",
							"desc" 		=> "You can change the color and font of text and links in your website. This is simple, just go to General Settings in theme options."
					);						
											
$of_options[] = array( 	"name" 		=> "Menus Support",
						"type" 		=> "tab",
						"desc" 		=> "" . THEMENAME . " theme supports custom menus you to change what appears in the main menu bar using a simple drag-and-drop options screen. You can access this page by clicking  Appearance / Menus.<br />
Creating a custom menu is very simple. These 5 short steps will show you how:<br /><br /> <ol style='padding-left: 25px;'>
                    <li>First create a new menu at the top of the page and define a name.</li>
                    <li>You can now see on left your pages and categories that you have on WordPress. Select the View All link to bring up a list of all the currently published Pages on your site. You can select which links you want to add to your menu by selecting the box next to it and then clicking  Add to Menu button located at the bottom of this pane to add your selection(s). <br /><em>(Tip: Want to add individual posts or tags to the menu too? Click the screen options button at the very top right of your screen. You'll see the option to select posts and tags appear.)</em></li>
                    <li>Once added, you can now arrange your links in the order you choose. Drag-and-drop your links up and down to change their order.</li>
                    <li>" . THEMENAME . " support drop-down menus and allows you to create multi-level menus using a simple 'drag and drop' interface. Drag menu items up or down to change their order of appearance in the menu. Drag menu items left or right in order to create sub-levels within your menu.</li>
                     <li>Now, go to Menus tab in theme options and make sure to check the box in way to enable the menu on your website.</li>
                </ol> "
				);
				
$of_options[] = array( 	"name" 		=> "Manage the Slider",
						"type" 		=> "tab",
						"desc" 		=> "The slideshow is very easy to use. You can access the options for the slideshow in the theme options under the Slider tab. You can put images, text and links for slide show and can arrage slides just doing drage and drop. Make sure to check it to show in homepage"
				);
				
$of_options[] = array( 	"name" 		=> "Customise the Sidebars and Footer (Widget Areas)",
						"type" 		=> "tab",
						"desc" 		=> "" . THEMENAME . " theme lets you choose what you want to put in your sidebar also in footer area. Each item in a sidebar is called a widget. The theme puts its own widgets in the sidebars by default so that it doesn't look too empty when you first get it, but when you add your own widgets to the sidebar the default ones will be removed. You can set your own widgets by going to the Appearance / Widgets. To add your own widgets just drag and drop the widgets (shown in the middle of the screen) to the sidebars (shown on the right of the screen)."
				);
$of_options[] = array( 	"name" 		=> "Custom Widgets",
						"type" 		=> "tab",
						"desc" 		=> "" . THEMENAME . " theme comes with many widgets: <ol style='padding-left: 25px; padding-top: 10px;'><li>Ads HTML/Script and image support</li><li>Featured Video</li> <li>Facebook widgets</li></ol> Just go to Appearance / Widgets and add those in sidebar or footer."
				
				);					

$of_options[] = array( 	"name" 		=> "Page Templates",
						"type" 		=> "tab",
						"desc" 		=> "With our themes, you can choose to display different page templates. You can select page template on page editing screen, look for page attributes with the template drop-down box inside. Most wanted page template is full width template page which removes the sidebar(s) from your theme and lets you put wider content in your website! The other page template is the sitemap, which lists all the categories and pages in your site."
				
				);
				
$of_options[] = array( 	"name" 		=> "Social Options",
						"type" 		=> "tab",
						"desc" 		=> "" . THEMENAME . " theme comes with assigned location of social buttons. To enable the social icons, go to Social Option and put in the box the URL of your social profile, to link the icon to your profile. Leave it blank if you dont like the icon to be displayed"
				
				);				
				
$of_options[] = array( 	"name" 		=> "Conclusion",
						"type" 		=> "tab",
						"desc" 		=> "That's it! We hope you enjoy creating your new website. Remember that if you need any more help you can come visit us in the support forum. Thank you!"
				);
$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading",
				);
				
$of_options[] = array( 	"name" 		=> "Upload Logo",
						"desc" 		=> "Your uploaded logo will be shown here.</br> 
						<div class=\"explain-text\">If you dont have a logo to upload, then your your blog title and description will be shown. To edit your blog title and description go to <a href=\"" . admin_url('options-general.php') . "\">General Settings</a></div>",
						"id" 		=> "tp_site_logo",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> get_template_directory_uri() . '/images/logo.png',
						"mod"		=> "min",
						"type" 		=> "media"
				);
				
/*$of_options[] = array( 	"name" 		=> "No Logo? Use Site Name",
						"desc" 		=> "Check if you dont want to show the logo.</br> 
						<div class=\"explain-text\">If you dont have a logo to upload, then your your blog title and description will be shown. To edit your blog title and description go to <a href=\"" . admin_url('options-general.php') . "\">General Settings</a></div>",
						"id" 		=> "tp_logo_as_sitename",
						"std" 		=> 0,
						"type" 		=> "checkbox"
						
				);*/	
				
				$of_options[] = array( 	"name" 		=> "Background",
										"desc" 		=> "Your background will be shown here.",
										"id" 		=> "tp_site_background",
										// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
										"std" 		=> get_template_directory_uri() . '/images/html-bg.jpg',
										"mod"		=> "min",
										"type" 		=> "media"
								);				
				$of_options[] = array( 	"name" 		=> "",
										"desc" 		=> "Check if you want to repeat the image of background.",
										"id" 		=> "tp_background_repeat",
										"std" 		=> 0,
										"type" 		=> "checkbox"
								);				
								
								
				$of_options[] = array( 	"name" 		=> "",
										"desc" 		=> "Specify background color here.",
										"id" 		=> "tp_background_color",
										"std" 		=> array('color' => '#ffe1e1'),
										"type" 		=> "typography"
								);						
					
$of_options[] = array( 	"name" 		=> "Body Font and Link Color",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "tp_body_font",
						"std" 		=> array('size' => '12px','face' => '"Helvetica Neue",Helvetica,Arial,sans-serif','color' => '#333333'),
						"type" 		=> "typography"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Specify link color here.",
						"id" 		=> "tp_link_color",
						"std" 		=> array('color' => '#000000'),
						"type" 		=> "typography"
				);
								
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Specify hover color here.",
						"id" 		=> "tp_hover_color",
						"std" 		=> array('color' => '#e95d70'),
						"type" 		=> "typography"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Specify visited link color here.",
						"id" 		=> "tp_visited_link_color",
						"std" 		=> array('color' => '#e95d70'),
						"type" 		=> "typography"
				);
/*								
$of_options[] = array( 	"name" 		=> "Favicon Icon",
						"desc" 		=> "Your uploaded favicon icon will be shown here.<br /><div class=\"explain-text\">If you don't upload a favicon, wordpress default favicon will be shown.</div>",
						"id" 		=> "tp_site_favicon",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"mod"		=> "min",
						"type" 		=> "media"
				);								
	*/							
$of_options[] = array( 	"name" 		=> "Layout",
						"type" 		=> "heading",
						);
				
$url =  ADMIN_DIR . 'assets/images/';

$of_options[] = array( 	"name" 		=> "Featured Image Options: Size and Position",
						"type" 		=> "tav",
						"desc" 		=> "<div class=\"explain-text\">Options for the featured images in the loop (homepage, category pages, tag pages, search results and archive pages).</div>",
						"id" 		=> "tp_featured_image",
						
				);
								
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Set the Height(px) of image in the homepage.",
						"id" 		=> "tp_featured_loop_height",
						"std" 		=> "500",
						"min" 		=> "1",
						"step"		=> "3",
						"max" 		=> "750",
						"type" 		=> "sliderui" 
				);	
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Set the Width(px) of image in the homepage.",
						"id" 		=> "tp_featured_loop_width",
						"std" 		=> "300",
						"min" 		=> "1",
						"step"		=> "3",
						"max" 		=> "750",
						"type" 		=> "sliderui" 
				);	

$of_options[] = array( 	"name" 		=> "",
						//"desc" 		=> "Radio select with default of 'one'.",
						"desc" 		=> "Set the Image Position in the homepage.",
						"id" 		=> "tp_featured_loop_position",
						"std" 		=> "left",
						"type" 		=> "radio",
						"options" 	=> $of_options_featured_img
				);
$of_options[] = array( 	"name" 		=> 'Read More: Text Display and Words Limit' ,
					//	"desc" 		=> "Add your Feedburner URL, or any other RSS link. Leave it blank if you dont like the RSS icon to be displayed.",
						"desc" 		=> "Read more text will be showen by default. <br />
						<div class=\"explain-text\">Theme display post excerpts on the front or home page, you visitors will click on the title or a Read More link to continue reading your post or article</div>",
						"id" 		=> "tp_read_more",
						"std" 		=> "Read More",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> '',
						"desc" 		=> "Set how many words you want display in post excerpts.",
						"id" 		=> "tp_read_more_text_limit",
						"std" 		=> "100",
						"min" 		=> "1",
						"step"		=> "3",
						"max" 		=> "2000",
						"type" 		=> "sliderui" 
				);	

$of_options[] = array( 	"name" 		=> "Footer Widgets",
						"desc" 		=> "Check if you want to display the 3 widget areas in the footer.",
						"id" 		=> "tp_footer_widgets",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);


$of_options[] = array( 	"name" 		=> "Slider",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Slider",
						"desc" 		=> "Check if you want to show the slider.",
						"id" 		=> "tp_primary_slider",
						"std" 		=> 0,
						"type" 		=> "checkbox"
						
				);	
								
$of_options[] = array( 	"name" 		=> "Add a Slider",
						"desc" 		=> "Unlimited slider with drag and drop sortings. <div class=\"explain-text\">Theme comes with default sliders to show how theme looks like. By adding your own sliders default sliders will be removed automatically.</div>",
						"id" 		=> "tp_slider",
						"std" 		=> "",
						"type" 		=> "slider"
				);
								
//Advanced Settings
$of_options[] = array( 	"name" 		=> "Menus",
						"type" 		=> "heading",
						);
				
$of_options[] = array( 	"name" 		=> "Primary Menu",
						"desc" 		=> "Check if you want to show the menu. <div class=\"explain-text\">Please, go to / Appearance / Menus to manage and organize menu items for the primary menu. The primary menu will display the pages list if no menu is selected from the menus panel.</div>",
						"id" 		=> "tp_primary_menu",
						"std" 		=> 0,
						"type" 		=> "checkbox"
						
				);	
		
				
// Backup Options
$of_options[] = array( 	"name" 		=> "Integration",
						"type" 		=> "heading",
						);
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"desc" 		=> "Any code you add here will appear in the head section of every page of your site. Add only the css code without style blocks, they are auto inserted.",
						"id" 		=> "tp_custom_css",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Head Code",
						"desc" 		=> "Any code you add here will appear in the head section, just before of every page of your site.",
						"id" 		=> "tp_head_code",
						"std" 		=> "",
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> "Footer Code",
						"desc" 		=> "Any code you add here will appear just before tag of every page of your site.",
						"id" 		=> "tp_footer_code",
						"std" 		=> "",
						"type" 		=> "textarea"

				);

// Social Options
$of_options[] = array( 	"name" 		=> "Social Options",
						"type" 		=> "heading",
						);


$of_options[] = array( 	"name" 		=> "Facebook",
						"desc" 		=> "Add your Facebook URL profile, to link the facebook icon to your profile. Leave it blank if you dont like the Facebook icon to be displayed.",
						"id" 		=> "tp_social_facebook",
						"std" 		=> "#",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Twitter",
						"desc" 		=> " 	
Add your Twitter URL profile, to link the Twitter icon to your profile. Leave it blank if you dont like the Twitter icon to be displayed.",
						"id" 		=> "tp_social_twitter",
						"std" 		=> "#",
						"type" 		=> "text"
				);			

$of_options[] = array( 	"name" 		=> "Google Plus",
						"desc" 		=> "Add your Google Plus URL profile, to link the Google Plus icon to your profile. Leave it blank if you dont like the Google Plus icon to be displayed.",
						"id" 		=> "tp_social_googleplus",
						"std" 		=> "#",
						"type" 		=> "text"
				);	
				
$of_options[] = array( 	"name" 		=> "LinkedIn",
						"desc" 		=> "Add your LinkedIn URL profile, to link the LinkedIn icon to your profile. Leave it blank if you dont like the LinkedIn icon to be displayed.",
						"id" 		=> "tp_social_linkedin",
						"std" 		=> "#",
						"type" 		=> "text"
				);	
	

$of_options[] = array( 	"name" 		=> "YouTube",
						"desc" 		=> "Add your YouTube URL profile, to link the YouTube icon to your profile. Leave it blank if you dont like the YouTube icon to be displayed.",
						"id" 		=> "tp_social_youtube",
						"std" 		=> "#",
						"type" 		=> "text"
				);

				
$of_options[] = array( 	"name" 		=> "RSS",
						"desc" 		=> "Add your Feedburner URL, or any other RSS link. Leave it blank if you dont like the RSS icon to be displayed.",
						"id" 		=> "tp_social_rss",
						"std" 		=> "#",
						"type" 		=> "text"
				);			
													
// Backup Options
/*
$of_options[] = array( 	"name" 		=> "Ads Placement",
						"type" 		=> "heading",
						);
															
$of_options[] = array( 	"name" 		=> "Banner Code",
						"desc" 		=> "Put header banner code here, it can be a script (Google Adsense, etc.) or a HTML code. <div class=\"explain-text\">This ad is for a specific place on you site, for some themes located on top header, for others below the slidershow. You can add more ads through <a href=\"\">widgets</a> by adding a \"Text\" widget on sidebar (or footer) and paste your ad code there.</div>",
						"id" 		=> "tp_banner_code",
						"std" 		=> '<a href="http://themepix.com"><img src="http://themepix.com/pix/uploads/ad-468.png" style="border: 0;" alt="Advertise Here" /></a>',
						"type" 		=> "textarea"
				);
	*/			
															
$of_options[] = array( 	"name" 		=> "Paid Version",
						"type" 		=> "heading",
							);							
				
$of_options[] = array( 	"name" 		=> "General Information",
						"type" 		=> "tab",
						"desc" 		=> "Our themes are free and you can use them without any problems in your personal or commercial projects. The free themes contain sponsored links in footer or content and you can't edit or remove them. Good option for testing which theme will work best for you. You can upgrade to the paid version later without losing your customizations."
				);	
				
$of_options[] = array( 	"name" 		=> "Paid Theme Features",
						"type" 		=> "tab",
						"desc" 		=> "Paid themes comes with: <ol style='padding-left: 25px; padding-top: 10px;'><li>No Sponsored Links</li> <li>Access to support forum</li> <li>Allowed to use the theme to build sites for your clients</li></ol>"
				);	
				
$of_options[] = array( 	"name" 		=> "Buy " . THEMENAME . " Theme",
						"type" 		=> "tab",
						"desc" 		=> "<a class='post_status button' href=\"http://themepix.com/buy/?theme=" . THEMENAME . "\">Buy it Now</a>
<span class='buytheme'>By clicking the button you will be redirected the ThemePix.com website.
After successful payment you will be able to download theme immediately from your account.

If you have question about theme purchase please <a href=\"http://themepix.com/contact\" target=\"blank/\">contact us</a>, we will respond within 24 hours.</span>"
				);	
				
$of_options[] = array( 	"name" 		=> "Support Forum",
						"type" 		=> "tab",
						"desc" 		=> "If you have any question about your theme, feel free to post question in our <a href=\"http://themepix.com/forum\" target=\"blank/\">Support Forum</a>. We will do our best to answers all your questions. Support forum is only for our paid members (paid members: members which purchased a theme form us)"
				);		
				
								
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
