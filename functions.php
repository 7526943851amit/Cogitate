<?php



/* adding js */
function my_custom_scripts() {
 
    wp_enqueue_script('jquery-cdn', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), null, true);

	// Slick Carousel CSS and JS enqueue
	wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', array(), null);
	wp_enqueue_style('slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css', array(), null);
	wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery-cdn'), null, true);
    wp_enqueue_script( 'custom-reangesliderjs', get_stylesheet_directory_uri() . '/js/rangeslider.min.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'floatmenus-js', get_stylesheet_directory_uri() . '/js/floating_menu.js', array( 'jquery' ),'',true );
 
}
add_action( 'wp_enqueue_scripts', 'my_custom_scripts' );

/* adding js End */


// Your code to enqueue parent theme styles
function enqueue_parent_styles() {
   wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css' );
   wp_enqueue_style('child-custom-style-new', get_stylesheet_directory_uri() . '/css/rangeslider.min.css', array(), '0.1.0', 'all', false);
   //wp_enqueue_style('child-custom-style-new', get_stylesheet_directory_uri() . '/css/custom-style.css', array(), '0.1.0', 'all', false);
}

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function add_style_at_footer(){
    echo "<link rel='stylesheet' href='https://lightsteelblue-bear-643236.hostingersite.com/wp-content/themes/twentytwentyone-child/css/custom-style.css?ver=0.1.0' media='all' />";
}

add_action( 'wp_footer', 'add_style_at_footer');

function add_script_at_header(){
     echo '<script type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>';
}

add_action( 'wp_head', 'add_script_at_header');

   

