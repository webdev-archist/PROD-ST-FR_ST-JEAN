<?php get_header(); ?>

<main id="main-content">
	<?php
	/*
	echo get_the_ID();
	echo "<hr/>";
	echo "<hr/>";
	echo "<hr/>";
	echo "<hr/>";
	echo "<hr/>";
	*/
	?>
	<!--div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area"-->
		<?php
	/*
			print_r( get_categories());
	echo"<hr/>dsfjoijfds";
	echo"<hr/>fdsjoijfds";
	echo"<hr/>dskpo";
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					echo the_category( ' ' );
					the_category( ' ' );
	echo"ok";
					$cat=get_the_category();
	foreach($cat as $k=>$v){
		echo $k." ___ ";
		print_r($v);
		echo"<br/>";
	}
	*/
	
	
	
	
/*
                $cats = get_the_category();
                foreach ($cats as $cat) {

                query_posts('showposts=1000&cat='.$cat->cat_ID);

            ?>
                <h2><?php echo $cat->cat_name; ?></h2>

                <ul>
                        <?php while (have_posts()) : the_post(); ?>
                        <li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - Commentaires (<?php echo $post->comment_count ?>)</li>
                        <?php endwhile;  ?>
                </ul>

        <?php }
		*/
if(get_the_ID()==161):
	$categories_list = get_categories();
	$posts_by_category = [];
	foreach($categories_list as $v)
		$posts_by_category[$v->name] = [];
	
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
		var_dump(get_the_category()[0]->name);
		echo $i++ . '| ';
			$posts_by_category[get_the_category()[0]->name][] = get_post();
	
		endwhile;
	endif;
	
	foreach($posts_by_category as $posts):
		echo count($posts);
		?>
		<article>
		<?php
			foreach($posts as $post):
			// var_dump($post);
			?>
				<nav>
					<h3><?php echo $post->post_title; ?></h3>
					<p><?php echo substr(wp_strip_all_tags($post->post_content), 0, 100); ?></p>					
				</nav>
			<?php
			endforeach;
			?>
		</article>
		<?php
	endforeach;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
else :
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
	
	
					echo "okkkkk<hr/>";
	
	
	
	
					$post_format = et_pb_post_format(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>

				<?php
					$thumb = '';

					$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

					$height    = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
					$classtext = 'et_pb_post_main_image';
					$titletext = get_the_title();
					$alttext   = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
					$thumbnail = get_thumbnail( $width, $height, $classtext, $alttext, $titletext, false, 'Blogimage' );
					$thumb     = $thumbnail["thumb"];

					et_divi_post_format_content();

					if ( ! in_array( $post_format, array( 'link', 'audio', 'quote' ) ) ) {
						if ( 'video' === $post_format && false !== ( $first_video = et_get_first_video() ) ) :
							printf(
								'<div class="et_main_video_container">
									%1$s
								</div>',
								et_core_esc_previously( $first_video )
							);
						elseif ( ! in_array( $post_format, array( 'gallery' ) ) && 'on' === et_get_option( 'divi_thumbnails_index', 'on' ) && '' !== $thumb ) : ?>
							<a class="entry-featured-image-url" href="<?php the_permalink(); ?>">
								<?php print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height ); ?>
							</a>
					<?php
						elseif ( 'gallery' === $post_format ) :
							et_pb_gallery_images();
						endif;
					} ?>

				<?php if ( ! in_array( $post_format, array( 'link', 'audio', 'quote' ) ) ) : ?>
					<?php if ( ! in_array( $post_format, array( 'link', 'audio' ) ) ) : ?>
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php endif; ?>

					<?php
						et_divi_post_meta();

						if ( 'on' !== et_get_option( 'divi_blog_style', 'false' ) || ( is_search() && ( 'on' === get_post_meta( get_the_ID(), '_et_pb_use_builder', true ) ) ) ) {
							truncate_post( 270 );
						} else {
							the_content();
						}
					?>
				<?php endif; ?>

					</article>
			<?php
					endwhile;

					if ( function_exists( 'wp_pagenavi' ) )
						wp_pagenavi();
					else
						get_template_part( 'includes/navigation', 'index' );
				else :
					get_template_part( 'includes/no-results', 'index' );
				endif;
endif;
			?>
			<!--/div>

			<?php get_sidebar(); ?>
		</div>
	</div-->
</main>

<?php

get_footer();
