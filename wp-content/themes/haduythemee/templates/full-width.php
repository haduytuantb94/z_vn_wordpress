<?php 
/*
   Template Name: Full Width
 */
?>

<?php get_header(); ?>
<div class="content">
	<div class="hd-max-width d-flex">
		<div class="main-content fullwidth">
		    <div class="contact-info">
		    	<h4>Address</h4>
		    	<p>Nguyen Xa, Bac Tu Liem District,Hanoi Capital</p>
		    	<p>0967.204.697</p>
		    	<p>haduytuan1994@gmail.com</p>
		    </div>
		    <div class="contact-form">
		    	 <?php do_shortcode('[CONTACT FORM]');?>
		    </div>
		</div>
	</div>
</div>
<?php 
get_footer();
?>
