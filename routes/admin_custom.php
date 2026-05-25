<?php
use Illuminate\Support\Facades\Route;

Route::get('orders/{order}/mark-shipped', function ($orderId) {
    $order = \App\Order::findOrFail($orderId);
    $order->shipped = 'yes';
    $order->save();
    return redirect()->back()->with([
        'message'    => 'Order marked as shipped!',
        'alert-type' => 'success',
    ]);
})->name('orders.mark-shipped');
