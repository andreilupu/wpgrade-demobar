<?php
    global $selector;
    $items = $selector->get_items();
    $theme = $selector->get_theme( $_GET['theme'] );

    if ( ! empty( $theme ) ) {
        $current_theme_name = ucfirst($theme['id']);
        $current_theme_url = $theme['url'];
        $current_theme_purchase_url = $theme['themeforest'];
        $current_theme_options = $theme["theme_options"];
        $theme_found = true;
    } else {
        die(" Develop the theme first ");
    } ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Pixelgrade | <?php echo $current_theme_name; ?></title>

        <link rel="stylesheet" href="selector/js/colorpicker/css/colorpicker.css" type="text/css" />
        <link rel="stylesheet" media="screen" type="text/css" href="selector/js/colorpicker/css/layout.css" />
        <link href="selector/css/styles.css" rel="stylesheet" media="all" />
        <?php $selector->load_custom_css(); ?>
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="selector/js/colorpicker/js/colorpicker.js"></script>
        <script src="selector/js/colorpicker/js/eye.js"></script>
        <script src="selector/js/colorpicker/js/utils.js"></script>
        <script src="selector/js/colorpicker/js/layout.js?ver=1.0.2"></script>

        <script src="selector/js/app.min.js"></script>
        <script type="text/javascript" src="selector/js/main.js"></script>

    </head>

    <body>
    <div id="switcher">

        <div class="center">
            <ul>
                <li id="theme_list" class="parent-menu-item">
                    <a id="theme_select" href="#">
                        <?php if ($theme_found == false) : echo "Select A Theme..."; else: echo $current_theme_name; endif; ?>
                    </a>

                    <ul id="cat_list" class="dropdown sub-menu">

                        <?php
                        $category = 'wordpress themes';
                        echo '<li><ul class="category">';
                        echo '<li class="li-head">wordpress themes</li>';

                        foreach ( $items as $key => $theme_array) {

                            $close_category = '';

                            if ( $category != $theme_array["category"] ) {
                                $category = $theme_array["category"];
                                echo '<li><ul class="category">';
                                echo '<li class="li-head">'.$theme_array["category"].'</li>';
                                $close_category = '</ul></li>';
                            }

                            echo '<li class="li-item">'.
                                '<a href="?theme='.$theme_array["id"].'" rel="' . $theme_array['url'] . ',' . $theme_array['themeforest'] . '">'.
                                '<img class="item-preview" src="'. IMAGES_PATH . $theme_array["preview_img"].'">' . ucfirst($theme_array['name']) .
                                '</a>'.
                                '</li>';
                             if ( !empty($close_category) ) echo $close_category;
                        } ?>
                        </ul></li>
                    </ul>
                </li>

                <?php if ( $current_theme_options ) { ?>
                    <li id="theme_options" class="parent-menu-item">
                        <a>Theme Options</a>
                        <ul class="dropdown sub-menu">

                            <?php foreach ( $current_theme_options as $key => $option ) { ?>

                                <li class="theme_option" data-name="<?php echo $option['name'] ?>" data-type="<?php echo $option['type'] ?>">

                                    <ul class="category" >
                                        <li class="li-head" style="width:100%" > <?php echo $option['name'] ?> </li>

                                        <?php if ( $option["type"] == "color" ) { ?>
                                            <div class="colorpicker"></div>
                                        <?php } ?>
                                        <?php foreach ($option["value"] as $i => $value ) { ?>
                                            <li class="li-item" data-value="<?php echo $i; ?>" data-type="<?php echo $option['type'] ?>">

                                                <a>
                                                    <?php echo $value ?>
                                                </a>
                                                <span class="preview <?php echo $i; ?>"></span>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>

                            <?php }?>

                        </ul>
                    </li>
                <?php } ?>

                <li id="size"></li>

                <li id="devices">
                    <a href="#" class="auto"><span>Auto</span></a>
                    <a href="#" class="tablet-portrait active"><span>Tablet Portrait</span></a>
                    <a href="#" class="tablet-landscape"><span>Tablet Landscape</span></a>
                    <a href="#" class="smartphone-landscape"><span>iPhone Landscape</span></a>
                    <a href="#" class="smartphone-portrait"><span>iPhone Portrait</span></a>
                </li>

                <li class="purchase" rel="<?php echo $current_theme_purchase_url; ?>"><a href="<?php echo $current_theme_purchase_url; ?>" title="Buy <?php echo $current_theme_name; ?>">$</a></li>
                <li class="remove_frame" rel="<?php echo $current_theme_url; ?>"><a href="<?php echo $current_theme_url; ?>" title="Remove Frame" >X</a></li>

            </ul>

        </div>

    </div>
    <section>
        <div id="wrapper">
            <iframe id="iframe" src="<?php echo $current_theme_url; ?>" frameborder="0" width="100%"></iframe>
        </div>
    </section>
    </body>
    </html>