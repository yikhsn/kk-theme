<?php
  class Show_Post_Sudoway extends WP_Widget {

    //setup the name, description and more
    public function __construct() {

      $widget_ops = array(
        'classname' => 'show-post-sudoway',
        'description' => 'Custom Widget Show Recent Post for Sudoway',
      );

      parent::__construct( 'show-post', ' Show Post Sudoway', $widget_ops );

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
      if ( have_posts() ) {
        while( have_posts()) {
          the_post();
        ?>
          <div class="container single-widget-recent-post">
          <div class="row no-gutters">
            <div class="col-4 col-sm-4">
              <div class="widget-recent-post-thumbnails">
                <?
                  the_post_thumbnail();
                ?>
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
      else {
        echo "Tidak ada Post";
      }
      ?>
      </div>
    
    <?
    }

  }

  add_action( 'widgets_init', function() {
    register_widget( 'Show_Post_Sudoway' ); 
  } );
?>