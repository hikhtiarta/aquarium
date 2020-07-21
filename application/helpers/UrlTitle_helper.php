<?php defined('BASEPATH') OR exit('No direct script access allowed');
    if (!function_exists('create_url')) {
        function create_url($string){
            $string = strtolower($string);
            $string = preg_replace('/\s+/', '-', $string);
            $string =  preg_replace("/[^-a-zA-Z0-9]+/", "", $string);
            return trim(preg_replace('/-+/', '-', $string), '-');
        }
    }
?>