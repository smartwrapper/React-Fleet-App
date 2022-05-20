<?php

namespace App\Http\Controllers\API\Web;

use App\Contract\Web\CartInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CartRequest;
use App\Models\Web\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $CartRepository;

    public function __construct(CartInterface $CartRepository)
    {
        $this->CartRepository = $CartRepository;
        $this->middleware('store')->except('index');
    }

    public function index(Request $request)
    {
        return $this->CartRepository->all($request->all());
    }

    public function show(Cart $Cart)
    {
        return $this->CartRepository->show($Cart);
    }

    public function store(CartRequest $request)
    {
        $parms = $request->all();
        return $this->CartRepository->store($parms);
    }

    public function destroy(Request $request)
    {
        return $this->CartRepository->destroy($request);
    }
}
