<?php

function smokeyTheme_resources() {
  wp_enqueue_style('style', get_stylesheet_uri());

  if (is_front_page()) {
    wp_enqueue_script('front-page', get_template_directory_uri() . '/assets/js/front-page.js', array('jquery'), null, true);
  } else {

  }
}

add_action('wp_enqueue_scripts', 'smokeyTheme_resources');

add_action('after_setup', 'smokeyTheme_resources');


add_theme_support( 'menus' );

//Activate nav menu options
function smokeyTheme_register_nav_menu() {
  register_nav_menu('primary', __(' Header Navigation Menu' ));
}
add_action('init', 'smokeyTheme_register_nav_menu');

// Add Featured image to Artists post type
add_theme_support( 'post-thumbnails', array( 'artists' ) );          // Posts only

// Add artists Custom Post Type
function artists_init() {
    // set up artists labels
    $labels = array(
        'name' => 'Artists',
        'singular_name' => 'Artists',
        'add_new' => 'Add New Artists',
        'add_new_item' => 'Add New Artists',
        'edit_item' => 'Edit Artists',
        'new_item' => 'New Artists',
        'all_items' => 'All Artists',
        'view_item' => 'View Artists',
        'search_items' => 'Search Artists',
        'not_found' =>  'No Artists Found',
        'not_found_in_trash' => 'No Artists found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Artists',
    );

    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'artists'),
        'query_var' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            //'custom-fields',
            //'revisions',
            'thumbnail',
            'author',
            'page-attributes'
        )
    );
    register_post_type( 'artists', $args );

}
// Add 'passes' Custom Post Type
function passes_init() {
    // set up passes labels
    $labels = array(
        'name' => 'Passes',
        'singular_name' => 'Pass',
        'add_new' => 'Add New Pass',
        'add_new_item' => 'Add New Pass',
        'edit_item' => 'Edit Pass',
        'new_item' => 'New Pass',
        'all_items' => 'All Passes',
        'view_item' => 'View Pass',
        'search_items' => 'Search Passes',
        'not_found' =>  'No Pass Found',
        'not_found_in_trash' => 'No Pass found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Passes',
    );

    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'passes'),
        'query_var' => true,
        'menu_icon' => 'dashicons-tickets-alt',
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            //'custom-fields',
            //'revisions',
            //'thumbnail',
            'author',
            'page-attributes'
        )
    );
    register_post_type( 'passes', $args );

}

// Add 'testimonials' Custom Post Type
function testimonials_init() {
    // set up passes labels
    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'add_new' => 'Add New Testimonial',
        'add_new_item' => 'Add New Testimonial',
        'edit_item' => 'Edit Testimonial',
        'new_item' => 'New Testimonial',
        'all_items' => 'All Testimonials',
        'view_item' => 'View Testimonial',
        'search_items' => 'Search Testimonials',
        'not_found' =>  'No Testimonial Found',
        'not_found_in_trash' => 'No Testimonial found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Testimonials',
    );

    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'testimonial'),
        'query_var' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            //'custom-fields',
            //'revisions',
            //'thumbnail',
            'author',
            'page-attributes'
        )
    );
    register_post_type( 'testimonials', $args );

}

// Add 'FAQ' Custom Post Type
function faq_init() {
    // set up passes labels
    $labels = array(
        'name' => 'FAQ',
        'singular_name' => 'FAQ',
        'add_new' => 'Add New FAQ',
        'add_new_item' => 'Add New FAQ',
        'edit_item' => 'Edit FAQ',
        'new_item' => 'New FAQ',
        'all_items' => 'All FAQ',
        'view_item' => 'View FAQ',
        'search_items' => 'Search FAQ',
        'not_found' =>  'No FAQ Found',
        'not_found_in_trash' => 'No FAQ found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'FAQ',
    );

    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'faq'),
        'query_var' => true,
        'menu_icon' => 'dashicons-editor-help',
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            //'custom-fields',
            //'revisions',
            //'thumbnail',
            'author',
            'page-attributes'
        )
    );
    register_post_type( 'faq', $args );

}

add_action( 'init', 'artists_init' );
add_action('init', 'passes_init');
add_action('init', 'testimonials_init');
add_action('init', 'faq_init');

/**
 * Insert custom meta boxes
 */

 // Dropdown to select the role of an artist
