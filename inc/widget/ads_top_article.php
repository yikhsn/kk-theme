<?php
  class Ads_Top_Article extends WP_Widget {

    //setup the name, description and more
    public function __construct() {

      $widget_ops = array(
        'classname' => 'ads-top-article',
        'description' => 'Custom Widget For Ads in Top Article',
      );

      parent::__construct( 'ads-top-article', 'Ads Top Article 728 X 90', $widget_ops );

    }

    //back-end display of widget
    public function form( $instace ){
      echo '<p><strong>Widget ini belum bisa diubag secara Manual!</strong><br> Hubungi developer untuk melakukan  perubahan</p>';   
    }

    //front-end display of widget
    public function widget( $args, $instace) {
    ?>
      <div id="ads-content">
      <?php
        $googleadsensecode = '
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
            style="display:inline-block;width:728px;height:90px"
            data-ad-client="ca-pub-9201441298846648"
            data-ad-slot="9293704818"></ins>
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
    register_widget( 'Ads_Top_Article' ); 
  } );
?>