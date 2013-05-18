<?php
include_once('selector/items.php');

function is_firefox() {
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

function is_windows() {
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

/*

Theme Switcher v.1.0
Created By George Baker @ http://themeforest.net/user/phoenix - http://twitter.com/dabluephoenix

*/
## get current theme name
$current_theme = $_GET['theme'];
$theme_found = false;

## build theme data array

if (!$redirect) :
$categories = get_categories();
## get current theme data
foreach ( $categories as $key => $theme_array) {

    foreach ($theme_array["items"] as $i => $theme) :

        if ($theme['id'] == $current_theme) :

            $current_theme_name = ucfirst($theme['id']);
            $current_theme_url = $theme['url'];
            $current_theme_purchase_url = $theme['themeforest'];
            $current_theme_options = $theme["theme_options"];
            $theme_found = true;

        endif;

    endforeach;

}
if ($theme_found == false) :
    $theme_array = $categories[0]["items"];
	$current_theme_name = $theme_array[0]['name'];
	$current_theme_url = $theme_array[0]['url'];
	$current_theme_purchase_url = $theme_array[0]['themeforest'];
    $current_theme_options = $theme_array["theme_options"];

endif; ?>

<!DOCTYPE HTML>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Pixelgrade | <?php if ($theme_found == false) : echo $current_theme_name; else: echo $current_theme_name; endif; ?></title>

    <link href="selector/css/styles.css" rel="stylesheet" media="all" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="selector/js/app.min.js"></script>
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

    <style type="text/css">

    <?php
    if (is_firefox() && is_windows()) :

    ?>


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

    <?php

    endif;
    ?>

    </style>

    <script type="text/javascript" src="selector/js/main.js"></script>
         
</head>

<body>

	<div id="switcher">
	
		<div class="center">
            <ul>
                <li id="size"></li>

                <li id="devices">
                    <a href="#" class="auto"><span>Auto</span></a>
                    <a href="#" class="tablet-portrait active"><span>Tablet Portrait</span></a>
                    <a href="#" class="tablet-landscape"><span>Tablet Landscape</span></a>
                    <a href="#" class="smartphone-landscape"><span>iPhone Landscape</span></a>
                    <a href="#" class="smartphone-portrait"><span>iPhone Portrait</span></a>
                </li>

                <?php if ( $current_theme_options ) { ?>
                <li id="theme_options" class="parent-menu-item">
                    <a>Theme Options</a>
                    <ul class="dropdown sub-menu">

                        <?php foreach ( $current_theme_options as $key => $option ) { ?>

                        <li class="theme_option" data-name="<?php echo $option['option_name'] ?>">

                            <ul class="category" >
                                <li class="li-head">

                                        <?php echo $option['option_name'] ?>

                                </li>
                                <?php foreach ($option["option_value"] as $i => $value ) { ?>
                                    <li class="li-item" data-value="<?php echo $i; ?>">
                                        <a href="#">
                                            <?php echo $value ?>
                                        </a>
                                        <span class="preview <?php echo $i; ?>"</span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>

                        <?php }?>

                    </ul>
                </li>
                <?php } ?>

                <li id="theme_list" class="parent-menu-item">
                    <a id="theme_select" href="#">
                        <?php if ($theme_found == false) : echo "Select A Theme..."; else: echo $current_theme_name; endif; ?>
                    </a>

                    <ul id="cat_list" class="dropdown sub-menu">

                        <?php
                        foreach ( $categories as $key => $theme_array) {
                            echo '<li><ul class="category">';
                            echo '<li class="li-head">'.$theme_array["cat_name"].'</li>';

                            foreach ($theme_array["items"] as $i => $theme) :

                                echo '<li class="li-item"><a href="?theme='.$theme["id"].'" rel="' . $theme['url'] . ',' . $theme['themeforest'] . '"><img class="item-preview" src="'.$theme["preview"].'">' . ucfirst($theme['name']) . '</a></li>';

                            endforeach;

                            echo '</ul></li>';
                        }
                        ?>

                    </ul>

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

<?php

endif;

?>