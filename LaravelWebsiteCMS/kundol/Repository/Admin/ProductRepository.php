<?php

namespace App\Repository\Admin;

use App\Contract\Admin\ProductInterface;
use App\Http\Resources\Admin\Product as ProductResource;
use App\Models\Admin\AvailableQty;
use App\Models\Admin\Language;
use App\Models\Admin\Product;
use App\Models\Admin\ProductGallaryDetail;
use App\Models\Admin\ProductReview;
use App\Services\Admin\AccountService;
use App\Services\Admin\DeleteValidatorService;
use App\Services\Admin\PointService;
use App\Services\Admin\ProductService;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class ProductRepository implements ProductInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        $product = Product::type();
        try {
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $language = Language::languageId($_GET['language_id'])->firstOrFail();
                $languageId = $language->id;
            }

            if (isset($_GET['getAllData']) && $_GET['getAllData'] == '1') {
                $product = $product->getProductDetailByLanguageId($languageId);
                return $this->successResponse(ProductResource::collection($product->select('id')->get()), 'Data Get Successfully!');
            }
            $product = $product->with('product_attribute.attribute.attribute_detail')->with('gallary');

            $product = $product->getAttributeDetailByLanguage($languageId);
            $product = $product->getVariationDetailByLanguage($languageId);

            if (isset($_GET['getCategory']) && $_GET['getCategory'] == '1') {
                $product = $product->getCategoryDetailByLanguageId($languageId);
            }

            if (isset($_GET['productType']) && $_GET['productType'] != '') {
                $productType = explode(',', $_GET['productType']);
                $product = $product->whereIn('product_type', $productType);
            }

            if (isset($_GET['brandId']) && $_GET['brandId'] != '') {
                $brandId = explode(',', $_GET['brandId']);
                $product = $product->whereIn('brand_id', $brandId);
            }

            if (isset($_GET['stock']) && $_GET['stock'] == '1') {
                $product = $product->with('stock');
            }

            if (isset($_GET['isFeatured']) && $_GET['isFeatured'] == '1') {
                $product = $product->where('is_featured', $_GET['isFeatured']);
            }

            if (isset($_GET['productCategories']) && $_GET['productCategories'] != '') {

                $productCategory = explode(',', $_GET['productCategories']);
                // dd($productCategory);
                $product = $product->whereHas('category', function ($query) use ($productCategory) {
                    $query->whereIn('product_category.category_id', $productCategory);
                });
            }

            if (isset($_GET['sku']) && $_GET['sku'] != '') {
                $sku = $_GET['sku'];
                $product = $product->where(function ($query) use ($sku) {
                    $query->whereHas('product_combination', function ($query1) use ($sku) {
                        $query1->where('product_combination.sku', $sku);
                    })->orWhere('sku', $sku);
                });
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $productTitle = $_GET['searchParameter'];
                $product = $product->whereHas('detail', function ($query) use ($productTitle) {
                    $query->where('product_detail.title', 'like', '%' . $productTitle . '%')->orWhere('product_detail.title', 'like', '%' . $productTitle . '%');
                });
            }

            $sortBy = ['id', 'price', 'product_type', 'discount_price', 'product_status', 'product_view', 'seo_desc', 'created_at'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $product = $product->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            $sortBy = ['title'];
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $product = $product->getProductDetailByLanguageId($languageId);
                $productSortType = $productSortBy = '';
                if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                    $productSortType = $_GET['sortType'];
                    $productSortBy = $_GET['sortBy'];
                    $product = $product->sortByProductDetail($productSortBy, $productSortType, $languageId);
                }
            }

            $sortBy = ['category_name'];
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $product = $product->getProductDetailByLanguageId($languageId);
                $productSortType = $productSortBy = '';
                if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                    $productSortType = $_GET['sortType'];
                    $productSortBy = $_GET['sortBy'];
                    $product = $product->sortByCategory($productSortBy, $productSortType, $languageId);
                }
            }

            if (isset($_GET['topSelling']) && $_GET['topSelling'] == '1') {
                $product = $product->sortByTopSellingProduct('qty', 'desc');
            }

            if (isset($_GET['price_from']) && $_GET['price_from'] != '' && isset($_GET['price_to']) && $_GET['price_to'] != '') {
                $product = $product->getProductByPrice($_GET['price_from'], $_GET['price_to']);
            }

            if (\Request::route()->getName() == 'products.index') {
                $product = $product->active()->addSelect([
                    'avg_rating' => ProductReview::whereColumn('product_review.product_id', 'products.id')->where('status', 'active')->selectRaw('avg(rating)'),
                ]);
            }
            if (isset($_GET['variations']) && $_GET['variations'] != '') {
                $variations = explode(',', $_GET['variations']);
                // dd($variations);
                $product = $product->whereHas('product_attribute.variation', function ($query) use ($variations) {
                    $query->whereIn('product_variation.variation_id', $variations);
                });
            }
            // return $product->toSql();

            return $this->successResponse(ProductResource::collection($product->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($singleProduct)
    {
        $product = Product::type()->with('product_attribute.attribute.attribute_detail');
        try {
            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $language = Language::languageId($_GET['language_id'])->firstOrFail();
                $languageId = $language->id;
            }
            $product = $product->getAttributeDetailByLanguage($languageId);
            $product = $product->getVariationDetailByLanguage($languageId);

            if (isset($_GET['getCategory']) && $_GET['getCategory'] == '1') {
                $product = $product->getCategoryDetailByLanguageId($languageId);
            }

            if (isset($_GET['productType']) && $_GET['productType'] != '') {
                $productType = explode(',', $_GET['productType']);
                $product = $product->whereIn('product_type', $productType);
            }

            if (isset($_GET['brandId']) && $_GET['brandId'] != '') {
                $brandId = explode(',', $_GET['brandId']);
                $product = $product->whereIn('brand_id', $brandId);
            }

            if (isset($_GET['stock']) && $_GET['stock'] == '1') {
                $product = $product->with('stock');
            }
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                if (\Request::route()->getName() == 'products.show') {
                    $product = $product->getProductDetailByLanguageId($languageId);
                } else {
                    if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                        $product = $product->getProductDetailByLanguageId($languageId);
                    } else {
                        $product = $product->with('detail');
                    }
                }
            }
            if (isset($_GET['getDetailWithLanguage']) && $_GET['getDetailWithLanguage'] == '1') {
                $product = $product->getProductDetailByLanguageId($languageId);
            }
            $product->productId($singleProduct->id);
            // $product->first();

            if (isset($_GET['hash']) && $_GET['hash'] != '') {
                $point = new PointService;
                $point->productSharePoints($_GET['hash'], $singleProduct->id);
            }

            if (\Request::route()->getName() == 'products.show') {
                $product = $product->active()->addSelect([
                    'avg_rating' => ProductReview::whereColumn('product_review.product_id', 'products.id')->where('status', 'active')->selectRaw('avg(rating)'),
                ]);
            }

            return $this->successResponse(new ProductResource($product->first()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {

        if ($parms['product_type'] == 'digital') {
            if (!isset($parms['digital_file']) || $parms['digital_file'] == '') {
                return $this->errorResponse('digital_file Required.');
            }

            try {
                $destinationPath = public_path('/digital');
                $productService = new ProductService;
                $result = $productService->saveDigitalFile($parms['digital_file'], $destinationPath);
                if ($result == 0) {
                    return $this->errorResponse('Only Zip File Required.');
                }
                $parms['digital_file'] = $result['name'];
                \DB::beginTransaction();
                $parms['user_id'] = \Auth::id();
                $parms['product_slug'] = str_replace(" ", "-", $parms['title'][0]);
                $product_slug = Product::slug($parms['product_slug'])->first();
                // if ($product_slug) {
                //     $parms['product_slug'] = $parms['product_slug'] . '-' . rand(1, 20);
                // }
                $checkSlug = Product::where('product_slug', $parms['product_slug'])->first();
                if ($checkSlug) {
                    $checkSlug = Product::where('product_slug', 'like', $parms['product_slug'] . '%')->latest()->value('product_slug');
                    $slugInt = substr($checkSlug, strrpos($checkSlug, '-') + 1);
                    if (is_numeric($slugInt)) {
                        $slugInt++;
                        $parms['product_slug'] = $parms['product_slug'] . '-' . $slugInt;
                    } else {
                        $parms['product_slug'] = $parms['product_slug'] . '-1';
                    }
                }
                $sql = new Product;
                $parms['created_by'] = \Auth::id();
                $sql = $sql->create($parms);
            } catch (Exception $e) {
                \DB::rollback();
                return $this->errorResponse();
            }

            $productService = new ProductService;
            $product_result = $productService->simpleProductDetailData($parms, $sql->id, 'store');
        } else {
            \DB::beginTransaction();
            try {
                $parms['digital_file'] = '';
                $parms['user_id'] = \Auth::id();
                $parms['product_slug'] = str_replace(" ", "-", $parms['title'][0]);
                // $product_slug = Product::slug($parms['product_slug'])->first();

                // $checkSlug = Product::where('product_slug', $parms['product_slug'])->first();
                // if ($checkSlug) {
                //     $checkSlug = Product::where('product_slug', 'like', $parms['product_slug'] . '%')->latest()->value('product_slug');
                //     $slugInt = substr($checkSlug, strrpos($checkSlug, '-') + 1);
                //     if (is_numeric($slugInt)) {
                //         $slugInt++;
                //         $parms['product_slug'] = $parms['product_slug'] . '-' . $slugInt;
                //     } else {
                //         $parms['product_slug'] = $parms['product_slug'] . '-1';
                //     }
                // }

                // if ($parms['product_type'] == 'simple') {
                //     $sql = ProductCombination::orderBy('id', 'DESC')->value('sku');
                //     $sql1 = Product::whereIn('product_type', ['simple', 'digital'])->orderBy('id', 'DESC')->value('sku');
                //     $sql = strtolower($sql);
                //     $sql1 = strtolower($sql1);
                //     $sql_sku = explode("sku", $sql);
                //     $sql1_sku = explode("sku", $sql1);
                //     $sku_prefix = $parms['category_id'][0];
                //     if ($parms['category_id'][0] < 10) {
                //         $sku_prefix = 'sku0' . $parms['category_id'][0];
                //     }

                //     if (isset($sql1_sku[1])) {
                //         $str = substr($sql_sku[1], 3, 7);
                //         $str1 = substr($sql1_sku[1], 3, 7);
                //         if ($str > $str1) {
                //             $str = intval($str) + 1;
                //             $parms['sku'] = $str;
                //         } else {
                //             $str = intval($str1) + 1;
                //             $parms['sku'] = $str;
                //         }
                //     } else if (isset($sql_sku[1])) {
                //         $str = substr($sql_sku[1], 3, 7);
                //         $str = str_split($str, 2);
                //         $parms['sku'] = $str;
                //     } else {
                //         $parms['sku'] = '000001';
                //     }

                //     for ($k = 0; $k < 6; $k++) {
                //         if (strlen($parms['sku']) < 6) {
                //             $parms['sku'] = '0' . $parms['sku'];
                //         }
                //     }
                //     $parms['sku'] = $sku_prefix . $parms['sku'];
                // }

                $sql = new Product;
                $parms['product_slug'] = $parms['sku'];
                $parms['created_by'] = \Auth::id();

                $sql = $sql->create($parms);
                if ($parms['product_type'] == 'simple') {
                    $accounts = new AccountService;
                    $accounts->createAccount('SUPPLIES', $parms['title'][0], $sql->id);
                }
            } catch (Exception $e) {
                \DB::rollback();
                return $this->errorResponse();
            }
            $productService = new ProductService;
            $product_result = $productService->simpleProductDetailData($parms, $sql->id, 'store');

            if ($parms['product_type'] == 'variable' && $sql) {
                $variable_result = $productService->variableProductDetailData($parms, $sql->id, 'store');
                if ($variable_result) {
                    $productService->saveProductGallaryImage($sql->id, $parms['gallary_detail_id']);
                    \DB::commit();
                    return $this->successResponse(new ProductResource(Product::with('category')->with("detail")->productId($sql->id)->firstOrFail()), 'Product Save Successfully!');
                } else {
                    \DB::rollback();
                    return $this->errorResponse();
                }
            }
        }

        if ($product_result) {
            $productService->saveProductGallaryImage($sql->id, $parms['gallary_detail_id']);
            \DB::commit();
            return $this->successResponse(new ProductResource(Product::with('category')->with("detail")->productId($sql->id)->firstOrFail()), 'Product Save Successfully!');
        } else {
            \DB::rollback();
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $product)
    {
        // return $parms['gallary_detail_id'];
        
        if ($parms['product_type'] == 'digital') {
            if (isset($parms['digital_file']) && $parms['digital_file'] != '') {
                $destinationPath = public_path('/digital');
                $productService = new ProductService;
                $result = $productService->saveDigitalFile($parms['digital_file'], $destinationPath);
                if ($result == 0) {
                    return $this->errorResponse('Only Zip File Required.');
                }
                $parms['digital_file'] = $result['name'];
            } else {
                $parms['digital_file'] = $product->digital_file;
            }

            try {
                \DB::beginTransaction();
                $parms['user_id'] = \Auth::id();
                $parms['product_slug'] = str_replace(" ", "-", $parms['title'][0]);
                $product_slug = Product::slug($parms['product_slug'])->NotProductId($product->id)->first();
                // if ($product_slug) {
                //     $parms['product_slug'] = $parms['product_slug'] . '-' . rand(1, 20);
                // }
                $checkSlug = Product::where('product_slug', $parms['product_slug'])->NotProductId($product->id)->first();
                if ($checkSlug) {
                    $checkSlug = Product::where('product_slug', 'like', $parms['product_slug'] . '%')->NotProductId($product->id)->latest()->value('product_slug');
                    $slugInt = substr($checkSlug, strrpos($checkSlug, '-') + 1);
                    if (is_numeric($slugInt)) {
                        $slugInt++;
                        $parms['product_slug'] = $parms['product_slug'] . '-' . $slugInt;
                    } else {
                        $parms['product_slug'] = $parms['product_slug'] . '-1';
                    }
                }

                $parms['updated_by'] = \Auth::id();
                $product->update($parms);
            } catch (Exception $e) {
                \DB::rollback();
                return $this->errorResponse();
            }

            $productService = new ProductService;
            $result = $productService->simpleProductDetailData($parms, $product->id, 'update');
        } else {
            \DB::beginTransaction();
            try {
                $parms['digital_file'] = '';
                $parms['user_id'] = \Auth::id();
                // $parms['product_slug'] = str_replace(" ", "-", $parms['title'][0]);
                // $product_slug = Product::slug($parms['product_slug'])->NotProductId($product->id)->first();
                // // if ($product_slug) {
                // //     $parms['product_slug'] = $parms['product_slug'] . '-' . rand(1, 20);
                // // }

                // $checkSlug = Product::where('product_slug', $parms['product_slug'])->NotProductId($product->id)->first();
                // if ($checkSlug) {
                //     $checkSlug = Product::where('product_slug', 'like', $parms['product_slug'] . '%')->NotProductId($product->id)->latest()->value('product_slug');
                //     $slugInt = substr($checkSlug, strrpos($checkSlug, '-') + 1);
                //     if (is_numeric($slugInt)) {
                //         $slugInt++;
                //         $parms['product_slug'] = $parms['product_slug'] . '-' . $slugInt;
                //     } else {
                //         $parms['product_slug'] = $parms['product_slug'] . '-1';
                //     }
                // }
                $parms['product_slug'] = $parms['sku'];
                $parms['updated_by'] = \Auth::id();
                $product->update($parms);
            } catch (Exception $e) {
                \DB::rollback();
                return $this->errorResponse();
            }

            $productService = new ProductService;
            $result = $productService->simpleProductDetailData($parms, $product->id, 'update');

            if ($parms['product_type'] == 'variable' && $product) {
                $variable_result = $productService->variableProductDetailData($parms, $product->id, 'update');
                if ($variable_result) {
                    $productService->saveProductGallaryImage($product->id, $parms['gallary_detail_id']);
                    \DB::commit();
                    return $this->successResponse(new ProductResource(Product::with('category')->with("detail")->productId($product->id)->firstOrFail()), 'Product Update Successfully!');
                } else {
                    \DB::rollback();
                    return $this->errorResponse();
                }
            }
        }

        if ($result) {
            $productService->saveProductGallaryImage($product->id, $parms['gallary_detail_id']);
            \DB::commit();
            return $this->successResponse(new ProductResource(Product::with('category')->with("detail")->productId($product->id)->firstOrFail()), 'Product Update Successfully!');
        } else {
            \DB::rollback();
            return $this->errorResponse();
        }
    }

    public function destroy($product)
    {
        $deleteValidatorService = new DeleteValidatorService;
        $isExistedInOtherTable = $deleteValidatorService->deleteValidate('product_id', $product);

        if ($isExistedInOtherTable === 1) {
            return $this->errorResponse('linked in another table can not be deleted', 422, null);
        }
        try {
            $sql = Product::findOrFail($product->id);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Product Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function priceRange()
    {
        try {
            $sql = AvailableQty::selectRaw("min(price) AS min_price , max(price) AS max_price")->first();
            // $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponseArray($sql, 'Product Min and Max Get Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function sku($params)
    {

        try {
            $productSku = Product::where('product_type', 'simple')->orderBy('id', 'DESC')->limit(1)->value('sku');
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($productSku) {
            return $this->successResponseArray($productSku, 'Latest SKU get Successfully! 1');
        } else {
            return $this->successResponseArray('SKU-s-000', 'Latest SKU get Successfully!');
        }
    }
}
