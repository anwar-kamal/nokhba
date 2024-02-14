<?php

namespace App\Livewire;

use Livewire\Component;

class CartComponent extends Component
{
    public $items = [], $total_amount = [], $currency_id = 1, $totalQty, $currency_name, $payment_method = 'mada', $payment_url, $checkout_error_tabby, $checkout_error_tamara,
        $nationality_id, $mobile, $ar_l_name, $ar_m_name, $ar_f_name, $email, $city, $country_id, $pay = false, $inputGoogleIdOrder, $customer, $tabby_link = false;
    // coupon_code
    public $coupon_code;
    protected $listeners = ['refreshCheckout', 'refreshOtherComponent' => 'refreshComponent'];

    public function render()
    {
        return view('livewire.cart-component');
    }

    public function changeQuantity($action, $model_type, $model_id)
    {
        $my_cart = session()->get('my_cart');
        if ($my_cart) {
            if (array_key_exists($model_id, $my_cart[$model_type])) {
                if ($action == "plus") {
                    $my_cart[$model_type][$model_id]['qty'] += 1;
                } else {
                    if ($my_cart[$model_type][$model_id]['qty'] == 1) {
                        if ($model_type == "App\Models\Package") {
                            if (array_key_exists('plus_offer_to_package', $my_cart[$model_type][$model_id])) {
                                foreach ($my_cart[$model_type] as $key => $plus) {
                                    if ($plus['is_plus_offer']) {
                                        $totalQty = session()->get('totalCardQty') - $my_cart[$model_type][$key]['qty'];
                                        unset($my_cart[$model_type][$key]);
                                    }
                                }
                            }
                        }
                        unset($my_cart[$model_type][$model_id]);
                        if (empty($my_cart[$model_type])) {
                            unset($my_cart[$model_type]);
                        }
                        if (empty($my_cart)) {
                            session()->forget('my_cart', 'totalCardQty');
                        }
                        // if ($model_id) {
                        //     $this->emit('refreshCart', $model_id);
                        // }
                    } else {
                        $my_cart[$model_type][$model_id]['qty'] -= 1;
                    }
                }
                // $this->emit('refreshSidebarShoppingCart');
            }
            session()->put('my_cart', $my_cart);
            $totalQty = 0;
            foreach ($my_cart as $items) {
                foreach ($items as $item) {
                    $totalQty += $item["qty"];
                }
            }
            session()->put('totalCardQty', $totalQty);
        } else {
            // $this->emit('refreshCheckout');
        }

        // send tabby
        // $this->send_tabby_api();
    }

    public function delete($model_type, $model_id)
    {
        $my_cart = session()->get('my_cart');
        $totalQty = session()->get('totalCardQty');
        if ($my_cart) {
            if (array_key_exists($model_id, $my_cart[$model_type])) {
                if ($my_cart[$model_type][$model_id]['plus_offer']) {
                    foreach ($my_cart[$model_type] as $key => $plus) {
                        if ($plus['is_plus_offer']) {
                            $totalQty -= ($my_cart[$model_type][$key]['qty'] + 1);
                            unset($my_cart[$model_type][$key]);
                        }
                    }
                } elseif ($model_type == "App\Models\Package") {
                    if (array_key_exists("plus_offer_to_package", $my_cart[$model_type][$model_id])) {
                        if ($my_cart[$model_type][$model_id]['plus_offer_to_package']) {
                            foreach ($my_cart[$model_type] as $key => $plus) {
                                if ($plus['is_plus_offer']) {
                                    $totalQty -= ($my_cart[$model_type][$key]['qty'] + 1);
                                    unset($my_cart[$model_type][$key]);
                                }
                            }
                        }
                    } else {
                        $totalQty -= $my_cart[$model_type][$model_id]['qty'];
                    }
                } else {
                    $totalQty -= $my_cart[$model_type][$model_id]['qty'];
                }
            }
        } else {
            $this->emit('refreshCheckout');
        }
        unset($my_cart[$model_type][$model_id]);
        if (empty($my_cart[$model_type])) {
            unset($my_cart[$model_type]);
        }
        session()->put('totalCardQty', $totalQty);
        session()->put('my_cart', $my_cart);
        if (empty($my_cart)) {
            session()->forget('my_cart', 'totalCardQty');
        }
        if ($model_id) {
            $this->emit('refreshCart', $model_id);
        }
        $this->emit('refreshSidebarShoppingCart');
        // send tabby
        $this->send_tabby_api();
    }
}
