<?php

class wpGradeThemeSelect {

    protected $items;
    protected $categories;
    protected $images_path;

    public function __construct() {
        $this->images_path = 'http://vps5.cgwizz.com/themeselector/selector/images/previews/';
    }

    public function get_items() {

        $this->items = array(
            array(
                "cat_name" => "Wordpress Themes",
                "items" => array (
                    array (
                        "id" => "kaleidoscope",
                        "name" => "Kaleidoscope",
                        "url" => "http://pixelgrade.com/demos/kaleidoscope",
                        "themeforest" => "http://themeforest.net/item/bliv-responsive-minimal-wordpress-theme/4141443",
                        "preview_img" => 'kaleidoscope.png',
                        "theme_options" => array(
                            "color" => array(
                                "type" => "class",
                                "name" => "Color",
                                "value" => array("color1" => "Orange", "color2" => "Green", "color3" => "Black"),
                                "label" => "Choose a color:",
                            ),
                            "font" => array(
                                "type" => "class",
                                "name" => "Font",
                                "value" => array("font1" => "Default", "font2" => "Weird", "font3" => "Test"),
                                "label" => "Choose a font style:",
                            )
                        )
                    ),
                    array (
                        "id" => "bliv",
                        "name" => "Bliv",
                        "url" => "http://pixelgrade.com/demos/bliv",
                        "themeforest" => "http://themeforest.net/item/bliv-responsive-minimal-wordpress-theme/4141443",
                        "preview_img" => 'bliv.png'
                    )
                )
            ),
            array(
                "cat_name" => "Admin Templates",
                "items" => array (
                    array(
                        "id" => "start",
                        "name" => "Start",
                        "url" => "http://pixelgrade.com/demos/start-1.4/index.html",
                        "themeforest" => "http://themeforest.net/item/bird-responsive-web-app-admin-template/3249981",
                        "preview_img" => 'start.png'
                    ),
                    array (
                        "id" => "bird",
                        "name" => "Bird",
                        "url" => "http://cgwizz.com/bird/template/index.html",
                        "themeforest" => "http://themeforest.net/item/bird-responsive-web-app-admin-template/3249981",
                        "preview_img" => 'bird.png'
                    )
                )
            )
        );

        return $this->items;
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