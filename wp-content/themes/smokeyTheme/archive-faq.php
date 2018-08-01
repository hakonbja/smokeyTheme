<!--
/*
 * Template Name: FAQ
 * Template for custom post types of 'FAQ'
 */
 -->

 <?php get_header();?>
<main>
  <div id="faq" class="container">
    <h1>Frequently asked questions</h1>

      <?php
      $sw_args = array(
          'post_type' => 'faq',
          'orderby' => 'menu_order',
          'order' => 'ASC',
      );

      $the_query = new WP_Query( $sw_args );
      if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $object = get_post();
            $answer = get_post_meta($object->ID, 'answer', true);?>
            <div class="faq--single">
              <div class="plus-sign"></div>
              <div class="question">
                <h4><?php the_title(); ?></h4>
              </div>
              <div class="answer">
                <h5><?php echo $answer;?></h5>
              </div>
            </div>
           <?php
          }
      }
      /* Restore original Post Data */
      wp_reset_postdata();
      ?>
  </div>
</main>

 <?php get_footer(); ?>
