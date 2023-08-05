<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <div class="container navigation-bar">
            <div class="logo">
                <a href="<?php echo site_url('/'); ?>">
                    <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="logo">
                </a>
            </div>
            <div class="hamburger-menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="64" height="64" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 6l16 0" />
                    <path d="M4 12l16 0" />
                    <path d="M4 18l16 0" />
                </svg>
            </div>
            <div class="menu-container">
                <?php
                $args = array(
                    'theme-location' => 'main-menu',
                    'container' => 'nav',
                    'container_class' => 'main-menu'
                );
                wp_nav_menu($args);
                ?>
            </div>
        </div>
        <?php if (is_front_page()) { ?>
            <div class="tagline text-center container">
                <h1 class="ml2">
                    <?php the_field('hero_heading'); ?>
                </h1>
                <p>
                    <?php the_field('hero_text'); ?>
                </p>
            </div>
        <?php } ?>
    </header>