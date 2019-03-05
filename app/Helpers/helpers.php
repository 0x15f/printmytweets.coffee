<?php

function number_format_short( $n, $precision = 1 ) {
	if ($n < 900) {
		// 0 - 900
		$n_format = number_format($n, $precision);
		$suffix = '';
	} else if ($n < 900000) {
		// 0.9k-850k
		$n_format = number_format($n / 1000, $precision);
		$suffix = 'K';
	} else if ($n < 900000000) {
		// 0.9m-850m
		$n_format = number_format($n / 1000000, $precision);
		$suffix = 'M';
	} else if ($n < 900000000000) {
		// 0.9b-850b
		$n_format = number_format($n / 1000000000, $precision);
		$suffix = 'B';
	} else {
		// 0.9t+
		$n_format = number_format($n / 1000000000000, $precision);
		$suffix = 'T';
	}
  // Remove unecessary zeroes after decimal. '1.0' -> '1'; '1.00' -> '1'
  // Intentionally does not affect partials, eg '1.50' -> '1.50'
	if ( $precision > 0 ) {
		$dotzero = '.' . str_repeat( '0', $precision );
		$n_format = str_replace( $dotzero, '', $n_format );
	}
	return $n_format . $suffix;
}


function watermark($url, $logo, $on_the_left = false, $x = null, $y = null){
	$bwidth  = imagesx($url);
	$bheight = imagesy($url);
	$lwidth  = imagesx($logo);
	$lheight = imagesy($logo);
	$src_x = $on_the_left ? 40 : $bwidth - $lwidth - 40;
	$src_y = 40;
	if ($x !== null) $src_x = $x; 
	if ($y !== null) $src_y = $y; 
	ImageAlphaBlending($url, true);
	ImageCopy($url, $logo, $src_x, $src_y, 0, 0, $lwidth, $lheight);
}

function error_message() {
	$background = imagecolorallocate($image, 245, 248, 250);
	imagefilledrectangle($image, 0, 0, 1400, 600, $background);
	
	$grey = imagecolorallocate($image, 101, 119, 134);
	$light_grey = imagecolorallocate($image, 170, 184, 194);
	imagettftext($image, 40, 0, 100, 230, $grey, $font_bold, 'An error has occured');
	imagettftext($image, 22, 0, 100, 280, $grey, $font_thin, "An unknown error has occured while generating\nan image of your Tweet.");
	imagettftext($image, 16, 0, 100, 400, $grey, $font_thin, 'Created by Jake Casto (@0x15f) | https://0x15f.com');
	
	$twitter_logo = imagecreatefrompng(public_path() . '/generator/twitter_logo.png');
	$twitter_logo = imagescale($twitter_logo, 100, 100);
	watermark($image, $twitter_logo);
	
	ob_start();

	imagepng($image);
	$img = ob_get_contents();
	ob_end_clean();
	imagedestroy($image);
	imagedestroy($twitter_logo);
	
	return $img;
}