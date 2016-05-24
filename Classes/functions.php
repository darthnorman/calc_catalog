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

// tax calculation
function getNetto($brutto) {
	$taxrate = Company::getTaxrate();
	$netto = $brutto + ($brutto * ($taxrate/100));
	return $netto;
}

// prize formatting
function formatCurrency($prize) {
	$formatedPrize = round($prize, 2);
	return $formatedPrize;
}

// person days formatting
function pt($number) {
	echo rtrim(number_format($number,3,',',''),'0'.',');
	return;	
}

// time stamp into readable (german) date
function dateFormat($timestamp) {
	 echo date('d.m.Y H:i:s', $timestamp);
	 return;
}