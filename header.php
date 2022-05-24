<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package enterprise-insight
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							  <?php 
							  //$directory_url = get_template_directory_uri();
							$customLogo =  the_custom_logo(); 
							if(!$customLogo) : ?>
								<img width="130" class="logo" src="<?php echo get_template_directory_uri().'/assets/images/logo_dark.png' ?>" alt="" />
							<?php endif;?>
                        
                    </a>
                </div>
                <div class="col">
						 <?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'menu_class' 	  => 'nav',
									'container'		  => 'ul'
								)
							);
							?>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 auth">
                    <a href="#" class="btn btn small">
                        <img width="12" height="12" src="<?php echo get_template_directory_uri().'/assets/images/user-ic.png" alt="user-ic' ?>" />
                        Login
                    </a>
                    <a class="btn btn-red small free-demo-open" id="free-demo-open">
                        <img width="13" height="13" src="<?php echo get_template_directory_uri().'/assets/images/zap-ic.png' ?>" alt="zap-ic" />
                        Free Demo
                    </a>
                </div>

                <a href="#" class="burger" id="burger">
                    <img width="20" src="<?php echo get_template_directory_uri().'/assets/images/burger.png' ?>" alt="burger" />
                </a>
            </div>

            <div class="sidebar-mobile">
                <span class="close" id="sidebar-close">
                    &times;
                </span>
					 	<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'menu_class' 	  => '',
									'container'		  => 'ul'
								)
							);
						?>
            </div>
        </div>
   </header>