function role_dropdown_markup(){
    wp_nonce_field(basename(__FILE__), "role_dropdown_nonce");

    ?>
        <div>

            <select name="role" id="role">
                <?php


                    $option_values = array(Teacher, Band, DJ, Other);

                    foreach($option_values as $key => $value)
                    {
                      $object = get_post();
                        if($value == get_post_meta($object->ID, "role", true))
                        {
                            ?>
                                <option selected><?php echo $value; ?></option>
                            <?php
                        }
                        else
                        {
                            ?>
                                <option><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
        </div>
    <?php
}

function add_role_dropdown(){
    add_meta_box( "artists-role", //id
                  "Role", //title
                  "role_dropdown_markup", //callback
                  "artists", //which screen to display
                  "side", //position
                  "high", //priority
                  null);
}

function save_role_dropdown_value($post_id, $post){
  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['role_dropdown_nonce'] ) || !wp_verify_nonce( $_POST['role_dropdown_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data */
  $new_meta_value = ( $_POST['role'] );

  /* Get the meta key. */
  $meta_key = 'role';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

    /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

    /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );

}

// Dropdown to select if a pass or an artist should be shown on the front page
function show_front_dropdown_markup(){
      wp_nonce_field(basename(__FILE__), "show_front_dropdown_nonce");
      ?>
          <div>
              <select name="show-front" id="show-front">
                  <?php
                      $option_values = array(Yes, No);

                      foreach($option_values as $key => $value)
                      {
                        $object = get_post();
                          if($value == get_post_meta($object->ID, "show-front", true))
                          {
                              ?>
                                  <option selected><?php echo $value; ?></option>
                              <?php
                          }
                          else
                          {
                              ?>
                                  <option><?php echo $value; ?></option>
                              <?php
                          }
                      }
                  ?>
              </select>
          </div>
      <?php

}

function add_show_front_dropdown(){
  add_meta_box( "show-front", //id
                "Show on Front Page", //title
                "show_front_dropdown_markup", //callback
                array('artists', 'passes'), //which screen to display
                "side", //position
                "high", //priority
                null);
}

function save_show_front_dropdown_value($post_id, $post){
  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['show_front_dropdown_nonce'] ) || !wp_verify_nonce( $_POST['show_front_dropdown_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data */
  $new_meta_value = ( $_POST['show-front'] );

  /* Get the meta key. */
  $meta_key = 'show-front';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

    /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

    /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );

}

// Text box for price for passes
function pass_price_markup(){
  wp_nonce_field(basename(__FILE__), "pass_price_nonce");
  $object = get_post();
  $pass_price = get_post_meta($object->ID, 'price', true);
  ?>
  <span>€</span><input type="number" name="price" id="price" style="width:60px;" value="<?php echo $pass_price ?>">
  <?php

}

function add_pass_price(){
  add_meta_box( "price", //id
                "Price", //title
                "pass_price_markup", //callback
                "passes", //which screen to display
                "normal", //position
                "high", //priority
                null);
}

function save_pass_price_value($post_id, $post){
  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['pass_price_nonce'] ) || !wp_verify_nonce( $_POST['pass_price_nonce'], basename( __FILE__ ) ) )
    return $post_id;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
      return $post_id;

    /* Get the posted data */
    $new_meta_value = ( $_POST['price'] );

    /* Get the meta key. */
    $meta_key = 'price';

    /* Get the meta value of the custom field key. */
    $meta_value = get_post_meta( $post_id, $meta_key, true );

    /* If a new meta value was added and there was no previous value, add it. */
    if ( $new_meta_value && '' == $meta_value )
      add_post_meta( $post_id, $meta_key, $new_meta_value, true );

      /* If the new meta value does not match the old value, update it. */
    elseif ( $new_meta_value && $new_meta_value != $meta_value )
      update_post_meta( $post_id, $meta_key, $new_meta_value );

      /* If there is no new meta value but an old value exists, delete it. */
    elseif ( '' == $new_meta_value && $meta_value )
      delete_post_meta( $post_id, $meta_key, $meta_value );
}

// Features for passes
function pass_features_markup(){
  wp_nonce_field(basename(__FILE__), "pass_features_nonce");
  ?>
  <style>
    .feature {
      width: 400px;
      margin: .5rem;
    }
  </style>
  <div><?php
    for ($i = 1; $i <=6; $i++) {
      $object = get_post();
      $feature = get_post_meta($object->ID, 'feature' . $i, true);
      echo "<span>" . $i . ".</span><input class=\"feature\" type=\"text\" name=\"feature" . $i . "\" value=\"" . $feature . "\" ></br>";

    }
   ?>

  </div>
  <?php
}

function add_pass_features(){
  add_meta_box( "features", //id
                "Feature(s)", //title
                "pass_features_markup", //callback
                "passes", //which screen to display
                "normal", //position
                "high", //priority
                null);
}

