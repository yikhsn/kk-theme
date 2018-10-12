<?php
  class Popular_Post_Sudoway extends WP_Widget {

    //setup the name, description and more
    public function __construct() {

      $widget_ops = array(
        'classname' => 'popular-post-sudoway',
        'description' => 'Custom Widget Popular Post for Sudoway',
      );

      parent::__construct( 'popular-post', 'Popular Post Sudoway', $widget_ops );

    }

    //back-end display of widget
    public function form( $instace ){
      echo '<p><strong>Widget ini belum bisa diubag secara Manual!</strong><br> Hubungi developer untuk melakukan  perubahan</p>';   
    }

    //front-end display of widget
    public function widget( $args, $instace) {
    ?>
      <div id="widget-recent-post">
        <h3 class="title-widget">Popular Post</h3>
    <?
       query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=7');
       if (have_posts()){
        while (have_posts()){
          the_post();
          ?>
          <div class="container single-widget-recent-post">
          <div class="row no-gutters">
            <div class="col-4 col-sm-4">
              <div class="widget-recent-post-thumbnails">
                <a href="<? the_permalink(); ?>">
                  <?
                    the_post_thumbnail();
                  ?>
                </a>
              </div>
            </div>
            <div class="col-8 col-sm-8">
              <div class="widget-recent-post-content">
                <div class="widget-recent-post-category">
                  <?php
                    $category = get_the_category();
                    $firstCategory = $category[0]->cat_name;
                    $linkFirstCategory = get_category_link($category[0]->cat_ID);

                    ?>
                    <a href="<? echo esc_url($linkFirstCategory); ?>">
                      <span> <? echo $firstCategory; ?></span>
                    </a>
                </div>
                <h4 class="widget-recent-title-post"><a href="<? the_permalink(); ?>"> <? the_title(); ?></a></h4>
              </div>  
            </div>
          </div>
        </div>
      <?
        }
      }       
       wp_reset_query();
      ?>
      </div>
      <?
    }
  }

  add_action( 'widgets_init', function() {
    register_widget( 'Popular_Post_Sudoway' ); 
  } );
?>