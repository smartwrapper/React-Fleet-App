<?php

namespace App\Services\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Admin\Product;
use App\Models\Admin\ProductAttribute;
use App\Models\Admin\ProductCategory;
use App\Models\Admin\ProductCombination;
use App\Models\Admin\ProductCombinationDtl;
use App\Models\Admin\ProductDetail;
use App\Models\Admin\ProductGallaryDetail;
use App\Models\Admin\ProductVariation;
use App\Traits\ApiResponser;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ProductService
{
    use ValidatesRequests, ApiResponser;
    public function simpleProductDetailData($parms, $id, $type)
    {
        if ($type == 'update') {
            ProductDetail::where('product_id', $id)->delete();
            ProductCategory::where('product_id', $id)->delete();
            ProductCombinationDtl::where('product_id', $id)->delete();
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            ProductCombination::where('product_id', $id)->delete();
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
        $data['product_id'] = $id;
        foreach ($parms['language_id'] as $i => $language) {
            $data['language_id'] = $language;
            $data['title'] = $parms['title'][$i];
            $data['desc'] = $parms['desc'][$i];
            $query = new ProductDetail;
            $query->create($data);
        }

        foreach ($parms['category_id'] as $i => $category) {
            $data['category_id'] = $category;
            $query = new ProductCategory;
            $query->create($data);
        }

        return 1;
    }

    public function variableProductDetailData($parms, $id, $type)
    {
        // $attributes = ['size', 'color'];
        // $variation_size = ['large', 'small'];
        // $variation_color = ['red', 'green', 'black'];

        // $combination_price_large_red = 10;
        // $combination_price_large_green = 20;
        // $combination_price_large_black = 30;
        // $combination_price_small_red = 40;
        // $combination_price_small_green = 440;
        // $combination_price_small_black = 60;
        $combinations = [];
        foreach ($parms['attributes'] as $i => $attribute) {
            if ($type == 'store') {
                $product_attribute_id = $this->storeProductAttribute($attribute, $id);
                if ($product_attribute_id) {
                    $combinations[] = $parms["variation_" . $attribute];
                    foreach ($parms["variation_" . $attribute] as $variations) {
                        $this->storeProductVariation($product_attribute_id->id, $variations);
                    }
                }
            } else {
                $combinations[] = $parms["variation_" . $attribute];
            }
        }
        return $results = $this->cartesian_product($combinations, $parms, $id, $type);
    }

    public function storeProductAttribute($attribute_id, $id)
    {
        $data['attribute_id'] = $attribute_id;
        $data['product_id'] = $id;
        $query = new ProductAttribute;
        return $query->create($data);
    }

    public function storeProductVariation($product_attribute_id, $variation_id)
    {
        $data['product_attribute_id'] = $product_attribute_id;
        $data['variation_id'] = $variation_id;
        $query = new ProductVariation;
        return $query->create($data);
    }

    public function cartesian_product($combinations, $parms, $id, $type)
    {
        $result = array(array());
        foreach ($combinations as $list) {
            $_tmp = array();
            foreach ($result as $result_item) {
                foreach ($list as $list_item) {
                    $_tmp[] = array_merge($result_item, array($list_item));
                }
            }
            $result = $_tmp;
        }
        return $this->getProductCombination($result, $parms, $id, $type);
    }

    public function getProductCombination($data, $parms, $id, $type)
    {
        foreach ($data as $j => $result) {
            $price = 'combination_price_';
            $sku = 'combination_sku_';
            $gallary = 'combination_gallary_';
            foreach ($result as $i => $single_data) {
                if (count($result) - 1 == $i) {
                    $price .= $single_data;
                    $sku .= $single_data;
                    $gallary .= $single_data;
                } else {
                    $price .= $single_data . '_';
                    $sku .= $single_data . '_';
                    $gallary .= $single_data . '_';
                }
            }

            if ($type == 'store') {
                $productCombinationData = $this->storeProductCombination($parms[$price], $parms[$gallary], $id, $parms[$sku]);

                foreach ($result as $single_variation) {
                    $this->storeProductCombinationDtl($single_variation, $id, $productCombinationData->id);
                }
            } else {
                if (isset($parms['combination_id'][$j])) {
                    $productCombinationData = ProductCombination::where('id', $parms['combination_id'][$j])->first();
                    if (!$productCombinationData) {
                        $productCombinationData = $this->storeProductCombination($parms[$price], $parms[$gallary], $id, $parms[$sku]);
                    }
                } else {
                    $productCombinationData = $this->storeProductCombination($parms[$price], $parms[$gallary], $id, $parms[$sku]);
                }
                foreach ($result as $single_variation) {
                    $this->storeProductCombinationDtl($single_variation, $id, $productCombinationData->id);
                }
            }
        }
        return 1;
    }

    public function storeProductCombination($price, $gallary, $id, $sku)
    {
        $data['sku'] = $sku;
        $data['price'] = $price;
        $data['gallary_id'] = $gallary;
        $data['product_id'] = $id;
        $sql = new ProductCombination;
        $product = Product::productId($id)->firstOrFail();
        $sql = $sql->create($data);
        if ($product) {
            $accounts = new AccountService;
            $accounts->createAccount('SUPPLIES', $product->title, $sql->id);
        }
        return $sql;

    }

    public function storeProductCombinationDtl($single_variation, $id, $productCombinationID)
    {
        $data['variation_id'] = $single_variation;
        $data['product_combination_id'] = $productCombinationID;
        $data['product_id'] = $id;
        $query = ProductCombinationDtl::where('variation_id', $data['variation_id'])->where('product_id', $data['product_id'])->where('product_combination_id', $data['product_combination_id'])->first();
        if (!$query) {
            $sql = new ProductCombinationDtl;
            $sql = $sql->create($data);
            return $sql;
        }
        return 1;
    }

    public function validateProductVariable($parms)
    {
        $request = new ProductRequest;
        $this->validate($parms, $request->attribute());

        $combinations = array();
        foreach ($parms['attributes'] as $i => $attribute) {
            $combinations[] = $parms["variation_" . $attribute];
            if (isset($parms["variation_" . $attribute]) && is_array($parms["variation_" . $attribute])) {
                foreach ($parms["variation_" . $attribute] as $variations) {
                    if (!isset($variations)) {
                        return $this->errorResponse('variation is required.', 401);
                    }
                }
            } else {
                return $this->errorResponse('variation according to attribute is required.', 401);
            }
        }

        $results = array(array());
        foreach ($combinations as $list) {
            $_tmp = array();
            foreach ($results as $result_item) {
                foreach ($list as $list_item) {
                    $_tmp[] = array_merge($result_item, array($list_item));
                }
            }
            $results = $_tmp;
        }

        foreach ($results as $k => $result) {
            $price = 'combination_price_';
            $sku = 'combination_sku_';
            $gallary = 'combination_gallary_';
            foreach ($result as $i => $single_data) {
                if (count($result) - 1 == $i) {
                    $price .= $single_data;
                    $sku .= $single_data;
                    $gallary .= $single_data;
                } else {
                    $price .= $single_data . '_';
                    $sku .= $single_data . '_';
                    $gallary .= $single_data . '_';
                }
            }
            if (!isset($parms[$price])) {
                return $this->errorResponse($k . '-Price is required.', 401);
            }
            if (!isset($parms[$gallary])) {
                return $this->errorResponse($k . '-Combination Gallary_ is required.', 401);
            }
            if (!isset($parms[$sku])) {
                return $this->errorResponse($k . '-Combination Sku_ is required.', 401);
            }
        }
        return 1;
    }
    public function saveDigitalFile($file, $destinationPath)
    {
        $arr['extension'] = $file->getClientMimeType();
        if ($arr['extension'] != 'application/zip') {
            return 0;
        }
        $name = $file->getClientOriginalName();
        $imagename = date('Ymdis') . $name;

        $file->move($destinationPath, $imagename);

        $arr['name'] = $imagename;
        return $arr;
    }

    public function saveProductGallaryImage($product_id, $gallary_detail_id)
    {
        
        $sql = ProductGallaryDetail::where('product_id', $product_id)->delete();
        // if($sql){
            
        // }
        foreach ($gallary_detail_id as $gallary_detail) {
            ProductGallaryDetail::create([
                'product_id' => $product_id,
                'gallary_id' => $gallary_detail,
            ]);
        }
        
    }
}
