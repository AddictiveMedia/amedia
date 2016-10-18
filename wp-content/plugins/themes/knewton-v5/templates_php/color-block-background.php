<?php
	$color = get_sub_field('color_block_bg');

	if($color) {
		if($color == 'Turquoise') {
			$color = ' bg-turq1';
		} elseif($color == 'Leaf') {
			$color = ' bg-turq';
		} elseif($color == 'Orange') {
			$color = ' bg-orange';
		} elseif($color == 'Cranberry') {
			$color = ' bg-cran';
		} elseif($color == 'Orange-red') {
			$color = ' bg-orred';
		} elseif($color == 'Green') {
			$color = ' bg-green';
		} elseif($color == 'Blue') {
			$color = ' bg-blue';
		} elseif($color == 'Red') {
			$color = ' bg-red';
		} elseif($color == 'Yellow') {
			$color = ' bg-yellow';
		} elseif($color == 'Purple') {
			$color = ' bg-purple';
		}
	}
?>