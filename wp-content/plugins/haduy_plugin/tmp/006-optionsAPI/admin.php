<?php 

require_once HD_PLUGIN_DIR.'/includes/support.php';

class Ha_duy_Admin {

    public function __construct() {
        //_01 ================================================
        // Thêm một option vào database
        //====================================================
        // add_action('admin_init',array($this,'add_new_option')); 

        //_02 ================================================
        // Thêm một option theo 1 mảng vào database
        //====================================================
        // add_action('admin_init',array($this,'add_array_option')); 
    
        // add_action('admin_notices',function(){
        //    $tmp = 'a:3:{s:7:"version";s:3:"4.0";s:6:"author";s:6:"Tuanha";s:7:"Website";s:13:"haduytuan.com";}';
        //     echo "<pre>";
        //     print_r(unserialize($tmp));
        //     echo "</pre>";
        // });

        //_03 ================================================
        // Get option
        //====================================================
        // add_action('admin_notices',array($this,'getOptions')); 


        //_04 ================================================
        // Update option
        //====================================================
        // add_action('admin_notices',array($this,'updateOptions')); 

        //_05 ================================================
        // Update 1 phần tử trong mảng
        //====================================================
        // add_action('admin_notices',array($this,'updateOptions2')); 

        //_06 ================================================
        // Delete 1 phần tử trong mảng
        //====================================================
        // add_action('admin_notices',array($this,'deleteOptions')); 


        //_07 ================================================
        // Update autoload
        //====================================================
        // add_action('admin_notices',array($this,'updateAutoload')); 

        //_08 ================================================
        // Update Options
        //====================================================
        add_action('admin_notices',array($this,'updateOption')); 
    }


    //_08 ================================================
    // Update Options
    //====================================================
    public function updateOption() {
       update_option('hd_mp_version','duytuan');
       update_option('hd_mp_wp_version','duytuan222');
    }

    //_07 ================================================
    // Update autoload
    //====================================================
    public function updateAutoload() {
        $old_options = get_option('hd_mp_wp_22');
        delete_option('hd_mp_wp_22');
        add_option('hd_mp_wp_22', $old_options,'','no');
    }

    //_06 ================================================
    // Update 1 phần tử trong mảng
    //====================================================

    public function deleteOptions() {
       delete_option('hd_mp_wp_22');
    }

    //_05 ================================================
    // Update 1 phần tử trong mảng
    //====================================================

    public function updateOptions2() {
        $old_options = get_option('hd_mp_wp_22');
        $old_options['version'] = 'Wordpress 6.0';
        update_option('hd_mp_wp_22', $old_options);
    }

    //_04 ================================================
    // Update option
    //====================================================

    public function updateOptions() {
        update_option('hd_mp_version','4.6', 'yes');
    }

    //_03 ================================================
    // Get option
    //====================================================
    public function getOptions() {
        $tmp = get_option('hd_mp_version_1', '3.0');
        echo "<br />".$tmp;
        $arrayOptions = array(
            'version' => '4.0',
            'author'  => 'Tuanha',
            'Website' => 'haduytuan.com'   
        );
        $tmp2 = get_option('hd_mp_wp_22', $arrayOptions);
            echo "<pre>";
            print_r($tmp2);
            echo "</pre>";
    }
    //_02 ================================================
    // Thêm một option theo 1 mảng vào database
    //====================================================
    public function add_array_option() {
        $arrayOptions = array(
            'version' => '4.0',
            'author'  => 'Tuanha',
            'Website' => 'haduytuan.com'   
        );
        add_option('hd_mp_wp_22', $arrayOptions, '', 'yes');
    }
    //_01 ================================================
    // Thêm một option vào database
    //====================================================
    public function add_new_option() {
        add_option('hd_mp_version','4.0','','yes');
        add_option('hd_myplugin_version','4.0','','no');
    }
}


?>