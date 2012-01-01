<?php
function parse_shortcode_content( $content ) {

    $content = trim( do_shortcode( shortcode_unautop( $content ) ) );

    if ( substr( $content, 0, 4 ) == '' )
        $content = substr( $content, 4 );

    if ( substr( $content, -3, 3 ) == '' )
        $content = substr( $content, 0, -3 );

    $content = str_replace( array( '<p></p>' ), '', $content );
    $content = str_replace( array( '<p>  </p>' ), '', $content );

    return $content;
}

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );

function highlight_shortcode( $atts, $content = null )
{
	extract( shortcode_atts(
	array(
      'color' => 'yellow',
      'color' => 'red',
      'color' => 'green',
      'color' => 'blue',
      ),
	  $atts ) );

      return '<span class="text-highlight highlight-' . $color . '">' . $content . '</span>';

}
add_shortcode('highlight', 'highlight_shortcode');

function button_shortcode( $atts, $content = null )
{
	extract( shortcode_atts( array(
    'color' => 'default',
	  'url' => '',
	  'text' => ''
      ), $atts ) );
	  if($url) {
		return '<a href="' . $url . '" class="btn-shortcode button' . $color . '"><span>' . $text . $content . '</span></a>';
	  } else {
		return '<div class="btn-shortcode button' . $color . '"><span>' . $text . $content . '</span></div>';
	}
}
add_shortcode('button', 'button_shortcode');

function box_shortcode( $atts, $content = null )
{
	extract( shortcode_atts( array(
      'color' => 'orange',
      'size' => 'normal',
      'type' => '',
	  'align' => 'default',
      ), $atts ) );

      return '<div class="box-shortcode box-' . $color . '">' . $content . '</div>';

}
add_shortcode('box', 'box_shortcode');

function column_shortcode( $atts, $content = null )
{
	extract( shortcode_atts( array(
	  'offset' =>'',
      'size' => '',
	  'position' =>''
      ), $atts ) );


	  if($offset !='') { $column_offset = $offset; } else { $column_offset ='one'; }
		
      return '<div class="'.$column_offset.'-' . $size . ' column-'.$position.'">' . do_shortcode($content) . '</div>';

}
add_shortcode('column', 'column_shortcode');

function youtube_shortcode($atts, $content = null) {
   extract(shortcode_atts(array(
      'video'  => '',
      'width'  => '540',
      'height' => '400'
      ), $atts));

    return '<div class="youtube_video"><object type="application/x-shockwave-flash" style="width:'.$width.'px; height:'.$height.'px;" data="http://www.youtube.com/v/'.$video.'&amp;hl=en_US&amp;fs=1&amp;"><param name="movie" value="http://www.youtube.com/v/'.$video.'&amp;hl=en_US&amp;fs=1&amp;" /></object></div>';
}
add_shortcode('youtube', 'youtube_shortcode');

function successbox($atts, $content=null, $code="") {
  $return = '<div class="success">';
  $return .= $content;
  $return .= '</div>';
  return $return;
}
add_shortcode('success' , 'successbox' );

function alertbox($atts, $content=null, $code="") {
  $return = '<div class="alert">';
  $return .= $content;
  $return .= '</div>';
  return $return;
}
add_shortcode('alert' , 'alertbox' );

function cancelbox($atts, $content=null, $code="") {
  $return = '<div class="cancel">';
  $return .= $content;
  $return .= '</div>';
  return $return;
}
add_shortcode('cancel' , 'cancelbox' );

function helpbox($atts, $content=null, $code="") {
  $return = '<div class="help">';
  $return .= $content;
  $return .= '</div>';
  return $return;
}
add_shortcode('help' , 'helpbox' );

function downloadbox($atts, $content=null, $code="") {
  $return = '<div class="download">';
  $return .= $content;
  $return .= '</div>';
  return $return;
}
add_shortcode('download' , 'downloadbox' );


add_filter('the_content', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');
?>