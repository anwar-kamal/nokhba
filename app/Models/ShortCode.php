<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortCode extends Model
{
    use HasFactory;

    public static function  compile($str)
    {
        $shortcodes = (ShortCode::get_all_string_between($str, '{{', '}}'));
        if (count($shortcodes)) {
            foreach ($shortcodes as $shortcode) {
                $shortcode_contents = ShortCode::get_content($shortcode);

                $str = str_replace('{{' . $shortcode . '}}', $shortcode_contents, $str);
            }
        }
        return $str;
    }

    public static function get_all_string_between($str, $startDelimiter, $endDelimiter)
    {
        $contents = array();
        $startDelimiterLength = strlen($startDelimiter);
        $endDelimiterLength = strlen($endDelimiter);
        $startFrom = $contentStart = $contentEnd = 0;
        while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
            $contentStart += $startDelimiterLength;
            $contentEnd = strpos($str, $endDelimiter, $contentStart);
            if (false === $contentEnd) {
                break;
            }
            $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
            $startFrom = $contentEnd + $endDelimiterLength;
        }

        return $contents;
    }

    public static function  get_content($shortcode)
    {
        // get with method vars
        $arr = explode(' ', $shortcode);
        $blade = $arr[0];
        $vars = array();
        if (isset($arr[1])) {
            $str = str_replace($blade . ' ', '', $shortcode);
            $vars = array();
            if ($blade == 'str')
                $arr2 = (explode('/', $str));
            else $arr2 = (explode(' ', $str));
            /*if ($blade == 'link'){
                $vars = ShortCode::get_attr($str);
                dd($vars);
            }*/
            $vars = ShortCode::get_attr($str);
            /*for($key=0 ; $key<count($arr2 ) ; $key++){
                $arr3 = (explode('=',$arr2[$key]));
                if (count($arr3) == 2){
                    $var_name = $arr3[0];
                    $var_value = $arr3[1];
                    $vars[$var_name ] = str_replace('"','',$var_value);
                }
            }  */
        }
        //dd(view('shortcodes.'.$blade)->with(compact('vars'))->render());
        return view('shortcodes.' . $blade)->with(compact('vars'));
    }

    static public function get_attr($str)
    {
        $arr_attr = array();
        $len = strlen($str);
        $current_str = '';
        $key = '';
        $val = '';
        $start_val = false;
        for ($i = 0; $i < $len; ++$i) {
            if ($str[$i] == '=') {
                $key = str_replace(' ', '', $current_str);
                $current_str = '';
            } else if ($str[$i] == '"') {
                if ($start_val) {

                    $arr_attr[$key] = $current_str;
                    $start_val = false;
                    $current_str = '';
                    $key = '';
                    $val = '';
                } else $start_val = true;
            } else
                $current_str .= $str[$i];
        }

        return ($arr_attr);
    }
}
