<?php 

require_once HD_PLUGIN_DIR.'/includes/support.php';

class Ha_duy_Admin {

    public function __construct() {

    //_01================================================
    // Them 1 sub menu vao dashboard
    //**=================================================
    // add_action('admin_menu',array($this,'settingMenu'));
    
    //_02================================================
    // Them 1 menu vao he thong menu co san
    //**=================================================
    // add_action('admin_menu',array($this,'settingMenu2'));

    //_03================================================
    // Them 1 submenu vao 1 menu co san
    //**=================================================
    // add_action('admin_menu',array($this,'settingMenu3'));

    //_04================================================
    // Them 1 nhóm menu vào vị trí bất kỳ
    //**=================================================
    add_action('admin_menu',array($this,'settingMenu4'));

    //_05================================================
    // Xoá Menu
    //**=================================================
    add_action('admin_menu',array($this,'removeMenu'));

    //_06================================================
    // Xoá Menu
    //**=================================================
    add_action('admin_menu',array($this,'settingMenu5'));

  }  
    //_06================================================
    // Them 1 nhóm menu vào vị trí bất kỳ
    //**=================================================
    public function settingMenu5() {
        $menuSlug = 'hd-my-setting-title-new';
        $menuSlugUti = 'hd-my-setting-title-uni';

        add_object_page('My Setting Title uni','My Setting menu 5','manage_options',$menuSlug,array($this,'settingPage'));

        add_utility_page('My Setting Title 5','My Setting menu Uti','manage_options',$menuSlugUti,array($this,'settingPage'));

        add_submenu_page($menuSlug, 'About title', 'About', 'manage_options', $menuSlug.'-about'
        , array($this,'aboutPage'));

        add_submenu_page($menuSlug, 'Help title', 'Help', 'manage_options', $menuSlug.'-help'
        , array($this,'helpPage'));
    }

    //_05================================================
    // Xoá Menu
    //**=================================================
    public function removeMenu() {
        $menuSlug = 'hd-my-setting-title-new';
        remove_submenu_page($menuSlug, $menuSlug.'-about');
        remove_menu_page($menuSlug);
    }

    //_04================================================
    // Them 1 nhóm menu vào vị trí bất kỳ
    //**=================================================
    public function settingMenu4() {
        $menuSlug = 'hd-my-setting-title-new';

        add_menu_page('My Setting Title 4','My Setting menu 4','manage_options',$menuSlug,array($this,'settingPage'),'',4);

        add_submenu_page($menuSlug, 'About title', 'About', 'manage_options', $menuSlug.'-about'
        , array($this,'aboutPage'));

        add_submenu_page($menuSlug, 'Help title', 'Help', 'manage_options', $menuSlug.'-help'
        , array($this,'helpPage'));
    }

    //_03================================================
    // Them 1 submenu vao 1 menu co san
    //**=================================================
    public function settingMenu3() {
        $menuSlug = 'hd-my-setting-title-new';

        add_menu_page('My Setting Title 3','My Setting menu 3','manage_options',$menuSlug,array($this,'settingPage'));

        add_submenu_page($menuSlug, 'About title', 'About', 'manage_options', $menuSlug.'-about'
        , array($this,'aboutPage'));

        add_submenu_page($menuSlug, 'Help title', 'Help', 'manage_options', $menuSlug.'-help'
        , array($this,'helpPage'));
    }
     
    //_02================================================
    // Them 1 menu vao he thong menu co san
    //**=================================================
    public function settingMenu2() {
        $menuSlug = 'hd-my-setting-title';
        add_menu_page('My Setting Title','My Setting menu','manage_options',$menuSlug,array($this,'settingPage'),
        HD_PLUGIN_DIR.'/images/cat.PNG');
        add_menu_page('My Setting Title 2','My Setting menu 2','manage_options',$menuSlug.'-2',array($this,'settingPage'),
        HD_PLUGIN_DIR.'/images/cat.PNG');
    }

    //_01================================================
    // Them 1 sub menu vao dashboard
    //**=================================================
    public function settingMenu() {
        $menuSlug = 'hd-my-setting-title';
        add_dashboard_page('My Setting Title','My Setting','manage_options',$menuSlug,array($this,'settingPage'));
        add_posts_page('My Setting Title','My Setting post','manage_options',$menuSlug,array($this,'settingPage'));
    }
    //===================================================
    //@check
    //===================================================

    public function settingPage() {
        // echo "<h2>My setting</h2>";
        require HD_VIEW_DIR.'/setting-page.php';
    } 
    public function aboutPage() {
        require HD_VIEW_DIR.'/about-page.php';
    }
    public function helpPage() {
        require HD_VIEW_DIR.'/help-page.php';
    }
}



?>