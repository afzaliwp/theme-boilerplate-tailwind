<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( is_front_page() ) { ?>
		<meta name="description" content="<?php echo get_option( 'blogdescription' ); ?>">
	<?php } ?>
	<?php wp_head(); ?>
<!--	<link rel="preload" href="--><?php //echo get_template_directory_uri(); ?><!--/assets/fonts/font.woff2" as="font"-->
<!--	      type="font/woff2" crossorigin>-->
<!--	<link rel="preconnect" href="https://www.googletagmanager.com">-->
<!--	<link rel="prefetch" href="https://www.googletagmanager.com/gtag/js?id=G-theid">-->
<!--	<script async src="https://www.googletagmanager.com/gtag/js?id=G-theid"></script>-->
</head>