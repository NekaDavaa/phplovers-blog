<?php

function FormatText($fetched_date) {
	$timestamp = strtotime($fetched_date);
	return date("d/m/y", $timestamp);
}

?>