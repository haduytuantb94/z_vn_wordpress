<?php 

// class hd_Mp {
//     public function newFooter() {
//       echo "This is newFooter";
//     }
//     public function newFooter2() {
//       echo "This is newFooter 2".$enter;
//     }
// }

require_once HD_PLUGIN_DIR.'/includes/support.php';

class Ha_duyMP {
    public function __construct() {
      //***************************************************
      //1.Ham thay doi toan bo tieu de trong 'the_title'
      //***************************************************
      add_filter('the_title',array($this,'changeString'));

      add_filter('the_content',array($this,'changeString'));
      //*****************************************************
      // Hien thi cac Action dang thuc thu
      //*****************************************************
      // add_action('wp_footer',array($this,'showSupport2'));
    }
    public function changeString($text) {
      if(current_filter() == 'the_title') {
           if(!is_page()) {
            $text.= "-duytuan";           
          }
        // $text = str_replace('Seagamés','Seagame',$text);
      }

      if(current_filter() == 'the_content') {
           $text = str_replace('ultrices ','<b><a href="#">ultrices </a></b>',$text);
      }
      return $text;
    }
    //Hien thi cac Action dang duoc thuc thi
    public function showSupport2() {
        haduyMysupport::showFunc();
    }
}
new Ha_duyMP();
?>