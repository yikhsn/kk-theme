<?
	get_header();
	setPostViews(get_the_ID());
?>
	<div class="body-blog">
		<div class="row no-gutters">
			<div class="col-lg-9 col-sm-12 col-12">
				<div id="single-page">
          <div id="error-page">
            <h2 class="error-code">Error 404</h2>
            <h4 class="error-message">Halaman yang Anda Cari Tidak Ditemukan</h4>
          </div>	
				</div>
			</div>
			<div class="col-lg-3 col-sm-12 col-12">
				<div class="sidebar-blog">
					<?php dynamic_sidebar('sidebar2'); ?>				
				</div>
			</div>
		</div>
	</div>
<? get_footer(); ?>