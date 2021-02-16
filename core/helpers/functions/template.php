<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * dynamic css, generated by customizer options
 */

// display navigation to the next/previous set of posts
// ----------------------------------------------------------------------------------------
function boilerplate_post_nav() {
// Don't print empty markup if there's nowhere to navigate.
	$next_post	 = get_next_post();
	$pre_post	 = get_previous_post();
	if ( !$next_post && !$pre_post ) {
		return;
	}
?>
	<nav class="post-navigation clearfix">
		<div class="post-previous">
			<?php if ( !empty( $pre_post ) ): ?>
				<a href="<?php echo get_the_permalink( $pre_post->ID ); ?>" class="post-navigation-item">
					<i class="xts-icon xts-chevron-left"></i>
					<div class="media-body">
						<span><?php esc_html_e( 'Previous post', 'boilerplate' ) ?></span>
						<h3><?php echo get_the_title( $pre_post->ID ) ?></h3>
					</div>
				</a>
			<?php endif; ?>
		</div>
		<div class="post-next">
			<?php if ( !empty( $next_post ) ): ?>
				<a href="<?php echo get_the_permalink( $next_post->ID ); ?>" class="post-navigation-item">
					<div class="media-body">
						<span><?php esc_html_e( 'Next post', 'boilerplate' ) ?></span>
						<h3><?php echo get_the_title( $next_post->ID ) ?></h3>
					</div>
					<i class="xts-icon xts-chevron-right"></i>
				</a>
			<?php endif; ?>
		</div>
	</nav>
<?php }


// display meta information for a specific post
// ----------------------------------------------------------------------------------------
if ( !function_exists('boilerplate_get_breadcrumbs') ) {
	function boilerplate_get_breadcrumbs( $seperator = '', $word = '' ) {
		$speaker_category = get_queried_object();
		echo '<ol class="breadcrumb">';
		if ( !is_home() ) {
			echo '<li><a href="';
			echo esc_url( get_home_url( '/' ) );
			echo '">';
			echo esc_html__( 'Home', 'boilerplate' );
			echo "</a></li> " . esc_attr( $seperator );
			if ( is_category() || is_single() ) {
				echo '<li>';
				$category	 = get_the_category();
				$post		 = get_queried_object();
				$postType	 = get_post_type_object( get_post_type( $post ) );
				if ( !empty( $category ) ) {
					echo esc_html( $category[ 0 ]->cat_name ) . '</li>';
				} else if ( $postType ) {

					if(is_singular('xs-speaker') ){
						echo '<a href="'.get_post_type_archive_link('xs-speaker').' ">'. esc_html( $postType->labels->singular_name ) . '</a></li>';
					}else{
						echo esc_html( $postType->labels->singular_name ) . '</li>';
					}
				}
				if ( is_single() ) {
					echo esc_attr( $seperator ) . "  <li>";
					echo esc_html( $word ) != '' ? wp_trim_words( get_the_title(), $word ) : get_the_title();
					echo '</li>';
				}
			} elseif ( is_page() ) {
				echo '<li>';
				echo esc_html( $word ) != '' ? wp_trim_words( get_the_title(), $word ) : get_the_title();
				echo '</li>';
			}
		}
		if(isset($speaker_category->taxonomy)){
			if($speaker_category->taxonomy == 'speaker-category'){
				echo  esc_html($speaker_category->name);
			}
		}
		if ( is_tag() ) {
			single_tag_title();
		} elseif ( is_day() ) {
			echo"<li>" . esc_html__( 'Blogs for', 'boilerplate' ) . " ";
			the_time( 'F jS, Y' );
			echo'</li>';
		} elseif ( is_month() ) {
			echo"<li>" . esc_html__( 'Blogs for', 'boilerplate' ) . " ";
			the_time( 'F, Y' );
			echo'</li>';
		} elseif ( is_post_type_archive('xs-speaker') ) {
			$postType = get_post_type_object(get_post_type());
			echo"<li>" . esc_html($postType->labels->name);
			echo'</li>';
		}
		elseif ( is_year() ) {
			echo"<li>" . esc_html__( 'Blogs for', 'boilerplate' ) . " ";
			the_time( 'Y' );
			echo'</li>';
		} elseif ( is_author() ) {
			echo"<li>" . esc_html__( 'Author Blogs', 'boilerplate' );
			echo'</li>';
		} elseif ( isset( $_GET[ 'paged' ] ) && !empty( $_GET[ 'paged' ] ) ) {
			echo "<li>" . esc_html__( 'Blogs', 'boilerplate' );
			echo'</li>';
		} elseif ( is_search() ) {
			echo"<li>" . esc_html__( 'Search Result', 'boilerplate' );
			echo'</li>';
		} elseif ( is_404() ) {
			echo"<li>" . esc_html__( '404 Not Found', 'boilerplate' );
			echo'</li>';
		}
		echo '</ol>';
	}
}



