<div class="wrap">
<h2>Setting Page</h2>
<p>This is page represent page My setting</p>
  <form method="post" action="options.php" id="hd_mp_form_setting" enctype="multipart/form-data">
  	  <?php echo settings_fields('hd_mp_options');
            echo do_settings_sections($this->_menuSlug);
            // do_settings_fields($this->_menuSlug,)
  	  ?>
      <input type="submit" class="button button-primary" name="submit" value="Save change">
  </form>
</div>
