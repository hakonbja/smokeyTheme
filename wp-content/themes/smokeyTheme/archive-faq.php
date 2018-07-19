<!--
/*
 * Template Name: FAQ
 * Template for custom post types of 'FAQ'
 */
 -->

 <?php get_header();?>

   <div class="faq">
     <h1>Frequently asked questions</h1>
     <div class="container">
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
               <div class="question">
                 <h3><?php the_title(); ?></h3>
                 <?php
                   if ($answer) {
                     echo "<h5>" . $answer . "</h5>";
                   }
                 ?>
               </div>

            </div>
            <?php
           }
       }
       /* Restore original Post Data */
       wp_reset_postdata();
       ?>

     </div>
   </div>
 <?php get_footer(); ?>
