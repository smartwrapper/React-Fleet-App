<?php

namespace App\Http\Controllers\API\Web;

use App\Contract\Web\WishlistInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\WishlistRequest;
use App\Models\Web\Wishlist;
use App\Repository\Web\WishlistRepository;

class WishlistController extends Controller
{
    private $WishlistRepository;

    public function __construct(WishlistInterface $WishlistRepository)
    {
        $this->WishlistRepository = $WishlistRepository;
    }

    public function index()
    {

        return $this->WishlistRepository->all();
    }

    public function show(Wishlist $wishlist)
    {
        return $this->WishlistRepository->show($wishlist);
    }

    public function store(WishlistRequest $request)
    {
        $parms = $request->all();
        return $this->WishlistRepository->store($parms);
    }

    public function destroy($id)
    {
        return $this->WishlistRepository->destroy($id);
    }

}