/* home page get piost shortocde */
function my_custom_posts_shortcode($atts) {
    ob_start();

    $current_page = get_queried_object();
    $current_slug = isset($current_page->post_name) ? $current_page->post_name : '';

    $atts = shortcode_atts(array(
        'post_type'   => 'resource',
        'post_status' => 'publish',
    ), $atts);


    if ($current_slug === 'personal-lines') {
        $postPerPage = "-1";
        $generalTags = array(
                'relation' => 'OR', // To check for multiple values
                // array(
                //     'key' => 'general_tags',
                //     'value' => '"Commercial";',
                //     'compare' => 'LIKE',
                // ),
                // array(
                //     'key' => 'general_tags',
                //     'value' => '"Speciality";',
                //     'compare' => 'LIKE',
                // ),
                array(
                    'key' => 'general_tags',
                    'value' => '"Personal";',
                    'compare' => 'LIKE',
                ),
            );
    } 


    elseif ($current_slug === 'commercial-lines') {
        $postPerPage = "-1";
        $generalTags = array(
                'relation' => 'OR', // To check for multiple values
                array(
                    'key' => 'general_tags',
                    'value' => '"Commercial";',
                    'compare' => 'LIKE',
                ),
                // array(
                //     'key' => 'general_tags',
                //     'value' => '"Speciality";',
                //     'compare' => 'LIKE',
                // ),
               
            );
    }
    elseif ($current_slug === 'speciality-lines') {
        $postPerPage = "-1";
        $generalTags = array(
                'relation' => 'OR', // To check for multiple values
                // array(
                //     'key' => 'general_tags',
                //     'value' => '"Commercial";',
                //     'compare' => 'LIKE',
                // ),
                array(
                    'key' => 'general_tags',
                    'value' => '"Speciality";',
                    'compare' => 'LIKE',
                ),
               
            );
    }
    elseif ($current_slug === 'segments') {
         $postPerPage = "-1";
        $generalTags = array(
                'relation' => 'OR', // To check for multiple values
                array(
                    'key' => 'general_tags',
                    'value' => '"MGA";',
                    'compare' => 'LIKE',
                ),
                array(
                    'key' => 'general_tags',
                    'value' => '"Program Admin";',
                    'compare' => 'LIKE',
                ),
                array(
                    'key' => 'general_tags',
                    'value' => '"Carriers";',
                    'compare' => 'LIKE',
                ),
            );
    }
//     elseif ($current_slug === 'event-list') {
//         $postPerPage = "-1";
//        $generalTags = array(
//                'relation' => 'OR', 
//                array(
//                    'key' => 'general_tags',
//                    'value' => '"Press Release";',
//                    'compare' => 'LIKE',
//                ),
             
//            );
//    }
   elseif ($current_slug === 'platform') {
    $postPerPage = "-1";
   $generalTags = array(
           'relation' => 'OR', 
           array(
               'key' => 'general_tags',
               'value' => '"Platform";',
               'compare' => 'LIKE',
           ),
         
       );
}
elseif ($current_slug === 'digitaledge-billing') {
    $postPerPage = "-1";
   $generalTags = array(
           'relation' => 'OR', 
           array(
               'key' => 'general_tags',
               'value' => '"Billing";',
               'compare' => 'LIKE',
           ),
         
       );
}
elseif ($current_slug === 'program-administrators') {
    $postPerPage = "-1";
   $generalTags = array(
           'relation' => 'OR', 
           array(
               'key' => 'general_tags',
               'value' => '"Program Admin";',
               'compare' => 'LIKE',
           ),
         
       );
}
elseif ($current_slug === 'carriers') {
    $postPerPage = "-1";
   $generalTags = array(
           'relation' => 'OR', 
           array(
               'key' => 'general_tags',
               'value' => '"Carriers";',
               'compare' => 'LIKE',
           ),
         
       );
}
elseif ($current_slug === 'career') {
    $postPerPage = "-1";
   $generalTags = array(
           'relation' => 'OR', 
           array(
               'key' => 'general_tags',
               'value' => '"Carriers";',
               'compare' => 'LIKE',
           ),
         
       );
}
elseif ($current_slug === 'mga') {
    $postPerPage = "-1";
   $generalTags = array(
           'relation' => 'OR', 
           array(
               'key' => 'general_tags',
               'value' => '"MGA";',
               'compare' => 'LIKE',
           ),
         
       );
}
    else
    {
        $postPerPage = "8";
        $generalTags = array();
    }


    $args = array(
        'post_type' => sanitize_text_field($atts['post_type']),
        'post_status' => sanitize_text_field($atts['post_status']),
        'meta_query' => $generalTags,
        'posts_per_page' => $postPerPage,
    
    ); 
    
    $Newquery = new WP_Query($args);
    
    // echo "<pre>";
    // print_r($Newquery);
    // die;

    if ($Newquery->have_posts()) :
        while ($Newquery->have_posts()) : $Newquery->the_post();
            $title = wp_trim_words(get_the_title(), 8, '...');
            $content = wp_trim_words(get_the_content(), 25, '...'); ?>
            <div class="r_g_wrap">
                <a href="<?php the_permalink(); ?>">
                <figure>
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    <?php endif; ?>
                </figure>
                <div class="r_g_content">
                    <h4 class="r_g_title"><?php echo $title; ?></h4>
                    <p class="r_g_text"><?php echo $content; ?></p>
                </div>
                <div class="r_g_footer">
                    <?php
                    $general_tag = get_field('general_tags');
                    if ($general_tag && is_array($general_tag)) {
                        // Initialize matched tags array
                        $matched_tags = array();
                    
                        // Using if-else statements to determine the matched tags
                        if ($current_slug === 'personal-lines') {
                            $matched_tags = array('Personal');
                        }
                        elseif ($current_slug === 'speciality-lines') {
                            $matched_tags = array('Speciality');
                        }
                        elseif ($current_slug === 'commercial-lines') {
                            $matched_tags = array('Commercial');
                        }
                         elseif ($current_slug === 'segments') {
                            $matched_tags = array('MGA', 'Program Admin', 'Carriers');
                        } elseif ($current_slug === 'platform') {
                            $matched_tags = array('Platform');
                        } elseif ($current_slug === 'career') {
                            $matched_tags = array('Carriers');
                        } elseif ($current_slug === 'mga') {
                            $matched_tags = array('MGA');
                        } 
                        elseif ($current_slug === 'carriers') {
                            $matched_tags = array('Carriers');
                        }
                        elseif ($current_slug === 'digitaledge-billing') {
                            $matched_tags = array('Billing');
                        } 
                        elseif ($current_slug === 'program-administrators') {
                            $matched_tags = array('Program Admin');
                        } 
                       
                        if (empty($matched_tags) && $general_tag && is_array($general_tag)) {
                            $matched_tags = array_slice($general_tag, 0, 1); 
                        }
                    
                    
                       
                        foreach ($matched_tags as $tag) {
                                
                            if (in_array($tag, $general_tag)) {
                                echo '<span class="resource_link1">' . esc_html($tag) . '</span>'; 
                                break; 
                            }
                        }
                    } ?>

                    <?php
                    $format_tag = get_field('format_tagss');
                    if ($format_tag) {
                        echo '<span class="line"></span> <span class="resource_link2">' . esc_html($format_tag) . '</span>';
                        
                        $icon_src = '';
                        if ($format_tag === 'Blog') {
                            $icon_src = get_stylesheet_directory_uri() . '/images/right-arrow.png';
                        } elseif (in_array($format_tag, ['Video', 'video'])) {
                            $icon_src = get_stylesheet_directory_uri() . '/images/post-videoicon.png';
                        } elseif (in_array($format_tag, ['Whitepaper', 'whitepaper', 'Product Brief'])) {
                            $icon_src = get_stylesheet_directory_uri() . '/images/downloadposticon.png';
                        } elseif ($format_tag === 'Article') {
                            $icon_src = get_stylesheet_directory_uri() . '/images/article.png';
                        }

                        if ($icon_src): ?>
                            <span class="r_g_icon">
                                <img src="<?php echo esc_url($icon_src); ?>" alt="<?php echo esc_attr($format_tag); ?>">
                            </span>
                        <?php endif; 
                    } ?>
                </div>
                </a>
            </div>
        <?php
        endwhile;
        wp_reset_postdata(); 
    else :
        echo '<p>No posts found</p>';
    endif;

    return ob_get_clean(); 
}
add_shortcode('my_custom_posts', 'my_custom_posts_shortcode');




