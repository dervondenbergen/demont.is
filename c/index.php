<?php

  header("Content-Type: image/png");
  
  $width = $_GET["w"];
  $height = $_GET["h"];
  $color = $_GET["c"];
  
  function hex2rgb( $colour ) {
    if ( $colour[0] == '#' ) {
      $colour = substr( $colour, 1 );
    }

    if ( strlen( $colour ) == 6 ) {
      list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
    } elseif ( strlen( $colour ) == 3 ) {
      list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
    } else {
      return false;
    }
    
    $r = hexdec( $r );
    $g = hexdec( $g );
    $b = hexdec( $b );
    return array( 'red' => $r, 'green' => $g, 'blue' => $b );
  }

  $red = hex2rgb($color)["red"];
  $green = hex2rgb($color)["green"];
  $blue = hex2rgb($color)["blue"];

  $im = @imagecreate($width, $height) or die("Cannot Initialize new GD image stream");
  $background_color = imagecolorallocate($im, $red, $green, $blue);
  imagepng($im);
  imagedestroy($im);
    
?>
