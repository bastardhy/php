<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
    <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>	
	<?php wp_head(); ?>   
</head>

<body id="<?php echo esc_attr(get_theme_mod('typist_blogscheme', 'cherry')); ?>" <?php body_class(); ?> >

    <div class="hide">
        <p><a href="#content"><?php _e( 'Skip to content', 'typist' ); ?></a></p>
    </div>
    
    <div class="tlo">
    
        <div id="headline">
			<?php if ( has_nav_menu( 'primary' ) ) { ?>         
                <nav id="menuline" class="main-navigation menubox" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </nav>       
            <?php }; ?> 
                   
            <div class="toggles">   

			<?php if ( has_nav_menu( 'primary' ) ) { ?>                           
                <div class="menu-toggle">
                    <a href="javascript:toggleByClass('menubox');"><span class="fa icons fa-bars"></span></a>
                </div> 
            <?php }; ?> 
                
                <div class="socialbox">  
                
				<?php
                /*Social icons*/
                
                if (get_theme_mod('typist_social_facebook')!='') {
                echo '<a href="'.esc_url(get_theme_mod('typist_social_facebook')).'"><span class="fa icons fa-facebook-official"></span></a>';};
                
                if (get_theme_mod('typist_social_instagram')!='') {
                echo '<a href="'.esc_url(get_theme_mod('typist_social_instagram')).'"><span class="fa icons fa-instagram"></span></a>';};
                
                if (get_theme_mod('typist_social_twitter')!='') {
                echo '<a href="'.esc_url(get_theme_mod('typist_social_twitter')).'"><span class="fa icons fa-twitter"></span></a>';}
                
                ?>
            
                </div>          
            </div>             
        
        </div><!--headline-->
         
        <div id="logo"> 

        	<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {   
				the_custom_logo();
            } else { ?>          
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url()); ?>"><?php bloginfo( 'name' ); ?></a>
                </h1>
				<?php $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) { ?>
                    <p class="site-description"><?php echo esc_attr( $description );?></p> 
			<?php } } ?>
                                
        </div>