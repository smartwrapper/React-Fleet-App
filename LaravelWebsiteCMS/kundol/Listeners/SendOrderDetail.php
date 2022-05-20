<?php

namespace App\Listeners;

use App\Events\OrderProcessed;
use App\Models\Web\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Admin\OrderService;

class SendOrderDetail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderProcessed  $event
     * @return void
     */
    public function handle(OrderProcessed $event)
    {
        $orderQtyData = new OrderService;
        $orders = Order::find($event->order);
        $sql = $orderQtyData->getCartItemQty($orders->customer_id);
        $sql = $orderQtyData->orderDetail($sql,$orders);
    }
}