function add_hubspot_form_footer($atts) {
    ob_start(); 

?>
<script>

setTimeout(function(){
    hbspt.forms.create({
region: "na1",
portalId: "6150612",
formId: "083e6486-0387-457f-bbe2-eff6e1ce5511",
onFormReady: function($form) {
  const submitInput = $form.find('input[type="submit"]');
  const customButton = `
    <button type="submit" class="newsletterFormBtn">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 33 35"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><image width="33" height="35" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAjCAYAAAAaLGNkAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA8lpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDYuMC1jMDAyIDc5LjE2NDQ4OCwgMjAyMC8wNy8xMC0yMjowNjo1MyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjAyMSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjcwRkYyQTRDNkU3MjExRUZBMDRGODUyRTk0MTBBMDczIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjcwRkYyQTRENkU3MjExRUZBMDRGODUyRTk0MTBBMDczIj4gPGRjOnRpdGxlPiA8cmRmOkFsdD4gPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5Db3B5IG9mIENvZ2l0YXRlIFByb2R1Y3QgUGFnZSAtIEZpbmFsIC0gMTwvcmRmOmxpPiA8L3JkZjpBbHQ+IDwvZGM6dGl0bGU+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjcwRkYyQTRBNkU3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"></image></g></g></svg>
    </button>`;
  submitInput.replaceWith(customButton);
  const style = document.createElement('style');
  style.textContent = `
input#email-083e6486-0387-457f-bbe2-eff6e1ce5511 {
background: #eee;
border: 0;
height: 46px;
width: 190px;
max-width: 150px;
font-size: 16px;
outline: none;
box-shadow: none;
}
label#label-email-083e6486-0387-457f-bbe2-eff6e1ce5511 {
display: none;
}
button.newsletterFormBtn {
background: #FFF;
height: 46px;
width: 46px;
padding: 13px;
display: flex;
align-items: center;
min-width: 46px;
cursor: pointer;
border: 1px solid #fff;
}
button.newsletterFormBtn:hover svg {
filter: brightness(0) saturate(100%) invert(100%) sepia(6%) saturate(1%) hue-rotate(35deg) brightness(109%) contrast(101%);
}
button.newsletterFormBtn:hover {
background-image: linear-gradient(217deg, #1851B3 0%, #2D76FF 100%);
}
.hbspt-form form#hsForm_083e6486-0387-457f-bbe2-eff6e1ce5511 {
display: block;
gap: 10px;
max-width: 260px;
position: relative;
padding-right: 46px;
box-sizing: border-box;
}
.hbspt-form  .hs_submit.hs-submit {
position: absolute;
top: 0;
right: 0;
}
.hbspt-form input#email-083e6486-0387-457f-bbe2-eff6e1ce5511 {
width: 200px;
max-width: 200px;
}
.hbspt-form .actions {
margin: 0;
padding: 0;
}
.hs-form .field {
margin-bottom: 0;
}
#hsForm_083e6486-0387-457f-bbe2-eff6e1ce5511 input {
border-radius: 0;
}
.hs_error_rollup{
display:none;
}
.hbspt-form input#email-083e6486-0387-457f-bbe2-eff6e1ce5511 {
max-width: 200px;
width: 94% !important;
}
.newsletterFormBtn svg {
width: 25px;
height: 25px;
}
  `;
  $form.append(style);
}
});
},3000)


</script>
<?php

    return ob_get_clean(); 
}
add_shortcode('hubspot_footer', 'add_hubspot_form_footer');




/* end */


