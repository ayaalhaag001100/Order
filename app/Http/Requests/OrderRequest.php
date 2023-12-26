<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use  App\Rules\IsPharmacist;
use  App\Rules\IsStore;
use App\Models\Product;


//use Illuminate\Validation\Validator::validateHasRole ,

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array 
    {
        return [
            'pharmacist_id' => ['required','exists:users,id',new IsPharmacist()],
            'store_id' => ['required','exists:users,id',new IsStore()],
            'products' =>  ['required','array'],
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.order_quantity' => ['required','numeric','min:1' ],
        ];
    }
    public function withValidator($validator)
{
   $validator->after(function ($validator) {
       foreach ($this->products as $product) {
           $productQuantity = Product::find($product['product_id'])->quantity;
           if ($product['order_quantity'] > $productQuantity) {
               $validator->errors()->add('products.' . $product['product_id'], 'The quantity requested must be less than or equal to the available quantity');
           }
       }
   });
}
}
