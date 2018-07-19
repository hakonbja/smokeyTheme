<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/5341c79551.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/safari-pinned-tab.svg" color="#39828c">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/assets/favicon/browserconfig.xml">
    <meta name="theme-color" content="#a6b9bd">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

    <div id="top" class="content">
      <header>

      <?php if ( is_front_page() ) { ?>
        <div class="jumbotron">
            <img id="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_no_bg.png" alt="">
        </div>
        <?php
      }?>

        <div id="navbar" class="navbar">

          <img id="logo--static" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_no_bg.png" alt="">
          <?php //wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
          <!--
          <ul class="container">
            <li><a href="#registration">Registration</a></li>
            <div class="dropdown">
              <li><a href="#teachers">Artists</a></li>
              <div class="dropdown-content">
                <a href="#teachers">Teachers</a>
                <a href="#bands">Bands</a>
                <a href="#djs">DJs</a>
              </div>
            </div>
            <li><a href="#workshops">Workshops</a></li>
            <li><a href="#parties">Parties</a></li>
          </ul>
        -->
        </div>
      </header>
