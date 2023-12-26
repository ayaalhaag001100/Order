<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;

class OrderController extends BaseController
{
    public function addOrder(OrderRequest $request)
    {
        $productsArray = $request->input('products');
        $order = Order::create([
            'pharmacist_id' => $request->input('pharmacist_id'),
            'store_id' => $request->input('store_id'),
        ]);
        $order->products = $request->input('products');

        foreach ($productsArray as $product) {
            $productId = $product['product_id'];
            $orderQuantity = $product['order_quantity'];
            $product = Product::find($productId);
            $product->decrement('quantity', $orderQuantity);
            $dddd[] = $product;
        }

        return $this->sendResponse($order, "done");
    }

}
