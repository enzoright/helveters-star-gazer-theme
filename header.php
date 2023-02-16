<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pfadi Helveter</title>
    <?php wp_head(); ?>
</head>

<body>

    <header>
        <div class="nav-container">
            <div class="logo-container">
                <div class="site-logo">
                    <?php if (has_custom_logo()) : the_custom_logo();
                    endif; ?>
                </div>
                <div>Pfadi Helveter St. Georgen</div>


            </div>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'top-menu',
                    'menu_class' => 'top-menu'
                )
            ); ?>
        </div>
    </header>