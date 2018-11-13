<?php
  class Subscribe_Sudoway extends WP_Widget {

    //setup the name, description and more
    public function __construct() {

      $widget_ops = array(
        'classname' => 'subscribe-sudoway',
        'description' => 'Custom Widget For Subscribe Newsletter in Sudoway',
      );

      parent::__construct( 'subscribe-sudoway', ' Subscribe Sudoway', $widget_ops );

    }

    //back-end display of widget
    public function form( $instace ){
      echo '<p><strong>Widget ini belum bisa diubag secara Manual!</strong><br> Hubungi developer untuk melakukan  perubahan</p>';   
    }

    //front-end display of widget
    public function widget( $args, $instace) {
    ?>
      <div class="widget widget-subscribe">
        <div class="row no-gutters">
          <div class="widget-subscribe-header">
            <div class="widget-subscribe-icon">
              <img src="<?= get_template_directory_uri(); ?>/img/main/email.svg" alt="Subscribe Icon">
            </div>
            <h4 class="widget-subscribe-title">Jadi paling update!</h4>
            <p class="subscribe-widget-desc">Dapatkan rangkuman kabar mingguan dikirim langsung ke email kamu!</p>
          </div>
          <div class="widget-subscribe-body">

            <form action="https://sudoway.us18.list-manage.com/subscribe/post?u=02406f95f07144179e23cf6e3&amp;id=f72ceb2fc9"
                method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" 
                novalidate
            >   
              <div class="widget-subscribe-form">
                <input type="email" value="" placeholder="Masukkan email" name="EMAIL" class="widget-subscribe-input" id="email">
                <input class="widget-subscribe-button" type="submit" name="subscribe" id="mc-embedded-subscribe" value="Submit">

              </div>
              <div id="mce-responses">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
              </div>                
            </div>
        </form>
        </div>

          <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
      </div>
    
    <?
    }
  }

  add_action( 'widgets_init', function() {
    register_widget( 'Subscribe_Sudoway' ); 
  } );
?>