<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function goToRequest()
    {
        return view('request');
    }

    public function goToRequestConfirmation()
    {
        return view('request_confirmation');
    }

    public static function getTable(int $table)
    {
        return $table;
    }

    public static function saveRequest(Request $request)
    {
        $table = $request->get('table_number');
        $items = $request->get('order');

        $arrayItem = [];
        $searchPrice = null;
        $price = 0;
        $delivered = 0;

        foreach($items as $item) {
            array_push($arrayItem, $item);
            $searchPrice = Menu::select('product_price')->where('product_name', $item)->value('product_price');
            $price = floatval($price) + $searchPrice;
        }

        $order = Order::create([
            'default' => true,
            'table_number' => $table,
            'order' => $arrayItem,
            'total_price' => $price,
            'delivered' => $delivered
        ]);

        $order->save();
        return redirect()->route('request.confirmation');
    }

    public static function returnPrice()
    {
        $price = Order::select('total_price')->latest('updated_at')->value('total_price');

        return $price;
    }

    public static function showOrdersNotDelivered()
    {
        $orders = Order::where('delivered', 0)->orderBy('created_at')->get();

        return $orders;
    }

    public static function showOrdersDelivered()
    {
        $orders = Order::where('delivered', 1)->orderBy('created_at')->get();

        return $orders;
    }

    public static function updateOrders(int $id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'delivered' => 1
        ]);

        $order->save();

        return redirect()->route('home');
    }
}
