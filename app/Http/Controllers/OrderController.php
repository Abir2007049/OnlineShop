<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function markAsDelivered($id, Request $request)
    {
        // Find the order by ID
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        // Mark the order as delivered
        $order->DeliveryStatus = 'delivered'; // or any other value indicating delivery
        $order->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Order marked as delivered.');
    }
    public function destroyOrder($id)
    {
        $product=Order::findOrFail($id);
        $product->delete();
        return redirect()->route('see.order')->with('success', 'Order deleted successfully.');
      
    }

}