/*  Add Testimonials Post Type */
function create_testimonials_post_type() {
    $labels = array(
        'name'                  => _x('Testimonials', 'Post type general name'),
        'singular_name'         => _x('Testimonial', 'Post type singular name'),
        'menu_name'             => _x('Testimonials', 'Admin Menu text'),
        'name_admin_bar'        => _x('Testimonial', 'Add New on Toolbar'),
        'add_new'               => __('Add New'),
        'add_new_item'          => __('Add New Testimonial'),
        'new_item'              => __('New Testimonial'),
        'edit_item'             => __('Edit Testimonial'),
        'view_item'             => __('View Testimonial'),
        'all_items'             => __('All Testimonials'),
        'search_items'          => __('Search Testimonials'),
        'parent_item_colon'     => __('Parent Testimonials:'),
        'not_found'             => __('No Testimonials found.'),
        'not_found_in_trash'    => __('No Testimonials found in Trash.'),
        'featured_image'        => _x('Testimonial Featured Image', 'Overrides the “Featured Image” phrase for this post type.'),
        'set_featured_image'    => _x('Set featured image', 'Overrides the “Set featured image” phrase for this post type.'),
        'remove_featured_image' => _x('Remove featured image', 'Overrides the “Remove featured image” phrase for this post type.'),
        'use_featured_image'    => _x('Use as featured image', 'Overrides the “Use as featured image” phrase for this post type.'),
        'archives'              => _x('Testimonial Archives', 'The post type archive label used in nav menus. Default “Post Archives”.'),
        'insert_into_item'      => _x('Insert into Testimonial', 'Overrides the “Insert into post”/“Insert into page” phrase.'),
        'uploaded_to_this_item' => _x('Uploaded to this Testimonial', 'Overrides the “Uploaded to this post/page” phrase.'),
        'filter_items_list'     => _x('Filter Testimonials list', 'Screen reader text for the filter links heading on the post type listing screen.'),
        'items_list_navigation' => _x('Testimonials list navigation', 'Screen reader text for the pagination heading on the post type listing screen.'),
        'items_list'            => _x('Testimonials list', 'Screen reader text for the items list heading on the post type listing screen.'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'testimonials'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6, 
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'show_in_rest'       => true,
	    'taxonomies'         => array('category', 'post_tag'), 

    );

    register_post_type('testimonial', $args);
}

add_action('init', 'create_testimonials_post_type');




function create_events_post_type() {
    $labels = array(
        'name'                  => _x('Events', 'Post type general name'),
        'singular_name'         => _x('Event', 'Post type singular name'),
        'menu_name'             => _x('Events', 'Admin Menu text'),
        'name_admin_bar'        => _x('Event', 'Add New on Toolbar'),
        'add_new'               => __('Add New'),
        'add_new_item'          => __('Add New Event'),
        'new_item'              => __('New Event'),
        'edit_item'             => __('Edit Event'),
        'view_item'             => __('View Event'),
        'all_items'             => __('All Events'),
        'search_items'          => __('Search Events'),
        'parent_item_colon'     => __('Parent Events:'),
        'not_found'             => __('No Events found.'),
        'not_found_in_trash'    => __('No Events found in Trash.'),
        'featured_image'        => _x('Event Featured Image', 'Overrides the “Featured Image” phrase for this post type.'),
        'set_featured_image'    => _x('Set featured image', 'Overrides the “Set featured image” phrase for this post type.'),
        'remove_featured_image' => _x('Remove featured image', 'Overrides the “Remove featured image” phrase for this post type.'),
        'use_featured_image'    => _x('Use as featured image', 'Overrides the “Use as featured image” phrase for this post type.'),
        'archives'              => _x('Event Archives', 'The post type archive label used in nav menus. Default “Post Archives”.'),
        'insert_into_item'      => _x('Insert into Event', 'Overrides the “Insert into post”/“Insert into page” phrase.'),
        'uploaded_to_this_item' => _x('Uploaded to this Event', 'Overrides the “Uploaded to this post/page” phrase.'),
        'filter_items_list'     => _x('Filter Events list', 'Screen reader text for the filter links heading on the post type listing screen.'),
        'items_list_navigation' => _x('Events list navigation', 'Screen reader text for the pagination heading on the post type listing screen.'),
        'items_list'            => _x('Events list', 'Screen reader text for the items list heading on the post type listing screen.'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'events'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'show_in_rest'       => true,
        'taxonomies'         => array('category', 'post_tag'),
    );

    register_post_type('event', $args);
}

add_action('init', 'create_events_post_type');


// get events post 





/* Testimonials Post Type End */

// /* leadership Post Type */
function create_leadership_post_type() {
    $labels = array(
        'name'                  => _x('Leadership', 'Post type general name'),
        'singular_name'         => _x('Leadership', 'Post type singular name'),
        'menu_name'             => _x('Leadership', 'Admin Menu text'),
        'name_admin_bar'        => _x('Leadership', 'Add New on Toolbar'),
        'add_new'               => __('Add New'),
        'add_new_item'          => __('Add New Leadership'),
        'new_item'              => __('New Leadership'),
        'edit_item'             => __('Edit Leadership'),
        'view_item'             => __('View Leadership'),
        'all_items'             => __('All Leaderships'),
        'search_items'          => __('Search Leaderships'),
        'parent_item_colon'     => __('Parent Leaderships:'),
        'not_found'             => __('No Leaderships found.'),
        'not_found_in_trash'    => __('No Leaderships found in Trash.'),
        'featured_image'        => _x('Leadership Featured Image', 'Overrides the “Featured Image” phrase for this post type.'),
        'set_featured_image'    => _x('Set featured image', 'Overrides the “Set featured image” phrase for this post type.'),
        'remove_featured_image' => _x('Remove featured image', 'Overrides the “Remove featured image” phrase for this post type.'),
        'use_featured_image'    => _x('Use as featured image', 'Overrides the “Use as featured image” phrase for this post type.'),
        'archives'              => _x('Leadership Archives', 'The post type archive label used in nav menus. Default “Post Archives”.'),
        'insert_into_item'      => _x('Insert into Leadership', 'Overrides the “Insert into post”/“Insert into page” phrase.'),
        'uploaded_to_this_item' => _x('Uploaded to this Leadership', 'Overrides the “Uploaded to this post/page” phrase.'),
        'filter_items_list'     => _x('Filter Leaderships list', 'Screen reader text for the filter links heading on the post type listing screen.'),
        'items_list_navigation' => _x('Leaderships list navigation', 'Screen reader text for the pagination heading on the post type listing screen.'),
        'items_list'            => _x('Leaderships list', 'Screen reader text for the items list heading on the post type listing screen.'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'leaderships'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6, 
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'show_in_rest'       => true,
        'taxonomies'         => array('category', 'post_tag'), 
    );

    register_post_type('leadership', $args);
}

add_action('init', 'create_leadership_post_type');


// /* leadership Post Type End */ 


/* testimonial shortcode */

function my_testimonial_shortcode() {
    $query = new WP_Query(array(
        'post_type' => 'testimonial',
        'post_status' => 'publish',
        'posts_per_page' => -1 
    ));


    ob_start();
    ?>

    <div class="testimonial_sec">
        <div class="testimonial_wrap">
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="testimonial_block">
                        <p><?php the_content(); ?></p>
                        <div class="client_info_wrap">
                            <div class="client_brand_logo">
                                <img src="<?php echo esc_url(get_field('brand_logo')); ?>" alt="Client Brand Logo">
                            </div>
                            <div class="client_info">
                                <h5><?php echo esc_html(get_field('client_name')); ?></h5>
                                <span><?php echo esc_html(get_field('client_designation')); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>No testimonials found</p>
            <?php endif; ?>
        </div>
    </div>

    <?php
    return ob_get_clean();
}


add_shortcode('my_testimonials', 'my_testimonial_shortcode');

/* testimonial shortcode end */



/* floating menu sidebar */
function floating_menu_shortcode() {
    if (is_front_page()) {
        ob_start(); 
        ?>
        <ul class="floating_menu">
   <li class="f_m_item active">
      <a data-href="#home-section">
         <div class="f_m-icon">
            <svg height="32" id="icon" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><circle cx="16" cy="16" r="8"/><rect class="cls-1" data-name="&lt;Transparent Rectangle&gt;" height="32" id="_Transparent_Rectangle_" width="32"/></svg>
         </div>
         <div class="f_m_label">
            Home
         </div>
      </a>
   </li>
      <li class="f_m_item">
      <a data-href="#our-products">
         <div class="f_m-icon">
            <svg height="32" id="icon" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><circle cx="16" cy="16" r="8"/><rect class="cls-1" data-name="&lt;Transparent Rectangle&gt;" height="32" id="_Transparent_Rectangle_" width="32"/></svg>
         </div>
         <div class="f_m_label">
         Products
         </div>
      </a>
   </li>
    
      <li class="f_m_item">
      <a data-href="#plateforms">
         <div class="f_m-icon">
            <svg height="32" id="icon" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><circle cx="16" cy="16" r="8"/><rect class="cls-1" data-name="&lt;Transparent Rectangle&gt;" height="32" id="_Transparent_Rectangle_" width="32"/></svg>
         </div>
         <div class="f_m_label">
            Platform
         </div>
      </a>
   </li>
  
   <li class="f_m_item">
      <a data-href="#Segments">
         <div class="f_m-icon">
            <svg height="32" id="icon" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><circle cx="16" cy="16" r="8"/><rect class="cls-1" data-name="&lt;Transparent Rectangle&gt;" height="32" id="_Transparent_Rectangle_" width="32"/></svg>
         </div>
         <div class="f_m_label">
            Segments
         </div>
      </a>
   </li>
   <li class="f_m_item">
      <a data-href="#our-features">
         <div class="f_m-icon">
            <svg height="32" id="icon" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><circle cx="16" cy="16" r="8"/><rect class="cls-1" data-name="&lt;Transparent Rectangle&gt;" height="32" id="_Transparent_Rectangle_" width="32"/></svg>
         </div>
         <div class="f_m_label">
            Benefits
         </div>
      </a>
   </li>
     <li class="f_m_item">
      <a data-href="#Calculator">
         <div class="f_m-icon">
            <svg height="32" id="icon" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><circle cx="16" cy="16" r="8"/><rect class="cls-1" data-name="&lt;Transparent Rectangle&gt;" height="32" id="_Transparent_Rectangle_" width="32"/></svg>
         </div>
         <div class="f_m_label">
         Calculator 
         </div>
      </a>
   </li>
   <li class="f_m_item">
      <a data-href="#testimonials">
         <div class="f_m-icon">
            <svg height="32" id="icon" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><circle cx="16" cy="16" r="8"/><rect class="cls-1" data-name="&lt;Transparent Rectangle&gt;" height="32" id="_Transparent_Rectangle_" width="32"/></svg>
         </div>
         <div class="f_m_label">
            Testimonials
         </div>
      </a>
   </li>
     <li class="f_m_item">
      <a data-href="#insights-section">
         <div class="f_m-icon">
            <svg height="32" id="icon" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><circle cx="16" cy="16" r="8"/><rect class="cls-1" data-name="&lt;Transparent Rectangle&gt;" height="32" id="_Transparent_Rectangle_" width="32"/></svg>
         </div>
         <div class="f_m_label">
            Insights
         </div>
      </a>
   </li>
      <li class="f_m_item">
      <a data-href="#footer-section">
         <div class="f_m-icon">
            <svg height="32" id="icon" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><circle cx="16" cy="16" r="8"/><rect class="cls-1" data-name="&lt;Transparent Rectangle&gt;" height="32" id="_Transparent_Rectangle_" width="32"/></svg>
         </div>
         <div class="f_m_label">
            Footer
         </div>
      </a>
   </li>
</ul>
<?php
        return ob_get_clean(); 
    }
}
add_shortcode('floating_menu', 'floating_menu_shortcode');

/* resources post type */
function create_resources_post_type() {
    $labels = array(
        'name'                  => _x('Resources', 'Post type general name'),
        'singular_name'         => _x('Resource', 'Post type singular name'),
        'menu_name'             => _x('Resources', 'Admin Menu text'),
        'name_admin_bar'        => _x('Resource', 'Add New on Toolbar'),
        'add_new'               => __('Add New'),
        'add_new_item'          => __('Add New Resource'),
        'new_item'              => __('New Resource'),
        'edit_item'             => __('Edit Resource'),
        'view_item'             => __('View Resource'),
        'all_items'             => __('All Resources'),
        'search_items'          => __('Search Resources'),
        'parent_item_colon'     => __('Parent Resource:'),
        'not_found'             => __('No Resources found.'),
        'not_found_in_trash'    => __('No Resources found in Trash.'),
        'featured_image'        => _x('Resource Featured Image', 'Overrides the “Featured Image” phrase for this post type.'),
        'set_featured_image'    => _x('Set featured image', 'Overrides the “Set featured image” phrase for this post type.'),
        'remove_featured_image' => _x('Remove featured image', 'Overrides the “Remove featured image” phrase for this post type.'),
        'use_featured_image'    => _x('Use as featured image', 'Overrides the “Use as featured image” phrase for this post type.'),
        'archives'              => _x('Resource Archives', 'The post type archive label used in nav menus. Default “Post Archives”.'),
        'insert_into_item'      => _x('Insert into Resource', 'Overrides the “Insert into post”/“Insert into page” phrase.'),
        'uploaded_to_this_item' => _x('Uploaded to this Resource', 'Overrides the “Uploaded to this post/page” phrase.'),
        'filter_items_list'     => _x('Filter Resources list', 'Screen reader text for the filter links heading on the post type listing screen.'),
        'items_list_navigation' => _x('Resources list navigation', 'Screen reader text for the pagination heading on the post type listing screen.'),
        'items_list'            => _x('Resources list', 'Screen reader text for the items list heading on the post type listing screen.'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'resource'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'show_in_rest'       => true,
        'taxonomies'         => array('category', 'post_tag'),
    );

    register_post_type('resource', $args);
}

add_action('init', 'create_resources_post_type');
/* resources post type  end */
// Shortcode for displaying resource list
function resources_list_shortcode() {
    ob_start();

    // Fetch unique format tags from posts
    $args = array(
        'post_type' => 'resource',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );

    $query = new WP_Query($args);
    $tags = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $format_tags = get_field('format_tagss');

            if ($format_tags) {
                $tags[] = $format_tags;
            }
        }
    }

    // Get unique tags
    $unique_tags = array_unique($tags);
    
    wp_reset_postdata();

    
    ?>
    <script>
    jQuery(document).ready(function($) {
        // $('.elementor-icon-list-items a').first().addClass('active');

        var ajaxurl = '<?php echo esc_url(admin_url('admin-ajax.php')); ?>';
        $('.elementor-icon-list-items a[data-title="All"]').addClass('active');
        function loadResources(title) {
            $.ajax({
                url: ajaxurl, 
                type: 'POST',
                data: {
                    action: 'check_resource_match',
                    title: title
                },
                success: function(response) {
                    $('#resource-results').html(response);
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', error);
                }
            });
        }
       
        loadResources('All'); 

        $('.elementor-icon-list-items a').on('click', function(event) {
            event.preventDefault(); 
            var title = $(this).data('title'); 

            console.log('title',title);

            $('.elementor-icon-list-items a').removeClass('active'); // Remove active class from all links
            $(this).addClass('active'); 

            loadResources(title); 
        });
    });
    </script>
    <div id="resource-results"></div>
    <?php

    return ob_get_clean();
}

add_shortcode('resources_list', 'resources_list_shortcode');

// AJAX function to fetch resources based on the selected title
function check_resource_match() {
    if (!isset($_POST['title'])) {
        wp_send_json_error('No title specified');
    }

    $title = sanitize_text_field($_POST['title']);
    $args = array(
        'post_type'      => 'resource', 
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    );

    if ($title !== 'All') {
        $args['meta_query'] = array(
            'relation' => 'OR',
            array(
                'key'     => 'general_tags', 
                'value'   => $title,
                'compare' => 'LIKE',
            ),
            array(
                'key'     => 'format_tagss',
                'value'   => $title,
                'compare' => 'LIKE',
            ),
        );
    }

    $query = new WP_Query($args);
    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div class="r_g_wrap2">
                <a href="<?php the_permalink(); ?>">
                    <figure>
                        <?php if (has_post_thumbnail()): ?>
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                        <?php endif; ?>
                    </figure>
                    <div class="r_g_content">
                        <div class="r_g_textwrap">
                            <h4 class="r_g_title"><?php the_title(); ?></h4>
                            <p class="r_g_text">
                                <?php
                                // $content = wp_trim_words(get_the_content(), 10, '.'); 
                                // if (has_excerpt()) {
                                //     echo '<p class="r_g_text">' . get_the_excerpt() . '</p>';
                                // } else {
                                //     echo $content;
                                // } 
                                echo wp_kses_post(get_field('small_description'));

                                ?>
                            </p>
                        </div>
                        <div class="r_g_footer">
                            <?php
                           $general_tag = get_field('general_tags');
                           if ($general_tag && is_array($general_tag)) :
                               if (in_array($title, $general_tag)) {
                                   echo '<span class="resource_link1">' . esc_html($title) . '</span>';
                               } else {

                                   echo '<span class="resource_link1">' . esc_html($general_tag[0]) . '</span>';
                               }
                           endif;
                           
                              ?>
                            <?php
                            $format_tag = get_field('format_tagss');
                            if ($format_tag) : ?> 
                                <span class="line"></span><span class="resource_link2"><?php echo esc_html($format_tag); ?></span>
                                <?php
                                $icon_src = '';
                                if ($format_tag == 'Blog') {
                                    $icon_src = get_stylesheet_directory_uri() . '/images/right-arrow.png';
                                }
                                //  elseif ($format_tag == 'Download') {
                                //     $icon_src = get_stylesheet_directory_uri() . '/images/downloadposticon.png';
                                // } 
                                elseif ($format_tag == 'Video') {
                                    $icon_src = get_stylesheet_directory_uri() . '/images/post-videoicon.png';
                                } elseif ($format_tag == 'Whitepaper') {
                                    $icon_src = get_stylesheet_directory_uri() . '/images/downloadposticon.png';
                                } elseif ($format_tag == 'Article') {
                                    $icon_src = get_stylesheet_directory_uri() . '/images/article.png';
                                } elseif ($format_tag == 'Product Brief') {
                                    $icon_src = get_stylesheet_directory_uri() . '/images/downloadposticon.png';
                                }
                                if ($icon_src): ?>
                                    <span class="r_g_icon">
                                        <img src="<?php echo esc_url($icon_src); ?>" alt="<?php echo esc_attr($format_tag); ?>">
                                    </span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
    } else {
        echo '<span class="no_matching">No matching posts found</span>';
    }

    wp_reset_postdata();
    wp_die(); 
}

add_action('wp_ajax_check_resource_match', 'check_resource_match');
add_action('wp_ajax_nopriv_check_resource_match', 'check_resource_match');



/* news post type */
function create_news_post_type() {
    $labels = array(
        'name'                  => _x('News', 'Post type general name'),
        'singular_name'         => _x('News Item', 'Post type singular name'),
        'menu_name'             => _x('News', 'Admin Menu text'),
        'name_admin_bar'        => _x('News Item', 'Add New on Toolbar'),
        'add_new'               => __('Add New'),
        'add_new_item'          => __('Add New News Item'),
        'new_item'              => __('New News Item'),
        'edit_item'             => __('Edit News Item'),
        'view_item'             => __('View News Item'),
        'all_items'             => __('All News Items'),
        'search_items'          => __('Search News Items'),
        'parent_item_colon'     => __('Parent News Item:'),
        'not_found'             => __('No News Items found.'),
        'not_found_in_trash'    => __('No News Items found in Trash.'),
        'featured_image'        => _x('News Featured Image', 'Overrides the “Featured Image” phrase for this post type.'),
        'set_featured_image'    => _x('Set featured image', 'Overrides the “Set featured image” phrase for this post type.'),
        'remove_featured_image' => _x('Remove featured image', 'Overrides the “Remove featured image” phrase for this post type.'),
        'use_featured_image'    => _x('Use as featured image', 'Overrides the “Use as featured image” phrase for this post type.'),
        'archives'              => _x('News Archives', 'The post type archive label used in nav menus. Default “Post Archives”.'),
        'insert_into_item'      => _x('Insert into News Item', 'Overrides the “Insert into post”/“Insert into page” phrase.'),
        'uploaded_to_this_item' => _x('Uploaded to this News Item', 'Overrides the “Uploaded to this post/page” phrase.'),
        'filter_items_list'     => _x('Filter News Items list', 'Screen reader text for the filter links heading on the post type listing screen.'),
        'items_list_navigation' => _x('News Items list navigation', 'Screen reader text for the pagination heading on the post type listing screen.'),
        'items_list'            => _x('News Items list', 'Screen reader text for the items list heading on the post type listing screen.'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'news'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'show_in_rest'       => true,
        'taxonomies'         => array('category', 'post_tag'),
    );

    register_post_type('news', $args);
}

add_action('init', 'create_news_post_type');
/* news post type end */




/* single post widget */


if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Single post Left one',
        'id'   => 'single-left-widget-one',
        'description'   => 'Single Post Left One widget position',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));

    register_sidebar(array(
        'name' => 'Single post Left Two',
        'id'   => 'single-left-widget-two',
        'description'   => 'Single Post Left two  widget position',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));

}
/* single post widget end */

