<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * helper functions
 */

// simply echo the variable
// ----------------------------------------------------------------------------------------
function boilerplate_return( $s ) {

	return boilerplate_kses($s);
}

// return the specific value from theme options/ customizer/ etc
// ----------------------------------------------------------------------------------------
function boilerplate_option( $key, $default_value = '', $method = 'customizer' ) {
	if ( defined( 'DEVM' ) ) {
		switch ( $method ) {
			case 'customizer':
				$value = devm_theme_option( $key );
				break;
			default:
				$value = '';
				break;
		}
		return (!isset($value) || $value == '') ? $default_value :  $value;
	}
	return $default_value;
}


// return the specific value from metabox
// ----------------------------------------------------------------------------------------
function boilerplate_meta_option( $postid, $key, $default_value = '' ) {
	if ( defined( 'DEVM' ) ) {
		$value = devm_meta_option($postid, $key, $default_value);
	}
	return (!isset($value) || $value == '') ? $default_value :  $value;
}

// extract unyson image data from option value in a much simple way
// ----------------------------------------------------------------------------------------
function boilerplate_src( $key, $default_value = '', $input_as_attachment = false ) { // for src
	if ( $input_as_attachment == true ) {
		$attachment = $key;
	} else {
		$attachment = boilerplate_option( $key );
	}

	if ( isset( $attachment[ 'url' ] ) && !empty( $attachment ) ) {
		return $attachment[ 'url' ];
	}

	return $default_value;
}


// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function boilerplate_kses( $raw ) {

	$allowed_tags = array(
		'a'								 => array(
			'class'	 => array(),
			'href'	 => array(),
			'rel'	 => array(),
			'title'	 => array(),
		),
		'abbr'							 => array(
			'title' => array(),
		),
		'b'								 => array(),
		'blockquote'					 => array(
			'cite' => array(),
		),
		'cite'							 => array(
			'title' => array(),
		),
		'code'							 => array(),
		'del'							 => array(
			'datetime'	 => array(),
			'title'		 => array(),
		),
		'dd'							 => array(),
		'div'							 => array(
			'class'	 => array(),
			'title'	 => array(),
			'style'	 => array(),
		),
		'dl'							 => array(),
		'dt'							 => array(),
		'em'							 => array(),
		'h1'							 => array(),
		'h2'							 => array(),
		'h3'							 => array(),
		'h4'							 => array(),
		'h5'							 => array(),
		'h6'							 => array(),
		'i'								 => array(
			'class' => array(),
		),
		'img'							 => array(
			'alt'	 => array(),
			'class'	 => array(),
			'height' => array(),
			'src'	 => array(),
			'width'	 => array(),
		),
		'li'							 => array(
			'class' => array(),
		),
		'ol'							 => array(
			'class' => array(),
		),
		'p'								 => array(
			'class' => array(),
		),
		'q'								 => array(
			'cite'	 => array(),
			'title'	 => array(),
		),
		'span'							 => array(
			'class'	 => array(),
			'title'	 => array(),
			'style'	 => array(),
		),
		'iframe'						 => array(
			'width'			 => array(),
			'height'		 => array(),
			'scrolling'		 => array(),
			'frameborder'	 => array(),
			'allow'			 => array(),
			'src'			 => array(),
		),
		'strike'						 => array(),
		'br'							 => array(),
		'strong'						 => array(),
		'ul'							 => array(
			'class' => array(),
		),
	);

	if ( function_exists( 'wp_kses' ) ) { // WP is here
		$allowed = wp_kses( $raw, $allowed_tags );
	} else {
		$allowed = $raw;
	}


	return $allowed;
}


