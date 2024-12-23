<?php

namespace App\Helpers;

class Utilities {
    public static function sanitizeInput($input) {
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }

    public static function slugify($string) {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }

    public static function parseURL($url) {		
		$url = str_replace('%3A', ':', $url);
		$url = str_replace('%2F', '/', $url);
		$url = str_replace('%3F', '?', $url);
		$url = str_replace('%26', '&', $url);
		
		return $url;
    }

    public static function objectToArray($object) {
        return (array) $object;

        // return json_decode(json_encode($object), true);
    }
}