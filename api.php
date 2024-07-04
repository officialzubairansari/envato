<?php

// Get the code
$code = isset($_GET['code']) ? $_GET['code'] : '';

// If the code isn't in the correct format, CloudFlare will throw a 1020
if (!preg_match("/^([a-f0-9]{8})-(([a-f0-9]{4})-){3}([a-f0-9]{12}) *$/i", $code)) {
	http_response_code(403);
	echo "Your personal token is incorrect or is missing the required permission.";
	die;
}

header('Content-Type: application/json; charset=utf-8');

// Handle valid codes
if ($code == "829862b2-59ef-42c9-894c-665208ac2f41") {
	echo <<<EOD
{
  "amount": "100.00",
  "sold_at": "2024-09-07T10:54:28+10:00",
  "license": "Regular License",
  "support_amount": "0.00",
  "supported_until": "2025-03-09T01:54:28+11:00",
  "item": {
    "id": 17022701,
    "name": "Fleetme - Vehicle Reservation System",
    "author_username": "arcoticsolutions",
    "updated_at": "2024-11-02T15:57:41+11:00",
    "site": "codecanyon.net",
    "price_cents": 2000,
    "published_at": "2024-07-13T19:07:03+10:00"
  },
  "buyer": "David .J",
  "purchase_count": 1
}
EOD;
}

// Handle invalid codes
else {
	http_response_code(404);
	echo <<<EOD
{
	"error": 404,
	"description": "Purchase code was not found (or) did not belong to one of your items."
}
EOD;
}