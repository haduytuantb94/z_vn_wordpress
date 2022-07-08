    <footer id="footer">
        <div class="hd-max-width d-flex ft-style">
            <div class="copy-right">
                &copy; <?php echo date('Y'); ?>  Theme HaDuyThemee Wordpress 
            </div>
            <div><?php bloginfo('sitename'); ?>
                 <?php 
                    $copyright = "design by HaDuy";
                    echo apply_filters("new_filter_hook", $copyright);
                 ?>
            </div>
        </div>
    </footer>
   </div>	<!---end Container------>
   <?php wp_footer(); ?>
</body>
</html
