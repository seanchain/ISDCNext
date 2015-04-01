<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Superhero
 * @since Superhero 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php require 'header.inc.php' ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<div id="masthead-wrap">
	<?php $_home_class='""';$_blog_class='"active"';$_game_class='""';$_train_class='""';$_about_class='"dropdown"';require 'navi.inc.php';?> 
	</div><!-- #masthead-wrap -->

	<?php if ( is_front_page() ) : ?>
		<?php get_template_part( 'slider' ); ?>
	<?php endif; ?>

	<div id="main" class="site-main">
