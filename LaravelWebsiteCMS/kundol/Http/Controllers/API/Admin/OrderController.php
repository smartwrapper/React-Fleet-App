<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\OrderInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Web\Order;
use App\Repository\Admin\OrderRepository;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        return $this->orderRepository->all();
    }

    public function show(Order $Order)
    {
        return $this->orderRepository->show($Order);
    }

    public function update(OrderUpdateRequest $request, Order $Order)
    {
        $parms = $request->all();
        return $this->orderRepository->update($parms, $Order);
    }

    public function addOrderNotes(Request $request)
    {
        $this->validate($request,[
            'id'=>'required|exists:orders',
            'title' =>'required',
            'notes' =>'required',
         ]);

        $parms = $request->all();
        return $this->orderRepository->addOrderNotes($parms);
    }

    public function addOrderComments(Request $request)
    {
        $this->validate($request,[
            'id'=>'required|exists:orders',
            'message' =>'required',
         ]);

        $parms = $request->all();
        return $this->orderRepository->addOrderComments($parms);
    }

    

    

}
