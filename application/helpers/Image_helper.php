<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('image_conv'))
{
    function image_conv($data)
    {                      
        $ext = pathinfo($data['name'])['extension'];
        $hashName = v4() . "." . $ext;
        $new = array(
            'localImg' => $data['tmp_name'],
            'ext' => $ext,
            'name' => $hashName
        );
        return $new;
    }   
}

if ( ! function_exists('image_conv_multiple'))
{
    function image_conv_multiple($data)
    {           
        $localImg = [];
        $ext = [];
        $hashName = [];
        for($i = 0; $i<count($data['name']); $i++){
            if(!getimagesize($data['tmp_name'][$i])){
                return false;
            }
            array_push($localImg,$data['tmp_name'][$i]);
            $extX = array_push($ext, pathinfo($data['name'][$i])['extension']);
            $hashNameX = v4() . "." . pathinfo($data['name'][$i])['extension'];
            array_push($hashName, $hashNameX);
        }                           
        $new = array(
            'localImg' => $localImg,
            'ext' => $ext,
            'name' => $hashName
        );
        return $new;
    }   
}

function v4() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

      // 32 bits for "time_low"
      mt_rand(0, 0xffff), mt_rand(0, 0xffff),

      // 16 bits for "time_mid"
      mt_rand(0, 0xffff),

      // 16 bits for "time_hi_and_version",
      // four most significant bits holds version number 4
      mt_rand(0, 0x0fff) | 0x4000,

      // 16 bits, 8 bits for "clk_seq_hi_res",
      // 8 bits for "clk_seq_low",
      // two most significant bits holds zero and one for variant DCE1.1
      mt_rand(0, 0x3fff) | 0x8000,

      // 48 bits for "node"
      mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
  }