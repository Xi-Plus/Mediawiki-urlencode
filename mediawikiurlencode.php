<?php

function mediawikiurlencode($baseurl, $page, $section="") {
	$replacement = [
		" " => "_",
		"\xE2\x80\x8E" => ""
	];
	$urlencodelist = ['“', '”', '’', '‧', '"', '…', '?', ')'];
	foreach ($urlencodelist as $char) {
		$replacement[$char] = urlencode($char);
	}

	foreach ($replacement as $from => $to) {
		$page = str_replace($from, $to, $page);
	}
	$url = $baseurl.$page;

	$section = trim($section);
	if ($section !== "") {
		$replacement = [
			" " => "_",
			"\xE2\x80\x8E" => ""
		];
		$urlencodelist = ['“', '”', '…'];
		foreach ($urlencodelist as $char) {
			$replacement[$char] = urlencode($char);
		}
		foreach ($replacement as $from => $to) {
			$section = str_replace($from, $to, $section);
		}
		$url .= '#'.$section;
	}
	return $url;
}
