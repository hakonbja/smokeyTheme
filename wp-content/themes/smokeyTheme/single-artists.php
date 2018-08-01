<!--
/*
 * Template Name: Artists
 * Template for custom post types of 'Artists'
 */
 -->

<?php get_header();?>

<main>
  <div class="post-artists">
    <div class="container">
      <?php
      while ( have_posts() ) : the_post();?>
        <h1><?php the_title(); ?></h1>
        <div class="artists-content">

            <?php the_post_thumbnail( array(400, 400)); ?>

          <div class="bio">
            <?php the_content(); ?>
          </div>
        </div>
        <?php
        $role = get_post_meta(get_the_ID(), "role", true);
        $url = home_url(strtolower('/#' . $role . 's'));
        ?>
        <a href="<?php echo esc_url($url);?>">&#171; Back</a>
      <?php endwhile; ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>
