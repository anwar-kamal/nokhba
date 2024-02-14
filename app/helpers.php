<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

if (!function_exists('langContent')) {
    function langContent($fild)
    {
        if (App::getLocale() == "ar") {
            return $fild . "_ar";
        }
        return $fild;
    }
}

if (!function_exists('is_webp')) {
    function is_webp()
    {
        if (array_key_exists("HTTP_ACCEPT", $_SERVER)) {
            if (strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false) {
                return "webp";
            }
        }
    }
}

if (!function_exists('getImage')) {
    function getImage($url)
    {
        // if (App::getLocale() == 'ar') {
            if (is_webp() == "webp") {
                return asset(Statamic\Statamic::tag('glide')->src($url)->params(['format' => 'webp']));
            }
            return asset($url);
        // } else {
        //     if (is_webp() == "webp") {
        //         return asset(Str::replaceFirst('/en', '', Statamic\Statamic::tag('glide')->src($url)->params(['format' => 'webp'])));
        //     }
        //     return asset($url);
        // }
    }
}

if (!function_exists('getGlobal')) {
    function getGlobal($varGlobal)
    {
        return Statamic\Facades\GlobalSet::find($varGlobal)->inCurrentSite()->data();
    }
}

if (!function_exists('get_page')) {
    function get_page($slug)
    {
        $page = \Statamic\Facades\Entry::query()->where('slug', '=', $slug)->first();
        return $page;
    }
}

if (!function_exists('get_page_permalink')) {
    function get_page_permalink($slug)
    {
        $page = get_page($slug);
        // Log::info($page);
        if ($page)
            return $page->permalink;
        return '#';
    }
}

if (!function_exists('courseCustomerFunction')) {
    function courseCustomerFunction($course)
    {
        if ($course_customers = $course->course_customers->where('customer_id', auth()->user()->id)->first()) {
            return $course_customers->id;
        }
        return false;
    }
}

if (!function_exists('seo_url')) {
    function seo_url($string)
    {
        //Lower case everything
        //$string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        //$string = preg_replace("/[^a-zأ-ي0-9_\s-]/", "", $string);

        $string = mb_strtolower($string, "UTF-8");;
        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلألمنهويةى]#u/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
}

if (!function_exists('get_wepb')) {
    function get_wepb($path)
    {
        return substr($path, 0, strrpos($path, ".")) . '.webp';
    }
}

if (!function_exists('find_by_slug')) {
    function find_by_slug($class, $slug)
    {
        return $model = $class::where('id', $slug)->orwhere('slug_en', $slug)->orwhere('slug_ar', $slug)->first();
    }
}

if (!function_exists('current_user')) {
    function current_user()
    {
        if (auth('customers')->user())
            return auth('customers')->user();
        else if (auth()->user())
            return auth()->user();
        else return false;
    }
}

if (!function_exists('helperstoreFile')) {
    function helperstoreFile($file, $directory)
    {

        // get file as bin
        $image_parts    = explode(";base64,", $file);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type     = $image_type_aux[1];
        $image_base64   = base64_decode($image_parts[1]);

        // cehck dail file
        $folder_date = env('SYSTEM_STORAGE_PATH') . date("Y-m-d");
        if (!file_exists($folder_date))
            mkdir($folder_date, 0777, true);
        if (!file_exists($folder_date . "/" . $directory))
            mkdir($folder_date . "/" . $directory, 0777, true);

        // set path , content
        $path = $folder_date . '/' . $directory . '/' . Str::random(40) . '.' . $image_type;
        $content = $image_base64;
        file_put_contents($path, $content);

        //convert to webmp  orginal  iamge
        $org_path = str_replace(env('SYSTEM_STORAGE_PATH'), '', $path);
        $imageResize = Image::make($path)->encode('webp', 90);
        $path   = substr($path, 0, strpos($path, ".")) . '.webp';
        $destinationPath = $path;
        $imageResize->save($destinationPath);

        /* save org image path  */
        return  $org_path;
    }
}

if (!function_exists('helpermoveFile')) {
    function helpermoveFile($file, $directory)
    {

        // cehck dail file
        $folder_date = env('SYSTEM_STORAGE_PATH') . date("Y-m-d");
        if (!file_exists($folder_date))
            mkdir($folder_date, 0777, true);
        if (!file_exists($folder_date . "/" . $directory))
            mkdir($folder_date . "/" . $directory, 0777, true);

        $folder = str_replace(env('SYSTEM_STORAGE_PATH'), '', $folder_date . "/" . $directory);

        return Storage::disk("remote")->put($folder,  $file);
    }
}
