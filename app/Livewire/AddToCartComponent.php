<?php

namespace App\Livewire;

use App\Models\ProductOffer;
use Livewire\Component;

class AddToCartComponent extends Component
{
    public $model_id, $model_type, $check = false, $added_count = 0, $title, $image;

    protected $listeners = ['refreshCart'];

    public function mount()
    {
        if (session()->has('my_cart'))
            if ($my_cart = session()->get('my_cart')) {
                $this->model_id = is_array($this->model_id) ? $this->model_id['value'] : $this->model_id;
                if (
                    isset($my_cart[$this->model_type]) && isset($my_cart[$this->model_type][$this->model_id])
                    && $my_cart[$this->model_type][$this->model_id]['qty']
                ) {
                    $this->added_count = $my_cart[$this->model_type][$this->model_id]['qty'];
                }
            }
    }

    public function render()
    {
        return view('livewire.add-to-cart-component');
    }

    public function addToCard()
    {
        $this->check = true;
        $this->model_id = is_array($this->model_id) ? $this->model_id['value'] : $this->model_id;
        if (session()->has('my_cart')) {
            $my_cart = session('my_cart');
            if (empty($my_cart[$this->model_type][$this->model_id])) {
                $my_cart[$this->model_type][$this->model_id] = ['title' => $this->title, "qty" => 1, "price" => ProductOffer::find($this->model_id)->product->product_prices->last()->price, "image" => $this->image];
            } else {
                $my_cart[$this->model_type][$this->model_id]["qty"] += 1;
            }
        } else {
            $my_cart[$this->model_type][$this->model_id] = ['title' => $this->title, "qty" => 1, "price" => ProductOffer::find($this->model_id)->product->product_prices->last()->price, "image" => $this->image];
        }
        session()->put('my_cart', $my_cart);
        if (isset($my_cart[$this->model_type][$this->model_id])) {
            $this->added_count = $my_cart[$this->model_type][$this->model_id]['qty'];
        }
        $totalQty = 0;
        foreach ($my_cart as $items) {
            foreach ($items as $arr) {
                $totalQty += $arr["qty"];
            }
        }
        session()->put('totalCardQty', $totalQty);
        // if (session()->has('totalCardQty')) {
        //     $this->emit('refreshTotalCardQty');
        // }
    }

    public function refreshCart($id)
    {
        if ($this->model_id == $id) {
            $this->check = false;
        }
    }
}