// build google font url
// ----------------------------------------------------------------------------------------
function boilerplate_google_fonts_url($font_families	 = []) {
	$fonts_url		 = '';
	/*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
    */
	if ( $font_families && 'off' !== _x( 'on', 'Google font: on or off', 'boilerplate' ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) )
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

// return cover image from an youtube video url
// ----------------------------------------------------------------------------------------
function boilerplate_youtube_cover( $e ) {
	$src = null;
	//get the url
	if ( $e != '' ){
		$url = $e;
		$queryString = parse_url( $url, PHP_URL_QUERY );
		parse_str( $queryString, $params );
		$v = $params[ 'v' ];
		//generate the src
		if ( strlen( $v ) > 0 ) {
			$src = "http://i3.ytimg.com/vi/$v/default.jpg";
		}
	}

	return $src;
}


// return embed code for sound cloud
// ----------------------------------------------------------------------------------------
function boilerplate_soundcloud_embed( $url ) {
	return 'https://w.soundcloud.com/player/?url=' . urlencode($url) . '&auto_play=false&color=915f33&theme_color=00FF00';
}


// return embed code video url
// ----------------------------------------------------------------------------------------
function boilerplate_video_embed($url){
    //This is a general function for generating an embed link of an FB/Vimeo/Youtube Video.
	$embed_url = '';
    if(strpos($url, 'facebook.com/') !== false) {
        //it is FB video
        $embed_url ='https://www.facebook.com/plugins/video.php?href='.rawurlencode($url).'&show_text=1&width=200';
    }else if(strpos($url, 'vimeo.com/') !== false) {
        //it is Vimeo video
        $video_id = explode("vimeo.com/",$url)[1];
        if(strpos($video_id, '&') !== false){
            $video_id = explode("&",$video_id)[0];
        }
        $embed_url ='https://player.vimeo.com/video/'.$video_id;
    }else if(strpos($url, 'youtube.com/') !== false) {
        //it is Youtube video
        $video_id = explode("v=",$url)[1];
        if(strpos($video_id, '&') !== false){
            $video_id = explode("&",$video_id)[0];
        }
		$embed_url ='https://www.youtube.com/embed/'.$video_id;
    }else if(strpos($url, 'youtu.be/') !== false){
        //it is Youtube video
        $video_id = explode("youtu.be/",$url)[1];
        if(strpos($video_id, '&') !== false){
            $video_id = explode("&",$video_id)[0];
        }
        $embed_url ='https://www.youtube.com/embed/'.$video_id;
    }else{
        //for new valid video URL
    }
    return $embed_url;
}

if ( !function_exists( 'boilerplate_advanced_font_styles' ) ) :

	/**
	 * Get shortcode advanced Font styles
	 *
	 */
	function boilerplate_advanced_font_styles( $data ) {

		$style = [];

		if (is_string($data)) {
			$style = json_decode($data, true);
		} else {
			$style = $data;
		}

		$font_styles = $font_weight = '';

		$font_weight = (isset( $style[ 'weight' ] ) && $style[ 'weight' ]) ? 'font-weight:' . esc_attr( $style[ 'weight' ] ) . ';' : '';

		$font_styles .= isset( $style[ 'family' ] ) ? 'font-family: ' . $style[ 'family' ] . ', sans-serif;' : '';
		$font_styles .= isset($style[ 'style' ] ) && $style[ 'style' ] ? 'font-style:' . esc_attr( $style[ 'style' ] ) . ';' : '';

		$font_styles .= isset( $style[ 'color' ] ) && !empty( $style[ 'color' ] ) ? 'color:' . esc_attr( $style[ 'color' ] ) . ';' : '';
		$font_styles .= isset( $style[ 'line_height' ] ) && !empty( $style[ 'line_height' ] ) ? 'line-height:' . esc_attr( $style[ 'line_height' ] / $style[ 'size' ]) . ';' : '';
		$font_styles .= isset( $style[ 'letter_spacing' ] ) && !empty( $style[ 'letter_spacing' ] ) ? 'letter-spacing:' . esc_attr( $style[ 'letter_spacing' ] / 1000 * 1 ) . 'rem;' : '';
		$font_styles .= isset( $style[ 'size' ] ) && !empty( $style[ 'size' ] ) ? 'font-size:' . esc_attr( $style[ 'size' ] ) . 'px;' : '';

		$font_styles .= !empty( $font_weight ) ? $font_weight : '';

		return !empty( $font_styles ) ? $font_styles : '';
	}

endif;


/**
 * hooks for wp blog part
 */

// if there is no excerpt, sets a defult placeholder
// ----------------------------------------------------------------------------------------
function boilerplate_excerpt( $words = 20 ) {
	$excerpt		 = get_the_excerpt();
	$trimmed_content = wp_trim_words( $excerpt, $words );
	echo boilerplate_kses( $trimmed_content );
}


// change textarea position in comment form
// ----------------------------------------------------------------------------------------
function boilerplate_move_comment_textarea_to_bottom( $fields ) {
	$comment_field		 = $fields[ 'comment' ];
	unset( $fields[ 'comment' ] );
	$fields[ 'comment' ] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'boilerplate_move_comment_textarea_to_bottom' );


// change textarea position in comment form
// ----------------------------------------------------------------------------------------
function boilerplate_search_form( $form ) {
    $form = '
        <form  method="get" action="' . esc_url( home_url( '/' ) ) . '" class="boilerplate-serach xs-search-group">
            <div class="input-group">
                <input type="search" class="form-control" name="s" placeholder="' .esc_attr__( 'Search', 'boilerplate' ) . '" value="' . get_search_query() . '">
                <div class="input-group-append">
                    <button class="input-group-text search-button"><i class="xts-icon xts-search"></i></button>
                </div>
            </div>
        </form>';
	return $form;
}
add_filter( 'get_search_form', 'boilerplate_search_form' );

function boilerplate_body_classes( $classes ) {

    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'sidebar-active';
    }else{
        $classes[] = 'sidebar-inactive';
    }
    $box_class =  boilerplate_option('general_body_box_layout');
    if(isset($box_class['style'])){
        if($box_class['style']=='yes'){
         $classes[] = 'body-box-layout';
        }
    }

    return $classes;
 }

 add_filter( 'body_class','boilerplate_body_classes' );



