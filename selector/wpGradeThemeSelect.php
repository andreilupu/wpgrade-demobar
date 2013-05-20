<?php

define('BASE_PATH', 'http://vps5.cgwizz.com/themeselector/' );
define('IMAGES_PATH', BASE_PATH. 'selector/images/previews/' );

class wpGradeThemeSelect {

    protected $items;
    protected $categories;


    public function __construct() {
        //$this->images_path = 'http://vps5.cgwizz.com/themeselector/selector/images/previews/';
    }

    public function get_items() {

        $this->items = array(
            "senna" => array(
                "id" => "senna",
                "name" => "Senna",
                "category" => "wordpress themes",
                "url" => "http://vps5.cgwizz.com/senna",
                "themeforest" => "http://themeforest.net/item/senna-responsive-portfolio-blog-wordpress-theme/4609270?WT",
                "preview_img" => 'senna.png',
                "theme_options" => array(
                    "color" => array(
                        "type" => "color",
                        "Name" => "Color",
                    ),
                )
            ),
            "kaleidoscope" => array (
                "id" => "kaleidoscope",
                "name" => "Kaleidoscope",
                "category" => "wordpress themes",
                "url" => "http://vps5.cgwizz.com/kaleidoscope",
                "themeforest" => "http://themeforest.net/item/bliv-responsive-minimal-wordpress-theme/4141443",
                "preview_img" => 'kaleidoscope.png',
                "theme_options" => array(
                    "color" => array(
                        "type" => "class",
                        "name" => "Color",
                        "value" => array(
                            'color1' => "Color 1",
                            'color2' => "Color 2",
                            'color3' => "Color 3",
                            'color4' => "Color 4",
                            'color5' => "Color 5",
                            'color6' => "Color 6",
                            'color7' => "Color 7",
                            'color8' => "Color 8",
                            'color9' => "Color 9",
                            'color10' => "Color 10",
                            'color11' => "Color 11",
                            'color12' => "Color 12",
                            'color13' => "Color 13"
                        ),
                        "label" => "Choose a color:",
                    ),
                    "font" => array(
                        "type" => "class",
                        "name" => "Font",
                        "value" => array(
                            'font1' => "Modern Style",
                            'font2' => "Regal Style",
                            'font3' => "Industrial Style",
                            'font4' => "Bold Style",
                            'font5' => "Contemparary Style",
                            'font6' => "Fun Style",
                        ),
                        "label" => "Choose a font style:",
                    )
                )
            ),
            "bliv" => array (
                "id" => "bliv",
                "name" => "Bliv",
                "category" => "wordpress themes",
                "url" => "http://pixelgrade.com/demos/bliv",
                "themeforest" => "http://themeforest.net/item/bliv-responsive-minimal-wordpress-theme/4141443",
                "preview_img" => 'bliv.png'
            ),
            "start" => array(
                "id" => "start",
                "name" => "Start",
                "category" => "admin templates",
                "url" => "http://pixelgrade.com/demos/start-1.4/index.html",
                "themeforest" => "http://themeforest.net/item/bird-responsive-web-app-admin-template/3249981",
                "preview_img" => 'start.png'
            ),
            "bird" => array (
                "id" => "bird",
                "name" => "Bird",
                "category" => "admin templates",
                "url" => "http://cgwizz.com/bird/template/index.html",
                "themeforest" => "http://themeforest.net/item/bird-responsive-web-app-admin-template/3249981",
                "preview_img" => 'bird.png'
            )
        );

        return $this->items;
    }

    public function get_theme( $theme ){
        $items = $this->get_items();

        if ( array_key_exists($theme, $items) ) {
            return $items[$theme];
        }
        return false;
    }

    public function is_firefox() {
        $agent = '';
        // old php user agent can be found here
        if (!empty($HTTP_USER_AGENT))
            $agent = $HTTP_USER_AGENT;
        // newer versions of php do have useragent here.
        if (empty($agent) && !empty($_SERVER["HTTP_USER_AGENT"]))
            $agent = $_SERVER["HTTP_USER_AGENT"];
        if (!empty($agent) && preg_match("/firefox/si", $agent))
            return true;
        return false;
    }

    public function is_windows() {
        $agent = '';
        // old php user agent can be found here
        if (!empty($HTTP_USER_AGENT))
            $agent = $HTTP_USER_AGENT;
        // newer versions of php do have useragent here.
        if (empty($agent) && !empty($_SERVER["HTTP_USER_AGENT"]))
            $agent = $_SERVER["HTTP_USER_AGENT"];
        if (!empty($agent) && preg_match("/windows/si", $agent))
            return true;
        return false;
    }

    public function load_custom_css(){ ?>
        <!--[if IE]>
            <style type="text/css">
                li.purchase a {
                    padding-top: 5px;
                    background-position: 0px -4px;
                }

                li.remove_frame a {
                    padding-top: 5px;
                    background-position: 0px -3px;
                }

                #theme_select {
                    padding: 8px 8px;
                }

                #theme_list {
                    margin-top: 2px;
                }
            </style>
        <![endif]-->

        <?php if ($this->is_firefox() && $this->is_windows()) : ?>
            <style type="text/css">
                li.purchase {
                    padding-top: 18px;
                }

                li.purchase a {

                    padding-top: 5px;
                    background-position: 0px -3px;

                }

                li.remove_frame {
                    padding-top: 18px;
                }

                li.remove_frame a {

                    padding-top: 5px;
                    background-position: 0px -2px;

                }

                #theme_select {
                    padding: 7px 8px;
                }
            </style>
        <?php endif; ?>
    <?php }

}
?>