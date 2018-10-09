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
    <!-- <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css"> -->
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

    <div id="top" class="content">
      <header>

      <?php if ( is_front_page() ) { ?>
        <div class="jumbotron">
          <img id="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_no_bg.png" alt="">
          <h4 id="jt-date">23rd to 27th of May 2019</h4>
        </div>
        <?php
      }?>

        <div id="navbar" class="navbar">
          <div class="desktop-navbar">
            <?php if ( is_front_page() ) { wp_nav_menu( array( 'theme_location' => 'navbar_left' ) ); }?>
            <?php if ( is_front_page() ) { ?>
              <img id="logo--static" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_no_bg.png" alt="">
            <?php } else { ?>
              <a class="logo--static" href="<?php echo home_url(); ?>"><img id="logo--static" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_no_bg.png" alt=""></a>
            <?php } ?>
            <?php if ( is_front_page() ) { wp_nav_menu( array( 'theme_location' => 'navbar_right' ) ); } ?>
          </div>
          <div class="mobile-navbar">
            <?php if ( is_front_page() ) { ?>
              <div id="hamburger" class="menu-icon">
                <span></span>
              </div>
              <ul id="mobile-ul">
                <li><a href="#a-registration">Registration</a></li>
                <li><a href="#a-artists-selection">Artists</a></li>
                <li><a href="#a-testimonials">Testimonials</a></li>
                <li><a href="#a-newsletter">Newsletter</a></li>
              </ul>


            <?php } ?>

          </div>

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