// Enqueue admin scripts
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_scripts');

function enqueue_custom_admin_scripts($hook) {
    // Check if we are on a post edit screen
    if ('post.php' === $hook || 'post-new.php' === $hook) {
        global $post;
        
        // List of post types to enqueue the script for
        $post_types = array('news', 'resource', 'post','testimonial');
        
        // Check if the current post type is in the list
        if (isset($post) && in_array($post->post_type, $post_types)) {
            wp_enqueue_script('custom-meta-box', get_stylesheet_directory_uri() . '/js/custom-meta-box.js', array('jquery'), null, true);
        }
    }
}

add_action('add_meta_boxes', 'add_custom_meta_box');
function add_custom_meta_box() {
    // List of post types to add meta boxes for
    $post_types = array('news', 'resource', 'post','testimonial');

    foreach ($post_types as $post_type) {
        add_meta_box(
            'custom_meta_box_id_' . $post_type,      // Unique ID for each post type
            'Select Related Posts',                 // Title
            'render_custom_meta_box',               // Callback function
            $post_type,                             // Post type
            'normal',                                 // Context
            'default'                               // Priority
        );
    }
}


function render_custom_meta_box($post) {
    global $post;
    
    $post_type = get_post_type($post->ID); // Get the current post type
    $meta_key = '_related_' . $post_type; // Unique meta key for each post type

    // Add nonce for security
    wp_nonce_field('save_custom_meta_box_data', 'custom_meta_box_nonce');

    // Retrieve the selected post IDs from the post meta
    $selected_posts = get_post_meta($post->ID, $meta_key, true);

    if (!is_array($selected_posts)) {
        $selected_posts = array();
    }

    // Get all posts of the current post type
    $args = array(
        'post_type'      => $post_type,
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'post__not_in'   => array($post->ID) // Exclude the current post
    );
    $posts = get_posts($args);

    // Calculate the total number of selected posts
    $total_selected_count = count($selected_posts);
    ?>

    <select name="related_posts[]" multiple="multiple" style="width: 100%; height: 150px;">
        <?php foreach ($posts as $p) : ?>
            <?php
            // Count how many times each post ID is selected
            $selected_count = in_array($p->ID, $selected_posts) ? 1 : 0;
            ?>
            <option value="<?php echo esc_attr($p->ID); ?>" <?php selected($selected_count); ?> <?php if($selected_count > 0) { ?>style="background:#2d76ff;color:#fff;"<?php } ?>>
                <?php echo esc_html($p->post_title); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <p class="description">Select up to 10 related posts. Total selected: <?php echo esc_html($total_selected_count); ?></p>

    <?php
}

