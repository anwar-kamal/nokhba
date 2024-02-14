<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ProductOffer;
use Illuminate\Support\Facades\Log;

class GetOptionsController extends Controller
{
    public function get_objects($request)
    {
        $objects = $this->get_options($request);
        $items = array();
        foreach ($objects as $object) {
            $items[] = array(
                'item_label' => $object->name,
                'item_key' => $object->id,
            );
        }
        return response()->json($items);
    }

    public function get_options($request)
    {
        if ($request == 'Course') {
            $courses = \App\Models\Product::query();
            $courses->where('product_type_id', '=', '1');
            return $courses->get();
        } else if ($request == 'Offer') {
            $offer = ProductOffer::query();
            $offer->whereHas('offer', function ($query) {
                $query->where('activate', true);
                // $query->whereDate('start_date', '<=', Carbon::today()->toDateString())
                //     ->whereDate('end_date', '>=', Carbon::today()->toDateString());
            });
            $offer->select('*')->with(['offer:id,name', 'product:id,name']);
            $product_offers = $offer->get();
            $res = array();
            foreach ($product_offers as $product_offer) {
                $object = new \stdClass();
                $nameOffer = $product_offer->offer ? $product_offer->offer->name : "no name offer";
                $nameProduct = $product_offer->product ? $product_offer->product->name : "no name product";
                $object->name = $nameOffer .  " - " . $nameProduct . ' - ' . $product_offer->offer->id;
                $object->id = $product_offer->id;
                $res[] = $object;
            }
            return $res;
        } else if ($request == 'Package') {
            $packages = \App\Models\Package::where('activate', '=', 1)->get();

            $res = array();
            foreach ($packages as $package) {
                $object = new \stdClass();
                $object->name = $package->name . ' - ' . $package->id;
                $object->id = $package->id;
                $res[] = $object;
            }
            return $res;
        } else if ($request == 'InstallmentPackage') {
            $packages = \App\Models\InstallmentPackage::where('activate', '=', 1)->get();

            $res = array();
            foreach ($packages as $package) {
                $object = new \stdClass();
                $object->name = $package->name . ' - ' . $package->id;
                $object->id = $package->id;
                $res[] = $object;
            }
            return $res;
        }
    }

    public function create()
    {


        /*$blogs = \Statamic\Entries\Entry::query()->where('collection', 'blogs')
        ->where('language','en')->get();//update(['category'=>'Themeforest']);
        foreach($blogs as $blog){
            $small_description =  (preg_replace("~[^a-z\d.:'\\\-]~i", ' ',$blog->content->__toString())).'<br>';
            $small_description = (preg_replace("/\s+/", " ",$small_description));
            $small_description = (str_replace("<br>", " ",$small_description));
            $blog->set('small_description', $small_description)->save();

            echo $blog->category.'<br>';

        }*/
        /*$categery = getCollectionField('blogs','categery');
        $options = $categery->get('options');
$blogs = \Statamic\Entries\Entry::query()->where('collection', 'blogs')
        ->where('language','en')->get();//update(['category'=>'Themeforest']);
        foreach($blogs as $blog){
            $blog->set('likes', rand(1,100))->save();
            echo $blog->likes.'<br>';

        }
        $blogs = \Statamic\Entries\Entry::query()->where('collection', 'blogs')
        ->where('language','en')->get();//update(['category'=>'Themeforest']);
        foreach($blogs as $blog){
            $blog->set('categery', array_rand($options))->save();
            echo $blog->category.'<br>';

        }*/




        /*$query = \App\Models\ProductOffer::query();
        $product_offers = $query->select('*')->with(['offer:id,name', 'product:id,name,name_ar'])
                    ->get();

foreach($array_headlines as $key =>  $title){
            $data = array(
                    'title'=> $title,
                    'content'=> 'Pluoresnts customize prancing apcente customer service anding ands asing in straelg Interacvely
                    cordinate performe ('.$key.')',
                    'language'=>'en'


                );
            $entry = \Statamic\Entries\Entry::make()
                    ->collection('blogs')
                    ->data($data);
            $entry->save();
        }
        dd( 'finish' );*/

        /*$query = \App\Models\Package::query();
        $packages = $query->select('*')
                    ->where('activate','=',1)
                    ->limit(10)
                    ->get();


foreach($packages as $key =>  $package){

            $data = array(
                    'title'=> $package->name,
                    'title_ar'=>$package->name,
                    'system_package'=> $package->id,


                );
            $entry = \Statamic\Entries\Entry::make()
                    ->collection('packages')
                    ->data($data);
            $entry->save();

        }
        dd( 'finish' );
        dd($packages);
        > $blogs = \Statamic\Entries\Entry::query()->where('collection', 'products')->get();
        foreach($blogs as $blog ) $blog->set('slug',$blog->slug.' ')->save();
        */
    }
}
