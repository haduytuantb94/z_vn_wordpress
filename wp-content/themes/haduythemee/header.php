<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body class="<?php body_class(); ?>">
   <div id="container">
   	  <div class="header">
   	  	<div class="hd-max-width hd-color-white">
	   	  	  <div class="logo">
	   	  	  	  <div class="site-name"> <?php haduy_header(); ?></div>
	   	  	  	  <div class="site-description hd-color-white"><?php bloginfo('description'); ?> </div>
	   	  	  	  <?php haduy_menu('primary_menu'); ?>
	   	  	  </div>
   	     </div>
   	   </div>
