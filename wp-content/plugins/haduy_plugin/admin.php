<?php 

require_once HD_PLUGIN_DIR.'/includes/support.php';

class Ha_duy_Admin {

    private $_menuSlug = 'hd-my-setting';

    private $setting_options;

    public function __construct() {
        $this->setting_options = get_option('hd_mp_name',array());
        add_action('admin_menu',array($this,'settingMenu'));
        add_action('admin_init',array($this,'register_setting_and_fiedls')); 
    }
    public function register_setting_and_fiedls() {

        //Main Setting
        $mainSection = 'hd_mp_main_section';

        register_setting('hd_mp_options', 'hd_mp_name', array($this,'validate_setting'));
       
        add_settings_section($mainSection,'Main Setting',array($this,'main_section_view'),$this->_menuSlug);

        add_settings_field('hd_mp_new_title', 'Ext Setting', array($this,'new_title_input'),$this->_menuSlug,$mainSection);

        //Ext setting
        $extSection = 'hd_mp_extend_section';

        add_settings_section($extSection,'Main Extend Setting',array($this,'main_section_view'),$this->_menuSlug);

        add_settings_field('hd_mp_slogan', 'Slogan', array($this,'slogan_input'),$this->_menuSlug,$extSection);

        add_settings_field('hd_mp_security_code', 'Security Code', array($this,'security_code_input'),$this->_menuSlug,$extSection);
    }
    public function new_title_input() {
        echo '<input type="text" name="hd_mp_name[hd_mp_new_title]" value="'. $this->setting_options['hd_mp_new_title'].'" required/> '; 
    }
    public function slogan_input() {
        echo '<input type="text" name="hd_mp_name[hd_mp_slogan_title]" value="'. $this->setting_options['hd_mp_slogan_title'].'" required/> ';
    }
    public function security_code_input() {
        echo '<input type="text" name="hd_mp_name[hd_mp_security_code]" value="'. $this->setting_options['hd_mp_security_code'].'" required/> ';
    }
    public function settingMenu() {
        add_menu_page('My Setting Title',
                      'My Setting',
                      'manage_options',
                       $this->_menuSlug,
                       array($this,'settingPage'));
    }
    public function settingPage(){
        require_once HD_VIEW_DIR.'/settingpage.php';
    }
    public function validate_setting($data_input) {
                echo "<pre>";
                print_r($_POST['hd_mp_name']);
                echo "</pre>";
                die();
            // return $data_input;
    }
    public function main_section_view() {

    }
}


?>