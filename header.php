<!DOCTYPE html>
<html  class="no-js" <?php language_attributes(); ?> lang="en">
<head>

	<!--- basic page needs
	================================================== -->
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- mobile specific metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
	================================================== -->
	<?php wp_head(); ?>

</head>

<body id="top" <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- pageheader
================================================== -->
<section class="s-pageheader <?php echo apply_filters( 'philosophy_home_banner_class','s-pageheader--home') ;?> ">

	<header class="header">
		<div class="header__content row">

			<div class="header__logo">
			<?php 	
				$options = get_option('philosophy_options');

				$logo = $options['logo'];
			?>
			<img src="<?php echo $logo['url']; ?>" alt="Philosophy">
				
			</div> <!-- end header__logo -->

			<!--Start header Social  -->

			<?php 
			
			
			
			?>
			<ul class="header__social">
                    
						<?php 
						$options = get_option('philosophy_options');

						$social_links = $options['social_link_group'];

						if (is_array($social_links) || is_object($social_links))
						{
							foreach ($social_links as $social_icon_link)
							
							{
								?>
								<li><a href="<?php echo $social_icon_link['social_link']['url']; ?>"><i class="<?php echo $social_icon_link['social_link_icon']; ?>"></i></a></li>
								<?php
							}
						}							
						
						?>
                        
                
                </ul> 
			 <!-- end header__social -->

			<a class="header__search-trigger" href="#0"></a>

			<div class="header__search">
                <?php get_search_form(); ?>
				<a href="#0" title="Close Search" class="header__overlay-close">Close</a>

			</div>  <!-- end header__search -->

             <?php get_template_part('/template-parts/common/navigation'); ?>
			 <!-- end header__nav-wrap -->

		</div> <!-- header-content -->
	</header> <!-- header -->

    <?php
    if(is_home()){
    get_template_part( '/template-parts/blog-home/featured') ;
    }
    ?>

</section> <!-- end s-pageheader -->

