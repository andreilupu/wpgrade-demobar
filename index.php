<!DOCTYPE HTML>
<html>
<?php
include_once('selector/wpGradeThemeSelect.php');
global $selector;
$selector = new wpGradeThemeSelect();

if ( isset(  $_GET['theme'] ) && !empty( $_GET['theme'] ) ) :
    require_once('single_demo.php');
    die();

else :
    header('Location: '. BASE_PATH . '?theme=senna');
    die('A gallery is comming soon!');
/*
$categories = $selector->get_items(); ?>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Pixelgrade | Themes</title>

        <link href="selector/css/styles.css" rel="stylesheet" media="all" />
        <?php $selector->load_custom_css(); ?>
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="selector/js/app.min.js"></script>
        <script type="text/javascript" src="selector/js/main.js"></script>
    </head>

    <body>
        <div id="switcher">
            <div class="center">
                <ul>

                    <li id="theme_list" class="parent-menu-item">
                        <a id="theme_select" href="#">Select A Theme...</a>

                        <ul id="cat_list" class="dropdown sub-menu">

                            <?php
                            foreach ( $categories as $key => $theme_array) {
                                echo '<li><ul class="category">';
                                echo '<li class="li-head">'.$theme_array["cat_name"].'</li>';

                                foreach ($theme_array["items"] as $i => $theme) :

                                    echo '<li class="li-item"><a href="?theme='.$theme["id"].'" rel="' . $theme['url'] . ',' . $theme['themeforest'] . '"><img class="item-preview" src="'.$theme["preview_img"].'">' . ucfirst($theme['name']) . '</a></li>';

                                endforeach;

                                echo '</ul></li>';
                            }
                            ?>

                        </ul>

                    </li>

                </ul>
            </div>
        </div>
        <section>
            <div id="wrapper">
                <div id="gallery">
                    <ul>
                        <?php

                        // @TODO create a gallery later


//                        foreach ( $categories as $key => $theme_array) {
//                            echo '<li><ul class="gallery_category">';
//                            echo '<li class="li-head">'.$theme_array["cat_name"].'</li>';
//
//                            foreach ($theme_array["items"] as $i => $theme) :
//
//                                echo '<li class="gallery_item"><a href="?theme='.$theme["id"].'" rel="' . $theme['url'] . ',' . $theme['themeforest'] . '"><img class="item-preview" src="'.$theme["preview_img"].'">' . ucfirst($theme['name']) . '</a></li>';
//
//                            endforeach;
//
//                            echo '</ul></li>';
//                        }
                        ?>
                    </ul>
                </div>
            </div>
        </section>
    </body>
    </html>
<?php */ endif; ?>
