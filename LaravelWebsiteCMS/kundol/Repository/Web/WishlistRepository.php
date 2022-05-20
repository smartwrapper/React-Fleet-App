<?php

namespace App\Repository\Web;

use App\Contract\Web\WishlistInterface;
use App\Http\Resources\Web\Wishlist as WishlistResource;
use App\Models\Web\Wishlist;
use App\Models\Admin\Language;
use App\Traits\ApiResponser;
use Auth;
use Illuminate\Support\Collection;

class WishlistRepository implements WishlistInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $wishlist = new Wishlist;
            if (isset($_GET['products']) && $_GET['products'] == 1) {
                $wishlist = $wishlist->with('products');
            }
            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $language = Language::languageId($_GET['language_id'])->firstOrFail();
                $languageId = $language->id;
            }
            if (isset($_GET['getCategory']) && $_GET['getCategory'] == '1') {
                $wishlist = $wishlist->getCategoryDetailByLanguageId($languageId);
            }
            if (isset($_GET['stock']) && $_GET['stock'] == '1') {
                $wishlist = $wishlist->with('products.stock');
            }
            if (isset($_GET['stock']) && $_GET['stock'] == '1') {
                $wishlist = $wishlist->with('products.stock');
            }
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $wishlist = $wishlist->getProductDetailByLanguageId($languageId);
            }
            return $this->successResponse(WishlistResource::collection($wishlist->customerId(Auth::id())->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($wishlist)
    {
        try {
            return $this->successResponse(new WishlistResource(Wishlist::wishlistId($wishlist->id)->firstOrFail()) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $parms['customer_id'] = Auth::id();
            $sql = Wishlist::updateOrCreate(
                ['customer_id' => Auth::id(), 'product_id' => $parms['product_id']],
                [$parms]
            );
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(WishlistResource::collection(Wishlist::customerId(Auth::id())->get()), 'Wishlist Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($wishlist)
    {
        try {
            $sql = Wishlist::findOrFail($wishlist);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(WishlistResource::collection(Wishlist::customerId(Auth::id())->get()), 'Wishlist Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

}
