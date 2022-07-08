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
      //add_filter('the_title',array($this,'theTitle'));

      //***************************************************
      //2.Ham su dung 2 tham so cua Hook 'the_title'
      //***************************************************
     // add_filter('the_title',array($this,'theTitle_2'),10,2);

      // 3.Hien thi cac Action dang duoc thuc thi
      // add_action('wp_footer',array($this,'showSupport'));

      // 3-1.Hien thi cac Action dang duoc thuc thi trong `the_content`
      add_action('wp_footer',array($this,'showSupport2'));

      //4.lam viec voi Hook 'the_content'
      //add_filter('the_content',array($this,'changeContent'));

      //5.lam viec voi Hook 'the_content'
      // add_filter('the_content',array($this,'changeContent2'));

      //6.lam viec voi Hook 'the_content'
      // add_filter('the_content',array($this,'changeContent3'));

      //remove 1 filter :

      // remove_filter('the_content','convert_smilies');
      
      echo convert_smilies("This smiley is going to show as an image... :) ");
    }

       //Sử dụng tham số $content trong Hook the_content
    public function changeContent3($content) {
      global $post;
        if($post->post_type == 'post') {
           $content.= "This is post type";
        }
        return $content;
    }

       //Sử dụng tham số $content trong Hook the_content
    public function changeContent2($content) {
        $content= str_replace('recognizable','<b>recognizable</b>',$content);
        return $content;
    }

      //Sử dụng tham số $content trong Hook the_content
    public function changeContent($content) {
        $content.= "This is the content";
        return $content;
    }
      //***************************************************
      //1.Ham thay doi toan bo tieu de trong 'the_title'
      //***************************************************

    public function theTitle() {
      $str = "Thay doi tieu de bai viet";
      return $str;
    }

    public function theTitle_2($title, $id) {
      if($id == 14) {
        $title = str_replace('hello','hi',$title);
      }
       return $title;
    }

    //Hien thi cac Action dang duoc thuc thi
    // public function showSupport() {
    //     haduyMysupport::showFunc();
    // }

    //Hien thi cac Action dang duoc thuc thi
    public function showSupport2() {
        haduyMysupport::showFunc('the_content');
    }
}
new Ha_duyMP();
?>