// display meta information for a specific post
// ----------------------------------------------------------------------------------------
function boilerplate_post_meta() {
?>
	<div class="post-meta">
		<?php

           $blog_author_show = boilerplate_option( 'blog_author_show', 'yes');
           $blog_date_show = boilerplate_option( 'blog_date_show', 'yes');
           $blog_category_show = boilerplate_option( 'blog_category_show', 'yes');

           if($blog_author_show == 'yes') :
			printf(
				'<span class="post-author"><i class="xts-icon xts-author"></i> <a href="%2$s">%3$s</a></span>',
				get_avatar( get_the_author_meta( 'ID' ), 55 ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
           endif;

			if ( get_post_type() === 'post' && $blog_date_show =='yes') {
				echo '<span class="post-meta-date">
					<i class="xts-icon xts-date"></i>
						'. get_the_date() .
					'</span>';
			}


			$category_list = get_the_category_list( ', ' );
			if ( $category_list && $blog_category_show =='yes') {
				echo '<span class="meta-categories post-cat">
					<i class="xts-icon xts-category"></i>
						'. $category_list .'
					</span>';
         }

		 if(is_single()):
			?>
			<span class="post-comment"><i class="xts-icon xts-category"></i><a href="#commentform" class="comments-link"><?php echo get_comments_number(get_the_ID()); echo get_comments_number(get_the_ID()) > 1 ?
				esc_html__( ' Comments ', 'boilerplate' ) : esc_html__( ' Comment ', 'boilerplate' ) ; ?></a></span>
			<?php
            endif;
		?>
	</div>
<?php }

// display meta information for a specific post
// ----------------------------------------------------------------------------------------
function boilerplate_post_details_meta() {
?>
	<div class="post-meta">
		<?php

           $blog_author_show = boilerplate_option( 'blog_details_author_show', 'no');
           $blog_date_show = boilerplate_option( 'blog_details_date_show', 'no');
           $blog_category_show = boilerplate_option( 'blog_details_category_show', 'no');
           $blog_details_Comments_show = boilerplate_option( 'blog_details_Comments_show', 'no');

           if($blog_author_show == 'yes') :
			printf(
				'<span class="post-author"><i class="xts-icon xts-author"></i> <a href="%2$s">%3$s</a></span>',
				get_avatar( get_the_author_meta( 'ID' ), 55 ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
           endif;

			if ( get_post_type() === 'post' && $blog_date_show =='yes') {
				echo '<span class="post-meta-date">
					<i class="xts-icon xts-date"></i>
						'. get_the_date() .
					'</span>';
			}


			$category_list = get_the_category_list( ', ' );
			if ( $category_list && $blog_category_show =='yes') {
				echo '<span class="meta-categories post-cat">
					<i class="xts-icon xts-category"></i>
						'. $category_list .'
					</span>';
         }

		 if(is_single() && $blog_details_Comments_show == 'yes'):
			?>
			<span class="post-comment"><i class="xts-icon xts-category"></i><a href="#commentform" class="comments-link"><?php echo get_comments_number(get_the_ID()); echo get_comments_number(get_the_ID()) > 1 ?
				esc_html__( ' Comments ', 'boilerplate' ) : esc_html__( ' Comment ', 'boilerplate' ) ; ?></a></span>
			<?php
            endif;
		?>
	</div>
<?php }



// display meta date for a specific post
// ----------------------------------------------------------------------------------------
function boilerplate_post_meta_date() {
	if ( get_post_type() === 'post' ) {
		echo '<span class="post-meta-date meta-date">'. get_the_date( 'm F Y' ) .'</span>';
	}
}

// comment walker
// ----------------------------------------------------------------------------------------
function boilerplate_comment_style( $comment, $args, $depth ) {
	if ( 'div' === $args[ 'style' ] ) {
		$tag		 = 'div';
		$add_below	 = 'comment';
	} else {
		$tag		 = 'li ';
		$add_below	 = 'div-comment';
	}
	?>
	<?php
	if ( $args[ 'avatar_size' ] != 0 ) {
		echo get_avatar( $comment, $args[ 'avatar_size' ], '', '', array( 'class' => 'comment-avatar pull-left' ) );
	}
	?>
	<<?php
	echo boilerplate_kses( $tag );
	comment_class( empty( $args[ 'has_children' ] ) ? '' : 'parent'  );
	?> id="comment-<?php comment_ID() ?>"><?php if ( 'div' != $args[ 'style' ] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php }
	?>
		<div class="meta-data">
			<span class="comment-author vcard"><?php
				printf( boilerplate_kses( '<cite class="fn">%s</cite> <span class="says">%s</span>', 'boilerplate' ), get_comment_author_link(), esc_html__( 'says:', 'boilerplate' ) );
				?>
			</span>
			<?php if ( $comment->comment_approved == '0' ) { ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'boilerplate' ); ?></em><br/><?php }
			?>

			<div class="comment-meta commentmetadata comment-date">
				<?php
				// translators: 1: date, 2: time
				printf(
				esc_html__( '%1$s at %2$s', 'boilerplate' ), get_comment_date(), get_comment_time()
				);
				?>
				<?php edit_comment_link( esc_html__( '(Edit)', 'boilerplate' ), '  ', '' ); ?>
			</div>
		</div>
		<div class="comment-content">
			<?php comment_text(); ?>
		</div>
		<div class="reply"><?php
			comment_reply_link(
			array_merge(
			$args, array(
				'add_below'	 => $add_below,
				'depth'		 => $depth,
				'max_depth'	 => $args[ 'max_depth' ]
			) ) );
			?>
		</div>
		<?php if ( 'div' != $args[ 'style' ] ) : ?>
		</div><?php
	endif;
}


// pagination within pages or posts if it has a long content
// ----------------------------------------------------------------------------------------
function boilerplate_link_pages() {
	$args = array(
		'before'			 => '<div class="page-links"><span class="page-link-text">' . esc_html__( 'More pages: ', 'boilerplate' ) . '</span>',
		'after'				 => '</div>',
		'link_before'		 => '<span class="page-link">',
		'link_after'		 => '</span>',
		'next_or_number'	 => 'number',
		'separator'			 => '  ',
		'nextpagelink'		 => esc_html__( 'Next ', 'boilerplate' ) . '<I class="xts-icon xts-chevron-left"></i>',
		'previouspagelink'	 => '<I class="xts-icon xts-chevron-right"></i>' . esc_html__( ' Previous', 'boilerplate' ),
	);
	wp_link_pages( $args );
}


//  related post by categry
function boilerplate_related_posts_by_category( $post_id, $related_count=4, $feature_image = true  ) {
   try{

   if($post_id==''){
      $post_id = get_the_ID();
   }

   $terms = get_the_terms( $post_id, 'category' );

   if ( empty( $terms ) ) $terms = array();

	$term_list = wp_list_pluck( $terms, 'slug' );

	$related_args = array(
		'post_type' => 'post',
		'posts_per_page' => $related_count,
		'post_status' => 'publish',
		'post__not_in' => array( $post_id ),
      'orderby' => 'rand',
      'ignore_sticky_posts'=>1,
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $term_list
			)
		)
	);
   if($feature_image){
      $related_args["meta_query"] = array(
         array(
            'key' => '_thumbnail_id',
            'compare' => 'EXISTS'
           ),
      );
   }

   return new WP_Query( $related_args );

   } catch(Exception $e) {

      return new WP_Query( [] );

  }
//  wp_reset_postdata() already used in post query

}

//  related post by tags
function boilerplate_related_posts_by_tags( $post_id = '', $related_count=4, $feature_image = true ) {

  try{
      if($post_id==''){
      $post_id = get_the_ID();
      }
      $tags      = wp_get_post_tags($post_id);
      $term_tags = wp_list_pluck($tags,'term_id');
      $args = array(

         'tag__in' => $term_tags,
         'post__not_in' => array($post_id),
         'posts_per_page'=>$related_count,
         'ignore_sticky_posts'=>1,
      );
      if($feature_image){
         $args["meta_query"] = array(
            array(
               'key' => '_thumbnail_id',
               'compare' => 'EXISTS'
            ),
         );
      }

      return new WP_Query($args);

   } catch(Exception $e) {

   return new WP_Query( [] );

  }
//  wp_reset_postdata() already used in post query

}

/*
*
* Tag list
**/

function boilerplate_tag_list(){
	$tag_list = get_the_tag_list( '', ' ' );
	if ( $tag_list ) {
	echo '<div class="post-tag-container">';
		echo '<div class="tag-lists">';
			echo '<span>' . esc_html__( 'Tags: ', 'boilerplate' ) . '</span>';
			echo boilerplate_kses( $tag_list );
		echo '</div>';
	echo '</div>';
	}
 }