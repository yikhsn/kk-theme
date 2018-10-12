<?php
  class Recent_Post_Sudoway extends WP_Widget {

    //setup the name, description and more
    public function __construct() {

      $widget_ops = array(
        'classname' => 'recent-post-sudoway',
        'description' => 'Custom Widget Recent Post for Sudoway',
      );

      parent::__construct( 'recent-post', 'Recent Post Sudoway', $widget_ops );

    }

    //back-end display of widget
    public function form( $instace ){
      echo '<p><strong>Widget ini belum bisa diubag secara Manual!</strong><br> Hubungi developer untuk melakukan  perubahan</p>';   
    }

    //front-end display of widget
    public function widget( $args, $instace) {
      ?>
      <div id="widget-recent-post">
        <h3 class="title-widget">Recent Post</h3>
        <?
          $args = array(  'numberposts'         => '6',
                          'post_type'           => 'post',
                          'post_status'         => 'publish'
          );

          $recent_posts = wp_get_recent_posts( $args );
          foreach( $recent_posts as $recent ){
        ?>
          <div class="container single-widget-recent-post">
            <div class="row no-gutters">
              <div class="col-4 col-sm-4">
                <div class="widget-recent-post-thumbnails">
                  <a href="<? the_permalink(); ?>">
                  <?
                    echo get_the_post_thumbnail($recent["ID"]);
                  ?>
                  </a>
                </div>
              </div>
              <div class="col-8 col-sm-8">
                <div class="widget-recent-post-content">
                  <div class="widget-recent-post-category">
                    <?php
                    $category_detail = get_the_category($recent["ID"]);
                    $firstCategory = $category_detail[0]->cat_name;
                    $linkFirstCategory = get_category_link($category_detail[0]->cat_ID);
                    ?>
                    <a href="<? echo esc_url($linkFirstCategory); ?>">
                      <span> <? echo $firstCategory; ?></span>
                    </a>
                  </div>
                  <h4 class="widget-recent-title-post"><a href="<? echo get_permalink($recent["ID"]); ?>"> <? echo $recent["post_title"]; ?></a></h4>
                </div>  
              </div>
            </div>
          </div>
        <?
        }
        ?>
      </div>
      <?
      wp_reset_query();
    } 
  }
  add_action( 'widgets_init', function() {
    register_widget( 'Recent_Post_Sudoway' ); 
  } );
?>