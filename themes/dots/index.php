<?php get_header(); ?>

		<div id="mb_background" class="mb_background">
			<img class="mb_bgimage" src=
			'http://www.graydenpoper.com/wp-content/themes/portfolio/images/patterns/Light_Gray.png'/>
			<div class="mb_overlay"></div>
			<div class="mb_loading"></div>
		</div>
		<div id="mb_pattern" class="mb_pattern"></div>
		<div class="mb_heading">
		</div>
		<div id="mb_menu"id='circle'class="mb_menu">
			<a href="#" data-speed="1000" data-easing="easeOutBack"span style="background-color:#CD2D49">Videos</a>
			<a href="#" data-speed="1000" data-easing="easeInExpo"span style="background-color:#CD2D49">Gallery</a>
			<a href="#" data-speed="1000" data-easing="easeOutBack"span style="background-color:#CD2D49">About</a>
			</div>
		<div id="mb_content_wrapper" class="mb_content_wrapper">
			<span class="mb_close"></span>

			<div class="mb_content">
				<h2>Videos</h2>
				<div class="mb_content_inner">
 <!--slider-->
      <div class="container">
      <div id="video">


  	<?php 

  		/// JALAMOS LOS POSTS CATEGORIZADOS COMO VIDEOS ///

  		$queryVideos = new WP_query('category_name=videos');
  		if($queryVideos->have_posts()): while($queryVideos->have_posts()): $queryVideos->the_post(); 

  		//el Título del post
  		the_title();

  			/// Si tiene vimeo dado de alta no jala videos desde WPress
  			if(!get_post_meta($post->ID, 'vimeo_id', true)) {


  				// Jala los videos de wordpress por cada post
	  			$args = array(
	  					'post_type' => 'attachment',
	  					'post_parent' => $post->ID
	  				);

	  			$videos = get_posts($args);
	  			foreach ($videos as $video) :
	  				$urlVideo = wp_get_attachment_url( $video->ID);
	  				
	  		?>
	  	  <?php /// construye el elmento video desde wordpress ?>

	      <video width="500" height="350" controls src="<?php echo $urlVideo; ?>" type="video/mov">
	      	 <source src="movie.ogg" type="video/ogg">
      	</video>

 	 <?php  endforeach; } else { 

 	 	// SI sí tiene dado de alta el video de vimeo lo construye desde ahí
 	 	?>

 	 <iframe src="//player.vimeo.com/video/<?php echo get_post_meta($post->ID, 'vimeo_id', true); ?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

 	<?php } endwhile; endif;?>



    </div>
    </div>	
			</div>
			</div>
			<div class="mb_content">
				<h2>Gallery</h2>
				<div class="mb_content_inner">
				
					<ul id="mb_imagelist" class="mb_imagelist">
						<?php 
							$queryimages = new WP_query('category_name=images');
							if($queryimages->have_posts()): while($queryimages->have_posts()): $queryimages->the_post(); 
						
								$args = array(
				  					'post_type' => 'attachment',
				  					'post_parent' => $post->ID
				  				);

					  			$imagenes = get_posts($args);
					  			foreach ($imagenes as $imagen) :
					  				$urlimagen = wp_get_attachment_url( $imagen->ID);
					  				
					  		?>

	     				<li><img src="<?php echo $urlimagen; ?>" alt="image1"/></li>

						<?php endforeach; endwhile; endif; ?>
					</ul>
	
					
				</div>
			</div>
			<div class="mb_content">
				<h2>About</h2>
				<div class="mb_content_inner">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ligula lorem, lobortis et arcu sed, aliquet rhoncus felis. Donec orci mi, congue at tellus sit amet, porttitor lobortis nibh. Cras pellentesque, purus eu placerat hendrerit, orci nunc consectetur mauris, eget tempus ipsum nunc ac magna. Suspendisse auctor arcu vitae enim posuere iaculis. Ut ipsum tortor, tempus in leo quis, egestas posuere ipsum. Maecenas nec suscipit orci. Morbi vel dui ac quam porttitor fermentum id convallis risus. Vivamus elementum vulputate mi, sed malesuada enim convallis in. Etiam luctus quam nec massa interdum volutpat. Pellentesque felis nisi, facilisis non pulvinar eu, egestas nec nisi. Curabitur pretium sapien nec lorem convallis eleifend. Phasellus ligula turpis, accumsan ultrices malesuada ut, laoreet quis ligula.</p>
				</div>
			</div>
		</div>


		<?php get_footer (); ?>
