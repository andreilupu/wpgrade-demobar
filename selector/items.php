<?php

function get_categories() {
    $images_path = 'http://vps5.cgwizz.com/themeselector/selector/images/';
    $categories = array(
        array(
            "cat_name" => "Wordpress Themes",
            "items" => array (
                array (
                    "id" => "kaleidoscope",
                    "name" => "Kaleidoscope",
                    "url" => "http://pixelgrade.com/demos/kaleidoscope",
                    "themeforest" => "http://themeforest.net/item/bliv-responsive-minimal-wordpress-theme/4141443",
                    "preview" => $images_path.'kaleidoscope.png',
                    "theme_options" => array(
                        "color" => array(
                            "option_name" => "Color",
                            "option_value" => array("color1" => "Orange", "color2" => "Green", "color3" => "Black"),
                            "option_description" => "Choose a color:",
                        ),
                        "font" => array(
                            "option_name" => "Font",
                            "option_value" => array("font1" => "Default", "font2" => "Weird", "font3" => "Test"),
                            "option_description" => "Choose a font style:",
                        )
                    )
                ),
                array (
                    "id" => "bliv",
                    "name" => "Bliv",
                    "url" => "http://pixelgrade.com/demos/bliv",
                    "themeforest" => "http://themeforest.net/item/bliv-responsive-minimal-wordpress-theme/4141443",
                    "preview" => $images_path.'bliv.png',
    //                "theme_options" => array(
    //                    "option_name" => "an",
    //                    "option_value" => "av",
    //                )
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
                    "preview" => $images_path.'start.png'
                ),
                array (
                    "id" => "bird",
                    "name" => "Bird",
                    "url" => "http://cgwizz.com/bird/template/index.html",
                    "themeforest" => "http://themeforest.net/item/bird-responsive-web-app-admin-template/3249981",
                    "preview" => $images_path.'bird.png'
                )
            )
        )
    );

    return $categories;
}
?>