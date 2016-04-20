<?php

/* helper functions */

// title formatting
function formatTitle($title = '') {
	if($title) {
		$title.= ' | ';
	}
	$title .= $GLOBALS['defaultTitle'];
	return $title;
}

// title with icon
function iconTitle($title = '', $icon = '') {
	if($title) {
		if($icon) {
			$iconTitle = '<i class="glyphicon '.$icon.'"></i> '.$title;
		}
	}
	return $iconTitle;
}

// title as page header with icon
function pageHeader($title = '', $icon = '') {
	if($title && $icon) {
		$title = iconTitle($title, $icon);
		$pageHeader = '<h1 class="page-header">'.$title.'</h1>';
	}
	return $pageHeader;
}

// status formatting
function formatStatus($statusID) {
	
}

// tax calculation
function getNetto($brutto) {
	$netto = $brutto + ($brutto * ($GLOBALS['tax']/100));
	return $netto;
}

// prize formatting
function formatCurrency($prize) {
	$formatedPrize = round($prize, 2).'&thinsp;&euro;';
	return $formatedPrize;
}