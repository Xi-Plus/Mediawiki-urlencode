<?php

function mediawikiurlencode($baseurl, $page, $section="") {
	$replacement = [
		" " => "_",
		"“" => "%E2%80%9C",
		"”" => "%E2%80%9D",
		"\xE2\x80\x8E" => "",
		"‧" => "%E2%80%A7",
		"\"" => "%22"
	];
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