function save_pass_features_value($post_id, $post){
  //remember to sanitize
  if ( !isset( $_POST['pass_features_nonce'] ) || !wp_verify_nonce( $_POST['pass_features_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data */
  for ($i = 1; $i <=6; $i++) {
    $new_meta_value = ( $_POST['feature' . $i] );

  /* Get the meta key. */
  $meta_key = 'feature' . $i;

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

    /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

    /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
    }
}

//Author for testimonials
function author_markup(){
  wp_nonce_field(basename(__FILE__), "author_nonce");
  $object = get_post();
  $author = get_post_meta($object->ID, 'q_author', true);
  ?>
  <div><input type="text" value="<?php echo $author ?>" name="author" id="author"></div>
  <?php
}

function add_author(){
  add_meta_box( "author", //id
                "Author", //title
                "author_markup", //callback
                "testimonials", //which screen to display
                "normal", //position
                "high", //priority
                null);
}

function save_author_value($post_id, $post){
  // Verify the nonce before proceeding.
  if ( !isset( $_POST['author_nonce'] ) || !wp_verify_nonce( $_POST['author_nonce'], basename( __FILE__ ) ) )
    return $post_id;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
      return $post_id;

    /* Get the posted data */
    $new_meta_value = ( $_POST['author'] );

    /* Get the meta key. */
    $meta_key = 'q_author';

    /* Get the meta value of the custom field key. */
    $meta_value = get_post_meta( $post_id, $meta_key, true );

    /* If a new meta value was added and there was no previous value, add it. */
    if ( $new_meta_value && '' == $meta_value )
      add_post_meta( $post_id, $meta_key, $new_meta_value, true );

      /* If the new meta value does not match the old value, update it. */
    elseif ( $new_meta_value && $new_meta_value != $meta_value )
      update_post_meta( $post_id, $meta_key, $new_meta_value );

      /* If there is no new meta value but an old value exists, delete it. */
    elseif ( '' == $new_meta_value && $meta_value )
      delete_post_meta( $post_id, $meta_key, $meta_value );
}

//Answer for FAQs
function answer_markup(){
  wp_nonce_field(basename(__FILE__), "answer_nonce");
  $object = get_post();
  $answer = get_post_meta($object->ID, 'answer', true);
  ?>
  <div class=""><textarea name="answer" id="answer" rows="8" cols="80"><?php echo $answer ?></textarea>
  </div>
  <?php
}

function add_answer(){
  add_meta_box( "answer", //id
                "Answer", //title
                "answer_markup", //callback
                "faq", //which screen to display
                "normal", //position
                "high", //priority
                null);
}

function save_answer_value($post_id, $post){
  // Verify the nonce before proceeding.
  if ( !isset( $_POST['answer_nonce'] ) || !wp_verify_nonce( $_POST['answer_nonce'], basename( __FILE__ ) ) )
    return $post_id;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
      return $post_id;

    /* Get the posted data */
    $new_meta_value = ( $_POST['answer'] );

    /* Get the meta key. */
    $meta_key = 'answer';

    /* Get the meta value of the custom field key. */
    $meta_value = get_post_meta( $post_id, $meta_key, true );

    /* If a new meta value was added and there was no previous value, add it. */
    if ( $new_meta_value && '' == $meta_value )
      add_post_meta( $post_id, $meta_key, $new_meta_value, true );

      /* If the new meta value does not match the old value, update it. */
    elseif ( $new_meta_value && $new_meta_value != $meta_value )
      update_post_meta( $post_id, $meta_key, $new_meta_value );

      /* If there is no new meta value but an old value exists, delete it. */
    elseif ( '' == $new_meta_value && $meta_value )
      delete_post_meta( $post_id, $meta_key, $meta_value );
}

  // Set up for all meta boxes
function add_custom_meta_boxes_setup(){
  add_action('add_meta_boxes', 'add_role_dropdown');
  add_action('save_post', 'save_role_dropdown_value', 10, 2);
  add_action('add_meta_boxes', 'add_show_front_dropdown');
  add_action('save_post', 'save_show_front_dropdown_value', 10, 2);
  add_action('add_meta_boxes', 'add_pass_price');
  add_action('save_post', 'save_pass_price_value', 10, 2);
  add_action('add_meta_boxes', 'add_pass_features');
  add_action('save_post', 'save_pass_features_value', 10, 2);
  add_action('add_meta_boxes', 'add_author');
  add_action('save_post', 'save_author_value', 10, 2);
  add_action('add_meta_boxes', 'add_answer');
  add_action('save_post', 'save_answer_value', 10, 2);

}

add_action("load-post.php", "add_custom_meta_boxes_setup");
add_action("load-post-new.php", "add_custom_meta_boxes_setup");


/*
 * Customize columns to custom post type 'artists':
 */

 // Remove 'date' column and add 'role', 'show on front page' and 'feature image' columns
add_filter('manage_edit-artists_columns', 'my_artists_columns');
function my_artists_columns($columns) {
  unset($columns['date']);
  $columns['role'] = 'Role';
  $columns['show-front'] = 'Show on Front Page';
  $columns['feat-img'] = __('Featured Image');
  return $columns;
}

// Add meta data to custom columns
add_action('manage_artists_posts_custom_column', 'my_show_artists_columns');
function my_show_artists_columns($column) {
  global $post;
  switch ($column) {
    case 'role':
      echo get_post_meta($post->ID, 'role', true);
      break;
    case 'feat-img':
      $post_thumbnail_id = get_post_thumbnail_id($post->ID);
      if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
        echo '<img width="100" height="100" src="' . $post_thumbnail_img[0] . '"/>';
      }
      break;
    case 'show-front':
      echo get_post_meta($post->ID, 'show-front', true);
      break;
  }
}

// Make 'Role' column able to "Order by"
add_filter('manage_edit-artists_sortable_columns', 'my_sortable_artists_column');
function my_sortable_artists_column($columns){
  $columns['role'] = 'Role';
  return $columns;
}

// Set how to order by role
add_action('pre_get_posts', 'my_role_orderby');
function my_role_orderby($query){
  if ( ! is_admin() )
    return;

  $orderby = $query->get('orderby');

  if('Role' == $orderby){
      $query->set('meta_key', 'role');
      $query->set('orderby', 'meta_value');
  }
}

//define filter to select posts by 'role'
function add_role_filter(){
  global $post_type;
  if($post_type == 'artists'){
    $values = array(
      'Teacher' => 'teacher',
      'Band' => 'band',
      'DJ' => 'dj',
      'Other' => 'other'
    );
    ?>
    <select name="ADMIN_FILTER_FIELD_VALUE">
      <option value=""><?php _e('All Roles ', ''); ?></option>
      <?php
        $current_v = isset($_GET['ADMIN_FILTER_FIELD_VALUE'])? $_GET['ADMIN_FILTER_FIELD_VALUE']:'';
        foreach ($values as $label => $value) {
          printf
            (
              '<option value="%s"%s>%s</option>',
                $value,
                $value == $current_v? ' selected="selected"':'',
                $label
            );
          }
        ?>
        </select>
        <?php
        }

  }
add_action('restrict_manage_posts', 'add_role_filter');

function role_filter($query){
  global $pagenow;
  $type = 'artists';
  if (isset($_GET['post_type'])) {
    $type = $_GET['post_type'];
  }
  if ('artists' == $type && is_admin() && $pagenow == 'edit.php' && isset($_GET['ADMIN_FILTER_FIELD_VALUE']) && $_GET['ADMIN_FILTER_FIELD_VALUE'] != '') {
    $query->query_vars['meta_key'] = 'role';
    $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE'];
  }
}

add_filter('parse_query', 'role_filter');

/*
 * Customize columns to custom post type 'passes':
 */

 // Remove 'date' column and add 'price' and 'show on front page' columns
 add_filter('manage_edit-passes_columns', 'my_passes_columns');
 function my_passes_columns($columns) {
  unset($columns['date']);
  $columns['price'] = 'Price';
  $columns['show-front'] = 'Show on Front Page';
  //$columns['feat-img'] = __('Featured Image');
  return $columns;
 }

 // Add meta data to custom columns
 add_action('manage_passes_posts_custom_column', 'my_show_passes_columns');
 function my_show_passes_columns($column) {
   global $post;
   switch ($column) {
     case 'price':
       echo "€" . get_post_meta($post->ID, 'price', true) . ",-";
       break;
     case 'show-front':
       echo get_post_meta($post->ID, 'show-front', true);
       break;
   }
 }

/*
 *  Customize columns to custom post type 'testimonials'
 */

 //Add 'author' column
 add_filter('manage_edit-testimonials_columns', 'my_testimonials_columns');
 function my_testimonials_columns($columns) {
   $columns['q_author'] = 'Quote author';
   return $columns;
 }

 //Add meta data to custom $columns
 add_action('manage_testimonials_posts_custom_column', 'my_show_testimonials_columns');
 function my_show_testimonials_columns($column) {
   global $post;
   switch ($column) {
    case 'q_author':
      echo get_post_meta($post->ID, 'q_author', true);
      break;
   }
 }

?>
