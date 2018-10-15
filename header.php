<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>
			<?
					if (is_home()){
						bloginfo('name'); echo ' - '; bloginfo('description');
					}
			
					else{
						if (function_exists('is_tag') && is_tag()){
							echo 'Halaman Arsip untuk Tag &quot;' . $tag . '&quot;';
						}
						elseif (is_archive()){
							 wp_title('');
						}
						elseif (is_search()) {
							echo 'Hasil Pencarian untuk &quot;' . wp_specialchars($s) . '&quot; - ';
							bloginfo('name');
						}
						elseif(!(is_404()) && (is_single()) || (is_page())) {
							wp_title(''); 
						}
						elseif (is_404()) {
							echo 'Halaman Tidak Ditemukan! - '; bloginfo('name');
						}
					}
			?>
		</title>
		
		<?
			$title    = get_the_title();
			$url      = get_the_permalink();
			$blogname = get_bloginfo( 'name' );
			$img      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail', false );
		?>

		<meta property="og:type" content="article"/>
		<meta property="og:title" content="<?$title?>"/>
		<meta property="og:description" content="<?$descr?>" />
		<meta property="og:image" content="<?$img[0]?>"/>
		<meta property="og:url" content="<?$url?>"/>
		<meta property="og:site_name" content="<?$blogname?>"/>
		<link rel="image_src" href="<?$img[0]?>"/>
		
		<? wp_head(); ?>

		<header>
			<nav id="navbar-cody" class="navbar navbar-expand-lg navbar-light bg-light">
					<a class="navbar-brand navbar-cody-name" href=" <? echo home_url(); ?>">
						<? bloginfo('name'); ?>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" 
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
						aria-expanded="false" aria-label="Toggle navigation"
					>
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
							<li class="nav-item">
								<a class="nav-link" href="">Insight</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="">Tutorial</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="">Kelas</a>
							</li>
						</ul>
						<? get_search_form(); ?>
					</div>
			</nav>				
		</header>
	</head>
	<body>