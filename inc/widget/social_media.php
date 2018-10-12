<?php
  class Social_Media_share extends WP_Widget {

    //setup the name, description and more
    public function __construct() {

      $widget_ops = array(
        'classname' => 'social_media_share',
        'description' => 'Custom Widget For Social Media Share in Sudoway',
      );

      parent::__construct( 'social_media_share', ' Social Media Share Sudoway', $widget_ops );

    }

    //back-end display of widget
    public function form( $instace ){
      echo '<p><strong>Widget ini belum bisa diubag secara Manual!</strong><br> Hubungi developer untuk melakukan  perubahan</p>';   
    }

    //front-end display of widget
    public function widget( $args, $instace) {
    ?>
    <div class="row no-gutters">
    <div id="widget-feature">
        <div class="twitter-share">
        <a target="_blank" href="https://twitter.com/share?ref_src=<?= get_the_permalink();?>" data-show-count="false">
          <div class="img-twitter">
            <img src="<? echo get_template_directory_uri();?>/img/social/twitter.png" style="width:40px; height:40px;"></a>
            <!-- <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>             -->
          </div>
        </div>
        <div class="facebook-share">
          <div>
          <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?= urlencode( get_permalink() );?>">
            <img src="<? echo get_template_directory_uri();?>/img/social/facebook.png" style="width:40px; height:40px;"></a>            
            </a>
          </div>
        </div>
        <div class="linkedin-share">
        <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?= get_the_permalink();?>">
          <img src="<? echo get_template_directory_uri();?>/img/social/linkedin.png" style="width:40px; height:40px;"></a>            
        </a>
        </div>
        <div class="pinterest-share">
        <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<? urlencode(the_permalink()); ?>">
          <img src="<? echo get_template_directory_uri();?>/img/social/pinterest.png" style="width:40px; height:40px;"></a>            
        </a>
        </div>
      </div>
    </div>
    <?
    }
  }

  add_action( 'widgets_init', function() {
    register_widget( 'Social_Media_share' ); 
  } );
?>