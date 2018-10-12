<?php
  class Sidebar_Ads_600 extends WP_Widget {

    //setup the name, description and more
    public function __construct() {

      $widget_ops = array(
        'classname' => 'sidebar-ads-600',
        'description' => 'Custom Widget For Ads in Sidebar',
      );

      parent::__construct( 'sidebar-ads-600', ' Sidebar Ads 300 X 600', $widget_ops );

    }

    //back-end display of widget
    public function form( $instace ){
      echo '<p><strong>Widget ini belum bisa diubag secara Manual!</strong><br> Hubungi developer untuk melakukan  perubahan</p>';   
    }

    //front-end display of widget
    public function widget( $args, $instace) {
    ?>
      <div id="sidebar-ads">
      <?php
        $googleadsensecode = '
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
             style="display:inline-block;width:300px;height:600px"
             data-ad-client="ca-pub-9201441298846648"
             data-ad-slot="5583416949"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        ';
        echo $googleadsensecode;
        ?>
      </div>

    
    <?
    }
  }

  add_action( 'widgets_init', function() {
    register_widget( 'Sidebar_Ads_600' ); 
  } );
?>