add_action('save_post', 'save_custom_meta_box_data');
function save_custom_meta_box_data($post_id) {
    // Check if our nonce is set.
    if (!isset($_POST['custom_meta_box_nonce'])) {
        return $post_id;
    }

    $nonce = $_POST['custom_meta_box_nonce'];

    // Verify that the nonce is valid.
    if (!wp_verify_nonce($nonce, 'save_custom_meta_box_data')) {
        return $post_id;
    }

    // Check if this is an autosave.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // Check the user's permissions.
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // Get the current post type
    $post_type = get_post_type($post_id);
    $meta_key = '_related_' . $post_type;

    // Check if related_posts is set and is an array
    if (isset($_POST['related_posts']) && is_array($_POST['related_posts'])) {

        $selected_posts = array_map('intval', $_POST['related_posts']);
        
        // Limit to 10 posts
        if (count($selected_posts) > 10) {
            // Set a transient to show an error message
            set_transient('related_posts_error_' . $post_id, 'You can only select up to 10 related posts.', 60);

            // Redirect back to the edit screen
            wp_redirect(add_query_arg('message', 'error', get_edit_post_link($post_id, 'url')));
            exit;
        }

        // Update the meta field
        update_post_meta($post_id, $meta_key, $selected_posts);
    } else {
        // If no related posts selected, delete the meta field
        delete_post_meta($post_id, $meta_key);
    }
}


