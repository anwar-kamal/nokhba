<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\InstallmentPackage;
use Illuminate\Support\Facades\Session;

class CheckoutComponent extends Component
{
    public $page;

    // public function mount()
    // {
    //     $this->tax();
    // }

    public function render()
    {
        return view('livewire.checkout-component');
    }

    // public function tax()
    // {
    //     $item_object = InstallmentPackage::find(Session::get('subscribeDiploma'));
    //     $this->remaining += ($item_object->total_amount - $item_object->deposit_amount);
    //     dD($item_object);
    //     $this->installments += $item_object->installment_count;

    //     $this->all_installments[count($this->all_installments)] = ["installment_amount" => $item_object->installment_amount, "every_month" => $item_object->every_month, "installment_count" => $item_object->installment_count];
    //     $this->require_pay_amount += $item_object->deposit_amount;

    //     $k = (count($this->items) > 0) ? count($this->items) - 1 : 0;

    //     foreach ($item_object->installment_package_products as $i => $package_product) {
    //         $this->level_branches[$k][$i] = $this->branch_id;
    //         $this->levels[$k][$i] = null;
    //         $this->level_periods[$k][$i] = null;
    //         $this->level_planning_course_ids[$k][$i] = null;

    //         if ($this->branch_id) {
    //             $this->branch_periods[$k][$i] = Period::where("branch_id", $this->branch_id)->where("active", 1)->get()->toArray();
    //         } else {
    //             $this->branch_periods[$k][$i] = [];
    //         }

    //         $product_price = $package_product->product->product_prices()->where("currency_id", $this->currency_id)->first();
    //         $this->invoice_before_discount_total += $product_price->price;

    //         $pack_item_now = 0;
    //         $pack_item_tax_amount = 0;
    //         $pack_item_price_with_tax = 0;

    //         $calcTax = true;
    //         if ($this->isInGroupTaxExcepts) {
    //             $prodcutInTaxExcept = \App\Models\TaxExcept::where("tax_type_id", 1)->where("product_id",  $package_product->product->id)->count();
    //             if ($prodcutInTaxExcept) {
    //                 $calcTax = false;
    //             }
    //         }

    //         if ($calcTax == true) {
    //             $first_tax = $package_product->product->taxes()->first();
    //             if ($first_tax) {
    //                 $pack_item_tax_ratio = $first_tax->tax_type->ratio;
    //             } else {
    //                 $pack_item_tax_ratio = 0;
    //             }
    //         } else {
    //             $pack_item_tax_ratio = 0;
    //         }

    //         if ($calcTax == false) {
    //             $pack_item_now = $package_product->discount_price;
    //             $pack_item_tax_amount = 0;
    //             $pack_item_price_with_tax = $package_product->discount_price;

    //             $this->invoice_total +=  $pack_item_now;
    //             $this->invoice_total_with_taxes +=  $pack_item_now;
    //         } elseif ($item_object->include_tax) {

    //             $pack_item_now = ($package_product->discount_price / ($pack_item_tax_ratio + 1));
    //             $pack_item_tax_amount = ($pack_item_tax_ratio * ($package_product->discount_price / ($pack_item_tax_ratio + 1)));
    //             $pack_item_price_with_tax = $package_product->discount_price;

    //             $this->invoice_total +=  $pack_item_now;
    //             $this->amount_taxes += $pack_item_tax_amount;
    //             $this->invoice_total_with_taxes +=  $pack_item_price_with_tax;
    //             // $this->require_pay_amount+=  $pack_item_tax_amount ;

    //         } elseif ($product_price->activate_tax && $package_product->product->taxes()->count() > 0) {

    //             $pack_item_now = $package_product->discount_price;
    //             $pack_item_price_with_tax = (($package_product->discount_price) * ($pack_item_tax_ratio + 1));
    //             $pack_item_tax_amount = ($pack_item_tax_ratio * $package_product->discount_price);

    //             if ($this->installments) {
    //                 $xx_tax_amount = ($pack_item_tax_ratio * $package_product->discount_price / ($this->installments + 1));
    //                 $this->all_installments[0]["installment_amount"] +=  $xx_tax_amount;
    //                 $this->remaining = $this->installments * $this->all_installments[0]["installment_amount"];
    //             } else {
    //                 $xx_tax_amount = $pack_item_tax_amount;
    //             }
    //             $this->invoice_total +=  $pack_item_now;
    //             $this->invoice_total_with_taxes +=  $pack_item_price_with_tax;
    //             $this->amount_taxes +=  $pack_item_tax_amount;
    //             $this->require_pay_amount += $xx_tax_amount;
    //         } else {
    //             $pack_item_now = $package_product->discount_price;
    //             $pack_item_tax_amount = 0;
    //             $pack_item_price_with_tax = $package_product->discount_price;

    //             $this->invoice_total +=  $pack_item_now;
    //             $this->invoice_total_with_taxes +=  $pack_item_now;
    //         }

    //         $tax_name = ($package_product->product->taxes()->first()) ? $package_product->product->taxes()->first()->tax_type->name : "";
    //         $this->price_details[] = [
    //             "original" => $product_price->price, "now" => $pack_item_now, "tax" => $pack_item_tax_ratio, "tax_name" =>  $tax_name, "taxt_amount" => $pack_item_tax_amount, "price_with_tax" =>  $pack_item_price_with_tax, "currency" => $product_price->currency->name, 'qantity' => 1
    //         ];
    //     }
    // }
}
