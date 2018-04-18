<?php

function mediawikiurlencode($baseurl, $page, $section="") {
	$replacement = [
		" " => "_",
		"\xE2\x80\x8E" => ""
	];
	$urlencodelist = ['“', '”', '’', '‧', '"', '…', '?'];
	foreach ($urlencodelist as $char) {
		$replacement[$char] = urlencode($char);
	}

	foreach ($replacement as $from => $to) {
		$page = str_replace($from, $to, $page);
	}
	$url = $baseurl.$page;
	$section = trim($section);
	if ($section !== "") {
		$url .= '#'.str_replace([" ", "“", "”", "\xE2\x80\x8E"], ["_", "%E2%80%9C", "%E2%80%9D", ""], $section);
	}
	return $url;
}