// Register the shortcode
add_shortcode('related_posts', 'display_related_posts_shortcode');

function display_related_posts_shortcode($atts) {
    // Extract shortcode attributes, set defaults if needed
    $atts = shortcode_atts(array(
        'post_id' => get_the_ID(), // Default to the current post ID
    ), $atts);

    // Get the post ID from shortcode attributes
    $post_id = intval($atts['post_id']);
    
    // Retrieve the related post IDs from the meta field
    $post_type = get_post_type($post_id); // Get the current post type
    $meta_key = '_related_' . $post_type; // Meta key for related posts
    $related_post_ids = get_post_meta($post_id, $meta_key, true);
    
    if (!is_array($related_post_ids)) {
        $related_post_ids = array();
    }

    if (empty($related_post_ids)) {
        return ''; // Return an empty string if no related posts found
    }

    // Start output buffering
    ob_start();

    // Display related posts
    echo '<ul class="related-posts">';
    foreach ($related_post_ids as $post) { ?>
        <li>
            <a href="<?php echo get_the_permalink($post); ?>"><?php echo get_the_title($post); ?></a>
        </li>
        <?php
    }
    echo '</ul>';

    // Return the buffered content
    return ob_get_clean();
}



/* file download */

function get_file_download_link($file_url) {
    $file_url = esc_url_raw($file_url);
    
    if (filter_var($file_url, FILTER_VALIDATE_URL)) {
        $nonce = wp_create_nonce('file_download_nonce');
        
        $download_url = add_query_arg(array(
            'action' => 'file_download',
            'file' => urlencode($file_url),
            '_wpnonce' => $nonce
        ), home_url('/'));
        
        return '<a class="tab_button single-resource-btn" href="' . esc_url($download_url) . '">Download <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.39 30.89"><defs><style>.cls-1{fill:#fff;opacity:0.58;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M.3,1.28,16.38,0a.32.32,0,0,1,.23.07L29.09,10.36a6.31,6.31,0,0,1,.6,9.18l-.11.12a4.84,4.84,0,0,1-6.57.48L.12,1.86A.33.33,0,0,1,.3,1.28Z"></path><path class="cls-1" d="M.7,30.05l16.1.84a.38.38,0,0,0,.23-.08L29.16,20.25a6.4,6.4,0,0,0,.35-9.32h0a4.94,4.94,0,0,0-6.7-.31L.51,29.46A.33.33,0,0,0,.7,30.05Z"></path></g></g></svg></a>';
    } else {
        return 'Invalid file URL.';
    }
}

