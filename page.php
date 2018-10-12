<?
	get_header();
	setPostViews(get_the_ID());
?>
	<div class="body-cody">
		<div class="row no-gutters">
			<main class="col-lg-9 col-sm-12 col-12">
				<div class="single-page">
					<div class="row no-gutters">
						<?
						if ( have_posts() ) {
							while( have_posts()) {
								the_post(); ?>
									<div class="col-12">
										<h1 class="title-single-page"><? the_title(); ?></h1>
									</div>				
									<div class="col-12">
										<div class="single-page-thumbnail">
											<?
												the_post_thumbnail();
											?>	
										</div>
									</div>
									
									<div class="col-12">								
										<div class="paragraph-single-page">
											<? the_content(); ?>
										</div>
									</div>
						<?
							} 
						}			
						?>
					</div>	
				</div>
			</main>
			<aside class="col-lg-3 col-sm-12 col-12">
				<div class="sidebar-blog">
					<?php dynamic_sidebar('sidebar1'); ?>					
				</div>
					</aside>
		</div>
	</div>
  
<? get_footer(); ?>