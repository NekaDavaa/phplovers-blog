<?php

function FormatDate($fetched_date) {
	$timestamp = strtotime($fetched_date);
	return date("d/m/y", $timestamp);
}

function FormatText($trim_text) {
   return mb_strimwidth("$trim_text", 0, 350, "...");
}

?>