/**
 * Handles the file download request.
 */
function handle_file_download() {
    if (isset($_GET['action']) && $_GET['action'] === 'file_download' && isset($_GET['file']) && wp_verify_nonce($_GET['_wpnonce'], 'file_download_nonce')) {
        $file_url = esc_url_raw($_GET['file']);
        
        // Validate the file URL
        if (filter_var($file_url, FILTER_VALIDATE_URL)) {
            $file_path = parse_url($file_url, PHP_URL_PATH);
            $file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path;

       
            if (file_exists($file_path)) {
        
                header('Content-Description: File Transfer');
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file_path));
                readfile($file_path);
                exit;
            } else {
                wp_die('File not found.');
            }
        } else {
            wp_die('Invalid file URL.');
        }
    }
}
add_action('init', 'handle_file_download');

/* donwload pdf end */
    

function copyright_shortcode() {
    return '<span class="OYPEnA">Copyright ©️ ' . date("Y") . ' Cogitate All Rights Reserved.</span>';
}
add_shortcode('copyright', 'copyright_shortcode');




// Get Event Post Data 
function display_events_shortcode() {

    $args = array(
        'post_type' => 'event', 
        'posts_per_page' => -1, 
    );
    
    $query = new WP_Query($args);
    
    ob_start(); // Start output buffering
    ?>
    <section class="eventList">
        <div class="siteCont">
            <ul class="eventBox">
                <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                    <li>
                        <div class="eventImg">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <div class="tagName"><?php the_terms(get_the_ID(), 'category', '', ', '); ?></div>
                        </div>
                        <div class="accorCont">
                            <div class="accorHead active">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2><?php the_title(); ?></h2>
                                    <div class="arrow"><i class="fa fa-arrow-down" aria-hidden="true"></i></div>
                                </div>
                                <p class="date"><?php echo get_the_date(); ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <p class="tag"><?php the_terms(get_the_ID(), 'event_category', '', ', '); ?></p>
                                    <ul class="d-flex align-items-end">
    <li>
        <a href="https://twitter.com/share?url=<?php echo urlencode(get_the_permalink(get_the_ID())); ?>&text=<?php echo urlencode(get_the_title(get_the_ID())); ?>" target="_blank">
            <img alt="Twitter" src="https://uatapps.cogitate.us/cogitatecms/images/new-img/twitterSI.svg" width="24" height="24">
        </a>
    </li>
    <li>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_the_permalink(get_the_ID())); ?>" target="_blank">
            <i class="fa fa-linkedin-square ms-3" aria-hidden="true"></i>
        </a>
    </li>
    <li>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink(get_the_ID())); ?>" target="_blank">
            <i class="fa fa-facebook-square ms-3" aria-hidden="true"></i>
        </a>
    </li>
</ul>
                                </div>
                            </div>
                            <div class="accorInner" style="display: block;">
                                <h3 class="mb-1">Topic</h3>
                                <p><?php the_title(); ?></p>
                                <h3 class="mb-1">Description</h3>
                                <p><?php the_content(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="linkBtn" target="_blank">Read More</a>
                            </div>
                        </div>
                    </li>
                <?php endwhile; else : ?>
                    <li>No events found.</li>
                <?php endif; wp_reset_postdata(); ?>
            </ul>
        </div>
    </section>
    <?php
    return ob_get_clean(); // Return the buffered content
}

// Register the shortcode
add_shortcode('display_events', 'display_events_shortcode');



// End event post data
