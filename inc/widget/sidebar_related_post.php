<?php
  class Related_Post_Sidebar extends WP_Widget {

    //setup the name, description and more
    public function __construct() {

      $widget_ops = array(
        'classname' => 'related-post-sidebar',
        'description' => 'Custom Widget to Show Related Post on Single Sudoway',
      );

      parent::__construct( 'related-post', 'Related Post Sudoway', $widget_ops );
    }

    //back-end display of widget
    public function form( $instace ){
      echo '<p><strong>Widget ini belum bisa diubag secara Manual!</strong><br> Hubungi developer untuk melakukan  perubahan</p>';   
    }

    //front-end display of widget
    public function widget( $args, $instace) {
      
      $orig_post = $post;
      global $post;
      $categories = get_the_category($post->ID);
      if ($categories) {
        $category_ids = array();
        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    
        $args=array(
        'category__in' => $category_ids,
        'post__not_in' => array($post->ID),
        'posts_per_page'=> 6, // Number of related posts that will be shown.
        'caller_get_posts'=>1,
		'post_status'         => 'publish'
        );
      ?>
      <div id="sidebar-related-post">
        <h3 class="title-widget">Related Post</h3>
          <div class="row">              
      <?
      
        $my_query = new wp_query( $args );
        if( $my_query->have_posts() ) {
          while( $my_query->have_posts() ) {
            $my_query->the_post();
        ?>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="single-sidebar-related-post">
                <a href="<? the_permalink(); ?>">
                  <div class="row no-gutters">
                    <div class="col-12">
                      <div class="sidebar-related-post-thumbnails">
                        <a href="<? the_permalink(); ?>">
                          <?
                            the_post_thumbnail('small_thumb');
                          ?> 
                        </a>
                      </div>
                      <div class="sidebar-related-post-content">
                        <!-- <div class="sidebar-related-post-category">
                          <?php
                            $category_detail = get_the_category($post->ID);//$post->ID
                            foreach($category_detail as $cd){
                            ?>
                              <a href="<? echo get_category_link($cd); ?>"><? echo $cd->cat_name; ?></a>
                            <?
                            }
                            ?>
                        </div> -->
                        <h4 class="sidebar-related-post-title"><a href="<? the_permalink(); ?>"> <? the_title(); ?></a></h4>
                      </div> 
                    </div>
                  </div>
                </a>
              </div>
            </div>
        <?
        }
      }
    }
    $post = $orig_post;
        
        ?> 
          </div>        
        </div>        
      <?
      wp_reset_query();
    }
  }

  add_action( 'widgets_init', function() {
    register_widget( 'Related_Post_Sidebar' ); 
  });
?>