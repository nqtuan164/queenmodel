<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script type="text/javascript">
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1376641262596415";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<?php
$background = array("111.jpg", "222.jpg", "333.jpg", "444.jpg", "555.jpg", "666.jpg", "777.jpg");
$num_rand = rand(0, count($background)-1);
?>

<div class="bg" style="background:url('<?php echo get_template_directory_uri() . '/img/' . $background[$num_rand]; ?>');"></div>
<div id="page" class="site" >
	<div class="site-inner">
		<header id="masthead" class="site-header" role="banner">
            <div class="container header">
                <div class="row">
                    <div class="col-md-4 col-md-offset-8">
                        <!-- Lang bar-->
                        <div class="language-nav">
                            <p>Language: </p>
                            <?php echo qtranxf_generateLanguageSelectCode('image'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Queen Model"></a>
                    
                    <div class="col-md-12 hidden-sm hidden-xs">
                        <!-- Menu-->
                        <div class="main-nav">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'primary-menu',
                                 ) );
                            ?>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 hidden-md hidden-lg">
                        <!-- Menu-->
                        <div class="main-nav">
                            <a class="menu-toggle">Click to show menu</a>
                            <?php
                                wp_nav_menu( array(
                                    'menu'           => 'MainMenuMobile',
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'primary-menu mobile-menu',
                                 ) );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </header>
		<div id="content" class="site-content">
